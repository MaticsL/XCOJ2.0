<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $view_title?></title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
   	<!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->
</head>
<body>
<div id="wrapper">
        <?php
        if(isset($_GET['id']))
                require_once("oj-header.php");
        else
                require_once("contest-header.php");
       
        ?>
<div id=main>
        <center>
<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
{
   $OJ_EDITE_AREA=false;
}



if($OJ_EDITE_AREA){
?>
<script language="Javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">

editAreaLoader.init({
                id: "source"            
                ,start_highlight: true
                ,allow_resize: "both"
                ,allow_toggle: true
                ,word_wrap: true
                ,language: "en"
                ,syntax: "cpp"  
                        ,font_size: "14"
                ,syntax_selection_allow: "basic,c,cpp,java,pas,perl,php,python,ruby"
                        ,toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font,syntax_selection,|, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help"          
        });
</script>
<?php }?>
<script src="include/checksource.js"></script>

<form id=frmSolution action="submit.php" method="post"
<?php if($OJ_LANG=="cn"){?>
 onsubmit="return checksource(document.getElementById('source').value);"
<?php }?>>

<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">
<?php if (isset($id)){?>
Problem <span class=blue><b><?php echo $id?></b></span>
<input id=problem_id type='hidden'  value='<?php echo $id?>' name="id" ><br>
<?php }else{
$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
if ($pid>25) $pid=25;
?>
Problem <span class=blue><b><?php echo $PID[$pid]?></b></span> of Contest <span class=blue><b><?php echo $cid?></b></span>
<input id="cid" type='hidden' value='<?php echo $cid?>' name="cid">
<input id="pid" type='hidden' value='<?php echo $pid?>' name="pid">
<?php }?>
</h3>
</div>
<div class="panel-body">
Language:
<select class="form-control input-sm" id="language" name="language" style="width:100">
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
</select><br>
<textarea class="form-control" style="width:80%" cols=180 rows=20 id="source" name="source"><?php echo $view_src?></textarea><br>
<input id=Submit class="btn btn-info" type=button value="<?php echo $MSG_SUBMIT?>"  onclick=do_submit();>
<input type=reset  class="btn btn-danger" value="Reset">
</div>
</div>
</form>

</center>
<script>
     function do_submit(){
	if(typeof(eAL) != "undefined"){   eAL.toggle("source");eAL.toggle("source");}
        var mark="<?php echo isset($id)?'problem_id':'cid';?>";
        var problem_id=document.getElementById(mark);     
        if(mark=='problem_id')
                problem_id.value='<?php echo $id?>';
        else    
                problem_id.value='<?php echo $cid?>';
       
        document.getElementById("frmSolution").target="_self";
        <?php if($OJ_LANG=="cn") echo "if(checksource(document.getElementById('source').value))";?>
        document.getElementById("frmSolution").submit();
     }
</script>
<div id=foot>
        <?php require_once("oj-footer.php");?>

</div><!--end foot-->
</div><!--end main-->
</div><!--end wrapper-->
</body>
</html>
