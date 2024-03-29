import { createApp } from 'vue';
import {router, pinia} from './router';
import vsettings from 'laravue-ui-components/src/index.js';
import LaravueSettings from '../../laravue-settings';


import PageHeader from './components/ui/page-header';
import axios from 'axios';

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.defaults.baseURL = 'api';

let exceptRoutesName = [
  'login',
  'register',
  'home',
  // 'root',
  'forgot-password',
  'reset-password',
  '404'
]

axios.interceptors.response.use(function (response) {
  return response
}, function (error) {
  let except = exceptRoutesName.findIndex((element) => {
    return element == router.currentRoute.name;
  }) == -1;

  if (error.response.status === 401 && except) {
    // store.commit('session/logout');
    // localStorage.token = undefined;
    router.push('/login')
  }
  return Promise.reject(error)
})
/////////////////////////////////////////////////////////////////////////////////////////////////////////
// import { createPinia } from 'pinia'
// const pinia = createPinia()


/////////////////////////////////////////////////////////////////////////////////////////////////////////

const app = createApp({});

app.use(pinia)
app.use(router);
app.use(vsettings, LaravueSettings);

app.component('page-header', PageHeader);

app.mount('#app');
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
