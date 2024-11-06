<?php

namespace App\Common\Model\User;

use App\Common\Enum\User\UserEnum;
use App\Common\Model\BaseModel;
use App\Common\Service\FileService;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 用户模型
 */
class User extends BaseModel
{
    protected $table = 'user';

    use SoftDeletes;

    protected function getDeletedAtColumn()
    {
        return 'delete_time';
    }

    /**
     * @notes 关联用户授权模型
     * @return \think\model\relation\HasOne
     */
    public function userAuth()
    {
        return $this->hasOne(UserAuth::class, 'user_id');
    }

    /**
     * @notes 搜索器-用户信息
     * @param $query
     * @param $value
     * @param $data
     */
    public function searchKeywordAttr($query, $value, $data)
    {
        if ($value) {
            $query->where('sn|nickname|mobile|account', 'like', '%' . $value . '%');
        }
    }


    /**
     * @notes 搜索器-注册来源
     * @param $query
     * @param $value
     * @param $data
     */
    public function searchChannelAttr($query, $value, $data)
    {
        if ($value) {
            $query->where('channel', '=', $value);
        }
    }


    /**
     * @notes 搜索器-注册时间
     * @param $query
     * @param $value
     * @param $data
     */
    public function searchCreateTimeStartAttr($query, $value, $data)
    {
        if ($value) {
            $query->where('create_time', '>=', strtotime($value));
        }
    }


    /**
     * @notes 搜索器-注册时间
     * @param $query
     * @param $value
     * @param $data
     * @author 段誉
     * @date 2022/9/22 16:13
     */
    public function searchCreateTimeEndAttr($query, $value, $data)
    {
        if ($value) {
            $query->where('create_time', '<=', strtotime($value));
        }
    }


    /**
     * @notes 头像获取器 - 用于头像地址拼接域名
     * @param $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return trim($value) ? FileService::getFileUrl($value) : '';
    }


    /**
     * @notes 获取器-性别描述
     * @param $value
     * @param $data
     * @return string|string[]
     */
    public function getSexAttribute($value)
    {
        return UserEnum::getSexDesc($value);
    }

    /**
     * @notes 登录时间
     * @param $value
     * @return string
     */
    public function getLoginTimeAttribute($value)
    {
        return $value ? date('Y-m-d H:i:s', $value) : '';
    }

    /**
     * @notes 生成用户编码
     * @param string $prefix
     * @param int $length
     * @return string
     */
    public static function createUserSn($prefix = '', $length = 8)
    {
        $rand_str = '';
        for ($i = 0; $i < $length; $i++) {
            $rand_str .= mt_rand(1, 9);
        }
        $sn = $prefix . $rand_str;
        if (User::where(['sn' => $sn])->first()) {
            return self::createUserSn($prefix, $length);
        }
        return $sn;
    }


}
