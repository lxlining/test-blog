<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();

//$sql="select article_id from tb_article where user_id='$u_id' order by now desc";
if(isset($_POST["submit"])) {
    $content=$_POST["message"];
    $now=date("Y-m-d H:i:s");
    $u_id=$_POST["u_id"];
    $a_id=$_POST["a_id"];
    $sql="insert into tb_message (content,user_id,now,article_id) values ('$content','$u_id','$now','$a_id')";
    $result=$pdo->prepare($sql);
    $result->execute();
    //var_dump($result);
    if($result){
        echo "<script>alert('发表成功！');window.location.href='other_user_art.php?page=1';</script>";
    }else{
        echo "<script>alert('发表失败！');history.back();</script>";
    }



}
$pdo=$result=NULL;
?>