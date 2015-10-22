<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='refresh' content='120'>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  <table class="table table-hover table-striped table-responsive">
    <thead>
      <tr class="toprow">
        <th><?php echo $MSG_RUNID?></th>
        <th width="50%"><?php echo $MSG_USER?></th>
        <th><?php echo $MSG_PROBLEM?></th>
        <th><?php echo $MSG_RESULT?></th>
      </tr>
    </thead>
    <tbody>
      <?php echo $tableHTML?>
    </tbody>
  </table>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
</div>
</body>
</html>
