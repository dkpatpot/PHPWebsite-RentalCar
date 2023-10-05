<template>
    <section class="mx-8 mt-20">
        <div v-if="error != null">
            {{ error }}
        </div>
        <div class="grid grid-flow-row-dense gird-col-4 text-center">
        <div class="grid place-items-center grid-cols-4 my-4 mt-20 items-end gap-10">
            <div>
                <label for="ctg_type" class="mr-2 mb-2 text-sm font-medium">Type</label>
                <select name="" id="ctg_type" v-model="ctg_type" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='MICRO'>MICRO</option>
                    <option value='SEDAN'>SEDAN</option>
                    <option value='SUV'>SUV</option>
                    <option value='HATCHBACK'>HATCHBACK</option>
                    <option value="HYBRID">HYBRID</option>
                    <option value='ROADSTER'>ROADSTER</option>
                    <option value='PICKUP'>PICKUP</option>
                    <option value='VAN'>VAN</option>
                    <option value='COUPE'>COUPE</option>
                    <option value='SPORTSCAR'>SPORTSCAR</option>
                    <option value='SUPERCAR'>SUPERCAR</option>
                    <option value='CAMPERVAN'>CAMPERVAN</option>
                    <option value='MINIVAN'>MINIVAN</option>
                </select>
            </div>
            <div>
                <label for="ctg_brand" class="mr-2 mb-2 text-sm font-medium">Brand</label>
                <select name="" id="ctg_brand" v-model="ctg_brand" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='AUDI'>AUDI</option>
                    <option value='MERCEDES-BENZ'>MERCEDES BENZ</option>
                    <option value='BMW'>BMW</option>
                    <option value='FORD'>FORD</option>
                    <option value='HONDA'>HONDA</option>
                    <option value='HYUNDAI'>HYUNDAI</option>
                    <option value='ISUZU'>ISUZU</option>
                    <option value='MAZDA'>MAZDA</option>
                    <option value='MG'>MG</option>
                    <option value="MINI">MINI</option>
                    <option value="MITSUBISHI">MITSUBISHI</option>
                    <option value="NISSAN">NISSAN</option>
                    <option value="SUBARU">SUBARU</option>
                    <option value="SUZUKI">SUZUKI</option>
                    <option value="TOYOTA">TOYOTA</option>
                    <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                    <option value="VOLVO">VOLVO</option>
                </select>
            </div>
            <div>
                <label for="ctg_model" class="mr-2 mb-2 text-sm font-medium">Model</label>
                <select name="" id="ctg_model" v-model="ctg_model" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    style="min-width: 100px;">
                    <!-- AUDI -->
                    <option v-if="ctg_brand === 'AUDI'" value="A3">A3</option>
                    <option v-if="ctg_brand === 'AUDI'" value="A4">A4</option>
                    <option v-if="ctg_brand === 'AUDI'" value="A5">A5</option>
                    <option v-if="ctg_brand === 'AUDI'" value="A6">A6</option>
                    <option v-if="ctg_brand === 'AUDI'" value="A7">A7</option>
                    <option v-if="ctg_brand === 'AUDI'" value="R8">R8</option>
                    <option v-if="ctg_brand === 'AUDI'" value="Q3">Q3</option>
                    <option v-if="ctg_brand === 'AUDI'" value="Q5">Q5</option>
                    <option v-if="ctg_brand === 'AUDI'" value="Q7">Q7</option>
                    <option v-if="ctg_brand === 'AUDI'" value="Q8">Q8</option>
                    <option v-if="ctg_brand === 'AUDI'" value="TT">TT</option>
                    <option v-if="ctg_brand === 'AUDI'" value="TTS">TTS</option>
                    <!-- MERCEDES BENZ -->
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="A-CLASS">A-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="C-CLASS">C-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="E-CLASS">E-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="S-CLASS">S-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="CLA-CLASS">CLA-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="GLC-CLASS">GLC-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="GLE-CLASS">GLE-CLASS</option>
                    <option v-if="ctg_brand === 'MERCEDES-BENZ'" value="SKL-CLASS">SKL-CLASS</option>
                    <!-- BMW -->
                    <option v-if="ctg_brand === 'BMW'" value='X1'>X1</option>
                    <option v-if="ctg_brand === 'BMW'" value='X3'>X3</option>
                    <option v-if="ctg_brand === 'BMW'" value='X5'>X5</option>  
                    <option v-if="ctg_brand === 'BMW'" value='X6'>X6</option>
                    <option v-if="ctg_brand === 'BMW'" value='Series 3'>Series 3</option>
                    <option v-if="ctg_brand === 'BMW'" value='Series 5'>Series 5</option>
                    <option v-if="ctg_brand === 'BMW'" value='Series 7'>Series 7</option>
                    <option v-if="ctg_brand === 'BMW'" value='i8'>i8</option>
                    <!-- FORD -->
                    <option v-if="ctg_brand === 'FORD'" value='RANGER'>RANGER</option>
                    <option v-if="ctg_brand === 'FORD'" value='EVEREST'>EVEREST</option>
                    <option v-if="ctg_brand === 'FORD'" value='MUSTANG'>MUSTANG</option>
                    <!-- HONDA -->
                    <option v-if="ctg_brand === 'HONDA'" value='BRIO'>BRIO</option>
                    <option v-if="ctg_brand === 'HONDA'" value='JAZZ'>JAZZ</option>
                    <option v-if="ctg_brand === 'HONDA'" value='CITY'>CITY</option>
                    <option v-if="ctg_brand === 'HONDA'" value='CIVIC'>CIVIC</option>
                    <option v-if="ctg_brand === 'HONDA'" value='ACCORD'>ACCORD</option>
                    <option v-if="ctg_brand === 'HONDA'" value='BR-V'>BR-V</option>
                    <option v-if="ctg_brand === 'HONDA'" value='HR-V'>HR-V</option>
                    <option v-if="ctg_brand === 'HONDA'" value='CR-V'>CR-V</option>
                    <!-- HYUNDAI -->
                    <option v-if="ctg_brand === 'HYUNDAI'" value='H1'>H1</option>
                    <!-- ISUZU -->
                    <option v-if="ctg_brand === 'ISUZU'" value='D-MAX'>D-MAX</option>
                    <option v-if="ctg_brand === 'ISUZU'" value='MU-X'>MU-X</option>
                    <!-- MAZDA -->
                    <option v-if="ctg_brand === 'MAZDA'" value='MAZDA 2'>MAZDA 2</option>
                    <option v-if="ctg_brand === 'MAZDA'" value='MAZDA 3'>MAZDA 3</option>
                    <option v-if="ctg_brand === 'MAZDA'" value='CX-3'>CX-3</option>
                    <option v-if="ctg_brand === 'MAZDA'" value='CX-5'>CX-5</option>                       
                    <!-- MG -->
                    <option v-if="ctg_brand === 'MG'" value='MG5'>MG5</option>
                    <option v-if="ctg_brand === 'MG'" value='HS'>HS</option>
                    <option v-if="ctg_brand === 'MG'" value='ZS'>ZS</option>
                    <!-- MINI -->
                    <option v-if="ctg_brand === 'MINI'" value="COOPER">COOPER</option>
                    <option v-if="ctg_brand === 'MINI'" value="CLUBMAN">CLUBMAN</option>
                    <!-- MITSUBISHI -->
                    <option v-if="ctg_brand === 'MITSUBISHI'" value="ATTRAGE">ATTRAGE</option>
                    <option v-if="ctg_brand === 'MITSUBISHI'" value="MIRAGE">MIRAGE</option>
                    <option v-if="ctg_brand === 'MITSUBISHI'" value="PAJERO">PAJERO</option>
                    <option v-if="ctg_brand === 'MITSUBISHI'" value="PAJERO SPORT">PAJERO SPORT</option>
                    <option v-if="ctg_brand === 'MITSUBISHI'" value="TRITON">TRITON</option>
                    <!-- NISSAN -->
                    <option v-if="ctg_brand === 'NISSAN'" value="ALMERA">ALMERA</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="MARCH">MARCH</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="NOTE">NOTE</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="NAVARA">NAVARA</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="SYLPHY">SYLPHY</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="TEANA">TEANA</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="VERSA">VERSA</option>
                    <option v-if="ctg_brand === 'NISSAN'" value="X-TRAIL">X-TRAIL</option>
                    <!-- SUBARU -->
                    <option v-if="ctg_brand === 'SUBARU'" value="XV">XV</option>
                    <!-- SUZUKI -->
                    <option v-if="ctg_brand === 'SUZUKI'" value="CIAZ">CIAZ</option>
                    <option v-if="ctg_brand === 'SUZUKI'" value="SWIFT">SWIFT</option>
                    <!-- TOYOTA -->
                    <option v-if="ctg_brand === 'TOYOTA'" value="ALTIS">ALTIS</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="VIOS">VIOS</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="YARIS">YARIS</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="CAMRY">CAMRY</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="CH-R">CH-R</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="COROLLA CROSS">COROLLA CROSS</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="FORTUNER">FORTUNER</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="LAND CRUISER">LAND CRUISER</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="INNOVA">INNOVA</option>
                    <option v-if="ctg_brand === 'TOYOTA'" value="REVO">REVO</option>
                    <!-- VOLKSWAGEN -->
                    <option v-if="ctg_brand === 'VOLKSWAGEN'" value="ATLAS">ATLAS</option>
                    <option v-if="ctg_brand === 'VOLKSWAGEN'" value="BEETLE">BEETLE</option>
                    <option v-if="ctg_brand === 'VOLKSWAGEN'" value="TIGUAN">TIGUAN</option>
                    <option v-if="ctg_brand === 'VOLKSWAGEN'" value="JETTA">JETTA</option>
                    <option v-if="ctg_brand === 'VOLKSWAGEN'" value="GOLF R">GOLF R</option>
                    <option v-if="ctg_brand === 'VOLKSWAGEN'" value="GOLF GTI">GOLF GTI</option>
                    <!-- VOLVO -->
                    <option v-if="ctg_brand === 'VOLVO'" value="XC40">XC40</option>
                    <option v-if="ctg_brand === 'VOLVO'" value="XC60">XC60</option>
                </select>
            </div>
            <div>
                <button @click="search()"
                class="flex bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                Search
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="10" cy="10" r="7"></circle>
                    <line x1="21" y1="21" x2="15" y2="15"></line>
                </svg>
            </button>
            </div>
        </div>
    </div>
        <div class="grid grid-cols-2 my-4">
            <button @click="sortedMostPrice">
                Most Price
            </button>
            <button @click="sortedMostView">
                Most View
            </button>
        </div>
        <div class="bg-white border-2 rounded-lg">
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl">
            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div v-for="car in sorteds" v-bind:key="car.id">
                    <div v-if="car.status === 'available'">
                        <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-auto"
                            style="height: 150px; width: 250px;">
                            <p v-if="car.image.length > 0"><img v-bind:src="'http://localhost/car_images/' + car.image" 
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full" v-on:click="goToDetailView(car)"></p>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-m text-gray-700">{{ car.car_code }}</h3>
                                <p class="mt-1 text-sm text-gray-500">Brand: {{ car.brand }}</p>
                                <p class="text-sm font-medium text-gray-500">Price: {{ car.price }}</p>
                                <p class="text-sm font-medium text-gray-500">View: {{ car.view_count }}</p>
                                <p class="mb-6 text-sm font-medium text-gray-500">Like: {{ car.like_count }}</p>
                            </div>    
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
            title: "Car List",
            cars: null,
            sorteds: null,
            error: null,
            ctg_type: null,
            ctg_brand: null,
            ctg_model: null,
        }
    },
    methods: {
        async goToDetailView(car) {
            const url = `http://localhost/api/cars/${car.id}`
            car.view_count += 1;
            try {
                const reponse = await axios.put(url, car);
                if (reponse.status == 200) {
                    this.$router.push(`/cars/${car.id}`);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
        },
    },
    computed: {
        sortedMostPrice: function() {
            function compare(a, b) {
                if (a.price < b.price)
                    return 1;
                if (a.price > b.price)
                    return -1;
                return 0;
            }
            return this.sorteds.sort(compare);
        },
        sortedMostView: function() {
            function compare(a, b) {
                if (a.view_count < b.view_count)
                    return 1;
                if (a.view_count > b.view_count)
                    return -1;
                return 0;
            }
            return this.sorteds.sort(compare);
        },
        sortedMostLike: function() {
            function compare(a, b) {
                if (a.like_count < b.like_count)
                    return 1;
                if (a.like_count > b.like_count)
                    return -1;
                return 0;
            }
            return this.sorteds.sort(compare);
        },
        search() {
            this.sorteds = this.cars.filter(car => {
                return car.type.includes(this.ctg_type) &&
                    car.brand.includes(this.ctg_brand) &&
                    car.model.includes(this.ctg_model)
            })
        }
    },
    async mounted() {
        console.log("mounted");
        this.error = null;
        const url = "http://localhost/api/cars";
        try {
            const reponse = await axios.get(url);
            if (reponse.status === 200) {
                this.cars = reponse.data.data;
                this.sorteds = this.cars;
                console.log(reponse.data.data);
            } else {
                console.error(reponse.status);
            }
        } catch (error) {
            this.error = error.message;
            console.error(error.message);
        }
    },
}
</script>