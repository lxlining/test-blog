<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();
if(isset($_POST["submit"])) {
    $a_id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $now = date("Y-m-d H:i:s");
    $user_id = $_SESSION["id"];
    $author = $_SESSION["username"];

    $sql = "update tb_article set user_id='$user_id',title='$title',content='$content',now='$now',author='$author' where article_id='$a_id'";

    $result = $pdo->prepare($sql);

    $result->execute();

    if ($result) {
        //var_dump($a_id);
        //var_dump($result);
        echo "<script>alert('修改成功！'); window.location.href='search_article.php';</script>";
    } else {
        //var_dump($a_id);
        //var_dump($result);
        echo "<script>alert('修改失败！'); history.back();</script>";
    }
}
$pdo=$result=NULL;
?>