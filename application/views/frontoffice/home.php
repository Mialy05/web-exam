<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="title">
        <h1>Découvrir</h1>
    </div>
    <div class="home">
        <div class="liste">
            <?php foreach($objets as $objet) { ?>
                    <div class="card">
                        <img src="<?= base_url().'assets/image/'.$objet->photo ?>" alt="photo">
                   
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