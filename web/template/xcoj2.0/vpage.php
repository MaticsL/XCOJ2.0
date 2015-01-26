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
		<h2><?php echo "HDU Problem ".$vpid." :  ".$title?></h2>
		<nav>
  		<ul class="pager">
    		<?php if($vpid>1000)echo "<li><a href='vpage.php?vpid=$vpre'>Previous</a></li>"?>
    		<?php if($vpid<5100)echo "<li><a href='vpage.php?vpid=$vnext'>Next</a></li>"?>
	        </ul>
		</nav>
	</center>
	
	<?php
	echo "<h2>$MSG_Description</h2><div class=content>".$descriptionHTML."</div>";
	echo "<h2>$MSG_Input</h2><div class=content>".$inputHTML."</div>";
	echo "<h2>$MSG_Output</h2><div class=content>".$outputHTML."</div>";
        echo "<h2>$MSG_Sample_Input</h2>
			<pre class=content><span class=sampledata>".$sample_input."</span></pre>";
	echo "<h2>$MSG_Sample_Output</h2>
			<pre class=content><span class=sampledata>".$sample_output."</span></pre>";
	?>

<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</body>
</html>

