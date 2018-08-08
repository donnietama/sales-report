<template>
    <div class="table-responsive py-4">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover bg-white">
                    <thead class="text-capitalize">
                        <th class="text-center">#</th>
                        <th>product name</th>
                        <th>topping name</th>
                        <th>quantity</th>
                    </thead>
                    <tbody>
                        <tr v-for="(data, index) in api.data" :key="data.id">
                            <td class="text-center">{{ index + 1 + "." }}</td>
                            <td class="text-capitalize">{{ data.product.product_name }} {{ data.product.product_size }}</td>
                            <td class="text-capitalize">{{ data.topping_name }}</td>
                            <td>{{ data.quantity }} ml</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="float-right">
                <pagination :data="api" :limit="2" @pagination-change-page="getAPI"></pagination>
            </div>
        </div>
    </div>
</template>
<script>
import Event from '../../../../event.js'

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
            axios.get('/topping/paginated?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_topping', (apiData) => {
                apiData.forEach(data => {
                    this.api.data.unshift(data)
                });
            })
        }
    }
}
</script>
