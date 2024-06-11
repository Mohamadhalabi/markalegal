import Vue from "vue";
import MaterialKit from "./plugins/material-kit";
import { createInertiaApp } from "@inertiajs/inertia-vue";
import AdvancedLaravelVuePaginate from 'advanced-laravel-vue-paginate';
import 'advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css'
Vue.config.productionTip = false;

createInertiaApp({
    resolve: (name) => require(`./views/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin);
        Vue.use(MaterialKit);
        Vue.use(AdvancedLaravelVuePaginate);
        new Vue({
            render: (h) => h(App, props),
        }).$mount(el);
    },
});
