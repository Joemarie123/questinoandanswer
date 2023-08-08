<template>
  <div>
    <p>{{ firstPart }}</p>
   <!--  <p>{{ secondPart }}</p> -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      answer: {
        text: "A.) 10 sq. units"
      },
      firstPart: "",
      secondPart: ""
    };
  },
  created() {
    const parts = this.answer.text.split('.)');
    if (parts.length === 2) {
      this.firstPart = parts[0] + '.';
      this.secondPart = parts[1];
    }
    console.log("Question 1:", this.firstPart);
  }
};
</script>

<style>
/* Add your styling here */
</style>
