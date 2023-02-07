<div class="message">
    <p>Voulez vous vraiment supprimer la catégorie <strong><?= $categorie->nom ?></strong></p>
    <div>
        <?= anchor('/categoryadmin/delete/'.$categorie->idcategorie, 'Oui', 'class=link') ?>
        <?= anchor('/categoryadmin/listecategories', 'Non', 'class=link') ?>
    </div>
</div>