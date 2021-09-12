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
$q = $db->prepare("SELECT r.id id_res, r.heure_d heure_d, r.heure_f heure_f, r.date_r date_r, r.etat etat_res,r.motif motif_res,
                        p.id id_prof, p.nom nom_prof, p.prenom prenom_prof
                 FROM reservation r
                 INNER JOIN professeur p
                 ON r.id_prof=p.id
                 WHERE (r.etat=:value1 OR r.etat=:value2)
                 ORDER BY r.motif");
$q->execute([
    'value1' => 0,
    'value2' => 2
]);
$users = $q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
?>
<?php
require_once("views/request.list.view.php");

