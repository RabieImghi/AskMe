import { createApp } from 'vue'
import App from './App.vue'
import './assets/style.css';

import routes from './routes/routes'
createApp(App).use(routes).mount('#app')
