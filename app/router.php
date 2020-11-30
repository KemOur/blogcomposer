<?php
//require __DIR__ . '/../routes/web.php';
/*
 * <?php
require __DIR__ . '/../routes/web.php';
if(!empty($_POST['_method'])){
    $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo '<h2>404 Not found </h2>';
        die();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func_array($handler, $vars);
        break;
}

 * */

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