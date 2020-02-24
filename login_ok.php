<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();
if(isset($_POST["submit"])){
    $Username=$_POST["username"];
    $pwd=$_POST["pwd"];
$_SESSION["username"]=$Username;

$time=60*60*24*30;

//var_dump($_SESSION["username"]);
setcookie(session_name(),session_id(),time()+$time,"/");
$sql = "select * from tb_blog_user where username='$Username'and pwd='$pwd'";

    $result = $pdo->prepare($sql);
    $result->execute();
    $info = $result->fetch(PDO::FETCH_OBJ);

    $u_id=$info->user_id;
    $_SESSION["id"]=$u_id;

    if($info){
        echo "<script> window.location.href='index.php?page=1';</script>";
        exit;
    } else {
        echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
        exit;
    }

}
$pdo=$info=NULL;
?>