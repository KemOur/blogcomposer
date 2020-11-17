<?php $title = "My blog"; ?>

<?php ob_start(); ?>
<a href="/articles">
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
    </svg></a><div class="jumbotron mt-3">
<div class="container">
    <h1><?= $post->title ?></h1>
    <p class="lead">ajouté <?= $post->created_at ?></p>
    <p class="lead">modifié <?= $post->updated_at ?></p>
    <p class="lead"><?= $post->body ?></p><br>
</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/default.php"; ?>
