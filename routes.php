<?php

return [
    '/' => [\App\Controllers\IndexController::class, 'index'],

    '/register' => [\App\Controllers\RegisterController::class, 'registerPage'],
    '/reg' => [\App\Controllers\RegisterController::class, 'register'],

    '/login' => [\App\Controllers\LoginController::class, 'loginPage'],
    '/log' =>[\App\Controllers\LoginController::class, 'login'],
    '/logout' => [\App\Controllers\LogoutController::class, 'logout'],

    '/show' => [\App\Controllers\Layouts\User\ArticleController::class, 'show'],
    '/create'=>[\App\Controllers\Layouts\User\ArticleController::class, 'create'],
    '/createPost'=>[\App\Controllers\Layouts\User\ArticleController::class, 'createPost'],
    '/edit' => [\App\Controllers\Layouts\User\ArticleController::class, 'edit'],
    '/editPost' =>[\App\Controllers\Layouts\User\ArticleController::class, 'editPost'],
    '/delete' => [\App\Controllers\Layouts\User\ArticleController::class, 'delete'],



];