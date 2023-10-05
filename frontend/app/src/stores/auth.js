import { defineStore } from 'pinia'
import { authAPI } from '@/services/api'

const auth_storage = {
  id: localStorage.getItem('auth.id'),
  email: localStorage.getItem('auth.email'),
  name: localStorage.getItem('auth.name'),
  role: localStorage.getItem('auth.role'),
  phone_number: localStorage.getItem('auth.phone_number'),
}

export const useAuthStore = defineStore({
  id: 'auth',
  state: () => {
    return {
      auth: {
        id: auth_storage.id,
        email: auth_storage.email,
        name: auth_storage.name,
        role: auth_storage.role,
        phone_number: auth_storage.phone_number,
      }
    }
  },

  getters: {
    getAuth: (state) => state.auth,

    getEmail: (state) => state.auth.email,

    isAuthen (state) {
      return state.auth.email != null
    }
  },

  actions: {
    async login (email, password) {
      if (await authAPI.login(email, password)) {
        this.fetch()
        return true
      }
      return false
    },

    async fetch () {
      this.auth = await authAPI.me()
      localStorage.setItem('auth.id', this.auth.id)
      localStorage.setItem('auth.email', this.auth.email)
      localStorage.setItem('auth.name', this.auth.name)
      localStorage.setItem('auth.role', this.auth.role)
      localStorage.setItem('auth.phone_number', this.auth.phone_number)
    },

    logout () {
      authAPI.logout()
      localStorage.removeItem('auth.id')
      localStorage.removeItem('auth.email')
      localStorage.removeItem('auth.name')
      localStorage.removeItem('auth.role')
      localStorage.removeItem('auth.phone_number')
      this.auth = {
        id: null,
        email: null,
        name: null,
        role: null,
        phone_number: null,
      }
    }
  }
})