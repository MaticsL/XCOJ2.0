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
  <div class="alert alert-warning alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <strong>特别提示：</strong>本校学生若需要参加网络比赛，请使用学号作为用户名进行注册，若学号被占用或忘记密码，可联系管理员进行处理。 </div>
  <center>
    <div class="panel panel-primary" style="width:600px">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo $MSG_REG_INFO?></h3>
      </div>
      <div class="panel-body" align="left">
        <form  class="form-horizontal" role="form" action="register.php" method="post">
          <div class="form-group has-warning">
            <label class="col-md-3 control-label"><?php echo $MSG_USER_ID?></label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="user_id" size=20 type=text>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"> <?php echo $MSG_NICK?></label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="nick" size=40 type=text>
            </div>
          </div>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label"> <?php echo $MSG_PASSWORD?></label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="password" size=20 type=password>
            </div>
          </div>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label"> <?php echo $MSG_REPEAT_PASSWORD?></label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="rptpassword" size=20 type=password>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"> <?php echo $MSG_SCHOOL?></label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="school" size=30 type=text>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"> <?php echo $MSG_EMAIL?></label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="email" size=30 type=text>
            </div>
          </div>
          <?php if($OJ_VCODE){?>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label"> <?php echo $MSG_VCODE?></label>
            <div class="col-md-4">
              <input class="form-control input-sm" name="vcode" size=4 type=text>
            </div>
            <div class="col-md-4"><img alt="click to change" src="vcode.php" onClick="this.src='vcode.php#'+Math.random()"></div>
          </div>
          <?php }?>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <input class="btn btn-success" value="<?php echo $MSG_SUBMIT?>" name="submit" type="submit">
              <input class="btn btn-warning" value="Reset" name="reset" type="reset">
            </div>
          </div>
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
