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
            user: {},
            apis: {}
        }
    },
    mounted() {
        this.getUserInformation()
    },
    methods: {
        getUserInformation() {
            axios.get('/users')
            .then(response => {
                this.user = response.data
            })
        },
        submitReport() {
            swal({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                buttons: true,
                dangerMode: true,
            })
            .then((proceedSubmit) => {
                if (proceedSubmit) {
                    axios.post('/summaries', {
                        date: this.date,
                        gross: this.gross,
                        nett: this.nett,
                        voucher: this.voucher,
                        cash: this.cash,
                        card: this.card,
                        ticket: this.ticket,
                        user: this.user
                    })
                    .then(res => {
                        if (res.data === 'data exists') {
                            swal({
                                title: 'Check your data!',
                                text: 'The data you have inserted is already exist',
                                icon: 'info',
                                button: {
                                    closeModal: true
                                }
                            })
                        } else {
                            this.apis = res.data
                            Event.$emit('added_summaries', this.apis)
                            
                            swal({
                                title: 'Success!',
                                text: 'Your data has been saved into database!',
                                icon: 'success',
                                button: {
                                    closeModal: true
                                }
                            })
                        }
                    })
                    .catch(err => {
                        swal({
                            title: 'Uh, oh!',
                            text: 'Looks like we cannot process your request right now, please contact IT Support!',
                            icon: 'error',
                            button: {
                                closeModal: true
                            }
                        })
                    })
                }
            })
        }
    }
}
</script>
