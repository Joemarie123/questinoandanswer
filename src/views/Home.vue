<template>
  <v-app class="mx-3 mx-lg-0">

 

      <v-container>
        <v-row  justify="center" >

       

          <v-col cols="12" >
          
            <v-card 
          
          :class="`elevation-${isHovering ? 24 : 6}`"
          class=" login-form " >

          <v-alert  v-if="alertMessage"  :value="true" type="success" transition="fade-transition">
              ALREADY {{ alertMessage }}
    </v-alert>
    <h4 v-if="!isLoading" class="my-2 mt-4 login-title">
               
               WELCOME TO E-CESPRO EXAM</h4>
               <v-card-text>
              
                
              
                <div v-if="isLoading" class="loading-progress-bar my-10 "  >
             
      <div class="loading-progress " :style="{ width: loadingProgress + '%' }">
      
      </div>
      
      <div class="loading-text">Please Wait...</div>
    </div>
        <v-combobox
        prepend-inner-icon="mdi-account"
        class="mx-2"
        density="compact" 
               variant="outlined"
          v-model="selectedFullName"
          :items="fullNames"
          label="Select a Full Name"
          v-if="!isLoading"
        ></v-combobox>

     <!--    <v-text-field v-model="selectedId" label="ID" readonly></v-text-field> -->
     <h4 v-if="!isLoading" class="my-2 login-title">
               
               Examinee Information Details </h4>
      <v-card class="green-card mx-2">
       
         <p  v-if="!isLoading" style="font-size:15px" class="mx-3 my-2"><strong>Last Name: </strong><span style="font-size:13px" > {{ selectedLastName }} </span></p>
         <p  v-if="!isLoading" style="font-size:15px" class="mx-3 my-2"><strong>First Name:</strong> <span style="font-size:13px" > {{ selectedFirstName }} </span></p>
         <p v-if="!isLoading" style="font-size:15px" class="mx-3 my-2"><strong>Middle Name: </strong> <span style="font-size:13px"> {{ selectedMiddleName }} </span></p>
         <p v-if="!isLoading" style="font-size:15px" class="mx-3 my-2"><strong>Barangay: </strong> <span  style="font-size:13px"> {{ selectedBarangay }} </span></p>
         <p v-if="!isLoading" style="font-size:15px"  class="mx-3 my-2"><strong>Course: </strong> <span style="font-size:13px"> {{ selectedCourse }} </span></p>
         <p  v-if="!isLoading" style="font-size:15px" class="mx-3 my-2"><strong>Year Level:</strong> <span style="font-size:13px"> {{ selectedYearLevel }} </span></p>
      </v-card>
     <!--     <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedExamSet" label="Exam Set" readonly></v-text-field> -->
      <!--   <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  readonly variant="outlined" v-model="selectedFirstName" label="First Name"></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  readonly variant="outlined" v-model="selectedMiddleName" label="Middle Name"></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedBarangay" label="Barangay" readonly></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedCourse" label="Course" readonly></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedSchoolIntended" label="School Intended" readonly></v-text-field>
       
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedYearLevel" label="Year Level" readonly></v-text-field> -->

        <v-row class="my-3 ml-0">
                    <v-col cols="12">
                <!-- <v-btn v-if="!isLoading" type="submit"    @click="register()"  class="submitbotton ml-2 ">
                  SUBMIT
                </v-btn> -->
                <v-btn v-if="!isLoading"   type="submit"  @click="register()" outlined color="green darken-3">
                <v-icon left>mdi-account-check</v-icon>
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
/* import axios from 'axios'; */
import { mapGetters,mapActions } from 'vuex';

export default {
  
  data() {
    return {
      isLoading: false,
      loadingProgress: 0,
      alertMessage:'',
      selectedFullName: '',
      selectedId: '',
      selectedBarangay: '',
      selectedCourse: '',
      selectedSchoolIntended: '', // New property for School Intended
      selectedExamSet: '', // New property for Exam Set
      selectedYearLevel: '', // New property for Year Level
      fullNames: [],
      selectedLastName: '',
      selectedFirstName: '',
      selectedMiddleName: '',
      namesData: [], // Array to store names data
    };
  },


  computed:{
      ...mapGetters('posts', {examinee: 'getPosts'}),

},
created(){
  // this.isLoading=true
  this.fetchUsers()
  // .then((e)=>{this.isLoading=false}).catch((e)=>{console.log(e)})
 /*  setTimeout(() => {
    this.fetchFullNames()
  }, 1000); */
  this.simulateLoading(() => {
    this.fetchFullNames()
  }, );

  
},
  methods: {
    ...mapActions('posts', ['fetchUsers']),
    ...mapActions('posts', ['newuser']),
   
    simulateLoading() {
      const interval = 20; // Change this to control the speed of loading
      const totalSteps = 50; // Adjust this based on the total number of steps you want
      let currentStep = 0;

      this.isLoading = true;

      const loadingInterval = setInterval(() => {
        currentStep++;
        this.loadingProgress = (currentStep / totalSteps) * 100;

        if (currentStep >= totalSteps) {
          if(this.examinee.length >0){
            clearInterval(loadingInterval);
          this.isLoading = false;
          this.loadingProgress = 0;
          this.fetchFullNames();
          }else{
            currentStep=0
          }
          
        }
      }, interval);
    },

    hideAlertAfterDelay() {
      setTimeout(() => {
        this.alertMessage = false;
      }, 2000); // 3000 milliseconds = 3 seconds
    },
    
    async register() {
      /* let data = new FormData();
      data.append('Examinee_ID', this.Examinee_ID); */
     /*  START STARTED UG SUCCESS */
         let data= new FormData;
          data.append('Examinee_ID',this.selectedId);
          this.newuser(data).then(e=>{
            console.log("letter e=",e);
                if (e != 0) {
                  console.log("sulod sa output=",e);
                    this.alertMessage=e;
                    this.hideAlertAfterDelay();
                    return;
               
                }else{
                  console.log("examset=",this.selectedExamSet);
                  localStorage.setItem('Examinee_ID',this.selectedId);
               console.log("Localstorage=",localStorage.Examinee_ID);


    /*   this.navigateTo('/SetAExamList'); */
           /* this.navigateTo('/Home'); */
         /*  this.submitForm() */
         if (this.selectedExamSet === 'A') {
        // Replace 'FormA' with the name of the component or route to the form you want to transfer to for Set A
        this.$router.push({ name: 'SetAExamList' });
        this.navigateTo('/SetAExamList');
      } else if (this.selectedExamSet === 'B') {
        // Replace 'FormB' with the name of the component or route to the form you want to transfer to for Set B
       /*  this.$router.push({ name: 'SetBExamList' }); */
        this.navigateTo('/SetBExamList');
      }

      this.$emit('submit', this.selectedId);

                }
            }).catch(e => console.log("Error =>", e));
          /* this.fetchUsers() */
          /*   this.Login(data).then(e=>{
                if (e == 0) {
                    this.showResponse({
                        header: "Error",
                        subHeader: "Email or Password is incorrect.",
                        message: "Please double check your credentials."
                    });
                } else {
                    this.navigateTo('Home');
                }
            }).catch(e => console.log("Error =>", e)); */

        // END STARTED UG SUCCESS   
  

      

    },

    navigateTo(path) {
      this.$router.push({ 'path': path });
    },



    async fetchFullNames() {


      try {
        // const response = await axios.get('http://10.0.1.23:80/PEESOCESPRO/users.php');
        // Handle the specific data format with "users" property
        if ( Array.isArray(this.examinee)) {
          console.log("array------------");
          this.namesData = this.examinee.map(user => {
        
            return {
              Examinee_ID: user.Examinee_ID,
              fullName: user.fullname,
              Barangay: user.Barangay,
              Course: user.Course,
              School_Intended: user.School_Intended, // Set School Intended value
              Exam_set: user.Exam_set, // Set Exam Set value
              Year_level: user.Year_level, // Set Year Level value
              Lastname: user.Lastname, // Set Year Level value
              Firstname: user.Firstname, // Set Year Level value
              Middlename: user.Middlename, // Set Year Level value 
            };
          });

          this.fullNames = this.namesData.map(nameData => nameData.fullName).sort();;
        } else {
          console.error('Invalid data format:', response.data);
        }
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    },
    updateSelectedInfo() {
      const selectedNameData = this.namesData.find(nameData => nameData.fullName === this.selectedFullName);

      if (selectedNameData) {
        this.selectedId = selectedNameData.Examinee_ID;
        this.selectedBarangay = selectedNameData.Barangay;
        this.selectedCourse = selectedNameData.Course;
        this.selectedSchoolIntended = selectedNameData.School_Intended; // Set School Intended value
        this.selectedExamSet = selectedNameData.Exam_set; // Set Exam Set value
        this.selectedYearLevel = selectedNameData.Year_level; // Set Year Level value
        this.selectedLastName = selectedNameData.Lastname;
        this.selectedFirstName = selectedNameData.Firstname;
        this.selectedMiddleName = selectedNameData.Middlename;
      } else {
        this.selectedId = '';
        this.selectedBarangay = '';
        this.selectedCourse = '';
        this.selectedSchoolIntended = '';
        this.selectedExamSet = '';
        this.selectedYearLevel = '';
        this.selectedLastName = '';
        this.selectedFirstName = '';
        this.selectedMiddleName = '';
      }
    },
  },
  watch: {
    selectedFullName: 'updateSelectedInfo', // Call updateSelectedInfo whenever selectedFullName changes
  },

  mounted() {
    this.fetchFullNames();

  },

};
</script>

<style scoped>
 .submitbotton{
  color: white;
  background-color: rgba(15, 83, 15, 0);
 }

.fade-transition-enter-active, .fade-transition-leave-active {
  transition: opacity 1s;
}
.fade-transition-enter, .fade-transition-leave-to {
  opacity: 0;
}
/* .green-card {
  background-color: rgba(1, 36, 20, 0.356);
  color: white;
} */


  .loading-progress-bar {
  width: 100%;
  height: 10px;
  background-color: #ccc;
}

.loading-text {
  position: absolute;
  font-size: 16px;
  color: #333;
}

.loading-progress {
  height: 100%;
  background-color: #3498db;
  transition: width 0.2s ease-in-out;
}
.login-form {
  max-width: 100%;
  margin: 0 auto;

  position: absolute;
  left: 50%;
  top: 50%;
  width: 400px;
  transform: translate(-50%, -50%);

  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(49, 47, 47, 0.15);
}

.login-title {
  text-align: center;
}
</style>