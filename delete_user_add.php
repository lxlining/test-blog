<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();

$u_id=$_SESSION["us_id"];
$sql="delete from tb_user_info where user_id2=$u_id";
//$result=$pdo->query($sql);
$result=$pdo->prepare($sql);
$result->execute();

if($result){
    //var_dump($a_id);
    //var_dump($result);
    echo "<script> window.location.href='self.php';</script>";
}else{
    //var_dump($a_id);
    //var_dump($result);
   echo "<script> history.back();</script>";
}
$pdo=$result=NULL;
?>