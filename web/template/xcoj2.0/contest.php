<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Refresh" content="180" />
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title><?php echo $view_title?></title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   	<!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->	
	<script src="jquery-1.9.1.min.js"></script>
</head>
<body>
<div id="wrapper">
	<?php require_once("contest-header.php");?>
<div id=main>
<center>
    <div class="panel panel-primary">
	<div class="panel-body">
	<h3><?php echo $view_title ?></h3>		
	<p><?php echo $view_description?></p>
        </div>
    </div>
    <div class="well">
			<?php if ($now>$start_time&&$now<$end_time) {?>
			<div class="progress">
  				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo (($now-$start_time)*100/($end_time-$start_time))."%"?>">
    					<span class="sr-only"></span>
  				</div>
			</div>
			<?php } ?>
			Start Time: <font color=#993399><?php echo $view_start_time?></font>
			End Time: <font color=#993399><?php echo $view_end_time?></font><br />
			Current Time: <font color=#993399><span id=nowdate > <?php echo date("Y-m-d H:i:s")?></span></font>
			Status:<?php
				if ($now>$end_time) 
					echo "<span class=red>Ended</span>";
				else if ($now<$start_time) 
					echo "<span class=red>Not Started</span>";
				else 
					echo "<span class=red>Running</span>";
			?>&nbsp;&nbsp;
			<?php
				if ($view_private=='0') 
					echo "<span class=blue>Public</font>";
				else 
					echo "&nbsp;&nbsp;<span class=red>Private</font>"; 
			?><br />
			<div class="btn-group" role="group">
            	<?php if (isset($_SESSION['user_id'])) echo "<a class='btn btn-lg btn-warning' href='status.php?cid=".$view_cid."&user_id=".$_SESSION['user_id']."'>我的提交记录</a>"; else echo "<a class='btn btn-lg btn-warning' href='loginpage.php'>$MSG_LOGIN</a>";?>
				<a class="btn btn-lg btn-default" href='status.php?cid=<?php echo $view_cid?>'><?php echo $MSG_STATUS?></a>
				<a class="btn btn-lg btn-default" href='contestrank.php?cid=<?php echo $view_cid?>'><?php echo $MSG_STANDING?></a>
				<a class="btn btn-lg btn-default" href='conteststatistics.php?cid=<?php echo $view_cid?>'><?php echo $MSG_STATISTICS?></a>
			</div>
     </div>
     <br />

	<table id='problemset' class="table" width='90%'>
		<thead>
			
			<tr class='toprow'>
				<td width='5%'>#</td>
				<td width=15%><?php echo $MSG_PROBLEM_ID?></td>
				<td width='60%'><?php echo $MSG_TITLE?></td>
				<td width='5%'><?php echo $MSG_AC?></td>
				<td width='5%'><?php echo $MSG_SUBMIT?></td>
			</tr>
			</thead>
			<tbody>
			<?php 
			$cnt=0;
			foreach($view_problemset as $row){
				if($cnt) echo "<tr class='oddrow'>";else echo "<tr class='evenrow'>";
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
			</table></center>
<div id=foot>
	<?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
<script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
function clock()
    {
      var x,h,m,s,n,xingqi,y,mon,d;
      var x = new Date(new Date().getTime()+diff);
      y = x.getYear()+1900;
      if (y>3000) y-=1900;
      mon = x.getMonth()+1;
      d = x.getDate();
      xingqi = x.getDay();
      h=x.getHours();
      m=x.getMinutes();
      s=x.getSeconds();
      n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
      document.getElementById('nowdate').innerHTML=n;
      setTimeout("clock()",1000);
    } 
    clock();
</script>

</html>
