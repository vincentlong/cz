<?php

namespace App\Adminapi\Controller;

use Illuminate\Http\JsonResponse;

class IndexController extends BaseAdminController
{
//    public array $notNeedLogin = ['index'];

    public function index(): JsonResponse
    {
        return $this->data([
            "message" => "Hello Adminapi",
            'a' => $this->request->attributes->get('adminInfo'),
            'b' => $this->request->get('foo', 'default'),
            'c' => $this->getAdminId()
        ]);
    }
}
