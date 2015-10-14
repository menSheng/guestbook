<?php /* Smarty version 2.6.26, created on 2015-10-14 17:22:24
         compiled from liuyanList.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<a href="./DealNotebookController.php?flag=addnotebook">发布信息</a>  <a href="./LoginController.php?deal=destory">退出系统</a>
<h1>留言查询页面</h1>
<table border=1 bordercolor='#00FFFF' cellspacing=0>
 <tr><th>id</th><th>姓名</th><th>标题</th><th>内容</th><th>时间</th><th></th><th></th></tr>
 <?php $_from = $this->_tpl_vars['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
 <tr><td><?php echo $this->_tpl_vars['temp']['id']; ?>
</td><td><?php echo $this->_tpl_vars['temp']['name']; ?>
</td><td><?php echo $this->_tpl_vars['temp']['title']; ?>
</td><td><?php echo $this->_tpl_vars['temp']['content']; ?>
</td><td><?php echo $this->_tpl_vars['temp']['time']; ?>
</td><td><a href='./DealNotebookController.php?flag=delete&id=<?php echo $this->_tpl_vars['temp']['id']; ?>
' onclick='return Del()'>删除</a></td><td><a href='./DealNotebookController.php?flag=update&id=<?php echo $this->_tpl_vars['temp']['id']; ?>
'>修改</a></td></tr>
 <?php endforeach; endif; unset($_from); ?>
</table>
<?php echo $this->_tpl_vars['navigate']; ?>

<script language="javascript" type="text/javascript">
<!--
function Del()
{
  return window.confirm('确定删除?');
}
//-->
</script>
</body>
</html>