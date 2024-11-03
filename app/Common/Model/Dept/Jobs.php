<?php

namespace App\Common\Model\Dept;

use App\Common\Model\BaseModel;
use Symfony\Component\Mime\Test\Constraint\EmailTextBodyContains;

//use think\model\concern\SoftDelete;


/**
 * 岗位模型
 */
class Jobs extends BaseModel
{
    protected $table = 'jobs';

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
