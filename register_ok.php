<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
session_start();
include("conn/conn.php");

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];
    $sex = $_POST["sex"];
    $link = $_POST["link"];
    $qq=$_POST["qq"];


$sql = "select * from tb_blog_user where username = '$username'";
$result = $pdo->query($sql);
$info=$result->fetch(PDO::FETCH_OBJ);
if($info){
    //echo "<script>alert('该昵称已经存在!');history.back();</script>";
    exit;
} else {
    $sql1 = "insert into tb_blog_user(username,pwd,email,sex,link,qq) values ('$username','$password','$email','$sex','$link','$qq')";

//		mysqli_query($conn,$sql1);
    $result1 = $pdo->prepare($sql1);
    $result1->execute();

    echo "<script>window.location.href='login.php';</script>";
}
$pdo=$info=NULL;

?>