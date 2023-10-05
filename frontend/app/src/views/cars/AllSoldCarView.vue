<template>
    <section class="mx-8 mt-20">
        <div class="grid grid-cols-1 p-1 mb-3">

        </div>
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center">{{ title }}<hr></h1>

        <div v-if="error != null">
            {{ error }}
        </div>
        <div class="grid grid-cols-3 p-4">
            <a class="text-xl text-center"> Car ID </a>
            <a class="text-xl text-center"> Buy By </a>
        </div>
        <div v-for="car in cars"
            v-bind:key="car.id">
            <div v-if="car.status === 'sold'"
                class="grid grid-cols-3 p-4 mb-4 border-2 border-blue-800 rounded-lg">
                <p class="line text-center">{{ car.car_code }}</p>
                <p class="line text-center">{{ car.buy_by }}</p>
                <button @click="deliver(car)" 
                    class="mr-auto ml-auto text-white flex w-60 items-center justify-center rounded-md border border-transparent bg-blue-800">
                    send to
                </button>
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
            title: "Purchase List",
            selected: null,
            cars: null,
            error: null,
            auth:null
        }
    },
    methods: {
        async deliver(car) {
            const url2 = `http://localhost/api/cars/${car.id}`;
            car.status = "deliver";
            try {
                const reponse = await axios.put(url2, car);
                if (reponse.status == 200) {
                    this.$router.push('/cars');
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        }
    },
    async mounted() {
        if (this.auth_store.isAuthen) {
            this.auth = this.auth_store.getAuth
        } else {
            this.auth = null
            this.$router.push("/login");
        }

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
}
</script>
<style>
    .line {
        border-right: 3px solid rgb(206, 206, 206);
        padding-right: 0.3rem;        
    }
</style>