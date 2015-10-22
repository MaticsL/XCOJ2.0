<?php

	require_once("./include/db_info.inc.php");
	require_once('./include/setlang.php');
	if(!isset($_SESSION['user_id'])){
		echo "Please login!";
		exit(0);	
	}
	$student_num=strval($_POST['num']);
	if($student_num>2015000000||$student_num<2012000000){
		echo "学号错误!";
		exit(0);	
	}
	$student_name=$_POST['name'];
	if($student_name==''){
		echo "请填写姓名!";
		exit(0);	
	}
	$student_faculty=$_POST['faculty'];
	$student_class=$_POST['class'];
	$student_phone=$_POST['phone'];
	if(strlen($student_phone)!=11){
		echo "手机号码错误!";
		exit(0);	
	}
	$student_QQ=$_POST['qq'];
	$student_name=mysql_real_escape_string (htmlspecialchars($student_name));
	$student_faculty=mysql_real_escape_string (htmlspecialchars($student_faculty));
	$student_class=mysql_real_escape_string (htmlspecialchars($student_class));
	$student_QQ=mysql_real_escape_string (htmlspecialchars($student_QQ));
	$student_phone=mysql_real_escape_string (htmlspecialchars($student_phone));
    $sql="SELECT `num` FROM `sign_up_info` WHERE `num`='".$student_num."'";
    $result=mysql_num_rows(mysql_query($sql));
	if($result!=0){
		echo "该学号已经注册!";
		exit(0);		
	}
	$sql="INSERT INTO sign_up_info (user, num, name, faculty, class, phone, qq) 
	VALUES ('".$_SESSION['user_id']."', '".$student_num."', '".$student_name."', '".$student_faculty."', '".$student_class."' ,'".$student_phone."', '".$student_QQ."' )";
	mysql_query($sql);
	echo "\n报名成功!";
	echo "<script>history.go(-1);</script>";
?>

