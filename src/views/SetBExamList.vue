<template>
  
    <v-app> 
     
     <!--  <Headerss/> -->
      
     <div class="text-center mt-5">
              <h5>CITY OF TAGUM</h5>
              <h5>City Public Education and Employment Services Office</h5>
              <h5>EXPANDED-CITY EDUCATIONAL SCHOLARSHIP PROGRAM</h5>
              <p>Qualifying Examination</p>
            </div>
            <div class="text-center mt-5">
              <h3>SET B</h3>
             
            </div>
  
     <div class="ctr mt-5">
    
      <!-- <transition  class="mt-5" name="fade" mode="out-in"> -->
        
  
        <SetBDisplayQuestion
       
          v-if="questionsAnswered < questions.length"
          :questions="questions"
          :questionsAnswered="questionsAnswered"
          @question-answered="questionAnswered"
        />
  
      <!--   <result v-else :results="results" :totalCorrect="totalCorrect" /> -->
        
     <!--  </transition> -->
  
      <button
        type="button"
        class="reset-btn"
        @click.prevent="reset"
        v-if="questionsAnswered === questions.length"
      >
        Reset
      </button>
  
    </div>
  </v-app>
  
  </template>
  
  <script>
 
  
  import SetBDisplayQuestion from "../components/SetBDisplayQuestion.vue";
  /* import Result from "./components/Result.vue"; */
  
  export default {
    name: "App",
    components: {
        SetBDisplayQuestion,
  
      /* Result, */
    },
    data() {
      return {
        questionsAnswered: 0,
        totalCorrect: 0,
        questions: [
          {
            q: "1. Who is credited with inventing the telephone?",
            answers: [
              {
                text: "A. Alexander Graham Bell",
                is_correct: true,
              },
              {
                text: "B. Thomas Edison",
                is_correct: false,
              },
              {
                text: "C. Nikola Tesla",
                is_correct: false,
              },
              {
                text: "D. Albert Einstein",
                is_correct: false,
              },
            ],
          },

          {
            q: "2.	Aside from the Philippines, which countries claim part of the Spratly islands in the South China Sea?",
            answers: [
              {
                text: "A. China, Thailand, Brunei, Malaysia",
                is_correct: true,
              },
              {
                text: "B. China, Taiwan, Vietnam, Malaysia",
                is_correct: false,
              },
              {
                text: "C. Indonesia, China, Taiwan, Malaysia",
                is_correct: false,
              },
              {
                text: "D. China, Thailand, Brunei, Malaysia",
                is_correct: false,
              },
            ],
          },

          {
            q: "3. The following are our constitutional rights EXCEPT",
            answers: [
              {
                text: "A. Free access to legal assistance which shall not be denied due to poverty",
                is_correct: true,
              },
              {
                text: "B. Have access to all records of the government",
                is_correct: false,
              },
              {
                text: "C. Be presumed innocent until proven guilty",
                is_correct: false,
              },
              {
                text: "D. Form association and labor unions",
                is_correct: false,
              },
            ],
          },

          {
            q: "4. In which poem did Rizal write about offering one’s life for one’s country?",
            answers: [
              {
                text: "A. A La Juventud Filipina",
                is_correct: true,
              },
              {
                text: "B. Mi Ultimo Adios",
                is_correct: false,
              },
              {
                text: "C. Song of Maria Clara",
                is_correct: false,
              },
              {
                text: "D. Florante and Laura",
                is_correct: false,
              },
            ],
          },

          {
            q: "5.	How Who painted the famous artwork 'The Last Supper?'  ",
            answers: [
              {
                text: "A. Leonardo da Vinci",
                is_correct: true,
              },
              {
                text: "B. Vincent van Gogh",
                is_correct: false,
              },
              {
                text: "C. Pablo Picasso",
                is_correct: false,
              },
              {
                text: "D. Michelangelo",
                is_correct: false,
              },
            ],
          },

          {
            q: "6. Who is known as the 'Father of Modern Physics'?",
            answers: [
              {
                text: "A. Isaac Newton",
                is_correct: true,
              },
              {
                text: "B. Galileo Galilei",
                is_correct: false,
              },
              {
                text: "C. Albert Einstein",
                is_correct: false,
              },
              {
                text: "D. Stephen Hawking",
                is_correct: false,
              },
            ],
          },


          {
            q: "7. Association of Southeast Asian Nations (ASEAN) aims to accelerate economic growth, stability, social progress and cultural development in the spirit of equality and partnership to strengthen prosperous and peaceful community along Southeast Asian Nations. Which of the following countries is not a member of ASEAN?",
            answers: [
              {
                text: "A. Hong Kong",
                is_correct: true,
              },
              {
                text: "B. Philippines",
                is_correct: false,
              },
              {
                text: "C. Singapore",
                is_correct: false,
              },
              {
                text: "D. Thailand",
                is_correct: false,
              },
            ],
          },

          {
            q: "8. The Spanish expedition responsible for naming the archipelago Filipinas.",
            answers: [
              {
                text: "A. Magellan’s expedition",
                is_correct: true,
              },
              {
                text: "B. Legaspi expedition",
                is_correct: false,
              },
              {
                text: "C. Loarca expedition",
                is_correct: false,
              },
              {
                text: "D. Villalobos expedition",
                is_correct: false,
              },
            ],
          },


          {
            q: "9. What is the largest organ in the human body?",
            answers: [
              {
                text: "A. Brain",
                is_correct: true,
              },
              {
                text: "B. Veins",
                is_correct: false,
              },
              {
                text: "C. Heart",
                is_correct: false,
              },
              {
                text: "D. Skin",
                is_correct: false,
              },
            ],
          },


          {
            q: "10.	What is the capital city of France?",
            answers: [
              {
                text: "A. Rome",
                is_correct: true,
              },
              {
                text: "B. Paris",
                is_correct: false,
              },
              {
                text: "C. Italy",
                is_correct: false,
              },
              {
                text: "D. London",
                is_correct: false,
              },
            ],
          },

          {
            q: "11.	Who among the Presidents changed the date of our celebration of Independence Day from July 4 to June 12?",
            answers: [
              {
                text: "A. Ramon Magsaysay",
                is_correct: true,
              },
              {
                text: "B. Ferdinand Marcos",
                is_correct: false,
              },
              {
                text: "C. Diosdado Macapagal",
                is_correct: false,
              },
              {
                text: "D. Gloria Macapagal- Arroyo",
                is_correct: false,
              },
            ],
          },

          {
            q: "12.	The term that refers to the class of Filipinos who were free and independent.",
            answers: [
              {
                text: "A. Timawa",
                is_correct: true,
              },
              {
                text: "B. Aliping sagigilid",
                is_correct: false,
              },
              {
                text: "C. Maharlika",
                is_correct: false,
              },
              {
                text: "D. Mga sangre",
                is_correct: false,
              },
            ],
          },

          {
            q: "13.	Which continent is home to the Amazon rainforest?",
            answers: [
              {
                text: "A.	Africa",
                is_correct: true,
              },
              {
                text: "B. Europe",
                is_correct: false,
              },
              {
                text: "C. South America",
                is_correct: false,
              },
              {
                text: "D. Asia",
                is_correct: false,
              },
            ],
          },

          {
            q: "14.	What is the largest mammal on Earth?",
            answers: [
              {
                text: "A.	Human",
                is_correct: true,
              },
              {
                text: "B. Elephant",
                is_correct: false,
              },
              {
                text: "C. Giraffe",
                is_correct: false,
              },
              {
                text: "D. Blue Whale",
                is_correct: false,
              },
            ],
          },


          {
            q: "15.	Section 3, Article XIV states that “All educational institutions shall include the study of ______ as part of the curriculum.”",
            answers: [
              {
                text: "A. History",
                is_correct: true,
              },
              {
                text: "B. Filipino",
                is_correct: false,
              },
              {
                text: "C. Sports",
                is_correct: false,
              },
              {
                text: "D. Constitution",
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
      };
    },
    methods: {
      questionAnswered(is_correct) {
        if (is_correct) {
          this.totalCorrect++;
        }
  
        this.questionsAnswered++;
      },
      reset() {
        this.questionsAnswered = 0;
        this.totalCorrect = 0;
      },
    },
  };
  </script>
  
  
  <style>
  * {
      box-sizing: border-box;
    }
    body {
      font-size: 20px;
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
      background-color: #00ca8c;
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
      font-size: 18px;
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
      position: relative;
    }
    .bar {
      height: 50px;
      background-color: #ff6372;
      transition: all 0.3s linear;
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
      background-color: #ff6372;
        border: 0;
        font-size: 22px;
        color: #fff;
        padding: 10px 25px;
        margin: 10px auto;
        display: block;
    }
    
    .result{ 
      width: 100%;
    }
    
    
    .reset-btn:active, .reset-btn:focus, .reset-btn:hover{
      border: 0;
      outline: 0;
    }
    
  </style>