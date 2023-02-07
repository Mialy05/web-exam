<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $categorieNom = '';
    if(isset($category)) {
        $categorieNom = $category->nom;
    }
    else {
        $categorieNom = set_value('nom');
    }
?>

<div class="container">
    <div class="title">
        <h1>Modifier catégorie</h1>
    </div>
    <?= form_open('categoryadmin/update/'.$category->idcategorie, 'class=form'); ?>    
        <div class="input-group">
            <input type="hidden" name="idcategorie" value="<?= $category->idcategorie ?>">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="input" value="<?= $categorieNom ?>">
        </div>
        <div class="tools" id="loginTools">
            <button class="btn loginBtn" type="submit">Modifier</button>
        </div>
        <div class="message error">
            <?= validation_errors() ?>
        </div>
    <?= form_close() ?>
</div>