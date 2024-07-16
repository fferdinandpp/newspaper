import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../views/HomePage.vue'
import DetailNewsPage from '../views/DetailNewsPage.vue'
import LoginPage from '../views/LoginPage.vue'
import RegisterPage from '../views/RegisterPage.vue'
import ProfilePage from '../views/ProfilePage.vue'
import EditProfilePage from '../views/EditProfilePage.vue'
import ChangePasswordPage from '../views/ChangePasswordPage.vue'
import DashboardPage from '../views/DashboardPage.vue'
import UserPage from '../views/UserPage.vue'
import CategoryPage from '../views/CategoryPage.vue'
import NewsPage from '../views/NewsPage.vue'
import CommentPage from '../views/CommentPage.vue'
import AddCategoryPage from '../views/AddCategoryPage.vue'
import AddNewsPage from '../views/AddNewsPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: HomePage
    },
    {
      path: '/detailnews',
      component: DetailNewsPage
    },
    {
      path: '/login',
      component: LoginPage
    },
    {
      path: '/register',
      component: RegisterPage
    },
    {
      path: '/profile',
      component: ProfilePage
    },
    {
      path: '/editprofile',
      component: EditProfilePage
    },
    {
      path: '/changepassword',
      component: ChangePasswordPage
    },
    {
      path: '/dashboard',
      component: DashboardPage
    },
    {
      path: '/user',
      component: UserPage
    },
    {
      path: '/category',
      component: CategoryPage
    },
    {
      path: '/addcategory',
      component: AddCategoryPage
    },
    {
      path: '/news',
      component: NewsPage
    },
    {
      path: '/addnews',
      component: AddNewsPage
    },
    {
      path: '/comment',
      component: CommentPage
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }
  ]
})

export default router
