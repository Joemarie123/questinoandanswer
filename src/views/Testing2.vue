<template>
    <div>
      <p>Received data: {{ receivedData }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      receivedData: String,
    },
  };
  </script>
  