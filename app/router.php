<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if($uri == "/articles"){
        return postIndex();
    }   elseif ($uri == "/articles/show" and isset($_GET['id'])){
        postShow();
    }   elseif ($uri == "/articles/create"){
        return postCreate();
        }
        elseif ($uri == "/articles/edit" and isset ($_GET['id'])){
        return postEdit();
        }
        elseif ($uri == "/generate"){
        postFaker();
        }

        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;

    }   elseif ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!empty($_POST['_method'])){
            $_SERVER['REQUEST_METHOD'] = strtoupper($_POST['_method']);
        }

        if ($uri == "/articles"){
            return postStore();
        }elseif ($uri =="/articles/edit"){
            return postUpdate($_POST);
        }
    }
        if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
            if ($uri == "/articles/edit" and isset ($_GET['id'])){
                return postUpdate($_GET['id']);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            if ($uri == "/articles/delete" and isset ($_GET['id'])){
                return postDestroy();
            }
        }

            http_response_code(405);
            echo "<html><body>Method not allowed</body></html>";
            return;

