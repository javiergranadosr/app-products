require('./bootstrap');

window.Vue = require('vue');


Vue.component('form-component', require('./components/FormProductComponent.vue').default);
Vue.component('products-component', require('./components/ProductsComponent.vue').default);
Vue.component('main-component', require('./components/MainComponent.vue').default);
const app = new Vue({
    el: '#app',
});
