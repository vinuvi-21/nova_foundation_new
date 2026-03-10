<template>
  <td class="td-fit px-2">
    <div class="flex items-center">
      <span
        v-for="star in maxStars"
        :key="star"
        style="font-size: 20px;"
        :style="{ color: star <= field.value ? '#f5a623' : '#d3d3d3' }"
      >
        &#9733;
      </span>
    </div>
  </td>
</template>

<script>
export default {
  props: ['resourceName', 'resourceId', 'field'],

  computed: {
    maxStars() {
      return this.field.maxStars || 5
    },
  },
}
</script>
