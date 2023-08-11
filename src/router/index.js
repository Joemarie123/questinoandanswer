// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
 

  
  
  {
    path: '/',
    name: 'Home',
    component: () => import('@/views/Home.vue')
  },


  {
    path: '/ExamName',
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
    path: '/Testing',
    name: 'Testing',
    component: () => import('@/views/Testing.vue')
  },

  {
    path: '/Testing2',
    name: 'Testing2',
    component: () => import('@/views/Testing2.vue')
  },


  

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

  {
    path: '/TestingQuestion',
    name: 'TestingQuestion',
    component: () => import('@/views/TestingQuestion.vue')
  },


]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
