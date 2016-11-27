$(document).ready(function() {
	// Disables Votifier input fields if user does not enable Votifier.
	$("#votifier").on("click", function() {
		var i = 0;
		var v = true;
		$('#add-server fieldset').prop('disabled', function(i, v) { return !v; });
	});
	
	$(".navtoggle").on("click", function() {
		collapsible("collapsible");
	});
	
	$(".navsearch").on("click", function(e) 
	{
		// Toggle search
		$("#search").slideToggle(500, function()
		{
			// Focus on the search bar
			// When animation is complete
			$(".searchbar").focus();	
		});
	});
	
	$(".navitem:last-of-type .navlink").on("click", function(e) 
	{
		// Toggle search
		$("#search").slideToggle(500, function()
		{
			// Focus on the search bar
			// When animation is complete
			$(".searchbar").focus();	
		});
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