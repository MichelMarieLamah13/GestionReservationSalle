<?php if (is_admin()): ?>
    <a href="request.list.php" title="Afficher la liste des réservations">
        <?=e($notification->nom_prof)?>&nbsp;<?=e($notification->prenom_prof)?>
        a modifié son profil le
<span title="<?=e($notification->created_at_notif) ?>">
    <?=e($notification->created_at_notif) ?>
</span>
    </a>
<?php else: ?>
    <a href="professor.profile.php?id=<?= get_session("user_id") ?>" title="Votre profile">
        <?= e($notification->nom_prof) ?>&nbsp;<?= e($notification->prenom_prof) ?>
        a modifié votre profil le
<span title="<?= e($notification->created_at_notif) ?>">
    <?= e($notification->created_at_notif) ?>
</span>
    </a>

<?php endif;
