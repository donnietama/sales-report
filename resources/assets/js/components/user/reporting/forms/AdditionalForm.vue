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
             v-for="(topping, index) in additional" :key="topping.index">
                <label>
                    {{ topping.topping_name }}
                    <small class="text-muted">{{ topping.topping_size }}</small>
                </label>
                <input type="number" class="form-control" v-model="additional[index].quantity" placeholder="0 pcs">
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
            additional: [],
            apis: {},
        }
    },
    mounted(){
        axios.get('/topping')
        .then(res => {
            this.additional = res.data
            this.addQuantityToProduct(this.additional)
        })
    },
    methods: {
        addQuantityToProduct(toppings) {
            toppings.forEach((additional) => {
                additional.quantity = ''
            });
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
                    axios.post('/additional', this.$data)
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
                            Event.$emit('added_additional', this.apis)
                            
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
