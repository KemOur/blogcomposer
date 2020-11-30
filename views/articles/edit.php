<?= $title = ''?>
<?= $content = ''?>
<a href="/articles">
    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
    </svg></a>
<form action="<?= "/articles/edit?id=" . $_GET['id'] ?>" method="post">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="form-row">
                        <label>Titre de l'article :</label>
                        <div class="col-7">
                            <!--succes si different de vide-->
                            <div class="alert alert-succes">
                            <input value="<?=$post->title?>" style="width: 950px" type="text" class="form-control" name="title" id="title">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>L'article :</label>
                                <textarea style="width: 950px" class="form-control" rows="5" name="body" id="body"><?=$post->body ?></textarea>
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-info" style="color: white" >Update</button>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . "/../../views/layouts/default.php"; ?>
