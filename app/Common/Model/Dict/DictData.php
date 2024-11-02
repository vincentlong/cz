<?php

namespace App\Common\Model\Dict;

use App\Common\Model\BaseModel;

/**
 * 字典数据模型
 */
class DictData extends BaseModel
{
    protected $table = 'dict_data';

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
