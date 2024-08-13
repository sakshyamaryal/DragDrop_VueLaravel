<template>
  <form @submit.prevent="submitForm">
    <div v-for="(field, index) in fields" :key="index" class="form-group">
      <label :for="field.name">{{ field.label }}:</label>
      <component
          :is="field.component"
          v-model="formData[field.name]"
          v-bind="field.props"
          :id="field.name"
          :name="field.name"
          :required="field.required"
          @input="updateFormData(field.name, $event.target.value)"
        />
    </div>
    <button type="submit" class="submit-btn">{{ submitButtonText }}</button>
  </form>
</template>
          <!--  -->

<script>
export default {
  props: {
    fields: {
      type: Array,
      required: true
    },
    initialData: {
      type: Object,
      default: () => ({})
    },
    submitButtonText: {
      type: String,
      default: 'Submit'
    }
  },
  data() {
    return {
      
      formData: { ...this.initialData } // Ensure formData is initialized
    };
  },
  watch: {
    initialData: {
      handler(newValue) {
        this.formData = { ...newValue };
      },
      deep: true
    }
  },
  methods: {
    submitForm() {
      console.log(this.formData); // Debug form data
      this.$emit('submit', this.formData);
    },
    updateFormData(fieldName, value) {
      this.formData[fieldName] = value;
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
input, textarea, select {
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
