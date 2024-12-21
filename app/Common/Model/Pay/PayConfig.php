<?php

namespace App\Common\Model\Pay;

use App\Common\Enum\PayEnum;
use App\Common\Model\BaseModel;
use App\Common\Service\FileService;
use Illuminate\Support\Facades\Config;


class PayConfig extends BaseModel
{
    protected $table = 'dev_pay_config';

    public $casts = [
        'config' => 'array',
        'create_time' => 'datetime:Y-m-d H:i:s',
    ];

    protected $appends = ['pay_way_name'];

    protected $dateFormat = 'U';

    public $timestamps = false;

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->timezone(Config::get('app.timezone'))->format('Y-m-d H:i:s');
    }

    /**
     * @notes 支付图标获取器 - 路径添加域名
     * @param $value
     * @return string
     */
    public function getIconAttribute($value)
    {
        return empty($value) ? '' : FileService::getFileUrl($value);
    }

    /**
     * @notes 支付方式名称获取器
     * @param $value
     * @param $data
     * @return string|string[]
     */
    public function getPayWayNameAttribute($value)
    {
        return PayEnum::getPayDesc($this->attributes['pay_way']);
    }
}
