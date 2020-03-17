<!DOCTYPE html>
<?php

    function get_file($file){
        $directory = Config('thinkcms.style_directory');

        if(empty($directory)){
            return url('auth/openFile',['file'=>$file]);
        }else{
            $file       = strtr($file, '_', '/');
            return $directory.$file;
        }

    }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台操作系统</title>

    <link href="/static/plug-in/layui/css/layui.css" rel="stylesheet">
    <link href="/static/admin/css/admin.css" rel="stylesheet">
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script src="/static/plug-in/layui/layui.all.js"></script>
    <script src="<?php echo get_file('js_bootstrap.min.js')?>"></script>
</head>

<body >
<style>
    .alert{
        position: fixed !important;z-index: 1000;width: 98%;top: 2%;
    }
    .layui-card .layui-tab-brief .layui-tab-title li.layui-this a {
        color: #009688;
    }
    .str-manage a {
        color: #009688;
        cursor: pointer;
    }
    .str-manage a:hover {
        color: #3EABA0;
    }
    .layui-input.listOrder {
        height: 24px;
        padding-left: 0;
        text-align: center;
    }
</style>

<div class="layui-fluid">
  <div class="layui-row layui-col-space15">
