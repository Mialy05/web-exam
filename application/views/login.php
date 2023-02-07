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
    <title><?= $title ?></title>
    <?php $admin ="rakoto@gmail.com" ?>
</head>
<body>
    <div class="front">
        <form action="" method="post" class="form login">
            <div class="input-group">
                <label for="nom">Email</label>
                <input type="email" name="email" class="input" value="<?= set_value("email"); ?>">
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="input">
            </div>
            <div class="tools" id="loginTools">
                <button class="btn loginBtn" >Se connecter</button>
                <p>
                    Pas encore de compte? 
                    <a href="" class="link">S'inscrire</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
