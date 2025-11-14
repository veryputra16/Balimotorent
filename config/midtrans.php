<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Midtrans Server Key
    |--------------------------------------------------------------------------
    |
    | Server key dari dashboard Midtrans. Digunakan di backend untuk generate
    | Snap token atau API call lainnya.
    |
    */
    'serverKey' => env('MIDTRANS_SERVER_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Client Key
    |--------------------------------------------------------------------------
    |
    | Client key dari dashboard Midtrans. Digunakan di frontend untuk Snap.js.
    |
    */
    'clientKey' => env('MIDTRANS_CLIENT_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Production Mode
    |--------------------------------------------------------------------------
    |
    | Set true jika ingin transaksi live, false untuk sandbox/testing.
    |
    */
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),

    /*
    |--------------------------------------------------------------------------
    | Sanitized
    |--------------------------------------------------------------------------
    |
    | Enable sanitization for all incoming parameters.
    |
    */
    'isSanitized' => true,

    /*
    |--------------------------------------------------------------------------
    | 3DSecure
    |--------------------------------------------------------------------------
    |
    | Enable 3D Secure for credit card transactions.
    |
    */
    'is3ds' => true,
];
