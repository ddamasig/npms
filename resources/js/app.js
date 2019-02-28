// require('./bootstrap');

window.Vue = require('vue');

Vue.component('DropDownButton', require('./components/DropDownButton.vue').default);
Vue.component('DropDownItem', require('./components/DropDownItem.vue').default);
Vue.component('Alert', require('./components/Alert.vue').default);
Vue.component('PrivilegePanel', require('./components/PrivilegePanel.vue').default);

const app = new Vue({
    el: '#wrapper'
});
