<?php

use App\Adminapi\Controller\Dept\JobsController;
use Illuminate\Support\Facades\Route;

Route::controller(JobsController::class)->group(function () {
    Route::get('/dept.jobs/all', 'all');
});
