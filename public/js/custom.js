$(document).ready(function() {
	var clipboard = new Clipboard('.rm');
	
		clipboard.on('success', function(e) {
	    console.info('Action:', e.action);
	    console.info('Text:', e.text);
	    console.info('Trigger:', e.trigger);
	
	    e.clearSelection();
	});
	
	clipboard.on('error', function(e) {
	    console.error('Action:', e.action);
	    console.error('Trigger:', e.trigger);
	});
	
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