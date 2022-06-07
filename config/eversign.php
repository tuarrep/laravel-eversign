<?php

// config for Pinpon/Eversign
return [
    'apiKey' => env('EVERSIGN_API_KEY'),
    'businessId' => env('EVERSIGN_BUSINESS_ID'),
    'sandbox' => env('EVERSIGN_SANDBOX', env('APP_DEBUG', true)),
];
