<?php

namespace App\Adminapi\Validator;

use Illuminate\Support\Facades\Validator;

class BaseValidator
{
    protected $rules = [];

    protected $messages = [];

    protected $attributes = [];

    public function rules($scene)
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

    public function goCheck($scene, $data = [])
    {
        return $this->scene($scene, $data)->validate();
    }

    /**
     * create validator by $scene.
     *
     * @param   $scene
     * @param   $data
     *
     * @return \Illuminate\Validation\Validator
     */
    public function scene($scene, $data = [])
    {
        $default_data = request()->all();
        $params = empty($data) ? $default_data : array_merge($default_data, $data);
        $instance = new static();
        return Validator::make(
            $params,
            $instance->rules($scene),
            $instance->messages(),
            $instance->attributes()
        );
    }

}
