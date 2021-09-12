<!--Pour l'affichage des messages d'erreurs-->
<?php if (isset($errors) && count($errors) != 0): ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert">
            <span class="closebtn">&times;</span>
            <strong><?= $error . '<br/>'?></strong>
        </div>
    <?php endforeach ?>
<?php endif ?>
