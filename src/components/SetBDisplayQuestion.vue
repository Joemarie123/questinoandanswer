<template>

  <div class="questions-ctr">

   <!--  <SetAExamList/> -->
    <v-dialog v-model="dialogforstopexam" persistent>
      <v-container>
      <v-card>
      <p class="text-center mt-4">
      Time is Up!!
      </p>
      <v-card-actions>
        <v-btn color="primary" block @click="$router.push({ name: 'Home' })">Close Dialog</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
    </v-dialog>

    <v-card class="mx-3 mx-lg-0"  :elevation="isHovering ? 24 : 6">
        <!-- <p><strong>EXAMINEE ID: {{ UserID }}</strong></p>
      </p> --> 
     <!--  <p><strong>Total Correct: {{ totalCorrect }} </strong></p> -->
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
            <v-radio v-for="answer in question.answers" :key="answer.text"
               :label="answer.text" :value="answer"
              ></v-radio>
    
          </v-radio-group>
          <v-btn color="green" @click="selectAnswer(answer)">SUBMIT</v-btn>
        </div>

      <!--   Total Correct:{{ totalCorrect }} -->
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

 <!--  <div v-if="questionsAnswered === questions.length">
    <h1>AKo nagud ni</h1>
  </div>
 -->
  <!-- <p>Submitted Value: {{ register }}</p> -->
  </div>
 <!--  <v-btn color="green" @click="saveall()">Save</v-btn> -->
</template>

<script>

/* import SetAExamList from "../views/SetAExamList.vue"; */
import  { mapActions, mapGetters} from "vuex";


export default {
 


  props: {
    register: String
},
components: {

 
  /* Result, */
},

  props: ["questions", "questionsAnswered","totalCorrect"],
  emits: ["question-answered","plusone","englishtrap"],
  data(){
      return{
        answer:'',
   /*  text: "C. Geometric sequence", */
   dialogforstopexam:false,

 
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


 separate_1: '',
separate_2: '',
    separate_3: '',
    separate_4: '',
   separate_5: '',
    separate_6: '',
   separate_7: '',
  separate_8: '',
    separate_9: '',
     separate_10: '',
     separate_11: '',
     separate_12: '',
    separate_13: '',
    separate_14: '',
    separate_15: '',
   separate_16: '',
     separate_17: '',
    separate_18: '',
    separate_19: '',
     separate_20: '',
    separate_21: '',
     separate_22: '',
     separate_23: '',
   separate_24: '',
    separate_25: '',
   separate_26: '',
   separate_27: '',
  separate_28: '',
   separate_29: '',
  separate_30: '',
 separate_31: '',
   separate_32: '',
  separate_33: '',
  separate_34: '',
    separate_35: '',
    separate_36: '',
    separate_37: '',
    separate_38: '',
    separate_39: '',
   separate_40: '',
    separate_41: '',
     separate_42: '',
    separate_43: '',
    separate_44: '',
    separate_45: '',
  separate_46: '',
   separate_47: '',
    separate_48: '',
     separate_49: '',
     separate_50: '',
     separate_51: '',
      separate_52: '',
     separate_53: '',
     separate_54: '',
     separate_55: '',
     separate_56: '',
     separate_57: '',
     separate_58: '',
     separate_59: '',
     separate_60: '',
     separate_61: '',
     separate_62: '',
     separate_63: '',
     separate_64 : '',

    answer:[],
    UserID:'',
   finalscore:''
};

},



methods: {
    
...mapActions('posts', ['fetchUsers']),
...mapActions('posts', ['AddExam']),
...mapActions('posts', ['StopExam']),


    selectAnswer(answer) {
      
console.log("score=",this.totalCorrect)
      if(answer == ''){
        return
      }
      if(answer.is_correct!="None"){
        this.$emit("question-answered", answer.is_correct);
      }else{
this.$emit("englishtrap");
      }
        
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
      console.log("Question 63:",  this.separate_63);
    }
    
    else if (this.currentQuestionIndex === 63) {
   /*    if(answer.is_correct){
            
            this.$emit("plusone",answer.is_correct);
            
          } */
      if(answer.is_correct){
        this.finalscore=this.totalCorrect + 2
      }else{
        this.finalscore=this.totalCorrect
      }
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
    
    /*    if(questionsAnswered == questions.length){

        this.saveall();

       } */
/*  console.log("Sample",this.questionsAnswered.length)  */
/* console.log("questions",this.questions.length)  */
/* console.log("questions", this.questions.length - 1); */

this.StopExam().then(e=>{
          
              if (e == 1) {
                console.log("stop all")
                if(answer.question_1){
                    this.finalscore=this.totalCorrect+1

                  }else{
                    this.finalscore=this.totalCorrect
                  }
                  
                let data = new FormData();  
    data.append('Examinee_ID', this.UserID);
    data.append('Question1', this.separate_1);
    data.append('Question2', this.separate_2);
    data.append('Question3', this.separate_3);
    data.append('Question4', this.separate_4);
    data.append('Question5', this.separate_5);
     data.append('Question6', this.separate_6);
     data.append('Question7', this.separate_7);
     data.append('Question8', this.separate_8);
     data.append('Question9', this.separate_9);
     data.append('Question10', this.separate_10);
     data.append('Question11', this.separate_11);
     data.append('Question12', this.separate_12);
     data.append('Question13', this.separate_13);
     data.append('Question14', this.separate_14);
     data.append('Question15', this.separate_15);
     data.append('Question16', this.separate_16);
     data.append('Question17', this.separate_17);
     data.append('Question18', this.separate_18);
     data.append('Question19', this.separate_19);
     data.append('Question20', this.separate_20);
     data.append('Question21', this.separate_21);
     data.append('Question22', this.separate_22);
     data.append('Question23', this.separate_23);
     data.append('Question24', this.separate_24);
     data.append('Question25', this.separate_25);
     data.append('Question26', this.separate_26);
     data.append('Question27', this.separate_27);
     data.append('Question28', this.separate_28);
     data.append('Question29', this.separate_29);
     data.append('Question30', this.separate_30);
     data.append('Question31', this.separate_31);
     data.append('Question32', this.separate_32);
     data.append('Question33', this.separate_33);
     data.append('Question34', this.separate_34);
     data.append('Question35', this.separate_35);
     data.append('Question36', this.separate_36);
     data.append('Question37', this.separate_37);
     data.append('Question38', this.separate_38);
     data.append('Question39', this.separate_39);
     data.append('Question40', this.separate_40);
     data.append('Question41', this.separate_41);
     data.append('Question42', this.separate_42);
     data.append('Question43', this.separate_43);
     data.append('Question44', this.separate_44);
     data.append('Question45', this.separate_45);
     data.append('Question46', this.separate_46);
     data.append('Question47', this.separate_47);
     data.append('Question48', this.separate_48);
     data.append('Question49', this.separate_49);
     data.append('Question50', this.separate_50);
     data.append('Question51', this.separate_51);
     data.append('Question52', this.separate_52);
     data.append('Question53', this.separate_53);
     data.append('Question54', this.separate_54);
     data.append('Question55', this.separate_55);
     data.append('Question56', this.separate_56);
     data.append('Question57', this.separate_57);
     data.append('Question58', this.separate_58);
     data.append('Question59', this.separate_59);
     data.append('Question60', this.separate_60);
     data.append('Question61', this.separate_61);
     data.append('Question62', this.separate_62);
     data.append('Question63', this.separate_63);
     data.append('Question64', this.separate_64);
     data.append('score', this.finalscore);
     this.AddExam(data);
     this.dialogforstopexam = true;           
              }else{
                console.log("continue")
              }
          }).catch(e => console.log("Error =>", e));



       if(this.questionsAnswered === this.questions.length - 1){

        console.log("register");
    let data = new FormData();  
    data.append('Examinee_ID', this.UserID);
    data.append('Question1', this.separate_1);
    data.append('Question2', this.separate_2);
    data.append('Question3', this.separate_3);
    data.append('Question4', this.separate_4);
    data.append('Question5', this.separate_5);
     data.append('Question6', this.separate_6);
     data.append('Question7', this.separate_7);
     data.append('Question8', this.separate_8);
     data.append('Question9', this.separate_9);
     data.append('Question10', this.separate_10);
     data.append('Question11', this.separate_11);
     data.append('Question12', this.separate_12);
     data.append('Question13', this.separate_13);
     data.append('Question14', this.separate_14);
     data.append('Question15', this.separate_15);
     data.append('Question16', this.separate_16);
     data.append('Question17', this.separate_17);
     data.append('Question18', this.separate_18);
     data.append('Question19', this.separate_19);
     data.append('Question20', this.separate_20);
     data.append('Question21', this.separate_21);
     data.append('Question22', this.separate_22);
     data.append('Question23', this.separate_23);
     data.append('Question24', this.separate_24);
     data.append('Question25', this.separate_25);
     data.append('Question26', this.separate_26);
     data.append('Question27', this.separate_27);
     data.append('Question28', this.separate_28);
     data.append('Question29', this.separate_29);
     data.append('Question30', this.separate_30);
     data.append('Question31', this.separate_31);
     data.append('Question32', this.separate_32);
     data.append('Question33', this.separate_33);
     data.append('Question34', this.separate_34);
     data.append('Question35', this.separate_35);
     data.append('Question36', this.separate_36);
     data.append('Question37', this.separate_37);
     data.append('Question38', this.separate_38);
     data.append('Question39', this.separate_39);
     data.append('Question40', this.separate_40);
     data.append('Question41', this.separate_41);
     data.append('Question42', this.separate_42);
     data.append('Question43', this.separate_43);
     data.append('Question44', this.separate_44);
     data.append('Question45', this.separate_45);
     data.append('Question46', this.separate_46);
     data.append('Question47', this.separate_47);
     data.append('Question48', this.separate_48);
     data.append('Question49', this.separate_49);
     data.append('Question50', this.separate_50);
     data.append('Question51', this.separate_51);
     data.append('Question52', this.separate_52);
     data.append('Question53', this.separate_53);
     data.append('Question54', this.separate_54);
     data.append('Question55', this.separate_55);
     data.append('Question56', this.separate_56);
     data.append('Question57', this.separate_57);
     data.append('Question58', this.separate_58);
     data.append('Question59', this.separate_59);
     data.append('Question60', this.separate_60);
     data.append('Question61', this.separate_61);
     data.append('Question62', this.separate_62);
     data.append('Question63', this.separate_63);
     data.append('Question64', this.separate_64);
     data.append('score', this.finalscore);
     this.AddExam(data);
    setTimeout(() => {
        this.loading = false;
    }, 2000)

       }



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