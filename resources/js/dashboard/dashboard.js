import router from './route';
import Vue from 'vue'
import VueRouter from 'vue-router';

import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';

Vue.use(Antd);

Vue.use(VueRouter)

new Vue({
    Antd,
    router,
}).$mount('#app');