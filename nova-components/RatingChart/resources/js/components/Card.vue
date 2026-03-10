<template>
  <Card class="flex flex-col items-center justify-center p-4">
    <div class="px-3 py-3 w-full">
      <h1 class="text-center text-xl text-gray-500 font-light mb-4">
        Products by Rating
      </h1>
      <canvas ref="chart"></canvas>
    </div>
  </Card>
</template>

<script>
import Chart from 'chart.js/auto'

export default {
  props: ['card'],

  mounted() {
    new Chart(this.$refs.chart, {
      type: 'pie',
      data: {
        labels: this.card.labels,
        datasets: [
          {
            data: this.card.ratings,
            backgroundColor: [
              '#d3d3d3',
              '#ff6384',
              '#ff9f40',
              '#ffcd56',
              '#4bc0c0',
              '#36a2eb',
            ],
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
        },
      },
    })
  },
}
</script>
