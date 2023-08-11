<template>
  <div>
    <input v-model="inputData" placeholder="Enter data" />
    <button @click="submitData">Submit</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      inputData: '',
    };
  },
  methods: {
    submitData() {
      this.$router.push({
        name: 'Testing2',
        params: { inputData: this.inputData },
      });
    },
  },
};
</script>
