import * as VueRouter from 'vue-router';

import About from './components/pages/about';
import Home from './components/pages/home';

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  // { path: '/about', component: About },
]

const router = VueRouter.createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: VueRouter.createWebHistory(),
  routes, // short for `routes: routes`
});

export default router;

