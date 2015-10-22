<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $view_title?></title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
<!--[if lt IE 9]>
      	<script src="bootstrap/js/html5shiv.min.js"></script>
      	<script src="bootstrap/css/respond.min.js"></script>
    	<![endif]-->
</head>
<body>
<div class="modal fade" id="arrangecontest1" tabindex="-1" role="dialog" aria-labelledby="label1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="label1"><?php echo $MSG_DIY_CONTEST; ?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>标题</label>
          <input id="contesttitle" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>描述</label>
          <textarea id="contestdesc" class="form-control" rows="3" style="resize:none"></textarea>
        </div>
        <div class="form-inline">
          <div class="form-group">
            <label>添加题目</label>
            <input type="number" id="pbmid" class="form-control" />
          </div>
          <button type="button" class="btn btn-default" onclick="loadProblem();">确认</button>
        </div>
        <ul id="pbmlist" class="list-group">
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-warning" onclick="dataInit();">重置</button>
        <button type="button" class="btn btn-primary" onclick="$('#arrangecontest1').modal('hide');$('#arrangecontest2').modal('show')">下一步</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="arrangecontest2" tabindex="-1" role="dialog" aria-labelledby="label2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="label2"><?php echo $MSG_DIY_CONTEST; ?></h4>
      </div>
      <div class="modal-body">
        <form class="form-inline">
          <div class="form-group">
            <label>开始时间</label>
            <input id="starttime" type="datetime-local" class="form-control" />
          </div>
        </form>
        <form class="form-inline">
          <div class="form-group">
            <label>结束时间</label>
            <input id="endtime" type="datetime-local" class="form-control" />
          </div>
        </form>
        <div class="form-group">
          <label>密码(留空为不设密码)</label>
          <input id="contenstpass" type="password" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-warning" onclick="dataInit();">重置</button
        >
        <button type="button" class="btn btn-primary" onclick="$('#arrangecontest2').modal('hide');$('#arrangecontest1').modal('show')">上一步</button>
        <button type="button" class="btn btn-primary" onclick="submitContest();">确认</button>
      </div>
    </div>
  </div>
</div>
<div id="wrapper">
  <?php require_once("oj-header.php");?>
  <div id="main">
    <center>
      <h1>Virtual Contest List</h1>
      <?php if($btn_arrange_flag==1)echo "<button class='btn btn-primary' data-toggle='modal' data-target='#arrangecontest1'>".$MSG_DIY_CONTEST."</button>"; ?>
      <p>ServerTime:<span id=nowdate></span></p>
      <table class="table table-hover table-striped">
        <thead>
          <tr class="toprow" align="center">
            <td width=10%>ID
            <td width=20%>Master
            <td width=30%>Name
            <td width=20%>Start Time
            <td width=20%>End Time 
          </tr>
        </thead>
        <tbody>
          <?php 
			$cnt=0;
			foreach($table as $row){
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
      </table>
    </center>
    <script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
var str="[";
function loadProblem(){
	var id=$("#pbmid").val();
	$.getJSON("./vproblem-ajax.php?id="+id,function(data){
		var p=data.title.indexOf("-");
		if(p!=1){
			$("#nosuchpbm").remove();
			data.title=data.title.substring(p+2);
			$("#pbmlist").append("<li class='list-group-item' id='"+id+"'>"+data.title+"</li>");
			str=str+id.toString()+",";
		}
	});	
}
function dataInit(){
	str="[";
	$("#contesttitle").val("");
	$("#contestdesc").val("");
	$("#starttime").val("");
	$("#endtime").val("");
	$("#contestpass").val("");
	$("#pbmlist").html("");
}
function submitContest(){
	$.post("./vcontestsubmit.php",{
		title:$("#contesttitle").val(),
		description:$("#contestdesc").val(),
		starttime:$("#starttime").val(),
		endtime:$("#endtime").val(),
		password:$("#contestpass").val(),
		problemstr:str+"0]"
	},function(data){
		if(data.indexOf("success")!=-1){
			alert("成功");
			$('#arrangecontest2').modal('hide');$('#arrangecontest1').modal('hide');
			dataInit();
		}
		else alert(data);
	});	
}
function clock()
    {
      var x,h,m,s,n,xingqi,y,mon,d;
      var x = new Date(new Date().getTime()+diff);
      y = x.getYear()+1900;
      if (y>3000) y-=1900;
      mon = x.getMonth()+1;
      d = x.getDate();
      xingqi = x.getDay();
      h=x.getHours();
      m=x.getMinutes();
      s=x.getSeconds();
      n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
      //alert(n);
      document.getElementById('nowdate').innerHTML=n;
      setTimeout("clock()",1000);
    } 
    clock();
</script>
    <div id="foot">
      <?php require_once("oj-footer.php");?>
    </div>
    <!--end foot--> 
  </div>
  <!--end main--> 
</div>
<!--end wrapper-->
</body>
</html>
