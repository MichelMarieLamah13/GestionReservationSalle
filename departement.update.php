<?php session_start(); ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('filters/auth.filter.php'); ?>
<?php require_once('includes/init.php'); ?>
<?php
//--On teste l'existence de l'id dans l'adresse
if (!empty($_GET['id'])&&$_GET['id_user']===get_session('user_id')) {
    //--Si l'id existe, on recupère les données en bd
    $user = find_user('id', $_GET['id'], 'departement');
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
    if (not_empty([$_POST['nom'],$_POST['sigle']])) {
        $errors = []; //Tableau contenant l'ensemble des erreurs
        extract($_POST);

        if (mb_strlen($nom) < 3) {
            $errors[] = "Nom trop court: (Minimum 3 caractères) ";
        }

        if (mb_strlen($sigle) < 2) {
            $errors[] = "Sigle trop court: (Minimum 2 caractères) ";
        }

        if (is_already_in_use('nom', $nom, 'departement')&&
            !is_already_him('id', $_GET['id'], 'departement', $nom, 'nom')) {
            $errors[] = "Nom déjà utilisé";
        }

        if (is_already_in_use('sigle', $sigle, 'departement') &&
            !is_already_him('id', $_GET['id'], 'departement', $sigle, 'sigle')) {
            $errors[] = "Sigle déjà utilisé";
        }

        if (count($errors) == 0) {
            set_flash("Departement modifié avec succès!", 'success');
            $q = $db->prepare('UPDATE departement
                               SET sigle=:sigle,nom=:nom
                               WHERE  id=:id');
            $q->execute([
                'sigle' => $sigle,
                'nom' => $nom,
                'id'=>$_GET['id']
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
require_once("views/departement.update.view.php");
