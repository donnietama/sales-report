<template>
    <div class="table-responsive px-4 py-4">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover bg-white">
                    <thead class="text-capitalize">
                        <th class="text-center">#</th>
                        <th>store</th>
                        <th>date</th>
                        <th>product name</th>
                        <th>quantity</th>
                    </thead>
                    <tbody>
                        <tr v-for="(data, index) in api.data" :key="data.index">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td>{{ data.user.name }}</td>
                            <td>{{ data.date }}</td>
                            <td>
                                {{ data.product.product_name }}
                                <small class="text-muted">{{ data.product.product_size }}</small>
                            </td>
                            <td>{{ data.quantity }} batch</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-right">
            <pagination :data="api" :limit="2" @pagination-change-page="getAPI"></pagination>
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
            axios.get('/sold?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_sold', (apiData) => {
                apiData.forEach(data => {
                    this.api.data.unshift(data)
                });
            })
        }
    }
}
</script>
