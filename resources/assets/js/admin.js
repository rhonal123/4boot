
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

///import BootstrapVue from 'bootstrap-vue'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

import App from './admin/App.vue'
import VueRouter from 'vue-router';
import { routes } from './admin/router/routes';

import VuejsDialog from "vuejs-dialog";


import bPagination from 'bootstrap-vue/es/components/pagination/pagination'
import bCol from 'bootstrap-vue/es/components/layout/col'
import bTable from 'bootstrap-vue/es/components/table/table'
import bTooltip from 'bootstrap-vue/es/components/tooltip/tooltip'
import bPopover from 'bootstrap-vue/es/components/popover/popover'


Vue.use(VuejsDialog)
Vue.use(VueRouter);
//Vue.use(BootstrapVue);
Vue.component('b-pagination', bPagination);
Vue.component('b-col', bCol);
Vue.component('b-table', bTable);
Vue.component('b-tooltlip', bTooltip);

Vue.component('b-popover', bPopover);

//Vue.directive('b-tooltlip-v', bTooltipDirective);


const router = new VueRouter({
    routes,
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    mode: 'hash'
});

const app = new Vue({
  el: '#app',
  router,
  render: h => h(App),
  components: { App }
}); 


