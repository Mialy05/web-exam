<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="options">
        <?= anchor('categoryadmin/creer', 'Nouvelle Categorie', 'class=btnLink'); ?>
    </div>
<div class="liste">
	<?php 
		for($i=0; $i<count($categories); $i++) { ?>
			<div class="card">
				<p><?= $categories[$i]->nom; ?></p>
					<div class="tools">
						<?= anchor('categoryadmin/modifier/'.$categories[$i]->idcategorie, 'Modifier', ['class' => 'btn btnLink success']); ?>
					</div>
			</div>
	<?php } ?>
</div>
