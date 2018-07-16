<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize bg-white px-4 py-4 mb-2">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>tanggal</label>
                <input type="date" class="form-control" v-model="date" placeholder="dd/mm/yyyy">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>green tea jasmine total</label>
                <input type="number" class="form-control" v-model="green_tea_jasmine" placeholder="0 Batch">
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>black tea total</label>
                <input type="number" class="form-control" v-model="black_tea" placeholder="0 Batch">
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>quan yin total</label>
                <input type="number" class="form-control" v-model="quan_yin" placeholder="0 Batch">
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>matcha total</label>
                <input type="number" class="form-control" v-model="matcha" placeholder="0 Batch">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>royal milk tea total</label>
                <input type="number" class="form-control" v-model="royal" placeholder="0 Batch">
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>coffee total</label>
                <input type="number" class="form-control" v-model="coffee" placeholder="0 Batch">
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>choco total</label>
                <input type="number" class="form-control" v-model="choco" placeholder="0 Batch">
            </div>
            <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <label>cheese total</label>
                <input type="number" class="form-control" v-model="cheese" placeholder="0 Batch">
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
            green_tea_jasmine: '',
            black_tea: '',
            quan_yin: '',
            matcha: '',
            royal: '',
            coffee: '',
            choco: '',
            cheese: '',
            apis: {}
        }
    },
    methods: {
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
                axios.post('/home/batch', {
                    date: this.date,
                    green_tea_jasmine: this.green_tea_jasmine,
                    black_tea: this.black_tea,
                    quan_yin: this.quan_yin,
                    matcha: this.matcha,
                    royal: this.royal,
                    coffee: this.coffee,
                    choco: this.choco,
                    cheese: this.cheese
                })
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
                this.date = '',
                this.green_tea_jasmine = '',
                this.black_tea = '',
                this.quan_yin = '',
                this.matcha = '',
                this.royal = '',
                this.coffee = '',
                this.choco = '',
                this.cheese = ''
            })
        }
    }
}
</script>
