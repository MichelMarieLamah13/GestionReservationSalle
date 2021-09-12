<?php $title = "Profile Professeur" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <div class="card">
        <img src="media/img/img_avatar.png" alt="Avatar" style="width:100%">

        <div class="card-container">
            <h4><b><?= e($user->login) ?></b></h4>

            <p>Web Designer</p>
            <h4>
                <b>
                    <?=
                    e($user->email)
                        ? '<i class="fas fa-envelope"></i>&nbsp;<a href="mailto:' . e($user->email) . '">' . e($user->email) . '</a>'
                        : "";
                    ?>
                </b>
            </h4>

        </div>
    </div>
    <?php if ((!empty($_GET['id']) && $_GET['id'] === get_session('user_id'))||is_admin()): ?>
        <div class="update-form-container">
            <h3>My personals informations</h3>

            <p>This form contains all informations on my account</p>
            <hr>
            <!--Pour afficher les messages d'erreurs-->
            <?php require_once('partials/_errors.php');?>
            <!----------------------------------------->
            <form>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Your email.."
                       value="<?= get_input('email') ?: e($user->email) ?>" disabled>

                <label for="login">Login</label>
                <input type="text" id="login" name="login" placeholder="Your login.."
                       value="<?= get_input('login') ?: e($user->login) ?>" disabled>

                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Your last name.."
                       value="<?= get_input('nom') ?: e($user->nom) ?>" disabled>

                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Your first name.."
                       value="<?= get_input('prenom') ?: e($user->prenom) ?>" disabled>

                <label for="tel">Téléphpne</label>
                <input type="text" id="tel" name="tel" placeholder="Your phone number.."
                       value="<?= get_input('tel') ?: e($user->telephone) ?>" disabled>

                <label for="datea">Date d'ajout</label>
                <input type="text" id="datea" name="datea" placeholder="Add date.."
                       value="<?= get_input('datea') ?: e($user->date_ajout) ?>" disabled>

                <label for="datem">Dernière modification</label>
                <input type="text" id="datem" name="datem" placeholder="last edit date.."
                       value="<?= get_input('datem') ?: e($user->date_modification) ?>" disabled>

                <label for="droit">Droit</label>
                <select id="droit" name="droit" disabled>
                    <option value="A" <?= ($user->droit == 'A') ?"selected":"" ?>>Admin</option>
                    <option value="U" <?= ($user->droit == 'U') ?"selected":"" ?>>User</option>
                </select>


                <label for="departement">Département</label>
                <select id="departement" name="departement" disabled>
                    <option value="gi" <?= ($user->departement == "gi") ? "selected":"" ?>>Genie-Informatique</option>
                    <option value="siad" <?= ($user->departement == "siad") ?"selected":"" ?>>Sciences Mathématiques et aide à la décision</option>
                    <option value="stic" <?= ($user->departement == "stic") ?"selected":""?>>Sciences et Technologies Industrielles et Civiles</option>
                    <option value="telecom" <?= ($user->departement == "telecom") ?"selected":""?>>Télécom</option>
                </select>

            </form>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
