<?php

return [
    'sandbox' => [
        'credentials' => [
            'devId'  => env('SANDBOX_DEVID_APPLICATION_KEY'),
            'appId'  => env('SANDBOX_APPID_APPLICATION_KEY'),
            'certId' => env('SANDBOX_CERTID_APPLICATION_KEY'),
        ],
        'authToken'      => env('SANDBOX_USER_TOKEN_APPLICATION_KEY'),
        'oauthUserToken' => env('SANDBOX_OAUTH_USER_TOKEN'),
        'ruName'         => env('SANDBOX_RUNAME')
    ],
    'production' => [
        'credentials' => [
            'devId'  => env('PRODUCTION_DEVID_APPLICATION_KEY'),
            'appId'  => env('PRODUCTION_APPID_APPLICATION_KEY'),
            'certId' => env('PRODUCTION_CERTID_APPLICATION_KEY'),
        ],
        'authToken'      => env('PRODUCTION_USER_TOKEN_APPLICATION_KEY'),
        'oauthUserToken' => env('PRODUCTION_OAUTH_USER_TOKEN'),
        'ruName'         => env('PRODUCTION_RUNAME')
    ],
    'siteId' => env('SITEID'), // US
    'compatibilityVersion' => env('COMPATIBILITY_VERSION'), // until August 2022
    'endpoints' => [
        'sandbox'       => env('SANDBOX_SITE_URL'),
        'production'    => env('PRODUCTION_SITE_URL'),
    ]
];
