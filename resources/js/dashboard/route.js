import DashboardApp from './DashboardApp.vue';
import VueRouter from 'vue-router';

import Tools from './component/Tools.vue';

window.axios = require('axios');

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: DashboardApp,
        },
        {
            path: '/tools',
            name: 'tools',
            component: Tools
        },
        // {
        // 	path: '/edit/:tradeId',
        // 	name: 'dashboard.edit',
        // 	component: Edit
        // },
       
    ]
});