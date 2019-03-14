// require('./bootstrap');

window.Vue = require('vue');

Vue.component('DropDownButton', require('./components/DropDownButton.vue').default);
Vue.component('DropDownItem', require('./components/DropDownItem.vue').default);
Vue.component('Alert', require('./components/Alert.vue').default);
Vue.component('PrivilegePanel', require('./components/PrivilegePanel.vue').default);
Vue.component('SelectSearch', require('./components/SelectSearch.vue').default);
Vue.component('ModuleListItem', require('./components/ModuleListItem.vue').default);
// Forms
Vue.component('ModuleForm', require('./components/ModuleForm.vue').default);

axios = require('axios');

const app = new Vue({
    el: '#wrapper'
});

// $('#myTab a[href="#tasks"]').tab('show')
$('#tasks-tab').click();