<template>
    <section class="mx-8 mt-20">
        <div class="grid grid-cols-1 p-1 mb-3"></div>
        <p class="text-2xl font-bold tracking-tight text-gray-900 text-center mb-5">{{ title }}<hr></p>
        <div v-for="car_offer in car_offers" v-bind:key="car_offer.id">
            <div class="grid grid-cols-3 p-4 mb-4 border-2 border-blue-800 rounded-lg">
                <div>
                    <p class="line ml-auto mr-auto">Firstname: {{ car_offer.cus_firstname }}</p>
                    <p>Lastname: {{ car_offer.cus_lastname}}</p>
                </div>
                <div>
                    <p>Brand: {{ car_offer.car_brand }}</p>
                    <p>Model: {{ car_offer.car_model }}</p>
                </div>
                <button v-on:click="goToDetailView(car_offer)"
                class="px-2 py-1 border rounded-xl">Detail</button>
            </div>    
        </div>
    </section>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            title: "Car Offer List",
            car_offers: null,
            error: null
        }
    },
    async mounted() {
        console.log("mounted");
        const url = "http://localhost/api/car_offers";
        this.error = null;

        try {
            const response = await axios.get(url);
            if (response.status === 200) {
                this.car_offers = response.data.data;
                console.log(response.data.data);
            } else {
                console.error(response.status);
            }
        } catch (error) {
            this.error = error.message;
            console.log(error);
        }
    },
    methods: {
        goToDetailView(car_offer) {
            this.$router.push(`/offers/${car_offer.id}`);
        },
    },
}
</script>