require('./bootstrap');

import Vue from 'vue';
import router from './router';
import Search from './components/Search'
import Register from './components/RegisterShop'
import ExampleComponent from './components/ExampleComponent'
import ChatMessage from './components/Message'
import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll)

const app = new Vue({
    el: '#app',
    components: {Search, Register, ExampleComponent, ChatMessage},
    router,
});