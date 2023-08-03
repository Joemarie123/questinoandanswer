<template>
  <v-app>
    <!--  <Headerss/> -->

    <div class="begin text-center pa-12">
      <h5>CITY OF TAGUM</h5>
      <h5>City Public Education and Employment Services Office</h5>
      <h5>EXPANDED-CITY EDUCATIONAL SCHOLARSHIP PROGRAM</h5>
      <p>Qualifying Examination</p>
    </div>
    <div class="text-center">
      <div class="timer">
        <strong>SET B - </strong> {{ formatTime(hours) }} :
        {{ formatTime(minutes) }} : {{ formatTime(seconds) }}
      </div>
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

      <v-card
        type="button"
        class="reset-btn"
        @click.prevent="reset"
        v-if="questionsAnswered === questions.length"
      >
        Congratulations! You've successfully completed the E-CESPRO examination.
        Please wait for the text or post via PEESO FB Page for those who passed
        the entrance examination. Thank you.
      </v-card>
    </div>
  </v-app>
</template>
  
  <script>
import router from "@/router";

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
      hours: 2,
      minutes: 30,
      seconds: 0,
      isCountdownRunning: false,

      questionsAnswered: 0,
      totalCorrect: 0,
      questions: [
        {
          subject: "GENERAL INFORMATION ",
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
          subject: "GENERAL INFORMATION ",
          q: "2.	Aside from the Philippines, which countries claim part of the Spratly islands in the South China Sea?",
          answers: [
            {
              text: "A. China, Thailand, Brunei, Malaysia",
              is_correct: false,
            },
            {
              text: "B. China, Taiwan, Vietnam, Malaysia",
              is_correct: true,
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
          subject: "GENERAL INFORMATION ",
          q: "3. The following are our constitutional rights EXCEPT to",
          answers: [
            {
              text: "A. Free access to legal assistance which shall not be denied due to poverty",
              is_correct: false,
            },
            {
              text: "B. Have access to all records of the government",
              is_correct: true,
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
          subject: "GENERAL INFORMATION ",
          q: "4. In which poem did Rizal write about offering one’s life for one’s country?",
          answers: [
            {
              text: "A. A La Juventud Filipina",
              is_correct: false,
            },
            {
              text: "B. Mi Ultimo Adios",
              is_correct: true,
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
          subject: "GENERAL INFORMATION ",
          q: "5. Who painted the famous artwork 'The Last Supper?'  ",
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
          subject: "GENERAL INFORMATION ",
          q: "6. Who is known as the 'Father of Modern Physics'?",
          answers: [
            {
              text: "A. Isaac Newton",
              is_correct: false,
            },
            {
              text: "B. Galileo Galilei",
              is_correct: false,
            },
            {
              text: "C. Albert Einstein",
              is_correct: true,
            },
            {
              text: "D. Stephen Hawking",
              is_correct: false,
            },
          ],
        },

        {
          subject: "GENERAL INFORMATION ",
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
          subject: "GENERAL INFORMATION ",
          q: "8. The Spanish expedition responsible for naming the archipelago Filipinas.",
          answers: [
            {
              text: "A. Magellan’s expedition",
              is_correct: false,
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
              is_correct: true,
            },
          ],
        },

        {
          subject: "GENERAL INFORMATION ",
          q: "9. What is the largest organ in the human body?",
          answers: [
            {
              text: "A. Brain",
              is_correct: false,
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
              is_correct: true,
            },
          ],
        },

        {
          subject: "GENERAL INFORMATION ",
          q: "10.	What is the capital city of France?",
          answers: [
            {
              text: "A. Rome",
              is_correct: false,
            },
            {
              text: "B. Paris",
              is_correct: true,
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
          subject: "GENERAL INFORMATION ",
          q: "11.	Who among the Presidents changed the date of our celebration of Independence Day from July 4 to June 12?",
          answers: [
            {
              text: "A. Ramon Magsaysay",
              is_correct: false,
            },
            {
              text: "B. Ferdinand Marcos",
              is_correct: false,
            },
            {
              text: "C. Diosdado Macapagal",
              is_correct: true,
            },
            {
              text: "D. Gloria Macapagal- Arroyo",
              is_correct: false,
            },
          ],
        },

        {
          subject: "GENERAL INFORMATION ",
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
          subject: "GENERAL INFORMATION ",
          q: "13.	Which continent is home to the Amazon rainforest?",
          answers: [
            {
              text: "A.	Africa",
              is_correct: false,
            },
            {
              text: "B. Europe",
              is_correct: false,
            },
            {
              text: "C. South America",
              is_correct: true,
            },
            {
              text: "D. Asia",
              is_correct: false,
            },
          ],
        },

        {
          subject: "GENERAL INFORMATION ",
          q: "14.	What is the largest mammal on Earth?",
          answers: [
            {
              text: "A.	Human",
              is_correct: false,
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
              is_correct: true,
            },
          ],
        },

        {
          subject: "GENERAL INFORMATION ",
          q: "15.	Section 3, Article XIV states that “All educational institutions shall include the study of ______ as part of the curriculum.”",
          answers: [
            {
              text: "A. History",
              is_correct: false,
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
              is_correct: true,
            },
          ],
        },
        // MATHEMATICS
        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "16. If a rectangle has a length of 8 units and a width of 5 units, what is its area?",
          answers: [
            {
              text: "A. 10 sq. units",
              is_correct: false,
            },
            {
              text: "B. 40 sq. units",
              is_correct: true,
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
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "17. In a sequence of numbers, each term is the sum of the previous two terms. What is this sequence called?",
          answers: [
            {
              text: "A. Fibonacci sequence",
              is_correct: true,
            },
            {
              text: "B.  Arithmetic sequence",
              is_correct: false,
            },
            {
              text: "C.  Geometric sequence",
              is_correct: false,
            },
            {
              text: "D.  Harmonic sequence",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "18. A car travels at a constant speed of 60 km/h. How far will it travel in 3 hours?",
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
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "19. Solve the equation: 3x2 + 5x + 2 = 0. What are the solutions for x?",
          answers: [
            {
              text: "A. x = -1, x = -2/3",
              is_correct: true,
            },
            {
              text: "B.  x = 1, x = 2/3",
              is_correct: false,
            },
            {
              text: "C.  x = -2, x = -1/3",
              is_correct: false,
            },
            {
              text: "D. x = 2, x = 1/3",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "20. Find the value of x if y= 7 in the equation: 2x + 4y = 50",
          answers: [
            {
              text: "A. 8",
              is_correct: false,
            },
            {
              text: "B. 11",
              is_correct: true,
            },
            {
              text: "C. 10",
              is_correct: false,
            },
            {
              text: "D. 12",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "21. If the following quantities were arranged from the least to the greatest, which one would have the second greatest value?",
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
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "22. What is the value of the expression: (3! + 2! - 1!) ÷ (4! - 2! + 1!)?",
          answers: [
            {
              text: "A. 1",
              is_correct: false,
            },
            {
              text: "B. 2",
              is_correct: true,
            },
            {
              text: "C. 3",
              is_correct: false,
            },
            {
              text: "D. 4",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "23. The co-operative trust fund is P500,000. Part of the fund is invested at an annual interest rate of 6% and the rest is invested at an annual interest rate of 8%. If the income from both investments is P39,000, how much is invested at each rate?",
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
              is_correct: false,
            },
            {
              text: "D. P50,000 at 6% ; P450,000 at 8%",
              is_correct: true,
            },
            {
              text: "E. P25,000 at 6% ; P475,000 at 8%",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "24. The entrance fee in a carnival is P50 for an adult and P25 for a child. Wing Berth pays P225 for the entrance fee of his family. If his family has equal number of adults and children, how many are they in the family?",
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
              is_correct: false,
            },
            {
              text: "D. 6",
              is_correct: true,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "25. The sum of three consecutive odd integers is 75. What is the largest of these three integers?",
          answers: [
            {
              text: "A. 29",
              is_correct: false,
            },
            {
              text: "B. 27",
              is_correct: true,
            },
            {
              text: "C. 25",
              is_correct: false,
            },
            {
              text: "D. 21",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "26. Which of these has the longest perimeter?",
          answers: [
            {
              text: "A. A square 21 cm on a side",
              is_correct: false,
            },
            {
              text: "B. A rectangle 19 cm long and 24 cm wide",
              is_correct: false,
            },
            {
              text: "C. An equilateral triangle whose side is 28 cm",
              is_correct: false,
            },
            {
              text: "D. A right triangle whose two legs are 24 and 32 cm",
              is_correct: true,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "27. What is the value of π (pi) approximately?",
          answers: [
            {
              text: "A. 3.14",
              is_correct: true,
            },
            {
              text: "B.  2.71",
              is_correct: false,
            },
            {
              text: "C. 1.62",
              is_correct: false,
            },
            {
              text: "D. 4.20",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "28. If a cube has a volume of 64 cubic units, what is the length of one side?",
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
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "29. A factory produced 2500 TV sets in its first year of production. 4800 sets were produced in its second year and 500 more sets were produced in its third year than in its second year. How many TV sets were produced in three years?",
          answers: [
            {
              text: "A. 11,800",
              is_correct: false,
            },
            {
              text: "B. 12,600",
              is_correct: true,
            },
            {
              text: "C. 10, 800",
              is_correct: false,
            },
            {
              text: "D. 13, 800",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "30. Ten nurses earn a total average monthly salary of P480,000. The total average income of 6 of them amounts to P300, 000. What is the average total income of each of the remaining workers?",
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
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "31. A taxi charges P50 for the first kilometer and charges P3 for each additional mile. How far could P200 go?",
          answers: [
            {
              text: "A. 50 km",
              is_correct: false,
            },
            {
              text: "B. 51 km",
              is_correct: true,
            },
            {
              text: "C. 66. 67 km",
              is_correct: false,
            },
            {
              text: "D. 4 km",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "32. 45 is 60% of what number?",
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
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "33. What is 150% of 298?",
          answers: [
            {
              text: "A. 447",
              is_correct: true,
            },
            {
              text: "B. 44.7",
              is_correct: false,
            },
            {
              text: "C. 4.47",
              is_correct: false,
            },
            {
              text: "D. 4470",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "34. What is the area of a circle with a diameter of 10 units?",
          answers: [
            {
              text: "A. 78.5 sq. m",
              is_correct: true,
            },
            {
              text: "B. 75.8 sq. m",
              is_correct: false,
            },
            {
              text: "C. 85.5 sq. m",
              is_correct: false,
            },
            {
              text: "D. 87.5 sq. m",
              is_correct: false,
            },
          ],
        },

        {
          subject: "MATHEMATICS ",
          direction: "Direction:",
          displaydirection:
            "Read each item carefully. CALCULATORS ARE STRICTLY PROHIBITED. You may utilize the margin or the backmost portion of this test for your computation",
          q: "35. An online shop sells a certain calculator for P950 and charges P150 for shipping within Manila, regardless of the number of calculators ordered. Which of the following equations shows the total cost (y) of an order as a function of the number of calculators ordered (x)?",
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
              is_correct: false,
            },
            {
              text: "D.  y = 950x + 150",
              is_correct: true,
            },
          ],
        },
        // SCIENCE
        {
          subject: "SCIENCE ",
          q: "36. What kind of mirror is used in cars to give the driver a wider area and smaller image of the traffic behind him/her?",
          answers: [
            {
              text: "A. Double concave",
              is_correct: false,
            },
            {
              text: "B. Convex ",
              is_correct: true,
            },
            {
              text: "C. Plane",
              is_correct: false,
            },
            {
              text: "D. Concave",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "37. Which of the following is a greenhouse gas?",
          answers: [
            {
              text: "A. O",
              is_correct: false,
            },
            {
              text: "B. CO2",
              is_correct: true,
            },
            {
              text: "C. N",
              is_correct: false,
            },
            {
              text: "D. H",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "38. Why do we hear thunder some seconds after seeing lightning?",
          answers: [
            {
              text: "A. Because the famous Pastor lighted the Sky",
              is_correct: false,
            },
            {
              text: "B. Light appears brighter in the sky.",
              is_correct: false,
            },
            {
              text: "C. Light travels faster than sound.",
              is_correct: false,
            },
            {
              text: "D. Sound travels 1.331 m/s",
              is_correct: true,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "39. What is the chemical formula for table salt?",
          answers: [
            {
              text: "A. NaCl",
              is_correct: true,
            },
            {
              text: "B. H2O",
              is_correct: false,
            },
            {
              text: "C. CO2",
              is_correct: false,
            },
            {
              text: "D. KCl",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "40. Which of the following sentences about greenhouse effect is INCORRECT?",
          answers: [
            {
              text: "A. Greenhouse gasses trap heat in the atmosphere which are returned to the earth’s surface.",
              is_correct: false,
            },
            {
              text: "B. Greenhouse effect is important in maintaining the temperature of the earth.",
              is_correct: false,
            },
            {
              text: "C. Greenhouse effect is due to gases that absorb the green region of light from the sun.",
              is_correct: false,
            },
            {
              text: "D.  Greenhouse effect increases the overall surface temperature of the earth.",
              is_correct: true,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "41. Acid rain occurs when _________.",
          answers: [
            {
              text: "A. carbon dioxide combines with water in the atmosphere.",
              is_correct: false,
            },
            {
              text: "B. phosphorus-rich water in lakes evaporates to form phosphoric acid.",
              is_correct: true,
            },
            {
              text: "C.  sulfur released in burning fossil fuels combines with water in the atmosphere.",
              is_correct: false,
            },
            {
              text: "D. excess hydrogen is released into the atmosphere to produce acids.",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "42. PAGASA announces the approach of the seasonal winds. The familiar names used are Amihan and Habagat, internationally known as ________ and ________ respectively.",
          answers: [
            {
              text: "A. Northeast and southwest",
              is_correct: false,
            },
            {
              text: "B. Southwest and northeast",
              is_correct: true,
            },
            {
              text: "C. Trade wind and easterlies",
              is_correct: false,
            },
            {
              text: "D. Westerlies and easterlies",
              is_correct: false,
            },
            {
              text: "E. North and West",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "43. What is the primary function of white blood cells in the human body?",
          answers: [
            {
              text: "A. Carrying oxygen",
              is_correct: false,
            },
            {
              text: "B. Fighting infection",
              is_correct: true,
            },
            {
              text: "C. Transmitting nerve impulses",
              is_correct: false,
            },
            {
              text: "D.  Filtering waste products",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "44. What is the process by which a solid change directly into a gas without becoming a liquid first?",
          answers: [
            {
              text: "A. Evaporation",
              is_correct: false,
            },
            {
              text: "B. Condensation",
              is_correct: false,
            },
            {
              text: "C. Sublimation",
              is_correct: true,
            },
            {
              text: "D. Freezing",
              is_correct: false,
            },
          ],
        },

        {
          subject: "SCIENCE ",
          q: "45. Which of the following is a renewable resource?",
          answers: [
            {
              text: "A. Wind",
              is_correct: true,
            },
            {
              text: "B. Natural Source",
              is_correct: false,
            },
            {
              text: "C. Coal",
              is_correct: false,
            },
            {
              text: "D. Petroleum",
              is_correct: false,
            },
          ],
        },
        //ENGLISH
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "For each sentence, complete the analogy by choosing a word from the suggested answers.",
          q: "46. MARATHON is to RACE as SYMPHONY is to __________.",
          answers: [
            {
              text: "A. composition",
              is_correct: false,
            },
            {
              text: "B. orchestra",
              is_correct: false,
            },
            {
              text: "C. conductor",
              is_correct: false,
            },
            {
              text: "D.  performance",
              is_correct: true,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "For each sentence, complete the analogy by choosing a word from the suggested answers.",
          q: "47. __________ is to SCHOOL as STAR is to ROCK.",
          answers: [
            {
              text: "A. student",
              is_correct: true,
            },
            {
              text: "B. principal",
              is_correct: false,
            },
            {
              text: "C. fish",
              is_correct: false,
            },
            {
              text: "D.  thesis",
              is_correct: false,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "For each sentence, complete the analogy by choosing a word from the suggested answers.",
          q: "48. RAIN is to WET as FIRE is to ______.",
          answers: [
            {
              text: "A. heat",
              is_correct: false,
            },
            {
              text: "B. burn",
              is_correct: true,
            },
            {
              text: "C. smoke",
              is_correct: false,
            },
            {
              text: "D.  light",
              is_correct: false,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "For each sentence, complete the analogy by choosing a word from the suggested answers.",
          q: "49. SCHOOL is to HOSPITAL as STORE is to __________.",
          answers: [
            {
              text: "A. grocery",
              is_correct: false,
            },
            {
              text: "B. customer",
              is_correct: true,
            },
            {
              text: "C. foods",
              is_correct: false,
            },
            {
              text: "D.  market",
              is_correct: false,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "For each sentence, complete the analogy by choosing a word from the suggested answers.",
          q: "50. CIRCLE is to SHAPE as NOVEL is to ______.",
          answers: [
            {
              text: "A. book",
              is_correct: true,
            },
            {
              text: "B. novel",
              is_correct: false,
            },
            {
              text: "C. story",
              is_correct: false,
            },
            {
              text: "D.  Chapter",
              is_correct: false,
            },
          ],
        },
        //ENGLISH 2
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "Choose the meaning of the underlined word/phrases from the given choices.",
          underline: "STRIKE",
          number: "51. ",
          q: "while the iron is hot",
          answers: [
            {
              text: "A. use his physical and mental power",
              is_correct: false,
            },
            {
              text: "B. make the most of every opportunity",
              is_correct: true,
            },
            {
              text: "C. solves any problems immediately",
              is_correct: false,
            },
            {
              text: "D.  use his time wisely",
              is_correct: false,
            },
            {
              text: "E.  work hard all the time",
              is_correct: false,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "Choose the meaning of the underlined word/phrases  from the given choices.",
          underline: "CANOE.",
          number: "52. Paddle your own",
          q: " ",
          answers: [
            {
              text: "A. Always tries his best",
              is_correct: false,
            },
            {
              text: "B. Learn from his mistakes",
              is_correct: false,
            },
            {
              text: "C. Earn his own money",
              is_correct: false,
            },
            {
              text: "D.  Be self-reliant",
              is_correct: true,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "Choose the meaning of the underlined word/phrases from the given choices.",
          underline: "FISH OUT OF WATER",
          number: "53. The new employee quickly became a",
          q: "in the fast-paced work environment.",
          answers: [
            {
              text: "A. Someone who is afraid of swimming",
              is_correct: false,
            },
            {
              text: "B. Someone who feels uncomfortable or out of place",
              is_correct: true,
            },
            {
              text: "C. Someone who enjoys aquatic activities",
              is_correct: false,
            },
            {
              text: "D.  Someone who is an expert swimmer",
              is_correct: false,
            },
          ],
        },
        {
          subject: "ENGLISH ",
          direction: "Direction:",
          displaydirection:
            "Choose the meaning of the underlined word/phrases from the given choices.",
          underline: "BLESSING IN DISGUISE",
          number: "54. The team's victory was a",
          q: "because it motivated them to work even harder for the next competition.",
          answers: [
            {
              text: "A. An unexpected setback or misfortune",
              is_correct: true,
            },
            {
              text: "B. A fortunate event or outcome",
              is_correct: false,
            },
            {
              text: "C. A religious miracle",
              is_correct: false,
            },
            {
              text: "D.  A hidden blessing that brings luck",
              is_correct: false,
            },
          ],
        },

        // READING COMPREHENSION
        {
          subject: "READING COMPREHENSION ",
          direction: "Poem:",
          phrase_one: "“Two roads diverged in a yellow wood,",
          phrase_two: "And sorry I could not travel both",
          phrase_three: "And be one traveler, long I stood",
          phrase_four: "And looked down one as far as I could",
          phrase_five: "To where it bent in the undergrowth;”",
          q: "55. What does this poem stanza mean?",
          answers: [
            {
              text: "A. It refers to a man choosing between two roads to take when traveling.",
              is_correct: false,
            },
            {
              text: "B. It’s about the woods and the forest.",
              is_correct: false,
            },
            {
              text: "C. It talks about the different choices we have in life and how we must choose between difficult options.",
              is_correct: true,
            },
            {
              text: "D.  It’s about a man who is looking for a yellow wood in the forest where he has been traveling through for so long.",
              is_correct: false,
            },
          ],
        },
        {
          subject: "READING COMPREHENSION ",
          direction:
            "56-60 Read the short story below and answer the following questions:",
          phrase_one:
            "Deep in the heart of the Amazon rainforest, a team of researchers embarked on an ambitious expedition. Their goal was to study the elusive and endangered jaguars in their natural habitat. Among the team was Dr. Emily Reynolds, a renowned wildlife biologist known for her expertise in big cat conservation.",
          phrase_two:
            "As they trekked through dense foliage and navigated treacherous terrain, the team encountered numerous challenges. The unpredictable weather, dangerous wildlife, and limited resources tested their resilience and determination. Dr. Reynolds, however, remained undeterred, driven by her passion for protecting these magnificent creatures.",
          phrase_three:
            "Days turned into weeks, and the team's perseverance paid off. They managed to set up camera traps strategically placed to capture glimpses of the elusive jaguars. Dr. Reynolds meticulously analyzed the footage, documenting the behavior and movements of the majestic cats.",
          phrase_four:
            "One day, as the team huddled around a campfire, they heard rustling in the nearby bushes. Suddenly, a jaguar emerged from the shadows, its piercing eyes locked onto the team. Time seemed to stand still as the researchers marveled at the creature's beauty and raw power. Dr. Reynolds whispered to her team to remain calm and avoid any sudden movements.",
          phrase_five:
            "The jaguar prowled closer, curiosity gleaming in its eyes. Dr. Reynolds slowly raised her camera, capturing the mesmerizing moment. It was a testament to their hard work and dedication, a rare encounter with one of nature's most elusive predators.",
          q: "56. What was the goal of the team's expedition in the Amazon rainforest?",
          answers: [
            {
              text: "A. To study rare bird species",
              is_correct: false,
            },
            {
              text: "B. To search for hidden treasure",
              is_correct: false,
            },
            {
              text: "C. To track and study jaguars",
              is_correct: true,
            },
            {
              text: "D. To measure rainfall patterns",
              is_correct: false,
            },
          ],
        },
        {
          subject: "READING COMPREHENSION ",
          direction:
            "56-60 Read the short story below and answer the following questions:",
          phrase_one:
            "Deep in the heart of the Amazon rainforest, a team of researchers embarked on an ambitious expedition. Their goal was to study the elusive and endangered jaguars in their natural habitat. Among the team was Dr. Emily Reynolds, a renowned wildlife biologist known for her expertise in big cat conservation.",
          phrase_two:
            "As they trekked through dense foliage and navigated treacherous terrain, the team encountered numerous challenges. The unpredictable weather, dangerous wildlife, and limited resources tested their resilience and determination. Dr. Reynolds, however, remained undeterred, driven by her passion for protecting these magnificent creatures.",
          phrase_three:
            "Days turned into weeks, and the team's perseverance paid off. They managed to set up camera traps strategically placed to capture glimpses of the elusive jaguars. Dr. Reynolds meticulously analyzed the footage, documenting the behavior and movements of the majestic cats.",
          phrase_four:
            "One day, as the team huddled around a campfire, they heard rustling in the nearby bushes. Suddenly, a jaguar emerged from the shadows, its piercing eyes locked onto the team. Time seemed to stand still as the researchers marveled at the creature's beauty and raw power. Dr. Reynolds whispered to her team to remain calm and avoid any sudden movements.",
          phrase_five:
            "The jaguar prowled closer, curiosity gleaming in its eyes. Dr. Reynolds slowly raised her camera, capturing the mesmerizing moment. It was a testament to their hard work and dedication, a rare encounter with one of nature's most elusive predators.",
          q: "57. What challenges did the team face during the expedition?",
          answers: [
            {
              text: "A. Limited food supply",
              is_correct: false,
            },
            {
              text: "B. Extreme heat and humidity",
              is_correct: false,
            },
            {
              text: "C. Hostile indigenous tribes",
              is_correct: false,
            },
            {
              text: "D. Unpredictable weather and dangerous wildlife",
              is_correct: true,
            },
          ],
        },
        {
          subject: "READING COMPREHENSION ",
          direction:
            "56-60 Read the short story below and answer the following questions:",
          phrase_one:
            "Deep in the heart of the Amazon rainforest, a team of researchers embarked on an ambitious expedition. Their goal was to study the elusive and endangered jaguars in their natural habitat. Among the team was Dr. Emily Reynolds, a renowned wildlife biologist known for her expertise in big cat conservation.",
          phrase_two:
            "As they trekked through dense foliage and navigated treacherous terrain, the team encountered numerous challenges. The unpredictable weather, dangerous wildlife, and limited resources tested their resilience and determination. Dr. Reynolds, however, remained undeterred, driven by her passion for protecting these magnificent creatures.",
          phrase_three:
            "Days turned into weeks, and the team's perseverance paid off. They managed to set up camera traps strategically placed to capture glimpses of the elusive jaguars. Dr. Reynolds meticulously analyzed the footage, documenting the behavior and movements of the majestic cats.",
          phrase_four:
            "One day, as the team huddled around a campfire, they heard rustling in the nearby bushes. Suddenly, a jaguar emerged from the shadows, its piercing eyes locked onto the team. Time seemed to stand still as the researchers marveled at the creature's beauty and raw power. Dr. Reynolds whispered to her team to remain calm and avoid any sudden movements.",
          phrase_five:
            "The jaguar prowled closer, curiosity gleaming in its eyes. Dr. Reynolds slowly raised her camera, capturing the mesmerizing moment. It was a testament to their hard work and dedication, a rare encounter with one of nature's most elusive predators.",
          q: "58. What is Dr. Emily Reynolds' area of expertise?",
          answers: [
            {
              text: "A. Marine biology",
              is_correct: false,
            },
            {
              text: "B. Botany and plant life",
              is_correct: false,
            },
            {
              text: "C. Big cat conservation",
              is_correct: true,
            },
            {
              text: "D. Rainforest ecology",
              is_correct: false,
            },
          ],
        },
        {
          subject: "READING COMPREHENSION ",
          direction:
            "56-60 Read the short story below and answer the following questions:",
          phrase_one:
            "Deep in the heart of the Amazon rainforest, a team of researchers embarked on an ambitious expedition. Their goal was to study the elusive and endangered jaguars in their natural habitat. Among the team was Dr. Emily Reynolds, a renowned wildlife biologist known for her expertise in big cat conservation.",
          phrase_two:
            "As they trekked through dense foliage and navigated treacherous terrain, the team encountered numerous challenges. The unpredictable weather, dangerous wildlife, and limited resources tested their resilience and determination. Dr. Reynolds, however, remained undeterred, driven by her passion for protecting these magnificent creatures.",
          phrase_three:
            "Days turned into weeks, and the team's perseverance paid off. They managed to set up camera traps strategically placed to capture glimpses of the elusive jaguars. Dr. Reynolds meticulously analyzed the footage, documenting the behavior and movements of the majestic cats.",
          phrase_four:
            "One day, as the team huddled around a campfire, they heard rustling in the nearby bushes. Suddenly, a jaguar emerged from the shadows, its piercing eyes locked onto the team. Time seemed to stand still as the researchers marveled at the creature's beauty and raw power. Dr. Reynolds whispered to her team to remain calm and avoid any sudden movements.",
          phrase_five:
            "The jaguar prowled closer, curiosity gleaming in its eyes. Dr. Reynolds slowly raised her camera, capturing the mesmerizing moment. It was a testament to their hard work and dedication, a rare encounter with one of nature's most elusive predators.",
          q: "59. What did the team use to capture footage of the jaguars?",
          answers: [
            {
              text: "A. Drones",
              is_correct: false,
            },
            {
              text: "B. Camera traps",
              is_correct: true,
            },
            {
              text: "C. Night-vision goggles",
              is_correct: false,
            },
            {
              text: "D. Hidden observation posts",
              is_correct: false,
            },
          ],
        },
        {
          subject: "READING COMPREHENSION ",
          direction:
            "56-60 Read the short story below and answer the following questions:",
          phrase_one:
            "Deep in the heart of the Amazon rainforest, a team of researchers embarked on an ambitious expedition. Their goal was to study the elusive and endangered jaguars in their natural habitat. Among the team was Dr. Emily Reynolds, a renowned wildlife biologist known for her expertise in big cat conservation.",
          phrase_two:
            "As they trekked through dense foliage and navigated treacherous terrain, the team encountered numerous challenges. The unpredictable weather, dangerous wildlife, and limited resources tested their resilience and determination. Dr. Reynolds, however, remained undeterred, driven by her passion for protecting these magnificent creatures.",
          phrase_three:
            "Days turned into weeks, and the team's perseverance paid off. They managed to set up camera traps strategically placed to capture glimpses of the elusive jaguars. Dr. Reynolds meticulously analyzed the footage, documenting the behavior and movements of the majestic cats.",
          phrase_four:
            "One day, as the team huddled around a campfire, they heard rustling in the nearby bushes. Suddenly, a jaguar emerged from the shadows, its piercing eyes locked onto the team. Time seemed to stand still as the researchers marveled at the creature's beauty and raw power. Dr. Reynolds whispered to her team to remain calm and avoid any sudden movements.",
          phrase_five:
            "The jaguar prowled closer, curiosity gleaming in its eyes. Dr. Reynolds slowly raised her camera, capturing the mesmerizing moment. It was a testament to their hard work and dedication, a rare encounter with one of nature's most elusive predators.",
          q: "60. How did Dr. Reynolds react when the jaguar approached the team?",
          answers: [
            {
              text: "A. She ran away to safety",
              is_correct: false,
            },
            {
              text: "B. She shouted to scare the jaguar off",
              is_correct: false,
            },
            {
              text: "C. She instructed her team to remain calm",
              is_correct: true,
            },
            {
              text: "D. She tried to capture the jaguar for research purposes",
              is_correct: false,
            },
          ],
        },

        // Bonus Question
        {
          subject: "BONUS QUESTIONS ",
          q: "61. What is the complete name of the current City Mayor?",
          answers: [
            {
              text: "A. Rey Tan Uy",
              is_correct: false,
            },
            {
              text: "B. Rey Tao Uy",
              is_correct: true,
            },
            {
              text: "C. Rey Tan Uy",
              is_correct: false,
            },
            {
              text: "D. Rey Tian Uy",
              is_correct: false,
            },
          ],
        },
        {
          subject: "BONUS QUESTIONS ",
          q: "62. How many barangays does Tagum City consist of?",
          answers: [
            {
              text: "A. 25 barangays",
              is_correct: false,
            },
            {
              text: "B. 17 barangays",
              is_correct: false,
            },
            {
              text: "C. 19 barangays",
              is_correct: false,
            },
            {
              text: "D. 23 barangays",
              is_correct: true,
            },
          ],
        },
        {
          subject: "BONUS QUESTIONS ",
          q: "63. What is the title of Tagum City Hymn?",
          answers: [
            {
              text: "A. We are Tagum Hymn",
              is_correct: false,
            },
            {
              text: "B. TAGUMpay Hymn",
              is_correct: false,
            },
            {
              text: "C. Tagum, Mabuhay Ka!",
              is_correct: true,
            },
            {
              text: "D. None of these",
              is_correct: false,
            },
          ],
        },
        {
          subject: "BONUS QUESTIONS ",
          q: "64-65 Give at least two (2) examples of festivals in Tagum City which started in the year 2022.",
          answers: [
            {
              text: "A. Pakaradjan Festival, Banana Festival",
              is_correct: false,
            },
            {
              text: "B. Bisag Asa Festival, Pinagbenga Festival",
              is_correct: false,
            },
            {
              text: "C. Musikahan Festival, Binuhat Festival",
              is_correct: true,
            },
            {
              text: "D. Musikahan Festival, Handurawan Festival",
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
  mounted() {
    this.startCountdown();
  },
  methods: {
    questionAnswered(is_correct) {
      if (is_correct) {
        this.totalCorrect++;
      }

      this.questionsAnswered++;
    },

    //countdown
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
        }
      }, 1000);
    },
    formatTime(time) {
      return time.toString().padStart(2, "0");
    },

    reset() {
      this.questionsAnswered = 0;
      this.totalCorrect = 0;
      this.$router.push({ name: "ExamName" });
    },
  },
};
</script>
  
  
  <style>
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