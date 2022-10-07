$(document).ready(function() {
	
	$('#submit').click(function () {		

		var name = $('input[name=name]');
		var email = $('input[name=email]');
		var website = $('input[name=website]');
		var comment = $('textarea[name=comment]');


		if (name.val()=='') {
			name.addClass('hightlight');
			return false;
		} else name.removeClass('hightlight');
		
		if (email.val()=='') {
			email.addClass('hightlight');
			return false;
		} else email.removeClass('hightlight');
		
		if (comment.val()=='') {
			comment.addClass('hightlight');
			return false;
		} else comment.removeClass('hightlight');
		
		var data = 'name=' + name.val() + '&email=' + email.val() + '&website='
		+ website.val() + '&comment='  + encodeURIComponent(comment.val());

		$('.text').attr('disabled','true');
		
		$('.loading').show();

		$.ajax({
			url: "process.php",	

			type: "GET",
	
			data: data,		
			
			cache: false,
			
			success: function (html) {				

				if (html==1) {					

					$('.form').fadeOut('slow');					
					
					$('.done').fadeIn('slow');
					
				} else alert('Sorry, unexpected error. Please try again later.');				
			}		
		});
		
		return false;
	});	
});	
