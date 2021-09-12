<?php $title = "Liste Reservation" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Liste des demandes de reservations</h1>
    <?php if ($count != 0): ?>
        <div style="overflow-x:auto;">
            <table class="liste">
                <tr>
                    <th>N°</th>
                    <th>Expéditeur</th>
                    <th>Motif</th>
                    <th>Date</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Etat</th>
                    <?php if(is_admin()):?>
                    <th class="action">Action</th>
                    <?php endif;?>
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
                                <?= e($user->nom_prof); ?>&nbsp;<?= e($user->prenom_prof); ?>
                            </h4>
                        </td>

                        <td>
                            <h4>
                                <?= e($user->motif_res) ?>
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
                        <td>
                            <h4>
                                <?php
                                switch (e($user->etat_res)) {
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

                        <td class="action">
                            <h4>
                                <?php if(is_admin()):?>
                                <a title="Supprimer"
                                   href="professor.request.delete.php?id=<?= e($user->id_res) ?>&amp;id_user=<?= e($user->id_prof) ?>"
                                   style="color: red;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a title="Accepter"
                                   href="request.accept.php?id=<?= e($user->id_res) ?>&amp;id_user=<?= e($user->id_prof) ?>"
                                   style="color: green;">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                                <?php endif;?>
                                <?php if (e($user->etat_res) != 2 && is_admin()): ?>
                                    &nbsp;&nbsp;
                                    <a title="Mettre en attente"
                                       href="request.waiting.php?id=<?= e($user->id_res) ?>&amp;id_user=<?= e($user->id_prof) ?>"
                                       style="color: blue;">
                                        <i class="fas fa-hourglass-half"></i>
                                    </a>
                                <?php endif; ?>
                            </h4>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <button class="btn-print"><a href="" onclick="print_preview();"><i class="fas fa-print"></i> Print</a></button>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucune demande de reservation disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
