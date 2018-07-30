<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize px-4 py-4 mb-2">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>tanggal</label>
                <input type="date" class="form-control" v-model="date" placeholder="dd/mm/yyyy">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3"
             v-for="(product, index) in batch" :key="product.index">
                <label>{{ product.product_name }}</label>
                <input type="number" class="form-control" v-model="batch[index].quantity" placeholder="0 Batch">
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
import Event from '../../../../event.js'
import swal from 'sweetalert'

export default {
    data() {
        return {
            date: '',
            batch: [],
            apis: {},
        }
    },
    mounted(){
        axios.get('/products')
        .then(res => {
            this.batch = res.data
            this.addQuantityToProduct(this.batch)
        })
    },
    methods: {
        addQuantityToProduct(products) {
            products.forEach((batch) => {
                batch.quantity = ''
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
                axios.post('/batch', this.$data)
                .then(res => {
                    this.apis = res.data
                    Event.$emit('added_batch', this.apis)
                    
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
