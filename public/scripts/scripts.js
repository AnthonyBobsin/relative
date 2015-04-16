$(function() {

	var yesterday = 0;
	var current = 0;
	var currentData;
	var loader_img = '<img src="./public/stylesheets/images/ajax-loader.gif"/>';

	var skycons = new Skycons({"color": "#02A5D6"});

	//Gets called after API request to set results page
	init = function(data) {
		currentData = data;
		$('#go-down').css("display", "inline");
		$('#go-down').empty().append(loader_img);
		var icon = data['current']['icon'];
		//All the possible images to load depending on the weather
		var icon_img_map = {
			'clear-night': "./public/icons/clear-night.jpg",
			'partly-cloudy-day': "./public/icons/partly-cloudy-day.jpg",
			'partly-cloudy-night': "./public/icons/partly-cloudy-night.jpg",
			'cloudy': "./public/icons/cloudy.jpg",
			'rain': "./public/icons/rain.jpg",
			'sleet': "./public/icons/sleet.jpg",
			'snow': "./public/icons/snow.jpg",
			'wind': "./public/icons/wind.jpg",
			'fog': "./public/icons/fog.jpg",
			'clear-day': "./public/icons/clear-day.jpg" 
		};
		//if icon is not present then assign default image
		var icon_img = icon_img_map[icon] || icon_img_map['default'];

		var img = new Image();
		//Wait until the image loads to show image page, results page and scroll down button
		img.onload = function() {
			$('#group2').css("display", "block");
			$('#group3').css("display", "block");
			$('#go-down').empty().append('<button type="button" class="btn btn-default btn-lg">' + 
											'<span class="glyphicon glyphicon-chevron-down"></span>' +
											'</button>');
			$('#imageswap').css("background-image", 'url("' + icon_img + '")');
		}
		img.src = icon_img;
		if (img.complete) img.onload();

		yesterday = data['yesterday']['temperature'];
		current = data['current']['temperature'];

		reset_others('#temp');
		//Display current and yesterday temperature where 'Get Weather' button was
		$('#switcharoo').empty().append('<span class="result-left">Yesterday:</span><span class="result-right">'
												+ yesterday + 
											'˚C</span></br><span class="result-left">Current:</span><span class="result-right">'
												+ current + 
											'˚C</span></br>');
		if (yesterday === 'Format Error') {
			$('#go-down').empty().append('<p>Issue might be too many geocode requests.</p>');
		}

		$('#locationresult').empty().append(data['location']);
		$('#weeksum').empty().append(data['summary']);

		$('#sumresult').empty().append(data['current']['summary']);
		reset_sums('#currentsum');

		skycons.add('icon1', data['current']['icon']);
		skycons.play();

		$('#chartpath').empty().append('<div class="ct-chart ct-bobsin"></div>');
		init_table();

	}

	//Initiates graph on results page
	init_table = function() {
		var graphData = {
			labels: ['Yesterday', 'Currently'],
			series: [
			   	[yesterday, current]
			]
		};

		new Chartist.Bar('.ct-chart', graphData);
	}

	//Reset colours of all elements not current hovering
	reset_sums = function(exclude) {
		$('.hoversum').css("color", "#333333");
		$(exclude).css("color", "#02A5D6");
	}
	reset_others = function(exclude) {
		$('.hovertest').css("color", "#333333");
		$(exclude).css("color", "#02A5D6");
	}
	//Updates results page depending on what the user is hovering
	$('#yessum').hover(function() {
		$('#sumresult').empty().append(currentData['yesterday']['summary']);
		reset_sums('#yessum');
		skycons.set('icon1', data['current']['icon']);
		skycons.play();
	});
	$('#currentsum').hover(function() {
		$('#sumresult').empty().append(currentData['current']['summary']);
		reset_sums('#currentsum');
		skycons.set('icon1', data['current']['icon']);
		skycons.play();
	});
	$('#temp').hover(function() {
		yesterday = currentData['yesterday']['temperature'];
		current = currentData['current']['temperature'];
		init_table();
		reset_others('#temp');
	});
	$('#app').hover(function() {
		yesterday = currentData['yesterday']['apparent'];
		current = currentData['current']['apparent'];
		init_table();
		reset_others('#app');
	});
	$('#lo').hover(function() {
		yesterday = currentData['yesterday']['min_temp'];
		current = currentData['current']['min_temp'];
		init_table();
		reset_others('#lo');
	});
	$('#hi').hover(function() {
		yesterday = currentData['yesterday']['max_temp'];
		current = currentData['current']['max_temp'];
		init_table();
		reset_others('#hi');
	});
	$('#precip').hover(function() {
		yesterday = currentData['yesterday']['precipitation_chance'];
		current = currentData['current']['precipitation_chance'];
		init_table();
		reset_others('#precip');
	});
	$('#humid').hover(function() {
		yesterday = currentData['yesterday']['humidity'];
		current = currentData['current']['humidity'];
		init_table();
		reset_others('#humid');
	});
	$('#wind').hover(function() {
		yesterday = currentData['yesterday']['windSpeed'];
		current = currentData['current']['windSpeed'];
		init_table();
		reset_others('#wind');
	});

	//Gets called when main button is pressed
	$('form').submit(function(event) {	
		event.preventDefault();
		var location = {
			'location' : $('#location').val()
		};
		
		$('#switcharoo').empty().append(loader_img);
		$('#go-down').css("display", "none");
		$('#group2').css("display", "none");
		$('#group3').css("display", "none");
		//Ajax request to findWeather.php sending the location as input and calls init if successful
		$.ajax({
			type: 'GET',
			url: 'findWeather.php',
			data: location,
			dataType: 'json',
			encode: true
		}).done(function(data) {
			init(data);
		});
	});

	//Scroll up & down buttons
	$('#go-down').on('click', function(event) {
		event.preventDefault();
		$('#group3').ScrollTo();
	});
	$('#go-up').on('click', function(event) {
		event.preventDefault();
		$('#group1').ScrollTo();
	});

	$('#go-down').css("display", "none");
	$('#group2').css("display", "none");
	$('#group3').css("display", "none");


});