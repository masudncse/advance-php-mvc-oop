<?php

use Foundation\App;
use Foundation\Database\Connection;
use Foundation\Database\QueryBuilder;

/**
 * Load Environments
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$dotenv->required(['APP_NAME', 'APP_URL']);

/**
 * Load Helper
 */
require __DIR__ . '/../src/helpers.php';

/**
 * Bind Important Service
 */
App::bind('app', require __DIR__ . '/../config/app.php');
App::bind('database', require __DIR__ . '/../config/database.php');
App::bind('pdo', Connection::make(App::get('database')));
App::bind('query', new QueryBuilder(App::get('pdo')));
