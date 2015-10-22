<?php
  require_once('./include/db_info.inc.php');
if(isset($_GET['rid'])) {
	$rid=intval($_GET['rid']);
	if($rid<1000)$rid=1000;
	$sql="select `status` from virtualsolution where `runid`='$rid'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	echo $row["status"];
}
?>