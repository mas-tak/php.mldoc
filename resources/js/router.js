import Vue from "vue";
import VueRouter from "vue-router";
 
Vue.use(VueRouter);
 
import index from "./components/docs/list.vue";
var routes = []
const files = require.context('./components', true, /layout\.vue$/i)
files.keys().map(key => {
    var key_ = key.replace(/^\.\//, '').toLowerCase()
    routes.push({
        path: '/' + key_.replace('-','/'),
        name: 'layout-' + key_,
        component: files(key).default
    })
})

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/docs",
            name: "list",
            component: list
        }
    ]
});
 
export default router;