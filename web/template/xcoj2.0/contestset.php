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
  <div id=main>
    <center>
      <h1>Contest List</h1>
      ServerTime:<span id=nowdate></span>
      <table class="table table-hover table-striped">
        <thead>
          <tr class="toprow" align="center">
            <td width=6%>ID 
            <td width=42%>Name 
            <td width=42%>Status 
            <td width=10%>Private
          </tr>
        </thead>
        <tbody>
          <?php 
			$cnt=0;
			foreach($view_contest as $row){
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
    </center>
    <script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
//alert(diff);
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
      //alert(n);
      document.getElementById('nowdate').innerHTML=n;
      setTimeout("clock()",1000);
    } 
    clock();
</script>
    <div id="foot">
      <?php require_once("oj-footer.php");?>
    </div>
    <!--end foot--> 
  </div>
  <!--end main--> 
</div>
<!--end wrapper-->
</body>
</html>
