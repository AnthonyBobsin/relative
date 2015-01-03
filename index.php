<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="./public/stylesheets/bootstrap.min.css" />
    <script src="./bower_components/chartist/dist/chartist.min.js"></script>
    <link rel="stylesheet" href="./public/stylesheets/output.css" />
    <script src="./public/scripts/jquery.min.js"></script><!-- Switch to google for production -->
    <script src="./public/scripts/scripts.js"></script>
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
				    <label for="location" id="labels">Location</label><br/>
				    <input type="text" name="location" class="form-control" id="location"/>
				</p>

				<p id="switcharoo">
				    <button type="submit" class="btn btn-default">Get Weather<span class="fa fa-arrow-right"></span></button>
				</p>
				</form>
				<div id="go-down">
				</div>
			</div>
		 	
		</div>
    </div>
    <div id="group2" class="parallax__group">
      <div class="parallax__layer parallax__layer--back" id="imageswap">
        <div class="title"></div>
      </div>
      <div class="parallax__layer parallax__layer--base">
        <div class="title"></div>
      </div>
    </div>
    <div id="group3" class="parallax__group">
      <div class="parallax__layer parallax__layer--base">
      	<div id="go-up">
      		<button type="button" class="btn btn-default btn-lg">	
				<span class="glyphicon glyphicon-chevron-up"></span>
			</button>
		</div>
        <div class="title container" id="details">
        <div class="row">
        	<div class="col-md-2 nopad">
        		<div class="heads"><p>Summary</p></div>
        		<div><p class="hoversum" id="weeksum">This Week</p></div>
        		<div><p class="hoversum" id="yessum">Yesterday</p></div>
        		<div><p class="hoversum" id="currentsum">Today</p></div>
        	</div>
        	<div class="col-md-2 nopad">
        		<div class="heads"><p>Data</p></div>
        		<div><p class="hovertest" id="temp">Temperature</p></div>
        		<div><p class="hovertest" id="app">Feels Like</p></div>
        		<div><p class="hovertest" id="lo">Low </p><p class="hovertest" id="hi"> High</p></div>
        		<div><p class="hovertest" id="precip">Precipitation</p></div>
        		<div><p class="hovertest" id="humid">Humidity</p></div>
        		<div><p class="hovertest" id="wind">Wind Speed</p></div>
        	</div>
        	<div class="col-md-4 nopad" id="lefter">
        		<div><p id="sumresult"></p></div>
        	</div>
        	<div class="col-md-8">
        		<div class="ct-chart ct-perfect-fourth"></div>
        	</div>
        </div>
        </div>
      </div>
    </div>

  </div>
	<script src="./public/scripts/bootstrap.min.js"></script> 
	<script src="./public/scripts/jquery-scrollto/lib/jquery-scrollto.js"></script>
</body>
</html>