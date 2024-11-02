<?php

namespace App\Api\Controllers;

use Illuminate\Http\JsonResponse;

class IndexController extends BaseApiController
{
    public function index(): JsonResponse
    {
        return $this->data([
            "message" => "Hello Api"
        ]);
    }
}
