<template>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-1" v-if="product_list.data.length === 0">
            <div class="card text-center py-5">
                <div class="card-body text-muted py-5 my-5">
                    <h1 class="display-5">Oops, we couldn't find any product here.</h1>
                    <p class="lead">Make sure you have created the product list, click here if you don't</p>
                    <a href="/admin/product/create" class="btn btn-primary">Add product</a>
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 px-1 py-2" v-else v-for="product in product_list.data" :key="product.id">
            <a :href="'/admin/product/' + product.slug" class="card">
                <img :src="'http://localhost:8000/' + product.preview_url" alt="card-image" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-capitalize text-center">{{ product.product_name }} <small class="text-muted">{{ product.product_size }}</small></h5>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <pagination :data="product_list" :limit="2" @pagination-change-page="getPage"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
.card {
    color: black;
    text-decoration: none !important;
    transition: all .2s ease-in-out;
}
.card:hover {
    color: black;
}
</style>


<script>
import Event from '../../../event.js'

export default {
    data() {
        return {
            product_list: {}
        }
    },
    mounted() {
        this.getPage()
    },
    methods: {
        getPage(page = 1) {
            axios.get('/resources/products?page=' + page).then(res => {
                this.product_list = res.data
            })
            Event.$on('added_product', (apiData) => {
                apiData.forEach(data => {
                    this.api.data.unshift(data)
                });
            })
        }
    }
}
</script>

