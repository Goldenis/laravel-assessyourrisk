<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

//  Heroku postmark sender
//	'postmark' => 'efd34dc3-0cb0-46d8-8a2b-e0738484e402',

// postmark test account
//	'postmark' => '19e2a587-1752-42e9-8f13-3945ad8b50d0',

	'postmark' => '5f415bef-aa7c-422e-92ab-8bb69a78b78d',

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

];
