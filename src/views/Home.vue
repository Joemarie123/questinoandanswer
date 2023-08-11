<template>
  <v-app class="mx-3 mx-lg-0">

 

      <v-container>
        <v-row  justify="center" >

       

          <v-col cols="12" >
          
            <v-card 
          
          :class="`elevation-${isHovering ? 24 : 6}`"
          class=" login-form " >

          <v-alert  v-if="alertMessage" :value="true" type="success" transition="scale-transition">
              ALREADY {{ alertMessage }}
    </v-alert>
          <h3 class="my-4 login-title">
               
               Examinee Information Details </h3>
               <v-card-text>

        <v-combobox
        prepend-inner-icon="mdi-account"
        class="mx-2"
        density="compact" 
               variant="outlined"
          v-model="selectedFullName"
          :items="fullNames"
          label="Select a Full Name"
        ></v-combobox>

     <!--    <v-text-field v-model="selectedId" label="ID" readonly></v-text-field> -->
         <p style="font-size:18px" class="mx-3 my-2"><strong>Last Name: </strong><span style="font-size:16px" > {{ selectedLastName }} </span></p>
         <p  style="font-size:18px" class="mx-3 my-2"><strong>First Name:</strong> <span style="font-size:16px" > {{ selectedFirstName }} </span></p>
         <p style="font-size:18px" class="mx-3 my-2"><strong>Middle Name: </strong> <span style="font-size:16px"> {{ selectedMiddleName }} </span></p>
         <p style="font-size:18px" class="mx-3 my-2"><strong>Barangay: </strong> <span  style="font-size:16px"> {{ selectedBarangay }} </span></p>
         <p style="font-size:18px"  class="mx-3 my-2"><strong>Course: </strong> <span style="font-size:16px"> {{ selectedCourse }} </span></p>
         <p style="font-size:18px" class="mx-3 my-2"><strong>Year Level:</strong> <span style="font-size:16px"> {{ selectedYearLevel }} </span></p>
    
     <!--     <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedExamSet" label="Exam Set" readonly></v-text-field> -->
      <!--   <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  readonly variant="outlined" v-model="selectedFirstName" label="First Name"></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  readonly variant="outlined" v-model="selectedMiddleName" label="Middle Name"></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedBarangay" label="Barangay" readonly></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedCourse" label="Course" readonly></v-text-field>
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedSchoolIntended" label="School Intended" readonly></v-text-field>
       
        <v-text-field prepend-inner-icon="mdi-account" class="mx-2"  density="compact"  variant="outlined" v-model="selectedYearLevel" label="Year Level" readonly></v-text-field> -->

        <v-row class="my-3">
                    <v-col cols="12">
                <v-btn type="submit"  color="primary" @click="register()"  class="ml-2 ">
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
  this.fetchUsers()
  setTimeout(() => {
    this.fetchFullNames()
  }, 1000);
  
},
  methods: {
    ...mapActions('posts', ['fetchUsers']),
    ...mapActions('posts', ['newuser']),
   
    
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
                    return;
               
                }else{
                  console.log("examset=",this.selectedExamSet);
                  localStorage.setItem('Examinee_ID',this.selectedId);
      console.log("Localstorage=",localStorage.Examinee_ID);
      this.navigateTo('/SetAExamList');
           /* this.navigateTo('/Home'); */
         /*  this.submitForm() */
         if (this.selectedExamSet === 'A') {
        // Replace 'FormA' with the name of the component or route to the form you want to transfer to for Set A
       /*  this.$router.push({ name: 'SetAExamList' }); */
        this.navigateTo('/SetAExamList');
      } else if (this.selectedExamSet === 'B') {
        // Replace 'FormB' with the name of the component or route to the form you want to transfer to for Set B
       /*  this.$router.push({ name: 'SetBExamList' }); */
       /*  this.navigateTo('/SetBExamList'); */
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