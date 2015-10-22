<?php 
	$OJ_CACHE_SHARE=false;
	$cache_time=60;
	require_once('./include/db_info.inc.php');
	require_once('./include/cache_start.php');
	require_once('./include/setlang.php');
	$pagediv=100;
    $view_title= "XCVJ";
	if (isset($_GET['page']))$pstart=(intval($_GET['page'])-1)*$pagediv; else $pstart=0;
	$url = "http://www.bnuoj.com/v3/ajax/problem_data.php?iDisplayStart=".$pstart."&iDisplayLength=".$pagediv; 
	$contents = file_get_contents($url); 
	$problemset=json_decode($contents);
	$problemcnt=$problemset->iTotalRecords;
	$pagecnt=floor($problemcnt/$pagediv)+1;
	$pagestart=max(intval($_GET['page'])-5,1);
	$pageend=min($pagecnt,intval($_GET['page'])+5);
	require("template/".$OJ_TEMPLATE."/xcvj.php");
	if(file_exists('./include/cache_end.php')) require_once('./include/cache_end.php');
?>
