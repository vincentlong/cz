<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;

class IndexController extends BaseController
{
    public function index(): JsonResponse
    {
        return $this->success([
            "message" => "Hello Api"
        ]);
    }
}
