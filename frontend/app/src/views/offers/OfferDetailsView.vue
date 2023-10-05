<template>
    <div class="m-8 mt-20">
    <div class="grid grid-cols-1 p-1 mb-3"></div>
    <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center">{{ title }}</h1>
    <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Firstname</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.cus_firstname }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Lastname</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.cus_lastname }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.cus_email }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.cus_phone }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Brand</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_brand }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Model</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_model }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Year</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_year }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Color</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_color }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Mileage</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_mileage }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.offer_status }}</dd>
                    </div>
                </dl>
            </div>

    <div v-if="car_offer.offer_status === 'pending'">
        <button @click="changeStatusToAccepted"
        class="ml-5 mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Accept</button>
    </div>

    <div v-if="car_offer.offer_status === 'accepted'">
        <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Car Type</dt>
                        <input type="text" id="car_type" v-model="car_type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Engine</dt>
                        <input type="text" id="car_total_displacement" v-model="car_total_displacement" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Fuel Type</dt>
                        <input type="text" id="car_fuel_type" v-model="car_fuel_type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Drive System</dt>
                        <input type="text" id="car_drive_system" v-model="car_drive_system" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Transmission</dt>
                        <input type="text" id="car_transmission" v-model="car_transmission" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"></dd>
                    </div>
                </dl>
            </div>
        <button @click="changeStatusToChecked"
        class="ml-5 mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Checked</button>
    </div>

    <div v-if="car_offer.offer_status === 'checked'">
        <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Engine</dt>            
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_total_displacement }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Fuel Type</dt>                        
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_fuel_type }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Drive System</dt>                        
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_drive_system }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Transmission</dt>                        
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car_offer.car_transmission }}</dd>
                    </div>
                </dl>
            </div>
        <button @click="changeStatusToFilled"
        class="ml-5 mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Filled</button>
    </div>
</div>
</template>

<script>
import Axios from 'axios'
export default {
    data() {
        return {
            title: "Offer details",
            car_offer: null,
            car_total_displacement: '',
            car_fuel_type: '',
            car_drive_system: '',
            car_transmission: '',
            car_type: '',
            error: null,
        }
    },
    async created() {
        const id = this.$route.params.id;
        const url = `http://localhost/api/car_offers/${id}`;

        try {
            const reponse = await Axios.get(url);
            if (reponse.status == 200) {
                this.car_offer = reponse.data.data;
                console.table(this.car);
            }
        } catch (error) {
            console.log(error);
            this.error = error.message;
        }
    },
    methods: {
        async changeStatusToAccepted() {
            this.car_offer.offer_status = 'accepted';
            const url2 = `http://localhost/api/car_offers/${this.car_offer.id}`;
            try {
                const reponse = await Axios.put(url2, this.car_offer);
                if (reponse.status == 200) {
                    alert('Offer accepted');
                    this.$router.push(`/offers`);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        },
        async changeStatusToChecked() {
            this.car_offer.offer_status = 'checked';
            this.car_offer.car_total_displacement = this.car_total_displacement;
            this.car_offer.car_fuel_type = this.car_fuel_type;
            this.car_offer.car_drive_system = this.car_drive_system;
            this.car_offer.car_transmission = this.car_transmission;
            const url2 = `http://localhost/api/car_offers/${this.car_offer.id}`;
            try {
                const reponse = await Axios.put(url2, this.car_offer);
                if (reponse.status == 200) {
                    alert('Offer checked');
                    this.$router.push(`/offers`);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        },
        async changeStatusToFilled() {
            this.car_offer.offer_status = 'Filled';
            const url2 = `http://localhost/api/car_offers/${this.car_offer.id}`;
            try {
                const reponse = await Axios.put(url2, this.car_offer);
                if (reponse.status == 200) {
                    alert('Offer filled');
                    this.$router.push(`/offers`);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        }
    }
}
</script>