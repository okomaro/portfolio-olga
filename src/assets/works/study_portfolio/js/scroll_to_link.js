// JavaScript Document - scrolling to links

// Scroll links in projects section

$(document).ready(function(){
	$( ".scroll-link").on('click',function (e) {
	    e.preventDefault();
			$('.nav a').removeClass('current');
			$(this).addClass('current');
				
	   	var target = this.hash,
	   	$target = $(target);
			
			$target
    	.velocity("scroll", { duration: 500, offset: -110, easing: "linear" })
    	.velocity({ opacity: 1 });
			
	});
});