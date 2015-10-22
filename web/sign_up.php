<?php
	$view_title= $MSG_USERINFO;
	require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');
	if(isset($_SESSION['user_id'])){
		$user_id=$_SESSION['user_id'];
		$sql="SELECT * FROM `sign_up_info` WHERE `user`='".$user_id."'";
    	$result=mysql_query($sql);
		$result_num=mysql_num_rows($result);
		$result=mysql_fetch_object($result);
	}
	else{
		require("./loginpage.php");
		exit(0);
	}
	require("template/".$OJ_TEMPLATE."/sign_up.php");		
?>

