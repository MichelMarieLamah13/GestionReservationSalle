<?php $title = "Liste Reservations traitées" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Liste des reservations traitées</h1>
    <?php if ($count != 0): ?>
        <div style="overflow-x:auto;">
            <table class="liste">
                <tr>
                    <th>N°</th>
                    <th>Motif</th>
                    <th>Date</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th class="action">Action</th>
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
                        <td class="action">
                            <h4>
                                <a title="Déjà traité"
                                   href="professor.profile.php?id=<?= get_session('user_id') ?>"
                                   style="color: blue;">
                                    <i class="fas fa-check-circle"></i>
                                </a></h4>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <button class="btn-print"><a href="" onclick="print_preview();"><i class="fas fa-print"></i> Print</a></button>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucune demande traitée disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
