<template>
    <div class="table-responsive text-center bg-white px-4 py-4">
        <table class="table table-sm table-striped table-bordered">
            <thead class="text-capitalize">
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
                <tr v-for="data in api" :key="data.index">
                    <td>{{ data.store_id }}</td>
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
    </div>
</template>
<script>
import Event from '../../event.js'

export default {
    data() {
        return {
            api: [],
            apiData: {}
        }
    },
    mounted() {
        axios.get('/home/summaries').then(res => {
            this.api = res.data
        })
        Event.$on('added_summaries', (apiData) => {
            this.api.unshift(apiData)
        })
    }
}
</script>
