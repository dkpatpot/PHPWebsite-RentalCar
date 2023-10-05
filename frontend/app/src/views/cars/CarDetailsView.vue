<template>
<div class="bg-white mt-20">
  <div class="pt-6">
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
        <div class="aspect-w-3 aspect-h-2 overflow-hidden border rounded-lg mt-auto mb-auto">
            <h3 class="text-2xl font-bold tracking-tight text-gray-900 text-center">Car ID-{{car.car_code}}</h3>
            <p v-if="car.image.length > 0"><img v-bind:src="'http://localhost/car_images/' + car.image" 
                class="h-full w-full object-cover object-center"></p>
        </div>
        <div>
          <h3 class="text-2xl font-bold tracking-tight text-gray-900"> ฿ {{car.price}}</h3>
          <div class="mt-4">
            <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                <h2 class="sr-only">Car information</h2>
                <li class="text-gray-400"><span class="text-gray-600">Type : {{ car.type }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Brand: {{ car.brand }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Years: {{ car.years }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Model: {{ car.model }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Color: {{ car.color }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Engine: {{ car.total_displacement }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Mileage: {{ car.mileage }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Fuel Type: {{ car.fuel_type }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Drive System: {{ car.drive_system }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Transmission: {{ car.transmission }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Status: {{ (car.status) }}</span></li>
            </ul>
          </div>
            <div v-if="car.buy_by === null">
                <div v-if="auth.role === 'user'">
                    <button @click="goToBuyCar" class="mt-7 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Buy</button>
                </div>
                <div v-if="auth.role === 'staff'">
                    <button @click="goToEditCar" class="mt-7 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</button>
                </div>
            </div>  
        </div>
    </div>
    <div v-if="car.buy_by != null" class="mx-8 mt-10">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Trading details</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-money" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                        <path d="M12 17v1m0 -8v1"></path>
                    </svg>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Buy by</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.buy_by }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Interest</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.interest }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Down Payment</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.down_payment }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Used Code</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.p_code }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Discount</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.p_discount }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Price with VAT</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.price_with_vat }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Total Price</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.total_price }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Pay Period</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.pay_period }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Monthly Payment</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ car.monthly_payment }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
import Axios from 'axios'
import { useAuthStore } from '@/stores/auth.js'
export default {
    setup() {
            const auth_store = useAuthStore()
            return { auth_store }
    },
    data() {
        return {
            title: "Car Details",
            error: null,
            car: null,
            auth: null
        }
    },
    async created() {
        const id = this.$route.params.id;
        const url = `http://localhost/api/cars/${id}`;

        try {
            const reponse = await Axios.get(url);
            if (reponse.status == 200) {
                this.car = reponse.data.data;
                console.table(this.car);
            }
        } catch (error) {
            console.log(error);
            this.error = error.message;
        }
    },
    mounted() {
        if (this.auth_store.isAuthen) {
            this.auth = this.auth_store.getAuth
        } else {
            this.auth = null
        }
    },
    methods: { 
        goToEditCar() {
            this.$router.push(`/cars/edit/${this.car.id}`);
        },

        goToBuyCar() {
            this.$router.push(`/cars/buy/${this.car.id}`);
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