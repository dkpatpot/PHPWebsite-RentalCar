<template>
    <div class="m-8 mt-20">
      <div class="grid grid-cols-1 p-1 mb-3"></div>
      <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center">Register Staff<hr></h1>
    
      <div v-if="error">
        {{ error }}
      </div>
  
      
  <form @submit.prevent="onFormSubmit()">
    <div class="mb-3 mt-3">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
      <input type="email" id="email" v-model="user.email" placeholder="name@gmail.com" required autocomplete="off"
      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
    </div>
    <div class="mb-3">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
      <input type="text" id="name" v-model="user.name" placeholder="name" required autocomplete="off"
      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
    </div>
    <div class="mb-3">
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone</label>
      <input type="text" id="phone" v-model="user.phone_number" placeholder="phone" required autocomplete="off"
      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
    </div>
    <div class="mb-3">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
      <input type="password" id="password" v-model="user.password" required
      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
    </div>
    
    <button type="submit" :disabled="disabledButton" 
      class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Register new staff
    </button>

    <button @click="back"
      class="ml-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Back
    </button>
  </form>

    </div>
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
                      role: 'staff'
                  });
                  if (response.status === 201) {
                          this.$router.push('/managers/staffs');
                  } else {
                      this.disabledButton = false
                  }
              } catch (error) {
                  this.error = error.message;
                  console.log(error);
                  this.disabledButton = false
              }
        },
        back() {
          this.$router.push('/managers/staffs');
        }
      },
    }
    </script>