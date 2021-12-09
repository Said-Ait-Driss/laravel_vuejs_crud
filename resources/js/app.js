import Vue from 'vue';
require('./bootstrap');
import "./bootstrap";
import router from './router';
import Main from "./Main.vue";

window.Vue = require('vue');

new Vue({
    el:"#app",
    router,
    render:h=>h(Main)
});