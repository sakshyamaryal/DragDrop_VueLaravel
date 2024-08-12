<template>
  <div class="container">
    
    <Button :onClick="() => showModal = true"/>
    <div class="columns">
      <TaskColumn
        v-for="(categoryData, category) in tasks"
        :key="categoryData.category_id"
        :tasks="categoryData.tasks"
        :category="category"
        :categoryId="categoryData.category_id"
        :onStart="start"
        :onEnd="finish"
      />
    </div>

    <Modal
      :visible="showModal"
      :onClose="() => showModal = false"
      :onSubmit="addTask"
    />
  </div>
</template>

<script>
import axios from 'axios';
import Button from './Reusable/Button.vue';
import Modal from './Reusable/Modal.vue';
import TaskColumn from './Reusable/TaskColumn.vue';

export default {
  components: {
    Button,
    Modal,
    TaskColumn
  },
  data() {
    return {
      tasks: {}, // Structure: { "Backlog": { category_id: 1, tasks: [...] }, ... }
      startCategory: null,
      endCategory: null,
      startCategoryId: null,
      endCategoryId: null,
      taskid: null,
      showModal: false,
      newTask: {
        name: '',
      },
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
        console.log('Fetched tasks:', this.tasks); // Debug here
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
    },
    
    async addTask(name) {
      try {
        await axios.post('/api/tasks', {
          title: name,
          category_id: 1 
        });
        this.showModal = false;
        await this.fetchTasks();
      } catch (error) {
        console.error('Error adding task:', error);
      }
    },
  }
};
</script>



<style scoped>
.container {
  padding: 2rem;
  background: linear-gradient(to right, #e2e2e2, #f0f4f8);
}


.columns {
  display: flex;
  gap: 1rem;
  overflow-x: auto;
  padding: 1rem 0;
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
