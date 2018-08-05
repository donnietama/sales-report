<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize">
        <div class="row">
            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                
            </div>
            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ml-auto">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white">Cari</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
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
                ingredient_name: '',
                quantity: ''
            }],
            ingredients: [],
            apis: {},
        }
    },
    mounted(){
        axios.get('/ingredient')
        .then(res => {
            this.ingredients = res.data
            this.addQuantityToProduct(this.ingredients)
        })
    },
    methods: {
        addIngredient() {
            this.inputs.push({
                ingredient_name: '',
                quantity: ''
            })
        },
        removeIngredient(index) {
            this.inputs.splice(index, 1)
        },
        addQuantityToProduct(ingredients) {
            ingredients.forEach((ingredients) => {
                ingredients.quantity = ''
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
                axios.post('/ingredient', this.$data)
                .then(res => {
                    this.apis = res.data
                    Event.$emit('added_ingredient', this.apis)
                    
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
