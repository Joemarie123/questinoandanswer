/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Components
import App from './App.vue'

// Composables
import { createApp } from 'vue'

import router from './router';
import store from './store';


// Plugins
import { registerPlugins } from '@/plugins'


/* const cors = require('cors');
const corsConfig = {
  credentials: true,
  origin: true,
};
app.use(cors(corsConfig)); */

/* const cors = require('cors'); */
const app = createApp(App)
.use(router)
.use(store);

registerPlugins(app)

app.mount('#app')
/* app.use(cors()); */