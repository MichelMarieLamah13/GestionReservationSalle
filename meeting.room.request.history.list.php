<?php
session_start();
require_once("includes/constants.php");
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
    <!---Operations pour recuperer les salles--->
<?php
if (isset($_GET['salle'])) {
    $q = $db->prepare("SELECT * FROM reservation
              WHERE salle_r=:salle_r
              ORDER BY motif");
    $q->execute([
        'salle_r' => $_GET['salle']
    ]);
}else{
    $q = $db->query("SELECT * FROM reservation");
}
$users = $q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>

<?php
require_once("views/meeting.room.request.history.list.view.php");

