<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

<div id=main><div class="container">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>
  <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/title1.jpg" alt="First slide">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="image/title2.jpg" alt="Second slide">
        <div class="carousel-caption">
        </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<br>
	<div class="row">
		<div class="col-md-9">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#news" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-flag"></span> <?php echo $MSG_NEWS ?></a></li>
                      <li role="presentation"><a href="#info" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-phone-alt"></span> <?php echo $MSG_ABOUT_US?></a></li>
                      <li role="presentation"><a href="#team" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-tower"></span> <?php echo $MSG_TEAM_HONORS?></a></li>
                      <li role="presentation"><a href="#download" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-cloud-download"></span> <?php echo $MSG_DOWNLOAD?></a></li>
                      <li role="presentation"><a href="#api" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-magnet"></span> <?php echo "API"?></a></li>
                    </ul>

                    <br>
		    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="news"><?php require_once("table.php");?></div> 
                      <div role="tabpanel" class="tab-pane fade" id="info"><?php require("./admin/aboutus.txt")?></div>
                      <div role="tabpanel" class="tab-pane fade" id="team"><?php require("./admin/teamhonors.txt")?></div>
		      <div role="tabpanel" class="tab-pane fade" id="download"><?php require("./admin/download.txt")?></div>
		      <div role="tabpanel" class="tab-pane fade" id="api"><?php require("./admin/api.txt")?></div>
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
<div id=foot>
	<?php require_once("oj-footer.php");?></div>

</div> <!--end main-->
</body>
</html>
