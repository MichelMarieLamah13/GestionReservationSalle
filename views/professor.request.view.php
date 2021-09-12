<?php $title = "Ajout de departement" ?>
<?php require_once("partials/_header.php"); ?>
<div style="padding-left:16px" class="description" id="main">
    <div class="container-form-request">
        <h3>Send reservation request</h3>

        <p>Please fill this form, to send reservation request</p>
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
            <div class="row">
                <div class="col-25">
                    <label for="date_r">Date de reservation</label>
                </div>
                <div class="col-75">
                    <input type="date" id="date_r" name="date_r" value="<?=get_input("date_r")?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="heure_d">Heure debut</label>
                </div>
                <div class="col-75">
                    <input type="time" id="heure_d" name="heure_d" value="<?=get_input("heure_d")?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="heure_f">Heure fin</label>
                </div>
                <div class="col-75">
                    <input type="time" id="heure_f" name="heure_f" value="<?=get_input("heure_f")?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="motif">Motif</label>
                </div>
                <div class="col-75">
                    <select id="motif" name="motif" onclick="marge()">
                        <?php foreach ($users2 as $user2): ?>
                            <option value="<?= e($user2->motif) ?>"
                                <?=get_input("motif") == e($user2->motif)?"selected":"" ?>><?= e($user2->motif) ?></option>
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
