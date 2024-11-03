<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controller\Auth\AdminController;

Route::controller(AdminController::class)->group(function () {
    Route::get('/auth.admin/mySelf', 'mySelf');
    Route::get('/auth.admin/lists', 'lists');
});
