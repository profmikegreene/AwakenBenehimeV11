jQuery(document).ready(function($){
	if ( $('.rsImg').length ){
		if($(window).width() < 720) {
			$('.rsImg').each(function() {
				$(this).attr('href', $(this).data('image-mobile'));
			});
		}
		else if($(window).width() < 852) {
			$('.rsImg').each(function() {
				$(this).attr('href', $(this).data('image-tablet'));
			});
		}
		else if($(window).width() < 1367) {
			$('.rsImg').each(function() {
				$(this).attr('href', $(this).data('image-large'));
			});
		}
		else if($(window).width() >= 1367) {
			$('.rsImg').each(function() {
				$(this).attr('href', $(this).data('image-full'));
			});
		}
	}
});