<?php $Parsedown = new Parsedown() ?>
<?php $title = "My blog"; ?>
<?php ob_start(); ?>
    <h1>Publications</h1><br>
    <a href="/articles/create">
    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
    </a>
    <a style="float: right" href="/generate">FAKER</a>
<?php foreach ($posts as $post) : ?>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="media text-muted pt-3">
        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">

                <a href="articles/show?id=<?= $post->id ?>"><?= $Parsedown->text( "###".$post->title ) ?><?= $post->created_at_fr ?> </a>
                <br>
                <div style="float: right">
                <a class="btn btn-success" href="/articles/edit?id=<?= $post->id ?>">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
                </a>

                    <form method="POST" action="/articles/delete?id=<?= $post->id ?>">
                        <input name="_method" type="hidden" value="delete">
                        <button class="btn btn-outline-danger" type="submit">supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . "/../layouts/default.php"; ?>