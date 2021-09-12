<?php session_start(); ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/init.php'); ?>
<?php require_once('filters/auth.filter.php'); ?>
<?php
//--On teste l'existence de l'id dans l'adresse
if (!empty($_GET['id'])&&$_GET['id']===get_session('user_id')) {
    //--Si l'id existe, on recupère les données en bd
    $user = find_user('id', $_GET['id'], 'salle_reunion');
    if (!$user) {
        redirect('index.php');
    }

} else {
    //--Si l'id n'existe pas, on le redirige avec les bons
    redirect("professor.profile.php?id=" . get_session('user_id'));
}

?>
<?php
//Si le formulaire a été soumis
if (isset($_POST['add'])) {
    //Si tous les champs ont été remplis
    if (not_empty([$_POST['intitule']])) {
        $errors = []; //Tableau contenant l'ensemble des erreurs
        extract($_POST);
        if (!preg_match("#^salle de reunion [1-9]+$#", $intitule)) {
            $errors[] = "Intitulé invalide";
        }

        if (is_already_in_use('intitule', $intitule, 'salle_reunion') &&
            !is_already_him('id', $_GET['id'], 'salle_reunion', $intitule, 'intitule')
        ) {
            $errors[] = "Intitulé déjà utilisé";
        }

        if (count($errors) == 0) {
            set_flash("Salle de réunion modifiée avec succès!", 'success');
            $q = $db->prepare('UPDATE salle_reunion
                               SET intitule=:intitule
                               WHERE  id=:id');
            $q->execute([
                'intitule' => $intitule,
                'id'=>$_GET['id']
            ]);
            redirect('professor.profile.php?id=' . get_session('user_id'));
        } else {
            save_input_data();
        }
    } else {
        $errors[] = "Veuillez SVP remplir intitulé!";
        save_input_data();
    }
} else {
    clear_input_data();
}
require_once("views/meeting.room.update.view.php");
