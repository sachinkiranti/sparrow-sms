<?php

return [
    'loggable' => true,
    # base_url should end with trailing backslash `/`
    'base_url' => 'http://api.sparrowsms.com/v2/',
    'token'    => 'XXXXXXXX', # `auth token` provided by sparrow sms
    'identity' => 'XXXXX', # `identity` provided by sparrow sms

    # Available Apis
    'apis' => [
        'send' => 'sms/',
        'credit' => 'credit/'
    ],
];