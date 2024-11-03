<?php

namespace App\Adminapi\Validate\Auth;

use App\Common\Validate\BaseValidate;
use App\Common\Model\Auth\AdminRole;
use App\Common\Model\Auth\SystemRole;

class RoleValidate extends BaseValidate
{
    protected $rules = [
        'add' => [
            'name' => 'required|max:64|unique:system_role,name',
            'menu_id' => 'array',
        ],
        'detail' => [
            'id' => 'required|checkRole',
        ],
        'delete' => [
            'id' => 'required|checkRole|checkAdmin',
        ],
    ];

    protected $messages = [
        'id.required' => '请选择角色',
        'name.required' => '请输入角色名称',
        'name.max' => '角色名称最长为64个字符',
        'name.unique' => '角色名称已存在',
        'menu_id.array' => '权限格式错误',
    ];

    public function rules($scene='')
    {
        return $this->rules[$scene] ?? [];
    }

    public function messages()
    {
        return $this->messages;
    }

    /**
     * 验证角色是否存在
     * @param $attribute
     * @param $value
     * @param $fail
     */
    public function checkRole($attribute, $value, $fail)
    {
        if (!SystemRole::find($value)) {
            $fail('角色不存在');
        }
    }

    /**
     * 验证角色是否被使用
     * @param $attribute
     * @param $value
     * @param $fail
     */
    public function checkAdmin($attribute, $value, $fail)
    {
        if (AdminRole::where('role_id', $value)->exists()) {
            $fail('有管理员在使用该角色，不允许删除');
        }
    }
}
