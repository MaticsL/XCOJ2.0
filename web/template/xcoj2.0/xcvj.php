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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <nav>
          <ul class="pagination">
            <li> <a href="<?php echo"xcvj.php?page=".$pagestart?>"aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
            <?php
			for ($i=$pagestart;$i<=$pageend;$i++){
  		      		if ($i==intval($_GET['page'])) echo "<li id='"."page".$i."' class='active'><a href='xcvj.php?page=".$i."'>".$i."</a></li>";
  				else echo "<li id='"."page".$i."'><a href='xcvj.php?page=".$i."'>".$i."</a></li>";
			}
	        ?>
            <li> <a href="<?php echo"xcvj.php?page=".$pageend?>"aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <center>
    <table width='90%' class='table table-striped table-hover'>
      <thead>
        <tr class='toprow'>
          <th width='80px'><A>Flag</A></th>
          <th width='120px'><A><?php echo $MSG_PROBLEM_ID?></A></th>
          <th><A><?php echo $MSG_TITLE?></A></th>
          <th width="60px">OJ</th>
        </tr>
      </thead>
      <tbody id="tableajax">
        <?php 
			$cnt=0;
			foreach($problemset->aaData as $row){
				echo "<tr><td></td><td align='center'>".$row[1]."</td><td><a href='xcvj-view.php?id=".$row[1]."'>".$row[2]."</a></td><td>".$row[10]."</td>";
				echo "</tr>";
				$cnt=1-$cnt;
			}
			?>
      </tbody>
    </table>
  </center>
  <nav>
    <ul class="pagination">
      <li> <a href="<?php echo"xcvj.php?page=".$pagestart?>"aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
      <?php
			for ($i=$pagestart;$i<=$pageend;$i++){
  		      		if ($i==intval($_GET['page'])) echo "<li id='"."page".$i."' class='active'><a href='xcvj.php?page=".$i."'>".$i."</a></li>";
  				else echo "<li id='"."page".$i."'><a href='xcvj.php?page=".$i."'>".$i."</a></li>";
			}
	        ?>
      <li> <a href="<?php echo"xcvj.php?page=".$pageend?>"aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
    </ul>
  </nav>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
  <!--end foot--> 
</div>
<!--end main-->
</body>
</html>
