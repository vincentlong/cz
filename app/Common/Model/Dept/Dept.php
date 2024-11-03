<?php

namespace App\Common\Model\Dept;

use App\Common\Model\BaseModel;

//use think\model\concern\SoftDelete;

/**
 * 部门模型
 */
class Dept extends BaseModel
{

    protected $table = 'dept';

//    use SoftDelete;
//
//    protected $deleteTime = 'delete_time';

    /**
     * @notes 状态描述
     * @param $value
     * @param $data
     * @return string
     */
    public function getStatusDescAttribute()
    {
        return $this->attributes['status'] ? '正常' : '停用';
    }

}
