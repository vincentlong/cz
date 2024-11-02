<?php

namespace App\Http\Controllers\Admin;

use App\Attribute\Auth;
use App\Attribute\Monitor;
use App\Http\Controllers\BaseController;
use App\Models\Admin\AdminGroupModel;
use App\Models\Admin\AdminModel;
use App\Models\Admin\AdminRuleModel;
use Exception;
use Faker\Provider\Base;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Random\RandomException;
use Xin\Token;

class IndexController extends BaseController
{
    public function index(): JsonResponse
    {
        return $this->success([
            "message" => "Hello Admin"
        ]);
    }
}
