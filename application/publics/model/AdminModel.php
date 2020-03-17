<?php
namespace app\publics\model;

use think\Model;
use think\Db;

class AdminModel extends Model
{
    protected $name = 'admin';

    // 查看用户身份权限
    public function get_user_info()
    {
        return Db::name('auth_role_user')
            ->alias('aru')
            ->rightJoin('th_admin a', 'aru.user_id = a.id')
            ->leftjoin('th_auth_role ar', 'aru.role_id = ar.id')
            ->field('a.*, ar.name')
            ->order('a.id asc')
            ->select();
    }

    // 获取全部角色
    public function get_all_role()
    {
        return Db::name('auth_role')
            ->select();
    }
}