// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
 

  
  {
    path: '/',
    name: 'ExamName',
    component: () => import('@/views/ExamName.vue')
  },

/*     
  {
    path: '/Header',
    name: 'Header',
    component: () => import('@/components/Header.vue')
  },
 */

  {
    path: '/SetAExamList',
    name: 'SetAExamList',
    component: () => import('@/views/SetAExamList.vue')
  },


  {
    path: '/SetBExamList',
    name: 'SetBExamList',
    component: () => import('@/views/SetBExamList.vue')
  },


]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
