<?php $title = "My blog"; ?>
<?php ob_start(); ?>
<a href="/">Back</a> || <a class="btn btn-info" href="articles/create" style="color: white">Ajouter</a>
    <h1>Publications</h1>

    <ul>
        <?php foreach ($posts as $post) : ?>
            <li>
                <a href="articles/show?id=<?= $post->id ?>"><?= $post->created_at_fr ?> - <?= $post->title ?></a><br>
                <a class="btn btn-success" href="/articles/edit?id=<?= $post->id ?>">edit</a> ||
                <a class="btn btn-danger" href="/articles/delete?id=<?= $post->id ?>">del</a>
            </li>
        <?php endforeach ?>
    </ul>
<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . "/../layouts/header.php"; ?>
<?= $title ?>
<?= $content ?>
