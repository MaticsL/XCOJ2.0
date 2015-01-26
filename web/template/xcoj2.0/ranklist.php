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
<div id=main>
	<div class="row">
		<div class="col-md-3">
			<form action=userinfo.php>
				<div class="input-group">
					<input class="form-control" placeholder="<?php echo $MSG_USER?>" name=user>
					<span class="input-group-btn">
					<input class="btn btn-primary" type=submit value=Go>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-6"></div>
		<div class="col-md-3">
			<div class="btn-group">
			<a class="btn btn-info<?php if($url=="ranklist.php?scope=d")echo " active"?>" href=ranklist.php?scope=d>Day</a>
			<a class="btn btn-info<?php if($url=="ranklist.php?scope=w")echo " active"?>" href=ranklist.php?scope=w>Week</a>
			<a class="btn btn-info<?php if($url=="ranklist.php?scope=m")echo " active"?>" href=ranklist.php?scope=m>Month</a>
			<a class="btn btn-info<?php if($url=="ranklist.php?scope=y")echo " active"?>" href=ranklist.php?scope=y>Year</a>
			</div>
		</div>
	</div>
	
	<table align=center width=100% class="table table-condensed table-hover table-striped">
		<thead>
		<tr class='toprow'>
				<td width=5% align=center><b><?php echo $MSG_Number?></b>
				<td width=10% align=center><b><?php echo $MSG_USER?></b>
				<td width=55% align=center><b><?php echo $MSG_NICK?></b>
				<td width=10% align=center><b><?php echo $MSG_AC?></b>
				<td width=10% align=center><b><?php echo $MSG_SUBMIT?></b>
				<td width=10% align=center><b><?php echo $MSG_RATIO?></b>
		</tr>
		</thead>
		<tbody>
			<?php 
			$cnt=0;
			foreach($view_rank as $row){
				echo "<tr>";
				foreach($row as $table_cell){
					echo "<td>";
					echo "\t".$table_cell;
					echo "</td>";
				}
				
				echo "</tr>";
				
				$cnt=1-$cnt;
			}
			?>
			</tbody>		
	</table>
	<?php 
	   echo "<br><center><div class='btn-group'>";
		for($i = 0; $i <$view_total ; $i += $page_size) {
			echo "<a class='btn btn-default' href='./ranklist.php?start=" . strval ( $i ).($scope?"&scope=$scope":"") . "'>";
			echo strval ( $i + 1 );
			echo "-";
			echo strval ( $i + $page_size );
			echo "</a>";
			if ($i % 250 == 200)
				echo "</div><div class='btn-group'>";
		}
		echo "</div></center>";
	
	?>
<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</body>
</html>
