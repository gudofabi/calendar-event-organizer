require('./bootstrap');
import Vue from 'vue'
import axios from 'axios'
import router from './routes'
import { fabric } from 'fabric';

fabric.filterBackend = fabric.initFilterBackend();
fabric.Object.prototype.transparentCorners = false;
fabric.Object.prototype.objectCaching = false;

Vue.prototype.$http = axios;
Vue.prototype.$toastConfig = {
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
};

const app = new Vue({
    el: '#app',
    router
})