// assets/js/app.js
import Vue from 'vue';

import Home from './components/Home.vue'
import Menu from './components/Menu.vue'

/**
* Create a fresh Vue Application instance
*/
new Vue({
  el: '#app',
  components: {Home, Menu}
});