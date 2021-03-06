
<?php

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route)
{
    $route->get('/articles', 'postIndex');
    $route->get('/generate', 'postFaker');
    $route->get('/articles/show/{id:[0-9]+}', 'postShow');
    $route->get('/articles/create', 'postCreate');
    $route->get('/articles/edit/{id:[0-9]+}', 'postEdit');
    $route->post('/articles', 'postStore');
    //$route->post('/articles/edit/{id:[0-9]+}', 'postUpdate');

    $route->addRoute(['POST', 'PUT'],'/articles/edit/{id:[0-9]+}', 'postUpdate');
    $route->addRoute(['POST','DELETE'],'/articles/delete/{id:[0-9]+}', 'postDestroy');
});


/*
 * method_override:
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
    else{
        http_response_code(404);
        return NotFoundHandler();
    }
}

elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    //override
    if (!empty($_POST['_method'])) {
        $_SERVER['REQUEST_METHOD'] = strtoupper($_POST['_method']);
    }
    if ($uri == "/articles") {
        return postStore();
    } elseif ($uri == "/articles/edit" and isset ($_GET['id'])) {
        return postUpdate($_GET['id']);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        if ($uri == "/articles/edit" and isset ($_GET['id'])) {
            return postUpdate($_GET['id']);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if ($uri == "/articles/delete" and isset ($_GET['id'])) {
            return postDestroy();
        }
    }else{
        http_response_code(405);
        echo "<html><body>Method not allowed</body></html>";
        return;
    }
}



*/