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
  <div class="container-fluid">
    <div class="col-md-9">
      <center>
      <h3><?php echo $title?></h3>
      <?php
  	echo "<div class='well'>$limit</div></center>";
	echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Description</h3></div><div class='panel-body'>".$descriptionHTML."</div></div>";
	if($inputHTML!="") echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Input</h3></div><div class='panel-body'>".$inputHTML."</div></div>";
	if($outputHTML!="") echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Output</h3></div><div class='panel-body'>".$outputHTML."</div></div>";
    if($sample_input!=""&&$sample_output!="") {echo "<div class='row'><div class='col-md-6'><div class='panel panel-warning'><div class='panel-heading'><h3 class='panel-title'>$MSG_Sample_Input</h3></div><div class='panel-body'>
			<span class=sampledata>".$sample_input."</span></div></div></div>";
	                       echo "<div class='col-md-6'><div class='panel panel-warning'><div class='panel-heading'><h3 class='panel-title'>$MSG_Sample_Output</h3></div><div class='panel-body'>
			<span class=sampledata>".$sample_output."</span></div></div></div></div>";}
	if($hintHTML!="") echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_HINT & $MSG_SOURCE</h3></div><div class='panel-body'>".$hintHTML."</div></div>";
	?>
    </div>
    <div class="col-md-3"> <br />
      <div class="panel panel-primary">
        <div class="panel-body">
          <form id="frmSolution" action="vsubmit.php" method="post">
            <input id="problem_id" type="hidden" value="<?php echo $id?>" name="id">
            </input>
            <select class="form-control" name="lang" id="lang">
              <option value="1" selected="selected">GNU C++</option>
              <option value="2">GNU C</option>
              <option value="3">Oracle Java</option>
            </select>
            <textarea class="form-control" rows="20" name="source" style="resize:none;"></textarea>
            <br />
            <input class="btn btn-block btn-primary" type="submit" value="<?php echo $MSG_SUBMIT?>">
            </input>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
  <!--end foot--> 
</div>
<!--end main-->
</body>
</html>
