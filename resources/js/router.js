import Vue from 'vue';
import Router from 'vue-router';
import Welcome from './views/HelloWorld.vue';
 
Vue.use(Router)
 
const routes = [
    {
        path: '/',
        name: 'HelloWorld',
        component:HelloWorld
    }
];
 
const router = new Router({
    routes : routes
});
 
export default router;