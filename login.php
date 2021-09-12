<?php session_start(); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('filters/guest.filter.php'); ?>
<?php
if (isset($_POST['login'])) {

    //--Si tous les champs ne sont pas vides
    if (not_empty([$_POST['ident'], $_POST['psw']])) {

        $errors = [];
        extract($_POST);
        //---Requete pour selectionner les users
        //--Ayant l'email ou le pseudo
        $q = $db->prepare("SELECT * FROM professeur
                         WHERE  (login=:login OR email=:email)
                         AND mot_de_pass=:password
                         AND active='1'");
        $q->execute([
            'login' => $ident,
            'email' => $ident,
            'password' => sha1($psw)
        ]);
        //--Calcul le nombre de ligne
        $userHasBeenFound = $q->rowCount();
        //--Pouvoir recupérer les données sous forme d'objet
        $user = $q->fetch(PDO::FETCH_OBJ);
        //--Si un user trouvé
        if ($userHasBeenFound) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['login'] = $user->login;
            //--redirection avec l'id pour nous permettre
            //--de pouvoir recupérer les données de celui
            //--qui est connecté
            set_flash("Bienvenu sur votre espace personnel", "info");
            redirect('professor.profile.php?id=' . $user->id);

        } else {
            save_input_data();
            if(!is_already_in_use('mot_de_pass',sha1($psw),'professeur')){
                $errors[] ="Mot de Pass inexistant";
            }
            if(!is_already_in_use('login',$ident,'professeur') &&
                !is_already_in_use('email',$ident,'professeur'))
            {
                $errors[] ="Login inexistant";
            }

            if(!is_already_in_use('mot_de_pass',sha1($psw),'professeur')
                &&!is_already_in_use('login',$ident,'professeur')
                &&!is_already_in_use('email',$ident,'professeur')){
                $errors[] ="Login et Mot de Pass inexistant";
            }

            if(is_already_in_use('login',$ident,'professeur')&&
                !is_already_him('login', $ident, 'professeur', sha1($psw), 'mot_de_pass')){
                $errors[]="Mot de Pass incorrect";
            }

            if(is_already_in_use('email',$ident,'professeur')&&
                !is_already_him('email', $ident, 'professeur', sha1($psw), 'mot_de_pass')){
                $errors[]="Mot de Pass incorrect";
            }

        }
    } else {
        $errors[] = "Veuillez, remplir tous les champs";
        //--On sauvegarde les valeurs en session
        save_input_data();
    }
} else {
    clear_input_data();
}

require_once("views/login.view.php");
