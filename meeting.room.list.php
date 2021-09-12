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
$q=$db->query("SELECT * FROM salle_reunion ORDER BY intitule");
$users=$q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>

<?php
require_once("views/meeting.room.list.view.php");

