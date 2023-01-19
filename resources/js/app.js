
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.fixOrientation = require('fix-orientation');
// window.SimpleMDE = require('simplemde');
window.Quill = require('quill');

require('./bootstrap');
require('../../node_modules/owl.carousel/dist/owl.carousel.min');

window.flatpickr = require("flatpickr");


require('./navbar');
require('./script');
require('./filter');
require('./markdown');
require('./form-admin-konsultasi');


// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
