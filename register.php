<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style>
        body{
            margin: 0 auto;
            font-size:14px;
            font-family:"宋体";
        }
        .bule{
            border-color:#ABFEFE;}
        .font1{
            color:#666;}
        .content{
            margin-left: 300px;
        }

    </style>
</head>
<?php

?>
<script>
    function login(){
        window.location.href="login.php";
    }
    function checkInput(form1){
        if(form.username.value==""){
            alert("请输入用户名");
            form.username.focus();
            return false;
        }
        if(form.username.value.length < 3){
            alert("用户名不能小于3位");
            form.username.focus();
            return false;
        }
        if(form.pwd.value==""){
            alert("请输入密码");
            form.pwd.focus();
            return false;
        }
        if(form.pwd.value.length < 6){
            alert("密码不能小于6位");
            form.pwd.focus();
            return false;
        }

        if(form.pwd2.value==""){
            alert("请输入确认密码");
            form.pwd2.focus();
            return false;
        }
        if(form.pwd.value != form.pwd2.value){
            alert("确认密码和密码不同");
            form.pwd2.focus();
            return false;
        }
        if(form.email.value=""){
            alert("请输入邮箱");
            form.email.focus();
            return false;
        }
        return true;
    }

</script>
<body>
<table width="100%" height="29" border="0" align="center">
    <tr>

        <td bgcolor="#B9EDF7" align="center"><b>用户注册</b></td>
    </tr>
</table>
<br><br>


<div align="center" class="content">
<table width="800" border="0" align="center">
    <form name="form1" method="post" action="register_ok.php" onsubmit="return checkInput(this)">
    <tr>
        <td width="80"><b>用户名:</b></td>
            <td>
                <input type="text" name="username" class="bule" id="user_id"/>
            </td>
    </tr>
    <tr>
        <td><b>密码：  </b></td>
        <td>
            <input type="password" name="pwd" id="pwd" size="20"class="bule"/></td>
    </tr>
    <tr>
        <td><b>确定密码：</b></td>
        <td colspan="2">
            <input type="password" name="pwd2" id="pwd2" size="20"class="bule"/>
        </td>
    </tr>
    <tr>
        <td><b>性别：  </b></td>
        <td colspan="2">
            <input type="radio"  name="sex" id="sex" value="女" />女
            <input type="radio"  name="sex" id="sex" value="男" checked/>男<br><br>
        </td>
    </tr>
    <tr>
        <td><b>E-mail：</b></td>
        <td><input type="text" name="email" id="email" class="bule"/></td>
    </tr>
    <tr>
        <td><b>qq：</b></td>
        <td><input type="text" name="qq" id="qq" class="bule"/></td>
    </tr>
    <tr>
        <td><b>个人主页：</b></td>
        <td><input type="text" name="link" id="link" class="bule"/></td>
    </tr>
    <tr>
        <td align="center"><input type="submit" value="提交"/></td>
         <td>已有账号？<input type="button" name="log" value="登录" onclick="return login()"/>
        </td>
    </tr>
    </form>
</table>
</div>

</body>
</html>