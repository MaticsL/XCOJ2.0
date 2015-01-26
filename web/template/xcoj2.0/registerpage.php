
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
   	<!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->	
</head>
<body>
<div id="wrapper">
	<?php require_once("oj-header.php");?>
<div id=main>
	<div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <strong>特别提示：</strong>本校学生若需要参加网络比赛，请使用学号作为用户名进行注册，若学号被占用或忘记密码，可联系管理员进行处理。
        </div>
	<form action="register.php" method="post">
	<center><div class="panel panel-primary" style="width:500px">
		<div class="panel-heading"><h3 class="panel-title"><?php echo $MSG_REG_INFO?></h3></div>
		<div class="panel-body">
		<table>
		<tr><td width=100px><?php echo $MSG_USER_ID?>:</td>
			<td width=300px><input class="form-control input-sm" name="user_id" size=20 type=text><br></td>
		</tr>
		<tr><td><?php echo $MSG_NICK?>:</td>
			<td><input class="form-control input-sm" name="nick" size=40 type=text><br></td>
		</tr>
		<tr><td><?php echo $MSG_PASSWORD?>:</td>
			<td><input class="form-control input-sm" name="password" size=20 type=password><br></td>
		</tr>
		<tr><td><?php echo $MSG_REPEAT_PASSWORD?>:</td>
			<td><input class="form-control input-sm" name="rptpassword" size=20 type=password><br></td>
		</tr>
		<tr><td><?php echo $MSG_SCHOOL?>:</td>
			<td><input class="form-control input-sm" name="school" size=30 type=text><br></td>
		</tr>
		<tr><td><?php echo $MSG_EMAIL?>:</td>
			<td><input class="form-control input-sm" name="email" size=30 type=text><br></td>
		</tr>
		<?php if($OJ_VCODE){?>
		<tr><td><?php echo $MSG_VCODE?>:</td>
			<td><input class="form-control input-sm" name="vcode" size=4 type=text><img alt="click to change" src="vcode.php" onclick="this.src='vcode.php#'+Math.random()">*</td>
		</tr>
		<?php }?>
		<tr><td></td>
			<td><br><input class="btn btn-success" value="Submit" name="submit" type="submit">
				&nbsp; &nbsp;
				<input class="btn btn-warning" value="Reset" name="reset" type="reset"></td>
		</tr>
	</table></div></div></center>
	<br><br>
</form>

<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>
