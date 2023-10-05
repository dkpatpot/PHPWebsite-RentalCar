<template>
    <section class="m-8 mt-20">
        <div class="grid grid-cols-1 p-1 mb-3"></div>
        <p class="text-2xl font-bold tracking-tight text-gray-900 text-center">Staff<hr></p>
        <button @click="goToNewStaff"
            class="mb-5 text-white mt-7 flex w-20 h-10 items-center justify-center rounded-md border border-transparent bg-green-500">
            New Staff</button>
        <div v-for="user in users" v-bind:key="user.id">
            <div v-if="user.role === 'staff'"
                class="gird grid-cols-2 p-4 mb-4 border-2 border-blue-800 rounded-lg">
                <p>Staff Name: {{ user.name }} </p>
                <button @click="deleteStaff(user)"
                class="text-white mt-2 flex w-20  items-center justify-center rounded-md border border-transparent bg-red-700">
                Delete</button>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
import { useAuthStore } from '@/stores/auth.js'

export default {
    // setup() {
    //     const auth_store = useAuthStore()
    //     return { auth_store }
    // },
    data() {
        return {
            // auth: null,
            users: null,
            error: null,
        }
    },
    // watch: {
    //     auth_store: {
    //         immediate: true,
    //         deep: true,
    //         handler(newValue, oldValue) {
    //             console.log(newValue.getAuth)
    //             this.auth = this.auth_store.getAuth
    //         }
    //     }
    // },
    async mounted() {
        // if (this.auth_store.isAuthen) {
        //     this.auth = this.auth_store.getAuth
        //     if (this.auth.role != "manager") {
        //         this.auth_store.logout()
        //         this.$router.push("/login");
        //     }
        // } else {
        //     this.auth = null
        //     this.$router.push("/login");
        // }

        console.log("mounted");
        this.error = null;
        const url = "http://localhost/api/auth/allUser";
        try {
            const reponse = await axios.get(url);
            if (reponse.status === 200) {
                this.users = reponse.data.data;
                console.table(this.users);
                // console.log(reponse.data.data);
            } else {
                console.error(reponse.status);
            }
        } catch (error) {
            this.error = error.message;
            console.error(error.message);
        }
    },
    methods: {
        goToNewStaff() {
            this.$router.push("/managers/create_staff");
        },
        async deleteStaff(user) {
            const url2 = "http://localhost/api/auth/delete";
            try {
                const reponse = await axios.post(url2, user);
                if (reponse.status == 200) {
                    alert("ลบสำเร็จ")
                    this.$router.push("/managers/staffs");
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        }
    },
}

</script>