const express = require('express');
const cors = require('cors');
const app = express();

// Allow requests from any origin
app.use(cors());

// ... other routes and middleware ...

// Start the server
app.use(cors({
  origin: 'http://192.168.8.37:3000/' // Allow requests from this specific origin
}));






