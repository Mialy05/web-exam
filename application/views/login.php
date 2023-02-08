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

    <?php 
        $emailValue = '';
        $pwd = '';
        if(isset($email, $password)) {
            $emailValue = $email;
            $pwd = $password;
        }
        else {
            $emailValue = set_value('email');
        }
    ?>
</head>
<body>
    <div class="container">
        <?= form_open('login/authentification', 'class=form'); ?>    
            <div class="input-group">
                <label for="nom">Email</label>
                <input type="text" name="email" class="input" value="<?= $emailValue; ?>">
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="input" value="<?= $pwd ?>">
            </div>
            <div class="tools" id="loginTools">
                <button class="btn loginBtn" type="submit">Se connecter</button>
                <p>
                    Pas encore de compte? 
                    <?= anchor('inscription', 'S\'inscrire'); ?>
                </p>
            </div>
            <div class="message error">
                <?= validation_errors() ?>
                <?php 
                    if(isset($error)) { ?>
                        <p><?= $error ?></p>
                    <?php }
                ?>
            </div>
        <?= form_close() ?>
    </div>

</body>
</html>
