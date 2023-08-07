<template>
  <div>
    <div v-if="currentQuestionIndex < questions.length">
      <p>{{ questions[currentQuestionIndex].question }}</p>
      <ul>
        <li v-for="(choice, index) in questions[currentQuestionIndex].choices" :key="index">
          <button @click="selectChoice(choice)">{{ choice }}</button>
        </li>
      </ul>
    </div>

    <div v-else>
      <p>End of questions.</p>
    </div>

    <div>
      <p>First Choice: {{ firstChoice }}</p>
      <p>Second Choice: {{ secondChoice }}</p>
      <p>Third Choice: {{ thirdChoice }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentQuestionIndex: 0,
      firstChoice: '',
      secondChoice: '',
      thirdChoice: '',
      questions: [
        {
          question: 'Question 1: Choose an option',
          choices: ['A', 'B', 'C', 'D'],
        },
        {
          question: 'Question 2: Choose an option',
          choices: ['A', 'B', 'C', 'D'],
        },
        {
          question: 'Question 3: Choose an option',
          choices: ['A', 'B', 'C', 'D'],
        },
      ],
    };
  },
  methods: {
    selectChoice(choice) {
      if (this.currentQuestionIndex === 0) {
        this.firstChoice = choice;
      } else if (this.currentQuestionIndex === 1) {
        this.secondChoice = choice;
      } else if (this.currentQuestionIndex === 2) {
        this.thirdChoice = choice;
        // You can handle further actions or transitions here
      }

      this.currentQuestionIndex++;
    },
  },
};
</script>
