<?php
class SqlHelper{
	public $dbname= "guestbook";
	public $username= "root";
	public $password= "";
	public $host= "localhost";
	public $conn;
	
	public function __construct()
    {
		$this->conn= mysql_connect($this->host, $this->username, $this->password);
		if(!$this->conn)
        {
			die("连接失败".mysql_error());
		}
		mysql_select_db($this->dbname, $this->conn);
		mysql_query("set names utf8", $this->conn);
	}

    #执行dql语句
	public function execute_dql($sql)
    {	
		$res=mysql_query($sql, $this->conn);
		return $res;
	}
	
    #以数组形式返回
	public function execute_dql2($sql)
    {
		$res= mysql_query($sql, $this->conn);
		$arr= array();
		while($row=mysql_fetch_assoc($res)) $arr[]= $row;
        #释放资源
		mysql_free_result($res);
		return $arr;
	}
	
	/*
     *考虑分页情况的查询  这是一个通用的 并体现oop编程思想的代码
	 *$sql1="select * from where 表名 limit 0,6";
	 *$sql2="select count(*) from 表名";
     */
	public function exectue_dql_fenye($sql1, $sql2, $fenyePage)
    {	
        #这里我们查询要分页显示的数据
		$res= mysql_query($sql1, $this->conn) or die(mysql_error());
		$arr= array();
		while($row= mysql_fetch_assoc($res)) $arr[]= $row;
		mysql_free_result($res);
		
		$res2= mysql_query($sql2, $this->conn) or die(mysql_error());
		if($row= mysql_fetch_row($res2))
        {
			$fenyePage->pageCount= ceil($row[0]/$fenyePage->pageSize);
			$fenyePage->rowCount= $row[0];
		}
		mysql_free_result($res2);

        #把导航信息也封装到fenyePage对象中
		$navigate= "";
		if($fenyePage->pageNow>1)
        {
			$prePage= $fenyePage->pageNow-1;
			$navigate.= "&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>上一页&nbsp;&nbsp;</a>";
		}
		if($fenyePage->pageNow<$fenyePage->pageCount)
        {
			$nextPage= $fenyePage->pageNow+1;
			$navigate.= "<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>下一页&nbsp;&nbsp;</a>";			
		}	

		$page_whole= 10;
		$start= floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
		$index= $start;
		$a= $index+$page_whole;

        #整体每10页向前翻
        #如果当前pageNow在1-10页数  就没有向前翻动的超链接]
		if($fenyePage->pageNow>$page_whole)
        {
		    $navigate.= "&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'><<&nbsp;&nbsp;</a>";
		}
		if($fenyePage->pageCount>$a)
        {
			for(;$start<$index+$page_whole;$start++)
            {
				$navigate.= "<a href='{$fenyePage->gotoUrl}?pageNow=$start'>[$start]</a>";
			}
		}else
        {
			for(;$start<=$fenyePage->pageCount;$start++)
            {
				$navigate.= "<a href='{$fenyePage->gotoUrl}?pageNow=$start'>[$start]</a>";
			}				
		}
			
        #整体每10页翻动
		if($start<$fenyePage->pageCount)
        {
			$navigate.= "&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=$start'>&nbsp;&nbsp;>></a>";
		}
		$navigate.= "当前页{$fenyePage->pageNow}/共{$fenyePage->pageCount}页";

        #把$arr赋给$fenyePage
		$fenyePage->res_array= $arr;
		$fenyePage->navigate= $navigate;
	}
	
    #执行dml语句
	public function execute_dml($sql)
    {
		$res= mysql_query($sql,$this->conn) or die(mysql_error());
		if(!$res)
        {
			return 0;
		}else
        {
			if(mysql_affected_rows($this->conn)>0)
            {
			   return 1;  // 表示执行ok
			}else
            {
				return 2; // 表示没有行受到影响
			}
		}
		mysql_free_result($res);
	}

    #释放资源
	public function free_result($res)
    {
		if(!empty($res))
        {
			mysql_free_result($res);
		}
	}

    #关闭连接
	public function close_connect()
    {
		if(!empty($this->conn))
        {
			mysql_close($this->conn);
		}
	}
}
?>
