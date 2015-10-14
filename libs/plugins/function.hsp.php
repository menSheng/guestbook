<?php

function smarty_function_hsp($args, &$smarty){
	   $str="";
	   for($i=0;$i<$args['times'];$i++){
		   $str.="<font color='".$args['color']."' size='".$args['size']."'>".$args['con']."</font>"."<br>";
	   }
	   return $str;
}
	
	
?>