import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

//Vue.component('server', require('../components/Server.vue'))

var app = new Vue({
  el: '#app',
  data: {
	  servers: new Array(),
	  error: false
	  //patt: /\/server\/[0-9]+/
  },
  created: function () {
	// GET /someUrl
	this.$http.get('/server/stats/active').then(response => {

		// get body data
		this.servers = response.body;
		var count = this.servers.length;
		/*for (let element of this.servers) {
			MinecraftAPI.getServerStatus(element.sip, {
				port: element.sport
			}, function (err, status) {
				if (err) {
					document.querySelector('.minPlayers').innerHTML = '???';
					document.querySelector('.maxPlayers').innerHTML = '???';
					console.log(err);
				}
				document.querySelector('.ranknum').className += status.online ? 'online' : 'offline';
				document.querySelector('.minPlayers').innerHTML = status.players['now'];
				document.querySelector('.maxPlayers').innerHTML = status.players['max'];
			});
		};*/

	}, response => {
		// error callback
		this.error = true
	});
   }
})