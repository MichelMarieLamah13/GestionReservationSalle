<?php $title = "Changer mot de pass" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <div class="container-form-update-password">
        <h3>Change password</h3>
        <p>Please fill this form, to update your password</p>
        <!--Pour afficher les messages d'erreurs-->
        <?php require_once('partials/_errors.php'); ?>
        <!---------------------------------------->
        <hr>
        <form action="" autocomplete="off" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="psw"><b>Mot de pass actuel</b></label>
                </div>
                <div class="col-75">
                    <input type="password" id="psw" name="psw" placeholder="Password..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="new_psw"><b>Nouveau Mot de pass</b></label>
                </div>
                <div class="col-75">
                    <input type="password" id="new_psw" name="new_psw" placeholder="New password..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="repeat_psw"><b>Confirmer Nouveau Mot de pass</b></label>
                </div>
                <div class="col-75">
                    <input type="password" id="repeat_psw" name="repeat_psw" placeholder="Repeat new password..">
                </div>
            </div>
            <div class="row submit">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
<?php require_once("partials/_footer.php"); ?>
