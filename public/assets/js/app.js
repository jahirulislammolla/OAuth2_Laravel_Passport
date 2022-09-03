require('./bootstrap');
window.Vue = require('vue').default;

// import vuex

import { mapGetters, mapActions, mapMutations } from 'vuex';
window.mapGetters = mapGetters;
window.mapMutations = mapMutations;
window.mapActions = mapActions;


// pagination
Vue.component('pagination', require('laravel-vue-pagination'));