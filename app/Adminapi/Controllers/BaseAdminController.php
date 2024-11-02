<?php

namespace App\Adminapi\Controllers;

use App\Common\Controllers\BaseLikeAdminController;

class BaseAdminController extends BaseLikeAdminController
{
    protected function getAdminId()
    {
        return $this->request->attributes->get('adminId');
    }

    protected function getAdminInfo()
    {
        return $this->request->attributes->get('adminInfo');
    }

}
