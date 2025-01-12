import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';
import CalendarView from '@/views/CalendarView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView,
  },
  {
    path: '/calendar',
    name: 'calendar',
    component: CalendarView,
  },
];

export default createRouter({
  history: createWebHistory(),
  routes,
});
