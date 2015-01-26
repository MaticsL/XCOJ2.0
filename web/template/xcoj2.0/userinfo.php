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
    <script type="text/javascript" src="include/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    var d1 = [];
    var d2 = [];
    <?php 
       foreach($chart_data_all as $k=>$d){
    ?>
        d1.unshift([<?php echo $k."*1000,".$d?>]);
	<?php }?>
    <?php 
       foreach($chart_data_ac as $k=>$d){
    ?>
        d2.unshift([<?php echo $k."*1000,".$d?>]);
	<?php }?>
    $('#submission').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: null
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                month: '%e. %b',
                year: '%b'
            }
        },
	yAxis: {
	    title: {text: null}
	},
        tooltip: {
            shared: true,
            valueSuffix: ' in all'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: '<?php echo $MSG_SUBMIT?>',
            data: d1,
        }, {
            name: '<?php echo $MSG_AC?>',
            data: d2,
        }]
    });
});				
</script>
<div id=main>

<center>
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
<?php echo $user." : ".htmlspecialchars($nick)?>
<?php
	echo "<a href=mail.php?to_user=$user> <span class='glyphicon glyphicon-envelope'></span></a>";
?>
</h3>
</div>
<table class="table table-striped" id=statics width=70%>
<tr><td width=15%><?php echo $MSG_Number?><td width=25% align=center><?php echo $Rank?><td width=70% align=center>Solved Problems List</tr>
<tr><td><?php echo $MSG_SOVLED?><td align=center><a href='status.php?user_id=<?php echo $user?>&jresult=4'><?php echo $AC?></a>
<td rowspan=14 align=center>
<script language='javascript'>
function p(id){document.write("<a href=problem.php?id="+id+"><span class='label label-success'>"+id+"</span></a> ");}
<?php $sql="SELECT DISTINCT `problem_id` FROM `solution` WHERE `user_id`='$user_mysql' AND `result`=4 ORDER BY `problem_id` ASC";	
if (!($result=mysql_query($sql))) echo mysql_error();
while ($row=mysql_fetch_array($result))
	echo "p($row[0]);";
mysql_free_result($result);
?>
</script>
<div id='submission' style="width:600px;height:300px" ></div>
  </td>
</tr>
<tr><td><?php echo $MSG_SUBMIT?><td align=center><a href='status.php?user_id=<?php echo $user?>'><?php echo $Submit?></a></tr>
<?php 
	foreach($view_userstat as $row){
		
		//i++;
		echo "<tr><td>".$jresult[$row[0]]."<td align=center><a href=status.php?user_id=$user&jresult=".$row[0].">".$row[1]."</a></tr>";
	}
//}
echo "<tr id='end'><td id='pie' colspan=2></td></tr>";

?>
<script language="javascript">
	var z=[];
	var dt=document.getElementById("statics");
	var data=dt.rows;
	var n1,n2;
	for(var i=1;dt.rows[i].id!="end";i++){
			if(i==2) i+=2;
			n1=dt.rows[i].cells[0];
			n1=n1.innerText || n1.textContent;
			n2=dt.rows[i].cells[1].firstChild;
			n2=n2.innerText || n2.textContent;
			n2=parseInt(n2);
			z.push([n1,n2]);
	}
	$(function () {
		Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
    	return {
        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
    };
});
    	$('#pie').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: true
        },
        title: {
            text: '<?php echo $MSG_STATISTICS?>'
        },
        tooltip: {
    	    pointFormat: '{point.percentage:.1f}%'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                }
              } 
        },
        series: [{
            type: 'pie',
            name: 'none',
            data: z,
        }]
    	});
	});
</script> 

<tr><td>School:<td align=center><?php echo $school?></tr>
<tr><td>Email:<td align=center><?php echo $email?></tr>
</table>
<?php
 if(isset($_SESSION['administrator'])){

	 ?><table border=1><tr class=toprow><td>UserID<td>Password<td>IP<td>Time</tr>
	 <tbody>
			<?php 
			$cnt=0;
			foreach($view_userinfo as $row){
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

 }

?>
</div>
</center>
<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>
