<template>
    <div class="questions-ctr">
      <v-card class="mx-3 mx-lg-0"  :elevation="isHovering ? 24 : 6">
          <p class="mx-3 my-3 " style="font-size:17px"><strong>General Instruction:</strong> Write your answer on the separated ANSWER SHEET. You have 2 ½ hours to finish the test. STRICTLY NO ERASURES AND ALTERATION ALLOWED. DO NOT WRITE ANYTHING ON THIS TEST QUESTIONNAIRE. </p>
        </v-card>
      <div class="progress mx-3 mx-lg-0">

        <div
          class="bar"
          :style="{ width: `${(questionsAnswered / questions.length) * 100}%` }"
        ></div>
        
     
        
        <div class="status">
           {{ questions.length }} Questions & Answer
        </div>
      </div>
        
      <v-card class="mx-3 mx-lg-0">
      <transition-group name="fade">
        <div
          class="single-question "
          v-for="(question, qi) in questions"
          :key="question.q"
          v-show="questionsAnswered === qi"
        >
        
        <p class="my-5 mx-1"> <strong>{{ question.subject }}</strong> </p>
        <p class="mt-n4 mx-5" style="font-size:15px"> <strong>{{ question.direction }}</strong> {{ question.displaydirection }} </p>
        <p class="jastipay mt-2 mx-2" style="font-size:14px"> {{ question.phrase_one }} </p>
        <p class="jastipay mt-2 mx-2" style="font-size:14px"> {{ question.phrase_tow }} </p>
        <p class="jastipay mt-2 mx-2" style="font-size:14px"> {{ question.phrase_three }} </p>
        <p class="jastipay mt-2 mx-2" style="font-size:14px"> {{ question.phrase_four }} </p>
        <p class="jastipay mt-2 mx-2" style="font-size:14px"> {{ question.phrase_five }} </p>
         <!--  <div class="question"> -->
        
          <!-- 
          <p class="my-5 mx-1"> <u> {{ question.quesionunderline }}</u> </p> -->
         <p class="my-5 mx-1"> {{ question.number }} <u> {{ question.quesionunderline }}</u>  {{ question.q }}  </p>
        


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
    </v-card>

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

   
  
   


  };
  </script>

<style>
  .jastipay {
  text-align: justify;
  text-justify: inter-word;
  
}
</style>