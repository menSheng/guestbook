<?php
   header("Content-Type:text/html;charset=utf-8");
   include_once 'SqlHelper.class.php';
   include_once 'Notebook.class.php';
   
class NotebookService
{
    #添加留言方法
	public function addNotebook($notebookfield,$notebookvalue)
    {
        $sql= "insert into `message` $notebookfield values $notebookvalue";
        $sqlHelper= new SqlHelper();
		$res= $sqlHelper->execute_dml($sql);	
		$sqlHelper->close_connect();
		if($res == 1)
        {
		    return 1;
		}else
        {
			return 0;
		}
	}
	
    #删除留言记录
	public function delNotebook($id)
    {
		$sql= "delete from `message`  where id='$id'";
		$sqlHelper= new SqlHelper();
		$res=$sqlHelper->execute_dml($sql);		
		$sqlHelper->close_connect();
		if($res == 1)
        {
			return 1;
		}else
        {
			return 0;
		}		
	}
	
    #查询某一条信息
	public function oneNotebook($id)
    {
		$sql= "select * from `message` where id='$id'";
		$sqlHelper= new SqlHelper();
		$array= $sqlHelper->execute_dql2($sql);
		$notebook= new Notebook();
		$notebook->setId($array[0]['id']);
		$notebook->setName($array[0]['name']);
		$notebook->setTitle($array[0]['title']);
		$notebook->setContent($array[0]['content']);
		$notebook->setTime($array[0]['time']);
		$sqlHelper->close_connect();
		return $notebook;
	}
	
    #修改留言信息
	public function updateNotebook($set,$id)
    {
		$sql= "update `message` set $set where id='$id'";
		$sqlHelper= new SqlHelper();
	    $res=$sqlHelper->execute_dml($sql);
		$sqlHelper->close_connect();
	    if($res == 1)
        {
			return 1;
		}else
        {
			return 0;
		}			
		
	}
	
    #封装的方式完成的分页
    public function getFenyePage($fenyePage)
    {
	    $sqlHelper= new SqlHelper();
		$sql1= "select * from message order by id DESC limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
		$sql2= "select count(id) from message";		    
		$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
		$sqlHelper->close_connect();
 	}
}
?> 
