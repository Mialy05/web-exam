

	<?= anchor('test'), 'Nouvelle Categorie' ?>
<div class="liste">
	<div class="card">
		<?php 
			$categorie=array(
				'name' => 'jupe'
			);
		foreach ($categorie as $category) { ?>
			<p><?= $category['name']; ?></p>
		<?php } ?>
		
		<div class="tools">
			<button style="background-color: rgb(77, 247, 77);">Modifier</button>
			<button style="background-color: rgb(248, 75, 75)">Supprimer</button>
		</div>
	</div>
	<!-- <div class="card">
		<p>Nom Category</p>
		<div class="tools">
			<button style="background-color: rgb(77, 247, 77);">Modifier</button>
			<button style="background-color: rgb(248, 75, 75)">Supprimer</button>
		</div>
	</div>
	<div class="card">
		<p>Nom Category</p>
		<div class="tools">
			<button class="btn" style="background-color: rgb(77, 247, 77);">Modifier</button>
			<button class="btn" style="background-color: rgb(248, 75, 75)">Supprimer</button>
		</div>
	</div>	 -->
	
</div>
