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
          Total Correct:{{ totalCorrect }}
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
    <p class="my-5 mx-1"> {{ question.number }} <u> {{ question.quesionunderline }}</u>  <p v-html=question.q></p>   </p>
         

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
            <v-btn color="green" @click="selectAnswer(answer)">SUBMIT</v-btn>
          </div>

          
        </div> 

      <!--   <div>
      <p>First Choice: {{ firstChoice }}</p>
      <p>Second Choice: {{ secondChoice }}</p>
      <p>Third Choice: {{ thirdChoice }}</p>
    </div> -->
    <div>
    <p>Display Splice: {{ firstPart }}</p>
    <!-- <p>{{ secondPart }}</p> -->
    <p>Display ID: {{ examinee.Examinee_ID }}</p>
  </div>
  

      </transition-group>
    </v-card>

    </div>
  </template>
  
  <script>

  import  { mapActions, mapGetters} from "vuex";


  export default {
    props: ["questions", "questionsAnswered","totalCorrect"],
    emits: ["question-answered"],
    data(){
        return{

      text: "C. Geometric sequence",
      firstPart: "",
      secondPart: "",

      currentQuestionIndex: 0,
      question_1: '',
      question_2: '',
      question_3: '',
      question_4: '',
      question_5: '',
      question_6: '',
      question_7: '',
      question_8: '',
      question_9: '',
      question_10: '',
      question_11: '',
      question_12: '',
      question_13: '',
      question_14: '',
      question_15: '',
      question_16: '',
      question_17: '',
      question_18: '',
      question_19: '',
      question_20: '',
      question_21: '',
      question_22: '',
      question_23: '',
      question_24: '',
      question_25: '',
      question_26: '',
      question_27: '',
      question_28: '',
      question_29: '',
      question_30: '',
      question_31: '',
      question_32: '',
      question_33: '',
      question_34: '',
      question_35: '',
      question_36: '',
      question_37: '',
      question_38: '',
      question_39: '',
      question_40: '',
      question_41: '',
      question_42: '',
      question_43: '',
      question_44: '',
      question_45: '',
      question_46: '',
      question_47: '',
      question_48: '',
      question_49: '',
      question_50: '',
      question_51: '',
      question_52: '',
      question_53: '',
      question_54: '',
      question_55: '',
      question_56: '',
      question_57: '',
      question_58: '',
      question_59: '',
      question_60: '',
      question_61: '',
      question_62: '',
      question_63: '',
      question_64: '',
      answer:[],
     
  };
  
},



methods: {
      

  

      selectAnswer(answer) {

        
        this.$emit("question-answered", answer.is_correct);
    
      

        if (this.currentQuestionIndex === 0) {
        this.question_1 = answer.text;

        const parts = this.question_1.split('. ');
    if (parts.length === 2) {
      this.firstPart = parts[0] + '.';
      this.secondPart = parts[1];
    }



        console.log("Question 1:", answer.text);
      } else if (this.currentQuestionIndex === 1) {
        this.question_2 = answer.text;
        console.log("Question 2:", answer.text);

      } else if (this.currentQuestionIndex === 2) {
        this.question_3 = answer.text;
        console.log("Question 3:", answer.text);
      }

      else if (this.currentQuestionIndex === 3) {
        this.question_4 = answer.text;
        console.log("Question 4:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 4) {
        this.question_5 = answer.text;
        console.log("Question 5:", answer.text);
      }
      else if (this.currentQuestionIndex === 5) {
        this.question_6 = answer.text;
        console.log("Question 6:", answer.text);
      }

      else if (this.currentQuestionIndex === 6) {
        this.question_7 = answer.text;
        console.log("Question 7:", answer.text);
      }

      else if (this.currentQuestionIndex === 7) {
        this.question_8 = answer.text;
        console.log("Question 8:", answer.text);
      }

      else if (this.currentQuestionIndex === 8) {
        this.question_9 = answer.text;
        console.log("Question 9:", answer.text);
      }

      else if (this.currentQuestionIndex === 9) {
        this.question_10 = answer.text;
        console.log("Question 10:", answer.text);
      }

      else if (this.currentQuestionIndex === 10) {
        this.question_11 = answer.text;
        console.log("Question 11:", answer.text);
      }

      else if (this.currentQuestionIndex === 11) {
        this.question_12 = answer.text;
        console.log("Question 12:", answer.text);
      }


      else if (this.currentQuestionIndex === 12) {
        this.question_13 = answer.text;
        console.log("Question 13:", answer.text);
      }


      else if (this.currentQuestionIndex === 13) {
        this.question_14 = answer.text;
        console.log("Question 14:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 14) {
        this.question_15 = answer.text;
        console.log("Question 15:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 15) {
        this.question_16 = answer.text;
        console.log("Question 16:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 16) {
        this.question_17 = answer.text;
        console.log("Question 17:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 17) {
        this.question_18 = answer.text;
        console.log("Question 18:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 18) {
        this.question_19 = answer.text;
        console.log("Question 19:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 19) {
        this.question_20 = answer.text;
        console.log("Question 20:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 20) {
        this.question_21 = answer.text;
        console.log("Question 21:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 21) {
        this.question_22 = answer.text;
        console.log("Question 22:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 22) {
        this.question_23 = answer.text;
        console.log("Question 23:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 23) {
        this.question_24 = answer.text;
        console.log("Question 24:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 24) {
        this.question_25 = answer.text;
        console.log("Question 25:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 25) {
        this.question_26 = answer.text;
        console.log("Question 26:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 26) {
        this.question_27 = answer.text;
        console.log("Question 27:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 27) {
        this.question_28 = answer.text;
        console.log("Question 28:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 28) {
        this.question_29 = answer.text;
        console.log("Question 29:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 29) {
        this.question_30 = answer.text;
        console.log("Question 30:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 30) {
        this.question_31 = answer.text;
        console.log("Question 31:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 31) {
        this.question_32 = answer.text;
        console.log("Question 32:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 32) {
        this.question_33 = answer.text;
        console.log("Question 33:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 33) {
        this.question_34 = answer.text;
        console.log("Question 34:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 34) {
        this.question_35 = answer.text;
        console.log("Question 35:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 35) {
        this.question_36 = answer.text;
        console.log("Question 36:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 36) {
        this.question_37 = answer.text;
        console.log("Question 37:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 37) {
        this.question_38 = answer.text;
        console.log("Question 38:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 38) {
        this.question_39 = answer.text;
        console.log("Question 39:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 39) {
        this.question_40 = answer.text;
        console.log("Question 40:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 40) {
        this.question_41 = answer.text;
        console.log("Question 41:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 41) {
        this.question_42 = answer.text;
        console.log("Question 42:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 42) {
        this.question_43 = answer.text;
        console.log("Question 43:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 43) {
        this.question_44 = answer.text;
        console.log("Question 44:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 44) {
        this.question_45 = answer.text;
        console.log("Question 45:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 45) {
        this.question_46 = answer.text;
        console.log("Question 46:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 46) {
        this.question_47 = answer.text;
        console.log("Question 47:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 47) {
        this.question_48 = answer.text;
        console.log("Question 48:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 48) {
        this.question_49 = answer.text;
        console.log("Question 49:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 49) {
        this.question_50 = answer.text;
        console.log("Question 50:", answer.text);
      }
      
      else if (this.currentQuestionIndex == 50) {
        this.question_51 = answer.text;
        console.log("Question 51:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 51) {
        this.question_52 = answer.text;
        console.log("Question 52:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 52) {
        this.question_53 = answer.text;
        console.log("Question 53:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 53) {
        this.question_54 = answer.text; 
        console.log("Question 54:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 54) {
        this.question_55 = answer.text;
        console.log("Question 55:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 55) {
        this.question_56 = answer.text;
        console.log("Question 56:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 56) {
        this.question_57 = answer.text;
        console.log("Question 57:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 57) {
        this.question_58 = answer.text;
        console.log("Question 58:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 58) {
        this.question_59 = answer.text;
        console.log("Question 59:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 59) {
        this.question_60 = answer.text;
        console.log("Question 60:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 60) {
        this.question_61 = answer.text;
        console.log("Question 61:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 61) {
        this.question_62 = answer.text;
        console.log("Question 62:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 62) {
        this.question_63 = answer.text;
        console.log("Question 63:", answer.text);
      }
      
      else if (this.currentQuestionIndex === 63) {
        this.question_64 = answer.text;
        console.log("Question 64:", answer.text);
      }
      

    
      this.currentQuestionIndex++;
     
      },

      

    },


    computed:{
      ...mapGetters('posts', {examinee: 'getPosts'
  }),

    },

    created()
    {
     
      console.log("ID NI",this.examinee.Examinee_ID)
    }

   /*  async created() {
      console.log("Total Correct:", this.totalCorrect);
  }, */
  /* created() {
    const parts = this.text.split('. ');
    if (parts.length === 2) {
      this.firstPart = parts[0] + '.';
      this.secondPart = parts[1];
    }
    
  } */
   
  };
  </script>

<style>
  .jastipay {
  text-align: justify;
  text-justify: inter-word;
  
}
</style>