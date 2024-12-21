<?php

namespace App\Common\Model\Pay;

use App\Common\Model\BaseModel;
use App\Common\Service\FileService;
use Illuminate\Support\Facades\Config;

class PayWay extends BaseModel
{
    protected $table = 'dev_pay_way';

    protected $appends = ['pay_way_name'];

    public $casts = [
        'create_time' => 'datetime:Y-m-d H:i:s',
    ];

    protected $dateFormat = 'U';

    public $timestamps = false;

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->timezone(Config::get('app.timezone'))->format('Y-m-d H:i:s');
    }

    public function getIconAttribute($value)
    {
        return FileService::getFileUrl($value);
    }

    /**
     * @notes 支付方式名称获取器
     * @param $value
     * @return mixed
     */
    public function getPayWayNameAttribute($value)
    {
        return PayConfig::query()->where('id', $this->attributes['pay_config_id'])->value('name');
    }

    /**
     * @notes 关联支配配置模型
     */
    public function payConfig()
    {
        return $this->hasOne(PayConfig::class, 'id', 'pay_config_id');
    }
}
