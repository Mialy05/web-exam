<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="details">
    <div class="title"><h1>Détails sur <?= $categorie->titre ?></h1></div>
    <div class="container">
        <div class="left-side">
            <img src="<?= base_url() ?>/assets/image/code.png" alt="Photo principale">
        </div>
        <div class="right-side">
            <div class="data">
                <div class="subtitle">Propriétaire</div>
                <div class="info name" ><?= $categorie->proprietaire ?></div>
            </div>
            <div class="data">
                <div class="subtitle">Description</div>
                <div class="info"><?= $categorie->description ?></div>
            </div>
            <div class="data">
                <div class="subtitle">Prix estimatif</div>
                <div class="info"><?= $categorie->prix ?> MGA</div>
            </div>
            <?php if($form == TRUE) {
                echo form_open('proposition/proposer', array('class' => 'form'));
            ?>
                <input type="hidden" name="objetreceiver" value="<?= $categorie->idobjet; ?>" >
                <input type="hidden" name="idreceiver" value="<?= $categorie->idproprietaire; ?>" >
                <select name="objetsender" class="input">
                    <?php foreach($myobjects as $object) { ?>
                        <option value="<?= $object->idobjet ?>"><?= $object->titre ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Proposer" class="btn">
            <?php 
                echo form_close();
            } ?>
        </div>
    </div>
    <div class="photos">
        <div class="liste">
            <?php foreach($photos as $photo) { ?>
                <div class="img-container">
                    <img src="<?= base_url() ?>/assets/image/code.png" alt="Photo principale">
                </div>
            <?php } ?>   
        </div>
    </div>
</div>