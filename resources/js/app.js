/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

import Vue from 'vue';

window.Vue = require('vue');

import VueGoogleCharts from 'vue-google-charts';
import Chart from 'chart.js';
import VueChartJs from 'vue-chartjs';

//Vue.use(VueGoogleCharts);

require('./bootstrap');

Vue.component('response-chart', require('./components/ResponseChart.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));


