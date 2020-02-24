<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();

$a_id=$_GET["id"];
$sql="delete from tb_article where article_id=$a_id";
//$result=$pdo->query($sql);
$result=$pdo->prepare($sql);
$result->execute();

if($result){
    //var_dump($a_id);
    //var_dump($result);
    echo "<script>alert('删除成功！'); window.location.href='search_article.php';</script>";
}else{
    //var_dump($a_id);
    //var_dump($result);
    echo "<script>alert('删除失败！'); history.back();</script>";
}
$pdo=$result=NULL;
?>