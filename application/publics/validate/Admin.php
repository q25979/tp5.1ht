<?php
namespace app\publics\validate;

use think\Validate;

class Admin extends Validate
{
    protected $regex = ['login_user' => '^[A-Za-z][A-Za-z0-9]*$'];

    protected $rule = [
        'login_user' => 'require|length:6,16|regex:login_user',
        'login_pass' => 'require|length:6,16',
        'username'   => 'require',
        'role_id'    => 'require|notIn:0'
    ];

    protected $message = [
        'login_user.require' => '用户名不能为空',
        'login_user.length'  => '用户名长度必须为6-16位',
        'login_user.regex'   => '用户名首位必须为字母且不能有特殊字符',
        'username.require'   => '昵称不能为空',
        'login_pass.require' => '密码不能为空',
        'login_pass.length'  => '密码长度必须为6-16位',
        'role_id.require'    => '请选择管理员角色',
        'role_id.notIn'      => '请选择管理员角色'
    ];
}