<template>
    <section class="mt-20">
        <div class="pt-5">
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ promotion.name }}</h1>
                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400">
                                <span>Code Avilable: {{ avilable_codes_count }}</span>
                            </li>
                            <div v-for="code in promotion.codes">
                                <li class="text-gray-400">
                                    <div v-if="code.redeemed_at === null">
                                        <p>Code: {{ code.code }}</p>
                                    </div>
                                </li>
                            </div>
                            <li class="text-gray-400">
                                จำนวนโค้ดที่ใช้ไปแล้ว: {{ redeemed_codes_count }}
                                <div v-for="code in promotion.codes">
                                    <div v-if="code.redeemed_at !== null">
                                        <p>Code: {{ code.code }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div v-if="this.promotion.is_active === 1">
                        <button @click="changeActive()"
                            class="text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Not Active
                        </button>
                    </div>
                    <div v-if="this.promotion.is_active === 0">
                        <button @click="changeActive()"
                            class="text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Active
                        </button>
                    </div>
                </div>       
            </div>
        </div>
    </section>
</template>

<script>
import Axios from 'axios'
    export default {
        data() {
            return {
                title: "Promotion Details",
                error: null,
                promotion: null,
                avilable_codes_count: 0,
                redeemed_codes_count: 0
            }
        },
        methods: {
            async changeActive() {
                this.error = null;
                const url = `http://localhost/api/promotions/${this.promotion.id}`;
                if (this.promotion.is_active) {
                    this.promotion.is_active = false;
                } else {
                    this.promotion.is_active = true;
                }
                try {
                    const response = await Axios.put(url, this.promotion);
                    if (response.status === 200) {
                        console.table(response.data);
                        this.$router.push(`/promotions/${this.promotion.id}`);
                    }
                } catch (error) {
                    this.error = error.message;
                    console.log(error);
                }
            }
        },
        async created() {
        const id = this.$route.params.id;
        const url = `http://localhost/api/promotions/${id}`;

        try {
            const reponse = await Axios.get(url);
            if (reponse.status == 200) {
                this.promotion = reponse.data.data;
                console.table(this.promotion);
                this.avilable_codes_count = this.promotion.codes.filter(code => code.redeemed_at === null).length;
                this.redeemed_codes_count = this.promotion.codes.filter(code => code.redeemed_at !== null).length;
            }
        } catch (error) {
            console.log(error);
            this.error = error.message;
        }
    },
    }
</script>