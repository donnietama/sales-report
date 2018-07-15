
require('./bootstrap')

window.Vue = require('vue')

Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('summary-table', require('./components/tables/SummaryTable.vue'))
Vue.component('summary-form', require('./components/forms/SummaryForm.vue'))

Vue.component('pagination', require('laravel-vue-pagination'))

const app = new Vue({
    el: '#app'
})
