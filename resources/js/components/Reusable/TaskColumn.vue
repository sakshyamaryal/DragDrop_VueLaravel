<template>
  <div class="column">
    <h6>{{ category }}
      <span class="add pull-right" v-if="category == 'Backlog'">
        <button class="open-modal-btn " @click="openModal">➕</button>
      </span>
    </h6>
    
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
        <DraggableItem :category="category" :categoryColor="categoryColor" :task="element" />
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
    categoryColor: {
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
    },
    openModal: {
      type: Function,
      required: true
    },
  },
  // methods:{ 
  //   openModal(){
  //     console.log('openModal');
  //     this.$emit('openModal');
  //   }
  // }
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



.pull-right {
  float: right;
}

</style>
