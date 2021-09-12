<?php $title = "Liste Professeur" ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("partials/_header.php"); ?>
<div id="main">
	<h1>Liste des utilisateurs</h1>

	<div style="overflow-x:auto;">
		<table>
			<tr>
				<th>N°</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Departement</th>
				<th>Téléphone</th>
				<th>Email</th>
				<th>Action</th>
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

				<td>
					<a href="professor.delete.php?id=<?= e($user->id) ?>">
						<h4 style="color: red;"><i class="fas fa-trash-alt"></i></h4>
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
</div>
<?php require_once("partials/_footer.php"); ?>
