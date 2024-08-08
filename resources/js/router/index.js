import { createRouter, createWebHistory } from 'vue-router';
import Welcome from '../components/Welcome.vue';
import PMS from '../components/PMS.vue';  // Import your PMS component

const routes = [
  { path: '/', component: Welcome },
  { path: '/pms', component: PMS }  // Route for PMS page
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
