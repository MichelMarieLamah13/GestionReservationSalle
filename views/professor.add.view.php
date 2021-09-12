<?php $title = "Ajout professeur" ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <form action="professor.add.php" method="post" autocomplete="off">
        <div class="container-registration-form">
            <h1>Register</h1>

            <p>Please fill in this form to create an account.</p>
            <hr>
            <!--Pour afficher les messages d'erreurs-->
            <?php require_once('partials/_errors.php'); ?>
            <!----------------------------------------->
            <label for="login"><b>Login</b></label>
            <input type="text" placeholder="Enter Login" name="login" value="<?= get_input('login'); ?>" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" value="<?= get_input('email'); ?>" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw_repeat" required>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="registerbtn" name="register">S'inscrire</button>
        </div>
    </form>
</div>
<?php require_once("partials/_footer.php"); ?>
