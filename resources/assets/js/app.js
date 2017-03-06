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