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

        .content-left{
            width: 30%;
            float: left;

        }
        .content-right{
            width: 70%;
            height: 100%;
            float: left;

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
<script>

</script>
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
        <li><a href="#">文章</a></li>
        <li><a href="self.php">个人中心</a></li>
    </div>
    <div class="content">
        <div class="content-left">
            <br>
        <td>文章管理</td>
        <br>
        </div>
    </div>
    <div class="content-right">
        <table>
        <tr>
            <td>ID</td>
            <td>标题</td>
            <td>时间</td>
            <td>操作</td>
        </tr>
            <?php
            $u_id=$_SESSION["id"];
            if(!isset($_POST["submit"])) {
                $query1 = "select * from tb_article where user_id=$u_id";
                $result1 = $pdo->query($query1);
                $info1 = $result1->fetch(PDO::FETCH_OBJ);
                //$id = $info->article_id;

                while ($info1 = $result1->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td ><?php echo $info1->article_id; ?></td>
                        <td ><?php echo $info1->title; ?></td>
                        <td><?php echo $info1->now; ?></td>
                        <td><a href="delete_article.php?id='<?php echo $info1->article_id; ?>'">删除</a>||<a href="modify_article.php?id='<?php echo $info1->article_id; ?>'">修改</a></td>
                    </tr>
                    <?php
                }
            }else{
            ?>

        <?php
            $search = $_POST["search_article"];
            $query = "select * from tb_article where user_id=$u_id and (author like '%$search%' or article_id like '%$search%' or title like '%$search%')";
            $result = $pdo->query($query);
            $info = $result->fetch(PDO::FETCH_OBJ);
            //$id = $info->article_id;

            while ($info = $result->fetch(PDO::FETCH_OBJ)) {
                // var_dump($info);
                ?>
                <tr>
                    <td ><?php echo $info->article_id; ?></td>
                    <td ><?php echo $info->title; ?></td>
                    <td><?php echo $info->now; ?></td>
                    <td><a href="delete_article.php?id='<?php echo $info->article_id; ?>'">删除</a>||<a href="modify_article.php?id='<?php echo $info->article_id; ?>'">修改</a></td>
                </tr>
                <?php
            }
        }
        $pdo=$info=$info1=NULL;


        ?>
        </table>


    </div>
    <div class="footer">
        <br>
        小小博客版权所有 2020-- 重庆师范大学-李小林 业务联系 QQ：1752116947  All Rights Reserved
    </div>
</div>
</body>
</html>

