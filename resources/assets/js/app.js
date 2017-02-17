window.$ = window.jQuery = require('jquery')
require('selectize');
var bootstrap = require('bootstrap-sass');

$( document ).ready(function() {
    if (document.getElementById("tabs")) {
	    $('#tags').selectize({
	        delimiter: ',',
	        persist: false,
	        valueField: 'tag',
	        labelField: 'tag',
	        searchField: 'tag',
	        options: tags,
	        create: function(input) {
	            return {
	                tag: input
	            }
	        }
	    });
    }
    
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
	
	// Ping Servers on Homepage
	var servers = document.getElementsByClassName("server");
	var ipAddresses = [];
	for (var i in servers.length) {
	    ipAddresses += document.getElementsByClassName("rm")[i].dataset.clipboardText;
	}
	for (var ip in ipAddresses.length) {
		var test = ip.split(":");
		console.log(test);	
	}
	
/*
	MinecraftAPI.getServerStatus('s.nerd.nu', {
	    port: 25565 
	  }, function (err, status) {
	    if (err) {
	      return document.querySelector('.server-status').innerHTML = 'Error loading status';
	    }
	
	    // you can change these to your own message!
	    document.querySelector('.server-online').innerHTML = status.online ? 'up' : 'down';
	});
	
*/
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