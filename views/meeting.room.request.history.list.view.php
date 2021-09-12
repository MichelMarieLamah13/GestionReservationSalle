<?php $title = "Liste Reservation en cours" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Historique des reservation de <?=isset($_GET['salle'])?$_GET['salle']:"toutes les salles"?></h1>
    <?php if ($count != 0): ?>
        <div style="overflow-x:auto;">
            <table class="liste">
                <tr>
                    <th>N°</th>
                    <th>Motif</th>
                    <th>Date</th>
                    <th>Debut</th>
                    <th>Fin</th>
                </tr>
                <?php foreach ($users as $key => $user): ?>
                    <tr>
                        <td>
                            <h4>
                                <?= $key + 1; ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->motif) ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->date_r) ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->heure_d) ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->heure_f) ?>
                            </h4>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <button class="btn-print"><a href="" onclick="print_preview();"><i class="fas fa-print"></i> Print</a></button>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucune reservation disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
