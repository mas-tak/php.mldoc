/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
//import router from "./router";
import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const files = require.context('./components', true, /\.vue$/i)
var routes = []
files.keys().map(file => {
    var parts = file.replace(/^\.\//, '').split('/').map((f) => {
        return ((/\.vue$/).test(f) ? f.split('.')[0] : f).toLowerCase()
    })
    if ((/layout$/).test(parts.slice(-1))) {
        // Eg. js/components/com1/layout.vue => { path: /com1, name: com1-layout }
        //     js/components/com1/sub_layout.vue => { path: /com1/sub, name: com1-sub-layout }
        routes.push({
            path: '/' + parts.join('/').replace(/[^a-zA-Z0-9]*layout$/, ''),
            name: parts.join('-'),
            component: files(file).default
        })
        console.log('regist layout : path = ' + routes.slice(-1).path + ' : name = ' + routes.slice(-1).name);
    } else {
        // Eg. js/components/com1/pats.vue => { name: com1-parts }
        Vue.component(parts.join('-'), files(file).default)
        console.log('regist component : ' + parts.join('-'));
    }
})

// const files = require.context('./components', true, /layout\.vue$/i)
// files.keys().map(key => {
//     var key_ = key.replace(/^\.\//, '').toLowerCase()
//     routes.push({
//         path: '/' + key_.replace('-','/'),
//         name: 'layout-' + key_,
//         component: files(key).default
//     })
// })

const router = new VueRouter({
    mode: "history",
    routes: routes
});
 
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router
});
