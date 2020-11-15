<?php

use Carbon\Carbon;

function getAllPosts()
{
    $db = dbConnect();
    $statement = $db->query('SELECT id, title, body, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts');
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function getPostById($id)
{
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $_GET['id']]);
    $post = $statement->fetchObject();
    $post->created_at = ucfirst(Carbon::parse($post->created_at)->locale('fr_FR')->diffForHumans());
    return $post;
}
/*
function AddArticle($post){

    $db = dbConnect();
    $statement = $db->prepare('INSERT INTO posts (created_at, title, body) VALUES (:created, :title, :body, )');
    $post = $statement->execute([
        'created_at' => $post['created_at'],
        'title' => $post['title'],
        'body' => $post['body'],
    ]);
    return $post;
}

*/