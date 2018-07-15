<template>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="text-center text-capitalize">
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
                    <td>{{ data.gross }}</td>
                    <td>{{ data.nett }}</td>
                    <td>{{ data.voucher }}</td>
                    <td>{{ data.cash }}</td>
                    <td>{{ data.card }}</td>
                    <td>{{ data.ticket }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            api: []
        }
    },
    mounted() {
        this.getAPI()
    },
    methods: {
        getAPI() {
            axios.get('/home/summaries').then(res => {
                this.api = res.data
            })
        }
    }
}
</script>
