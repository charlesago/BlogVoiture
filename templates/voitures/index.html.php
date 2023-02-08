<?php foreach ($voitures as $voiture) : ?>

    <hr>
    <h2><?=$voiture->getModel() ?></h2>


    <p><strong><?= $voiture->getDescription() ?></strong></p>
    <img width="50px" src="images/<?=$voiture->getImage()?>" alt="">
    <a href="?type=voiture&action=show&id=<?= $voiture->getId() ?>" class="btn btn-success">Voir</a>
    <hr>


<?php endforeach; ?>