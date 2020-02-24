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
    </div>
    <br><br>
    <div>
        <table border="1px">
            <tr>
                <td>作者</td>
                <td>标题</td>
                <td>时间</td>
                <td>内容</td>
                <td>操作</td>
            </tr>
            <?php
            $u_id=$_SESSION["id"];
            if(isset($_POST["submit2"])) {
                $search = $_POST["search_article"];
                $query = "select * from tb_article where (author like '%$search%' or article_id like '%$search%' or title like '%$search%'or classname like '%$search%')";
                $result = $pdo->query($query);
                $info = $result->fetch(PDO::FETCH_OBJ);
                //$id = $info->article_id;

                while ($info = $result->fetch(PDO::FETCH_OBJ)) {
                    // var_dump($info);
                    ?>
                    <tr>

                        <td ><?php echo $info->author; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td ><?php echo $info->title; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $info->now; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $info->content; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><a href="add_user.php?user=<?php echo $info->author; ?>">关注</a> </td>
                    </tr>
                    <?php
                }
            }
            $pdo=$info=NULL;


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

