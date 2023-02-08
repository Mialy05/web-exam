<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="menu" >
    <div class="nav-burger">
        <span class="burger" ></span>
    </div>
    <ul class="navbar" >
        <li class="nav-item">
            <?= anchor('admin/', 'Gérer les catégories') ?>
        </li>
        <li class="nav-item">
            <?= anchor('statistique/stat', 'Statistiques') ?>
        </li>
        <li class="nav-item">
            <?= anchor('login/logout', 'Se déconnecter') ?>
        </li>
    </ul>
</div>
<script src="<?= base_url() ?>assets/js/menu.js"></script>