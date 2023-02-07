<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="title">
        <h1>Nouvelle catégorie</h1>
    </div>
    <?= form_open('categoryadmin/creation', 'class=form'); ?>    
        <div class="input-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="input" value="<?= set_value('nom') ?>">
        </div>
        <div class="tools" id="loginTools">
            <button class="btn loginBtn" type="submit">Créer</button>
        </div>
        <div class="message error">
            <?= validation_errors() ?>
        </div>
    <?= form_close() ?>
</div>
