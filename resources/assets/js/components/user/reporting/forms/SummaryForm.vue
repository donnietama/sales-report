<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize px-4 py-4 mb-2">
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>tanggal</label>
                <input type="date" class="form-control" v-model="date" placeholder="dd/mm/yyyy">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>gross total</label>
                <input type="number" class="form-control" v-model="gross" placeholder="0 Rupiah">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>nett total</label>
                <input type="number" class="form-control" v-model="nett" placeholder="0 Rupiah">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>voucher total</label>
                <input type="number" class="form-control" v-model="voucher" placeholder="0 Rupiah">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>cash total</label>
                <input type="number" class="form-control" v-model="cash" placeholder="0 Rupiah">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>card total</label>
                <input type="number" class="form-control" v-model="card" placeholder="0 Rupiah">
            </div>
            <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>ticket total</label>
                <input type="number" class="form-control" v-model="ticket" placeholder="0 Rupiah">
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
            gross: '',
            nett: '',
            voucher: '',
            cash: '',
            card: '',
            ticket: '',
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
                axios.post('/summaries', {
                    date: this.date,
                    gross: this.gross,
                    nett: this.nett,
                    voucher: this.voucher,
                    cash: this.cash,
                    card: this.card,
                    ticket: this.ticket
                })
                .then(res => {
                    this.apis = res.data
                    Event.$emit('added_summaries', this.apis)
                    
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
                this.gross = '',
                this.nett = '',
                this.voucher = '',
                this.cash = '',
                this.card = '',
                this.ticket = ''
            })
        }
    }
}
</script>
