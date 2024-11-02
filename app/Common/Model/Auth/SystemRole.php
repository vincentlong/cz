<?php

namespace App\Common\Model\Auth;

use App\Common\Model\BaseModel;

class SystemRole extends BaseModel
{
//    use SoftDelete;
//
//    protected $deleteTime = 'delete_time';

    protected $table = 'system_role';

    /**
     * @notes 角色与菜单关联关系
     * @return \think\model\relation\HasMany
     * @author 段誉
     * @date 2022/7/6 11:16
     */
    public function roleMenuIndex()
    {
        return $this->hasMany(SystemRoleMenu::class, 'role_id');
    }
}
