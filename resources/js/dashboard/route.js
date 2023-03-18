import DashboardApp from './DashboardApp.vue';
import VueRouter from 'vue-router';

window.axios = require('axios');

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: DashboardApp,
        },
    ]
});