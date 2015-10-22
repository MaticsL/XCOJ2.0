<?php 
session_start();
if (!isset($_SESSION['user_id'])){
	echo "<script>window.location.href='loginpage.php'</script>";
	exit(0);
}
require_once("include/db_info.inc.php");
require_once("include/const.inc.php");
$user_id=$_SESSION['user_id'];
$sql="SELECT `runid` from `virtualsolution` where `user`='$user_id' and `status`='Pending'";
$res=mysql_query($sql);
if (mysql_num_rows($res)>=1){
		$view_errors= "Too Quick!<br>";
		require("template/".$OJ_TEMPLATE."/error.php");
		exit(0);
}
$id=intval($_POST['id']);
if($id<1000||$id>44586){
		$view_errors= "NO SUCH PROBLEM!<br>";
		require("template/".$OJ_TEMPLATE."/error.php");
		exit(0);
}
$source=$_POST['source'];
if(get_magic_quotes_gpc()){
	$source=stripslashes($source);
}
$language=intval($_POST['lang']);
if($language<1||$languagr>3)$language=1;
$len=strlen($source);
if ($len<2){
	$view_errors="Code too short!<br>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
}
if ($len>32768){
	$view_errors="Code too long!<br>";
	require("template/".$OJ_TEMPLATE."/error.php");
	exit(0);
}
$source=mysql_real_escape_string($source);
$sql="INSERT INTO virtualsolution(pid,lang,source,user,status) VALUES('$id','$language','$source','$user_id','Pending')";
mysql_query($sql);
$insert_id=mysql_insert_id();
require("template/".$OJ_TEMPLATE."/vsubmit.php");
?>