<?php require $pach . 'public/top.php';?>

<div class="layui-col-sm12">
  <div class="layui-card">
    <div class="layui-card-header" style="border-bottom:0;height:50px;">
      <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title" style="padding:10px 0;height:30px;">
          <li class="layui-this"><a href="{:url('auth/menu')}">后台菜单</a></li>
          {if condition="checkPath('auth/menuAdd')"}
          <li><a href="{:url('auth/menuAdd')}">增加菜单</a></li>
          {/if}
        </ul>
      </div>
    </div>
    <div class="layui-card-body">
      <div class="cf well form-search" style="margin: 10px 0 15px">
        <div class="fl ">
          <div class="btn-group">
            <button type="button" post-url="{:url('auth/cache')}" class="layui-btn btn ajax-post btn-success">清除日志缓存</button>
          </div>
        </div>
      </div>
      <table class="layui-table table table-hover table-bordered table-list" id="menus-table" lay-size="sm">
        <thead>
          <tr>
            <th width="40">排序</th>
            <th width="50" style="text-align:center">ID</th>
            <th>菜单名称</th>
            <th>应用</th>
            <th>控制器</th>
            <th>方法</th>
            <th>日志请求</th>
            <th width="40" style="text-align:center">状态</th>
            <th width="180">操作</th>
          </tr>
          </thead>
          <tbody>
            <?php echo $info?>
          </tbody>
      </table>
    </div>
  </div>
</div>

<input type="hidden" value="{:url('auth/menuOrder')}" class="listOrderUrl">
<?php require $pach . 'public/foot.php';?>
