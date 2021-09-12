<?php
session_start();
require_once("includes/constants.php");
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
<!---Operations pour recuperer les professeurs--->
<?php
$q=$db->prepare("SELECT * FROM professeur
              WHERE  active=:active AND droit=:droit
              ORDER BY login");
$q->execute([
    'active'=>'1',
    'droit'=>'U'
]);
$users=$q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>
<?php
require_once("views/professor.list.view.php");

