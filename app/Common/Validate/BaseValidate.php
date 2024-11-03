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
        return $this->scene($scene, $extraData)->validate();
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
