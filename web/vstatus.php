<?php
  require_once('./include/cache_start.php');
  require_once('./include/db_info.inc.php');
  require_once('./include/setlang.php');
  $view_title="Virtual Status";
  $sql="select runid,user,pid,status from virtualsolution order by `runid` desc limit 20";
  $result=mysql_query($sql);
  echo mysql_error();
  $result=mysql_query($sql);
  $tableHTML="";
  while ($row=mysql_fetch_array($result)){
	  $tableHTML = $tableHTML."<tr><td>".$row["runid"]."</td><td>";
	  $tableHTML = $tableHTML."<a href='userinfo.php?user=".$row["user"]."'>".$row["user"]."</a></td><td><a href='xcvj-view.php?id=".$row["pid"]."'>".$row["pid"]."</a></td><td>";
	  if($row["status"]=="Accepted")$tableHTML = $tableHTML."<span class='label label-success'>".$row["status"]."</span></td></tr>";
	  else $tableHTML = $tableHTML."<span class='label label-danger'>".$row["status"]."</span></td></tr>";
  }
  /////////////////////////Template
  require("template/".$OJ_TEMPLATE."/vstatus.php");
  /////////////////////////Common foot
  if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>