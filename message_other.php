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
<?php
include ("conn/conn.php");
session_start();
if(isset($_POST["submit"])){
    $a_id=$_POST["a_id"];
    $u_id=$_POST["u_id"];
}
?>
<body>
<div class="container">
    <div class="banner">
        <img src="images/banner.jpeg" width="100%" height="100%" >
    </div>
    <div class="nav">
        <li><a href="#">首页</a></li>
        <li><a href="#">文章</a></li>
        <li><a href="#">个人中心</a></li>
    </div>
    <div class="content">
        <form method="post" action="message_other_ok.php" onsubmit="return checkInput(this)">
            <div>
                <td>评论：</td><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span >
								<textarea name="message" rows="5" cols="60"></textarea>
							</span>
                <div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="u_id" value="<?php echo $u_id;?>">
                    <input type="hidden" name="a_id" value="<?php echo $a_id;?>">
                    <input type="submit" name="submit" value="提交"/>
                </div>
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
