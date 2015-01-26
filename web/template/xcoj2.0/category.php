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
	<style>
	#tagsList {position:relative; width:450px; height:450px; background:#24313d;}
	#tagsList a {position:absolute; top:0px; left:0px; font-family: Microsoft YaHei; color:#fff; font-weight:bold; text-decoration:none; padding: 3px 6px; cursor: hand;}
	#tagsList a:hover { color:#FF0000; letter-spacing:2px;}
	</style>
<script>
function problemajax(str){
    var xmlhttp;
    xmlhttp=$.ajax({url:"problemset-ajax.php?search="+str,async:false,contentType:"application/x-www-form-urlencoded; charset=utf-8",});
    document.getElementById("tableajax").innerHTML=xmlhttp.responseText;
    $("tr").fadeIn();
　　}
</script>
</head>

<body>
  <?php require_once("oj-header.php");?>
	<div id="main">
	<div class="row">
	<div class="col-md-5">
        <div id="tagsList">
        <span><a onclick="problemajax('水题')">水题</a></span>
        <span><a onclick="problemajax('动态规划')">动态规划</a></span>
        <span><a onclick="problemajax('搜索')">搜索</a></span>
        <span><a onclick="problemajax('字符串')">字符串</a></span>
        <span><a onclick="problemajax('数学')">数学</a></span>
        <span><a onclick="problemajax('平衡树')">平衡树</a></span>
        <span><a onclick="problemajax('线段树')">线段树</a></span>
        <span><a onclick="problemajax('主席树')">主席树</a></span>
  	<span><a onclick="problemajax('数据结构')">数据结构</a></span>
        <span><a onclick="problemajax('字典树')">字典树</a></span>
        <span><a onclick="problemajax('AC自动机')">AC自动机</a></span>
        <span><a onclick="problemajax('后缀')">后缀三姐妹</a></span>
        <span><a onclick="problemajax('图论')">图论</a></span>
        <span><a onclick="problemajax('最短路')">最短路</a></span>
        <span><a onclick="problemajax('网络流')">网络流</a></span>
        <span><a onclick="problemajax('连通分量')">连通分量</a></span>
        <span><a onclick="problemajax('并查集')">并查集</a></span>
        <span><a onclick="problemajax('贪心')">贪心</a></span>
        <span><a onclick="problemajax('博弈论')">博弈论</a></span>
        <span><a onclick="problemajax('乱搞')">乱搞</a></span>
        <span><a onclick="problemajax('计算几何')">计算几何</a></span>
        <span><a onclick="problemajax('模拟')">模拟</a></span>
        <span><a onclick="problemajax('高精度')">高精度</a></span>
        <span><a onclick="problemajax('分治')">分治</a></span>
        <span><a onclick="problemajax('OI')">历年OI</a></span>
        <span><a onclick="problemajax('CTSC')">CTSC</a></span>
        </div></div><div class="col-md-7">
	<table class="table table-striped table-hover table-condensed"><thead><th colspan=6 id="top">#</th></thead><tbody id="tableajax"></tbody></table></div></div>
<script>;(function(){
var radius = 140;
var dtr = Math.PI/180;
var d=300;
var mcList = [];
var active = false;
var lasta = 1;
var lastb = 1;
var distr = true;
var tspeed=6;
var size=250;

var mouseX=0;
var mouseY=0;

var howElliptical=1;

var aA=null;
var oDiv=null;

window.onload=function ()
{
    var i=0;
    var oTag=null;

    oDiv=document.getElementById('tagsList');

    aA=oDiv.getElementsByTagName('a');

    for(i=0;i<aA.length;i++)
    {
        oTag={};

        oTag.offsetWidth=aA[i].offsetWidth;
        oTag.offsetHeight=aA[i].offsetHeight;

        mcList.push(oTag);
    }

    sineCosine( 0,0,0 );

    positionAll();

    oDiv.onmouseover=function ()
    {
        active=true;
    };

    oDiv.onmouseout=function ()
    {
        active=false;
    };

    oDiv.onmousemove=function (ev)
    {
        var oEvent=window.event || ev;

        mouseX=oEvent.clientX-(oDiv.offsetLeft+oDiv.offsetWidth/2);
        mouseY=oEvent.clientY-(oDiv.offsetTop+oDiv.offsetHeight/2);

        mouseX/=5;
        mouseY/=5;
    };

    




setInterval(update, 30);
};

function update()
{
    var a;
    var b;

    if(active)
    {
        a = (-Math.min( Math.max( -mouseY, -size ), size ) / radius ) * tspeed;
        b = (Math.min( Math.max( -mouseX, -size ), size ) / radius ) * tspeed;
    }
    else
    {
        a = lasta * 0.98;
        b = lastb * 0.98;
    }

    lasta=a;
    lastb=b;

    if(Math.abs(a)<=0.01 && Math.abs(b)<=0.01)
    {
        return;
    }

    var c=0;
    sineCosine(a,b,c);
    for(var j=0;j<mcList.length;j++)
    {
        var rx1=mcList[j].cx;
        var ry1=mcList[j].cy*ca+mcList[j].cz*(-sa);
        var rz1=mcList[j].cy*sa+mcList[j].cz*ca;

        var rx2=rx1*cb+rz1*sb;
        var ry2=ry1;
        var rz2=rx1*(-sb)+rz1*cb;

        var rx3=rx2*cc+ry2*(-sc);
        var ry3=rx2*sc+ry2*cc;
        var rz3=rz2;

        mcList[j].cx=rx3;
        mcList[j].cy=ry3;
        mcList[j].cz=rz3;

        per=d/(d+rz3);

        mcList[j].x=(howElliptical*rx3*per)-(howElliptical*2);
        mcList[j].y=ry3*per;
        mcList[j].scale=per;
        mcList[j].alpha=per;

        mcList[j].alpha=(mcList[j].alpha-0.6)*(10/6);
    }

    doPosition();
    depthSort();
}

function depthSort()
{
    var i=0;
    var aTmp=[];

    for(i=0;i<aA.length;i++)
    {
        aTmp.push(aA[i]);
    }

    aTmp.sort
    (
        function (vItem1, vItem2)
        {
            if(vItem1.cz>vItem2.cz)
            {
                return -1;
            }
            else if(vItem1.cz<vItem2.cz)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
    );

    for(i=0;i<aTmp.length;i++)
    {
        aTmp[i].style.zIndex=i;
    }
}

function positionAll()
{
    var phi=0;
    var theta=0;
    var max=mcList.length;
    var i=0;

    var aTmp=[];
    var oFragment=document.createDocumentFragment();

    for(i=0;i<aA.length;i++)
    {
        aTmp.push(aA[i]);
    }

    aTmp.sort
    (
        function ()
        {
            return Math.random()<0.5?1:-1;
        }
    );

    for(i=0;i<aTmp.length;i++)
    {
        oFragment.appendChild(aTmp[i]);
    }

    oDiv.appendChild(oFragment);

    for( var i=1; i<max+1; i++){
        if( distr )
        {
            phi = Math.acos(-1+(2*i-1)/max);
            theta = Math.sqrt(max*Math.PI)*phi;
        }
        else
        {
            phi = Math.random()*(Math.PI);
            theta = Math.random()*(2*Math.PI);
        }
        mcList[i-1].cx = radius * Math.cos(theta)*Math.sin(phi);
        mcList[i-1].cy = radius * Math.sin(theta)*Math.sin(phi);
        mcList[i-1].cz = radius * Math.cos(phi);

        aA[i-1].style.left=mcList[i-1].cx+oDiv.offsetWidth/2-mcList[i-1].offsetWidth/2+'px';
        aA[i-1].style.top=mcList[i-1].cy+oDiv.offsetHeight/2-mcList[i-1].offsetHeight/2+'px';
    }
}

function doPosition()
{
    var l=oDiv.offsetWidth/2;
    var t=oDiv.offsetHeight/2;
    for(var i=0;i<mcList.length;i++)
    {
        aA[i].style.left=mcList[i].cx+l-mcList[i].offsetWidth/2+'px';
        aA[i].style.top=mcList[i].cy+t-mcList[i].offsetHeight/2+'px';

        aA[i].style.fontSize=Math.ceil(12*mcList[i].scale/2)+8+'px';

        aA[i].style.filter="alpha(opacity="+100*mcList[i].alpha+")";
        aA[i].style.opacity=mcList[i].alpha;
    }
}

function sineCosine( a, b, c)
{
    sa = Math.sin(a * dtr);
    ca = Math.cos(a * dtr);
    sb = Math.sin(b * dtr);
    cb = Math.cos(b * dtr);
    sc = Math.sin(c * dtr);
    cc = Math.cos(c * dtr);
}


})();
</script>
<div id=foot>
	<?php require_once("oj-footer.php");?></div>
</div> <!--end main-->
</body>
</html>

