<template>
    <canvas id="top-five" height="250" width="250"></canvas>
</template>
<script>
import Chart from 'chart.js'
export default {
    data() {
        return {
            topFiveStore: {}
        }
    },
    mounted() {
        this.getTopFiveStore()
    },
    methods: {
        getTopFiveStore() {
            axios.get('api/reports/product-sold/best-seller')
            .then(res => {
                this.topFiveStore = res.data
                this.generateChart()
            })
        },
        generateChart() {
            var storeNameArray = []
            var quantityArray = []
            this.topFiveStore.forEach(e => {
                storeNameArray.push(e.name)
                quantityArray.push(e.total_quantity)
            });
            console.log(storeNameArray)
            console.log(quantityArray)
            
            var ctx = document.getElementById('top-five')
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: storeNameArray,
                    datasets: [{
                        label: 'Total Product Sold',
                        data: quantityArray,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        position: 'left',
                        text: 'Top 5 Most Customers (weekly)'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        }
    }
}
</script>

