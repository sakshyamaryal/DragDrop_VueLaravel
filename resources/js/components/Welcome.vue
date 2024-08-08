<template>
  <div>
    <h1>{{ title }}</h1>
    <router-link to="/pms">
      <button>Go to PMS</button>
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
