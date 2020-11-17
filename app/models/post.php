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
    $post->created_at = ucfirst(Carbon::parse($post->created_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans());
    return $post;
}

function addPost(){
    $db = dbConnect();
    $statement = $db->prepare('INSERT INTO posts (title, body) VALUES ( :title, :body)');
    $poststore = $statement->execute([
        'title' => $_POST['title'],
        'body' => $_POST['body'],
    ]);
    return $poststore;
}

function delPost(){
    $db = dbConnect();
    $id = $_GET['id'];
    $sql = 'DELETE FROM posts WHERE id=:id';
    $statement = $db->prepare($sql);
    if ($statement->execute([':id' => $id])){
        header("Location: /articles");
    }
}

function editPost(){
    $db = dbConnect();
    if (isset($_POST['title']) && isset($_POST['body'])){

    $title = $_POST['title'];
    $body = $_POST['body'];

    $id = $_GET['id'];
    $sql = 'UPDATE posts SET title=:title, body=:body WHERE id=$id';
    $statement = $db->prepare($sql);
    if ($statement->execute([':title' => $title, ':body' => $body, ':id' => $id])){
        header("Location: /articles");
    }
  }
}