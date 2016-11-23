$(document).ready(function() {
	// Disables Votifier input fields if user does not enable Votifier.
	$("#votifier").on("click", function() {
		var i = 0;
		var v = true;
		$('#add-server fieldset').prop('disabled', function(i, v) { return !v; });
	});
});

function collapsible(zap) {
    if (document.getElementById) {
        var abra = document.getElementById(zap).style;
        if (abra.display == "block") {
            abra.display = "none";
        } else {
            abra.display = "block";
        }
        return false;
    } else {
        return true;
    }
}