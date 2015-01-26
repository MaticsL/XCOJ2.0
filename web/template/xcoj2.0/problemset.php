<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $view_title?></title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>	
   	 <!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->	
</head>
<body>
	<?php require_once("oj-header.php");?>
<div id=main>
<script type="text/javascript">
var curpage=<?php echo $page?>;
var pagenum=curpage+1;
var _issearch=0;
function changepage(num){
    _issearch=0;
    $("li.active").removeClass("active");
    $("li#page"+num).addClass("active");
    var xmlhttp;
    xmlhttp=$.ajax({url:"problemset-ajax.php?page="+num,async:false,contentType:"application/x-www-form-urlencoded; charset=utf-8",});
    document.getElementById("tableajax").innerHTML=xmlhttp.responseText;
    $("tr").fadeIn();
    curpage=num;
    pagenum=curpage+1;
}
function search(){
    var str=$("#search").val();
    _issearch=1;
    var xmlhttp;
    xmlhttp=$.ajax({url:"problemset-ajax.php?search="+str,async:false,contentType:"application/x-www-form-urlencoded; charset=utf-8",});
    document.getElementById("tableajax").innerHTML=xmlhttp.responseText;
    $("tr").fadeIn();
}
$(window).scroll(function(){
//	alert($("table:first").scrollTop())
　　if(_issearch==0 && $(document).height()-$(window).scrollTop()-document.documentElement.clientHeight<10 && pagenum <= <?php echo floor($view_total_page)?>)problemajax(); 
});
function problemajax(){
    var xmlhttp;
    xmlhttp=$.ajax({url:"problemset-ajax.php?page="+pagenum,async:false,contentType:"application/x-www-form-urlencoded; charset=utf-8",});
    document.getElementById("tableajax").innerHTML=document.getElementById("tableajax").innerHTML+"<tr><td colspan=6><center>"+pagenum+"</center></td></tr>"+xmlhttp.responseText;
    $("tr").fadeIn();
    pagenum=pagenum+1;
　　}
$(function(){
        $('#search').bind('keypress',function(event){
            if(event.keyCode == "13")    
		search();
        });
});
</script>
<div class="container-fluid">
<div class="row">
<div class="col-md-5">
<nav>
	  <ul class="pagination">
	        <?php
			for ($i=1;$i<=$view_total_page;$i++){
  		      		if ($i==$page) echo "<li id='"."page".$i."' class='active'><a href='#' onclick='changepage($i);'>".$i."</a></li>";
  				else echo "<li id='"."page".$i."'><a href='#' onclick='changepage($i);'>".$i."</a></li>";
			}
	        ?>
	  </ul>
</nav>
</div>
<div class="col-md-4"><br />
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-info active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked>Local Problems
  </label>
  <label class="btn btn-info" disabled="disabled">
    <input type="radio" name="options" id="option2" autocomplete="off">Remote Problems
  </label>
  <label class="btn btn-info">
    <input type="radio" name="options" id="option3" autocomplete="off">Both
  </label>
</div>
</div>
<div class="col-md-3"><br />
		<div class="input-group">
			<input type="text" id="search" class="form-control">
			<span class="input-group-btn"><button type="submit" onclick="search();" class="btn btn-info"><?php echo $MSG_SEARCH?></button></span>
		</div>
</div>
</div>
</div>
<center>
	<table id='problemset' width='90%' class='table table-striped table-hover'>
                <thead>

                          <tr class='toprow'>
                            <th width='80'><A>Flag</A></th>
                          	<th width='120'  ><A><?php echo $MSG_PROBLEM_ID?></A></th>
                            <th><A><?php echo $MSG_TITLE?></A></th>
                            <th width='10%'><?php echo $MSG_SOURCE?></th>
                            <th style="cursor:hand"  width=60 ><?php echo $MSG_AC?></th>
                            <th style="cursor:hand" width=60 ><?php echo $MSG_SUBMIT?></th>
                          </tr>
                </thead>

		  
			<tbody id="tableajax">
			<?php 
			$cnt=0;
			foreach($view_problemset as $row){
				echo "<tr>";
				foreach($row as $table_cell){
					echo "<td>";
					echo "\t".$table_cell;
					echo "</td>";
				}
				
				echo "</tr>";
				
				$cnt=1-$cnt;
			}
			?>
			</tbody>
			</table></center>

<nav>
<ul class="pagination">
        <?php
    for ($i=1;$i<=$view_total_page;$i++){
		if ($i==$page) echo "<li id='"."page".$i."' class='active'><a href='#' onclick='changepage($i);'>".$i."</a></li>";
		else echo "<li id='"."page".$i."'><a href='#' onclick='changepage($i);'>".$i."</a></li>";
	}
       ?>
</ul>
</nav>
<div id=foot>
	<?php require_once("oj-footer.php");?>
</div><!--end foot-->
</div><!--end main-->
</body>
</html>
