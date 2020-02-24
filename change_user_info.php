<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body{
            background: url("images/bgc.png");
        }
        .container{
            margin: 0 auto;
        }
        .banner{
            height: 150px;
            border: 1px solid black;
        }
        .nav{
            height: 30px;
            text-align: center;
            border: 1px solid black;

        }
        .nav li{
            float: left;
            display: block;
            list-style-type: none;
            margin-left: 180px;
        }
        .nav li a{
            text-decoration: none;
        }
        .content{
            position: relative;

        }
        .left{
            width: 30%;
            height: 500px;
            background: url("images/left.png") no-repeat fixed;
            background-size: cover;
            float: left;

        }
        .right{
            width: 70%;
            height: 100%;
            float: left;
            background: url("images/content.png") no-repeat fixed;
            background-size: cover;
        }
        .footer{
            width: 100%;
            height: 50px;
            float: left;
            text-align: center;
            background: url("images/footer .png");
            background-size: cover;
        }
    </style>
</head>
<script>
    function register(){
        window.location.href="register.php";
    }
</script>
<body>
<div class="container">
    <div class="banner">
        <img src="images/banner.jpeg" width="100%" height="100%" >
    </div>
    <div class="nav">
        <li><a href="index.php">首页</a></li>
        <li><a href="article.php">文章</a></li>
        <li><a href="self.php">个人中心</a></li>
    </div>
    <div class="content">
        <div id="shade" class="c1 hide"></div>
        <form method="post" action="change_user_info.php?u_id=<?php echo $_SESSION['u_id'];?>" onsubmit="return checkInput(this)">
            <div id="modal" class="c2 hide">
                <h4>修改资料</h4>
                <p>用户：<input class="input1" type="text" name="username" maxlength="10"/></p>
                <p>
                    性别：<input type="radio" name="sex" checked="checked" value="男"/>男
                    <input type="radio" name="sex" value="女"/>女
                </p>
                <p>实名：<input class="input1" type="text" name="reallyname"/></p>
                <p>电话：<input class="input1" type="tel" name="tel"/></p>
                <p>邮箱：<input class="input1" type="email" name="email"></p>
                <p>签名：<input class="input1" type="text" name="signature"></p>
                <p>地址：<input class="input1" type="text" name="address"></p>
                <p>
                    <input class="input2" type="button" value="取消" onclick="Hide();">
                    <input class="input3" type="submit" value="确定">
                </p>
            </div>
        </form>

    </div>
    <div class="footer">
        <br>
        小小博客版权所有 2020-- 重庆师范大学-李小林 业务联系 QQ：1752116947  All Rights Reserved
    </div>
</div>
</body>
</html>

