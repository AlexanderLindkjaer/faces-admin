
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VModal from 'vue-js-modal';
import Webcam from 'vue-web-cam/src/webcam'
import { Base64 } from 'js-base64';

Vue.component('face', require('./components/FaceComponent.vue'));
Vue.component('create-face', require('./components/CreateFaceComponent.vue'));
Vue.component('pic-rec', require('./components/PictureRecognitionComponent.vue'));
Vue.component('webcam', Webcam);


Vue.use(VModal);
Vue.use(Webcam);

const app = new Vue({
    el: '#app'
});

//app
require('./theme/theme');
require('./inits');
require('./toastrLoads');
