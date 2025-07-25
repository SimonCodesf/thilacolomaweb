<?php

use craft\helpers\App;

return [
    'dsn' => App::env('CRAFT_DB_DSN') ?: (App::env('CRAFT_DB_DRIVER') . ':host=' . App::env('CRAFT_DB_SERVER') . ';port=' . App::env('CRAFT_DB_PORT') . ';dbname=' . App::env('CRAFT_DB_DATABASE')),
    'user' => App::env('CRAFT_DB_USER'),
    'password' => App::env('CRAFT_DB_PASSWORD'),
    'schema' => App::env('CRAFT_DB_SCHEMA'),
    'tablePrefix' => App::env('CRAFT_DB_TABLE_PREFIX'),
    'charset' => 'utf8',
];
