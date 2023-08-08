<template>
  <div>
    <p>{{ firstPart }}</p>
    <!-- <p>{{ secondPart }}</p> -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      text: "C. Geometric sequence",
      firstPart: "",
      secondPart: ""
    };
  },
  created() {
    const parts = this.text.split('. ');
    if (parts.length === 2) {
      this.firstPart = parts[0] + '.';
      this.secondPart = parts[1];
    }
  }
};
</script>

<style>
/* Add your styling here */
</style>
