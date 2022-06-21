import { useStore } from './store/main'
import * as VueRouter from 'vue-router';
import { createPinia } from 'pinia'

import About from './components/pages/about';
import Home from './components/pages/home';
import Login from './components/pages/login';

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/login', component: Login },
  // { path: '/about', component: About },
]

const router = VueRouter.createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: VueRouter.createWebHistory(),
  routes, // short for `routes: routes`
});

const pinia = createPinia()
const store =  useStore(pinia);

// router.beforeEach((to, from) => {
//   // ...
//   // explicitly return false to cancel the navigation
//   if (!store.isAuthenticated) {
//     return '/login'
//   }
// });

export default router;

