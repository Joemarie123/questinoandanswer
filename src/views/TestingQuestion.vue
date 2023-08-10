<template>
  
    <v-app> 
     
     <!--  <Headerss/> -->
      
     <div class="begin text-center pa-12">
        <h5>CITY OF TAGUM</h5>
        <h5>City Public Education and Employment Services Office</h5>
        <h5>EXPANDED-CITY EDUCATIONAL SCHOLARSHIP PROGRAM</h5>
        <p>Qualifying Examination</p>
      </div>
  
  
  
            <div class="text-center mt-n5">
             
              <div class="timer">    
              <span style="font-size:30px">  {{ formatTime(hours) }} : {{ formatTime(minutes) }} : {{ formatTime(seconds) }} </span>
        </div>
  
      <v-dialog  persistent v-model="isTimeUpDialogOpen" max-width="300">
        <v-card>
          <v-card-text class="time-up-message">Time is up! Please Proceed To Essay</v-card-text>
          <v-btn    @click.prevent="reset" color="green">OK</v-btn>
        </v-card>
      </v-dialog>
            </div>
  
  
  
     <div class="ctr mt-5">
    
      <!-- <transition  class="mt-5" name="fade" mode="out-in"> -->
        
  
        <TestingDisplayQuestion
       
          v-if="questionsAnswered < questions.length"  :questions="questions"
          :questionsAnswered="questionsAnswered"
          @question-answered="questionAnswered"
          :totalCorrect = "totalCorrect"
        />
  
      <!--   <result v-else :results="results" :totalCorrect="totalCorrect" /> -->
        
     <!--  </transition> -->
  
     <div>
  
      <button
        type="button"
        class="reset-btn"
       
        v-if="questionsAnswered === questions.length"
      >
    Congratulations! You've successfully completed the E-CESPRO examination. Please wait for the text or post via PEESO FB Page for those who passed the entrance examination. Thank you.
        <h1>Total CORRECT ANSWER: {{ totalCorrect }}</h1>
      </button>
     
     </div>
  <!-- 
      <h1>{{ totalCorrect }}</h1> -->
  
    </div>
  </v-app>
  
  </template>
  
  <script>
  
  
  import TestingDisplayQuestion from "../components/TestingDisplayQuestion.vue";
  /* import Result from "./components/Result.vue"; */
  
  export default {
    name: "App",
    components: {
        TestingDisplayQuestion,
     
      /* Result, */
    },
    data() {
      return {
        hours: 2,
        minutes: 30,
        seconds: 0,
        isCountdownRunning: false,
        isTimeUp: false,
        isTimeUpDialogOpen: false,
  
  
        questionsAnswered: 0,
        totalCorrect: 0,
        questions: [
  
      /*   {
            subject:" ",
            direction:"",
            displaydirection:"",
            q: "",
            answers: [
              {
                text: "START THE EXAM",
               
              },
   
            
            
            ],
          }, */
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: "1. When did the Philippines declare its independence from Spanish colonial rule?",
            answers: [
              {
                text: "A.) 1888",
                is_correct: false,
              },
              {
                text: "B.) 1898",
                is_correct:  true,
              },
              {
                text: "C.) 1908",
                is_correct: false,
              },
              {
                text: "D.) 1918",
                is_correct: false,
              },
            ],
          },
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
           
            q: "2. Who is considered the national hero of the Philippines?",
            answers: [
              {
                text: "A.) Emilio Aguinaldo",
                is_correct: false,
              },
              {
                text: "B.) Jose Rizal",
                is_correct: true,
              },
              {
                text: "C.) Andres Bonifacio",
                is_correct: false,
              },
              {
                text: "D.) Ferdinand Marcos",
                is_correct: false,
              },
            ],
          },
  
          {
  
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '3. The Battle of Mactan in 1521 is famous for the death of which historical figure?',
            answers: [
              {
                text: "A.) Ferdinand Magellan",
                is_correct: false,
              },
              {
                text: "B.) Lapu-Lapu",
                is_correct: true,
              },
              {
                text: "C.) Emilio Aguinaldo",
                is_correct: true,
              },
              {
                text: "D.) Miguel Lopez de Legazpi",
                is_correct: false,
              },
            ],
          },
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '4.	Which American naval commander uttered the famous phrase, "You may fire when ready, Gridley," during the Battle of Manila Bay in 1898?',
            answers: [
              {
                text: "A.) George Dewey",
                is_correct: true,
              },
              {
                text: "B.) Douglas MacArthur",
                is_correct: false,
              },
              {
                text: "C.) Chester Nimitz",
                is_correct: false,
              },
              {
                text: "D.) William McKinley",
                is_correct: false,
              },
            ],
          },
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '5. What was the name of the secret society that played a crucial role in planning the Philippine Revolution against Spanish colonial rule?',
            answers: [
              {
                text: "A.) Katipunan",
                is_correct: true,
              },
              {
                text: "B.) Hukbalahap",
                is_correct: false,
              },
              {
                text: "C.) Magdalo",
                is_correct: false,
              },
              {
                text: "D.) KKK (Kataastaasan, Kagalanggalangang Katipunan ng mga Anak ng Bayan)",
                is_correct: false,
              },
            ],
          },
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '6. Which Philippine president declared Martial Law in 1972, leading to a period of authoritarian rule?',
            answers: [
              {
                text: "A.) Corazon Aquino",
                is_correct: false,
              },
              {
                text: "B.) Fidel V. Ramos",
                is_correct: false,
              },
              {
                text: "C.) Ferdinand Marcos",
                is_correct: true,
              },
              {
                text: "D.) Diosdado Macapagal",
                is_correct: false,
              },
            ],
          },
  
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '7. The Blood Compact of 1565 symbolized friendship and alliance between Spanish explorer Miguel Lopez de Legazpi and which Filipino chieftain?',
            answers: [
              {
                text: "A.) Rajah Humabon",
                is_correct: true,
              },
              {
                text: "B.) Lapu-Lapu",
                is_correct: false,
              },
              {
                text: "C.) Sultan Kudarat",
                is_correct: false,
              },
              {
                text: "D.) Rajah Soliman",
                is_correct: false,
              },
            ],
          },
  
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '8. Which event marked the beginning of World War II in the Philippines?',
            answers: [
              {
                text: "A.) Bombing of Corregidor",
                is_correct: false,
              },
              {
                text: "B.) Invasion of Manila",
                is_correct: false,
              },
              {
                text: "C.) Attack on Pearl Harbor",
                is_correct: true,
              },
              {
                text: "D.) Battle of Leyte Gulf",
                is_correct: false,
              },
            ],
          },
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '9. The "EDSA People Power Revolution" in 1986 led to the overthrow of which Philippine president?',
            answers: [
              {
                text: "A.) Ferdinand Marcos",
                is_correct: false,
              },
              {
                text: "B.) Joseph Estrada",
                is_correct: false,
              },
              {
                text: "C.) Corazon Aquino",
                is_correct: true,
              },
              {
                text: "D.) Gloria Macapagal-Arroyo",
                is_correct: false,
              },
            ],
          },
  
          {
            subject:"Sampple Question ",
            direction:"",
            displaydirection:"",
            q: '10. Who was the first woman to become president of the Philippines?',
            answers: [
              {
                text: "A.) Corazon Aquino",
                is_correct: false,
              },
              {
                text: "B.) Imelda Marcos",
                is_correct: false,
              },
              {
                text: "C.) Miriam Defensor-Santiago",
                is_correct: true,
              },
              {
                text: "D.) Gloria Macapagal-Arroyo",
                is_correct: false,
              },
            ],
          },
   
  
  
  
        
        ],
  
  
        results: [
          {
            min: 0,
            max: 2,
            title: "Try again!",
            desc: "Do a little more studying and you may succeed!",
          },
          {
            min: 3,
            max: 3,
            title: "Wow, you're a genius!",
            desc: "Studying has definitely paid off for you!",
          },
        ],
  
  
        
       /*  questionssunod: [
          {
            qq: "21. Who is credited with inventing the telephone?",
            answers: [
              {
                text: "A.) Alexander Graham Bell",
                is_correct: true,
              },
              {
                text: "B.) Thomas Edison",
                is_correct: false,
              },
              {
                text: "C.) Nikola Tesla",
                is_correct: false,
              },
              {
                text: "D.) Albert Einstein",
                is_correct: false,
              },
            ],
          },
        ], */
  
  
        
      };
    },
  
  
  
    mounted() {
      this.startCountdown();
    },
  
    methods: {
  
      questionAnswered(is_correct) {
        if(is_correct!="None"){
        if (is_correct) {
          this.totalCorrect++;
        }
      }
  
        this.questionsAnswered++;
      },
  
  
  
      reset() {
        this.$router.push({ name: 'TestingQuestion' });
        this.questionsAnswered = 0;
        this.totalCorrect = 0;
       
      },
  
      
      startCountdown() {
        if (this.isCountdownRunning) return;
        this.isCountdownRunning = true;
  
        let totalSeconds = this.hours * 3600 + this.minutes * 60;
  
        const countdownInterval = setInterval(() => {
          if (totalSeconds > 0) {
            totalSeconds--;
            this.hours = Math.floor(totalSeconds / 3600);
            this.minutes = Math.floor((totalSeconds % 3600) / 60);
            this.seconds = totalSeconds % 60;
          } else {
            clearInterval(countdownInterval);
            this.isCountdownRunning = false;
            this.isTimeUp = true;
            this.isTimeUpDialogOpen = true;
          }
        }, 1000);
      },
      formatTime(time) {
        return time.toString().padStart(2, '0');
      },
  
  
  
    },
  
  
  
  };
  </script>
  
  
  <style>
    @media screen and (max-width: 600px) {
      .responsive-text {
      font-size: 13px; /* Font size for mobile devices */
    }
  
    .responsive-text1 {
      font-size: 11px; /* Font size for mobile devices */
    }
    }
  
  
  
  
    .begin {
    /* margin: auto;
    margin-bottom: -20px;
    margin-top: -1px;
    width: 60%; */
    color: white;
    background-color: green;
  }
  .timer{
    color: green;
    background-color: yellow;
    padding: 20px;
  }
  * {
    box-sizing: border-box;
  }
  body {
    font-size: 15px;
    font-family: sans-serif;
    padding-top: 20px;
    background: #e6ecf1;
  }
  
  .ctr {
    margin: 0 auto;
    max-width: 600px;
    width: 100%;
    box-sizing: border-box;
    position: relative;
  }
  .questions-ctr {
    position: relative;
    width: 100%;
  }
  .question { 
    width: 100%;
    padding: 20px;
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    background-color: #017214;
    color: #fff;
    box-sizing: border-box;
  }
  .single-question {
    position: relative;
    width: 100%;
    
  }
  .answer {
    border: 1px solid #8e959f;
    padding: 20px;
    font-size: 15px;
    width: 100%;
    background-color: #fff;
    transition: 0.2s linear all;
  }
  .answer span {
    display: inline-block;
    margin-left: 5px;
    font-size: 0.75em;
    font-style: italic;
  }
  .progress {
    height: 50px;
    margin-top: 10px; 
    background-color: #ddd;
    size: 50%;
    position: relative;
  }
  .bar {
    height: 50px;
    background-color: green;
    transition: all 0.3s linear;
    padding: auto;
  }
  .status {
    position: absolute;
    top: 15px;
    left: 0;
    text-align: center;
    color: #fff;
    width: 100%;
  }
  .answer:not(.is-answered) {
    cursor: pointer;
  }
  .answer:not(.is-answered):hover {
    background-color: #57860a41;
    border-color: #3e5c0f;
    color: #fff;
  }
  
  .title {
    width: 100%;
    padding: 20px;
    font-size: 32px;
    font-weight: bold;
    text-align: center;
    background-color: #12cbc4;
    color: #fff;
    box-sizing: border-box;
  }
  .desc {
    border: 1px solid #8e959f;
    padding: 20px;
    font-size: 18px;
    width: 100%;
    background-color: #fff;
    transition: 0.4s linear all;
    text-align: center;
  }
  .fade-enter-from {
    opacity: 0;
  }
  .fade-enter-active {
    transition: all 0.3s linear;
  }
  .fade-leave-active {
    transition: all 0.3s linear;
    opacity: 0;
    position: absolute;
  }
  .fade-leave-to {
    opacity: 0;
  }
  
  .reset-btn {
    background-color: green;
    border: 0;
    font-size: 22px;
    color: #fff;
    padding: 10px 25px;
    margin: 10px auto;
    display: block;
  }
  
  .result {
    width: 100%;
  }
  
  .reset-btn:active,
  .reset-btn:focus,
  .reset-btn:hover {
    border: 0;
    outline: 0;
  }
  </style>