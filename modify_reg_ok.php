<?php
header ( "Content-type: text/html; charset=utf-8" );
include ("conn/conn.php");
session_start();

if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];
    $sex = $_POST["sex"];
    $link = $_POST["link"];
    $qq=$_POST["qq"];
    $sql="update tb_blog_user set username='$username',pwd='$password',email='$email',sex='$sex',link='$link',qq='$qq' where user_id='$id'";
    $result=$pdo->query($sql);
    //$info=$result->fetch(PDO::FETCH_NUM);
    if($result){
        echo "<script>alert('修改成功！'); window.location.href='self.php';</script>";
    }else{
        echo "<script>alert('修改失败！'); history.back();</script>";
    }
}
$pdo=$result=NULL;
?>

