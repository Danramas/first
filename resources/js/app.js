import Auth from './auth.js';

window.auth = new Auth();

require('./bootstrap');

window.Vue = require('vue');


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Router from "./router";
const app = new Vue({
    el: '#app',
    router: Router,
});

Vue.use(Router);
window.Event = new Vue;

Vue.component(
    'home-component',
    require('./components/HomeComponent.vue').default);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


