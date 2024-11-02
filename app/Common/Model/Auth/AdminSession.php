<?php

namespace App\Common\Model\Auth;

use App\Common\Model\BaseModel;

class AdminSession extends BaseModel
{
    protected $table = 'admin_session';

    /**
     * @notes 关联管理员表
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
}
