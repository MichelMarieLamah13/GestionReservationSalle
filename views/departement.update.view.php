<?php $title = "Ajout de departement" ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <form action="" method="post" autocomplete="off">
        <div class="container-add-room-form">
            <h1>Update departement</h1>
            <p>Please fill in this form to update a departement.</p>
            <hr>
            <!--Pour afficher les messages d'erreurs-->
            <?php require_once('partials/_errors.php'); ?>
            <!----------------------------------------->
            <label for="nom"><b>Nom</b>(<i class=" fas fa-asterisk fa-1x"></i>)</label>
            <input type="text" placeholder="Entrer nom" name="nom" value="<?= get_input('nom') ?: e($user->nom) ?>" required>

            <label for="sigle"><b>Sigle</b>(<i class=" fas fa-asterisk fa-1x"></i>)</label>
            <input type="text" placeholder="Entrer sigle" name="sigle" value="<?= get_input('sigle') ?: e($user->sigle) ?>" required>
            <hr>
            <button type="submit" class="registerbtn" name="add">Mise à jour</button>
        </div>
    </form>
</div>
<?php require_once("partials/_footer.php"); ?>
