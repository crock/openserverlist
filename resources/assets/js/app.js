import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

Vue.component('server', require('../components/Server.vue'))
Vue.component('server-info', require('../components/ServerInfo.vue'))

var app = new Vue({
  el: '#app',
  data: {
	  servers: new Array(),
	  error: false
  },
  ready: function () {
		// GET /someUrl
		this.$http.get('/server/stats').then(response => {

			// get body data
			this.servers = response.body;

		}, response => {
			// error callback
			this.error = False
		});
   },
})