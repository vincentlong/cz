<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controller\DownloadController;

Route::controller(DownloadController::class)->group(function () {
    Route::get('/download/export', 'export');
});
