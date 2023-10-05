<template>
  <section class="grid place-items-center mt-20 md:mt-5 overflow-hidden">
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
      <div class="w-full max-w-md space-y-8">
        <div>
          <img alt="Car logo" class="logo mx-auto w-auto rounded-md" src="@/assets/CARCASH.jpg" width="300" height="125" c>
          <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900">Register your account</h2>
        </div>
        <form @submit.prevent="onFormSubmit()" class="mt-6 space-y-6" action="#" method="POST">
          <input type="hidden" name="remember" value="true">
          <div class="-space-y-px rounded-md shadow-sm">
            <div>
              <label for="email">Email address</label>
              <input id="email" type="email" v-model="user.email" required autocomplete="off"
                class="mb-2 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
              <label for="name">Your Name</label>
              <input id="name" type="text" v-model="user.name" required autocomplete="off"
              class="mb-2 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
              <label for="phone">Phone</label>
              <input id="phone" type="text" v-model="user.phone_number" required autocomplete="off"
              class="mb-2 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
              <label for="password">Password</label>
              <input type="password" id="password" v-model="user.password" required
              class="mb-2 relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
          </div>
          <div>
            <button type="submit" :disabled="disabledButton"
              class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white"
              @click="login()">
              Register new account
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>
  
  <script>
  import axios from 'axios'
  
  export default {
    data() {
      return {
        user: {
            email: '',
            name: '',
            phone_number: '',
            password: ''
            },
        error: null,
        disabledButton: false
      }
    },
    methods: {
      async onFormSubmit() {
        this.error = null
        this.disabledButton = true
        const url = "http://localhost/api/auth/register";
        this.error = null;
            try {
                console.log(this.user.name);
                const response = await axios.post(url, {
                    email: this.user.email,
                    name: this.user.name,
                    phone_number: this.user.phone_number,
                    password: this.user.password,
                    role: 'user'
                });
                if (response.status === 201) {
                        this.$router.push('/login');
                } else {
                    this.disabledButton = false
                }
            } catch (error) {
                this.error = error.message;
                console.log(error);
                this.disabledButton = false
            }
      }
    },
  }
  </script>