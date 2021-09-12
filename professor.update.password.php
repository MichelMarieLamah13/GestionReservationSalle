<?php
session_start();
require_once('includes/constants.php');
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');

if (isset($_POST['submit'])) {
    $errors = [];
//--Si tous les champs ne sont pas vides
    if (not_empty([$_POST['psw'], $_POST['new_psw'], $_POST['repeat_psw']])) {
        extract($_POST);

        if (mb_strlen($new_psw) < 6) {
            $errors[] = "Mot de pass trop court: (Minimum 6 caractères) ";
        } else {
            if ($new_psw != $repeat_psw) {
                $errors[] = "Les deux mots de passe ne concordent pas";
            }
        }

        if (count($errors) == 0) {

            $q = $db->prepare("SELECT * FROM professeur
                         WHERE  id=:id
                         AND mot_de_pass=:password
                         AND active='1'");
            $q->execute([
                'id' => get_session("user_id"),
                'password' => sha1($psw)
            ]);

            //--Calcul le nombre de ligne
            $userHasBeenFound = $q->rowCount();
            //--Pouvoir recupérer les données sous forme d'objet
            $user = $q->fetch(PDO::FETCH_OBJ);
            //--Si un user trouvé

            if ($userHasBeenFound) {
                //---Requete pour selectionner les users
                //--Ayant l'email ou le pseudo
                $q = $db->prepare("UPDATE professeur
                SET mot_de_pass=:password
                WHERE id=:id
                ");
                $q->execute([
                    'password'=>sha1($new_psw),
                    'id' => get_session('user_id')
                ]);
                set_flash('Votre mot de pass a été modifié avec succes', 'info');
                redirect("professor.profile.php?id=" . get_session("user_id"));

            } else {
                    $errors[] = "Mot de pass actuel incorrect";
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
require_once("views/professor.update.password.view.php");
