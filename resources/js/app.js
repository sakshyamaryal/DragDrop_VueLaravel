require('./bootstrap');
import { createApp } from 'vue';
import router from './router';
import HelloWorld from './components/Welcome.vue';
import PMS from './components/PMS.vue';  

const app = createApp({});

app.use(router);
app.component('hello-world', HelloWorld);
app.component('pms', PMS);  // Register the PMS component

app.mount('#app');
