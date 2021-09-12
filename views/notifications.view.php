<?php $title = "Notifications" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Vos notifications</h1>
    <?php if ($count > 0): ?>
        <?php foreach ($notifications as $notification): ?>
            <div class="info-<?= ($notification == '0') ? 'success' : 'info' ?>">
                <p>
                    <strong><?php require("partials/notifications/{$notification->name_notif}.php"); ?></strong>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucune notification disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
