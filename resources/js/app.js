/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import App from './App.vue'
import CKEditor from 'ckeditor4-vue';

//import '/ai_recruit_solution/src/assets/tailwind.css' 


// 여기서 선언하게 되면 VIEW 에서 사용가능
Vue.component('hello-world', require('./components/HelloWorld.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


new Vue({
   el       :   '#app',
   render   :   h   =>  h(App)
});

Vue.config.productionTip    =   true;
Vue.prototype.$axios        =   axios;
Vue.use(VueRouter, CKEditor);


