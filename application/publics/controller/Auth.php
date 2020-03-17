<?php
/**
 * 菜单管理
 * User: Administrator
 * Date: 2018/8/24 0024
 * Time: 16:34
 */
namespace app\publics\controller;

class Auth extends Base
{
    public function _empty($name)
    {
        $auth =  new \thinkcms\auth\Auth();
        $auth = $auth->autoload($name);
        if($auth){
            if(isset($auth['code'])){
                return json($auth);
            }elseif(isset($auth['file'])){
                return $auth['file'];
            }
            $this->view->engine->layout(false);
            return $this->fetch($auth[0],$auth[1]);
        }
        return '页面不存在!';
    }
}