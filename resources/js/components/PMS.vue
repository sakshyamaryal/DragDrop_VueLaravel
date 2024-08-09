<template>
  <div class="container mt-5 mb-5">
    <div class="columns">
      <div class="column">
        <h6>Idea 💡</h6>
        <draggable class="draggable-list" :list="tasks.ideas" group="tasks">
          <template #item="{element}">
            <div class="draggable-item">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
      <div class="column">
        <h6>Todo ✍</h6>
        <draggable class="draggable-list" :list="tasks.todos" group="tasks">
          <template #item="{element}">
            <div class="draggable-item">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
      <div class="column">
        <h6>In Progress 🗓</h6>
        <draggable class="draggable-list" :list="tasks.inProgress" group="tasks">
          <template #item="{element}">
            <div class="draggable-item">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
      <div class="column">
        <h6>Ready to go ✅</h6>
        <draggable class="draggable-list" :list="tasks.completed" group="tasks">
          <template #item="{element}">
            <div class="draggable-item">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";
export default {
  components: {
    draggable,
  },
  data() {
    return {
      tasks: {
        ideas: ["Migrate codebase to TypeScript"],
        todos: ["Dockerize App", "Add vue.draggable to project"],
        inProgress: ["Implement Web3 Features", "Bump to vite.js"],
        completed: [],
      },
    };
  },
};
</script>

<style scoped>
.container {
  padding: 1rem;
}

.columns {
  display: flex;
  /* flex-wrap: wrap; */
  gap: 1rem; /* Space between columns */
}

.column {
  flex: 1 1 calc(25% - 1rem); /* Adjust the width of each column */
  min-width: 200px; /* Minimum width of each column */
  background-color: #f8f9fa;
  padding: 1rem;
  border-radius: 0.5rem;
}

.column h6 {
  font-weight: 700;
  margin-bottom: 1rem;
}

.draggable-list {
  display: flex;
  flex-direction: column;
  gap: 1rem; /* Space between items */
}

.draggable-item {
  background-color: #ffffff;
  padding: 1rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border: 1px solid #ddd;
  border-radius: 0.5rem;
  cursor: pointer;
}
</style>
