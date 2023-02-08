<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="menu" >
    <div class="nav-burger">
        <span class="burger" ></span>
    </div>
    <ul class="navbar" >
        <li class="nav-item">
            <?= anchor('site/', 'Découvrir') ?>
        </li>
        <li class="nav-item">
            <?= anchor('objet/myobjets', 'Mes objets') ?>
        </li>
        <li class="nav-item">
            <?= anchor('proposition/mesAttente', 'Proposition') ?>
        </li>
        <li class="nav-item">
            <?= anchor('objet/search', 'Rechercher') ?>
        </li>
        <li class="nav-item">
            <?= anchor('login/logout', 'Se déconnecter') ?>
        </li>
    </ul>
</div>
<script src="<?= base_url() ?>assets/js/menu.js"></script>