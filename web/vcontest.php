<?php
////////////////////////////Common head
	$cache_time=10;
	$OJ_CACHE_SHARE=false;
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');


$sql="select `contest_id`,`master`,`title` ,`start_time`,`end_time` from `virtualcontest` order by `start_time` desc";
$result=mysql_query($sql);
$table=array();$i=0;
while($row=mysql_fetch_object($result)){
$table[$i]=$row;
$i++;
}
$view_title=$MSG_DIY_CONTEST;
$btn_arrange_flag=0;
if (isset($_SESSION['user_id']))$btn_arrange_flag=1;
/////////////////////////Template
require("template/".$OJ_TEMPLATE."/vcontest.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
