<?php
//affichage des articles
function postIndex()
{
    $posts = getAllPosts();
    view('articles/articles.php', compact('posts'));
}
//affichage du formullaire de création
function postCreate()
{
    $posts = getAllPosts();
    view('/articles/create.php', compact('posts'));
}

//ajouter
function postStore()
{
    //print_r($_POST);
    //die();

    addPost();
    $posts = getAllPosts();
    view('articles/articles.php', compact('posts'));
}

//suppression
function postDestroy(){
    delPost();
    header('Location: /articles');

}
//genere faux articles
function postFaker(){
    genereFaker();
}

//début edition
function postEdit(){
    $post = getPostById($_GET['id']);
    view('/articles/edit.php', compact('post'));
}
//Update, rédirection vers l'article
function postUpdate($id){
    editPost($id);
    header("Location: /articles/show?id=$id");
}
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

    view('articles/show.php', compact('post'));
}