<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>XCOJ Vjudge</title>
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

<script>

</script>
<div class="container">
	<div class="row">
	<div class="col-md-3">
        <nav>
          <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </nav>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="checkbox" autocomplete="off" checked> Checkbox 1 (pre-checked)
          </label>
          <label class="btn btn-primary">
            <input type="checkbox" autocomplete="off"> Checkbox 2
          </label>
          <label class="btn btn-primary">
            <input type="checkbox" autocomplete="off"> Checkbox 3
          </label>
        </div>
    </div>	
	</div>
    <table>
    
    </table>
</div>

<div id=foot>
	<?php require_once("oj-footer.php");?>
</div><!--end foot-->
</div><!--end main-->
</body>
</html>
