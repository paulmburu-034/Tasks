import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/tasks',
      name: 'TasksIndex',
      component: () => import('../views/tasks/TasksIndex.vue'),
    },
    {
      path: '/users',
      name: 'UsersIndex',
      component: () => import('../views/users/UsersIndex.vue'),
    },
    {
      path: '/tasks/create',
      name: 'TaskCreate',
      component: () => import('../views/tasks/TaskCreate.vue'),
    },
    {
      path: '/tasks/:id/edit',
      name: 'TaskEdit',
      component: () => import('../views/tasks/TaskEdit.vue'),
      props: true,
    },
    {
      path: '/statuses',
      name: 'StatusesIndex',
      component: () => import('../views/statuses/StatusesIndex.vue'),
    },
    {
      path: '/statuses/create',
      name: 'StatusCreate',
      component: () => import('../views/statuses/StatusCreate.vue'),
    },
    {
      path: '/statuses/:id/edit',
      name: 'StatusEdit',
      component: () => import('../views/statuses/StatusEdit.vue'),
      props: true,
    },
    {
      path: '/usertasks',
      name: 'UserTasksIndex',
      component: () => import('../views/usertasks/UserTasksIndex.vue'),
    },
    {
      path: '/usertasks/create',
      name: 'UserTaskCreate',
      component: () => import('../views/usertasks/UserTaskCreate.vue'),
    },
    {
      path: '/usertasks/:id/edit',
      name: 'UserTaskEdit',
      component: () => import('../views/usertasks/UserTaskEdit.vue'),
      props: true,
    },
  ],
});

export default router;