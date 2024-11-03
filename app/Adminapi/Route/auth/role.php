<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controller\Auth\RoleController;

Route::controller(RoleController::class)->group(function () {
    Route::get('/auth.role/all', 'all');
});
