<?php session_start(); ?>
<?php include("includes/constants.php"); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/init.php'); ?>
<?php require_once('filters/auth.filter.php'); ?>
<?php
//Si le formulaire a été soumis
if (isset($_POST['add'])) {
    //Si tous les champs ont été remplis
    if (not_empty([$_POST['nom'],$_POST['sigle']])) {
        $errors = []; //Tableau contenant l'ensemble des erreurs
        extract($_POST);

        if (mb_strlen($nom) < 3) {
            $errors[] = "Nom trop court: (Minimum 3 caractères) ";
        }

        if (mb_strlen($sigle) < 2) {
            $errors[] = "Sigle trop court: (Minimum 2 caractères) ";
        }

        if (is_already_in_use('nom', $nom, 'departement')) {
            $errors[] = "Nom déjà utilisé";
        }

        if (is_already_in_use('sigle', $sigle, 'departement')) {
            $errors[] = "Sigle déjà utilisé";
        }

        if (count($errors) == 0) {
            set_flash("Departement ajouté avec succès!", 'success');
            $q=$db->prepare('INSERT INTO departement(nom,sigle)
                            VALUES (:nom,:sigle)');
            $q->execute([
                'nom'=>$nom,
                'sigle'=>$sigle
            ]);
            redirect('professor.profile.php?id=' . get_session('user_id'));
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
require_once("views/departement.add.view.php");
