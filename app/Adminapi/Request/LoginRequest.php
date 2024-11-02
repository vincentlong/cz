<?php

namespace App\Adminapi\Request;

use App\Common\Enum\AdminTerminalEnum;
use App\Models\Admin;
use App\Common\Cache\AdminAccountSafeCache;
use App\Common\Service\ConfigService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Closure;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'terminal' => 'required|in:' . AdminTerminalEnum::PC . ',' . AdminTerminalEnum::MOBILE,
            'account' => 'required',
            'password' => [
                'required',
                function (string $attribute, mixed $value, Closure $fail) {
                    $errMsg = $this->validatePassword($this->input('account'), $value);
                    if ($errMsg !== true) {
                        $fail($errMsg);
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'account.required' => '请输入账号',
            'password.required' => '请输入密码',
            'terminal.required' => '终端类型不能为空',
            'terminal.in' => '终端类型错误',
        ];
    }

    protected function validatePassword($account, $password)
    {
        $config = [
            'login_restrictions' => ConfigService::get('admin_login', 'login_restrictions'),
            'password_error_times' => ConfigService::get('admin_login', 'password_error_times'),
            'limit_login_time' => ConfigService::get('admin_login', 'limit_login_time'),
        ];

        $adminAccountSafeCache = new AdminAccountSafeCache();
        if ($config['login_restrictions'] == 1) {
            $adminAccountSafeCache->count = $config['password_error_times'];
            $adminAccountSafeCache->minute = $config['limit_login_time'];
        }

        if ($config['login_restrictions'] == 1 && !$adminAccountSafeCache->isSafe()) {
            return '密码连续' . $adminAccountSafeCache->count . '次输入错误，请' . $adminAccountSafeCache->minute . '分钟后重试';
        }

        $adminInfo = Admin::query()
            ->where('account', $account)
            ->select(['password', 'disable'])
            ->first();

        if (!$adminInfo) {
            return '账号不存在';
        }

        if ($adminInfo->disable === 1) {
            return '账号已禁用';
        }

        if (empty($adminInfo->password)) {
            $adminAccountSafeCache->record();
            return '账号不存在';
        }

        $passwordSalt = Config::get('project.unique_identification');
        if ($adminInfo->password !== create_password($password, $passwordSalt)) {
            $adminAccountSafeCache->record();
            return '密码错误';
        }

        $adminAccountSafeCache->relieve();
        return true;
    }
}
