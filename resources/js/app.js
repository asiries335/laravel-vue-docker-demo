require('./bootstrap');

window.Vue = require('vue');
import storeUserPosts from './storeUserPosts';

Vue.component('post-list-component', require('./components/Posts/ListComponent').default);
Vue.component('post-create-component', require('./components/Posts/CreateComponent').default);
Vue.component('post-edit-component', require('./components/Posts/EditComponent').default);
Vue.component('post-delete-component', require('./components/Posts/DeleteComponent').default);


const app = new Vue({
    el: '#app',
    data: {
        storeUserPosts
    }
});
