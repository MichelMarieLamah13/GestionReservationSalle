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

$q2 = $db->query("SELECT * FROM motif_reunion ORDER BY motif");
$users2 = $q2->fetchAll(PDO::FETCH_OBJ);
?>
<?php if ($countRoom > 0): ?>
    <?php
    if ((!empty($_GET['id']) && $_GET['id'] === get_session('user_id'))&&!is_admin()) {
        //Si le formulaire a été soumis
        if (isset($_POST['send'])) {
            //Si tous les champs ont été remplis
            if (not_empty([$_POST['motif'], $_POST['salle_r'], $_POST['date_r'],$_POST['heure_f'],$_POST['heure_d']])) {
                $errors = []; //Tableau contenant l'ensemble des erreurs
                extract($_POST);
                if(is_correct($heure_f,$heure_d,':')){
                    $errors[]="Heure de fin inférieure à Heure de début";
                }
                if(is_correct($date_r,date("Y-m-d"),'-')){
                    $errors[]="Date inférieure à la date d'aujourd'hui";
                }
                if (is_already_sent('id_prof', get_session('user_id'), 'motif', $motif, 'etat', 'reservation')) {
                    $errors[] = "Vous avez déjà envoyé cette demande";
                }
                if (count($errors) == 0) {
                    set_flash("Demande de reservation envoyée avec succès!", 'success');
                    $q = $db->prepare('INSERT INTO reservation(motif,id_prof,salle_r,date_r,heure_d,heure_f)
                            VALUES (:motif,:id_prof,:salle_r,:date_r,:heure_d,:heure_f)');
                    $q->execute([
                        'motif' => $motif,
                        'id_prof' => get_session('user_id'),
                        'salle_r' => $salle_r,
                        'date_r' => $date_r,
                        'heure_d'=>$heure_d,
                        'heure_f'=>$heure_f
                    ]);

                    $q = $db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
                    $q->execute([
                        'name' => 'reservation_request_sent',
                        'prof_id' => get_session("user_id"),
                        'subject_id' => ADMIN_ID
                    ]);

                    redirect('professor.profile.php?id=' . get_session('user_id'));
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
    require_once("views/professor.request.view.php");
    ?>
<?php else: ?>
    <div class="info-warning">
        <p><strong>Aucune salle de réunion disponible pour l'instant!</strong></p>
    </div>
<?php endif; ?>
