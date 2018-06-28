
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VModal from 'vue-js-modal';

Vue.component('face', require('./components/FaceComponent.vue'));
Vue.component('create-face', require('./components/CreateFaceComponent.vue'));


Vue.use(VModal);

const app = new Vue({
    el: '#app'
});

//app
require('./theme/theme');
require('./inits');
require('./toastrLoads');
