<?php
header( "Content-type: text/html; charset=utf-8");//设置文件编码格式
include("conn/conn.php");
session_start();

$name=$_SESSION["username"];
$sql="select user_id from tb_blog_user where username='$name'";
$result=$pdo->query($sql);
$info=$result->fetch(PDO::FETCH_OBJ);
$u_id=$info->user_id;


if(isset($_POST["submit"])) {
    $title=$_POST["title"];
    $content=$_POST["content"];
    $author=$_SESSION["username"];
    $now=date("Y-m-d H:i:s");
    $sort=$_POST["sort"];
    $sql="insert into tb_article (title,content,author,now,user_id,classname) values ('$title','$content','$author','$now','$u_id','$sort')";
    $result=$pdo->prepare($sql);
    $result->execute();
    if($result){
        echo "<script>alert('发表成功！');window.location.href='index.php?page=1'</script>";
    }else{
        echo "<script>alert('发表失败！');history.back();</script>";
    }

}
$pdo=$result=NULL;
?>