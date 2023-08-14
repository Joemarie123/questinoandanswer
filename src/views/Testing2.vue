<template>
  <div>
    <!-- Your component's content -->
    <div v-if="isLoading" class="loading-progress-bar">
      <div class="loading-progress" :style="{ width: loadingProgress + '%' }"></div>
    </div>

     <!-- Display the v-text-field when isLoading is false -->
     <v-text-field v-if="!isLoading" label="Enter Something"></v-text-field>
    <!-- Rest of your component's content -->
  </div>
</template>

<style>
.loading-progress-bar {
  width: 100%;
  height: 10px;
  background-color: #ccc;
}

.loading-progress {
  height: 100%;
  background-color: #3498db;
  transition: width 0.2s ease-in-out;
}
</style>

<script>
export default {
  data() {
    return {
      isLoading: false,
      loadingProgress: 0,
    };
  },
  methods: {
    fetchUsers() {
      // Your fetchUsers logic here
    },
    fetchFullNames() {
      // Your fetchFullNames logic here
    },
    simulateLoading() {
      const interval = 20; // Change this to control the speed of loading
      const totalSteps = 50; // Adjust this based on the total number of steps you want
      let currentStep = 0;

      this.isLoading = true;

      const loadingInterval = setInterval(() => {
        currentStep++;
        this.loadingProgress = (currentStep / totalSteps) * 100;

        if (currentStep >= totalSteps) {
          clearInterval(loadingInterval);
          this.isLoading = false;
          this.loadingProgress = 0;
          this.fetchFullNames();
        }
      }, interval);
    },
  },
  created() {
    this.fetchUsers();
    this.simulateLoading();
  },
};
</script>
