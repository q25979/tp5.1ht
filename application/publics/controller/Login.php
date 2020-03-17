<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/24 0024
 * Time: 16:34
 */
namespace app\publics\controller;

use think\Controller;
use think\facade\Request;
use think\captcha\Captcha;
use think\facade\Cache;
use think\facade\Config;
use app\publics\model\AdminModel;
use thinkcms\auth\Auth;

class Login extends Controller
{
    // 登录页面
    public function index()
    {
        // 账号登录
        if (Request::isPost()) {
            $a_model = new AdminModel();
            $post = input('post.');

            $max_wrong_times_limit = 10; // 错误10次禁用账号
            $redis_key = ADMIN_LOCK_COUNT.$post['login_user'];

            $lock = Cache::get($redis_key);

            if (!captcha_check($post['code'])) {
                // $this->error('验证码错误');
            }

            if (!empty($lock) && $lock >= $max_wrong_times_limit) {
                $this->error('登陆错误已超过限制，请稍后重试');
            }

            // 判断账号密码是否正确
            $amap['login_user'] = $post['login_user'];
            $ainfo = $a_model->where($amap)->find();

            if (empty($ainfo)) {
                $this->error('账号不存在');
            }

            $amap['login_pass'] = md5($post['login_pass'].strtotime($ainfo['create_time']));
            if ($a_model->where($amap)->count() <= 0) {
                if (empty($lock)) {
                    Cache::set($redis_key, 1, 60 * 60);
                } else {
                    Cache::inc($redis_key);
                }
                $this->error('账号或密码错误');
            }

            if ($ainfo['status'] != 0) {
                $this->error('账号已被禁止登录');
            }

            Auth::login($ainfo['id'], $ainfo['username']);
            $update = [
                'last_login_time'   => time(),
                'last_login_ip'     => get_ip()
            ];
            $map['id'] = $ainfo['id'];
            $a_model->update($update, $map);
            Cache::set($redis_key, 0, 1);

            $auth = new Auth();
            $auth->createLog("管理员[ {$ainfo['username']} ]偷偷的进入后台了", '后台登录');;

            $this->success('登录成功，正在跳转...');
        }

        return $this->fetch();
    }

    // 注销
    public function logout()
    {
        Auth::logout();
        $this->success('注销成功');
    }
}
