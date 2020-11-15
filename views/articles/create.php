<?php $title = "My blog"; ?>
<?php ob_start(); ?>
<?php require __DIR__ . "/../../views/layouts/header.php"; ?>

<form action="postStore">
    <div class="form-row">
        <label>Titre :</label>
        <div class="col-7">
            <input style="width: 350px" type="text" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label>Text :</label>
            <textarea style="width: 350px" class="form-control" rows="5"></textarea>
        </div>
    </div>
    <br>
    <button type="submit">create</button>
</form>

