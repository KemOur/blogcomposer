<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if($uri == "/"){}
        elseif ($uri == "/articles"){
        postIndex();
    }   elseif ($uri == "/articles/show" and isset($_GET['id'])){
        postShow();
    }   elseif ($uri == "/articles/create"){
        postCreate();
        }
        elseif ($uri == "/articles" and isset($_POST['id'])){
        postStore();
    }    elseif ($uri == "/articles/edit" and isset($_GET['id'])){
        postEdit($id);
    }    elseif ($uri == "/articles/edit" and isset($_POST['id'])){
        postUpdate();
    }   elseif ($uri == "/articles/delete" and isset($_POST['id'])){
        postDestroy(id);
    }
    else {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
} else {
    http_response_code(405);
    echo "<html><body>Method not allowed</body></html>";
    return;
}
