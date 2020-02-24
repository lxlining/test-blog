<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>发表博客</title>
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
            background-size: cover;
        }
    </style>
    <?php
    include ("conn/conn.php");
    session_start();
    ?>
    <script>
        function checkInput(form){
            if(form.title.value==""){
                alert("文章标题不能为空！");
                form.title.focus();
                return false;
            }

            if(form.content.value==""){
                alert("文章内容不能为空！");
                form.content.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="container">
    <div class="banner">
        <img src="images/banner.jpeg" width="100%" height="100%" >
    </div>
    <div class="nav">
        <li><a href="index.php?page=1">首页</a></li>
        <li><a href="#">文章</a></li>
        <li><a href="self.php">个人中心</a></li>
    </div>
    <div class="content">
        <div >
            <form name="form1" method="post" action="check_article_ok.php" onsubmit="return checkInput(this)">
                <div align="center" color="grey">发表博客</div>
                <div id="article_id">
                    <div>
                        <span>文章标题：</span><input type="text" name="title" id="title"/>
                    </div>
                    <td>
                        <span>文章内容：</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <textarea name="content" id="content" rows="10" cols="100"></textarea>
                    </div>

                    <div>
                        文章类别：
                        <td>
                            <input type="radio" name="sort" id="sort1" value="说说">说说
                            <input type="radio" name="sort" id="sort2" value="专业">专业
                            <input type="radio" name="sort" id="sort3" value="吐槽">吐槽
                            <input type="radio" name="sort" id="sort4" value="热点">热点
                            <input type="radio" name="sort" id="sort5" value="其他">其他
                        </td>

                        <br>
                        <input type="submit" name="submit" value="发表"/>
                    </div>
                </div>
            </form>
            <div ></div>
        </div>

    </div>

</div>
<?php

?>
</body>
</html>