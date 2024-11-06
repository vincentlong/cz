<?php

use App\Api\Controller\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::post('/login/account', 'account');
    Route::post('/login/register', 'register');
    Route::get('/login/logout', 'logout');
});
