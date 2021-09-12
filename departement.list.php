<?php
session_start();
require_once("includes/constants.php");
require_once('config/database.php');
require_once('includes/functions.php');
require_once('filters/auth.filter.php');
?>
<?php require_once('includes/init.php'); ?>
    <!---Operations pour recuperer les salles--->
<?php
$q=$db->query("SELECT * FROM departement ORDER BY sigle");
$users=$q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>
<?php
require_once("views/departement.list.view.php");

