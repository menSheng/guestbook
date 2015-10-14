<?php
    header("Content-Type:text/html;charset=utf-8");
    include_once("../model/NotebookService.class.php");
    include_once '../model/AdminService.class.php';
    include_once("config.php");
    $adminService= new AdminService();
    $adminService->loginCheck();
    $flag= $_GET['flag'];
    if($flag == "addnotebook")
    {
        date_default_timezone_set("Asia/Shanghai");
	    $smarty->assign("nowtime", date("Y-m-d H:i:s",time()));
	    $smarty->display("addLiuyan.html");
    }

    if($flag=="add")
    {
        $name= $_POST['name'];
	    $title= $_POST['title'];
	    $content= $_POST['content'];
        $time= $_POST['time'];
	    $notebookfield= "(id,name,title,content,time)";
    	$notebookvalue= "(NULL,'$name','$title','$content','$time')";
	    $notenookService= new NotebookService();
    	if($notenookService->addNotebook($notebookfield, $notebookvalue))
        {
    		header("Location: NotebookUIController.php");
    	}else
        {
		    echo "<script>alert('添加留言失败');history.back();</script>";
	    }
    }

    if($flag == "delete")
    {
	    $id= $_GET['id'];
    	$notenookService= new NotebookService();
	    if($notenookService->delNotebook($id))
        {
		    header("Location: ./NotebookUIController.php");
    	}else
        {
    	    echo "<script>alert('删除留言失败');history.back();</script>";
    	}
    }

    if($flag == "update")
    {
	    $id= $_GET['id'];
    	$notenookService= new NotebookService();
    	$arr= $notenookService->oneNotebook($id);
	    $smarty->assign("arr",$arr);
    	$smarty->display("updateLiuyan.html");
    }

    if($flag == "updatenotebook")
    {
        $id= $_GET['id'];
    	$name= $_POST['name'];
	    $title= $_POST['title'];
	    $content= $_POST['content'];
        $time= $_POST['time'];
	    $set= "name='$name',title='$title',content='$content',time='$time'";
	    $notenookService= new NotebookService();
	    if($notenookService->updateNotebook($set,$id))
        {
	        header("Location: ./NotebookUIController.php");
    	}else
        {
		    echo "<script>alert('修改留言失败');history.back();</script>";
    	}
    }
?>
