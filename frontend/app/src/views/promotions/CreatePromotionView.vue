<template>
    <section class="m-8 min-h-full py-12 px-4 sm:px-6 lg:px-8 grid md:mt-10 overflow-hidden">
        <div>
            <h1 class="mt-6 text-center text-2xl font-bold tracking-tight text-gray-900">Create New Promotion<hr></h1>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-5">Name</label>
                <input type="text" id="name" v-model="promotion.name" required
                class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mt-5">
                <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Detail</label>
                <textarea id="detail" v-model="promotion.detail" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                style="height: 130px;" />
            </div>
            <div class="mt-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status</label>
                <select class="ml-2 rounded-md border border-gray-300" v-model="promotion.is_active">
                    <option value="0">Active</option>
                    <option value="1">Not active</option>
                </select>
            </div>
            <div class="mt-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Discount Type</label>
                <select class="ml-2 rounded-md border border-gray-300" v-model="promotion.discount_type">
                    <option value='percent'>Percent</option>
                    <option value='amount'>Amount</option>
                </select>
            </div>
            <div class="mt-5">
                <label for="total_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Amount</label>
                <input type="number" id="total_amount" v-model="promotion.total_amount" required
                class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div v-if="promotion.discount_type === 'percent'" class="mt-5">
                <label for="percent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Percent</label>
                <input type="number" id="percent" v-model="promotion.percent" required
                class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div v-if="promotion.discount_type === 'amount'" class="mt-5">
                <label for="amount">Amount</label>
                <input type="number" id="amount" v-model="promotion.amount" required
                class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mt-5">
                <button @click="createNewPromotion()"
                    class="px-4 py-2 rounded-lg bg-blue-500">
                    Create
                </button>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            promotion: {
                name: "",
                detail: "",
                is_active: 0,
                discount_type: "percent",
                percent: 0,
                amount: 0,
                total_amount: 0,
            },
            error: null
        }
    },
    methods: {
        async createNewPromotion() {
            const url = "http://localhost/api/promotions";
            this.error = null;

            try {
                const response = await axios.post(url, this.promotion);
                if (response.status === 201) {
                    console.table(response.data);
                    // let promotion_id = response.data.promotion;
                    // this.$router.push({
                    //     name: 'promotion.details',
                    //     params: { id: promotion_id }
                    // });
                }
            } catch (error) {
                this.error = error.message;
                console.log(error);
            }
            this.$router.push(`/promotions`);
        }
    }
}
</script>