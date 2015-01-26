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
	<center>
	<div class="panel panel-primary" style="width:300px">
	<div class="panel-heading"><h3 class="panel-title"><?php echo $MSG_LOGIN ?></h3></div>
	<div class="panel-body">
	<form action=login.php method=post>
        <table width=200 algin=center>
        <tr><td width=200><input class=form-control name="user_id" placeholder="<?php echo $MSG_USER_ID?>" type="text" size=20><br></td></tr>
        <tr><td><input class=form-control name="password" type="password" placeholder="<?php echo $MSG_PASSWORD?>" size=20><br></td></tr>
        <?php if($OJ_VCODE){?>
                <tr>
                	<td><div class="row"><div class="col-md-6"><input class="form-control input-sm" name="vcode" size=4 type=text></div><div class="col-md-6"><img alt="click to change" src=vcode.php onclick="this.src='vcode.php?<?php echo rand();?>#'+Math.random()"></div></div></td>
                </tr>
                <?php }?>
        <tr><td colspan=3><center><br>
            <input class="btn btn-primary" name="submit" type="submit" size=10 value="Submit">
            <a class="btn btn-warning" href="lostpassword.php">Lost Password</a></center></td>
	</tr>
        </table>
	</form>
	</div>
	</div>
	</center>

<div id=foot>
        <?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>

