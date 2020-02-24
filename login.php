<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <style>
        .login{
            margin-left: 300px;
            margin-top: 200px;
            width: 400px;
            height: 400px;
        }
.aa{
    background-color: #a4d3fe;
}
    </style>
</head>

<?php
session_start();

?>
<script>
    function register(){
        window.location.href="register.php";
    }
    function chkuserinput(form){
        if(form.username.value==""){
            alert("请输入用户名!");
            form.username.select();
            return(false);
        }4
        if(form.pwd.value==""){
            alert("请输入用户密码!");
            form.pwd.select();
            return(false);
        }
        return(true);
    }
</script>
<body>
<div>
    <div class="login">
        <table>
            <div class="aa">
            <form name="form1" method="post" action="login_ok.php" onSubmit="return chkuserinput(this)">

                <fieldset>
                    <br>
                    <label>用户名：</label>
                    <input type="text" name="username" id="user_id" value="0000">
                    <br/><br/>
                    <label>密&nbsp;&nbsp;&nbsp;码： </label>
                    <input type="password" name="pwd" id="pwd" value="0000">
                    <br/><br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="vtime" id="vtime" checked><br>
                    <input type="submit" name="submit" value="登录" onclick="return check();">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" name="reg" value="注册" onclick="register()">
<br><br>
                </fieldset>
            </form>
            </div>
        </table>
    </div>
</div>
</body>
</html>
