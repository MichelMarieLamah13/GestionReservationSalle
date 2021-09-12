<?php
session_start();
require_once('includes/constants.php');
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
<?php
//--On teste l'existence de l'id dans l'adresse
if (!empty($_GET['id'])&&$_GET['id_user']!=get_session('user_id')&&is_admin()) {
    //--Si l'id existe, on recupère les données en bd
    $user = find_user('id', $_GET['id'], 'reservation');
    if (!$user) {
        redirect('index.php');
    }

} else {
    //--Si l'id n'existe pas, on le redirige avec les bons
    redirect("professor.profile.php?id=" . get_session('user_id'));
}

?>
    <!---Operations pour supprimer le professeur--->
<?php
$q = $db->prepare('UPDATE reservation
                   SET etat=:etat
                   WHERE  id=:id');
$q->execute([
    'etat' => 2,
    'id'=>$_GET['id']
]);

$q=$db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
$q->execute([
    'name'=>'reservation_request_waiting',
    'prof_id'=>ADMIN_ID,
    'subject_id'=>$_GET['id_user']
]);
?>
<?php
set_flash('La reservation a été mise en attente avec succes', 'info');
redirect("professor.profile.php?id=" . get_session("user_id"));