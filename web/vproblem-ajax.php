<?php 
  $OJ_CACHE_SHARE=false;
  require_once("./include/simple_html_dom.php");
  if(isset($_GET['id'])) $id=intval($_GET['id']);else exit(0);
  $url="http://www.bnuoj.com/v3/problem_show.php?pid=".$id;
  if (get_magic_quotes_gpc ()) {
	$url = stripslashes ( $url);
  }
  $baseurl=substr($url,0,strrpos($url,"/")+1);
  $html = file_get_html($url);
  foreach($html->find('img') as $element)
        $element->src=$baseurl.$element->src;
        
  $element=$html->find('title',0);
  $json->title=substr($element->innertext,6);
  
  $element=$html->find('div[id=conditions]',0);
  $json->limit=$element->innertext;
  
  $element=$html->find('div[class=content-wrapper]',0);
  $json->descriptionHTML=$element->innertext;
  $element=$html->find('div[class=content-wrapper]',1);
  $json->inputHTML=$element->innertext;
  $element=$html->find('div[class=content-wrapper]',2);
  $json->outputHTML=$element->innertext;
  
  $element=$html->find('pre',0);
  $json->sample_input=$element->innertext;
  $element=$html->find('pre',1);
  $json->sample_output=$element->innertext;
  $element=$html->find('div[class=content-wrapper]',3);
  $json->hintHTML=$element->innertext;
  echo json_encode($json);
?>
