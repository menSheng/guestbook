<?php
    include_once '../model/AdminService.class.php';
	include_once("../model/FenyePage.class.php");
	include_once("../model/NotebookService.class.php");
    include_once 'config.php';
    $adminService= new AdminService();
    $adminService->loginCheck();
	$fenyePage= new FenyePage();
	$fenyePage->pageSize= 10;
	$fenyePage->gotoUrl= "NotebookUIController.php";
	if(!empty($_GET['pageNow']))
    {
	    $fenyePage->pageNow= $_GET['pageNow'];
	}
	$notebookService= new NotebookService();
	$notebookService->getFenyePage($fenyePage);

	$smarty->assign("res",$fenyePage->res_array);
	$smarty->assign("navigate",$fenyePage->navigate);
	$smarty->display("LiuyanList.html");
?>
