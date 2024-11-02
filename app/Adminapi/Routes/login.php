<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controllers\LoginController;


Route::controller(LoginController::class)->group(function () {
    Route::post('/login/account', 'account');
    Route::any('/login/logout', 'logout');
});
