<?php require $pach . 'public/top.php';?>

<style>
    .checkmod{
        margin-bottom:20px;
        border: 1px solid #ebebeb;padding-bottom: 5px;
    }
    .checkmod dt{
        padding-left:10px;
        height:30px;
        line-height:30px;
        font-weight:bold;
        border-bottom: 1px solid #ebebeb;
        background-color:#ECECEC;
    }
    .checkmod dt{
        margin-bottom: 5px;
        border-bottom-color:#ebebeb;
        background-color:#ECECEC;
    }
    .checkbox , .radio{
        display:inline-block;
        height:20px;
        line-height:20px;
    }
    .checkmod dd{
        padding-left:10px;
        line-height:30px;
    }
    .checkmod dd .checkbox{
        margin:0 10px 0 0;
    }
    .checkmod dd .divsion{
        margin-right:20px;
    }
    .checkmod dt{
        line-height:30px;
        font-weight:bold;
    }

    .rule_check{border: 1px solid #ebebeb;margin: auto;padding: 5px 10px;}
    .menu_parent{margin-bottom: 5px;}

</style>

<div class="layui-col-sm12">
    <div class="layui-card">
        <div class="layui-card-header" style="border-bottom:0;height:50px;">
          <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title" style="padding:10px 0;height:30px;">
                {if checkPath('admin/index')}
                <li><a href="{:url('admin/index')}">用户管理</a></li>
                {/if}
                {if checkPath('admin/add')}
                <li><a href="{:url('admin/add')}">添加用户</a></li>
                {/if}
                <li class="layui-this"><a href="">查看权限</a></li>
            </ul>
          </div>
        </div>
        <div class="layui-card-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href="">{:input('name')}权限</a></li>
            </ul>
            <div class="cf well form-search" style="height: 30px;">
                <p>★角色权限      <input style="margin-left: 5px" type="checkbox">未有权限</p>
            </div>
            <div class="wrap js-check-wrap">
                <form class="form-horizontal"  action="{:Url('auth/authorize',['id'=>$info['id']])}" method="post">
                    <div class="table_full">
                        <table width="100%" cellspacing="0" id="dnd-example">
                            <tbody>
                                <?php echo $info['html']?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

<script type="text/javascript">

    function checknode(obj) {

        var chk = $("input[type='checkbox']");
        var count = chk.length;
        var num = chk.index(obj);
        var level_top = level_bottom = chk.eq(num).attr('level');

        for (var i = num; i >= 0; i--) {
            var le = chk.eq(i).attr('level');
            if (eval(le) < eval(level_top)) {
                chk.eq(i).prop("checked",true);
                var level_top = level_top - 1;
            }
        }

        for (var j = num + 1; j < count; j++) {
            var le = chk.eq(j).attr('level');
            if (chk.eq(num).prop("checked")) {
                if (eval(le) > eval(level_bottom)){

                    chk.eq(j).prop("checked",true);
                }
                else if (eval(le) == eval(level_bottom)){
                    break;
                }
            } else {
                if (eval(le) > eval(level_bottom)){
                    chk.eq(j).prop("checked",false);
                }else if(eval(le) == eval(level_bottom)){
                    break;
                }
            }
        }
    }
</script>
<?php require $pach . 'public/foot.php';?>