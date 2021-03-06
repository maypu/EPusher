<?php /*a:1:{s:80:"E:\wamp64\www\phpStrom_Project\EPusher\application\index\view\weixin\qrcode.html";i:1570973171;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>二维码</title>
    <link rel="stylesheet" href="../static/dist/layui/css/layui.css">
    <style>
        body{
            text-align: center;
        }
        img{
            height: 300px;
            display: none;
        }
        #loading i{
            display: inline-block;
            font-size: 40px;
        }
    </style>
</head>
<body>
    <div id="loading">
        <i class="layui-icon layui-icon-loading layui-anim-rotate layui-anim-loop"></i>
    </div>
    <img id="imgQrcode" class="" src="#" alt="qrcode"></img>
    <div>微信扫码登录</div>
    <script src="../static/dist/layui-v2.4.5/layui.js" charset="utf-8"></script>
    <script>
        layui.config({
            base: '../static/dist/layui-v2.4.5/util/' //设定扩展的Layui模块的所在目录，一般用于外部模块扩展
        }).use(['jquery'],function(){
            $ = layui.$;

            $.get('./login',{},function (data) {
                $('#imgQrcode').attr('src', data);
                $('#loading').hide();
                $('#imgQrcode').show();
            });
            let localToken = '';
            //定时判断是否扫码成功
            function isLogin() {
                $.get('./login/isLogin',{token:localToken},function (data) {
                    console.log(data);
                });
            }
        });

    </script>
</body>
</html>