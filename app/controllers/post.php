<?php

function postIndex()
{
    $posts = getAllPosts();
    view('articles/articles.php', compact('posts'));
}

function postCreate()
{
    /*$post = AddArticle(); */
    $posts = getAllPosts();
    view('articles/create.php', compact('posts'));
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