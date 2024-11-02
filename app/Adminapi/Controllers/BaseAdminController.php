<?php

namespace App\Adminapi\Controllers;

use App\Common\Controllers\BaseLikeAdminController;

class BaseAdminController extends BaseLikeAdminController
{
    protected int $adminId = 0; // todo 暂时先从请求上下文获取
    protected array $adminInfo = [];
}
