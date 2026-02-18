<?php

return [
    'timeout' => 30,
    'providers' =>[
        'paypal' => [
            'url' => 'https://api.sandbox.paypal.com/v1/payments/payment',
            'client_id' => env('PAYPAL_CLIENT_ID'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET'),
            'key' => env('PAYPAL_KEY'),
        ],
        'credit_card' => [
            'url' => 'https://api.sandbox.creditcard.com/v1/payments/payment',
            'client_id' => env('CREDIT_CARD_CLIENT_ID'),
            'client_secret' => env('CREDIT_CARD_CLIENT_SECRET'),
            'key' => env('CREDIT_CARD_KEY'),
        ],
        'bank_transfer' => [
            'url' => 'https://api.sandbox.banktransfer.com/v1/payments/payment',
            'client_id' => env('BANK_TRANSFER_CLIENT_ID'),
            'client_secret' => env('BANK_TRANSFER_CLIENT_SECRET'),
            'key' => env('BANK_TRANSFER_KEY'),
        ],
    ]
];