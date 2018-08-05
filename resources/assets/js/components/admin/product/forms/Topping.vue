<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize bg-white px-4 pt-4 mb-2">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3>Add Toppings</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>Product name</label>
                <select class="form-control text-capitalize" v-model="product_id">
                    <option value="" disabled hidden>select product</option>
                    <option v-for="product in toppings"
                            :key="product.id"
                            :value="product.id">
                        
                        {{ product.product_name }} {{ product.product_size }}
                    </option>
                </select>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <label>Topping</label>
                <div class="form-group" v-for="(input, index) in inputs"
                                                :key="input.index">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="input.topping_name" placeholder="Topping name">
                        <input type="number" class="form-control" v-model="input.quantity" placeholder="Quantity">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger text-capitalize" @click="removeTopping(index)">remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group float-right pt-4">
                    <button type="button" class="btn btn-success text-capitalize" @click="addTopping()">add topping</button>
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
import Event from '../../../../event.js'
import swal from 'sweetalert'

export default {
    data() {
        return {
            date: '',
            product_id: '',
            inputs: [{
                topping_name: '',
                quantity: ''
            }],
            toppings: [],
            apis: {},
        }
    },
    mounted(){
        this.getProductList()
    },
    methods: {
        getProductList() {
            axios.get('/resources/products/all')
            .then(res => {
                this.toppings = res.data
                this.addQuantityToProduct(this.toppings)
            })
        },
        addTopping() {
            this.inputs.push({
                topping_name: '',
                quantity: ''
            })
        },
        removeTopping(index) {
            this.inputs.splice(index, 1)
        },
        addQuantityToProduct(toppings) {
            toppings.forEach((toppings) => {
                toppings.quantity = ''
            });
        },
        submitReport() {
            swal({
                icon: 'warning',
                title: 'Pastikan data sudah benar!',
                text: 'Data yang telah masuk kedalam database tidak dapat dihapus / diperbaiki. Harap cek sekali lagi.',
                button: {
                    text: "Ya, data sudah benar",
                    closeModal: false,
                }
            })
            .then(() => {
                axios.post('/topping', this.$data)
                .then(res => {
                    this.apis = res.data
                    Event.$emit('added_topping', this.apis)
                    
                    swal({
                        title: 'Berhasil!',
                        text: 'Data telah terkirim.',
                        icon: 'success',
                        button: {
                            text: 'OK',
                            closeModal: true
                        }
                    })
                })
                .catch(err => {
                    swal({
                        title: 'Gagal!',
                        text: 'Hmm... Sepertinya ada yang salah dengan data yang dimasukkan, coba cek kembali.',
                        icon: 'error',
                        button: {
                            text: 'Baik, saya cek kembali',
                            closeModal: true
                        }
                    })
                })
            })
        }
    }
}
</script>
