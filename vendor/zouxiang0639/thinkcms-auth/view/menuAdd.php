<?php require $pach . 'public/top.php';?>

<div class="layui-col-sm12">
  <div class="layui-card">
    <div class="layui-card-header" style="border-bottom:0;height:50px;">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title" style="padding:10px 0;height:30px;">
          {if condition="checkPath('auth/menu')"}
            <li><a href="{:url('auth/menu')}">后台菜单</a></li>
          {/if}
          <li class="layui-this"><a href="{:url('auth/menuAdd')}">增加菜单</a></li>
        </ul>
      </div>
    </div>
    <div class="layui-card-body">
      <form  class="form-horizontal"  action="{:url('auth/menuAdd')}" method="post">
        <?php require $pach . 'form/form_menu.php';?>
      </form>
    </div>
  </div>
</div>

<?php require $pach . 'public/foot.php';?>
