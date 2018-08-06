<template>
    <canvas id="sold-chart"></canvas>
</template>
<script>
import Chart from 'chart.js'
export default {
    data() {
        return {
            thisMonthValue: 0,
            lastMonthValue: 0,
            lastTwoMonthValue: 0,
        }
    },
    mounted() {
        this.getThisMonthValue()
        this.getLastMonthValue()
        this.getLastTwoMonthValue()
    },
    methods: {
        getThisMonthValue() {
            axios.get('/api/reports/product-sold/this-month')
            .then(res => {
                this.thisMonthValue = res.data.this_month_quantity
            })
        },
        getLastMonthValue() {
            axios.get('/api/reports/product-sold/last-month')
            .then(res => {
                this.lastMonthValue = res.data.last_month_quantity
            })
        },
        getLastTwoMonthValue() {
            axios.get('/api/reports/product-sold/last-two-month')
            .then(res => {
                this.lastTwoMonthValue = res.data.last_two_month_quantity
                this.generateChart()
            })
        },
        generateChart() {
            var ctx = document.getElementById('sold-chart')
            var soldChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Last Two Month", "Last Month", "This Month"],
                    datasets: [{
                        label: 'Monthly Product Sold Statistic',
                        data: [this.lastTwoMonthValue, this.lastMonthValue, this.thisMonthValue],
                        backgroundColor: [
                            'rgba(54, 162, 235, .7)',
                            'rgba(255, 99, 132, .7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        pointHoverBackgroundColor: [
                            'rgba(255, 255, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
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

