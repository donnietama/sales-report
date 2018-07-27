
require('./bootstrap')

window.Vue = require('vue')

Vue.component('example-component', require('./components/ExampleComponent.vue'))

/**
 * User components.
 * -------------------------------------
 * This components would be used for Users access.
 */

Vue.component('summary-table', require('./components/tables/SummaryTable.vue'))
Vue.component('summary-form', require('./components/forms/SummaryForm.vue'))

Vue.component('batch-table', require('./components/tables/BatchTable.vue'))
Vue.component('batch-form', require('./components/forms/BatchForm.vue'))

Vue.component('product-sold-table', require('./components/tables/ProductSoldTable.vue'))
Vue.component('product-sold-form', require('./components/forms/ProductSoldForm.vue'))

Vue.component('waste-table', require('./components/tables/WasteTable.vue'))
Vue.component('waste-form', require('./components/forms/WasteForm.vue'))

Vue.component('additional-table', require('./components/tables/AdditionalTable.vue'))
Vue.component('additional-form', require('./components/forms/AdditionalForm.vue'))


/**
 * User components.
 * -------------------------------------
 * This components would be used for Users access.
 */
Vue.component('summaries', require('./components/admin/tables/reporting/Summaries.vue'))

/**
 * Extensions components.
 * -------------------------------------
 * This components would be used for both Users & Admins access.
 */
Vue.component('pagination', require('laravel-vue-pagination'))

const app = new Vue({
    el: '#app'
})
