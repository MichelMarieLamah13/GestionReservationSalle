<?php $title = "Liste Professeur" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
    <h1>Liste des utilisateurs</h1>
    <?php if ($count != 0): ?>
        <div style="overflow-x:auto;">
            <table class="liste">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Departement</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <?php if(is_admin()):?>
                    <th class="action">Action</th>
                    <?php endif;?>
                </tr>
                <?php foreach ($users as $key=>$user): ?>
                    <tr>
                        <td>
                            <a href="professor.profile.php?id=<?= e($user->id) ?>">
                                <h4><?= $key+1; ?></h4>
                            </a>
                        </td>
                        <td>
                            <a href="professor.profile.php?id=<?= e($user->id) ?>">
                                <h4><?= e($user->nom) ?></h4>
                            </a>
                        </td>

                        <td>
                            <a href="professor.profile.php?id=<?= e($user->id) ?>">
                                <h4><?= e($user->prenom) ?></h4>
                            </a>
                        </td>

                        <td>
                            <a href="professor.profile.php?id=<?= e($user->id) ?>">
                                <h4><?= e($user->departement) ?></h4>
                            </a>
                        </td>

                        <td>
                            <a href="professor.profile.php?id=<?= e($user->id) ?>">
                                <h4><?= e($user->telephone) ?></h4>
                            </a>
                        </td>

                        <td>
                            <a href="professor.profile.php?id=<?= e($user->id) ?>">
                                <h4><?= e($user->email) ?></h4>
                            </a>
                        </td>

                        <?php if(is_admin()):?>
                        <td class="action">
                            <a href="professor.delete.php?id=<?= e($user->id) ?>">
                                <h4 style="color: red;"><i class="fas fa-trash-alt"></i></h4>
                            </a>
                        </td>
                        <?php endif;?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <button class="btn-print"><a href="" onclick="print_preview();"><i class="fas fa-print"></i> Print</a></button>
    <?php else: ?>
        <div class="info-warning">
            <p><strong>Aucun professeur disponible pour l'instant!</strong></p>
        </div>
    <?php endif; ?>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
