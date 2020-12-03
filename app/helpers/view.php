<?php

function view($path, $args = []){
    $templates = new League\Plates\Engine(__DIR__ . '/../../views');
    echo $templates->render($path, $args);
    $_SESSION = [];

}
/*
function view($path, $args)
{
    $headers = getallheaders();
    if (isset($headers['Accept']) and $headers['Accept'] == "application/json") {
        header('Content-type: application/json');
        echo json_encode($args);
        return;
    }

    extract($args);
    ob_start();
    require __DIR__ . "/../../views/{$path}";
    echo ob_get_clean();
    $_SESSION = [];
}
*/