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
<?php require_once("oj-header.php");?>
<div id=main>
  <center>
    <div class="panel panel-primary" style="width:550px">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $MSG_LOGIN ?></h3>
      </div>
      <div class="panel-body" align="left">
       <div class="alert alert-warning alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <strong>提示：</strong>报名校赛需要登陆，没有账号的用户可以在右上角注册。 </div>
        <form class="form-horizontal" role="form" action="login.php" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $MSG_USER_ID?></label>
            <div class="col-md-9">
              <input class="form-control" name="user_id" placeholder="<?php echo $MSG_USER_ID?>" type="text" size=20>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $MSG_PASSWORD?></label>
            <div class="col-md-9">
              <input class=form-control name="password" type="password" placeholder="<?php echo $MSG_PASSWORD?>" size=20>
            </div>
          </div>
          <?php if($OJ_VCODE){?>
          <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $MSG_VCODE?></label>
            <div class="col-md-4">
              <input class="form-control input-sm" name="vcode" size=4 type=text>
            </div>
            <div class="col-md-4"><img alt="click to change" src=vcode.php onClick="this.src='vcode.php?<?php echo rand();?>#'+Math.random()"></div>
          </div>
          <?php }?>
          <div class="form-group">
          <div class="col-md-offset-3 col-md-9">
          <input class="btn btn-primary" name="submit" type="submit" size=10 value="Submit">
          <a class="btn btn-warning" href="lostpassword.php">Lost Password</a>
        </form>
      </div>
    </div>
  </center>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
  <!--end foot--> 
  
</div>
<!--end main-->
</body>
</html>
