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

<script type="text/javascript" src="include/highcharts.js"></script>
<script type="text/javascript" src="include/highcharts-3d.js"></script>
<script type="text/javascript" src="include/jquery.tablesorter.js"></script> 
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#problemstatus").tablesorter(); 
    } 
); 
</script>
<div id=main>
<center>
	<div class="panel panel-info"><div class="panel-heading">
	<h1 class="panel-title">Problem <?php echo $id ?> Status</h1></div>
	<div class="panel-body">
	<div id="pie" class="well"></div>
	<div class="row">
	<div class="col-md-4">
	<div class="table-responsive">
	<table  id=statics class="table table-condensed table-striped">
			<thead><tr class=toprow><td colspan=2><?php echo "Problem ".$id." Statistics"?></td></tr></thead>
			<?php 
			$cnt=0;
			foreach($view_problem as $row){
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
			<tr id="end" colspan=2></tr>
	</table>
	</div>
	</div>
	<div class="col-md-8">
	<div class="table-responsive">
	<table id=problemstatus class="table table-striped table-condensed"><thead>
		<tr class=toprow><th style="cursor:hand" onclick="sortTable('problemstatus', 0, 'int');"><?php echo $MSG_Number?>
			<th><?php echo $MSG_RUNID?>
			<th><?php echo $MSG_USER?>
			<th ><?php echo $MSG_MEMORY?>
			<th  ><?php echo $MSG_TIME?>
			<th><?php echo $MSG_LANG?>
			<th ><?php echo $MSG_CODE_LENGTH?>
			<th><?php echo $MSG_SUBMIT_TIME?></tr></thead><tbody>
			<?php 
			$cnt=0;
			foreach($view_solution as $row){
				if ($cnt) 
					echo "<tr>";
				else
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
	</table></div>
	<?php
	echo "<div class='btn-group'><button class='btn btn-warning' onclick='history.go(-1);'>Back</button><a class='btn btn-info' href='status.php?problem_id=$id'>Status</a>";
	echo "<a class='btn btn-default' href='problemstatus.php?id=$id'>TOP</a>";
	if ($page>$pagemin){
		$page--;
		echo "<a class='btn btn-default' href='problemstatus.php?id=$id&page=$page'>PREV</a>";
		$page++;
	}
	if ($page<$pagemax){
		$page++;
		echo "<a class='btn btn-default' href='problemstatus.php?id=$id&page=$page'>NEXT</a>";
		$page--;
	}
	echo "</div>";
	?>
	</div></div>
	<script language="javascript">
	var z = [];
	var dt=document.getElementById("statics");
	var data=dt.rows;
	var n;
	for(var i=4;dt.rows[i].id!="end";i++){
			n=dt.rows[i].cells[1];
			n=n.innerText || n.textContent;
			n=parseInt(n);
			z.push([dt.rows[i].cells[0].innerHTML,n]);
	}

	$(function () {
    	$('#pie').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            },
	    backgroundColor: 'rgba(0,0,0,0)'
        },
        title: {
            text: '<?php echo $MSG_STATISTICS?>'
        },
        tooltip: {
            pointFormat: '{point.percentage:.1f}%'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            type: 'pie',
            name: 'none',
            data: z,
        }]
    	});
	});		
	</script>
	</div></div></center>
<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>
