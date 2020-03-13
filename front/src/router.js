import Vue from 'vue'
import Router from 'vue-router'
import mixins from './mixins';
import VueCookies from 'vue-cookies';
import LoginModule from './components/login.vue';

import NavigationModule from './components/navigation.vue';
import DashboardModule from './components/dashboard.vue';
import FormModule from './components/formReader.vue';
import LogoutModule from './components/logout.vue';


Vue.use(Router)

const router =  new Router({
    routes: [
        {
            path: '/',
            name: 'root',
            redirect : '/dashboard',
            component: NavigationModule,
            children : [
                {
                    path : '/dashboard',
                    name : 'dashboard',
                    component: DashboardModule,
                },
                {
                    path : '/logout',
                    component : LogoutModule
                },
            ]
        },
        {
            path : '/form',
            name : 'form',
            component : FormModule
        },
        {
            path: '/login',
            name: 'login',
            component: LoginModule
        },
    ]
})
// router.beforeEach((to, from, next) => {
//     console.log(to);
//     let cookie = VueCookies.get( mixins.data().cookieKey );

//     if(cookie == null && to.name == 'login'){
//         router.push('/login');
//     }else if(cookie == null && to.name == 'form'){
//         router.push('/form');
//     }else if(cookie != null && to.name == 'login'){
//         router.push('/');
//     }else{
//         next();
//     }
// });

export default router;
