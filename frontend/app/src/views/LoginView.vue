<template>
  <section class="grid place-items-center mt-20 md:mt-10 overflow-hidden">
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <div>
        <img alt="Car logo" class="logo mx-auto w-auto rounded-md" src="@/assets/CARCASH.jpg" width="300" height="125" c>
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
      </div>
      <form @submit.prevent="onFormSubmit()" class="mt-6 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <!-- <label for="email" class="sr-only">Email</label> -->
            <h3 class="mb-1">Email address</h3>
            <input id="email" name="email" type="text" placeholder="" v-model="email" required
              class="mb-2 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
          </div>
          <div>
            <!-- <label for="password" class="sr-only">Password</label> -->
            <h4 class="mb-1">Password</h4>
            <input id="password" name="password" type="password" placeholder="" v-model="password" required
              class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
          </div>
        </div>
        <div>
          <button type="submit" :disabled="disabledButton"
            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white"
            @click="login()">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                  clip-rule="evenodd" />
              </svg>
            </span>
            Log in
          </button>
        </div>
      </form>
    </div>
  </div>
  </section>
</template>

<script>
  import {
    useAuthStore
  } from '@/stores/auth.js'

  export default {
    setup() {
      const auth_store = useAuthStore()
      return {
        auth_store
      }
    },
    data() {
      return {
        email: '',
        password: '',
        error: null,
        disabledButton: false
      }
    },
    methods: {
      async onFormSubmit() {
        this.error = null
        this.disabledButton = true
        try {
          if (await this.auth_store.login(this.email, this.password)) {
            this.$router.push('/cars')
          } else {
            this.disabledButton = false
          }
        } catch (error) {
          console.log(error)
          this.disabledButton = false
        }
      }
    },
  }
</script>