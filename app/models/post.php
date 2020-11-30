<?php

use Carbon\Carbon;

function getAllPosts()
{
    $db = dbConnect();
    $statement = $db->query('SELECT id, title, body, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts ORDER BY ID DESC');
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function getPostById()
{
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $_GET['id']]);
    $post = $statement->fetchObject();
    $post->created_at = ucfirst(Carbon::parse($post->created_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans());
    $post->updated_at = ucfirst(Carbon::parse($post->updated_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans());
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

function genereFaker(){
    $db = dbConnect();
    $faker = Faker\Factory::create('fr_FR');
    $title = $faker->catchPhrase;
    $body = $faker->text;
    $statement = $db->prepare('INSERT INTO posts (title, body) VALUES ( :title, :body)');
    $statement->execute([
        'title' => $title,
        'body' => $body,
    ]);
    header('location:/articles');
    exit();
}

function delPost(){
    $db = dbConnect();
    $statement= $db->prepare('DELETE FROM posts WHERE id = :id');
    return $statement->execute([ "id" => $_GET['id']]);
}

function editPost($id){
    $db = dbConnect();
    $statement= $db->prepare('UPDATE posts SET title = :title, body = :body WHERE id = :id');
    return $statement->execute([
        "title" => $_POST['title'],
        "body"=> $_POST['body'],
        "id" => $id
    ]);

}