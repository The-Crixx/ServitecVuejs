// router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue'
import Dashboard from '../components/Dashboard.vue'
import Registro from '../components/Registro.vue'
import Admin from '../components/Admin.vue'
import Dbrig from '../components/dbrig.vue'
import Dlab from '../components/dlab.vue'
import Divea from '../components/divea.vue'
import Dhuert from '../components/dhuert.vue'
import Admincomment from '../components/Admincomment.vue'
import AdminTabla from '../components/AdminTabla.vue'
import Principal from '../components/Principal.vue'

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    children: [
      {
        path: '/principal',
        name: 'Principal',
        component: Principal,
      },
      {
        path: '/dhuert',
        name: 'Dhuert',
        component: Dhuert,
      },
      {
        path: '/dlab',
        name: 'Dlab',
        component: Dlab,
      },
      {
        path: '/divea',
        name: 'Divea',
        component: Divea,
      },
      {
        path: '/dbrig',
        name: 'Dbrig',
        component: Dbrig,
      }
    ]
  },
  {
    path: '/registro',
    name: 'Registro',
    component: Registro
  },
  {
    path: '/admin',
    name: 'Admin',
    component: Admin,
    children: [
      {
        path: '/Admintabla',
        name: 'Admintabla',
        component: AdminTabla,
      },
      {
        path: '/AdminComments',
        name: 'AdminComments',
        component: Admincomment,
      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

// Optional navigation guard
router.beforeEach((to, from, next) => {
  // Check if route requires authentication
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // Check if user is logged in (you'll implement this logic)
    const isAuthenticated = checkAuthentication()
    
    if (!isAuthenticated) {
      next('/')
    } else {
      next()
    }
  } else {
    next()
  }
})

// Placeholder authentication check function
function checkAuthentication() {
  // Implement your authentication logic here
  // For example, check for a token in localStorage
  return !!localStorage.getItem('authToken')
}

export default router