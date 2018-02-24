$(document).ready(function() {
	$('.carousel.carousel-slider').carousel({fullWidth: true});
	if ($('#message').text() !== '') {
		Materialize.toast($('#message').text(), 4000, 'teal');
	}
});