import Vue from 'vue';
import routes from './router/index';
import vSelect from "vue-select";
require('./bootstrap');
import { HasError, AlertError } from 'vform'

import CxltToastr from 'cxlt-vue2-toastr'
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'
var toastrConfigs = {
    position: 'top right',
    showDuration: 1000,
    timeOut: 5000,
    closeButton: true,
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
}
Vue.use(CxltToastr, toastrConfigs)

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('app-header', require('./components/Header.vue').default);
Vue.component("v-select", vSelect);

const app = new Vue({
    el: '#app',
    router: routes,
});
