<?php
  include './partials/_header.php';
?>

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
                <div class="row" id="resulthead">
                    <div class="col-md-8 col-md-offset-2 ">
                        <div><p id="locationresult"></p></div>
                        <div><p id="weeksum"></p></div>
                    </div>
                </div>
                <div class="gimmespace">
                    <div class="row">
                    	<div class="col-md-2 nopad">
                    		<div class="heads"><p>Summary</p></div>
                            <div class="gimmespace">
                            	<div><p class="hoversum" id="yessum">Yesterday</p></div>
                            	<div><p class="hoversum" id="currentsum">Today</p></div>
                            </div>
                    	</div>
                    	<div class="col-md-2 nopad">
                    		<div class="heads"><p>Data</p></div>
                            <div class="gimmespace">
                            	<div><p class="hovertest" id="temp">Temperature</p></div>
                            	<div><p class="hovertest" id="app">Feels Like</p></div>
                            	<div><p class="hovertest" id="lo">Low </p><p class="hovertest" id="hi"> High</p></div>
                            	<div><p class="hovertest" id="precip">Precipitation</p></div>
                            	<div><p class="hovertest" id="humid">Humidity</p></div>
                            	<div><p class="hovertest" id="wind">Wind Speed</p></div>
                            </div>
                    	</div>
                    	<div class="col-md-3 nopad" id="lefter">
                            <canvas id="icon1" width="128" height="128"></canvas>
                    		<div><p id="sumresult"></p></div>
                    	</div>
                    	<div class="col-md-5">
                    		<div class="ct-chart ct-bobsin"></div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
  include './partials/_footer.php';
?>