<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <div class="flex items-center">
        <span
          v-for="star in maxStars"
          :key="star"
          @click="setRating(star)"
          style="cursor: pointer; font-size: 30px;"
          :style="{ color: star <= value ? '#f5a623' : '#d3d3d3' }"
        >
          ★
        </span>
      </div>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],
  props: ['resourceName', 'resourceId', 'field'],

  computed: {
    maxStars() {
      return this.field.maxStars || 5
    },
  },

  methods: {
    setInitialValue() {
      this.value = this.field.value || 0
    },

    fill(formData) {
      formData.append(this.field.attribute, this.value || 0)
    },

    setRating(star) {
      this.value = star
    },
  },
}
</script>
