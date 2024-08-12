<template>
  <div class="container">
    <h2 class="main-heading">Task Management</h2>
    <div class="columns">
      <div class="column" v-for="task in  tasks">
        <h6>Backlog</h6>
        <draggable class="draggable-list" :list="tasks.backlogs" group="tasks">
          <template #item="{element}">
            <div class="draggable-item backlog">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
      <div class="column">
        <h6>Up Next</h6>
        <draggable class="draggable-list" :list="tasks.upnexts" group="tasks">
          <template #item="{element}">
            <div class="draggable-item up-next">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
      <div class="column">
        <h6>In Progress 🗓</h6>
        <draggable class="draggable-list" :list="tasks.inProgress" group="tasks">
          <template #item="{element}">
            <div class="draggable-item in-progress">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
      <div class="column">
        <h6>Ready to go</h6>
        <draggable class="draggable-list" :list="tasks.completed" group="tasks">
          <template #item="{element}">
            <div class="draggable-item completed">
              <p>{{ element }}</p>
            </div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import Draggable from 'vuedraggable';
export default {
  components: {
    Draggable,
  },
  data() {
    return {
      tasks: {
        backlogs: ["Redesign the homepage", "Improve user onboarding"],
        upnexts: ["Refactor the authentication module", "Optimize API calls"],
        inProgress: ["Develop new features for the dashboard", "Update user profile component"],
        completed: ["Fix bugs in the payment system", "Deploy the latest build"],
      },
    };
  },
};
</script>

<style scoped>
.container {
  padding: 2rem;
  background: linear-gradient(to right, #f0f4f8, #e2e2e2);
}

.main-heading {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 2rem;
  color: #333;
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
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease;
}

.column:hover {
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.column h6 {
  font-weight: 700;
  font-size: 1.25rem;
  margin-bottom: 1rem;
  color: #333;
  border-bottom: 2px solid #ddd;
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
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.draggable-item:hover {
  background-color: #f9f9f9;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.backlog {
  border-left: 5px solid #007bff;
}

.upnext {
  border-left: 5px solid #ffc107;
}

.in-progress {
  border-left: 5px solid #17a2b8;
}

.completed {
  border-left: 5px solid #28a745;
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
