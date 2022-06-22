import { useStore } from './store/main'
import * as VueRouter from 'vue-router';
import { createPinia } from 'pinia'

import About from './components/pages/about';
import Home from './components/pages/home';
import Login from './components/pages/login';
import axios from 'axios';

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/login', component: Login, name: 'Login' },
  // { path: '/about', component: About },
]

const router = VueRouter.createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: VueRouter.createWebHistory(),
  routes, // short for `routes: routes`
});

const pinia = createPinia()

router.beforeEach(async (to, from, next) => {
  const store =  useStore(pinia);
  // ...
  // explicitly return false to cancel the navigation
  debugger;
  if (!store.isAuthenticated && to.name !== 'Login') {
    next({name: 'Login'})
  } else {
    let response = await axios.get('check-auth');
    if (response.status === 200) {
      store.$patch({
        'isAuthenticated': true
      });
    }
  }

  next();
});

export {router, pinia};

