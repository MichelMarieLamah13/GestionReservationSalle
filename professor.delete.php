<?php
session_start();
require_once("includes/constants.php");
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
    <!---Operations pour supprimer le professeur--->
<?php
if(is_admin()){
$q=$db->prepare("SELECT * FROM professeur
              WHERE  id=?");
$q->execute([$_GET['id']]);
$users=$q->fetch(PDO::FETCH_OBJ);
//Envoi d'un mail d'activation
$to = $users->email;
$subject = WEBSITE_NAME . " - SUPPRESSION DE COMPTE";

ob_start();
require_once('templates/emails/desactivation.tmpl.php');
$content = ob_get_clean();

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $subject, $content, $headers);

$q=$db->prepare("DELETE FROM professeur WHERE id=?");
$q->execute([$_GET['id']]);
set_flash('Le professeur a été supprimé avec succes', 'info');}
?>
<?php
redirect("professor.profile.php?id=" . get_session("user_id"));