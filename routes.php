<?php

return [
    '/' => [\App\Controllers\IndexController::class, 'execute'],
    '/login' => [\App\Controllers\LoginController::class, 'execute'],
];