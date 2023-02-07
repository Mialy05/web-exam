<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <?= form_open('site/creation', ['class' => 'form', 'enctype' => 'multipart/form-data']); ?>
        <div class="input-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="input" value="<?= set_value("nom"); ?>">
        </div>
        <div class="input-group">
            <label for="description">Description</label>
            <textarea name="description"  cols="30" rows="10"><?= set_value("description"); ?></textarea>
        </div>
        <div class="input-group">
            <label for="prix">Prix</label>
            <input type="prix" name="prix" class="input" value="<?= set_value("prix"); ?>">
        </div>
        <div class="input-group">
            <label for="photos">Photos</label>
            <input type='file' name='photos[]' class="input" multiple="">
        </div>   
        <div class="tools" id="loginTools">
            <button class="btn loginBtn" type="submit" >Créer</button>
        </div>
        <div class="message error">
            <?= validation_errors() ?> 
        </div>    
    <?= form_close() ?>
    
</div>