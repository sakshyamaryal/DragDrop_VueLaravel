<!-- src/components/TaskColumn.vue -->
<template>
  <div class="column" :class="category">
    <h6>{{ category }}</h6>
    <draggable 
      class="draggable-list" 
      :list="tasks" 
      group="tasks" 
      @start="start" 
      @end="finish"
    >
      <template #item="{element}">
        <div :class="['draggable-item', category]" :data-category_id="element.category_id" :data-id="element.id">
          <p>{{ element.title }}</p>
        </div>
      </template>
    </draggable>
  </div>
</template>

<script>
import Draggable from 'vuedraggable';

export default {
  components: {
    Draggable
  },
  props: {
    category: {
      type: String,
      required: true
    },
    tasks: {
      type: Array,
      required: true
    }
  },
  methods: {
    start(event) {
      this.$emit('start', event);
    },
    finish(event) {
      this.$emit('finish', event);
    }
  }
};
</script>

<style scoped>
.column {
  flex: 1;
  min-width: 300px;
  background-color: #ffffff;
  padding: 1.5rem;
  border-radius: 0.75rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  background: linear-gradient(to right, #f7f7f7, #eaeaea);
}
.column h6 {
  font-weight: 700;
  font-size: 1.25rem;
  margin-bottom: 1rem;
  color: #444;
  border-bottom: 3px solid #ddd;
  padding-bottom: 0.5rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
</style>
