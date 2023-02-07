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
    <!--<div class="home">
        <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="">
                <p>Details</p>
            </div>
        </div>

        <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="">
                <p>Details</p>
            </div>
        </div>

         <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="">
                <p>Details</p>
            </div>
           </div>

        <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="<?= site_url(); ?>">
                <p>Details</p>
            </div>
            </div>

        <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="<?= site_url(); ?>">
                <p>Details</p>
            </div>
       </div> 
       <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="<?= site_url(); ?>">
                <p>Details</p>
            </div>
       </div> 
       <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="<?= site_url(); ?>">
                <p>Details</p>
            </div>
       </div> 
       <div class="liste">
            <div class="card">
                <p>image</p>
            </div>
            <div class="details">
                <div class="nom"><p>Nom:</p></div>
                <div class="prix"><p>prix:</p></div>
            </div>
            <div class="a"  href="">
                <p>Details</p>
            </div>
       </div> 
 -->