<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="recherche">
	<?= form_open('objet/result', 'class=form'); ?>    
	<input type="text" class="search" name="motCle">
	<select name="category" class="input">
			<option value="0">Tous</option>
		<?php foreach($categories as $object) { ?>
			<option value="<?= $object->idcategorie ?>"><?= $object->nom ?></option>
		<?php } ?>
	</select>
	<input type="submit" value="Proposer" class="btn">
	<?= form_close() ?>
</div>

