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
  <div class="progress">
    <div id="bar" class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 10%"> <span class="sr-only">45% Complete</span> </div>
  </div>
  <center>
    <h1 id="status">Pending</h1>
  </center>
  <script>
   $(window).load(function() {
           loadstatu();
   });
   function loadstatu()
	{   
		var xmlhttp;
        xmlhttp=$.ajax({url:"vstatus-ajax.php?rid=<?php echo $insert_id?>",async:false,contentType:"application/x-www-form-urlencoded; charset=utf-8"});
        document.getElementById("status").innerHTML=xmlhttp.responseText;
		if(xmlhttp.responseText=="Pending"||xmlhttp.responseText=="Judging")setTimeout("loadstatu()",2000);
		if(xmlhttp.responseText=="Judging"){$("#bar").removeClass("progress-bar-warning");$("#bar").addClass("progress-bar-success");$("#bar").width("30%");}
		else if(xmlhttp.responseText=="Accepted"){$("#bar").removeClass("active");$("#bar").width("100%");}
		else if(xmlhttp.responseText!="Pending"){$("#bar").removeClass("active");$("#bar").removeClass("progress-bar-success");$("#bar").addClass("progress-bar-danger");$("#bar").width("100%");}
	}
  </script>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
  <!--end foot--> 
</div>
<!--end main-->
</body>
</html>
