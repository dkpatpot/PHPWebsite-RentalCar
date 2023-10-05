import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/components/Home.vue')
    },
    {
      path: '/cars',
      name: 'cars',
      component: () => import('@/views/cars/AllCarView.vue')
    },
    {
      path: '/articles',
      name: 'articles', 
      component: () => import('@/views/article/AllArticleView.vue')
    },
    {
      path: '/cars/:id',
      name: 'car.details',
      component: () => import('@/views/cars/CarDetailsView.vue')
    },
    {
      path: '/articles/:id',
      name: 'article.details',
      component: () => import('@/views/article/ArticleDetailsView.vue')
    },
    {
      path: '/cars/create',
      name: 'car.create',
      component: () => import('@/views/cars/CreateCarView.vue')
    },
    {
      path: '/articles/create',
      name: 'article.create',
      component: () => import('@/views/article/CreateArticleView.vue')
    },
    {
      path: '/cars/edit/:id',
      name: 'car.edit',
      component: () => import('@/views/cars/EditCarView.vue')
    },
    {
      path: '/articles/edit/:id',
      name: 'article.edit',
      component: () => import('@/views/article/EditArticleView.vue')
    },

    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/LoginView.vue')
	  },
    {
      path: '/logout',
      name: 'logout',
      component: () => import('@/views/LogoutView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('@/views/RegisterView.vue')
    },
    {
      path: '/cars/buy/:id',
      name: 'car.buy',
      component: () => import('@/views/cars/BuyCarView.vue')
    },
    {
      path: '/users/profile',
      name: 'user.profile',
      component: () => import('@/views/users/ProfileView.vue')
    },
    {
      path: '/promotions',
      name: 'promotions',
      component: () => import('@/views/promotions/AllPromotionView.vue')
    },
    {
      path: '/promotions/create',
      name: 'promotion.create',
      component: () => import('@/views/promotions/CreatePromotionView.vue')
    },
    {
      path: '/promotions/:id',
      name: 'promotion.details',
      component: () => import('@/views/promotions/PromotionDetailsView.vue')
    },
    {
      path: '/users/buy_history',
      name: 'user.buy_history',
      component: () => import('@/views/users/BuyHistoryView.vue')
    },
    {
      path: '/offers/send_car_offer',
      name: 'offer.send_car_offer',
      component: () => import('@/views/offers/SendCarOfferView.vue')
    },
    {
      path: '/offers',
      name: 'offers',
      component: () => import('@/views/offers/AllOfferView.vue')
    },
    {
      path: '/offers/:id',
      name: 'offer.details',
      component: () => import('@/views/offers/OfferDetailsView.vue')
    },
    {
      path: '/offers/accepted',
      name: 'offers.accepted',
      component: () => import('@/views/offers/AllAcceptedOfferView.vue')
    },
    {
      path: '/offers/checked',
      name: 'offers.checked',
      component: () => import('@/views/offers/AllCheckedOfferView.vue')
    },
    {
      path: '/users/edit',
      name: 'user.edit',
      component: () => import('@/views/users/EditProfileView.vue')
    },
    {
      path: '/managers/staffs',
      name: 'manager.staffs',
      component: () => import('@/views/managers/AllStaffAccountView.vue')
    },
    {
      path: '/managers/create_staff',
      name: 'manager.create_staff',
      component: () => import('@/views/managers/CreateStaffAccountView.vue')
    },
    {
      path: '/managers/report',
      name: 'manager.report',
      component: () => import('@/views/managers/ManagerReport.vue')
    },
    {
      path: '/cars/sold',
      name: 'car.sold',
      component: () => import('@/views/cars/AllSoldCarView.vue')
    },
  ]
})

export default router
