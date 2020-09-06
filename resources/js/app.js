
require('./bootstrap');

import Vue from 'vue';
import { Form, HasError, AlertError } from 'vform' // Vue V Form Start
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError) 
window.Form = Form; // Vue V Form End

Vue.component('registration', require('./components/RegistrationComponent.vue').default);


const app = new Vue({
    el: '#app',
});
