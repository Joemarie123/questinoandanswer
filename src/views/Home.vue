<template>
  <div>
    <v-select
      v-model="selectedOption"
      :items="options"
      label="Select an option"
    ></v-select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      options: [],
      selectedOption: null,
    };
  },
  methods: {
    fetchOptions() {
      fetch("/data.json") // Replace with the correct path to your crea.json file.
        .then((response) => response.json())
        .then((data) => {
          this.options = data;
        })
        .catch((error) => {
          console.error("Error fetching options:", error);
        });
    },
  },
  mounted() {
    this.fetchOptions();
  },
};
</script>

<style>
/* Add your CSS styles here, if needed. */
</style>
