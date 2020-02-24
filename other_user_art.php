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
        a{
            text-decoration: none;
        }
        .content{
            position: relative;

        }
        .left{
            width: 20%;
            height: 500px;
            background: url("images/left.png") no-repeat fixed;
            background-size: cover;
            float: left;

        }
        .right{
            width: 80%;
            height: 100%;
            float: left;
            background: url("images/content.png") no-repeat fixed;
            background-size: cover;
        }

        td{
            border: 1px solid black;
        }

        .message{
            padding: 10px;
            text-align: justify;

        }
        .style1{
            background-color:#B0E2FF;
            border: 1px solid grey;
        }
        .style2{
            background-color: #EDEDED;
            border: 1px solid blue;
        }

        .footer{
            width: 100%;
            height: 50px;
            float: left;
            text-align: center;
            background-size: cover;
        }

    </style>
</head>
<?php
include ("conn/conn.php");
session_start();
?>
<body>
<div class="container">
    <div class="banner">
        <img src="images/banner.jpeg" width="100%" height="100%" >
    </div>
    <div class="nav">
        <li><a href="index.php?page=1">首页</a></li>
        <li><a href="article.php">文章</a></li>
        <li><a href="#">个人中心</a></li>
    </div>
    <div class="content">
        <div class="left">
            <td align="center" bgcolor="#FFFFFF">
                <p></p>
                <p></p>
            </td>

            <div>
                <a href="./admin/login.php">后台管理</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="login.php">用户登录</a>
            </div>
            <br><br><br>
            <div class="link">

                <li><a href="https://www.runoob.com/php/php-tutorial.html">PHP菜鸟教程</a> </li>
                <li><a href="https://www.php.cn/">PHP中文网</a> </li>
                <li><a href="http://php.freehostingguru.com/">PHP中文手册</a> </li>
                <li><a href="https://www.w3school.com.cn/">W3C教程</a> </li>
                <li><a href="https://www.php.net/">PHP官网</a> </li>
            </div>
        </div>
        <div class="right">
            <div>
                <?php
                include ("conn/conn.php");
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                    if(is_numeric($page)){
                        $page_size=4;
                        $name=$_SESSION["username"];
                        $id=$_SESSION["us_id"];
                        $query="select count(*) as total from tb_article where user_id=$id";
                        $result = $pdo->query($query);
                        $arr=$result->fetch(PDO::FETCH_ASSOC);
                        $message_count=$arr["total"];
                        $page_count = ceil($message_count / $page_size);
                        $offset = ($page - 1) * $page_size;
                        $sql ="select * from tb_article where user_id='$id' order by now desc limit $offset,$page_size";
                        $result=$pdo->query($sql);
                        $row = $result->fetch(PDO::FETCH_OBJ);
                        $a_id=$row->article_id;
                    }
                    if (!$row) {
                        echo "<font color='red'>暂无文章信息！</font>";
                    } else {
                        do {
                            ?>
                            <div bgcolor="#fff" class="a_c" disabled>
                                <div class="style1 message">
                                    <td>内容：<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->content; ?></td>
                                </div>
                                <br>
                                <td>标题：<?php echo $row->title; ?></td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <td>分类：<?php echo $row->classname; ?></td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <td>时间：<?php echo $row->now; ?></td>
                                <input type="hidden" name="article_id" value="<?php echo $row->article_id;?>"><br>
                                <div id="message">

                                    <div class="style2">
                                        评论：<br>
                                        <?php
                                        $a_id=$row->article_id;
                                        $sql1="select * from tb_message where article_id='$a_id'";
                                        $result1=$pdo->query($sql1);
                                        $row1=$result1->fetch(PDO::FETCH_OBJ);
                                        if(!$row1){
                                            echo "--暂无评论";
                                        }else{
                                            do{
                                                ?>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1->user_id;?>：<?php echo $row1->content;?><br></td>
                                                </tr>


                                                <?php
                                            }while($row1=$result1->fetch(PDO::FETCH_OBJ));
                                        }
                                        ?>

                                    </div>
                                    <form name="form2" id="message_id" action="message_other.php" method="post">
                                        <br>
                                        <input type="hidden" name="u_id" value="<?php echo $id;?>">
                                        <input type="hidden" name="a_id" value="<?php echo $a_id;?>">
                                        <input type="submit" name="submit" value="我要评论">
                                        <p></p><br><br><br><br>
                                    </form>
                                </div>
                            </div>

                            <?php
                        } while ($row = $result->fetch(PDO::FETCH_OBJ));
                    }
                }

                ?>

                <table width="550" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="37%">&nbsp;&nbsp;页次：<?php echo $page ;?>/<?php echo $page_count ;?>页&nbsp;记录：<?php echo $message_count ;?>条&nbsp;</td>
                        <td width="63%" align="right"><?php
                            if($page!=1){
                                echo "<a href=other_user_art.php?page=1>首页</a>&nbsp;";
                                echo "<a href=other_user_art.php?page=".($page-1).">上一页</a>&nbsp;";
                            }
                            if($page<$page_count){
                                echo "<a href=other_user_art.php?page=".($page+1).">下一页</a>&nbsp;";
                                echo "<a href=other_user_art.php?page=".$page_count.">尾页</a>&nbsp;";
                            }
                            $result=$pdo=NULL;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>


        </div>
    </div>
    <div class="footer">
        <br>
        小小博客版权所有 2020-- 重庆师范大学-李小林 业务联系 QQ：1752116947  All Rights Reserved
    </div>
</div>
<script>

</script>
<?php


?>
</body>
</html>
