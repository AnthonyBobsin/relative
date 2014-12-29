<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="./public/stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" href="./public/stylesheets/output.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
	<title>Relative</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Relative</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="parallax">
    <div id="group1" class="parallax__group">
      <div class="parallax__layer parallax__layer--base">
        <div class="title" id="forms">
	        <form action="findWeather.php" method="POST">
	        	<p>
	        		<label for="location"> Location</label> <br />
	        		<input type="text" name="location" class="form-control" id="location" />
	        	</p>

	        	<p id="switcharoo">
	        		<button type="submit" class="btn">Get Weather<span class="fa fa-arrow-right"></span></button>
	        	</p>
	        </form>
        </div>
      </div>
    </div>
    <div id="group2" class="parallax__group">
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
      <div class="parallax__layer parallax__layer--back">
        <div class="title"></div>
      </div>
    </div>
    <div id="group3" class="parallax__group">
      <!--<div class="parallax__layer parallax__layer--fore">
        <div class="title">Foreground Layer</div>
      </div>-->
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
    </div>
    <div id="group4" class="parallax__group">
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
      <div class="parallax__layer parallax__layer--back">
        <div class="title"></div>
      </div>
      <!--<div class="parallax__layer parallax__layer--deep">
        <div class="title">Deep Background Layer</div>
      </div>-->
    </div>
    <div id="group5" class="parallax__group">
      <!--<div class="parallax__layer parallax__layer--fore">
        <div class="title">Foreground Layer</div>
      </div>-->
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
    </div>
    <div id="group6" class="parallax__group">
      <div class="parallax__layer parallax__layer--back">
        <div class="title"></div>
      </div>
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
    </div>
    <div id="group7" class="parallax__group">
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
    </div>
  </div>
	<script src="./public/scripts/bootstrap.min.js"></script> 
	<script src="./public/scripts/scripts.js"></script>
</body>
</html>