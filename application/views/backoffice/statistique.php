<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="statistique">
    <div class="title">
        <h1>Statistiques</h1>
    </div>
    <div class="table">
        <div class="left">
            <div class="subtitle">Utilisateurs</div>
            <div class="data">
                <p>
                    <strong>Total inscrits : </strong> <?= $inscrits ?>
                </p>
            </div>
        </div>
        <div class="right">
            <div class="subtitle">Echanges</div>
            <div class="data">
                <p>
                    <strong>Nombre d'échanges : </strong> <?= $echanges ?>
                </p>
            </div>
        </div>
    </div>
</div>