<template>
  
  <v-app> 
   
   <!--  <Headerss/> -->
    
   <div class="text-center mt-1">
            <h5>CITY OF TAGUM</h5>
            <h5>City Public Education and Employment Services Office</h5>
            <h5>EXPANDED-CITY EDUCATIONAL SCHOLARSHIP PROGRAM</h5>
            <p>Qualifying Examination</p>
          </div>
          <div class="text-center mt-5">
            <h3>SET A</h3>
           
          </div>

   <div class="ctr mt-5">
  
    <!-- <transition  class="mt-5" name="fade" mode="out-in"> -->
      

      <SetADisplayQuestion
     
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
      PROCEED
    </button>

  </div>
</v-app>

</template>

<script>


import SetADisplayQuestion from "../components/SetADisplayQuestion.vue";
/* import Result from "./components/Result.vue"; */

export default {
  name: "App",
  components: {
    SetADisplayQuestion,
   
    /* Result, */
  },
  data() {
    return {
      questionsAnswered: 0,
      totalCorrect: 0,
      questions: [

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "1. If a rectangle has a length of 8 units and a width of 5 units, what is its area?",
          answers: [
            {
              text: "A. 10 sq. units",
              is_correct: true,
            },
            {
              text: "B. 40 sq. units",
              is_correct: false,
            },
            {
              text: "C. 20 sq. units",
              is_correct: false,
            },
            {
              text: "D. 80 sq. units",
              is_correct: false,
            },
          ],
        },
        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
         
          q: "2.	In a sequence of numbers, each term is the sum of the previous two terms. What is this sequence called?",
          answers: [
            {
              text: "A. Fibonacci sequence",
              is_correct: false,
            },
            {
              text: "B. Arithmetic sequence",
              is_correct: true,
            },
            {
              text: "C. Geometric sequence",
              is_correct: false,
            },
            {
              text: "D. Harmonic sequence",
              is_correct: false,
            },
          ],
        },

        {

          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '3.	A car travels at a constant speed of 60 km/h. How far will it travel in 3 hours?',
          answers: [
            {
              text: "A. 120 km",
              is_correct: false,
            },
            {
              text: "B. 180 km",
              is_correct: false,
            },
            {
              text: "C. 300 km",
              is_correct: true,
            },
            {
              text: "D. 380 km",
              is_correct: false,
            },
          ],
        },
        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '4.	Solve the equation: 3x2 + 5x + 2 = 0. What are the solutions for x? ',
          answers: [
            {
              text: "A. x = -1, x = -2/3",
              is_correct: false,
            },
            {
              text: "B. x = 1, x = 2/3",
              is_correct: false,
            },
            {
              text: "C. x = -2, x = -1/3",
              is_correct: true,
            },
            {
              text: "D. x = 2, x = 1/3",
              is_correct: false,
            },
          ],
        },
        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '5.	Find the value of x if y= 7 in the equation: 2x + 4y = 50',
          answers: [
            {
              text: "A. 8",
              is_correct: false,
            },
            {
              text: "B. 11",
              is_correct: false,
            },
            {
              text: "C. 10",
              is_correct: true,
            },
            {
              text: "D. 12",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '6. If the following quantities were arranged from the least to the greatest, which one would have the second greatest value?',
          answers: [
            {
              text: "A. 4/10",
              is_correct: false,
            },
            {
              text: "B. 5/12",
              is_correct: false,
            },
            {
              text: "C. 6/12",
              is_correct: true,
            },
            {
              text: "D. ¾",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '7. The What is the value of the expression: (3! + 2! - 1!) ÷ (4! - 2! + 1!)?',
          answers: [
            {
              text: "A. 1",
              is_correct: false,
            },
            {
              text: "B. 2",
              is_correct: false,
            },
            {
              text: "C. 3",
              is_correct: true,
            },
            {
              text: "D. 4",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '8. The co-operative trust fund is P500,000. Part of the fund is invested at an annual interest rate of 6% and the rest is invested at an annual interest rate of 8%. If the income from both investments is P39,000, how much is invested at each rate?',
          answers: [
            {
              text: "A. P100,000 at 6% ; P400,000 at 8%",
              is_correct: false,
            },
            {
              text: "B. P80,000 at 6% ; P420,000 at 8%",
              is_correct: false,
            },
            {
              text: "C. P75,000 at 6% ; P425,000 at 8%",
              is_correct: true,
            },
            {
              text: "D. P50,000 at 6% ; P450,000 at 8%",
              is_correct: false,
            },
            {
              text: "E. P25,000 at 6% ; P475,000 at 8%",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '9. The entrance fee in a carnival is P50 for an adult and P25 for a child. Wing Berth pays P225 for the entrance fee of his family. If his family has equal number of adults and children, how many are they in the family?',
          answers: [
            {
              text: "A. 12",
              is_correct: false,
            },
            {
              text: "B. 10",
              is_correct: false,
            },
            {
              text: "C. 8",
              is_correct: true,
            },
            {
              text: "D. 6",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '10.	Nelia The sum of three consecutive odd integers is 75. What is the largest of these three integers?',
          answers: [
            {
              text: "A. 29",
              is_correct: false,
            },
            {
              text: "B. 27",
              is_correct: false,
            },
            {
              text: "C. 25",
              is_correct: true,
            },
            {
              text: "D. 21",
              is_correct: false,
            },
          ],
        },
       

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '11.	Which of these has the longest perimeter?',
          answers: [
            {
              text: "A. square 21 cm on a side",
              is_correct: false,
            },
            {
              text: "B. A rectangle 19 cm long and 24 cm wide",
              is_correct: false,
            },
            {
              text: "C. An equilateral triangle whose side is 28 cm",
              is_correct: true,
            },
            {
              text: "D. A right triangle whose two legs are 24 and 32 cm",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '12.	In What is the value of π (pi) approximately?',
          answers: [
            {
              text: "A. 3.14",
              is_correct: false,
            },
            {
              text: "B. 2.71",
              is_correct: false,
            },
            {
              text: "C. 1.62",
              is_correct: true,
            },
            {
              text: "D. 4.20",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '13.	If a cube has a volume of 64 cubic units, what is the length of one side?',
          answers: [
            {
              text: "A. 2",
              is_correct: false,
            },
            {
              text: "B. 4",
              is_correct: false,
            },
            {
              text: "C. 8",
              is_correct: true,
            },
            {
              text: "D. 6",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '14.	A factory produced 2500 TV sets in its first year of production. 4800 sets were produced in its second year and 500 more sets were produced in its third year than in its second year. How many TV sets were produced in three years?',
          answers: [
            {
              text: "A. 11,800",
              is_correct: false,
            },
            {
              text: "B. 12,600",
              is_correct: false,
            },
            {
              text: "C. 10, 800",
              is_correct: true,
            },
            {
              text: "D. 13, 800",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '15.	Ten nurses earn a total average monthly salary of P480,000. The total average income of 6 of them amounts to P300, 000. What is the average total income of each of the remaining workers?',
          answers: [
            {
              text: "A. P80,000",
              is_correct: false,
            },
            {
              text: "B. P40,000",
              is_correct: false,
            },
            {
              text: "C. P20, 000",
              is_correct: true,
            },
            {
              text: "D. P45,000",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '16.	A taxi charges P50 for the first kilometer and charges P3 for each additional mile. How far could P200 go?',
          answers: [
            {
              text: "A. 50 km",
              is_correct: false,
            },
            {
              text: "B. 51 km",
              is_correct: false,
            },
            {
              text: "C. 66. 67 km",
              is_correct: true,
            },
            {
              text: "D. 4 km",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '17.	45 is 60% of what number?',
          answers: [
            {
              text: "A. 125",
              is_correct: false,
            },
            {
              text: "B. 80",
              is_correct: false,
            },
            {
              text: "C. 75",
              is_correct: true,
            },
            {
              text: "D. 92",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '18.	What is 150% of 298?',
          answers: [
            {
              text: "A. 447",
              is_correct: false,
            },
            {
              text: "B. 44.7",
              is_correct: false,
            },
            {
              text: "C. 4.47",
              is_correct: true,
            },
            {
              text: "D. 4470",
              is_correct: false,
            },
          ],
        },

        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '19.	What is the area of a circle with a diameter of 10 units?',
          answers: [
            {
              text: "A. 78.5 sq. m",
              is_correct: false,
            },
            {
              text: "B. 75.8 sq. m",
              is_correct: false,
            },
            {
              text: "C. 85.5 sq. m",
              is_correct: true,
            },
            {
              text: "D. 87.5 sq. m",
              is_correct: false,
            },
          ],
        },


        {
          subject:"MATHEMATICS ",
          direction:"Direction:",
          displaydirection:"Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: '20.	An online shop sells a certain calculator for P950 and charges P150 for shipping within Manila, regardless of the number of calculators ordered. Which of the following equations shows the total cost (y) of an order as a function of the number of calculators ordered (x)?',
          answers: [
            {
              text: "A. y = (950 + 150) x",
              is_correct: false,
            },
            {
              text: "B. y = 150x +950",
              is_correct: false,
            },
            {
              text: "C. x = 950y + 150",
              is_correct: true,
            },
            {
              text: "D. y = 950x + 150",
              is_correct: false,
            },
          ],
        },


        {
          subject:"GENERAL INFORMATION ",
          q: '21.	Who is credited with inventing the telephone?',
          answers: [
            {
              text: "A. Alexander Graham Bell",
              is_correct: false,
            },
            {
              text: "B. Thomas Edison",
              is_correct: false,
            },
            {
              text: "C. Nikola Tesla",
              is_correct: true,
            },
            {
              text: "D. Albert Einstein",
              is_correct: false,
            },
          ],
        },


        {
          subject:"GENERAL INFORMATION ",
          q: 'sssssssssssssssssssssssssssssss',
          answers: [
            {
              text: "aaaaaaaaaaaaaaa",
              is_correct: false,
            },
            {
              text: "bbbbbbbbbbbbbbbb",
              is_correct: false,
            },
            {
              text: "ccccccccccccccccc",
              is_correct: true,
            },
            {
              text: "dddddddddddddddddddd",
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
      ], */


      
    };
  },
  methods: {
    questionAnswered(is_correct) {
      if (is_correct) {
        this.totalCorrect++;
      }

      this.questionsAnswered++;
    },
   /*  reset() {
      this.questionsAnswered = 0;
      this.totalCorrect = 0;
    }, */
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