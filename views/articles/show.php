<?php $this->layout('layouts/default', ['title' => 'My blog']) ?>
<?php $Parsedown = new Parsedown() ?>


<a href="/articles">
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
    </svg></a><div class="jumbotron mt-3">
<div class="container">
    <h1><?= $Parsedown->text( "##".$post->title ) ?></h1>
    <!-- <?= $post->title ?> -->
    <p class="lead">ajouté <?= $post->created_at ?></p>
    <p class="lead">modifié <?= $post->updated_at ?></p>
    <p class="lead"><?= $Parsedown->text( "###".$post->body ) ?></p><br>
    <!-- <?= $post->body ?>-->
</div>
</div>
