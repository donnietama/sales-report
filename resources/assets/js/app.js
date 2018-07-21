
require('./bootstrap')

window.Vue = require('vue')

Vue.component('example-component', require('./components/ExampleComponent.vue'))

Vue.component('summary-table', require('./components/tables/SummaryTable.vue'))
Vue.component('summary-form', require('./components/forms/SummaryForm.vue'))

Vue.component('batch-table', require('./components/tables/BatchTable.vue'))
Vue.component('batch-form', require('./components/forms/BatchForm.vue'))

Vue.component('product-sold-table', require('./components/tables/ProductSoldTable.vue'))
Vue.component('product-sold-form', require('./components/forms/ProductSoldForm.vue'))

Vue.component('waste-table', require('./components/tables/WasteTable.vue'))
Vue.component('waste-form', require('./components/forms/WasteForm.vue'))

Vue.component('pagination', require('laravel-vue-pagination'))

const app = new Vue({
    el: '#app'
})
