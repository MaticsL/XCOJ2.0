<?php 
	require('../include/db_info.inc.php');

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href='../template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
<?php function checkcontest($MSG_CONTEST){
		require_once("../include/db_info.inc.php");
		$sql="SELECT count(*) FROM `contest` WHERE `end_time`>NOW() AND `defunct`='N'";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		if (intval($row[0])==0) $retmsg=$MSG_CONTEST;
		else $retmsg=$row[0]."<font color=red>&nbsp;$MSG_CONTEST</font>";
		mysql_free_result($result);
		return $retmsg;
	}
	function checkmail(){
		require_once("../include/db_info.inc.php");
		$sql="SELECT count(1) FROM `mail` WHERE 
				new_mail=1 AND `to_user`='".$_SESSION['user_id']."'";
		$result=mysql_query($sql);
		if(!$result) return false;
		$row=mysql_fetch_row($result);
		$retmsg="<font color=red>(".$row[0].")</font>";
		mysql_free_result($result);
		return $retmsg;
	}
	
	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
		if(file_exists("../faqs.$OJ_LANG.php")){
			$OJ_FAQ_LINK="../faqs.$OJ_LANG.php";
		}
	}else{
		require_once("../lang/en.php");
	}
	

	if($OJ_ONLINE){
		require_once('../include/online.php');
		$on = new online();
	}
?>
</head>
<body>

<script src="../jquery-1.9.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">XCOJ</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
                <li class='<?php if (1) echo "active";?>'><a href="../bbs.php">
                <i class="glyphicon glyphicon-comment"></i><?php echo $MSG_BBS?></a></li>
                <li class='<?php if ($url=="../problemset.php") echo "active";?>'><a href="../problemset.php">
                <i class="glyphicon glyphicon-question-sign"></i><?php echo $MSG_PROBLEMS?></a></li>

                <li class='<?php if ($url=="../status.php") echo " active";?>'><a href="../status.php">
                <i class="glyphicon glyphicon-check"></i><?php echo $MSG_STATUS?></a></li>

                <li class='<?php if ($url=="../ranklist.php") echo " active";?>'><a href="../ranklist.php">
                <i class="glyphicon glyphicon-signal"></i><?php echo $MSG_RANKLIST?></a></li>

                <li class='<?php if ($url=="../contest.php") echo " active";?>'><a href="../contest.php">
                <i class="glyphicon glyphicon-fire"></i><?php echo checkcontest($MSG_CONTEST)?></a></li>

                <li class='<?php if ($url=="../recent-contest.php") echo "active";?>'><a href="../recent-contest.php">
                <i class="glyphicon glyphicon-share"></i><?php echo "$MSG_RECENT_CONTEST"?></a></li>

                <li class='<?php if ($url==(isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php")) echo "active";?>'><a href="<?php echo isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"../faqs.php"?>">
                <i class="glyphicon glyphicon-info-sign"></i><?php echo "$MSG_FAQ"?></a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
	<div id=profile >

<?php if (isset($_SESSION['user_id'])){
				$sid=$_SESSION['user_id'];
				print "&nbsp;<a href=../modifypage.php>$MSG_USERINFO
					</a><a href='../userinfo.php?user=$sid'>
				<font color=red>$sid</font></a>";
				$mail=checkmail();
				if ($mail)
					print "<a href=../mail.php>$mail</a>";
				print "<a href=../logout.php>$MSG_LOGOUT</a>";
			}else{
				print "<a href=../loginpage.php>$MSG_LOGIN</a>";
				print "<a href=../registerpage.php>$MSG_REGISTER</a>";
			}
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
				print "<a href=../admin>$MSG_ADMIN</a>";
			
			}
		?>


</div><!--end profile-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../image/title1.jpg" alt="First slide">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="../image/title2.jpg" alt="Second slide">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id=main>
