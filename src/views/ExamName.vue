<template>
 
    <v-app class="mx-3 mx-lg-0">
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

            <h3 class="my-4 login-title">
               
              Examinee Information Details </h3>
            <v-card-text>
             
            <!--   <div v-for="user in users.users " :key="user.id">
                <h1>{{ examinee }}</h1>
              </div> -->
            
             
              <v-combobox
              
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="searchfullname"
              
             label="Search Full Name"
             :items="exam_names"
           @change="fillin"
         
             
                >
                
                </v-combobox>
                <!--   <v-btn @click="fillin()"> view</v-btn> -->


              <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="Lastname"
             label="Last Name"
                
                >
                
                </v-text-field>

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="Firstname"
             label="First Name"
                
                >
                
                </v-text-field>

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="Middlename"
             label="Middle Name"
                
                >
                
                </v-text-field>
                
                <v-select
                class="mx-2"
                density="compact" 
               variant="outlined"
               v-model="Barangay"
            :items="['Apokon', 'Bincungan', 'Busaon', 'Canocotan', 'Cuambogan', 'La Filipina', 'Liboganon', 'Madaum', 'Magdum', 'Mankilam', 'New Balamban', 'Nueva Fuerza', 'Pagsabangan', 'Pandapan', 'Magugpo Poblacion', 'San Agustin', 'San Isidro', 'San Miguel (Camp 4)', 'Visayan Village', 'Magugpo East', 'Magugpo North', 'Magugpo South', 'Magugpo West']"
             label="Select Barangay" prepend-inner-icon="mdi-map-marker"
             required></v-select>

            
                

            <!--     <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="School_Intended"
             label="Incoming Year Level"
                
                >

                </v-text-field>
                 -->

                <v-combobox
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
               class="mx-2"
  label="Course Intended to Enroll"
  v-model="Course"
  :items="courseset"
></v-combobox>

                <v-text-field
                class="mx-2"
                prepend-inner-icon="mdi-account"
               density="compact" 
               variant="outlined"
              v-model="School_Intended"
             label="School Intended To Enroll"
                
                >

                </v-text-field>
                
<div class="ml-4">
                <h4>SELECT TYPE OF EXAM</h4>
                <v-radio-group  v-model="Exam_set"   inline>

  <v-radio label="SET A" value="A"></v-radio>
 <!--  <v-radio label="SET B"  value="B"></v-radio> -->

</v-radio-group>
</div>
                <v-row>
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
  import { mapActions,mapGetters } from 'vuex';
  export default {
    data() {
    return{
      exam_names:[],
      Lastname:'',
        Firstname:'',
        Middlename:'',
        Barangay:'',
        School_Intended:'',
        Exam_set:'',
        Course:'',
        /* courseset:'', */
       /*  users:[], */


        selectedSet: '',
        alertMessage: '', // Variable to store the alert message
     
    }
    },
    

    computed:{
      ...mapGetters('posts', {examinee: 'getPosts'}),

},

  created()
    {
     /*  this.fetchUsers()
      setTimeout(() => {
        console.log("USERS",this.examinee);
      console.log("USERS Kini",this.examinee.users);
      this.initnames();
      }, 2000); // Delay of 2 seconds
       */
      
    },

  
    methods: {
      fillin(){
        console.log("fullname=",this.searchfullname)
        const examinee =this.examinee.map(examinee => examinee.fullname === this.searchfullname)
        console.log("sakpan=",examinee)

      },
      initnames() {
      var items = []
      var entries = Object.entries(this.examinee);
      
      entries.forEach(([key, value]) => {
        items.push({key:key, name:value.fullname});
      });
      console.log("names=",items)
      this.exam_names = Object.values(items).map(item => item.name);
      // this.exam_names = items
      this.exam_names==this.exam_names.sort();
      console.log("exam_names=",this.exam_names)
    },

      ...mapActions('posts', ['newuser']),

     register() {
       console.log("register");
      let data = new FormData();
      
      data.append('lastname', this.Lastname);
      data.append('firstname', this.Firstname);
      data.append('middlename', this.Middlename);
      data.append('barangay', this.Barangay);
      data.append('school_intended', this.School_Intended);
      data.append('Exam_set', this.Exam_set);
      data.append('course', this.Course);

      
         

          /* this.navigateTo('/Home'); */
         /*  this.submitForm() */
         if (this.Exam_set === 'A') {
        // Replace 'FormA' with the name of the component or route to the form you want to transfer to for Set A
       /*  this.$router.push({ name: 'SetAExamList' }); */
        this.navigateTo('/SetAExamList');
      } else if (this.Exam_set === 'B') {
        // Replace 'FormB' with the name of the component or route to the form you want to transfer to for Set B
       /*  this.$router.push({ name: 'SetBExamList' }); */
        this.navigateTo('/SetBExamList');
      } else {
        // Handle invalid selection or show an error message
        this.alertMessage = 'Please select either SET A or SET B before submitting.';
        setTimeout(() => {
          this.alertMessage = ''; // Clear the alert message after a few seconds
        }, 5000);
      }

      

          this.Lastname = '';
          this.Firstname = '';
          this.Middlename = '';
          this.Barangay = '';
          this.School_Intended = '';
          this.Exam_set = '';
          this.Course= '';



        }).catch(e => console.log(e.message));
    },
    navigateTo(path) {
      this.$router.push({ 'path': path });
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
  