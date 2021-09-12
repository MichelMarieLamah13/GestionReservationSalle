<!--
    Cette partie permet d'afficher les messages
    dans d'autres pages
-->
<?php if (isset($_SESSION['notification']['message'])): ?>
    <div class="alert <?=$_SESSION['notification']['type']?>">
        <span class="closebtn">&times;</span>
        <strong><?= $_SESSION['notification']['message'] ?></strong>
    </div>
    <?php $_SESSION['notification']=[]?>
<?php endif; ?>
