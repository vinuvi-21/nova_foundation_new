<template>
  <Card class="flex flex-col p-4">
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

      <!-- Chart and Table side by side -->
      <div class="flex gap-4">

        <!-- Pie Chart -->
        <div class="w-1/2">
          <canvas ref="chart"></canvas>
        </div>

        <!-- Product Table -->
        <div class="w-1/2" v-if="selectedProducts.length > 0">
          <h2 class="text-lg font-medium text-gray-600 mb-2">
            &#9733; {{ selectedRating }} Star Products ({{ selectedProducts.length }})
          </h2>
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-gray-100">
                <th class="px-2 py-1 text-left">ID</th>
                <th class="px-2 py-1 text-left">Name</th>
                <th class="px-2 py-1 text-left">Price</th>
                <th class="px-2 py-1 text-left">Stock</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="product in selectedProducts"
                :key="product.id"
                class="border-b border-gray-100"
              >
                <td class="px-2 py-1">{{ product.id }}</td>
                <td class="px-2 py-1">{{ product.name }}</td>
                <td class="px-2 py-1">${{ product.price }}</td>
                <td class="px-2 py-1">{{ product.stock }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Placeholder when no slice clicked -->
        <div class="w-1/2 flex items-center justify-center text-gray-400 text-sm" v-else>
          Click a slice to see products
        </div>

      </div>
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
      selectedProducts: [],
      selectedRating: null,
    }
  },

  mounted() {
    this.loadChart('rating')
  },

  methods: {
    async loadChart(filter) {
      this.activeFilter = filter
      this.selectedProducts = []
      this.selectedRating = null

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
          onClick: (event, elements) => {
            if (elements.length > 0 && this.activeFilter === 'rating') {
              const index = elements[0].index
              const label = data.labels[index]
              const rating = parseInt(label)
              this.fetchProducts(rating)
            }
          },
          plugins: {
            legend: {
              position: 'bottom',
            },
          },
        },
      })
    },

    async fetchProducts(rating) {
      this.selectedRating = rating
      const response = await fetch(`/api/products-by-rating?rating=${rating}`)
      const data = await response.json()
      this.selectedProducts = data.products
    },
  },
}
</script>
