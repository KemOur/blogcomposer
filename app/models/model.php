<?php

function dbConnect()
{
    try {
        return new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
