<?php 
  $OJ_CACHE_SHARE=false;
  require_once('./include/db_info.inc.php');
  require_once('./include/setlang.php');
  $view_title= "Virtual Judge";
  require_once("./include/simple_html_dom.php");
  $vpid=$_GET['vpid'];
  if(!isset($vpid))$vpid=1000;
  if($vpid>5100||$vpid<1000){
	echo "no such problem!";
	exit(0);
  }
  $vnext=$vpid+1;
  $vpre=$vpid-1;
  $url="http://acm.hdu.edu.cn/showproblem.php?pid=".$vpid;
  if (get_magic_quotes_gpc ()) {
	$url = stripslashes ( $url);
  }
  $baseurl=substr($url,0,strrpos($url,"/")+1);
  $html = file_get_html($url);
  foreach($html->find('img') as $element)
        $element->src=$baseurl.$element->src;
        
  $element=$html->find('h1',0);
  $title=$element->plaintext;
  
  $element=$html->find('span',0);
  $tlimit=$element->plaintext; 
  $tlimit=substr($tlimit,12);
  $tlimit=substr($tlimit,strpos($tlimit, '/')+1,strpos($tlimit, ' MS') - strpos($tlimit, '/'));
  $mlimit=$element->plaintext;
  $mlimit=substr($mlimit, strpos($mlimit, "Memory"));
  $mlimit=substr($mlimit, strpos($mlimit, '/')+1,strpos($mlimit, ' K') - strpos($mlimit, '/'));
  $tlimit/=1000;
  $mlimit/=1000;
  
  $element=$html->find('div[class=panel_content]',0);
  $descriptionHTML=$element->outertext;
  $element=$html->find('div[class=panel_content]',1);
  $inputHTML=$element->outertext;
  $element=$html->find('div[class=panel_content]',2);
  $outputHTML=$element->outertext;
  
  $element=$html->find('pre',0);
  $element=$element->find('div',0);
  $sample_input=$element->innertext;
  $element=$html->find('pre',1);
  $element=$element->find('div',0);
  $sample_output=$element->innertext;

  require("template/".$OJ_TEMPLATE."/vpage.php");
?>

