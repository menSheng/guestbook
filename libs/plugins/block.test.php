<?php
function smarty_block_test($args, $con, &$smarty){
	   $str="";
	   for($i=0;$i<$args['times'];$i++){
		   $str.="<font color='".$args['color']."' size='".$args['size']."'>".$con."</font>"."<br>";
	   }
	   return $str;
   }
?>