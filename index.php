<?php
    header("Content-Type:text/html;charset=utf-8");
    #判断是否已经注册用户，如果是，则跳转登陆界面
    if(!file_exists("config.php"))
    {
        header("Location: ./controller/LoginUIController.php");
        exit();
    }
    #判断是否未曾注册用户，如果是，则跳转注册页面
	if(!isset($_POST['submit']))
    {
	   header("Location: ./config.php");
       exit();
    }
    #从config页面跳转，注册新用户信息
    require_once './model/SqlHelper.class.php';
    $conn= new SqlHelper();
    $username= $_POST['username'];
    $password= md5($_POST['password']);
    $sql="insert into admin (username,passwd) values ('$username','$password')";
    $conn->execute_dql($sql);
    #重命名config文件，标注为已注册
    rename("config.php","config.lock");
	echo "<script>alert('安装成功');</script>";
	echo "<meta http-equiv=refresh content='0;url=index.php'>";
?>
