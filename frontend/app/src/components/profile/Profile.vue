<template>
  <div v-if="auth && auth.role === 'user'" class="flex">
    <!-- Welcome, {{ auth.email }} [{{ auth.point }} Point] |  -->
    Welcome, {{ auth.name }}
    <router-link to="/cars" class="flex-1">Car</router-link>
    <router-link to="/articles" class="flex-1">Article</router-link>
    <router-link to="/users/profile" class="flex-1">Profile</router-link>
    <router-link to="/users/buy_history" class="flex-1">History</router-link>
    <router-link to="/offers/send_car_offer" class="flex-1">Sell Car</router-link>
    <router-link to="/logout" class="flex-1">Logout</router-link>
  </div>

  <div v-if="auth && auth.role === 'staff'" class="flex">
    Staff {{ auth.name }}
    <router-link to="/cars" class="flex-1">Car</router-link>
    <router-link to="/cars/sold" class="flex-1">Sold Car</router-link>
    <router-link to="/cars/create" class="flex-1">Create Car</router-link>
    <router-link to="/articles/create" class="flex-1">Create Article</router-link>
    <router-link to="/promotions" class="flex-1">Promotion</router-link>
    <router-link to="/offers" class="flex-1">All Offer</router-link>
    <router-link to="/offers/accepted" class="flex-1">Accepted</router-link>
    <router-link to="/offers/checked" class="flex-1">Checked</router-link>
    <router-link to="/users/profile" class="flex-1">Profile</router-link>
    <router-link to="/logout" class="flex-1">Logout</router-link>
  </div>

  <div v-if="auth && auth.role === 'manager'" class="flex">
    <div>Manager {{ auth.name }}</div>
    <router-link to="/promotions" class="flex-1">Promotions</router-link>
    <router-link to="/promotions/create" class="flex-1">Create Promotion</router-link>
    <router-link to="/managers/staffs" class="flex-1">All Staff</router-link>
    <router-link to="/managers/create_staff" class="flex-1">Create Staff</router-link>
    <router-link to="/logout" class="flex-1">Logout</router-link>
    <router-link to="/users/profile" class="flex-1">Profile</router-link>
  </div>

  <div v-if="auth === null" class="flex">
    <RouterLink to="/cars" class="flex-1">Cars</RouterLink>
    <router-link to="/articles" class="flex-1">Articles</router-link>
    <router-link to="/offers/send_car_offer" class="flex-1">Sell Car</router-link>
    <RouterLink to="/register" class="flex-1">Register</RouterLink>
    <router-link to="/login" class="flex-1">Please Login</router-link>
  </div>
</template>

<script>
import { useAuthStore } from '@/stores/auth.js'

export default {
  setup() {
    const auth_store = useAuthStore()
    return { auth_store }
  },
  data() {
    return {
      auth: null
    }
  },
  watch: {
      auth_store: {
          immediate: true,
          deep: true,
          handler(newValue, oldValue) {
            console.log(newValue.getAuth)
            this.auth = this.auth_store.getAuth
          }
      }
  },
  mounted() {
    if (this.auth_store.isAuthen) {
      this.auth = this.auth_store.getAuth
    } else {
      this.auth = null
    }
    
  }
}
</script>