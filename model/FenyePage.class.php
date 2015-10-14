<?php
    #这是一个用于保存分页信息的类
    class FenyePage
    {
    	public $pageSize= 6;  
	    public $res_array;   // 这里显示数据
    	public $rowCount;   // 这是从数据库中获取
	    public $pageNow= 1;// 用户指定
	    public $pageCount;  // 这是计算得到的
	    public $navigate;  // 分页导航
	    public $gotoUrl;  // 表示把分页请求提交给那个页面
    }
?>
