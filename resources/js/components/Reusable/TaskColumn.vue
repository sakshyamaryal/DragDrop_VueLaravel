<template>
  <div class="column">
    <h6>{{ category }}</h6>
    
    <draggable
      class="draggable-list"
      :list="tasks"
      group="tasks"
      @start="onStart"
      @end="onEnd"
      :data-category="category"
      :data-category_id="categoryId"
    >
      <template #item="{ element }">
        <DraggableItem :category="category" :task="element" />
      </template>
    </draggable>
  </div>
</template>

<script>
import Draggable from 'vuedraggable';
import DraggableItem from './DraggableItem.vue';

export default {
  components: {
    Draggable,
    DraggableItem
  },
  props: {
    tasks: {
      type: Array,
      required: true
    },
    category: {
      type: String,
      required: true
    },
    categoryId: {
      type: Number,
      required: true
    },
    onStart: {
      type: Function,
      required: true
    },
    onEnd: {
      type: Function,
      required: true
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

.draggable-item:hover {
  background-color: #f9f9f9;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  transform: scale(1.02);
}

.draggable-list {
  min-height: 100px;
}

.draggable-item {
  padding: 0.5rem;
  margin-bottom: 0.5rem;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.Backlog {
  border-left: 5px solid #007bff;
  cursor:pointer;
}

.Next {
  border-left: 5px solid #ffc107;
  cursor:pointer;
}

.Progress {
  border-left: 5px solid #f06292;
  cursor:pointer;
}

.Completed {
  border-left: 5px solid #28a745;
  cursor:pointer;
}

</style>
