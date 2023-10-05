<template>
    <div class="m-8 flex min-h-full py-12 px-4 sm:px-6 lg:px-8 grid md:mt-16 overflow-hidden">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center">{{ title }}<hr></h1>

        <div>
            <div class="mb-3 mt-3">
                <label for="car_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Car Code</label>
                <input type="text" id="car_code" v-model="car.car_code"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type</label>
                <input type="text" id="type" v-model="car.type"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Brand</label>
                <input type="text" id="brand" v-model="car.brand"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Years</label>
                <input type="text" id="years" v-model="car.years"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Model</label>
                <input type="text" id="model" v-model="car.model"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Color</label>
                <input type="text" id="color" v-model="car.color" 
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="total_displacement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Displacement</label>
                <input type="text" id="total_displacement" v-model="car.total_displacement"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="mileage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mileage</label>
                <input type="text" id="mileage" v-model="car.mileage"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="fuel_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fuel Type</label>
                <input type="text" id="fuel_type" v-model="car.fuel_type"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="drive_system" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drive System</label>
                <input type="text" id="drive_system" v-model="car.drive_system"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transmission</label>
                <input type="text" id="transmission" v-model="car.transmission"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input type="number" id="price" v-model="car.price"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div>
                <label for="status">Status</label>
                <select id="status" v-model="car.status" class="block mb-5 text-sm font-medium text-gray-900 dark:text-gray-300">
                    <option value="available" class="rounded-lg">Available</option>
                    <option value="sold" class="rounded-lg">Sold</option>
                </select>
            </div>

            <button @click="editCar()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Edit
            </button>
        </div>
    </div>
</template>
<script>
import Axios from 'axios'
export default {
    data() {
        return {
            title: "Car Edit",
            error: null,
            car: null
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
    methods: { 
        async editCar() {
            this.error = null;
            const url = `http://localhost/api/cars/${this.car.id}`;
            const data = {
                car_code: this.car.car_code,
                type: this.car.type,
                brand: this.car.brand,
                years: this.car.years,
                model: this.car.model,
                color: this.car.color,
                total_displacement: this.car.total_displacement,
                mileage: this.car.mileage,
                fuel_type: this.car.fuel_type,
                drive_system: this.car.drive_system,
                transmission: this.car.transmission,
                price: this.car.price,
                status: this.car.status,
            };
            try {
                const reponse = await Axios.put(url, data);
                if (reponse.status == 200) {
                    this.$router.push(`/cars/${this.car.id}`);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        }
        

    }
}
</script>
<style>
nav {
  display: flex;
  align-items: center;
  justify-content: center;
}
nav .menu-item {
  color: #FFF;
  padding: 10px 15px;
  position: relative;
  text-align: center;
  border-bottom: 3px none transparent;
  display: flex;
  transition: 0.4s;
}
nav .menu-item.active,
nav .menu-item:hover {
  background-color: rgb(17, 192, 195);
  border-bottom-color: #ffffff;
}
nav .menu-item a {
  color: inherit;
  text-decoration: none;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgb(255, 255, 255); 
  border-radius: 10px 10px 10px 10px;
  width: max-content;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}
.dropdown:hover .dropdown-content { 
  display: block;
}
</style>