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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '125311141257486',
        'client_secret' => '3a7f55bfe74855b091db9ff985fb1140',
        'redirect' => 'http://localhost:8000/callback',
    ],
    'google' => [
        'client_id' => '46887104396-po6ck88g4e4dhj1jji6u2pls4v79a9j4.apps.googleusercontent.com',
        'client_secret' => '-B1u5tkWV-T8GFkXTeQNYxwg',
        'redirect' => 'http://localhost:8000/callback/google',
    ],

];
