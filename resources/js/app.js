require('./bootstrap');
require('alpinejs');
import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import { InertiaProgress } from '@inertiajs/progress'
import Vuex from 'vuex'
import store from './Api/store'

store.dispatch('obtenerUsuario')
Vue.use(Vuex)
Vue.use(Vuetify)
Vue.use(plugin)
const opts = {}
InertiaProgress.init()
const el = document.getElementById('app')

new Vue({
    store,
    vuetify: new Vuetify(opts),
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
