<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<?php
include "conn/conn.php";
session_start();
?>
<body>
<div align="center">个人信息展示</div>
<?php
$name=$_SESSION["username"];
$sql="select * from tb_blog_user where username='$name'";
$result=$pdo->query($sql);
$info=$result->fetch(PDO::FETCH_OBJ);
do{
    ?>
    <table>
        <form name="form1" method="post" action="modify_reg_ok.php">
        <tr>
            <th>用户名：<input type="text" name="username" value="<?php echo $info->username;?>">
                <input type="hidden" name="id" value="<?php echo $info->user_id;?>">
            </th>
        </tr>
        <tr>
            <th>密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd"  value="<?php echo $info->pwd;?>"></th>
        </tr>
        <tr>
            <th>性&nbsp;&nbsp;&nbsp;别：<input type="text" name="sex"  value="<?php echo $info->sex;?>"></th>
        </tr>
        <tr>
            <th>邮&nbsp;&nbsp;&nbsp;箱：<input type="text" name="email"  value="<?php echo $info->email;?>"></th>
        </tr>
        <tr>
            <th>q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;q：<input type="text" name="qq" value="<?php echo $info->qq;?>"></th>
        </tr>
        <tr>
            <th>主&nbsp;&nbsp;&nbsp;页：<input type="text" name="link" value="<?php echo $info->link;?>"></th>
        </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="修改">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="submit2" value="重置"></td>
            </tr>
        </form>
    </table>
    <?php
}while($info=$result->fetch(PDO::FETCH_OBJ));
$pdo=$info=NULL;
?>

</body>
</html>
