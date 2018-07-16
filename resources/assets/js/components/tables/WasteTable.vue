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
                    <td>{{ data.green_tea_jasmine }} ml</td>
                    <td>{{ data.black_tea }} ml</td>
                    <td>{{ data.quan_yin }} ml</td>
                    <td>{{ data.matcha }} ml</td>
                    <td>{{ data.royal }} ml</td>
                    <td>{{ data.coffee }} ml</td>
                    <td>{{ data.choco }} ml</td>
                    <td>{{ data.cheese }} ml</td>
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
            axios.get('/home/waste?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_waste', (apiData) => {
                this.api.data.unshift(apiData)
            })
        }
    }
}
</script>
