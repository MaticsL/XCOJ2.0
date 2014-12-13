<script src="jquery-1.9.1.min.js"></script>
<script src="snow.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<script>
    $(function(){
        $.fn.snow({ 
            minSize: 5,        //雪花的最小尺寸
            maxSize: 50,     //雪花的最大尺寸
            newOn: 500        //雪花出现的频率 这个数值越小雪花越多
        });
    });
</script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">XCOJ</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
                <li class='<?php if ($url==$OJ_BBS.".php") echo "active";?>'><a href="bbs.php">
                <i class="glyphicon glyphicon-comment"></i><?php echo $MSG_BBS?></a></li>
                <li class='<?php if ($url=="problemset.php") echo "active";?>'><a href="problemset.php">
                <i class="glyphicon glyphicon-question-sign"></i><?php echo $MSG_PROBLEMS?></a></li>

                <li class='<?php if ($url=="status.php") echo " active";?>'><a href="status.php">
                <i class="glyphicon glyphicon-check"></i><?php echo $MSG_STATUS?></a></li>

                <li class='<?php if ($url=="ranklist.php") echo " active";?>'><a href="ranklist.php">
                <i class="glyphicon glyphicon-signal"></i><?php echo $MSG_RANKLIST?></a></li>

                <li class='<?php if ($url=="contest.php") echo " active";?>'><a href="contest.php">
                <i class="glyphicon glyphicon-fire"></i><?php echo checkcontest($MSG_CONTEST)?></a></li>

                <li class='<?php if ($url=="recent-contest.php") echo "active";?>'><a href="recent-contest.php">
                <i class="glyphicon glyphicon-share"></i><?php echo "$MSG_RECENT_CONTEST"?></a></li>

                <li class='<?php if ($url==(isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php")) echo "active";?>'><a href="<?php echo isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php"?>">
                <i class="glyphicon glyphicon-info-sign"></i><?php echo "$MSG_FAQ"?></a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
                <div id=profile >
                       <script src="include/profile.php?<?php echo rand();?>" ></script>
                </div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="image/title1.jpg" alt="First slide">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="image/title2.jpg" alt="Second slide">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
