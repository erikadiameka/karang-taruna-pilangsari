<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'national_news' => [
        'rss' => env('NATIONAL_NEWS_RSS', 'https://rss.kompas.com/rss/topic/nasional'),
        // true = verify SSL normally, false = disable SSL verification (insecure; use only in dev)
        'verify' => env('NATIONAL_NEWS_SSL_VERIFY', true),
        // Optional: path to CA bundle file (cacert.pem). If set, this value is passed to Guzzle "verify".
        'ca_bundle' => env('NATIONAL_NEWS_CA_BUNDLE'),
        // If true and SSL verify fails, retry once with verify=false (insecure; use only in dev).
        'insecure_fallback' => env('NATIONAL_NEWS_SSL_INSECURE_FALLBACK', false),
    ],

];
