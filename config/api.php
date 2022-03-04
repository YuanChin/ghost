<?php

return [
    /**
     * 接口頻率限制
     */
    'rate_limits' => [
        // 訪問頻率限制，單位：次數/分鐘
        'access' => env('RATE_LIMITS', '60,1'),
        // 登入頻率限制，單位：次數/分鐘
        'sign' => env('SIGN_RATE_LIMITS', '10,1'),
    ],
];