<?php

use Illuminate\Support\Facades\Route;
use App\Adminapi\Controller\Dept\DeptController;

Route::controller(DeptController::class)->group(function () {
    Route::get('/dept.dept/all', 'all');
});
