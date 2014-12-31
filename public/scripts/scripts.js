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
													+ data['yesterday'] + 
												'</span></br><span class="result-left">Current:</span><span class="result-right">'
													+ data['current'] + 
												'</span></br>');
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