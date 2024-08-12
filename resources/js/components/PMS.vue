<template>
  <div class="container">
    <h6 class="main-heading">Task Management</h6>
    <div class="columns">
      <div class="column" v-for="(task, category) in tasks" :key="task.category_id">
        <h6>{{ category }}</h6>
        <draggable 
          class="draggable-list" 
          :list="task.tasks" 
          group="tasks" 
          @start="start" 
          @end="finish"
          :data-category="category"
          :data-category_id="task.category_id"
        >
          <template #item="{element}">
            <div :class="['draggable-item', category]" :data-category_id="element.category_id" :data-id="element.id">
              <p>{{ element.title }}</p>
            </div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Draggable from 'vuedraggable';

export default {
  components: {
    Draggable,
  },
  data() {
    return {
      tasks: {},
      startCategory: null,
      endCategory: null,
      startCategoryId: null,
      endCategoryId: null,
      taskid: null,
    };
  },
  created() {
    this.fetchTasks();
  },
  methods: {
    async fetchTasks() {
      try {
        const response = await axios.get('/api/tasks');
        this.tasks = response.data;
        console.log(response.data);
      } catch (error) {
        console.error('Error fetching tasks:', error);
      }
    },
    start(event) {
      this.startCategory = event.from.dataset.category;
      this.startCategoryId = event.from.dataset.category_id;
      this.taskid = event.item.dataset.id;

      console.log('Drag Start:', {
        startCategory: this.startCategory,
        startCategoryId: this.startCategoryId,
        taskId: this.taskid
      });
    },
    finish(event) {
      this.endCategory = event.to.dataset.category;
      this.endCategoryId = event.to.dataset.category_id;
      this.taskid = event.item.dataset.id;

      console.log('Drag End:', {
        endCategory: this.endCategory,
        endCategoryId: this.endCategoryId,
        taskId: this.taskid
      });
    }
  }
};
</script>

<style scoped>
.container {
  padding: 2rem;
  background: linear-gradient(to right, #e2e2e2, #f0f4f8);
}

.main-heading {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 2rem;
  color: #333;
  font-weight: bold;
}

.columns {
  display: flex;
  gap: 1rem;
  overflow-x: auto;
  padding: 1rem 0;
}

.column {
  flex: 1;
  min-width: 300px;
  background-color: #ffffff;
  padding: 1.5rem;
  border-radius: 0.75rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease, transform 0.3s ease;
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

.draggable-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

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

@media (max-width: 1024px) {
  .column {
    flex: 1 1 calc(33.333% - 1rem);
  }
}

@media (max-width: 768px) {
  .column {
    flex: 1 1 calc(50% - 1rem);
  }
}

@media (max-width: 480px) {
  .column {
    flex: 1 1 calc(100% - 1rem);
  }
}
</style>
