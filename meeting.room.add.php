<?php session_start(); ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/init.php'); ?>
<?php require_once('filters/auth.filter.php'); ?>

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

        if (is_already_in_use('intitule', $intitule, 'salle_reunion')) {
            $errors[] = "Intitulé déjà utilisé";
        }

        if (count($errors) == 0) {
            set_flash("Salle de réunion ajoutée avec succès!", 'success');
            $q=$db->prepare('INSERT INTO salle_reunion(intitule)
                            VALUES (:intitule)');
            $q->execute([
                'intitule'=>$intitule
            ]);
            redirect('professor.profile.php?id=' . get_session('user_id'));
        }else{
            save_input_data();
        }
    } else {
        $errors[] = "Veuillez SVP remplir intitulé!";
        save_input_data();
    }
}else{
    clear_input_data();
}
require_once("views/meeting.room.add.view.php");
