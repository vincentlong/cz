<?php

namespace App\Adminapi\Controller\Auth;

use App\Adminapi\Logic\Auth\RoleLogic;
use App\Adminapi\Lists\Auth\RoleLists;
use App\Adminapi\Validate\Auth\RoleValidate;
use App\Adminapi\Controller\BaseAdminController;

/**
 * 角色控制器
 */
class RoleController extends BaseAdminController
{

    /**
     * @notes 查看角色列表
     */
    public function lists()
    {
        return $this->dataLists(new RoleLists());
    }


    /**
     * @notes 添加权限
     */
    public function add()
    {
        $params = (new RoleValidate())->post()->goCheck('add');
        $res = RoleLogic::add($params);
        if (true === $res) {
            return $this->success('添加成功', [], 1, 1);
        }
        return $this->fail(RoleLogic::getError());
    }


    /**
     * @notes 编辑角色
     */
    public function edit()
    {
        $params = (new RoleValidate())->post()->goCheck('edit');
        $res = RoleLogic::edit($params);
        if (true === $res) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(RoleLogic::getError());
    }


    /**
     * @notes 删除角色
     */
    public function delete()
    {
        $params = (new RoleValidate())->post()->goCheck('del');
        RoleLogic::delete($params['id']);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 查看角色详情
     */
    public function detail()
    {
        $params = (new RoleValidate())->goCheck('detail');
        $detail = RoleLogic::detail($params['id']);
        return $this->data($detail);
    }


    /**
     * @notes 获取角色数据
     */
    public function all()
    {
        $result = RoleLogic::getAllData();
        return $this->data($result);
    }

}
