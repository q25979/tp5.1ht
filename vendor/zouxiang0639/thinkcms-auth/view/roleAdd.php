<?php require $pach . 'public/top.php';?>

<div class="layui-col-sm12">
    <div class="layui-card">
        <div class="layui-card-header" style="border-bottom:0;height:50px;">
          <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title" style="padding:10px 0;height:30px;">
                {if condition="checkPath('auth/role')"}
                    <li><a href="<?php echo Url('auth/role')?>">角色管理</a></li>
                {/if}
                <li  class="layui-this"><a href="<?php echo Url('auth/roleAdd')?>">增加角色</a></li>
            </ul>
          </div>
        </div>
        <div class="layui-card-body">
            <form class="form-horizontal" action="<?php echo Url('auth/roleAdd')?>" method="post" >
                <?php require $pach . 'form/form_role.php';?>
            </form>
        </div>
    </div>
</div>

<?php require $pach . 'public/foot.php';?>
