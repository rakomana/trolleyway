import Vue from 'vue'
import VueRouter from 'vue-router'
import Search from './components/Search'
import Register from './components/RegisterShop'
import Example from './components/ExampleComponent'
import Message from './components/Message'

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path: '/search', component: Search},
        {path: '/message', component: Message},
        {path: '/register-shop', component: Register},
        {path: '/example-component', component: Example}
    ],
    mode: 'history'
})