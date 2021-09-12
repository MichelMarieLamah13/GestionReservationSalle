<?php
require_once("config/database.php");
define("WEBSITE_NAME","GESTION SALLE DE REUNION");
define('WEBSITE_URL','http://localhost');
?>
<!--Changer dynamiquement d'admin-->
<?php
$q=$db->query("SELECT * FROM professeur WHERE  droit='A' ORDER BY login");
$users=$q->fetch(PDO::FETCH_OBJ);
define('ADMIN_ID',$users->id);