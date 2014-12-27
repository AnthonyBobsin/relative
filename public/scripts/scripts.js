$(function() {
	/*$('form').submit(function(event) {
		event.preventDefault();
		var location = {
			'latitude' : $('#latitude').val(),
			'longitude' : $('#longitude').val()
		};
		$.ajax({
			type : 'POST',
			url: 'findWeather.php',
			data: location,
			dataType: 'json',
			encode: true
		}).done(function(data) {
			$('#forms').append("<p>" + data + "</p>");
		});
	});*/

	$('form').submit(function(event) {
		var location = {
			'latitude' : $('#latitude').val(),
			'longitude' : $('#longitude').val()
		};
		$('#switcharoo').empty().append("Please wait...");
		$.ajax({
			type: 'POST',
			url: 'findWeather.php',
			data: location,
			dataType: 'json',
			encode: true
		}).done(function(data) {
			$('#switcharoo').empty().append("<p>" + data + "</p>");
			/*if (!data.success) {
				$('#switcharoo').empty().append("Error occured.");
			}
			else {
				$('#switcharoo').empty().append("<p>" + data + "</p>");
			}*/
		});
		event.preventDefault();
	});
});