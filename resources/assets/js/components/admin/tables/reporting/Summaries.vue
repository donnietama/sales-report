<template>
    <div class="table-responsive px-4 py-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3 class="text-capitalize">export data summaries</h3>
                <hr>
                <form method="post" @submit.prevent="getRequested">
                    <div class="row">
                        <div class="form-group col-md-2 pr-1">
                            <input type="date" class="form-control" v-model="exportData.start" placeholder="Start from">
                        </div>
                        <div class="form-group col-md-2 pl-1 pr-1">
                            <input type="date" class="form-control" v-model="exportData.end" placeholder="Limit to">
                        </div>
                        <div class="form-group col-md-2 pl-1 pr-1">
                            <select class="form-control" v-model="exportData.store">
                                <option value="" selected hidden>Store</option>
                                <option v-for="stores in storeList"
                                        :key="stores.id"
                                        :value="stores.id">
                                        {{ stores.name }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success text-capitalize">find</button>
                        </div>
                        <div class="form-group ml-auto pr-3">
                            <form method="post" @submit.prevent="exportAsExcel">
                                <button class="btn btn-success text-capitalize" >export</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover bg-white">
                    <thead class="text-capitalize">
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
            </div>
        </div>
        <div class="float-right pt-4">
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
            apiData: {},
            storeList: {},
            exportData: {
                start: '',
                end: '',
                store: ''
            },
        }
    },
    mounted() {
        this.getAPI()
        this.getStoreList()
    },
    methods: {
        getAPI(page = 1) {
            axios.get('/api/reports/summary?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_summaries', (apiData) => {
                this.api.data.unshift(apiData)
            })
        },
        getStoreList() {
            axios.get('/api/reports')
            .then(response => {
                this.storeList = response.data
            })
        },
        getRequested() {
            axios.post('/search/summaries', {
                start: this.exportData.start,
                end: this.exportData.end,
                store: this.exportData.store
            })
            .then(response => {
                this.api = response.data
            })
        },
        exportAsExcel() {
            axios({
                url: '/export/summaries',
                method: 'POST',
                data: {
                    start: this.exportData.start,
                    end: this.exportData.end,
                    store: this.exportData.store
                },
                responseType: 'blob',
            })
            .then(response => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'file.xls');
                document.body.appendChild(link);
                link.click();
            })
        }
    }
}
</script>
