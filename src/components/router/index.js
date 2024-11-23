import { createRouter, createWebHistory } from 'vue-router';
import AdminPizzas from '../components/AdminPizzas.vue';
import CreatePizza from '../components/CreatePizza.vue';
import AdminOrders from '../components/AdminOrders.vue';

const routes = [
  { path: '/admin/pizzas', component: AdminPizzas, name: 'AdminPizzas' },
  { path: '/admin/pizzas/create', component: CreatePizza, name: 'CreatePizza' },
  { path: '/admin/orders', component: AdminOrders, name: 'AdminOrders' },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
