<template>
  <div :class="['draggable-item', category]" :style="dynamicStyle" :data-id="task.id">
    <p>{{ task.title }}</p>
  </div>
</template>

<script>
export default {
  props: {
    task: {
      type: Object,
      required: true
    },
    category: {
      type: String,
      required: true
    },
    categoryColor: {
      type: String,
      default: '#ddd'  // Default color if none is provided
    }
  },
  computed: {
    dynamicStyle() {
      return {
        borderLeft: `5px solid ${this.categoryColor}`
      };
    }
  }
};
</script>

<style scoped>
.draggable-item {
  background-color: #ffffff;
  padding: 1rem;
  border: 1px solid #ddd;
  border-radius: 0.5rem;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
}

.draggable-item:hover {
  background-color: #f9f9f9;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  transform: scale(1.02);
}
</style>
