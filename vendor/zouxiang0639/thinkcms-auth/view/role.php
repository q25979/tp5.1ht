<?php require $pach . 'public/top.php';?>

<div class="layui-col-sm12">
    <div class="layui-card">
        <div class="layui-card-header" style="border-bottom:0;height:50px;">
          <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title" style="padding:10px 0;height:30px;">
                <li class="layui-this"><a href="<?php echo url('auth/role')?>">角色管理</a></li>
                {if condition="checkPath('auth/roleAdd')"}
                    <li><a href="<?php echo url('auth/roleAdd')?>">增加角色</a></li>
                {/if}
            </ul>
          </div>
        </div>

        <div class="layui-card-body">
            <table class="layui-table table table-hover table-bordered table-list" id="menus-table" lay-size="sm">
            <thead>
                <tr>
                    <th width="30" style="text-align:center">ID</th>
                    <th align="left">角色名称</th>
                    <th align="left">角色描述</th>
                    <th width="50" style="text-align:center">状态</th>
                    <th width="160">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $v){?>
                    <tr>
                        <td style="text-align:center">{$v.id}</td>
                        <td>{$v.name}</td>
                        <td>{$v.remark}</td>
                        <td style="text-align:center">
                            <?php if($v['status']==1){ ?>
                                <font color="green">开启</font>
                            <?php }else{ ?>
                                <font color="red">禁用</font>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($v['id']==1){ ?>
                                <font color="#cccccc">权限设置</font> |
                                <font color="#cccccc">编辑</font> |
                                <font color="#cccccc">删除</font>
                            <?php }else{ ?>
                                {if condition="checkPath('auth/authorize',['id'=>$v['id']])"}
                                    <a href="<?php echo url('auth/authorize',['id'=>$v['id']])?>">权限设置</a> |
                                {/if}
                                {if condition="checkPath('auth/roleEdit',['id'=>$v['id']])"}
                                    <a href="<?php echo url('auth/roleEdit',['id'=>$v['id']])?>">编辑</a> |
                                {/if}
                                {if condition="checkPath('auth/roleDelete',['id'=>$v['id']])"}
                                    <a class="a-post" style="cursor: pointer;" post-msg="你确定要删除吗" post-url="<?php echo url('auth/roleDelete',['id'=>$v['id']])?>">删除</a>
                                {/if}
                            <?php } ?>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<?php require $pach . 'public/foot.php';?>




