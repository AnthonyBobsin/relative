$(function() {

	$('form').submit(function(event) {
		var location = {
			'location' : $('#location').val()
		};
		var loader_img = '<img src="./public/stylesheets/images/ajax-loader.gif"/>';
		$('#switcharoo').empty().append(loader_img);
		$('#go-down').css("display", "none");
		$('#group2').css("display", "none");
		$('#group3').css("display", "none");
		$.ajax({
			type: 'POST',
			url: 'findWeather.php',
			data: location,
			dataType: 'json',
			encode: true
		}).done(function(data) {
			$('#go-down').css("display", "inline");
			$('#go-down').empty().append(loader_img);
			var icon = data['current']['icon'];
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
			var icon_img = icon_img_map[icon] || icon_img_map['default'];

			var img = new Image();
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

			$('#switcharoo').empty().append('<span class="result-left">Yesterday:</span><span class="result-right">'
													+ data['yesterday']['temperature'] + 
												'</span></br><span class="result-left">Current:</span><span class="result-right">'
													+ data['current']['temperature'] + 
												'</span></br>');
			$('#topheadY').empty().append('<p>Yesterday</p>');
			$('#tophead').empty().append('<p>Currently</p>');
			$('#summary').empty().append('<p>' + data['summary'] + '</p>');
			$('#daySummaryY').empty().append('<p>' + data['yesterday']['summary'] + '</p>');
			$('#daySummary').empty().append('<p>' + data['current']['summary'] + '</p>');
			$('#temperatureY').empty().append('<p>' + data['yesterday']['temperature'] + '</p>');
			$('#temperature').empty().append('<p>' + data['current']['temperature'] + '</p>');
			$('#apparentY').empty().append('<p>' + data['yesterday']['apparent'] + '</p>');
			$('#apparent').empty().append('<p>' + data['current']['apparent'] + '</p>');
			$('#highLowY').empty().append('<p>' + data['yesterday']['min_temp'] + ' / ' + data['yesterday']['max_temp'] + '</p>');
			$('#highLow').empty().append('<p>' + data['current']['min_temp'] + ' / ' + data['current']['max_temp'] + '</p>');
			$('#precipitationY').empty().append('<p>' + (data['yesterday']['precipitation_chance']) + '%</p>');
			$('#precipitation').empty().append('<p>' + (data['current']['precipitation_chance']) + '%</p>');
			$('#humidityY').empty().append('<p>' + (data['yesterday']['humidity']) + '%</p>');
			$('#humidity').empty().append('<p>' + (data['current']['humidity']) + '%</p>');
			$('#windSpeedY').empty().append('<p>' + data['yesterday']['windSpeed'] + 'mph</p>');
			$('#windSpeed').empty().append('<p>' + data['current']['windSpeed'] + 'mph</p>');


		});
		event.preventDefault();
	});

	$('#go-down').on('click', function(event) {
		event.preventDefault();
		$('#group3').ScrollTo();
	});

	$('#go-down').css("display", "none");
	$('#group2').css("display", "none");
	$('#group3').css("display", "none");

});