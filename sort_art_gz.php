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
        .b{
            color: red;
        }
        .style1{
            padding: 10px;
            text-align: justify;
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
    <div class="style1">
        <table>
            <tr>
                <td>用户</td>
                <td>用户名</td>
                <td>关注度</td>
                <td>操作</td>
            </tr>
            <?php
            $u_id=$_SESSION["id"];
            if(!isset($_POST["submit"])) {
                $query = "select user_id1,sum(flag) num from tb_user_info GROUP by user_id1 desc";
                $result = $pdo->query($query);
                $info = $result->fetch(PDO::FETCH_OBJ);

                if ($info) {
                    do {
                        $id=$info->user_id1;
                        // var_dump($info);
                        ?>
                        <tr>
                            <?php
                            $sql="select * from tb_blog_user where user_id='$id'";
                            $res=$pdo->query($sql);
                            $info1=$res->fetch(PDO::FETCH_OBJ);
                            ?>

                            <td><?php echo $info->user_id1; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo $info1->username; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo $info->num; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><a href="add_user.php?user=<?php echo $info->author; ?>">关注</a></td>
                        </tr>
                        <?php
                    }while ($info = $result->fetch(PDO::FETCH_OBJ));
            }
                $pdo = $info = NULL;

            }
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

