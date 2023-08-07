<template>
    <div class="questions-ctr">
      <v-card class="mx-3 mx-lg-0"  :elevation="isHovering ? 24 : 6">
          <p class="mx-3 my-3 " style="font-size:17px"><strong>Instructions:</strong> <span style="font-size:15px">Welcome to the Expanded-City Educational Scholarship Program (E-CESPRO) online examination for SY 2022-2023. Please carefully read and choose the correct answer for each item. The exam consists of 65 questions and one essay type. The time allocation for this exam is only 2 hours, plus an additional 30 minutes for your essay. Warning: Attempting to exit the exam interface or open other browser tabs will automatically exit your examination.</span></p>
        </v-card>
      <div class="progress mx-3 mx-lg-0">

        <div
          class="bar"
          :style="{ width: `${(questionsAnswered / questions.length) * 100}%` }"
        ></div>
        
     
        
        <div class="status">
          {{ questionsAnswered }} out of {{ questions.length }} Questions & Answer
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
         <p class="my-5 mx-1"> {{ question.number }} <u> {{ question.quesionunderline }}</u>  <p v-html=question.q></p>  </p>
        

          <!-- </div> -->
          <div >
            <!-- <div
              class="answer"
              v-for="answer in question.answers" :key="answer.text"
              @click.prevent="selectAnswer(answer.is_correct)"
            >
              {{ answer.text }}
               
            </div> -->

            <v-radio-group v-model="answer">
              <v-radio
        v-for="answer in question.answers"
        :key="answer.text"
        :label="answer.text"
        :value="answer"
      ></v-radio>
      
            </v-radio-group>
            <button @click="selectAnswer(answer)">SUBMIT</button>
          </div>


         
          
        </div> 

<!--         <div>
      <p>First Choice: {{ firstChoice }}</p>
      <p>Second Choice: {{ secondChoice }}</p>
      <p>Third Choice: {{ thirdChoice }}</p>
    </div> -->


      </transition-group>
    </v-card>

    </div>
  </template>
  
  <script>
  export default {
    props: ["questions", "questionsAnswered"],
    emits: ["question-answered"],
    data(){
        return{
   currentQuestionIndex: 0,
      firstChoice: '',
      secondChoice: '',
      thirdChoice: '',
      answer:[]

  };
  
},


methods: {
      

        
      selectAnswer(answer) {

        
        this.$emit("question-answered", answer.is_correct);
    
      /*   if (this.currentQuestionIndex === 0) {
        this.firstChoice = is_correct;
        console.log("Setting firstChoice:", is_correct);
      } else if (this.currentQuestionIndex === 1) {
        this.secondChoice = is_correct;
        console.log("Setting firstChoice:", is_correct);
      } else if (this.currentQuestionIndex === 2) {
        this.thirdChoice = is_correct;
        console.log("Setting firstChoice:", is_correct);
      }
    
      this.currentQuestionIndex++;
 */
      },

  /*     selectChoice(answer) {
     
    }, */

    },
   
  };
  </script>

<style>
  .jastipay {
  text-align: justify;
  text-justify: inter-word;
  
}
</style>