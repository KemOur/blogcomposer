<?php

return [
    'database' => [
        'connection' => $_ENV['DB_CONNECTION'],
        'host' => $_ENV['DB_HOST'],
        'dbname' => $_ENV['DB_NAME'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
]
?>
