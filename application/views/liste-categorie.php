

	<?= anchor('test'), 'Nouvelle Categorie' ?>
<div class="liste">
	<?php 
			for($i=0; $i<count($categories); $i++) { ?>
				<div class="card">
					<p><?= $categories[$i]->nom; ?></p>
						<div class="tools">
							<button style="background-color: rgb(77, 247, 77);">Modifier</button>
							<button style="background-color: rgb(248, 75, 75)">Supprimer</button>
						</div>
				</div>
			<?php } ?>
</div>
