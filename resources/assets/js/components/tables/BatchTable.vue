<template>
    <div class="table-responsive bg-white px-4 py-4">
        <table class="table table-sm table-striped table-bordered">
            <thead class="text-capitalize bg-dark table text-white">
                <th>store</th>
                <th>date</th>
                <th>green tea</th>
                <th>black tea</th>
                <th>quan yin</th>
                <th>matcha</th>
                <th>royal</th>
                <th>coffee</th>
                <th>choco</th>
                <th>cheese</th>
            </thead>
            <tbody>
                <tr v-for="data in api.data" :key="data.index">
                    <td>{{ data.store_id }}</td>
                    <td>{{ data.created_at }}</td>
                    <td>{{ data.green_tea_jasmine }} batch</td>
                    <td>{{ data.black_tea }} batch</td>
                    <td>{{ data.quan_yin }} batch</td>
                    <td>{{ data.matcha }} batch</td>
                    <td>{{ data.royal }} batch</td>
                    <td>{{ data.coffee }} batch</td>
                    <td>{{ data.choco }} batch</td>
                    <td>{{ data.cheese }} batch</td>
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
            axios.get('/home/batch?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_batch', (apiData) => {
                this.api.data.unshift(apiData)
            })
        }
    }
}
</script>
