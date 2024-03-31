import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import './assets/style.css'
import 'bootstrap/dist/css/bootstrap.css'
import routes from './routes/routes'

// create an instance of Pinia
const pinia = createPinia()

// create your app, use Pinia and routes
const app = createApp(App)
app.use(pinia)
app.use(routes)

// then mount your app
app.mount('#app')