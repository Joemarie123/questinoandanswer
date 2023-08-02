<template>
 
    <v-app>
    <v-container >
     
       
      <v-row  justify="center" >
        
        <v-col cols="12" >
            
          <v-card 
          
          :class="`elevation-${isHovering ? 24 : 6}`"
          class=" login-form " >
         <!--  <div class="text-center mt-3">
            <img class="logo" src="/public/Tagum.png" width="120">
          </div> -->
        
          <v-alert v-if="alertMessage" :value="true" type="success" transition="scale-transition">
      {{ alertMessage }}
    </v-alert>

            <p class="my-4 login-title">
               
                I'm sending the examination package for E-CESPRO. Also, I would like to include the following before they take their exam. </p>
            <v-card-text>
             
                
              <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="fullname"
             label="Last Name"
                
                >
                
                </v-text-field>

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="firstname"
             label="First Name"
                
                >
                
                </v-text-field>

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="middlename"
             label="Middle Name"
                
                >
                
                </v-text-field>
                
                <v-select
                class="mx-2"
                density="compact" 
               variant="outlined"
               v-model="selectbarangay"
            :items="['Apokon', 'Bincungan', 'Busaon', 'Canocotan', 'Cuambogan', 'La Filipina', 'Liboganon', 'Madaum', 'Magdum', 'Mankilam', 'New Balamban', 'Nueva Fuerza', 'Pagsabangan', 'Pandapan', 'Magugpo Poblacion', 'San Agustin', 'San Isidro', 'San Miguel (Camp 4)', 'Visayan Village', 'Magugpo East', 'Magugpo North', 'Magugpo South', 'Magugpo West']"
             label="Select Barangay" prepend-inner-icon="mdi-map-marker"
             required></v-select>

            
                

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="incomingyearlevel"
             label="Incoming Year Level"
                
                >

                </v-text-field>
                
                <v-combobox
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
               class="mx-2"
  label="Course Intended to Enroll"
  :items="course"
></v-combobox>

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="schoolintendedtoenroll"
             label="School Intended To Enroll"
                
                >

                </v-text-field>
                
<div class="ml-4">
                <h4>SELECT TYPE OF EXAM</h4>
                <v-radio-group  v-model="selectedSet"   inline>

  <v-radio label="SET A" value="setA"></v-radio>
  <v-radio label="SET B"  value="setB"></v-radio>

</v-radio-group>
</div>
                <v-row>
                    <v-col cols="12">
                <v-btn type="submit"  color="primary" @click="submitForm()"  class="ml-2 ">
                  SUBMIT
                </v-btn>
            </v-col>
            
            </v-row>
          
             
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
</v-app>
  </template>
  
  <script>
  export default {
    data() {
    return{
        fullname:'',
        selectbarangay:'',
        incomingyearlevel:'',
        schoolintendedtoenroll:'',
        selectedSet: '',
        alertMessage: '', // Variable to store the alert message
        course: [
      " Bachelor of Arts in History (AB History)",
      " Bachelor of Arts in Philosophy (AB Philosophy)",
      " Bachelor of Fine Arts Major in Industrial Design (BFA)",
      " Bachelor of Fine Arts Major in Painting (BFA)",
      " Bachelor of Fine Arts Major in Sculpture (BFA)",
      " Bachelor of Fine Arts Major in Visual Communication (BFA)",
      " Bachelor of Arts in Economics (AB Economics)",
      " Bachelor of Science in Economics (BS Economics)",
      " Bachelor of Arts in Psychology (AB Psychology)",
      " Bachelor of Science in Psychology (BS Political Science)",
      " Bachelor of Science in Criminology (BS Criminology)",
      " Bachelor of Arts in Political Science (AB Political Science)",
      " Bachelor of Arts in English (AB English)",
      " Bachelor of Arts in Linguistics (AB Linguistics)",
      " Bachelor of Arts in Literature (AB Literature)",
      " Bachelor of Arts in Anthropology (AB Anthropology)",
      " Bachelor of Arts in Sociology (AB Sociology)",
      " Bachelor of Arts in Filipino (AB Filipino)",
      " Bachelor of Science in Forensic Science (BSFS)",
      " Bachelor of Arts in Islamic Studies (AB Islamic Studies)",
      " Bachelor of Science in Environmental Science (BSES)",
      " Bachelor of Science in Forestry (BS Forestry)",
      " Bachelor of Science in Fisheries (BSFi)",
      " Bachelor of Science in Geology (BS Geology)",
      " Bachelor of Science in Biology (BS Biology)",
      " Bachelor of Science in Molecular Biology (BS Molecular Biology)",
      " Bachelor of Science in Physics (BS Physics)",
      " Bachelor of Science in Applied Physics (BS Applied Physics)",
      " Bachelor of Science in Chemistry (BS Chemistry)",
      " Bachelor of Science in Computer Science (BSCS)",
      " Bachelor of Science in Information Technology (BSIT)",
      " Bachelor of Science in Information Systems (BSIS)",
      " Bachelor of Science in Mathematics (BS Mathematics)",
      " Bachelor of Science in Applied Mathematics (BS Applied Math)",
      " Bachelor of Science in Statistics (BS Stat)",
      " Bachelor of Science in Agriculture",
      " Bachelor of Science in Agribusiness (BS Agribusiness)",
      " Bachelor of Science in Agroforestry (BS Agroforestry)",
      " Bachelor of Science in Architecture (BS Architecture)",
      " Bachelor in Landscape Architecture (BLA)",
      " Bachelor of Science in Interior Design (BS in Interior Design)",
      " Bachelor of Science in Accountancy (BSA)",
      " Bachelor of Science in Accounting Technology (BSAcT)",
      " Bachelor of Science in Business Administration",
      " Bachelor of Science in Business Administration Major in Business Economics (BSBA)",
      " Bachelor of Science in Business Administration Major in Financial Management (BSBA major in FM)",
      " Bachelor of Science in Business Administration Major in Human Resource Development (BSBA major in HRDM)",
      " Bachelor of Science in Business Administration Major in Marketing Management (BSBA major in MM)",
      " Bachelor of Science in Business Administration Major in Operations Management (BSBA major in OM)",
      " Bachelor of Science in Hotel and Restaurant Management (BS HRM)",
      " Bachelor of Science in Entrepreneurship (BS Entrep)",
      " Bachelor of Science in Office Administration (BSOA)",
      " Bachelor of Science in Real Estate Management (BS REM)",
      " Bachelor of Science in Tourism Management (BSTM)",
      " Bachelor of Science in Medical Technology (BS Med Tech)",
      " Bachelor of Science in Midwifery (BS Midwifery)",
      " Bachelor of Science in Nursing (BSN)",
      " Bachelor of Science in Occupational Therapy (BSOT)",
      " Bachelor of Science in Pharmacy (BS Pharmacy)",
      " Bachelor of Science in Physical Therapy (BSPT)",
      " Bachelor of Science in Radiologic Technology (BS Rad Tech)",
      " Bachelor of Science in Respiratory Therapy (BSRT)",
      " Bachelor of Science in Speech-Language Pathology",
      " Bachelor of Science in Sports Science",
      " Bachelor in Secondary Education (BSED)",
      " Bachelor in Elementary Education (BEED)",
      " Bachelor in Secondary Education Major in Technology and Livelihood Education (BSED)",
      " Bachelor in Secondary Education Major in Biological Sciences (BSED)",
      " Bachelor in Secondary Education Major in English (BSED)",
      " Bachelor in Secondary Education Major in Filipino (BSED)",
      " Bachelor in Secondary Education Major in Mathematics (BSED)",
      " Bachelor in Secondary Education Major in Islamic Studies (BSED)",
      " Bachelor in Secondary Education Major in Music, Arts, Physical and Health Education (BSED)",
      " Bachelor in Secondary Education Major in Physical Sciences (BSED)",
      " Bachelor in Secondary Education Major in Social Studies (BSED)",
      " Bachelor in Secondary Education Major in Values Education (BSED)",
      " Bachelor in Elementary Education Major in Preschool Education (BEED)",
      " Bachelor in Elementary Education Major in Special Education (BEED)",
      " Bachelor of Library and Information Science in the Philippines (BLIS)",
      " Bachelor of Physical Education (BPE)",
      " Bachelor of Science in Aeronautical Engineering (BS AeroE)",
      " Bachelor of Science in Ceramic Engineering (BSCerE)",
      " Bachelor of Science in Chemical Engineering (BSChE)",
      " Bachelor of Science in Civil Engineering (BSCE)",
      " Bachelor of Science in Computer Engineering (BSCpE)",
      " Bachelor of Science in Electrical Engineering (BSEE)",
      " Bachelor of Science in Electronics and Communications Engineering (BSECE)",
      " Bachelor of Science in Geodetic Engineering (BSGE)",
      " Bachelor of Science in Geological Engineering (BSGeoE)",
      " Bachelor of Science in Industrial Engineering (BSIE)",
      " Bachelor of Science in Marine Engineering in (BSMarE)",
      " Bachelor of Science in Materials Engineering (BSMatE)",
      " Bachelor of Science in Mechanical Engineering (BSME)",
      " Bachelor of Science in Metallurgical Engineering (BSMetE)",
      " Bachelor of Science in Mining Engineering (BSEM)",
      " Bachelor of Science in Petroleum Engineering (BSPetE)",
      " Bachelor of Science in Sanitary Engineering (BSSE)",
      " Bachelor of Arts in Broadcasting (AB Broadcasting) ",
      " Bachelor of Arts in Communication (AB Communication) ",
      " Bachelor of Science in Development Communication (BS DevComm)",
      " Bachelor of Arts in Journalism (AB Journalism)",
      " Bachelor of Arts in Mass Communication",
      " Bachelor of Science in Community Development(BS Community Development)",
      " Bachelor of Science in Customs Administration (BSCA)",
      " Bachelor of Science in Foreign Service (BS Foreign Service)",
      " Bachelor of Science in International Studies(BSIS)",
      " Bachelor of Public Administration (BPA)",
      " Bachelor of Science in Public Safety (BSPS)",
      " Bachelor of Science in Social Work (BS Social Work)",
      " Bachelor of Science in Marine Transportation (BSMT)",
      " Bachelor of Science in Food Technology (BS Food Tech)",
      " Bachelor of Science in Nutrition and Dietetics (BS ND)",

    ],
    }
    },
    methods: {
 
      submitForm() {
      if (this.selectedSet === 'setA') {
        // Replace 'FormA' with the name of the component or route to the form you want to transfer to for Set A
        this.$router.push({ name: 'SetAExamList' });
      } else if (this.selectedSet === 'setB') {
        // Replace 'FormB' with the name of the component or route to the form you want to transfer to for Set B
        this.$router.push({ name: 'SetBExamList' });
      } else {
        // Handle invalid selection or show an error message
        this.alertMessage = 'Please select either SET A or SET B before submitting.';
        setTimeout(() => {
          this.alertMessage = ''; // Clear the alert message after a few seconds
        }, 5000);
      }
    },


      Login_Events()
  {

    if(this.usernamenako=="hr",this.password=="hr")
    {

       this.$router.push('/HomeEvents'); 
      }

      else if (this.usernamenako=="admin",this.password=="admin"){

        this.$router.push('/OfficeHomeEvents'); 

      }

  },

  /*    goToFormTwo() {
        this.$router.push('/HtmlQrCodes');
      }  */
      
    }
  };
  </script>
  
  <style scoped>
  .login-form {
    max-width: 400px;
    margin: 0 auto;

    position: absolute;
  left: 50%;
  top: 50%;
  width: 400px;
  transform: translate(-50%,-50%);

  border-radius: 20px;
  box-shadow: 10px 10px 15px rgba(49, 47, 47, 0.15);


  }

  .login-title {
    text-align: center;
    font-size:16px;
  }
 
  </style>
  