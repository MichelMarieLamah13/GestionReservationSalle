<?php $title = "Liste Professeur" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Liste des departements</h1>
    <?php if ($count != 0): ?>
        <div style="overflow-x:auto;">
            <table class="liste">
                <tr>
                    <th>N°</th>
                    <th>Sigle</th>
                    <th>Nom</th>
                    <?php if(is_admin()):?>
                    <th class="action">Action</th>
                    <?php endif;?>
                </tr>
                <?php $i = 0 ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <h4>
                                <?= ++$i; ?>
                            </h4>
                        </td>
                        <td>
                            <h4>
                                <?= e($user->sigle) ?>
                            </h4>
                        </td>

                        <td>
                            <h4>
                                <?= e($user->nom) ?>
                            </h4>
                        </td>
                        <?php if(is_admin()):?>
                        <td class="action">
                            <h4>
                                <a href="departement.delete.php?id=<?= e($user->id) ?>&amp;id_user=<?= get_session('user_id') ?>"
                                   style="color: red;">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="departement.update.php?id=<?= e($user->id) ?>&amp;id_user=<?= get_session('user_id') ?>"
                                   style="color: blue;">
                                    <i class="fas fa-marker"></i>
                                </a></h4>
                        </td>
                        <?php endif;?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
       <button class="btn-print"><a href="" onclick="print_preview();"><i class="fas fa-print"></i> Print</a></button>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucun departement disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
