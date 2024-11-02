<?php

namespace App\Common\Controllers;

use App\Common\Services\JsonService;

class BaseLikeAdminController
{

    public array $notNeedLogin = [];

    protected function success(string $msg = 'success', array $data = [], int $code = 1, int $show = 0)
    {
        return JsonService::success($msg, $data, $code, $show);
    }

    protected function data($data)
    {
        return JsonService::data($data);
    }

    protected function fail(string $msg = 'fail', array $data = [], int $code = 0, int $show = 1)
    {
        return JsonService::fail($msg, $data, $code, $show);
    }

//    protected function dataLists(BaseDataLists $lists = null)
//    {
//        //列表类和控制器一一对应，"app/应用/controller/控制器的方法" =》"app\应用\lists\"目录下
//        //（例如："app/adminapi/controller/auth/AdminController.php的lists()方法" =》 "app/adminapi/lists/auth/AminLists.php")
//        //当对象为空时，自动创建列表对象
//        if (is_null($lists)) {
//            $listName = str_replace('.', '\\', App::getNamespace() . '\\lists\\' . $this->request->controller() . ucwords($this->request->action()));
//            $lists = invoke($listName);
//        }
//        return JsonService::dataLists($lists);
//    }
//

    public function isNotNeedLogin(): bool
    {
        $notNeedLogin = $this->notNeedLogin;
        if (empty($notNeedLogin)) {
            return false;
        }
        $action = request()->route()->getActionMethod();
        if (!in_array(trim($action), $notNeedLogin)) {
            return false;
        }
        return true;
    }


}
