<?php $title = "Ajout salle de reunion" ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <form action="" method="post" autocomplete="off">
        <div class="container-add-room-form">
            <h1>Update meeting room</h1>

            <p>Please fill in this form to update a meeting room.</p>
            <hr>
            <?php require_once('partials/_errors.php'); ?>
            <!----------------------------------------->
            <label for="intitule"><b>Entitled</b>(<i class="fas fa-asterisk"></i>)</label>
            <input type="text" placeholder="Enter entitled" name="intitule" value="<?= get_input('intitule') ?: e($user->intitule) ?>" required>
            <hr>
            <button type="submit" class="registerbtn" name="add">Update</button>
        </div>
    </form>
</div>
<?php require_once("partials/_footer.php"); ?>
