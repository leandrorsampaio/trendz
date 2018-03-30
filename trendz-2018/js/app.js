function smoothScroll() {
	// Select all links with hashes
	$('a[href*="#"]')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
		// On-page links
		if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
			&&
			location.hostname == this.hostname
		) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 800, function() {
					// Callback after animation
					// Must change focus!
					var $target = $(target);
					$target.focus();
					if ($target.is(":focus")) { // Checking if the target was focused
						return false;
					} else {
						$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					};
				});
			}
		}
	});
}





function menuMobile() {

	// Menu Mobile on click
	$('.menu-mobile-button').on('click', function () {
		$('.menu').toggleClass('active');
	});

}




function toggleAd() {

	$('.togglead-wrapper-inner-bar-btn').on('click', function () {
		$('.togglead-wrapper-inner-ad').slideToggle();
		$('.togglead-wrapper-up').toggleClass('active');
		$('.togglead-wrapper-down').toggleClass('active');

	});

}

function mobileMenu() {

	$('.header-mobile-top-btn').on('click', function () {
		$('.header-mobile-menu').slideToggle().toggleClass('active');
		$('.header-mobile-top-btn-opened').toggleClass('active');
		$('.header-mobile-top-btn-closed').toggleClass('active');

	});

}







// Run on load
$(window).on('load', function () {
	smoothScroll();
	menuMobile();
	toggleAd();
	mobileMenu();
});

// Run on resize
$(window).on('resize', function () {
});
