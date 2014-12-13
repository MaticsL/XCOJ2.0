<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
<!--	<script language="javascript" type="text/javascript" src="include/jquery-latest.js"></script>
    <script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
-->
</head>

<body>

	<?php require_once("oj-header.php");?>
<div id=main>

<!--	<center>
	<div id=submission style="width:600px;height:300px" ></div>
	</center>-->
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">
						News !
					</h2>
				</div>
				<div class="panel-body">
					<?php require_once("table.php");?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="list-group">
				<a href="./" class="list-group-item disabled">
					Links	
				</a>
				<a href="http://acm.hdu.edu.cn" class="list-group-item">
					HDOJ	
				</a>
				<a href="http://bestcoder.hdu.edu.cn" class="list-group-item">
					Bestcoder	
				</a>
				<a href="http://acm.hfut.edu.cn" class="list-group-item">
					HFUTOJ	
				</a>
				<a href="./" class="list-group-item disabled">
					Blogs	
				</a>
				<a href="http://www.cnblogs.com/neopenx" class="list-group-item">
					Physcal	
				</a>
				<a href="http://www.cnblogs.com/e0e1e/" class="list-group-item">
					e0e1e	
				</a>
				<a href="http://www.cnblogs.com/pdev/" class="list-group-item">
					Pentium.Labs	
				</a>
			</div>
		</div>
	</div>
</div>


</div><!--end main-->

<div id=foot>
	<?php require_once("oj-footer.php");?></div>


</body>
</html>
