<?php

use craft\helpers\App;

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 1,

        // Whether generated URLs should omit "index.php"
        'omitScriptNameInUrls' => true,

        // Control Panel trigger word
        'cpTrigger' => 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => App::env('CRAFT_SECURITY_KEY'),

        // Whether to save the project config out to config/project/ files and automatically load them into new environments
        'useProjectConfigFile' => App::env('CRAFT_ENVIRONMENT') === 'production' ? false : true,

        // Error Templates
        'errorTemplatePrefix' => 'errors/',

        // Database
        'db' => [
            'dsn' => App::env('CRAFT_DB_DSN') ?: (App::env('CRAFT_DB_DRIVER') . ':host=' . App::env('CRAFT_DB_SERVER') . ';port=' . App::env('CRAFT_DB_PORT') . ';dbname=' . App::env('CRAFT_DB_DATABASE')),
            'user' => App::env('CRAFT_DB_USER'),
            'password' => App::env('CRAFT_DB_PASSWORD'),
            'schema' => App::env('CRAFT_DB_SCHEMA'),
            'tablePrefix' => App::env('CRAFT_DB_TABLE_PREFIX'),
        ],

        // Aliases
        'aliases' => [
            '@assetsUrl' => App::env('CRAFT_ASSETS_URL') ?: '/assets',
            '@web' => App::env('CRAFT_WEB_URL') ?: '/',
        ],
    ],

    // Development environment settings
    'dev' => [
        // Dev Mode (see https://craftcms.com/guides/what-dev-mode-does)
        'devMode' => App::env('CRAFT_DEV_MODE') ?? true,
        'allowAdminChanges' => App::env('CRAFT_ALLOW_ADMIN_CHANGES') ?? true,
        'disallowRobots' => App::env('CRAFT_DISALLOW_ROBOTS') ?? true,
        'enableTemplateCaching' => false,
    ],

    // Staging environment settings
    'staging' => [
        'allowAdminChanges' => App::env('CRAFT_ALLOW_ADMIN_CHANGES') ?? false,
        'disallowRobots' => App::env('CRAFT_DISALLOW_ROBOTS') ?? true,
    ],

    // Production environment settings
    'production' => [
        'allowAdminChanges' => App::env('CRAFT_ALLOW_ADMIN_CHANGES') ?? false,
        'disallowRobots' => App::env('CRAFT_DISALLOW_ROBOTS') ?? false,
        'enableTemplateCaching' => true,
    ],
];
