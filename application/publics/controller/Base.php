<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24 0024
 * Time: 16:34
 */
namespace app\publics\controller;

use think\Controller;
use thinkcms\auth\Auth;

class Base extends Controller
{
    public $uid;
    public $username;

    public function __construct()
    {
        parent::__construct();
        $auth                   = new Auth();
        $auth->noNeedCheckRules = ['publics/index/index', 'publics/index/home', 'publics/index/menu', 'publics/index/get_username'];
        $auth->log              = true;                 // v1.1版本  日志开关默认true
        $user                   = $auth::is_login();

        if($user) { //用户登录状态
            $this->uid = $user['uid'];
            $this->username = $user['nickname'];
            if(!$auth->auth()){
                return $this->error("你没有权限访问！");
            }
        }else{
            return $this->error("您还没有登录！", url("/publics/login"));
        }
    }
}
