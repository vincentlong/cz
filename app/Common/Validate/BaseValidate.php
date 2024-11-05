<?php

namespace App\Common\Validate;

use Illuminate\Support\Facades\Validator;

class BaseValidate
{
    protected $rules = [];

    protected $messages = [];

    protected $attributes = [];

    public function rules($scene = 'default')
    {
        return $this->rules[$scene] ?? [];
    }

    public function messages()
    {
        return $this->messages;
    }

    public function attributes()
    {
        return $this->attributes;
    }

    public function post()
    {
        return $this;
    }

    public function get()
    {
        return $this;
    }

    public function goCheck($scene = 'default', $extraData = [])
    {
        $after =  $this->scene($scene, $extraData)->validate();
        // Laravel验证器会过滤掉不在校验规则中出现的字段，而TP会保留。为了兼容TP，这里返回全部输入。
        return array_merge(request()->all(), $extraData);
    }

    /**
     * create validator by $scene.
     *
     * @param   $scene
     * @param   $extraData
     *
     * @return \Illuminate\Validation\Validator
     */
    public function scene($scene = 'default', $extraData = [])
    {
        $input = request()->all();
        $data = array_merge($input, $extraData);
        $instance = new static();
        return Validator::make(
            $data,
            $instance->rules($scene),
            $instance->messages(),
            $instance->attributes()
        );
    }

}
