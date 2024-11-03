<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controller\Dept\JobsController;

Route::controller(JobsController::class)->group(function () {
    Route::get('/dept.jobs/all', 'all');
});
