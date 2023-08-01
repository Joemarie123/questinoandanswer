<template>
    <div class="questions-ctr">
      <v-card  :elevation="isHovering ? 24 : 6">
          <p class="mx-3 my-3" style="font-size:17px"><strong>General Instruction:</strong> Write your answer on the separated ANSWER SHEET. You have 2 ½ hours to finish the test. STRICTLY NO ERASURES AND ALTERATION ALLOWED. DO NOT WRITE ANYTHING ON THIS TEST QUESTIONNAIRE. </p>
        </v-card>
      <div class="progress">
        <div
          class="bar"
          :style="{ width: `${(questionsAnswered / questions.length) * 100}%` }"
        ></div>
        <div class="status">
          <span style="color:Black">MATHEMATICS</span> {{ questions.length }} questions answered
        </div>
      </div>
      <transition-group name="fade">
        <div
          class="single-question"
          v-for="(question, qi) in questions"
          :key="question.q"
          v-show="questionsAnswered === qi"
        >
  
         <!--  <div class="question"> -->
         <p class="my-5 mx-1">   {{ question.q }}</p>
          <!-- </div> -->
          <div class="answers">
            <div
              class="answer"
              v-for="answer in question.answers"
              :key="answer.text"
              @click.prevent="selectAnswer(answer.is_correct)"
            >
              {{ answer.text }}
            </div>
          </div>
        </div>
      </transition-group>
    </div>
  </template>
  
  <script>
  export default {
    props: ["questions", "questionsAnswered"],
    emits: ["question-answered"],
    methods: {
      selectAnswer(is_correct) {
        this.$emit("question-answered", is_correct);
      },

    },

   /*  mounted:{

    


    } */


  };
  </script>