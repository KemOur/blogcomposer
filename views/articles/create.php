<?php $title = "My blog"; ?>
<?php ob_start(); ?>
<?php require __DIR__ . "/../../views/layouts/header.php"; ?>

<a href="/articles">Back</a>

<form action="/articles" method="post">
    <div class="form-row">
        <label>Titre :</label>
        <div class="col-7">
            <input style="width: 350px" type="text" class="form-control" name="title" id="title">
        </div>
        <br>
        <div class="form-group">
            <label>Text :</label>
            <textarea style="width: 350px" class="form-control" rows="5" name="body" id="body"></textarea>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-info" style="color: white" >create</button>
</form>

