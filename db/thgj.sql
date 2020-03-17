/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : thgj

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 17/03/2020 16:08:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for th_action_log
-- ----------------------------
DROP TABLE IF EXISTS `th_action_log`;
CREATE TABLE `th_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `log` longtext NOT NULL COMMENT '日志备注',
  `log_url` varchar(255) NOT NULL COMMENT '执行的URL',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  `username` varchar(255) NOT NULL COMMENT '执行者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

-- ----------------------------
-- Records of th_action_log
-- ----------------------------
BEGIN;
INSERT INTO `th_action_log` VALUES (9, 1, 2130706433, '管理员[ 测试 ]偷偷的进入后台了', '/publics/login/index.html', 1584427278, '测试', '后台登录');
INSERT INTO `th_action_log` VALUES (2, 22, 2130706433, '管理员[ 测试2 ]偷偷的进入后台了', '/publics/login/index.html', 1584358763, '测试2', '后台登录');
INSERT INTO `th_action_log` VALUES (3, 22, 2130706433, '管理员[ 测试2 ]偷偷的进入后台了', '/publics/login/index.html', 1584359042, '测试2', '后台登录');
INSERT INTO `th_action_log` VALUES (4, 1, 2130706433, '管理员[ 测试 ]偷偷的进入后台了', '/publics/login/index.html', 1584365318, '测试', '后台登录');
INSERT INTO `th_action_log` VALUES (5, 1, 2130706433, '管理员[ 测试 ]偷偷的进入后台了', '/publics/login/index.html', 1584418106, '测试', '后台登录');
INSERT INTO `th_action_log` VALUES (6, 25, 2130706433, '管理员[ 测试1 ]偷偷的进入后台了', '/publics/login/index.html', 1584423371, '测试1', '后台登录');
INSERT INTO `th_action_log` VALUES (7, 25, 2130706433, '管理员[ 测试1 ]偷偷的进入后台了', '/publics/login/index.html', 1584423520, '测试1', '后台登录');
INSERT INTO `th_action_log` VALUES (8, 1, 2130706433, '管理员[ 测试 ]偷偷的进入后台了', '/publics/login/index.html', 1584423548, '测试', '后台登录');
COMMIT;

-- ----------------------------
-- Table structure for th_admin
-- ----------------------------
DROP TABLE IF EXISTS `th_admin`;
CREATE TABLE `th_admin` (
  `id` int(16) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `login_user` varchar(16) NOT NULL COMMENT '登录账号',
  `login_pass` varchar(32) NOT NULL COMMENT '登录密码',
  `username` varchar(16) NOT NULL COMMENT '用户名称',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态 0-正常 1-冻结',
  `user_email` varchar(32) DEFAULT NULL COMMENT '用户邮箱',
  `last_login_ip` varchar(16) DEFAULT NULL COMMENT '最后一次登录ip',
  `last_login_time` int(16) DEFAULT NULL COMMENT '最后一次登录时间',
  `create_time` int(16) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(16) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`,`login_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_admin
-- ----------------------------
BEGIN;
INSERT INTO `th_admin` VALUES (1, 'q25979', 'cb16979fd5ba7497bbcec4b1157aad11', '测试', 0, NULL, '127.0.0.1', 1584427278, NULL, 1584428097);
INSERT INTO `th_admin` VALUES (22, 'q259792', '4297f44b13955235245b2497399d7a93', '更改测试', 0, NULL, '127.0.0.1', 1584364647, NULL, 1584428398);
COMMIT;

-- ----------------------------
-- Table structure for th_auth_access
-- ----------------------------
DROP TABLE IF EXISTS `th_auth_access`;
CREATE TABLE `th_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_',
  `menu_id` int(11) DEFAULT NULL COMMENT '后台菜单ID',
  KEY `role_id` (`role_id`),
  KEY `rule_name` (`rule_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限授权表';

-- ----------------------------
-- Records of th_auth_access
-- ----------------------------
BEGIN;
INSERT INTO `th_auth_access` VALUES (2, 'publics/index/index', 'admin_url', 1);
INSERT INTO `th_auth_access` VALUES (2, 'publics/index/home', 'admin_url', 19);
INSERT INTO `th_auth_access` VALUES (2, 'publics/index/index', 'admin_url', 15);
INSERT INTO `th_auth_access` VALUES (2, 'publics/auth/default', 'admin_url', 8);
INSERT INTO `th_auth_access` VALUES (2, 'publics/auth/menu', 'admin_url', 9);
INSERT INTO `th_auth_access` VALUES (2, 'publics/auth/menuadd', 'admin_url', 10);
INSERT INTO `th_auth_access` VALUES (2, 'publics/auth/menuedit', 'admin_url', 11);
INSERT INTO `th_auth_access` VALUES (2, 'publics/auth/menudelete', 'admin_url', 12);
INSERT INTO `th_auth_access` VALUES (2, 'publics/auth/menuorder', 'admin_url', 13);
COMMIT;

-- ----------------------------
-- Table structure for th_auth_role
-- ----------------------------
DROP TABLE IF EXISTS `th_auth_role`;
CREATE TABLE `th_auth_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `pid` smallint(6) DEFAULT '0' COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of th_auth_role
-- ----------------------------
BEGIN;
INSERT INTO `th_auth_role` VALUES (1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0);
INSERT INTO `th_auth_role` VALUES (2, '文章管理', 0, 1, '', 0, 1584351377, 0);
COMMIT;

-- ----------------------------
-- Table structure for th_auth_role_user
-- ----------------------------
DROP TABLE IF EXISTS `th_auth_role_user`;
CREATE TABLE `th_auth_role_user` (
  `role_id` int(11) unsigned DEFAULT '0' COMMENT '角色 id',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id',
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

-- ----------------------------
-- Records of th_auth_role_user
-- ----------------------------
BEGIN;
INSERT INTO `th_auth_role_user` VALUES (2, 22);
COMMIT;

-- ----------------------------
-- Table structure for th_menu
-- ----------------------------
DROP TABLE IF EXISTS `th_menu`;
CREATE TABLE `th_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `parent_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `url_param` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'url参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '备注',
  `list_order` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  `rule_param` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '验证规则',
  `nav_id` int(11) DEFAULT '0' COMMENT 'nav ID ',
  `request` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '请求方式（日志生成）',
  `log_rule` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '日志规则',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `model` (`model`),
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of th_menu
-- ----------------------------
BEGIN;
INSERT INTO `th_menu` VALUES (1, 0, 'publics', 'index', 'index', '', 1, 1, '全部系统', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (2, 1, 'publics', 'auth', 'default', '', 0, 1, '权限管理', '', '', 998, '', 0, '', '');
INSERT INTO `th_menu` VALUES (3, 2, 'publics', 'auth', 'role', '', 1, 1, '角色管理', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (4, 3, 'publics', 'auth', 'roleAdd', '', 1, 0, '角色增加', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (5, 3, 'publics', 'auth', 'roleEdit', '', 1, 0, '角色编辑', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (6, 3, 'publics', 'auth', 'roleDelete', '', 0, 0, '角色删除', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (7, 3, 'publics', 'auth', 'authorize', '', 0, 0, '权限设置', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (8, 1, 'publics', 'auth', 'default', '', 0, 1, '菜单管理', '', '', 999, '', 0, '', '');
INSERT INTO `th_menu` VALUES (9, 8, 'publics', 'auth', 'menu', '', 1, 1, '菜单列表', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (10, 9, 'publics', 'auth', 'menuAdd', '', 1, 0, '菜单增加', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (11, 9, 'publics', 'auth', 'menuEdit', '', 0, 0, '菜单修改', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (12, 9, 'publics', 'auth', 'menuDelete', '', 1, 0, '菜单删除', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (13, 9, 'publics', 'auth', 'menuOrder', '', 1, 0, '菜单排序', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (14, 2, 'publics', 'admin', 'index', '', 1, 1, '用户管理', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (15, 1, 'publics', 'index', 'index', NULL, 0, 1, '系统管理', NULL, NULL, 1, NULL, 0, NULL, NULL);
INSERT INTO `th_menu` VALUES (19, 1, 'publics', 'index', 'home', '', 1, 0, '系统主页', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (21, 14, 'publics', 'admin', 'add', '', 0, 0, '用户添加', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (22, 14, 'publics', 'admin', 'edit', '', 1, 0, '用户编辑', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (23, 14, 'publics', 'admin', 'status', '', 1, 0, '用户状态', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (24, 14, 'publics', 'admin', 'deleted', '', 1, 0, '用户删除', '', '', 0, '', 0, '', '');
INSERT INTO `th_menu` VALUES (25, 14, 'publics', 'auth', 'adminAuthorize', '', 0, 0, '查看权限', '', '', 0, '', 0, '', '');
COMMIT;

-- ----------------------------
-- Table structure for th_user
-- ----------------------------
DROP TABLE IF EXISTS `th_user`;
CREATE TABLE `th_user` (
  `id` int(16) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `parent_id` int(16) NOT NULL DEFAULT '0' COMMENT '父级id',
  `login_name` varchar(16) NOT NULL COMMENT '登录账号',
  `login_pass` varchar(32) NOT NULL COMMENT '登录密码',
  `username` varchar(16) NOT NULL COMMENT '用户名称',
  `head_img` varchar(255) NOT NULL COMMENT '用户头像',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '账号状态 0-正常 1-冻结',
  `balance` int(16) NOT NULL DEFAULT '0' COMMENT '用户余额单位-分',
  `register_ip` varchar(16) DEFAULT NULL COMMENT '注册ip',
  `create_time` int(16) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(16) DEFAULT NULL COMMENT '更新会员信息时间',
  `delete_time` int(16) DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`,`login_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

SET FOREIGN_KEY_CHECKS = 1;
