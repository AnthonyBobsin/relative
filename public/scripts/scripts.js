$(function() {
	$('form').submit(function(event) {
		var location = {
			'location' : $('#location').val()
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
		});
		event.preventDefault();
	});
});