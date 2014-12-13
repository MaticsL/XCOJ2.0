<br /><span class=center>
	<?php if(file_exists("setlang.php")){?>Language selection:
		<a href=setlang.php?lang=cn>中文</a>&nbsp;
		<a href=setlang.php?lang=en>English</a><br />
	<?php }?>
		Copyright &copy; 2014 <a href='<?php echo $OJ_HOME?>'><?php echo $ORG_NAME?></a> all rights reserved. <br />
		Based on <a href='http://code.google.com/p/hustoj/'>HUSTOJ Project</a>, modified by ICPC Team at HFUTXC. <br />
		Any Problem, Please Contact <a href="mailto:<?php echo $OJ_ADMIN?>">Administrator</a>

     <?php if ($OJ_SAE) {
                   echo "<a href=http://sae.sina.com.cn><img bolder=0 src=http://static.sae.sina.com.cn/image/poweredby/poweredby.png></a>";
            
           }
     ?>
</span>
