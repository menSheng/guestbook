<?php
    session_start();
    header("Content-Type:text/html;charset=utf-8");
    include_once 'SqlHelper.class.php';

    class AdminService
    {
	    public function loginDeal($username,$password)
        {
		    $sql= "select username, passwd from admin where username='$username'";
		    $sqlHelper= new SqlHelper();
		    $res= $sqlHelper->execute_dql($sql);
		    if($res)
            {
			    if($row=mysql_fetch_assoc($res))
                {
				    if($row['passwd']==$password)
                    {
					    $_SESSION['login']="ok";
					    return 1;
					    exit();
				    }
			    }
		    }

		    $sqlHelper->free_result($res);
    		$sqlHelper->close_connect();
	    	return 0;
		    exit();
    	}
	
        #登录验证
	    public function loginCheck()
        {
		    if($_SESSION['login']!="ok")
            {
                echo "<script>alert('你还未登录');</script>";
			    echo "<meta http-equiv=refresh content='0;url=../index.php'>";
		    	exit();
		    }
	    }
	
        #退出登录
	    public function destory()
        {
		    unset($_SESSION['login']);
            echo "<meta http-equiv=refresh content='0;url=../index.php'>";
	    }
    }
?>
