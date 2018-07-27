<template>
    <div class="table-responsive bg-white px-4 py-4">
        <table class="table table-sm table-striped table-bordered">
            <thead class="text-capitalize bg-dark text-white">
                <th class="text-center">#</th>
                <th>store</th>
                <th>date</th>
                <th>gross</th>
                <th>nett</th>
                <th>voucher</th>
                <th>cash</th>
                <th>card</th>
                <th>ticket</th>
            </thead>
            <tbody>
                <tr v-for="(data, index) in api.data" :key="data.index">
                    <td class="text-center">{{ index + 1 }}</td>
                    <td>{{ data.user.name }}</td>
                    <td>{{ data.date }}</td>
                    <td>Rp.{{ data.gross }}</td>
                    <td>Rp.{{ data.nett }}</td>
                    <td>Rp.{{ data.voucher }}</td>
                    <td>Rp.{{ data.cash }}</td>
                    <td>Rp.{{ data.card }}</td>
                    <td>Rp.{{ data.ticket }}</td>
                </tr>
            </tbody>
        </table>
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
            axios.get('/api/reports?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_summaries', (apiData) => {
                this.api.data.unshift(apiData)
            })
        }
    }
}
</script>
