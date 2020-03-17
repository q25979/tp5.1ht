!function(a) {


    //a标签post提交
    $('.a-post').click(function(){
        var msg =$(this).attr('post-msg');

        if(msg) {
            var url =$(this).attr('post-url');
            layer.confirm(msg, {icon: 3, title:'提示'}, function(index){
                $.ajax(
                    {
                        url : url,
                        type : 'post',
                        dataType : 'json',
                        success : function (json)
                        {
                            if(json.code == 1){

                                layer.msg(json.msg, { time: 1000, icon: 6 })

                                setTimeout(function() {
                                    window.location.href=json.url;
                                },1000);
                            }else if(json.code == 0){
                                layer.msg(json.msg, { time: 1000, icon: 5 })

                            }
                            setTimeout(function() {
                                $('.close').click();
                            },3e3);
                        },
                        error:function(xhr){          //上传失败

                            layer.msg(json.msg, { time: 1000, icon: 4 })

                        }
                    });
                layer.close(index)
            })
        }
    });


    //form表达提交
    $(".ajax-post").click(function(){

        var data,ajaxCallUrl,postUrl;

        d = $(this).parents('.form-horizontal');
        postUrl = $(this).attr('post-url');

        //按钮上的url优先
        ajaxCallUrl = postUrl ? postUrl : d.attr('action');

        $.ajax({
            url : ajaxCallUrl,
            type : 'post',
            dataType : 'json',
            data : d.serialize(),
            success: function(json) {
                if(json.code == 1){
                    layer.msg(json.msg, { time: 1000, icon: 6 }, function () {
                        layer.confirm('是否离开此页', {icon: 3, title:'提示'}, function(index){
                            window.location.href=json.url
                            layer.close(index)
                        })
                    })

                }else if(json.code == 0){
                    layer.msg(json.msg, { time: 1000, icon: 5 })

                }
                setTimeout(function() {
                    $('.close').click();
                },3e3);
            },
            error:function(xhr){          //上传失败
                layer.msg(xhr.responseText, { time: 1000, icon: 4 })
            }
        });
    });



    //按钮禁止
    a(".ajax-post").on("click",
        function() {
            var b = a(this);
            b.button("loading"),
                setTimeout(function() {
                    b.button("reset");
                },3e3)
        });


    $(".listOrder").focus(function ()
        {
            layer.msg('输入一个数字来更改排序')
            $(this).css("background-color", "#E93333");
        }
    );
    $(".listOrder").blur(function(){
        var url,id,order;

        layer.closeAll()
        $(this).css("background-color", "#F1F1F1");
        url     = $('.listOrderUrl').val();
        id      = $(this).attr('data');
        order   = $(this).val();

        $.ajax(
            {
                url : url,
                type : 'post',
                dataType : 'json',
                data : 'id=' + id + '&order=' + order,
                success : function (json)
                {
                    layer.msg(json.msg, { time: 1000 })
                    setTimeout(function() {
                        $('.close').click();
                    },3e3);
                },
                error:function(xhr){          //上传失败

                    layer.msg(xhr.responseText, { time: 1000 })
                }
            });
    });

} (jQuery);





function alertSuccess(data){
    return '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>';
}


function alertDanger(data){
    return '<div class="alert alert-danger" role="alert" style="overflow-y: auto;max-height: 600px;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+data+'</div>';
}

