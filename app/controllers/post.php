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

    $post = (object) $_POST;

    try {
        $userValidator->assert($post);
    } catch (NestedValidationException $exception) {
        print_r($exception->getMessage());
        die();
    }

    addPost();
    $posts = getAllPosts();
    view('articles/articles', compact('posts'));
}

//suppression
function postDestroy($id){
    delPost($id);
    header('Location: /articles');

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
        print_r($exception->getMessage());
        die();
    }
    editPost($id);
    header("Location: /articles");
    //header("Location: /articles/show/$id");
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