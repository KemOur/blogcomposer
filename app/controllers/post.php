<?php
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

//affichage des articles
function postIndex()
{
    $posts = getAllPosts();
    view('articles/articles', compact('posts'));
}
//affichage du formullaire de création
function postCreate()
{
    $posts = getAllPosts();
    view('/articles/create', compact('posts'));
}

//ajouter
function postStore()
{

    //print_r($_POST);
    //die();
    $userValidator = v::attribute('title', v::stringType()->length(5, 100))
        ->attribute('body', v::stringType()->length(5, 255));
    //v::countryCode('alpha-2')->validate('FR');


    $post = (object) $_POST;

    try {
        $userValidator->assert($post);


    } catch (NestedValidationException $exception) {
        $_SESSION['error'] = implode(', ', $exception->getMessages());
        $_SESSION['old'] = $_POST;
        header('Location: /articles/create');
        return;
    }
    $posts = getAllPosts();
    addPost();
    $_SESSION['success'] = "L'article '{$_POST['title']}' a bien été créé";
    header('Location: /articles');
    return;
}

//suppression
function postDestroy($id){

    delPost($id);
    $_SESSION['success'] = "L'article '#{$id}' a bien été supprimé";
    header('Location: /articles');
    return;

}
//genere faux articles
function postFaker(){
    genereFaker();
}

//début edition
function postEdit($id){

    $post = getPostById($id);
    view('/articles/edit', compact('post'));
}
//Update, rédirection vers l'article
function postUpdate($id){
    $userValidator = v::attribute('title', v::stringType()->length(5, 100))
        ->attribute('body', v::stringType()->length(5, 255));

    $post = (object) $_POST;

    try {
        $userValidator->assert($post);
    } catch (NestedValidationException $exception) {
        $_SESSION['success'] = "L'article #{$id} a bien été modifié";
    }
    editPost($id);
    header("Location: /articles/show/$id");
    return;
}

// page error 404.php, a styliser
function NotFoundHandler(){
    view('/404.php', compact(null));
}


//affichage un article
function postShow($id)
{
    if (empty($id)) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }

    $post = getPostById($id);
    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }

    view('articles/show', compact('post'));
}