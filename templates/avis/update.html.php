<form   action="?type=avis&action=update" method="post" class="form-control">
    <input type="hidden" name="id" value="<?=$avis->getId() ?>">
    <input type="text" name="content" value="<?=$avis->getContent() ?>">

    <button class="btn btn-success" type="submit">Ok</button>
</form>