<?php

return [
    'default' => [
        'private_key' => env('APPLE_ADS_PRIVATE_KEY', ''),
        'public_key'  => env('APPLE_ADS_PUBLIC_KEY', ''),
        'client_id'   => env('APPLE_ADS_CLIENT_ID', ''),
        'team_id'     => env('APPLE_ADS_TEAM_ID', ''),
        'key_id'      => env('APPLE_ADS_KEY_ID', ''),
        'org_id'      => env('APPLE_ADS_ORG_ID', ''),
        'audience'    => 'https://appleid.apple.com',
        'alg'         => 'ES256',
    ],
];
