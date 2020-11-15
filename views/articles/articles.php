<?php $title = "My blog"; ?>
<?php ob_start(); ?>
<a href="/">Back</a>
    <h1>Publications</h1>

    <ul>
        <?php foreach ($posts as $post) : ?>
            <li><a href="/articles/show?id=<?= $post->id ?>"><?= $post->created_at_fr ?> - <?= $post->title ?></a></li>
        <?php endforeach ?>
    </ul>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/header.php"; ?>
<?= $content ?>
