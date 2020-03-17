<?php
$status  = isset($info['status'])?$info['status']:'';
$type    = isset($info['type'])?$info['type']:'';
?>

<style>
    .layui-form-item .layui-input-inline {
        width: 300px;
    }
    .red {
        color: red!important;
    }
    .layui-word-aux a {
        color: #009688;
    }
    .layui-word-aux a:hover {
        color: #3EABA0;
    }
</style>

<div class="layui-form" style="margin-top:15px;">
    <div class="layui-form-item">
        <label class="layui-form-label">上级</label>
        <div class="layui-input-inline">
            <select class="layui-input" name="parent_id">
                <?php echo isset($info['selectCategorys'])?$info['selectCategorys']:'';?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <input type="radio" name="status" <?php echo empty($status)|$status==1?'checked':''?> value="1" checked title="显示">
            <input type="radio" name="status" <?php echo $status === 0?'checked':''?>   value="0" title="隐藏">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">类型</label>
        <div class="layui-input-inline">
            <input type="radio" name="type" <?php echo empty($status)|$status==1?'checked':''?> value="1" checked title="权限认证+菜单">
            <input type="radio" name="type" <?php echo $status === 0?'checked':''?>   value="0" title="只作为菜单">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">名称</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" required lay-verify="required" name="name" value="<?php echo isset($info['name'])?$info['name']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux red">*</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">应用</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" required lay-verify="required" name="app" value="<?php echo isset($info['app'])?$info['app']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux red">*</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">控制器</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" required lay-verify="required" name="model" value="<?php echo isset($info['model'])?$info['model']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux red">*</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">方法</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" required lay-verify="required" name="action" value="<?php echo isset($info['action'])?$info['action']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux red">*</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">参数</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" name="url_param" value="<?php echo isset($info['url_param'])?$info['url_param']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux">例：id=3&cid=3</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">验证规则</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" name="rule_param" value="<?php echo isset($info['rule_param'])?$info['rule_param']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux">例：{id}==3 and {cid}==3</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="text" name="icon" id="action" value="<?php echo isset($info['icon'])?$info['icon']:'';?>">
        </div>
        <div class="layui-form-mid layui-word-aux">
            <a href="https://www.layui.com/doc/element/icon.html" target="_blank">选择图标</a>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">请求类型</label>
        <div class="layui-input-inline">
            <select class="layui-input" name="request">
                <option value="">关闭</option>
                <?php
                    $type       = ['GET','POST','PUT','PUT','DELETE','AJAX'];
                    $request   = isset($info['request'])?$info['request']:'';
                    foreach($type as $v){
                        $selected = $request == $v ?'selected':'';
                        echo '<option '.$selected.' value="'.$v.'">'.$v.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">请求类型</label>
        <div class="layui-input-inline">
            <textarea name="log_rule" class="layui-textarea" rows="3" ><?php echo isset($info['log_rule'])?$info['log_rule']:'';?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-inline">
            <textarea name="remark" class="layui-textarea" rows="3" ><?php echo isset($info['remark'])?$info['remark']:'';?></textarea>
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
