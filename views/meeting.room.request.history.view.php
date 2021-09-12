<?php $title = "Affichage historique" ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <div class="container-form-request">
        <h3>See the history of a request</h3>

        <p>Please fill this form, to see the history of request</p>
        <hr>
        <!--Pour afficher les messages d'erreurs-->
        <?php require_once('partials/_errors.php'); ?>
        <!---------------------------------------->
        <form action="" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="salle_r">Salle de classe</label>
                </div>
                <div class="col-75">
                    <select id="salle_r" name="salle_r">
                        <?php foreach ($users1 as $user1): ?>
                            <option value="<?= e($user1->intitule) ?>"
                                <?=get_input("salle_r") == e($user1->intitule)?"selected":"" ?>>
                                <?= e($user1->intitule) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row submit">
                <input type="submit" name="send" value="Submit">
            </div>
        </form>
        <script src="assets/js/_form.request.js"></script>
    </div>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
