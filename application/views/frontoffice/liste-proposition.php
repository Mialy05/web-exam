<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="title">
	<h1>Mes proposition</h1>
</div>

<div class="liste"> 
	<?php  foreach ($propositions as $proposition) { ?>
		<div class="card">
			<div class="data">
				<p class="date"><?= $proposition->jour ?></p>
				<p class="message">
					<strong><?= $proposition->sender ?> </strong> vous propose d'échanger son(sa) <strong><?= $proposition->objetsender ?></strong> contre votre <strong><?= $proposition->objetreceiver ?></strong>
				</p>
			</div>
			<div class="tools">
				<?= anchor('proposition/accepter/'.$proposition->idproposition, 'Accepter', ['class' => 'link success btnLink']); ?>
				<?= anchor('proposition/refuser/'.$proposition->idproposition, 'Refuser', ['class' => 'link danger btnLink']); ?>

			</div>
		</div>
	<?php } ?>
</div>
