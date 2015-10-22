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
  <?php
  if($result_num==0){
  ?>
  <center>
    <div class="panel panel-primary" style="width:800px">
      <div class="panel-heading">
        <h3 class="panel-title">报名信息</h3>
      </div>
      <div class="panel-body" align="left">
        <form  class="form-horizontal" role="form" action="sign_up_check.php" method="post">
          <div class="form-group has-warning">
            <label class="col-md-3 control-label">学号：</label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="num" size=10 type=number value="<?php if( is_numeric($user_id))echo $user_id; ?>">
            </div>
          </div>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label">姓名：</label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="name" size=5 type=text>
            </div>
          </div>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label">系别：</label>
            <div class="col-md-9">
              <select class="form-control" id="faculty" name="faculty">
                <option value="信息工程系">信息工程系</option>
                <option value="机械工程系">机械工程系</option>
                <option value="化工与食品加工系">化工与食品加工系</option>
                <option value="建筑工程系">建筑工程系</option>
                <option value="商学系">商学系</option>
              </select>
            </div>
          </div>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label">班级（专业+班号）：</label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="class" size=20 type=text placeholder="例如:电子信息类1班">
            </div>
          </div>
          <div class="form-group has-warning">
            <label class="col-md-3 control-label">手机：</label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="phone" size=11 type=number>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">QQ：</label>
            <div class="col-md-9">
              <input class="form-control input-sm" name="qq" size=10 type=number>
            </div>
          </div>
          <div class="form-group has-warning">
            <div class="col-md-offset-3 col-md-9">
              <input class="btn btn-success" value="<?php echo $MSG_SUBMIT?>" name="submit" type="submit">
              <input class="btn btn-warning" value="Reset" name="reset" type="reset">
            </div>
          </div>
        </form>
      </div>
    </div>
  </center>
  <?php }else{ ?>
  <center>
    <div class="panel panel-primary" style="width:800px">
      <div class="panel-heading">
        <h3 class="panel-title">报名信息</h3>
      </div>
      <div class="panel-body" align="left">
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>注意：</strong>您已经成功报名，报名信息如下，如需修改报名信息或者取消报名请<a href='sign_up_delete.php'>点此</a>以删除报名记录。
          您可以在<a href="problemset.php">题库</a>中进行训练，熟悉比赛环境，建议阅读一下<a href="faqs.php">常见问题<a>。
          </div>
        <table class='table'>
          <tr>
            <td><?php echo $result->name; ?></td>
            <td><?php echo $result->num; ?></td>
            <td><?php echo $result->faculty; ?></td>
            <td><?php echo $result->class; ?></td>
            <td><?php echo $result->phone; ?></td>
            <td><?php echo $result->qq; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </center>
  <?php } ?>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
  <!--end foot--> 
</div>
<!--end main-->
</div>
<!--end wrapper-->
</body>
</html>
