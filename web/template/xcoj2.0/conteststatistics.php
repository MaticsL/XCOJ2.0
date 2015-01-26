<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='refresh' content='60'>
<title><?php echo $view_title?></title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   	<!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->
</head>
<body>
<div id="wrapper">
<?php require_once("contest-header.php");?>
<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#cs").tablesorter();
}
);
</script>
<script type="text/javascript">
$(function () {
var d1 = [];
var d2 = [];
<?php
       foreach($chart_data_all as $k=>$d){
    ?>
d1.push([<?php echo $k?>, <?php echo $d?>]);
<?php }?>
<?php
       foreach($chart_data_ac as $k=>$d){
    ?>
d2.push([<?php echo $k?>, <?php echo $d?>]);
<?php }?>
var d3 = [[0, 12], [7, 12], null, [7, 2.5], [12, 2.5]];
$.plot($("#submission"), [
{label:"<?php echo $MSG_SUBMIT?>",data:d1,lines: { show: true }},
{label:"<?php echo $MSG_AC?>",data:d2,bars:{show:true}} ],{
xaxis: {
mode: "time"
},
grid: {
backgroundColor: { colors: ["#ffe", "#ffe"] }
}
});
});
//alert((new Date()).getTime());
</script>

<div id=main>
<center><h3>Contest Statistics</h3>
<table id=cs width=90%>
<thead>
<tr align=center class=toprow><th><th>AC<th>PE<th>WA<th>TLE<th>MLE<th>OLE<th>RE<th>CE<th>Total<th><th>C<th>C++<th>Pascal<th>Java<th>Ruby<th>Bash<th>Python<th>PHP<th>Perl<th>C#<th>Obj-c<th>FreeBasic</tr>
</thead>
<tbody>
<?php
for ($i=0;$i<$pid_cnt;$i++){
if(!isset($PID[$i])) $PID[$i]="";

if ($i&1)
echo "<tr align=center class=oddrow><td>";
else
echo "<tr align=center class=evenrow><td>";
echo "<a href='problem.php?cid=$cid&pid=$i'>$PID[$i]</a>";
for ($j=0;$j<22;$j++) {
if(!isset($R[$i][$j])) $R[$i][$j]="";
echo "<td>".$R[$i][$j];
}
echo "</tr>";
}
echo "<tr align=center class=evenrow><td>Total";	
for ($j=0;$j<22;$j++) {
if(!isset($R[$i][$j])) $R[$i][$j]="";
echo "<td>".$R[$i][$j];
}
echo "</tr>";
?>
</tbody>
<table>
<div id=submission style="width:600px;height:300px" ></div>

</center>

<div id=foot>
<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>
