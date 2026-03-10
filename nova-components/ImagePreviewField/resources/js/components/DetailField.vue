<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <div class="flex items-center">
        <span
          v-for="star in maxStars"
          :key="star"
          style="font-size: 30px;"
          :style="{ color: star <= field.value ? '#f5a623' : '#d3d3d3' }"
        >
          ★
        </span>
      </div>
    </template>
  </PanelItem>
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

  computed: {
    maxStars() {
      return this.field.maxStars || 5
    },
  },
}
</script>
