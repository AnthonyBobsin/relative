$(function() {

	$('form').submit(function(event) {
		var location = {
			'location' : $('#location').val()
		};
		var loader_img = '<img src="./public/stylesheets/images/ajax-loader.gif"/>';
		$('#switcharoo').empty().append(loader_img);
		$.ajax({
			type: 'POST',
			url: 'findWeather.php',
			data: location,
			dataType: 'json',
			encode: true
		}).done(function(data) {
			$('#switcharoo').empty().append('<span class="result-left">Yesterday:</span><span class="result-right">'
													+ data['yesterday']['temperature'] + 
												'</span></br><span class="result-left">Current:</span><span class="result-right">'
													+ data['current']['temperature'] + 
												'</span></br>');
			$('#summary').append('<p>' + data['summary'] + '</p>');
			$('#daySummaryY').append('<p>' + data['yesterday']['summary'] + '</p>');
			$('#daySummary').append('<p>' + data['current']['summary'] + '</p>');
			$('#temperatureY').append('<p>' + data['yesterday']['temperature'] + '</p>');
			$('#temperature').append('<p>' + data['current']['temperature'] + '</p>');
			$('#apparentY').append('<p>' + data['yesterday']['apparent'] + '</p>');
			$('#apparent').append('<p>' + data['current']['apparent'] + '</p>');
			$('#highLowY').append('<p>' + data['yesterday']['min_temp'] + ' / ' + data['yesterday']['max_temp'] + '</p>');
			$('#highLow').append('<p>' + data['current']['min_temp'] + ' / ' + data['current']['max_temp'] + '</p>');
			$('#precipitationY').append('<p>' + (data['yesterday']['precipitation_chance'] * 100) + '%</p>');
			$('#precipitation').append('<p>' + (data['current']['precipitation_chance'] * 100) + '%</p>');
			$('#humidityY').append('<p>' + (data['yesterday']['humidity'] * 100) + '%</p>');
			$('#humidity').append('<p>' + (data['current']['humidity'] * 100) + '%</p>');
			$('#windSpeedY').append('<p>' + data['yesterday']['windSpeed'] + '</p>');
			$('#windSpeed').append('<p>' + data['current']['windSpeed'] + '</p>');



			$('#go-down').css("display", "inline");
			/*  Add: Hide all other parallax groups
			 	If data['weather'] == weather
			 		show parallax with that weather picture
			 		load all additional specific data in that group
			 	end */
		});
		event.preventDefault();
	});

	$('#go-down').on('click', function(event) {
		event.preventDefault();
		$('#group3').ScrollTo();
	});

	$('#go-down').css("display", "none");
});