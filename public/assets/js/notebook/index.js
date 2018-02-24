$(document).ready(function() {
	$('.md').each(function() {
		$(this).after(marked($(this).text()));
	});
	if ($('#message').text() !== '') {
		Materialize.toast($('#message').text(), 4000, 'teal');
	}
});