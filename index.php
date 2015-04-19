<?php
include './partials/_header.php';
?>

<div class="parallax">
    <div id="group1" class="parallax__group">
        <div class="row parallax__layer parallax__layer--base">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 
                col-md-offset-2 col-lg-8 col-lg-offset-2 title" id="forms">
                <form action="findWeather.php" method="POST">
                <h1>                    
                    <label for="location" id="labels">Relative Weather</label><br/>
                </h1>
                    <input type="text" placeholder="Search for any location" name="location" class="form-control" id="location" autofocus/>

                    <button type="submit" class="btn btn-default mainbutt">Get Weather<span class="fa fa-arrow-right"></span></button>
                    <p id="switcharoo">
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
                                <div><p class="hovertest" id="temp">Temperature (˚C)</p></div>
                                <div><p class="hovertest" id="app">Feels Like (˚C)</p></div>
                                <div><p class="hovertest" id="lo">Low (˚C)</p></div>
                                <div><p class="hovertest" id="hi">High (˚C)</p></div>
                                <div><p class="hovertest" id="precip">Precipitation Chance (%)</p></div>
                                <div><p class="hovertest" id="humid">Humidity (%)</p></div>
                                <div><p class="hovertest" id="wind">Wind Speed (mph)</p></div>
                            </div>
                        </div>
                        <div class="col-md-3 nopad" id="lefter">
                            <canvas id="icon1" width="128" height="128"></canvas>
                            <div><p id="sumresult"></p></div>
                        </div>
                        <div class="col-md-5" id="chartpath">
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
