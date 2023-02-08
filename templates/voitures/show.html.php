<div>

<hr>
<h2><?=$voiture->getModel()?></h2>


<p><strong><?= $voiture->getDescription() ?></strong></p>
<a href="index.php" class="btn btn-primary">retour</a>
<a href="?type=voiture&action=remove&id=<?= $voiture->getId() ?>" class="btn btn-danger">supprimer</a>
<hr>

</div>

<?php foreach ($avis as $avi) : ?>

    <hr>

    <p><strong><?= $avi->getContent() ?></strong></p>
    <a href="?type=avis&action=remove&id=<?= $avi->getId() ?>" class="btn btn-danger">supprimer</a>
    <a href="?type=avis&action=update&id=<?= $avi->getId() ?>" class="btn btn-warning">modifier</a>

    <hr>


<?php endforeach; ?>


<form method="post" class="form" action="?type=avis&action=create">
    <input class="form-control"  type="text" name="content" placeholder="add a comment">
    <input name="voiture_id" class="form-control" type="hidden" value="<?= $voiture->getId() ?>">
    <button class="btn btn-success" type="submit">Send</button>
</form>
