<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24 0024
 * Time: 16:34
 */
namespace app\publics\controller;

use thinkcms\auth\Auth;
use thinkcms\auth\library\Tree;
use thinkcms\auth\model\Menu;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    // 主页
    public function home()
    {
        echo "主页";
    }

    // 菜单管理
    public function menu()
    {
        $menu = Auth::menuCheck();
        $tree = new Tree();

        // 菜单结构
        $new_menu = [];
        $count = 0;
        foreach ($menu as $k => &$v) {
            $url = $v['url_param'] ? '?'.$v['url_param'] : '';
            $v['url'] = '/'.$v['app'].'/'.$v['model'].'/'.$v['action'].$url;
            $v['icon'] = $v['icon'] ? $v['icon'] : 'layui-icon-triangle-r';
            $v['level'] = $tree->get_level($v['id'], $menu);
        }

        $tree->init($menu);
        foreach ($menu as $key => $value) {
            if ($value['level'] == 1) {
                $value['children'] = $tree->get_child($value['id']);
                $new_menu[$count++] = $value;
            }
        }

        $this->result($new_menu, 200);
    }

    // 获取用户名
    public function get_username()
    {
        Auth::is_login();
        $this->success($this->username);
    }
}
