import { useStore } from './store/main'
import * as VueRouter from 'vue-router';
import { createPinia } from 'pinia'

import About from './components/pages/about';
import Home from './components/pages/home';
import Login from './components/pages/login';
import Profile from './components/users/edit';

import axios from 'axios';

const routes = [
  { path: '/', component: Home, name: 'Home' },
  { path: '/about', component: About },
  { path: '/login', component: Login, name: 'Login' },
  { path: '/profile', component: Profile, name: 'Profile' },
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

  if (!store.isAuthenticated) {
    if (to.name === 'Login'){
      next();
    } else {

      let response = await axios.get('check-auth');
      if (response.status === 200) {
        store.$patch({
          'isAuthenticated': true
        });

        if (to.name === 'Login') {
          next({ name: 'Home', replace: true })
        }
      } else {
        next({ name: 'Login' })
      }

      next();
    }
  }
  next();

  // if (!store.isAuthenticated && to.name !== 'Login') {
  //   next({name: 'Login'})
  // } else {

  //   let response = await axios.get('check-auth');
  //   if (response.status === 200) {
  //     store.$patch({
  //       'isAuthenticated': true
  //     });

  //     if (to.name === 'Login') {
  //       next({ name: 'Home', replace: true })
  //     }
  //   }
  // }

  // next();
});

export {router, pinia};

