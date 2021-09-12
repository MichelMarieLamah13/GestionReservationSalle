<?php
session_start();
require_once('includes/constants.php');
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
    <!---Operations pour recuperer les salles--->
<?php
if(!is_admin()) {
    $q = $db->prepare("SELECT * FROM reservation
              WHERE id_prof=:id_prof AND etat=:value1
              ORDER BY motif");
    $q->execute([
        'id_prof' => get_session('user_id'),
        'value1' => 2
    ]);
}else{
    $q = $db->prepare("SELECT * FROM reservation
              WHERE(etat=:value1)
              ORDER BY motif");
    $q->execute([
        'value1' => 2
    ]);
}
$users = $q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>

<?php
require_once("views/professor.request.waiting.list.view.php");

