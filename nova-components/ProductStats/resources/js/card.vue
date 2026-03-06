<template>
  <card class="flex flex-col p-6" style="min-height: 200px">
    <h1 class="text-2xl font-bold text-gray-700">Product Stats</h1>

    <div class="flex mt-6 gap-6">
      <!-- Total Products -->
      <div class="flex-1 bg-blue-100 rounded-lg p-4 text-center">
        <p class="text-gray-500 text-sm">Total Products</p>
        <h2 class="text-4xl font-bold text-blue-600 mt-2">{{ totalProducts }}</h2>
      </div>

      <!-- Total Stock -->
      <div class="flex-1 bg-green-100 rounded-lg p-4 text-center">
        <p class="text-gray-500 text-sm">Total Stock</p>
        <h2 class="text-4xl font-bold text-green-600 mt-2">{{ totalStock }}</h2>
      </div>

      <!-- Total Value -->
      <div class="flex-1 bg-purple-100 rounded-lg p-4 text-center">
        <p class="text-gray-500 text-sm">Total Value</p>
        <h2 class="text-4xl font-bold text-purple-600 mt-2">${{ totalValue }}</h2>
      </div>
    </div>

    <p class="mt-4 text-gray-400 text-sm">Last updated: {{ lastUpdated }}</p>
  </card>
</template>

<script>
export default {
  data() {
    return {
      totalProducts: 0,
      totalStock: 0,
      totalValue: 0,
      lastUpdated: ''
    }
  },

  mounted() {
    this.fetchStats()
  },

  methods: {
    async fetchStats() {
      const response = await fetch('/api/product-stats')
      const data = await response.json()

      this.totalProducts = data.totalProducts
      this.totalStock = data.totalStock
      this.totalValue = data.totalValue
      this.lastUpdated = new Date().toLocaleString()
    }
  }
}
</script>