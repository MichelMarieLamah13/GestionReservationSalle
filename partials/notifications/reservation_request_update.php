<a href="request.list.php" title="Afficher la liste des réservations">
    <?=e($notification->nom_prof)?>&nbsp;<?=e($notification->prenom_prof)?>
    a modifié sa demande de réservation le
<span title="<?=e($notification->created_at_notif) ?>">
    <?=e($notification->created_at_notif) ?>
</span>
</a>