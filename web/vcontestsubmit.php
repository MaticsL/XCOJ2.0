<?php
function exitwitherror($errstr){
	echo $errstr;
	exit(0);
}
session_start();
if(!isset($_SESSION['user_id']))exitwitherror("请登录\n");
$user=$_SESSION['user_id'];
require_once('./include/db_info.inc.php');
$sql="select `contest_id` from `virtualcontest` where `master`='$user'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)exitwitherror("一个用户只能同时创建一个自定义比赛\n");
$title=mysql_real_escape_string(htmlspecialchars($_POST['title']));
if(strlen($title)>250)exitwitherror("标题过长\n");
if(strlen($title)<2)exitwitherror("标题过短\n");
$description=mysql_real_escape_string(htmlspecialchars($_POST['description']));
if(strlen($title)>600)exitwitherror("描述过长\n");
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
if(strlen($starttime)!=16||strlen($endtime)!=16||$starttime>$endtime)exitwitherror("请检查比赛时间是否正确\n");
$password=mysql_real_escape_string($_POST['password']);
$str=$_POST['problemstr'];
if(strlen($str)>1000)exitwitherror("题目数量太多\n");
$problem=json_decode($str);
$starttime_trim=substr($starttime,0,10)." ".substr($starttime,11).":00";
$endtime_trim=substr($endtime,0,10)." ".substr($endtime,11).":00";
$sql="insert into `virtualcontest`(`master`,`title`,`start_time`,`end_time`,`description`,`password`) values('$user','$title','$starttime_trim','$endtime_trim','$description','$password')";
mysql_query($sql);
echo mysql_error();
$sql="select `contest_id` from `virtualcontest` where `master`='$user'";
$result=mysql_query($sql);
$result=mysql_fetch_object($result);
$cid=$result->contest_id;
foreach($problem as $id){
	if($id>=1000&&$id<=60000){
		$sql="insert into `vcontest_problem`(`problem_id`,`vcontest_id`) values('$id','$cid')";
		mysql_query($sql);
	}
}
echo mysql_error();
echo "success";
?>

