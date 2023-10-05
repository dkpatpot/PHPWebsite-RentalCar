<template>
    <section class="mt-20">
        <div v-if="error != null">
            {{ error }}
        </div>
        <div class="bg-white border-2 rounded-lg">
            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Promotions</h2>
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <div v-for="promotion in promotions" v-bind:key="promotion.id">
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-m text-gray-700">{{ promotion.name }}</h3>
                                <div v-if="promotion.is_active">
                                    <p>Active</p>
                                    <div v-if="promotion.discount_type === 'percent'">
                                        <p>ลด {{ promotion.percent }}%</p>
                                    </div>
                                    <div v-else>
                                        <p>ลด {{ promotion.amount }} บาท</p>
                                    </div>
                                </div>
                                <div v-else>
                                    <p>Not active</p>
                                    <div v-if="promotion.discount_type === 'percent'">
                                        <p>ลด {{ promotion.percent }}%</p>
                                    </div>
                                    <div v-else>
                                        <p>ลด {{ promotion.amount }} บาท</p>
                                    </div>
                                </div>
                                <button v-on:click="goToDetailView(promotion)" class="mt-2 px-10 py-1 border rounded-xl">Detail</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            title: "Promotion List",
            promotions: null,
            error: null
        }
    },
    async mounted() {
        console.log("mounted");
        this.error = null;
        const url = "http://localhost/api/promotions";
        try {
            const reponse = await axios.get(url);
            if (reponse.status === 200) {
                
                this.promotions = reponse.data.data;
                console.log(reponse.data.data);
            } else {
                console.error(reponse.status);
            }
        } catch (error) {
            this.error = error.message;
            console.error(error.message);
        }
    },
    methods: {
        goToDetailView(promotion) {
            this.$router.push(`/promotions/${promotion.id}`);
        },
    }
}
</script>