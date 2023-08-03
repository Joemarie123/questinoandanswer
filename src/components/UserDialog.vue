<!-- UserDialog.vue -->
<template>
    <v-dialog v-model="dialogVisible" max-width="500">
      <template #activator="{ on }">
        <v-btn color="primary" dark v-on="on">Add User</v-btn>
      </template>
      <v-card>
        <v-card-title>
          Add User
        </v-card-title>
        <v-card-text>
          <v-text-field v-model="lastname" label="Lastname"></v-text-field>
          <v-text-field v-model="firstname" label="Firstname"></v-text-field>
          <v-text-field v-model="middlename" label="Middlename"></v-text-field>
          <v-text-field v-model="barangay" label="Barangay"></v-text-field>
          <v-text-field v-model="incomingYearlevel" label="Incoming Year Level"></v-text-field>
          <v-text-field v-model="courseIntendedToEnroll" label="Course Intended to Enroll"></v-text-field>
          <v-text-field v-model="schoolIntendedToEnroll" label="School Intended to Enroll"></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialogVisible = false">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="submitUser">Submit</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </template>
  
  <script>
  import { reactive } from 'vue';
  import { useStore } from 'vuex';
  
  export default {
    setup() {
      const store = useStore();
  
      const dialogVisible = reactive(true);
      const lastname = reactive('');
      const firstname = reactive('');
      const middlename = reactive('');
      const barangay = reactive('');
      const incomingYearlevel = reactive('');
      const courseIntendedToEnroll = reactive('');
      const schoolIntendedToEnroll = reactive('');
  
      function submitUser() {
        const user = {
          lastname: lastname.value,
          firstname: firstname.value,
          middlename: middlename.value,
          barangay: barangay.value,
          incomingYearlevel: incomingYearlevel.value,
          courseIntendedToEnroll: courseIntendedToEnroll.value,
          schoolIntendedToEnroll: schoolIntendedToEnroll.value,
        };
        store.dispatch('addUserToApi', user).then((success) => {
          if (success) {
            dialogVisible = false;
            // Clear form fields here if needed
          } else {
            // Handle error here, e.g., show an error message
          }
        });
      }
  
      return {
        dialogVisible,
        lastname:'',
        firstname:'',
        middlename:'',
        barangay:'',
        incomingYearlevel:'',
        courseIntendedToEnroll:'',
        schoolIntendedToEnroll:'',
        submitUser:'',
      };
    },
  };
  </script>
  