<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?= anchor('categoryadmin/creer', 'Nouvelle Categorie') ?>
<div class="liste">
	<?php 
		for($i=0; $i<count($categories); $i++) { ?>
			<div class="card">
				<p><?= $categories[$i]->nom; ?></p>
					<div class="tools">
						<?= anchor('categoryadmin/modifier/'.$categories[$i]->idcategorie, 'Modifier', 'class=link success'); ?>
						<?= anchor('categoryadmin/supprimer/'.$categories[$i]->idcategorie, 'Supprimer', 'class=link danger'); ?>
					</div>
			</div>
	<?php } ?>
</div>
