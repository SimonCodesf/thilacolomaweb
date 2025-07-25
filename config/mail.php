<?php

use craft\helpers\App;

return [
    '*' => [
        'fromEmail' => App::env('CRAFT_MAIL_FROM_EMAIL') ?: 'info@thilacoloma.be',
        'fromName' => App::env('CRAFT_MAIL_FROM_NAME') ?: 'Thila Coloma',
        'replyToEmail' => App::env('CRAFT_MAIL_REPLY_TO_EMAIL') ?: 'info@thilacoloma.be',
    ],

    'dev' => [
        // Use file transport in dev
        'transportType' => 'craft\\mail\\transportadapters\\File',
        'transportSettings' => [
            'path' => '@storage/runtime/mail',
        ],
    ],

    'production' => [
        // Use SMTP in production
        'transportType' => 'craft\\mail\\transportadapters\\Smtp',
        'transportSettings' => [
            'host' => App::env('CRAFT_SMTP_HOST'),
            'port' => App::env('CRAFT_SMTP_PORT') ?: 587,
            'useAuthentication' => true,
            'username' => App::env('CRAFT_SMTP_USERNAME'),
            'password' => App::env('CRAFT_SMTP_PASSWORD'),
            'encryptionMethod' => 'tls',
        ],
    ],
];
