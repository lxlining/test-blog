<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include("conn/conn.php");
session_start();

$user=$_SESSION["username"];

$query = "select * from tb_blog_user where username='$user'";
$result1 = $pdo->query($query);
$info1 = $result1->fetch(PDO::FETCH_OBJ);
$user1 = $info1->user_id;

if(isset($_POST["submit"])) {
    $search = $_POST["search"];
    $query = "select * from tb_blog_user where username like '%$search%' or user_id like '%$search%'";
    $result = $pdo->query($query);
    $info = $result->fetch(PDO::FETCH_OBJ);
    $id=$info->user_id;
}

    if(!$info){
        echo "<font color='red'>暂无用户信息！</font>";
    }else{
        do{
            ?>
            <table>
<td><?php echo $info->user_id;?></td>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="id" value="<?php echo $user1;?>">
<td><?php echo $info->username;?></td>&nbsp;&nbsp;&nbsp;&nbsp;
<td><a href="add_user.php?id=<?php echo $info->user_id;?>">关注</a></td><br>
            </table>
<?php
        }while($info=$result->fetch(PDO::FETCH_OBJ));
}
$info=$info1=$pdo=NULL;
?>