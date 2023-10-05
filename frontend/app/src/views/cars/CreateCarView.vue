<template>
    <div class="grid grid-cols-2 m-8 min-h-full py-12 px-4 sm:px-6 lg:px-8 md:mt-10 overflow-hidden">
        <!-- <h1 class="text-3xl text-center">Create New Car</h1> -->
        
        <div>
            <div class="grid grid-cols-1 p-1 mb-3"></div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center">Create New Car<hr></h1>
            <div class="mb-3 mt-3">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type</label>
                <select name="" id="type" v-model="car.type" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
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

            <div class="mb-3 mt-3">
                <label for="car_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Brand</label>
                <select name="" id="brand" v-model="car.brand" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
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

            <div class="mb-3 mt-3">
                <label for="years" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Years</label>
                <input type="text" id="years" v-model="car.years"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Model</label>
                <select name="" id="model" v-model="car.model" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <!-- AUDI -->
                    <option v-if="car.brand === 'AUDI'" value="A3">A3</option>
                    <option v-if="car.brand === 'AUDI'" value="A4">A4</option>
                    <option v-if="car.brand === 'AUDI'" value="A5">A5</option>
                    <option v-if="car.brand === 'AUDI'" value="A6">A6</option>
                    <option v-if="car.brand === 'AUDI'" value="A7">A7</option>
                    <option v-if="car.brand === 'AUDI'" value="R8">R8</option>
                    <option v-if="car.brand === 'AUDI'" value="Q3">Q3</option>
                    <option v-if="car.brand === 'AUDI'" value="Q5">Q5</option>
                    <option v-if="car.brand === 'AUDI'" value="Q7">Q7</option>
                    <option v-if="car.brand === 'AUDI'" value="Q8">Q8</option>
                    <option v-if="car.brand === 'AUDI'" value="TT">TT</option>
                    <option v-if="car.brand === 'AUDI'" value="TTS">TTS</option>
                    <!-- MERCEDES BENZ -->
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="A-CLASS">A-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="C-CLASS">C-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="E-CLASS">E-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="S-CLASS">S-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="CLA-CLASS">CLA-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="GLC-CLASS">GLC-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="GLE-CLASS">GLE-CLASS</option>
                    <option v-if="car.brand === 'MERCEDES-BENZ'" value="SKL-CLASS">SKL-CLASS</option>
                    <!-- BMW -->
                    <option v-if="car.brand === 'BMW'" value='X1'>X1</option>
                    <option v-if="car.brand === 'BMW'" value='X3'>X3</option>
                    <option v-if="car.brand === 'BMW'" value='X5'>X5</option>  
                    <option v-if="car.brand === 'BMW'" value='X6'>X6</option>
                    <option v-if="car.brand === 'BMW'" value='Series 3'>Series 3</option>
                    <option v-if="car.brand === 'BMW'" value='Series 5'>Series 5</option>
                    <option v-if="car.brand === 'BMW'" value='Series 7'>Series 7</option>
                    <option v-if="car.brand === 'BMW'" value='i8'>i8</option>
                    <!-- FORD -->
                    <option v-if="car.brand === 'FORD'" value='RANGER'>RANGER</option>
                    <option v-if="car.brand === 'FORD'" value='EVEREST'>EVEREST</option>
                    <option v-if="car.brand === 'FORD'" value='MUSTANG'>MUSTANG</option>
                    <!-- HONDA -->
                    <option v-if="car.brand === 'HONDA'" value='BRIO'>BRIO</option>
                    <option v-if="car.brand === 'HONDA'" value='JAZZ'>JAZZ</option>
                    <option v-if="car.brand === 'HONDA'" value='CITY'>CITY</option>
                    <option v-if="car.brand === 'HONDA'" value='CIVIC'>CIVIC</option>
                    <option v-if="car.brand === 'HONDA'" value='ACCORD'>ACCORD</option>
                    <option v-if="car.brand === 'HONDA'" value='BR-V'>BR-V</option>
                    <option v-if="car.brand === 'HONDA'" value='HR-V'>HR-V</option>
                    <option v-if="car.brand === 'HONDA'" value='CR-V'>CR-V</option>
                    <!-- HYUNDAI -->
                    <option v-if="car.brand === 'HYUNDAI'" value='H1'>H1</option>
                    <!-- ISUZU -->
                    <option v-if="car.brand === 'ISUZU'" value='D-MAX'>D-MAX</option>
                    <option v-if="car.brand === 'ISUZU'" value='MU-X'>MU-X</option>
                    <!-- MAZDA -->
                    <option v-if="car.brand === 'MAZDA'" value='MAZDA 2'>MAZDA 2</option>
                    <option v-if="car.brand === 'MAZDA'" value='MAZDA 3'>MAZDA 3</option>
                    <option v-if="car.brand === 'MAZDA'" value='CX-3'>CX-3</option>
                    <option v-if="car.brand === 'MAZDA'" value='CX-5'>CX-5</option>                       
                    <!-- MG -->
                    <option v-if="car.brand === 'MG'" value='MG5'>MG5</option>
                    <option v-if="car.brand === 'MG'" value='HS'>HS</option>
                    <option v-if="car.brand === 'MG'" value='ZS'>ZS</option>
                    <!-- MINI -->
                    <option v-if="car.brand === 'MINI'" value="COOPER">COOPER</option>
                    <option v-if="car.brand === 'MINI'" value="CLUBMAN">CLUBMAN</option>
                    <!-- MITSUBISHI -->
                    <option v-if="car.brand === 'MITSUBISHI'" value="ATTRAGE">ATTRAGE</option>
                    <option v-if="car.brand === 'MITSUBISHI'" value="MIRAGE">MIRAGE</option>
                    <option v-if="car.brand === 'MITSUBISHI'" value="PAJERO">PAJERO</option>
                    <option v-if="car.brand === 'MITSUBISHI'" value="PAJERO SPORT">PAJERO SPORT</option>
                    <option v-if="car.brand === 'MITSUBISHI'" value="TRITON">TRITON</option>
                    <!-- NISSAN -->
                    <option v-if="car.brand === 'NISSAN'" value="ALMERA">ALMERA</option>
                    <option v-if="car.brand === 'NISSAN'" value="MARCH">MARCH</option>
                    <option v-if="car.brand === 'NISSAN'" value="NOTE">NOTE</option>
                    <option v-if="car.brand === 'NISSAN'" value="NAVARA">NAVARA</option>
                    <option v-if="car.brand === 'NISSAN'" value="SYLPHY">SYLPHY</option>
                    <option v-if="car.brand === 'NISSAN'" value="TEANA">TEANA</option>
                    <option v-if="car.brand === 'NISSAN'" value="VERSA">VERSA</option>
                    <option v-if="car.brand === 'NISSAN'" value="X-TRAIL">X-TRAIL</option>
                    <!-- SUBARU -->
                    <option v-if="car.brand === 'SUBARU'" value="XV">XV</option>
                    <!-- SUZUKI -->
                    <option v-if="car.brand === 'SUZUKI'" value="CIAZ">CIAZ</option>
                    <option v-if="car.brand === 'SUZUKI'" value="SWIFT">SWIFT</option>
                    <!-- TOYOTA -->
                    <option v-if="car.brand === 'TOYOTA'" value="ALTIS">ALTIS</option>
                    <option v-if="car.brand === 'TOYOTA'" value="VIOS">VIOS</option>
                    <option v-if="car.brand === 'TOYOTA'" value="YARIS">YARIS</option>
                    <option v-if="car.brand === 'TOYOTA'" value="CAMRY">CAMRY</option>
                    <option v-if="car.brand === 'TOYOTA'" value="CH-R">CH-R</option>
                    <option v-if="car.brand === 'TOYOTA'" value="COROLLA CROSS">COROLLA CROSS</option>
                    <option v-if="car.brand === 'TOYOTA'" value="FORTUNER">FORTUNER</option>
                    <option v-if="car.brand === 'TOYOTA'" value="LAND CRUISER">LAND CRUISER</option>
                    <option v-if="car.brand === 'TOYOTA'" value="INNOVA">INNOVA</option>
                    <option v-if="car.brand === 'TOYOTA'" value="REVO">REVO</option>
                    <!-- VOLKSWAGEN -->
                    <option v-if="car.brand === 'VOLKSWAGEN'" value="ATLAS">ATLAS</option>
                    <option v-if="car.brand === 'VOLKSWAGEN'" value="BEETLE">BEETLE</option>
                    <option v-if="car.brand === 'VOLKSWAGEN'" value="TIGUAN">TIGUAN</option>
                    <option v-if="car.brand === 'VOLKSWAGEN'" value="JETTA">JETTA</option>
                    <option v-if="car.brand === 'VOLKSWAGEN'" value="GOLF R">GOLF R</option>
                    <option v-if="car.brand === 'VOLKSWAGEN'" value="GOLF GTI">GOLF GTI</option>
                    <!-- VOLVO -->
                    <option v-if="car.brand === 'VOLVO'" value="XC40">XC40</option>
                    <option v-if="car.brand === 'VOLVO'" value="XC60">XC60</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Color</label>
                <input type="text" id="color" v-model="car.color" 
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div class="mb-3 mt-3">
                <label for="total_displacement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Engine</label>
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
                <select name="" id="fuel_type" v-model="car.fuel_type" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='Diesel'>Diesel</option>
                    <option value='Gasoline'>Gasoline</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="drive_system" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drive System</label>
                <select name="" id="drive_system" v-model="car.drive_system" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='ALL-WHEEL DRIVE (AWD)'>ALL-WHEEL DRIVE (AWD)</option>
                    <option value='FOUR-WHEEL DRIVE (4WD)'>FOUR-WHEEL DRIVE (4WD)</option>
                    <option value='FRONT-WHEEL DRIVE (FWD)'>FRONT-WHEEL DRIVE (FWD)</option>
                    <option value='REAR-WHEEL DRIVE (RWD)'>REAR-WHEEL DRIVE (RWD)</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transmission</label>
                <select name="" id="transmission" v-model="car.transmission" required 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='Automatic'>Automatic</option>
                    <option value='Manual'>Manual</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input type="number" id="price" v-model="car.price"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <input type="file" @change="previewImage">

            <button @click="createNewCar()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create
            </button>
        </div>
    
        <div class="mx-auto max-w-sm py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 border-2 border-gray-300 rounded-lg ">
            <div class="mt-4">
                <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                <h3 class="text-gray-700"><span class="text-gray-600"></span>{{ car.car_code }}</h3>
                <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-auto">
                    <p>
                        <img v-bind:src="preview" 
                        class="h-full w-full object-center lg:h-full lg:w-full"
                        style="height: 150px; width: 200px;">
                    </p>
                </div>
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
        </div>

        <!-- <div class="m-8">
            (preview)
            <div class="grid grid-cols-2 p-4 mb-4 border-2 border-blue-800 rounded-lg">
                <h3 class="text-xl">{{ preview_code }}</h3>
                <p>Brand <B>{{ car.brand }}</B></p>
                <p>Price <I>{{ car.price }}</I></p>
                <span>
                    <b>Details</b>
                </span>
                <button class="px-2 py-1 border rounded-xl">Buy</button>
            </div>
        </div> -->
    </div>

</template>

<script>
import axios from 'axios'
import { useCarStore } from '@/stores/car.js';

export default {
    setup() {
        const car_store = useCarStore()
        return { car_store }
    },
    
    data() {
        return {
            car: {
                brand: "",
                years: "",
                model: "",
                color: "",
                total_displacement: "",
                mileage: "",
                fuel_type: "",
                drive_system: "",
                transmission: "",
                status: "available",
                type: "",
                price: 0,
            },
            preview_code: "Car Code",
            preview: null,
            image: null,
            error: null
        }
    },
    methods: {
        async createNewCar() {
            const url = "http://localhost/api/cars";
            this.error = null;
            const fd = new FormData();
            fd.append('image', this.image);
            fd.append('brand', this.car.brand);
            fd.append('years', this.car.years);
            fd.append('model', this.car.model);
            fd.append('color', this.car.color);
            fd.append('total_displacement', this.car.total_displacement);
            fd.append('mileage', this.car.mileage);
            fd.append('fuel_type', this.car.fuel_type);
            fd.append('drive_system', this.car.drive_system);
            fd.append('transmission', this.car.transmission);
            fd.append('status', this.car.status);
            fd.append('type', this.car.type);
            fd.append('price', this.car.price);
            

            try {
                const response = await axios.post(url, fd);
                if (response.status === 201) {
                    let car_id = response.data.car_id;
                    this.$router.push({
                        name: 'car.details',
                        params: { id: car_id }
                    });
                }
            } catch (error) {
                this.error = error.message;
                console.log(error);
            }
        },
        previewImage(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                this.preview = e.target.result;
                }
                this.image=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
            this.image = event.target.files[0];
        }
        // onUpload() {
        //     const fd = new FormData();
        //     fd.append('image', this.car.image, this.car.image.name);
        // }
    }
}
</script>