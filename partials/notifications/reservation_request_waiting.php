<a href="professor.profile.php?id=<?= get_session("user_id") ?>" title="Votre profile">
    <?= e($notification->nom_prof) ?>&nbsp;<?= e($notification->prenom_prof) ?>
    a mis en attente votre demande de réservation le
<span title="<?= e($notification->created_at_notif) ?>">
    <?= e($notification->created_at_notif) ?>
</span>
</a>
