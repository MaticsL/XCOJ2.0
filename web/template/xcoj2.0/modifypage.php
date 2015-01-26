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
	<form action="modify.php" method="post">
	<center>
	<div class="panel panel-primary" style="width:500px">
		<div class="panel-heading">
		<h3 class="panel-title">Update Information</h3>
		</div>
		<div class="panel-body">
		<table width=400>
		<tr><td width=200>User ID:
			<td width=200><?php echo $_SESSION['user_id']?>
			<?php require_once('./include/set_post_key.php');?>
		</tr>
		<tr><td>Nick Name:
			<td><input class="form-control" name="nick" size=40 type=text value="<?php echo htmlspecialchars($row->nick)?>" >
		</tr>
		<tr><td>Old Password:
			<td><input class="form-control" name="opassword" size=20 type=password>
		</tr>
		<tr><td>New Password:
			<td><input class="form-control" name="npassword" size=20 type=password>
		</tr>
		<tr><td>Repeat New Password:
			<td><input class="form-control" name="rptpassword" size=20 type=password>
		</tr>
		<tr><td>School:
			<td><input class="form-control" name="school" size=30 type=text value="<?php echo htmlspecialchars($row->school)?>" >
		</tr>
		<tr><td>Email:
			<td><input class="form-control" name="email" size=30 type=email value="<?php echo htmlspecialchars($row->email)?>" >
		</tr>
		<tr><td>
			<td><input class="btn btn-primary" value="Submit" name="submit" type="submit">
				&nbsp; &nbsp;
				<input class="btn btn-danger" value="Reset" name="reset" type="reset">
		</tr>
	</table></div></div></center>
	<br>
	<a href=export_ac_code.php>Download All AC Source</a>
	<br>
<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>
