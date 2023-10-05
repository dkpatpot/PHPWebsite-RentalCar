<template>
    <div class="m-8 mt-20">
        <div class="grid grid-cols-1 p-1 mb-3"></div>
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center">Edit Profile<hr></h1>
        <div class="mb-3 mt-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name:</label>
            <input type="text" id="name" v-model="name"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-3 mt-3">
            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone:</label>
            <input type="text" id="phone_number" v-model="phone_number" 
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password:</label>
            <input type="password" id="password" v-model="password" 
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <button @click="editProfile" 
            class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit</button>
    </div>
</template>

<script>
import { useAuthStore } from '@/stores/auth.js'
import Axios from 'axios'

export default {
    setup() {
        const auth_store = useAuthStore()
        return { auth_store }
    },
    data() {
        return {
            auth: null,
            name: '',
            password: '',
            phone_number: '',
        }
    },watch: {
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
            console.table(this.auth)
        } else {
            this.auth = null
            this.$router.push("/login");
        }
    },
    methods: {
        async editProfile() {
            this.error = null;
            const url2 = "http://localhost/api/auth/update";
            this.auth.name = this.name
            this.auth.password = this.password
            this.auth.phone_number = this.phone_number
            try {
                const reponse = await Axios.post(url2, this.auth);
                if (reponse.status == 200) {
                    this.$router.push("/users/profile");
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        }
    }
}
</script>
