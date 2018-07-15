
require('./bootstrap')

window.Vue = require('vue')

Vue.component('example-component', require('./components/ExampleComponent.vue'))
Vue.component('summary-table', require('./components/tables/SummaryTable.vue'))

const app = new Vue({
    el: '#app'
})
