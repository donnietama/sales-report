<template>
    <div class="table-responsive bg-white px-4 py-4">
        <table class="table table-sm table-striped table-bordered">
            <thead class="text-capitalize bg-dark table text-white">
                <th class="text-center">#</th>
                <th>store</th>
                <th>date</th>
                <th>additional topping</th>
                <th>quantity</th>
            </thead>
            <tbody>
                <tr v-for="(data, index) in api.data" :key="data.id">
                    <td class="text-center">{{ index + 1 }}</td>
                    <td>{{ data.user.name }}</td>
                    <td>{{ data.date }}</td>
                    <td>{{ data.product.product_name }}</td>
                    <td>{{ data.quantity }} pcs</td>
                </tr>
            </tbody>
        </table>
        <div class="float-right">
            <pagination :data="api" :limit="2" @pagination-change-page="getAPI"></pagination>
        </div>
    </div>
</template>
<script>
import Event from '../../event.js'

export default {
    data() {
        return {
            api: {},
            apiData: {}
        }
    },
    mounted() {
        this.getAPI()
    },
    methods: {
        getAPI(page = 1) {
            axios.get('/additional?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_additional', (apiData) => {
                apiData.forEach(data => {
                    this.api.data.unshift(data)
                });
            })
        }
    }
}
</script>
