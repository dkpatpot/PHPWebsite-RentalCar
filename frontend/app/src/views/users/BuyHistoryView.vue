<template>
    <section class="mx-8 mt-20">
        <div class="grid grid-cols-1 p-1 mb-3"></div>
        <p class="text-2xl font-bold tracking-tight text-gray-900 text-center mb-5">Buy History<hr></p>
        <div v-for="car in cars"
            v-bind:key="car.id">
            <div v-if="car.buy_by === auth.email"
                class="grid grid-cols-2 p-4 mb-4 border-2 border-blue-800 rounded-lg">
                <div>
                    <h3 class="text-xl mt-auto mb-auto">Car ID: {{ car.car_code }}</h3>
                    <p class="line ml-auto mr-auto">Brand: {{ car.brand }}</p>
                    <p class="line ml-auto mr-auto">Model: {{ car.model }}</p>
                </div>
                <button v-on:click="goToDetailView(car)"
                class="px-2 py-1 border rounded-xl">Detail</button>
            </div>    
        </div>
    </section>
</template>

<script>
import axios from 'axios'
import { useAuthStore } from '@/stores/auth.js'

    export default {
        setup() {
            const auth_store = useAuthStore()
            return { auth_store }
        },
        data() {
            return {
                cars: null,
                auth: null,
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
        methods: {
            goToDetailView(car) {
                this.$router.push(`/cars/${car.id}`);
            },
        },
        async mounted() {
            console.log("mounted");
            this.error = null;
            const url = "http://localhost/api/cars";
            try {
                const reponse = await axios.get(url);
                if (reponse.status === 200) {
                    this.cars = reponse.data.data;
                    console.log(reponse.data.data);
                } else {
                    console.error(reponse.status);
                }
            } catch (error) {
                this.error = error.message;
                console.error(error.message);
            }

            if (this.auth_store.isAuthen) {
                this.auth = this.auth_store.getAuth
                if (this.auth.role != "user") {
                    this.auth_store.logout()
                    this.$router.push("/login");
                }
            } else {
                this.auth = null
                this.$router.push("/login");
            }
        }
    }
</script>