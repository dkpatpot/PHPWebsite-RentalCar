<template>
    <div class="mt-20 container">
        <div class="grid grid-cols-1 p-1 mb-3"></div>
        <h1 class="text-4xl text-center">Profile<hr></h1>
        
    <div class="border-t border-gray-200 mt-10">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ auth.email }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ auth.name }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ auth.phone_number }}</dd>
                    </div>
                </dl>
            </div>
    <div class="mr-auto ml-auto">
    <button @click="editProfile" 
        class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Edit</button>
        </div>
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
            auth: null,
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
        } else {
            this.auth = null
            this.$router.push("/login");
        }
    },
    methods: {
        editProfile() {
            this.$router.push("/users/edit");
        }
    }
}

</script>