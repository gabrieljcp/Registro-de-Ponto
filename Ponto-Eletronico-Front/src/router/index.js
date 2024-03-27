import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/colaboradores',
      name: 'ColaboradoresIndex',
      component: () => import('../views/Colaboradores/ColaboradoresIndex.vue')
    },
    {
      path: '/registrar_ponto',
      name: 'Registrar_ponto',
      component: () => import('../views/Ponto/RegistrarPonto.vue')
    },
    {
      path: '/colaboradores/create',
      name: 'ColaboradoresCreate',
      component: () => import('../views/Colaboradores/ColaboradoresCreate.vue')
    },
    {
      path: '/colaboradores/:id/edit',
      name: 'ColaboradoresEdit',
      component: () => import('../views/Colaboradores/ColaboradoresEdit.vue'),
      props: true,
    }
  ]
})

export default router
