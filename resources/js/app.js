/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

var VueScrollTo = require('vue-scrollto');
var Paginate = require('vuejs-paginate');
Vue.component('paginate', Paginate);

var moment = require('vue-moment');
Vue.use(moment);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('project-component', require('./components/ProjectComponent.vue').default);
Vue.component('project-list', require('./components/ProjectList.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('project-item', require('./components/ProjectItem.vue').default);

Vue.component('pagination-component', require('./components/PaginationComponent.vue').default);
Vue.component('calender-component', require('./components/CalenderComponent.vue').default);

Vue.component('counter-component', require('./components/CounterComponent.vue').default);
Vue.component('counter-short', require('./components/CounterShort.vue').default);

Vue.component('message-component', require('./components/MessageComponent.vue').default);
Vue.component('direct-message', require('./components/DirectMessage.vue').default);

Vue.component('select-type', require('./components/SelectType.vue').default);

// image preview
Vue.component('image-preview', require('./components/ImagePreview.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
