$(document).ready(function() {
	// Disables Votifier input fields if user does not enable Votifier.
	$("#votifier").on("click", function() {
		var i = 0;
		var v = true;
		$('#add-server fieldset').prop('disabled', function(i, v) { return !v; });
	});
});