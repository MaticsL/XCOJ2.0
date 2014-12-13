<?php
////////////////////////////Common head
	$cache_time=10;
	$OJ_CACHE_SHARE=false;
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');
	if ($OJ_LANG == 'cn') {
		$view_title= "常见问答";
		require("template/".$OJ_TEMPLATE."/faqs.cn.php");
	} else {
		$view_title= "Frequently Asked Questions Answered";

		/////////////////////////Template
		require("template/".$OJ_TEMPLATE."/faqs.php");
	}

/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>
