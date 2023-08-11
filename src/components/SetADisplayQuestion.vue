<template>
    <div class="questions-ctr">
      <v-card class="mx-3 mx-lg-0"  :elevation="isHovering ? 24 : 6">
          <!-- <p><strong>EXAMINEE ID: {{ UserID }}</strong></p>
           <p><strong>Total Correct: {{ totalCorrect }} </strong></p> --> 
         <!--   <v-btn color="green">Save</v-btn> -->
          <p class="mx-3 my-3 " style="font-size:17px"><strong>Instructions:</strong> <span style="font-size:15px">Welcome to the Expanded-City Educational Scholarship Program (E-CESPRO) online examination for SY 2022-2023. Please carefully read and choose the correct answer for each item. The exam consists of 65 questions and one essay type. The time allocation for this exam is only 2 hours, plus an additional 30 minutes for your essay. Warning: Attempting to exit the exam interface or open other browser tabs will automatically exit your examination.</span></p>
        </v-card>
      <div class="progress mx-3 mx-lg-0">

        <div
          class="bar"
          :style="{ width: `${(questionsAnswered / questions.length) * 100}%` }"
        ></div>
        
     
        
        <div class="status">
          {{ questionsAnswered }} out of {{ questions.length }} Questions & Answer
        <!--   Total Correct:{{ totalCorrect }} -->
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
   <!--  <p>Display Splice: {{ firstPart }}</p>
    <p>{{ secondPart }}</p>
    <p>Display ID: {{ examinee.Examinee_ID }}</p> -->
  </div>
  

      </transition-group>
    </v-card>

  
    <!-- <p>Submitted Value: {{ register }}</p> -->
    </div>
  </template>
  
  <script>

  import  { mapActions, mapGetters} from "vuex";


  export default {
    props: {
      register: String
  },

    props: ["questions", "questionsAnswered","totalCorrect"],
    emits: ["question-answered"],
    data(){
        return{
          answer:'',
     /*  text: "C. Geometric sequence", */
      
   
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
      UserID:'',
     
  };
  
},



methods: {
      
  ...mapActions('posts', ['fetchUsers']),

      selectAnswer(answer) {

        if(answer == ''){
          return
        }
        
          this.$emit("question-answered", answer.is_correct);
          if (this.currentQuestionIndex === 0) {
        this.question_1 = answer.text;
        /* console.log("Question 1:", answer.text); */

      const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_1 = parts[0] + '';
        }
        console.log("Question 1:",  this.separate_1);




      } else if (this.currentQuestionIndex === 1) {
        this.question_2 = answer.text;

        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_2 = parts[0] + '';
        }
        console.log("Question 2:",  this.separate_2);


      } else if (this.currentQuestionIndex === 2) {
        this.question_3 = answer.text;
         const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_3 = parts[0] + '';
        }
        console.log("Question 3:",  this.separate_3);
      }

      else if (this.currentQuestionIndex === 3) {
        this.question_4 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_4 = parts[0] + '';
        }
        console.log("Question 4:",  this.separate_4);
      }
      
      else if (this.currentQuestionIndex === 4) {
        this.question_5 = answer.text;

        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_5 = parts[0] + '';
        }
        console.log("Question 5:",  this.separate_5);
        
      }
      else if (this.currentQuestionIndex === 5) {
        this.question_6 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_6 = parts[0] + '';
        }
        console.log("Question 6:",  this.separate_6);
      }

      else if (this.currentQuestionIndex === 6) {
        this.question_7 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_7 = parts[0] + '';
        }
        console.log("Question 7:",  this.separate_7);
      }

      else if (this.currentQuestionIndex === 7) {
        this.question_8 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_8 = parts[0] + '';
        }
        console.log("Question 8:",  this.separate_8);
      }

      else if (this.currentQuestionIndex === 8) {
        this.question_9 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_9 = parts[0] + '';
        }
        console.log("Question 9:",  this.separate_9);
      }

      else if (this.currentQuestionIndex === 9) {
        this.question_10 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_10 = parts[0] + '';
        }
        console.log("Question 10:",  this.separate_10);
      }

      else if (this.currentQuestionIndex === 10) {
        this.question_11 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_11 = parts[0] + '';
        }
        console.log("Question 11:",  this.separate_11);
      }

      else if (this.currentQuestionIndex === 11) {
        this.question_12 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_12 = parts[0] + '';
        }
        console.log("Question 12:",  this.separate_12);
      }


      else if (this.currentQuestionIndex === 12) {
        this.question_13 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_13 = parts[0] + '';
        }
        console.log("Question 13:",  this.separate_13);
      }


      else if (this.currentQuestionIndex === 13) {
        this.question_14 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_14 = parts[0] + '';
        }
        console.log("Question 14:",  this.separate_14);
      }
      
      else if (this.currentQuestionIndex === 14) {
        this.question_15 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_15 = parts[0] + '';
        }
        console.log("Question 15:",  this.separate_15);
      }
      
      else if (this.currentQuestionIndex === 15) {
        this.question_16 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_16 = parts[0] + '';
        }
        console.log("Question 16:",  this.separate_16);
      }
      
      else if (this.currentQuestionIndex === 16) {
        this.question_17 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_17 = parts[0] + '';
        }
        console.log("Question 17:",  this.separate_17);
      }
      
      else if (this.currentQuestionIndex === 17) {
        this.question_18 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_18 = parts[0] + '';
        }
        console.log("Question 18:",  this.separate_18);
      }
      
      else if (this.currentQuestionIndex === 18) {
        this.question_19 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_19 = parts[0] + '';
        }
        console.log("Question 19:",  this.separate_19);
      }
      
      else if (this.currentQuestionIndex === 19) {
        this.question_20 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_20 = parts[0] + '';
        }
        console.log("Question 20:",  this.separate_20);
      }
      
      else if (this.currentQuestionIndex === 20) {
        this.question_21 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_21 = parts[0] + '';
        }
        console.log("Question 21:",  this.separate_21);
      }
      
      else if (this.currentQuestionIndex === 21) {
        this.question_22 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_22 = parts[0] + '';
        }
        console.log("Question 22:",  this.separate_22);
      }
      
      else if (this.currentQuestionIndex === 22) {
        this.question_23 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_23 = parts[0] + '';
        }
        console.log("Question 23:",  this.separate_23);
      }
      
      else if (this.currentQuestionIndex === 23) {
        this.question_24 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_24 = parts[0] + '';
        }
        console.log("Question 24:",  this.separate_24);
      }
      
      else if (this.currentQuestionIndex === 24) {
        this.question_25 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_25 = parts[0] + '';
        }
        console.log("Question 25:",  this.separate_25);
      }
      
      else if (this.currentQuestionIndex === 25) {
        this.question_26 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_26 = parts[0] + '';
        }
        console.log("Question 26:",  this.separate_26);
      }
      
      else if (this.currentQuestionIndex === 26) {
        this.question_27 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_27 = parts[0] + '';
        }
        console.log("Question 27:",  this.separate_27);
      }
      
      else if (this.currentQuestionIndex === 27) {
        this.question_28 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_28 = parts[0] + '';
        }
        console.log("Question 28:",  this.separate_28);
      }
      
      else if (this.currentQuestionIndex === 28) {
        this.question_29 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_29 = parts[0] + '';
        }
        console.log("Question 29:",  this.separate_29);
      }
      
      else if (this.currentQuestionIndex === 29) {
        this.question_30 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_30 = parts[0] + '';
        }
        console.log("Question 30:",  this.separate_30);
      }
      
      else if (this.currentQuestionIndex === 30) {
        this.question_31 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_31 = parts[0] + '';
        }
        console.log("Question 31:",  this.separate_31);
      }
      
      else if (this.currentQuestionIndex === 31) {
        this.question_32 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_32 = parts[0] + '';
        }
        console.log("Question 32:",  this.separate_32);
      }
      
      else if (this.currentQuestionIndex === 32) {
        this.question_33 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_33 = parts[0] + '';
        }
        console.log("Question 33:",  this.separate_33);
      }
      
      else if (this.currentQuestionIndex === 33) {
        this.question_34 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_34 = parts[0] + '';
        }
        console.log("Question 34:",  this.separate_34);
      }
      
      else if (this.currentQuestionIndex === 34) {
        this.question_35 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_35 = parts[0] + '';
        }
        console.log("Question 35:",  this.separate_35);
      }
      
      else if (this.currentQuestionIndex === 35) {
        this.question_36 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_36 = parts[0] + '';
        }
        console.log("Question 36:",  this.separate_36);
      }
      
      else if (this.currentQuestionIndex === 36) {
        this.question_37 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_37 = parts[0] + '';
        }
        console.log("Question 37:",  this.separate_37);
      }
      
      else if (this.currentQuestionIndex === 37) {
        this.question_38 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_38 = parts[0] + '';
        }
        console.log("Question 38:",  this.separate_38);
      }
      
      else if (this.currentQuestionIndex === 38) {
        this.question_39 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_39 = parts[0] + '';
        }
        console.log("Question 39:",  this.separate_39);
      }
      
      else if (this.currentQuestionIndex === 39) {
        this.question_40 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_40 = parts[0] + '';
        }
        console.log("Question 40:",  this.separate_40);
      }
      
      else if (this.currentQuestionIndex === 40) {
        this.question_41 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_41 = parts[0] + '';
        }
        console.log("Question 41:",  this.separate_41);
      }
      
      else if (this.currentQuestionIndex === 41) {
        this.question_42 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_42 = parts[0] + '';
        }
        console.log("Question 42:",  this.separate_42);
      }
      
      else if (this.currentQuestionIndex === 42) {
        this.question_43 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_43 = parts[0] + '';
        }
        console.log("Question 43:",  this.separate_43);
      }
      
      else if (this.currentQuestionIndex === 43) {
        this.question_44 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_44 = parts[0] + '';
        }
        console.log("Question 44:",  this.separate_44);
      }
      
      else if (this.currentQuestionIndex === 44) {
        this.question_45 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_45 = parts[0] + '';
        }
        console.log("Question 45:",  this.separate_45);
      }
      
      else if (this.currentQuestionIndex === 45) {
        this.question_46 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_46 = parts[0] + '';
        }
        console.log("Question 46:",  this.separate_46);
      }
      
      else if (this.currentQuestionIndex === 46) {
        this.question_47 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_47 = parts[0] + '';
        }
        console.log("Question 47:",  this.separate_47);
      }
      
      else if (this.currentQuestionIndex === 47) {
        this.question_48 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_48 = parts[0] + '';
        }
        console.log("Question 48:",  this.separate_48);
      }
      
      else if (this.currentQuestionIndex === 48) {
        this.question_49 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_49 = parts[0] + '';
        }
        console.log("Question 49:",  this.separate_49);
      }
      
      else if (this.currentQuestionIndex === 49) {
        this.question_50 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_50 = parts[0] + '';
        }
        console.log("Question 50:",  this.separate_50);
      }
      
      else if (this.currentQuestionIndex == 50) {
        this.question_51 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_51 = parts[0] + '';
        }
        console.log("Question 51:",  this.separate_51);
      }
      
      else if (this.currentQuestionIndex === 51) {
        this.question_52 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_52 = parts[0] + '';
        }
        console.log("Question 52:",  this.separate_52);
      }
      
      else if (this.currentQuestionIndex === 52) {
        this.question_53 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_53 = parts[0] + '';
        }
        console.log("Question 53:",  this.separate_53);
      }
      
      else if (this.currentQuestionIndex === 53) {
        this.question_54 = answer.text; 
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_54 = parts[0] + '';
        }
        console.log("Question 54:",  this.separate_54);
      }
      
      else if (this.currentQuestionIndex === 54) {
        this.question_55 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_55 = parts[0] + '';
        }
        console.log("Question 55:",  this.separate_55);
      }
      
      else if (this.currentQuestionIndex === 55) {
        this.question_56 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_56 = parts[0] + '';
        }
        console.log("Question 56:",  this.separate_56);
      }
      
      else if (this.currentQuestionIndex === 56) {
        this.question_57 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_57 = parts[0] + '';
        }
        console.log("Question 57:",  this.separate_57);
      }
      
      else if (this.currentQuestionIndex === 57) {
        this.question_58 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_58 = parts[0] + '';
        }
        console.log("Question 58:",  this.separate_58);
      }
      
      else if (this.currentQuestionIndex === 58) {
        this.question_59 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_59 = parts[0] + '';
        }
        console.log("Question 59:",  this.separate_59);
      }
      
      else if (this.currentQuestionIndex === 59) {
        this.question_60 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_60 = parts[0] + '';
        }
        console.log("Question 60:",  this.separate_60);
      }
      
      else if (this.currentQuestionIndex === 60) {
        this.question_61 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_61 = parts[0] + '';
        }
        console.log("Question 61:",  this.separate_61);
      }
      
      else if (this.currentQuestionIndex === 61) {
        this.question_62 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_62 = parts[0] + '';
        }
        console.log("Question 62:",  this.separate_62);
      }
      
      else if (this.currentQuestionIndex === 62) {
        this.question_63 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_63 = parts[0] + '';
        }
        console.log("Question 5:",  this.separate_63);
      }
      
      else if (this.currentQuestionIndex === 63) {
        this.question_64 = answer.text;
        const parts = this.answer.text.split('.)');
      if (parts.length === 2) {
      this.separate_64 = parts[0] + '';
        }
        console.log("Question 64:",  this.separate_64);
      }
      
      this.currentQuestionIndex++;
      if(answer.is_correct == "None"){
        this.currentQuestionIndex--;
      }
         this.answer='';
      

        },
        
    
      

        

    },


    computed:{
      ...mapGetters('posts', {examinee: 'getPosts',
     /*  ...mapGetters('posts', {users: 'getPosts' */
  }),

    },

    created()
    {
      console.log("ID NI",localStorage.getItem('Examinee_ID'))
     this.UserID=localStorage.getItem('Examinee_ID')

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