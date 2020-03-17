<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

// 常量配置
const ADMIN_LOCK_COUNT = 'thgj_admin';      // 后台输入账号锁

/**
 * 后台访问时 获取客户IP
 * @return string
 */
function get_ip() {
    if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']) {
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ip[0]);
        $ip = $ip ? $ip : '127.0.0.1';
    }else{
        $ip = '127.0.0.1';
    }
    return $ip;
}
