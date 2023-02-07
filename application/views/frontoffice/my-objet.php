<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="options">
        <?= anchor('site/nouveau', 'Ajouter', 'class=btnLink'); ?>
    </div>
    <div class="home">
        <div class="liste">
            <?php foreach($objets as $objet) { ?>
                <div class="card">
                    <!-- <div class="img"> -->
                        <img src="<?= base_url().'/assets/image/code.png' ?>" alt="photo">
                    <!-- </div> -->
                    <div class="details">
                        <p class="name"><?= $objet->titre ?></p>
                        <p class="prix"><?= $objet->prix ?> MGA</p>
                    </div>
                    <div class="tools">
                        <?= anchor('objet/details/'.$objet->idobjet, 'Details', 'class=btnLink'); ?>
                    </div>
                </div>    
            <?php } ?>
        </div>
    </div>
</div> 