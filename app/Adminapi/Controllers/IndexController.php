<?php

namespace App\Adminapi\Controllers;

use Illuminate\Http\JsonResponse;

class IndexController extends BaseAdminController
{
    public function index(): JsonResponse
    {
        return $this->data([
            "message" => "Hello Adminapi"
        ]);
    }
}
