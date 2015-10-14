<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册页面</title>
</head>
<body>
    <h1>安装php程序</h1>
    <font size="+2" color="#990000">设置一个登录的用户名和密码</font>
    <form action="index.php" method="post" name="form1" onsubmit="return confirm()">
        用户名：&nbsp;<input type="text" name="username" id="username" size="30" /><br />
        密&nbsp;&nbsp;码：<input type="password" id="password" name="password" size="30" /><br />
        确认密码：<input type="password" name="confirmpassword" id="confirmpassword" size="30" /><span id="check" class="msg"></span><br />
        <input type="submit" name="submit" value="提交" /><input type="reset" value="重填" />
    </form>
    <script type="text/javascript" language="javascript">
        function confirm()
        {
            if(document.form1.password.value!=document.form1.confirmpassword.value)
            {
                document.getElementById('check').innerHTML=" <font color=red>两次输入的密码不一致！</font>";
                return false;
            }
        }
    </script>
</body>
</html>
