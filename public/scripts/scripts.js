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
			$('#switcharoo').empty().append('<span class="result-left">Yesterday:</span><span class="result-right">'
													+ data['yesterday'] + 
												'</span></br><span class="result-left">Current:</span><span class="result-right">'
													+ data['current'] + 
												'</span>');
		});
		event.preventDefault();
	});
});