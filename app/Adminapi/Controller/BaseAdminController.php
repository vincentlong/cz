<?php

namespace App\Adminapi\Controller;

use App\Common\Controller\BaseLikeAdminController;

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
