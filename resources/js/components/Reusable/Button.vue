<template>
  <button class="open-modal-btn" @click="onClick">➕</button>
</template>

<script>
export default {
  props: {
    onClick: {
      type: Function,
      required: true
    }
  }
};
</script>

<style scoped>
.open-modal-btn {
  background-color: white;
  color: white;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  cursor: pointer;
}
.open-modal-btn:hover {
  background-color: #0056b3;
}
</style>
