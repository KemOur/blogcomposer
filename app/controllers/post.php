<?php

function postIndex()
{
    $posts = getAllPosts();
    view('articles/articles.php', compact('posts'));
}

function homeAccueil(){

}


function postCreate()
{
    $posts = getAllPosts();
    view('articles/create.php', compact('posts'));
}

function postStore()
{
    //print_r($_POST);
    //die();
    addPost();
    $posts = getAllPosts();
    view('articles/articles.php', compact('posts'));
}

function postDestroy(){
    delPost();
}

//edit function début
function postEdit()
{
    $id = $_GET['id'];
    view('articles/edit.php', compact('id'));
}

function postUpdate(){
    editPost();
    $post = getPostById($_GET['id']);
    view('articles/articles.php', compact('post'));
}

function postShow()
{
    if (empty($_GET['id'])) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }

    $post = getPostById($_GET['id']);
    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }

    view('articles/show.php', compact('post'));
}