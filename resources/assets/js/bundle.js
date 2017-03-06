window.Clipboard = require('clipboard');

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
// Copyright (c) 2013 Pieroxy <pieroxy@pieroxy.net>
// This work is free. You can redistribute it and/or modify it
// under the terms of the WTFPL, Version 2
// For more information see LICENSE.txt or http://www.wtfpl.net/
//
// For more information, the home page:
// http://pieroxy.net/blog/pages/color-finder/index.html
//
// Detection of the most prominent color in an image
// version 1.1.1

function ColorFinder(colorFactorCallback) {
  this.callback = colorFactorCallback;
  this.getMostProminentColor = function(imgEl) {
    var rgb = null;
    if (!this.callback) this.callback = function() { return 1; };
    var data = this.getImageData(imgEl);
    rgb = this.getMostProminentRGBImpl(data, 6, rgb, this.callback);
    rgb = this.getMostProminentRGBImpl(data, 4, rgb, this.callback);
    rgb = this.getMostProminentRGBImpl(data, 2, rgb, this.callback);
    rgb = this.getMostProminentRGBImpl(data, 0, rgb, this.callback);
    return rgb;
  };

  this.getImageData = function(imgEl, degrade, rgbMatch, colorFactorCallback) {
    
    var rgb,
        canvas = document.createElement('canvas'),
        context = canvas.getContext && canvas.getContext('2d'),
        data, width, height, key,
        i = -4,
        db={},
        length,r,g,b,
        count = 0;
    
    if (!context) {
      return defaultRGB;
    }
    
    height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
    width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;
    
    context.drawImage(imgEl, 0, 0);
    
    try {
      data = context.getImageData(0, 0, width, height);
    } catch(e) {
      /* security error, img on diff domain */
      return null;
    }

    length = data.data.length;
    
    var factor = Math.max(1,Math.round(length/5000));
    var result = {};
    
    while ( (i += 4*factor) < length ) {
      if (data.data[i+3]>32) {
        key = (data.data[i]>>degrade) + "," + (data.data[i+1]>>degrade) + "," + (data.data[i+2]>>degrade);
        if (!result.hasOwnProperty(key)) {
          rgb = {r:data.data[i], g:data.data[i+1], b:data.data[i+2],count:1};
          rgb.weight = this.callback(rgb.r, rgb.g, rgb.b);
          if (rgb.weight<=0) rgb.weight = 1e-10;
          result[key]=rgb;
        } else {
          rgb=result[key];
          rgb.count++;
        }
      }
    }

    return result;

  };
  
  this.getMostProminentRGBImpl = function(pixels, degrade, rgbMatch, colorFactorCallback) {
    
    var rgb = {r:0,g:0,b:0,count:0,d:degrade},
        db={},
        pixel,pixelKey,pixelGroupKey,
        length,r,g,b,
        count = 0;
    
    
    for (pixelKey in pixels) {
      pixel = pixels[pixelKey];
      totalWeight = pixel.weight * pixel.count;
      ++count;
      if (this.doesRgbMatch(rgbMatch, pixel.r, pixel.g, pixel.b)) {
        pixelGroupKey = (pixel.r>>degrade) + "," + (pixel.g>>degrade) + "," + (pixel.b>>degrade);
        if (db.hasOwnProperty(pixelGroupKey))
          db[pixelGroupKey]+=totalWeight;
        else
          db[pixelGroupKey]=totalWeight;
      }
    }
    
    for (i in db) {
      data = i.split(",");
      r = data[0];
      g = data[1];
      b = data[2];
      count = db[i];
      
      if (count>rgb.count) {
        rgb.count = count;
        data = i.split(",");
        rgb.r = r;
        rgb.g = g;
        rgb.b = b;
      }
    }
    
    return rgb;
    
  };

  this.doesRgbMatch = function(rgb,r,g,b) {
    if (rgb==null) return true;
    r = r >> rgb.d;
    g = g >> rgb.d;
    b = b >> rgb.d;
    return rgb.r == r && rgb.g == g && rgb.b == b;
  }

}

window.$ = window.jQuery = require('jquery');
var bootstrap = require('bootstrap-sass');

// Disables Votifier input fields if user does not enable Votifier.
$("#votifier").on("click", function() {
    var i = 0;
    var v = true;
    $('#add-server fieldset').prop('disabled', function(i, v) { return !v; });
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
require('selectize');

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
import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

Vue.component('server', require('../components/Server.vue'))

var app = new Vue({
  el: '#app',
  data: {
	  servers: new Array(),
	  error: false,
	  patt: /\/server\/[0-9]+/
  },
  ready: function () {
	// GET /someUrl
	this.$http.get('/server/stats/active').then(response => {

		// get body data
		this.servers = response.body;

	}, response => {
		// error callback
		this.error = False
	});
		
   },
})
//# sourceMappingURL=bundle.js.map
