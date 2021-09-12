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
$q = $db->prepare("SELECT * FROM reservation
              WHERE id_prof=:id_prof AND (etat=:value1 OR etat=:value2)
              ORDER BY motif");
$q->execute([
    'id_prof' => get_session('user_id'),
    'value1' => 0,
    'value2' => 2
]);
$users = $q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>
<?php
require_once("views/professor.request.list.view.php");

