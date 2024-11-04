<?php

use App\Adminapi\Controller\Dept\DeptController;
use Illuminate\Support\Facades\Route;

Route::controller(DeptController::class)->group(function () {
    Route::get('/dept.dept/all', 'all');
});
