<?php 
	require('../include/db_info.inc.php');

?>
<html>
<head>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href='../template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
<!--[if lt IE 9]>
      	<script src="../bootstrap/js/html5shiv.min.js"></script>
      	<script src="../bootstrap/css/respond.min.js"></script>
    	<![endif]-->
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
		if($row[0]=="0") return false;
		$retmsg="<font class='red'>".$row[0]."</font>";
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
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="./">XCOJ</a> </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class='<?php if (1) echo "active";?>'><a href="../bbs.php"> <i class="glyphicon glyphicon-comment"></i><?php echo $MSG_BBS?></a></li>
        <li class="dropdown"><a href="problemset.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-question-sign"></i><?php echo $MSG_PROBLEMS?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../problemset.php"><?php echo $MSG_VIEWALL?></a></li>
            <li><a href="../xcvj.php?page=1"><?php echo $MSG_VJUDGE_PROBLEMS?></a></li>
            <li><a href="../category.php"><?php echo $MSG_PROBLEM_CATEGORY?></a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="../status.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-check"></i><?php echo $MSG_STATUS?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../status.php"><?php echo $MSG_VIEWALL?></a></li>
            <li><a href="../vstatus.php"><?php echo $MSG_VJUDGE_PROBLEMS?></a></li>
          </ul>
        </li>
        <li class='<?php if ($url=="../ranklist.php") echo " active";?>'><a href="../ranklist.php"> <i class="glyphicon glyphicon-signal"></i><?php echo $MSG_RANKLIST?></a></li>
        <li class='dropdown'><a href="contest.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-fire"></i><?php echo checkcontest($MSG_CONTEST)?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../contest.php"><?php echo $MSG_LOCAL_CONTEST?></a></li>
            <li><a href="../recent-contest.php"><?php echo $MSG_RECENT_CONTEST?></a></li>
            <li><a href="vcontest.php"><?php echo $MSG_DIY_CONTEST?></a></li>
          </ul>
        </li>
        <li class='<?php if ($url==(isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php")) echo "active";?>'><a href="<?php echo isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"../faqs.php"?>"> <i class="glyphicon glyphicon-info-sign"></i><?php echo "$MSG_FAQ"?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php           if (isset($_SESSION['user_id'])){
				$sid=$_SESSION['user_id'];
				print "<li class='dropdown'><a href='./' class='dropdown-toggle' data-toggle='dropdown'>$sid<span class='caret'></span></a><ul class='dropdown-menu' role='menu'><li><a href=../modifypage.php><span class='glyphicon glyphicon-user'></span>$MSG_USERINFO</a></li><li><a href='../userinfo.php?user=$sid'><span class='glyphicon glyphicon-th-list'></span>$sid</a></li>";
				$mail=checkmail();
				if ($mail){
					print "<li><a href='../mail.php'><span class='glyphicon glyphicon-envelope'></span>$mail";
					print " Mail(s)</a></li>";
				}
        print "<li><a href='../status.php?user_id=$sid'><span class='glyphicon glyphicon-file'></span>Recent</a></li>";
                              
				print "<li class='divider'></li><li><a href=../logout.php><span class='glyphicon glyphicon-log-out'></span>$MSG_LOGOUT</a></li></ul></li>";
			}else{
					
					print "<li><a href=../loginpage.php>$MSG_LOGIN</a></li>";
					print "<li><a href=../registerpage.php>$MSG_REGISTER</a></li>";
			}
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
           print "<li><a href=../admin/>$MSG_ADMIN</a></li>";
			
			}
		?>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<br>
<div id=main>
