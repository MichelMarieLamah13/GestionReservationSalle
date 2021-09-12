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
$q = $db->prepare("SELECT n.name name_notif, n.prof_id prof_id_notif, n.seen seen_notif,n.created_at created_at_notif,
                          p.id id_prof,p.nom nom_prof, p.prenom prenom_prof,p.email email_prof
                 FROM notifications n
                 LEFT JOIN professeur p
                 ON n.prof_id=p.id
                 WHERE subject_id=?
                 ORDER BY created_at_notif DESC
                 ");
$q->execute([get_session("user_id")]);
$notifications = $q->fetchAll(PDO::FETCH_OBJ);
$count = $q->rowCount();
$q = $db->prepare("UPDATE notifications SET seen = '1' WHERE subject_id = ?");
$q->execute([get_session("user_id")]);

require_once("views/notifications.view.php");

