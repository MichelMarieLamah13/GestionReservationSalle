<?php session_start(); ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/init.php'); ?>
<?php require_once('filters/auth.filter.php'); ?>
<?php
//Si le formulaire a été soumis
if (isset($_POST['register'])) {
    //Si tous les champs ont été remplis
    if (not_empty([$_POST['login'], $_POST['email'], $_POST['psw'], $_POST['psw_repeat']])) {
        $errors = []; //Tableau contenant l'ensemble des erreurs
        extract($_POST);
        if (mb_strlen($login) < 3) {
            $errors[] = "Login trop court: (Minimum 3 caractères) ";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }

        if (mb_strlen($psw) < 6) {
            $errors[] = "Mot de pass trop court: (Minimum 6 caractères) ";
        } else {
            if ($psw != $psw_repeat) {
                $errors[] = "Les deux mots de passe ne concordent pas";
            }
        }


        if (is_already_in_use('login', $login, 'professeur')) {
            $errors[] = "Login déjà utilisé";
        }

        if (is_already_in_use('email', $email, 'professeur')) {
            $errors[] = "Adresse E-mail déjà utilisé";
        }

        if (count($errors) == 0) {
            //Envoi d'un mail d'activation
            $to = $email;
            $subject = WEBSITE_NAME . " - ACTIVATION DE COMPTE";

            $mdp=$psw;

            $psw=sha1($psw);
            $token = sha1($login . $email . $psw);

            ob_start();
            require_once('templates/emails/activation.tmpl.php');
            $content = ob_get_clean();



            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            mail($to, $subject, $content, $headers);
            //Informer l'utilisateur pourqu'il verifie sa boite de reception
            set_flash("Mail d'activation envoyé!", 'success');
            $q=$db->prepare('INSERT INTO professeur(login, email, mot_de_pass)
                            VALUES (:login, :email, :password)');
            $q->execute([
                'login'=>$login,
                'email'=>$email,
                'password'=>$psw
            ]);
            redirect('index.php');
        }else{
            save_input_data();
        }
    } else {
        $errors[] = "Veuillez SVP remplir tous les champs!";
        save_input_data();
    }
}else{
    clear_input_data();
}
require_once("views/professor.add.view.php");
