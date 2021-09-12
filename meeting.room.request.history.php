<?php session_start(); ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once('config/database.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/init.php'); ?>
<?php require_once('filters/auth.filter.php'); ?>
<!---Récupération des salles de classe et motifs des réunion-->
<?php
$q1 = $db->query("SELECT * FROM salle_reunion ORDER BY intitule");
$users1 = $q1->fetchAll(PDO::FETCH_OBJ);
$countRoom = $q1->rowCount();
?>
<?php if ($countRoom > 0): ?>
    <?php
    if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) {
        //Si le formulaire a été soumis
        if (isset($_POST['send'])) {
            //Si tous les champs ont été remplis
            if (not_empty([$_POST['salle_r']])) {
                $errors = []; //Tableau contenant l'ensemble des erreurs
                extract($_POST);
                if (count($errors) == 0) {
                    redirect('meeting.room.request.history.list.php?salle=' . $salle_r);
                } else {
                    save_input_data();
                }
            } else {
                $errors[] = "Veuillez SVP tous les champs!";
                save_input_data();
            }
        } else {
            clear_input_data();
        }

    } else {
        //--Si l'id n'existe pas, on le redirige avec les bons
        redirect("professor.profile.php?id=" . get_session('user_id'));
    }
    require_once("views/meeting.room.request.history.view.php");
    ?>
<?php else: ?>
    <div class="info-warning">
        <p><strong>Aucune salle de réunion disponible pour l'instant!</strong></p>
    </div>
<?php endif; ?>
