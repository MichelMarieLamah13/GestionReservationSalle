<?php $title = "Edition de Profile" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<?php if ((!empty($_GET['id']) && $_GET['id'] === get_session('user_id'))||is_admin()): ?>
    <div style="padding-left:16px" class="description" id="main">
        <div class="container-form-update-prof">
            <h3>Update Profile</h3>
            <p>Please fill this form, to update your profile</p>
            <!--Pour afficher les messages d'erreurs-->
            <?php require_once('partials/_errors.php'); ?>
            <!---------------------------------------->
            <hr>
            <form action="" autocomplete="off" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="email"><b>Email</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="email" name="email" value="<?= get_input('email') ?: e($user->email) ?>"
                               placeholder="Your email..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="login"><b>Login</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="login" name="login" value="<?= get_input('login') ?: e($user->login) ?>"
                               placeholder="Your login..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="nom"><b>Last Name</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nom" name="nom" value="<?= get_input('nom') ?: e($user->nom) ?>"
                               placeholder="Your last name..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="prenom"><b>First Name</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="prenom" name="prenom"
                               value="<?= get_input('prenom') ?: e($user->prenom) ?>" placeholder="Your first name..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="tel"><b>Téléphone</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="tel" name="tel" value="<?= get_input('tel') ?: e($user->telephone) ?>"
                               placeholder="Your Phone Number..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="datea"><b>Date d'ajout</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="datea" name="datea"
                               value="<?= get_input('datea') ?: e($user->date_ajout) ?>" placeholder="Add date.."
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="datem"><b>Date de modification</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="datem" name="datem"
                               value="<?= get_input('datem') ?: e($user->date_modification) ?>"
                               placeholder="Last edit date.." disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="droit"><b>Droit</b></label>
                    </div>
                    <div class="col-75">
                        <select id="droit" name="droit" <?php if(is_admin()):?>onclick="marge1(event)"<?php else:?> disabled<?php endif;?>>
                            <option value="A" <?= $user->droit == 'A' ? "selected" : "" ?>>Admin</option>
                            <option value="U" <?= $user->droit == 'U' ? "selected" : "" ?>>User</option>
                        </select>
                    </div>
                </div>

                <div class="row departement">
                    <div class="col-25">
                        <label for="departement"><b>Departement</b></label>
                    </div>
                    <div class="col-75">
                        <select id="departement" name="departement" onclick="marge(event)">
                            <option value="gi" <?= $user->departement == 'gi' ? "selected" : "" ?>>Genie-Informatique
                            </option>
                            <option value="siad" <?= $user->departement == 'siad' ? "selected" : "" ?>>Sciences
                                Mathématiques et aide à la décision
                            </option>
                            <option value="stic" <?= $user->departement == 'stic' ? "selected" : "" ?>>Sciences et
                                Technologies Industrielles et Civiles
                            </option>
                            <option value="telecom" <?= $user->departement == 'telecom' ? "selected" : "" ?>>Télécom
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row submit">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/_form.update.prof.js"></script>
<?php endif; ?>
<?php require_once("partials/_footer.php"); ?>
