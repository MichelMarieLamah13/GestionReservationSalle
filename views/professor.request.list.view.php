<?php $title = "Liste Reservation" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Liste des reservations</h1>
    <?php if ($count != 0): ?>
        <div style="overflow-x:auto;">
            <table class="liste">
                <tr>
                    <th>N°</th>
                    <th>Motif</th>
                    <th>Date Demande</th>
                    <th>Date Modification</th>
                    <th>Date Reservation</th>
                    <th>Etat</th>
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
                                <?= e($user->motif); ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?php
                                switch (e($user->etat)) {
                                    case 0:
                                        echo("En cours");
                                        break;
                                    case 2:
                                        echo("En attente");
                                        break;
                                }
                                ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->date_d) ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->date_m) ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->date_r) ?>
                            </h4>
                        </td>
                        <td class="action">
                            <h4>
                                <a title="Supprimer"
                                   href="professor.request.delete.php?id=<?= e($user->id) ?>&amp;id_user=<?= get_session('user_id') ?>"
                                   style="color: red;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a title="Modifier"
                                   href="professor.request.update.php?id=<?= e($user->id) ?>&amp;id_user=<?= get_session('user_id') ?>"
                                   style="color: blue;">
                                    <i class="fas fa-marker"></i>
                                </a></h4>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <button class="btn-print"><a href="" onclick="print_preview();"><i class="fas fa-print"></i> Print</a></button>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucune demande de réservation disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
