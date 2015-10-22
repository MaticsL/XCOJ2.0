<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
	require_once("./db_info.inc.php");
	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
	}else{
		require_once("./lang/en.php");
	}
    function checkmail(){
		
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
	$profile="";
		if (isset($_SESSION['user_id'])){
				$sid=$_SESSION['user_id'];
				$profile.= "<li class='dropdown'><a href='./' class='dropdown-toggle' data-toggle='dropdown'>$sid<span class='caret'></span></a><ul class='dropdown-menu' role='menu'><li><a href=./modifypage.php><span class='glyphicon glyphicon-user'></span> $MSG_USERINFO</a></li><li><a href='./userinfo.php?user=$sid'><span class='glyphicon glyphicon-th-list'></span> $MSG_ME</a></li>";
				$mail=checkmail();
				if ($mail){
					$profile.= "<li><a href=./mail.php><span class='glyphicon glyphicon-envelope'></span> $mail";
					$profile.=" Mail(s)</a></li>";
				}
        $profile.="<li><a href='./status.php?user_id=$sid'><span class='glyphicon glyphicon-file'></span> Recent</a></li>";
                                
				$profile.= "<li class='divider'></li><li><a href=./logout.php><span class='glyphicon glyphicon-log-out'></span> $MSG_LOGOUT</a></li></ul></li>";
			}else{
                if ($OJ_WEIBO_AUTH){
				    $profile.= "<a href=./login_weibo.php>$MSG_LOGIN(WEIBO)</a>&nbsp;";
                }
                if ($OJ_RR_AUTH){
				    $profile.= "<a href=./login_renren.php>$MSG_LOGIN(RENREN)</a>&nbsp;";
                }
                if ($OJ_QQ_AUTH){
            $profile.= "<a href=./login_qq.php>$MSG_LOGIN(QQ)</a>&nbsp;";
                }
				$profile.= "<li><a href=./loginpage.php>$MSG_LOGIN</a></li>";
				if($OJ_LOGIN_MOD=="oj"){
					$profile.= "<li><a href=./registerpage.php>$MSG_REGISTER</a></li>";
				}
			}
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
           $profile.= "<li><a href=./admin/>$MSG_ADMIN</a></li>";
			
			}
		?>
document.write("<?php echo ( $profile);?>");
