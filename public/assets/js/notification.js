$(document).ready(function() {
	if ($('#message').text() !== '') {
		Materialize.toast($('#message').text(), 4000, 'teal');
	}
});