
require('./bootstrap')

window.Vue = require('vue')

Vue.component('example-component', require('./components/ExampleComponent.vue'))

/**
 * Imported components.
 * -------------------------------------
 * This components would be used to import required dependencies.
 */

/**
 * User components.
 * -------------------------------------
 * This components would be used for Users access.
 */

Vue.component('summary-table', require('./components/user/reporting/tables/SummaryTable.vue'))
Vue.component('summary-form', require('./components/user/reporting/forms/SummaryForm.vue'))

Vue.component('batch-table', require('./components/user/reporting/tables/BatchTable.vue'))
Vue.component('batch-form', require('./components/user/reporting/forms/BatchForm.vue'))

Vue.component('product-sold-table', require('./components/user/reporting/tables/ProductSoldTable.vue'))
Vue.component('product-sold-form', require('./components/user/reporting/forms/ProductSoldForm.vue'))

Vue.component('waste-table', require('./components/user/reporting/tables/WasteTable.vue'))
Vue.component('waste-form', require('./components/user/reporting/forms/WasteForm.vue'))

Vue.component('additional-table', require('./components/user/reporting/tables/AdditionalTable.vue'))
Vue.component('additional-form', require('./components/user/reporting/forms/AdditionalForm.vue'))


/**
 * Administrator components.
 * -------------------------------------
 * This components would be used for Administrators access.
 */
Vue.component('summaries', require('./components/admin/tables/reporting/Summaries.vue'))
Vue.component('batches', require('./components/admin/tables/reporting/Batches.vue'))
Vue.component('productsolds', require('./components/admin/tables/reporting/ProductSolds.vue'))
Vue.component('wastes', require('./components/admin/tables/reporting/Wastes.vue'))
Vue.component('additionals', require('./components/admin/tables/reporting/Additionals.vue'))
Vue.component('ingredient-form', require('./components/admin/product/forms/Ingredient.vue'))
Vue.component('ingredient-table', require('./components/admin/product/tables/Ingredient.vue'))
Vue.component('product-search', require('./components/admin/product/forms/Product.vue'))
Vue.component('product-list', require('./components/admin/grids/ProductGrids.vue'))
// Vue.component('product-table', require('./components/admin/product/tables/Product.vue'))

/**
 * Extensions components.
 * -------------------------------------
 * This components would be used for both Users & Admins access.
 */ 
Vue.component('pagination', require('laravel-vue-pagination'))

const app = new Vue({
    el: '#app'
})
