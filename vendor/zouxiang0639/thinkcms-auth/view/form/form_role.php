<style>
    .layui-form-item .layui-input-inline {
        width: 300px;
    }
</style>

<div class="layui-form" style="margin-top:15px;">
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" value="<?php echo isset($info['name'])?$info['name']:''?>" name="name">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色描述</label>
        <div class="layui-input-inline">
            <textarea name="remark" class="layui-textarea" rows="3" ><?php echo isset($info['remark'])?$info['remark']:''?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <?php
                $status = isset($info['status'])?$info['status']:'';
            ?>
            <input type="radio" name="status" <?php echo empty($status)|$status==1?'checked':''?> value="1" checked title="开启">
            <input type="radio" name="status" <?php echo $status === 0?'checked':''?>   value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="button" class="layui-btn btn btn-primary ajax-post " autocomplete="off">
                保存
            </button>
            <a class="layui-btn layui-btn-primary" href="JavaScript:history.go(-1)">返回</a>
        </div>
    </div>
</div>

<script>
layui.use('form', function(){
    var form = layui.form

    form.render()
})
</script>
