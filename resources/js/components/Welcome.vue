<template>
  <div class="container">
    <h1 class="title">{{ title }}</h1>
    <router-link to="/pms">
      <button class="button">Go to PMS</button>
    </router-link>
  </div>
</template>

<script>
export default {
  setup() {
    return {
      title: 'Laravel + Vue PMS'
    };
  }
}
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #f0f4f8;
}

.title {
  font-size: 2rem;
  font-weight: bold;
  color: #1d4ed8; /* Blue-600 */
  margin-bottom: 1.5rem;
}

.button {
  padding: 0.75rem 1.5rem;
  background-color: #3b82f6; /* Blue-500 */
  color: white;
  font-weight: 600;
  border: none;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.button:hover {
  background-color: #2563eb; /* Blue-600 */
}

.button:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); /* Blue-400 */
}
</style>
