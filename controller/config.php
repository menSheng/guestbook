<?php
    //对smarty模板进行初始化工作    
    include_once '../libs/Smarty.class.php';
    $smarty= new Smarty();
    $smarty->template_dir= "../templates/"; 
    $smarty->compile_dir= "../templates_c/";
    $smarty->left_delimiter= "<{";
    $smarty->right_delimiter= "}>";
?>
     
