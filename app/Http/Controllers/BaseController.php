<?php

namespace App\Http\Controllers;

use App\Attribute\Auth;
use App\Attribute\Monitor;
use App\Trait\RequestJson;
use Illuminate\Support\Facades\Route;
use ReflectionObject;

// 基础控制器
abstract class BaseController
{
    use RequestJson;
}
