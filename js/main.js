$(document).ready(function(){
$('.owl-carousel').owlCarousel();
});
			var h_hght = 40;
			
			var h_mrg = 0;
			
			$(function() {

				var elem = $('#top_nav');
				var top = $(this).scrollTop();

				if (top > h_hght) {
					elem.css('top', h_mrg);
				}

				$(window).scroll(function() {
					top = $(this).scrollTop();

					if (top + h_mrg < h_hght) {
						elem.css('top', (h_hght - top));
					} else {
						elem.css('top', h_mrg);
					}
				});

			});
			<!--Preloader-->
$(window).on('load', function () {
		var $preloader = $('#p_prldr'),
			$svg_anm   = $preloader.find('.svg_anm');
			$svg_anm.fadeOut();
			$preloader.delay(500).fadeOut('slow');
		});
(function($) {
	"use strict"
	// On Scroll
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();
		// Fixed nav
		wScroll > 1 ? $('#top_nav').addClass('bg-dark') : $('top_nav').removeClass('bg-dark');
		});
})(jQuery);
