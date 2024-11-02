<?php

namespace App\Adminapi\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;

class IndexController extends BaseController
{
    public function index(): JsonResponse
    {
        return $this->success([
            "message" => "Hello Adminapi"
        ]);
    }
}
