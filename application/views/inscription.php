<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style/style.css">
    <?php foreach($styleSheets as $style) { ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/style/<?= $style ?>">
    <?php } ?>
    <title>E-Fanakalo | <?= $title ?></title>
</head>
<body>
    <div class="container">
        <?= form_open('inscription/inscrire', 'class=form'); ?>
            <div class="input-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="input" value="<?= set_value("nom"); ?>">
            </div>
            <div class="input-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" class="input" value="<?= set_value("prenom"); ?>">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="input" value="<?= set_value("email"); ?>">
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="input">
            </div>
            <div class="tools" id="loginTools">
                <button class="btn loginBtn" type="submit" >S'inscrire</button>
                <p>
                    Déjà un compte ? 
                    <?= anchor('login', 'Se connecter') ?>
                </p>
            </div>
            
        <?= form_close() ?>
        <div class="message error">
            <?= validation_errors() ?>
        </div>
    </div>

</body>
</html>
