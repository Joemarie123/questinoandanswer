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
  }
 
  </style>
  