<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $view_title?></title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<?php if($pr_flag){?>
<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
<?php } ?>
<!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->
<link rel="next" href="submitpage.php?<?php
        
        if ($pr_flag){
		echo "id=$id";
	}else{
		echo "cid=$cid&pid=$pid&langmask=$langmask";
	}
        
        ?>">
</head>
<body>
<?php if($pr_flag){?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="myModalLabel"><?php echo $MSG_SUBMIT." ".$row->title ?></h2>
      </div>
      <div class="modal-body">
        <form id=frmSolution action="submit.php" method="post"
<?php if($OJ_LANG=="cn"){?>
 onsubmit="return checksource(document.getElementById('source').value);"
<?php }?>
 >
          <?php if (isset($id)){?>
          <input id=problem_id type='hidden'  value='<?php echo $id?>' name="id" >
          <?php }else{
$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
if ($pid>25) $pid=25;
?>
          <input id="cid" type='hidden' value='<?php echo $cid?>' name="cid">
          <input id="pid" type='hidden' value='<?php echo $pid?>' name="pid">
          <?php }?>
          <div class="row">
            <div class="col-md-2">
              <h4>Language:</h4>
            </div>
            <div class="col-md-3">
              <select class="form-control" id="language" name="language">
                <?php
$lang_count=count($language_ext);

  if(isset($_GET['langmask']))
        $langmask=$_GET['langmask'];
  else
        $langmask=$OJ_LANGMASK;
       
  $lang=(~((int)$langmask))&((1<<($lang_count))-1);
if(isset($_COOKIE['lastlang'])) $lastlang=$_COOKIE['lastlang'];
 else $lastlang=0;
 for($i=0;$i<$lang_count;$i++){
                if($lang&(1<<$i))
                 echo"<option value=$i ".( $lastlang==$i?"selected":"").">
                        ".$language_name[$i]."
                 </option>";
  }

?>
              </select>
            </div>
          </div>
          <h4>Code:</h4>
          <textarea class="form-control" cols=180 rows=16 id="source" name="source" style="resize:none"><?php echo $view_src?></textarea>
          <br>
          <center>
            <input id=Submit class="btn btn-info" type=button data-loading-text="Processing..." value="<?php echo $MSG_SUBMIT?>"  onclick=do_submit(); autocomplete="off">
            <input type=reset  class="btn btn-warning" value="Reset">
          </center>
        </form>
        <script>
	function do_submit(){
	var $btn = $('#Submit').button('loading');
	if(typeof(eAL) != "undefined"){   eAL.toggle("source");eAL.toggle("source");}
        var mark="<?php echo isset($id)?'problem_id':'cid';?>";
        var problem_id=document.getElementById(mark);
        if(mark=='problem_id')
                problem_id.value='<?php echo $id?>';
        else    
                problem_id.value='<?php echo $cid?>';
        document.getElementById("frmSolution").target="_self";
        document.getElementById("frmSolution").submit();
	$btn.button('reset');
        }
	</script> 
      </div>
    </div>
  </div>
</div>
<?php }?>
<?php
	if(isset($_GET['id']))
		require_once("oj-header.php");
	else
		require_once("contest-header.php");
	
	?>
<div id=main>
<?php
	
	if ($pr_flag){
		echo "<title>$MSG_PROBLEM $row->problem_id. -- $row->title</title>";
		echo "<center><h2>$id: $row->title</h2>";
	}else{
		$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		echo "<title>$MSG_PROBLEM $PID[$pid]: $row->title </title>";
		echo "<center><h2>$MSG_PROBLEM $PID[$pid]: $row->title</h2>";
	}
	echo "<span class=green>$MSG_Time_Limit: </span>$row->time_limit Sec&nbsp;&nbsp;";
	echo "<span class=green>$MSG_Memory_Limit: </span>".$row->memory_limit." MB";
	if ($row->spj) echo "&nbsp;&nbsp;<span class=red>Special Judge</span>";
	echo "<br><span class=green>$MSG_SUBMIT: </span>".$row->submit."&nbsp;&nbsp;";
	echo "<span class=green>$MSG_SOVLED: </span>".$row->accepted."<br>"; 
	?>
<div class="btn-group">
  <?php
	if ($pr_flag){
		echo "<a tabindex='0' class='btn btn-danger' role='button' data-toggle='popover' data-trigger='focus' data-container='body' data-placement='bottom' data-content='".$row->tags."' title='Tags'>$MSG_TAGS</a>";
		echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>$MSG_SUBMIT</button>";
	}else{
		echo "<a class='btn btn-primary' href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask'>$MSG_SUBMIT</a>";
	}
	echo "<a class='btn btn-default' href='problemstatus.php?id=".$row->problem_id."'>$MSG_STATISTICS</a>";
	echo "<a class='btn btn-default' href='bbs.php?pid=".$row->problem_id."$ucid'>$MSG_BBS</a>";
	  if(isset($_SESSION['administrator'])){
      require_once("include/set_get_key.php");
      ?>
  <a class="btn btn-default" href="admin/problem_edit.php?id=<?php echo $row->problem_id?>&getkey=<?php echo $_SESSION['getkey']?>" >Edit</a> <a class="btn btn-default" href="admin/quixplorer/index.php?action=list&dir=<?php echo $row->problem_id?>&order=name&srt=yes" >TestData</a>
  <?php
    }
	echo "</div></center><br>";
	
	echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Description</h3></div><div class='panel-body'>".$row->description."</div></div>";
	echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Input</h3></div><div class='panel-body'>".$row->input."</div></div>";
	echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Output</h3></div><div class='panel-body'>".$row->output."</div></div>";
	
  
	
	$sinput=str_replace("<","&lt;",$row->sample_input);
  $sinput=str_replace(">","&gt;",$sinput);
	$soutput=str_replace("<","&lt;",$row->sample_output);
  $soutput=str_replace(">","&gt;",$soutput);
  if($sinput) {
      echo "<div class='row'><div class='col-md-6'><div class='panel panel-warning'><div class='panel-heading'><h3 class='panel-title'>$MSG_Sample_Input</h3></div>
			<div class='panel-body'><span class=sampledata>".($sinput)."</span></div></div></div>";
  }
  if($soutput){
	echo "<div class='col-md-6'><div class='panel panel-warning'><div class='panel-heading'><h3 class='panel-title'>$MSG_Sample_Output</h3></div>
			<div class='panel-body'><span class=sampledata>".($soutput)."</span></div></div></div></div>";
  }
  if ($row->hint!="") 
		echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_HINT</h3></div>
			<div class='panel-body'><p>".nl2br($row->hint)."</p></div></div>";
	if ($pr_flag&&$row->source!="") 
		echo "<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>$MSG_Source</h3></div>
			<div class='panel-body'><p><a href='problemset.php?search=$row->source'>".nl2br($row->source)."</a></p></div></div>";
	echo "<center><div class='btn-group'>";
	if ($pr_flag){
		echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>$MSG_SUBMIT</button>";
	}else{
		echo "<a class='btn btn-primary' href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask'>$MSG_SUBMIT</a>";
	}
	echo "<a class='btn btn-default' href='problemstatus.php?id=".$row->problem_id."'>$MSG_STATISTICS</a>";

	echo "<a class='btn btn-default' href='bbs.php?pid=".$row->problem_id."$ucid'>$MSG_BBS</a>";
	
	if(isset($_SESSION['administrator'])){
      require_once("include/set_get_key.php");
  ?>
  <a class="btn btn-default" href="admin/problem_edit.php?id=<?php echo $id?>&getkey=<?php echo $_SESSION['getkey']?>" >Edit</a> <a class="btn btn-default" href="admin/quixplorer/index.php?action=list&dir=<?php echo $row->problem_id?>&order=name&srt=yes" >TestData</a>
  <?php
  }	
  echo "</div></center>";
	?>
  <!-- tag --> 
  <script>$(function () 
      { $("[data-toggle='popover']").popover();
      });
</script>
  <div id=foot>
    <?php require_once("oj-footer.php");?>
  </div>
  <!--end foot--> 
</div>
<!--end main-->

</body>
</html>
