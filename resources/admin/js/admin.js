require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('class-student', require('./components/class_information/ClassStudent.vue').default);

const app = new Vue({
    el: '#app',
});

