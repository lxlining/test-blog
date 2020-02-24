<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();

    $name = $_SESSION["username"];

$sql="select * from tb_blog_user where username='$name'";
$result=$pdo->query($sql);
$info=$result->fetch(PDO::FETCH_OBJ);
if(!$info){
    echo "<script>alert('对不起，该用户已经销户！');history.back();</script>";
}else {
    $u_id = $info->user_id;
    $id = $_GET["id"];
    $flag = 1;
    $sql1 = "insert into tb_user_info (user_id1,user_id2,flag) values ('$u_id','$id','$flag')";
    $result = $pdo->prepare($sql1);
    $result->execute();


    if ($result) {
        //var_dump($result);
        echo "<script>window.location.href='self.php';</script>";
    } else {
        //var_dump($id);
        //var_dump($u_id);
        echo "<script>alert('关注失败！');history.back();</script>";
    }
}
$pdo=$result=NULL;
?>