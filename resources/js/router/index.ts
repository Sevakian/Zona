import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';
import CalendarView from '@/views/CalendarView.vue';
import TimestatView from '@/views/TimestatView.vue';

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
  {
    path: '/timestat',
    name: 'timestat',
    component: TimestatView,
  },
];

export default createRouter({
  history: createWebHistory(),
  routes,
});
