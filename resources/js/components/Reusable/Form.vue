<!-- src/components/TaskForm.vue -->
<template>
  <form @submit.prevent="submitForm">
    <div class="form-group">
      <label for="taskName">Title:</label>
      <input type="text" id="taskName" v-model="task.title" required />
    </div>
    <button type="submit" class="submit-btn">Add Task</button>
  </form>
</template>

<script>
export default {
  props: {
    task: {
      type: Object,
      default: () => ({ title: '' })
    }
  },
  methods: {
    submitForm() {
      this.$emit('submit', this.task);
    }
  }
};
</script>

<style scoped>
.form-group {
  margin-bottom: 1rem;
}
label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}
input, textarea {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ddd;
  border-radius: 0.25rem;
}
textarea {
  resize: vertical;
  min-height: 100px;
}
.submit-btn {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.submit-btn:hover {
  background-color: #0056b3;
}
</style>
