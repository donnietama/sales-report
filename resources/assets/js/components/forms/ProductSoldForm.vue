<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize bg-white px-4 py-4 mb-2">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>tanggal</label>
                <input type="date" class="form-control" v-model="date" placeholder="dd/mm/yyyy">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3"
             v-for="(product, index) in sold" :key="product.index">
                <label>{{ product.product_name }}</label>
                <input type="number" class="form-control" v-model="sold[index].quantity" placeholder="0 sold">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group float-right">
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
import Event from '../../event.js'
import swal from 'sweetalert'

export default {
    data() {
        return {
            date: '',
            sold: [],
            apis: {},
        }
    },
    mounted(){
        axios.get('/home/products')
        .then(res => {
            this.sold = res.data
            this.addQuantityToProduct(this.sold)
        })
    },
    methods: {
        addQuantityToProduct(products) {
            products.forEach((sold) => {
                sold.quantity = ''
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
                axios.post('/home/sold', this.$data)
                .then(res => {
                    this.apis = res.data
                    Event.$emit('added_sold', this.apis)
                    
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
