<?php

	require_once("./include/db_info.inc.php");
	if(isset($_SESSION['user_id'])){
	$sql="DELETE FROM sign_up_info WHERE user='".$_SESSION['user_id']."'";
	mysql_query($sql);
	echo "\n删除成功!";}
	echo "<script>history.go(-1);</script>";
?>

