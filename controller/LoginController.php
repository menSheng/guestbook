<?php
    header("Content-Type:text/html;charset=utf-8");
    include_once 'config.php';
    include_once '../model/AdminService.class.php';
    include_once '../model/FenyePage.class.php';
    include_once '../model/NotebookService.class.php';

    $adminService= new AdminService();
    $deal= isset($_GET['deal'])? $_GET['deal']: '';
    if($deal == "destory")
    {
        $adminService->destory();
        exit();
    }
   
    $username= $_POST['username'];
    $password= md5($_POST['password']);
   
	if($adminService->loginDeal($username,$password))
    {
		// 创建分页对象
		$fenyePage= new FenyePage();
		$fenyePage->pageSize= 10;
		$fenyePage->gotoUrl= "NotebookUIController.php";
		$notebookService= new NotebookService();
		$notebookService->getFenyePage($fenyePage);
		
		$smarty->assign("res", $fenyePage->res_array);
		$smarty->assign("navigate", $fenyePage->navigate);
		$smarty->display("liuyanList.html");
	}else
    {
		echo "<script>alert('用户名或密码错误');history.back();</script>";
	}
?>
