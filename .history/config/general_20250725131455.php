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

        // Error Templates
        'errorTemplatePrefix' => 'errors/',
    ],

    // Development environment settings
    'dev' => [
        'devMode' => true,
        'allowAdminChanges' => true,
        'disallowRobots' => true,
        'enableTemplateCaching' => false,
    ],

    // Production environment settings  
    'production' => [
        'allowAdminChanges' => false,
        'disallowRobots' => false,
        'enableTemplateCaching' => true,
    ],
];
