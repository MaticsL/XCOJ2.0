<script src="jquery-1.9.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
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
                <li class="dropdown<?php if($url=="problemset.php")echo " active"?>"><a href="problemset.php" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-question-sign"></i><?php echo $MSG_PROBLEMS?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="problemset.php"><?php echo $MSG_VIEWALL?></a></li>
			<li><a href="vpage.php?vpid=1000"><?php echo $MSG_VJUDGE_PROBLEMS?></a></li>
			<li><a href="category.php"><?php echo $MSG_PROBLEM_CATEGORY?></a></li>
		</ul>
		</li>

                <li class='<?php if ($url=="status.php") echo " active";?>'><a href="status.php">
                <i class="glyphicon glyphicon-check"></i><?php echo $MSG_STATUS?></a></li>

                <li class='<?php if ($url=="ranklist.php") echo " active";?>'><a href="ranklist.php">
                <i class="glyphicon glyphicon-signal"></i><?php echo $MSG_RANKLIST?></a></li>
                <li class='dropdown<?php if($url=="contest.php")echo " active"?>'><a href="contest.php" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-fire"></i><?php echo checkcontest($MSG_CONTEST)?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="contest.php"><?php echo $MSG_LOCAL_CONTEST?></a></li>		
			<li><a href="recent-contest.php"><?php echo $MSG_RECENT_CONTEST?></a></li>
			<li><a><?php echo $MSG_DIY_CONTEST?></a></li>
		</ul>
		</li>
                <li class='<?php if ($url==(isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php")) echo "active";?>'><a href="<?php echo isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php"?>">
                <i class="glyphicon glyphicon-info-sign"></i><?php echo "$MSG_FAQ"?></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <script src="include/profile.php?<?php echo rand();?>" ></script>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br>
