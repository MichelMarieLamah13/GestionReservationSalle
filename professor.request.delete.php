<?php
session_start();
require_once("includes/constants.php");
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
<?php
//--On teste l'existence de l'id dans l'adresse
if ((!empty($_GET['id'])&&$_GET['id_user']===get_session('user_id'))||is_admin()) {
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
$q=$db->prepare("DELETE FROM reservation WHERE id=?");
$q->execute([$_GET['id']]);
if(is_admin()){
    $q=$db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
    $q->execute([
        'name'=>'reservation_request_delete',
        'prof_id'=>ADMIN_ID,
        'subject_id'=>$_GET['id_user']
    ]);
}else{
    $q=$db->prepare('INSERT INTO notifications(name, prof_id,subject_id)
                            VALUES (:name, :prof_id,:subject_id)');
    $q->execute([
        'name'=>'reservation_request_delete',
        'prof_id' => get_session("user_id"),
        'subject_id' => ADMIN_ID
    ]);
}
?>
<?php
set_flash('La reservation a été supprimée avec succes', 'info');
redirect("professor.profile.php?id=" . get_session("user_id"));