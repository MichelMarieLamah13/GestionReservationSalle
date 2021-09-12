<?php $title = "Connexion" ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <form action="login.php" method="post" autocomplete="off">
        <div class="container-logIn-form">
            <h1>Log In</h1>

            <p>Please fill in this form log In.</p>
            <hr>
            <!--Pour afficher les messages d'erreurs-->
            <?php require_once('partials/_errors.php'); ?>
            <!----------------------------------------->
            <label for="ident"><b>Identification</b></label>
            <input type="text" placeholder="Enter Login or Email" name="ident" value="<?= get_input('ident'); ?>"
                   required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <hr>
            <button type="submit" class="logInbtn" name="login">Log In</button>
        </div>
</div>
</form><?php require_once("partials/_footer.php"); ?>
