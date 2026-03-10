 <template>
  <Card class="flex flex-col items-center justify-center p-4">
    <div class="px-3 py-3 w-full">

      <!-- Title -->
      <h1 class="text-center text-xl text-gray-500 font-light mb-4">
        Product Chart
      </h1>

      <!-- Filter Buttons -->
      <div class="flex justify-center mb-4 gap-2">
        <button
          @click="loadChart('rating')"
          :class="activeFilter === 'rating' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700'"
          class="px-3 py-1 rounded text-sm font-medium"
        >
          By Rating
        </button>
        <button
          @click="loadChart('stock')"
          :class="activeFilter === 'stock' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700'"
          class="px-3 py-1 rounded text-sm font-medium"
        >
          By Stock Level
        </button>
        <button
          @click="loadChart('top_rated')"
          :class="activeFilter === 'top_rated' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700'"
          class="px-3 py-1 rounded text-sm font-medium"
        >
          Top Rated
        </button>
      </div>

      <!-- Chart -->
      <canvas ref="chart"></canvas>

    </div>
  </Card>
</template>

<script>
import Chart from 'chart.js/auto'

export default {
  props: ['card'],

  data() {
    return {
      activeFilter: 'rating',
      chartInstance: null,
    }
  },

  mounted() {
    this.loadChart('rating')
  },

  methods: {
    async loadChart(filter) {
      this.activeFilter = filter

      const response = await fetch(`/api/chart-data?filter=${filter}`)
      const data = await response.json()

      if (this.chartInstance) {
        this.chartInstance.destroy()
      }

      this.chartInstance = new Chart(this.$refs.chart, {
        type: 'pie',
        data: {
          labels: data.labels,
          datasets: [
            {
              data: data.data,
              backgroundColor: [
                '#ff6384',
                '#ff9f40',
                '#ffcd56',
                '#4bc0c0',
                '#36a2eb',
                '#9966ff',
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
  },
}
</script>
