<?php
session_start();
require_once('includes/constants.php');
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');

//--On teste l'existence de l'id dans l'adresse
if ((!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) || is_admin()) {
    //--Si l'id existe, on recupère les données en bd
    $user = find_user('id', $_GET['id'], 'professeur');
    if (!$user) {
        redirect('index.php');
    }

} else {
    //--Si l'id n'existe pas, on le redirige avec les bons
    redirect("professor.profile.php?id=" . get_session('user_id'));
}

if (is_admin()) {
    if (isset($_POST['submit'])) {
        $errors = [];
//--Si tous les champs ne sont pas vides
        if (not_empty([$_POST['email'], $_POST['login'], $_POST['nom'],
            $_POST['prenom'], $_POST['tel'], $_POST['droit'], $_POST['departement']])) {
            extract($_POST);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Adresse email invalide";
            }

            if (mb_strlen($login) < 3) {
                $errors[] = "Login trop court: (Minimum 3 caractères) ";
            }

            if (mb_strlen($nom) < 3) {
                $errors[] = "Nom trop court: (Minimum 3 caractères) ";
            }

            if (mb_strlen($prenom) < 3) {
                $errors[] = "Prenom trop court: (Minimum 3 caractères) ";
            }

            if (!preg_match("#^0[56]([-. ]?[0-9]{2}){4}$#", $tel)) {
                $errors[] = "Numéro de téléphone invalide";
            }

            if (is_already_in_use('login', $login, 'professeur') &&
                !is_already_him('id', $_GET['id'], 'professeur', $login, 'login')
            ) {
                $errors[] = "Login déjà utilisé";
            }

            if (is_already_in_use('email', $email, 'professeur') &&
                !is_already_him('id', $_GET['id'], 'professeur', $email, 'email')
            ) {
                $errors[] = "Adresse E-mail déjà utilisé";
            }

            if (count($errors) == 0) {
                //---Requete pour selectionner les users
                //--Ayant l'email ou le pseudo
                $q = $db->prepare("UPDATE professeur
            SET email=:email,login=:login, nom=:nom, prenom=:prenom,
            telephone=:telephone,droit=:droit,departement=:departement
            WHERE id=:id
            ");
                $q->execute([
                    'email' => $email,
                    'login' => $login,
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'telephone' => $tel,
                    'droit' => $droit,
                    'departement' => $departement,
                    'id' => $_GET['id']
                ]);

                if (is_admin()) {
                    $q = $db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
                    $q->execute([
                        'name' => 'profile_update',
                        'prof_id' => ADMIN_ID,
                        'subject_id' => $_GET['id']
                    ]);
                } else {
                    $q = $db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
                    $q->execute([
                        'name' => 'profile_update',
                        'prof_id' => get_session("user_id"),
                        'subject_id' => ADMIN_ID
                    ]);
                }
                if (get_session('user_id') === $_GET['id']) {
                    set_flash('Votre profile a été mis à jour avec succes', 'info');
                } else {
                    set_flash('Vous avez modifié son profile avec succes', 'info');
                }

                redirect("professor.profile.php?id=" . get_session("user_id"));

            } else {
                save_input_data();
            }
        } else {
            $errors[] = "Veuillez, remplir tous les champs";
//--On sauvegarde les valeurs en session
            save_input_data();
        }
    } else {
        clear_input_data();
    }
}else{
    if (isset($_POST['submit'])) {
        $errors = [];
//--Si tous les champs ne sont pas vides
        if (not_empty([$_POST['email'], $_POST['login'], $_POST['nom'],
            $_POST['prenom'], $_POST['tel'], $_POST['departement']])) {
            extract($_POST);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Adresse email invalide";
            }

            if (mb_strlen($login) < 3) {
                $errors[] = "Login trop court: (Minimum 3 caractères) ";
            }

            if (mb_strlen($nom) < 3) {
                $errors[] = "Nom trop court: (Minimum 3 caractères) ";
            }

            if (mb_strlen($prenom) < 3) {
                $errors[] = "Prenom trop court: (Minimum 3 caractères) ";
            }

            if (!preg_match("#^0[56]([-. ]?[0-9]{2}){4}$#", $tel)) {
                $errors[] = "Numéro de téléphone invalide";
            }

            if (is_already_in_use('login', $login, 'professeur') &&
                !is_already_him('id', $_GET['id'], 'professeur', $login, 'login')
            ) {
                $errors[] = "Login déjà utilisé";
            }

            if (is_already_in_use('email', $email, 'professeur') &&
                !is_already_him('id', $_GET['id'], 'professeur', $email, 'email')
            ) {
                $errors[] = "Adresse E-mail déjà utilisé";
            }

            if (count($errors) == 0) {
                //---Requete pour selectionner les users
                //--Ayant l'email ou le pseudo
                $q = $db->prepare("UPDATE professeur
            SET email=:email,login=:login, nom=:nom, prenom=:prenom,
            telephone=:telephone,departement=:departement
            WHERE id=:id
            ");
                $q->execute([
                    'email' => $email,
                    'login' => $login,
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'telephone' => $tel,
                    'departement' => $departement,
                    'id' => $_GET['id']
                ]);

                if (is_admin()) {
                    $q = $db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
                    $q->execute([
                        'name' => 'profile_update',
                        'prof_id' => ADMIN_ID,
                        'subject_id' => $_GET['id']
                    ]);
                } else {
                    $q = $db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
                    $q->execute([
                        'name' => 'profile_update',
                        'prof_id' => get_session("user_id"),
                        'subject_id' => ADMIN_ID
                    ]);
                }
                if (get_session('user_id') === $_GET['id']) {
                    set_flash('Votre profile a été mis à jour avec succes', 'info');
                } else {
                    set_flash('Vous avez modifié son profile avec succes', 'info');
                }

                redirect("professor.profile.php?id=" . get_session("user_id"));

            } else {
                save_input_data();
            }
        } else {
            $errors[] = "Veuillez, remplir tous les champs";
//--On sauvegarde les valeurs en session
            save_input_data();
        }
    } else {
        clear_input_data();
    }
}
require_once("views/professor.update.profile.view.php");
