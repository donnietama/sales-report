<template>
    <div class="px-4 py-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3 class="text-capitalize">export data additionals</h3>
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
        <div class="table-responsive">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover bg-white">
                        <thead class="text-capitalize">
                            <th class="text-center">#</th>
                            <th>store</th>
                            <th>date</th>
                            <th>additional name</th>
                            <th>quantity</th>
                        </thead>
                        <tbody>
                            <tr v-for="(data, index) in api.data" :key="data.id">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td>{{ data.user.name }}</td>
                                <td>{{ data.date }}</td>
                                <td>{{ data.topping_name }}</td>
                                <td>{{ data.quantity }} pcs</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
            axios.get('/api/reports/additional?page=' + page).then(res => {
                this.api = res.data
            })
            Event.$on('added_additional', (apiData) => {
                apiData.forEach(data => {
                    this.api.data.unshift(data)
                });
            })
        },
        getStoreList() {
            axios.get('/api/reports')
            .then(response => {
                this.storeList = response.data
            })
        },
        getRequested() {
            axios.post('/search/additionals', {
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
                url: '/export/additionals',
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
