<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controller\ConfigController;

Route::controller(ConfigController::class)->group(function () {
    Route::get('/config/getConfig', 'getConfig');
});
