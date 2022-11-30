<?php

return [
    'host' => env("DB_HOST", "127.0.0.1"),
    'name' => env("DB_DATABASE", "advance_php_mvc_oop"),
    'user' => env("DB_USERNAME", "root"),
    'password' => env("DB_PASSWORD", ""),
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];
