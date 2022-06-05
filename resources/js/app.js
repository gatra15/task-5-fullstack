require('./bootstrap');

window.Vue = require('vue').default;
import router from './routes'

Vue.component('route-component', require('./components/Route.vue').default);

const app = new Vue({
    el: '#app',
    router
});
