<template>
    <form method="post" @submit.prevent="submitReport" class="text-capitalize bg-white px-4 py-4 mb-5">
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
                    <button class="btn btn-danger">Submit</button>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
import Event from '../../event.js'

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
            axios.post('/home/summaries', {
                date: this.date,
                gross: this.gross,
                nett: this.nett,
                voucher: this.voucher,
                cash: this.cash,
                card: this.card,
                ticket: this.ticket
            })
            .then(res => {
                console.log(res)
                this.apis = res.data
                Event.$emit('added_summaries', this.apis)
            })
            .catch(err => {
                console.log(err)
            })
            this.date = '',
            this.gross = '',
            this.nett = '',
            this.voucher = '',
            this.cash = '',
            this.card = '',
            this.ticket = ''
        }
    }
}
</script>
