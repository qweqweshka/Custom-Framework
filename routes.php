<?php

return [
    '/' => [\App\Controllers\IndexController::class, 'index'],

    '/register' => [\App\Controllers\RegisterController::class, 'registerPage'],
    '/reg' => [\App\Controllers\RegisterController::class, 'register'],

    '/login' => [\App\Controllers\LoginController::class, 'loginPage'],
    '/log' =>[\App\Controllers\LoginController::class, 'login'],


];