<?php

namespace App\Common\Model\Dict;

use App\Common\Model\BaseModel;

/**
 * 字典类型模型
 * Class DictType
 */
class DictType extends BaseModel
{
    protected $table = 'dict_type';

//    use SoftDelete;
//
//    protected $deleteTime = 'delete_time';

    /**
     * @notes 状态描述
     */
    public function getStatusDescAttribute($value, $data)
    {
        return $data['status'] ? '正常' : '停用';
    }

}
