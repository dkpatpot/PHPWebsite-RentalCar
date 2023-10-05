<template>
    <div class="m-8 min-h-full py-12 px-4 sm:px-6 lg:px-8 grid md:mt-10 overflow-hidden">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 text-center mb-5">{{ title }}<hr></h1>
        <form>
            <div class="grid gap-4 mb-4 md:grid-cols-2">
                <div>
                    <label for="cus_firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Firstname</label>
                    <input type="text" id="cus_firstname" placeholder="" v-model="car_offer.cus_firstname" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="cus_lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lastname</label>
                    <input type="text" id="cus_lastname" placeholder="" v-model="car_offer.cus_lastname" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="cus_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address</label>
                    <input type="text" id="cus_email" placeholder="" v-model="car_offer.cus_email" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>  
                <div>
                    <label for="cus_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone Number</label>
                    <input type="text" id="cus_phone" placeholder="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" v-model="car_offer.cus_phone" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <hr class="mb-3">
            <div class="grid gap-4 mb-4 md:grid-cols-3">
                <div class="mb-3">
                    <label for="car_brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Brand</label>
                    <select name="" id="car_brand" v-model="car_offer.car_brand" required 
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
                <div class="mb-3">
                    <label for="car_model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Model</label>
                    <select name="" id="car_model" v-model="car_offer.car_model" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <!-- AUDI -->
                        <option v-if="car_offer.car_brand === 'AUDI'" value="A3">A3</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="A4">A4</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="A5">A5</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="A6">A6</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="A7">A7</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="R8">R8</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="Q3">Q3</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="Q5">Q5</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="Q7">Q7</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="Q8">Q8</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="TT">TT</option>
                        <option v-if="car_offer.car_brand === 'AUDI'" value="TTS">TTS</option>
                        <!-- MERCEDES BENZ -->
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="A-CLASS">A-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="C-CLASS">C-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="E-CLASS">E-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="S-CLASS">S-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="CLA-CLASS">CLA-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="GLC-CLASS">GLC-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="GLE-CLASS">GLE-CLASS</option>
                        <option v-if="car_offer.car_brand === 'MERCEDES-BENZ'" value="SKL-CLASS">SKL-CLASS</option>
                        <!-- BMW -->
                        <option v-if="car_offer.car_brand === 'BMW'" value='X1'>X1</option>
                        <option v-if="car_offer.car_brand === 'BMW'" value='X3'>X3</option>
                        <option v-if="car_offer.car_brand === 'BMW'" value='X5'>X5</option>  
                        <option v-if="car_offer.car_brand === 'BMW'" value='X6'>X6</option>
                        <option v-if="car_offer.car_brand === 'BMW'" value='Series 3'>Series 3</option>
                        <option v-if="car_offer.car_brand === 'BMW'" value='Series 5'>Series 5</option>
                        <option v-if="car_offer.car_brand === 'BMW'" value='Series 7'>Series 7</option>
                        <option v-if="car_offer.car_brand === 'BMW'" value='i8'>i8</option>
                        <!-- FORD -->
                        <option v-if="car_offer.car_brand === 'FORD'" value='RANGER'>RANGER</option>
                        <option v-if="car_offer.car_brand === 'FORD'" value='EVEREST'>EVEREST</option>
                        <option v-if="car_offer.car_brand === 'FORD'" value='MUSTANG'>MUSTANG</option>
                        <!-- HONDA -->
                        <option v-if="car_offer.car_brand === 'HONDA'" value='BRIO'>BRIO</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='JAZZ'>JAZZ</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='CITY'>CITY</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='CIVIC'>CIVIC</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='ACCORD'>ACCORD</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='BR-V'>BR-V</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='HR-V'>HR-V</option>
                        <option v-if="car_offer.car_brand === 'HONDA'" value='CR-V'>CR-V</option>
                        <!-- HYUNDAI -->
                        <option v-if="car_offer.car_brand === 'HYUNDAI'" value='H1'>H1</option>
                        <!-- ISUZU -->
                        <option v-if="car_offer.car_brand === 'ISUZU'" value='D-MAX'>D-MAX</option>
                        <option v-if="car_offer.car_brand === 'ISUZU'" value='MU-X'>MU-X</option>
                        <!-- MAZDA -->
                        <option v-if="car_offer.car_brand === 'MAZDA'" value='MAZDA 2'>MAZDA 2</option>
                        <option v-if="car_offer.car_brand === 'MAZDA'" value='MAZDA 3'>MAZDA 3</option>
                        <option v-if="car_offer.car_brand === 'MAZDA'" value='CX-3'>CX-3</option>
                        <option v-if="car_offer.car_brand === 'MAZDA'" value='CX-5'>CX-5</option>
                        <!-- MG -->
                        <option v-if="car_offer.car_brand === 'MG'" value='MG5'>MG5</option>
                        <option v-if="car_offer.car_brand === 'MG'" value='HS'>HS</option>
                        <option v-if="car_offer.car_brand === 'MG'" value='ZS'>ZS</option>
                        <!-- MINI -->
                        <option v-if="car_offer.car_brand === 'MINI'" value="COOPER">COOPER</option>
                        <option v-if="car_offer.car_brand === 'MINI'" value="CLUBMAN">CLUBMAN</option>
                        <!-- MITSUBISHI -->
                        <option v-if="car_offer.car_brand === 'MITSUBISHI'" value="ATTRAGE">ATTRAGE</option>
                        <option v-if="car_offer.car_brand === 'MITSUBISHI'" value="MIRAGE">MIRAGE</option>
                        <option v-if="car_offer.car_brand === 'MITSUBISHI'" value="PAJERO">PAJERO</option>
                        <option v-if="car_offer.car_brand === 'MITSUBISHI'" value="PAJERO SPORT">PAJERO SPORT</option>
                        <option v-if="car_offer.car_brand === 'MITSUBISHI'" value="TRITON">TRITON</option>
                        <!-- NISSAN -->
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="ALMERA">ALMERA</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="MARCH">MARCH</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="NOTE">NOTE</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="NAVARA">NAVARA</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="SYLPHY">SYLPHY</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="TEANA">TEANA</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="VERSA">VERSA</option>
                        <option v-if="car_offer.car_brand === 'NISSAN'" value="X-TRAIL">X-TRAIL</option>
                        <!-- SUBARU -->
                        <option v-if="car_offer.car_brand === 'SUBARU'" value="XV">XV</option>
                        <!-- SUZUKI -->
                        <option v-if="car_offer.car_brand === 'SUZUKI'" value="CIAZ">CIAZ</option>
                        <option v-if="car_offer.car_brand === 'SUZUKI'" value="SWIFT">SWIFT</option>
                        <!-- TOYOTA -->
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="ALTIS">ALTIS</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="VIOS">VIOS</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="YARIS">YARIS</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="CAMRY">CAMRY</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="CH-R">CH-R</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="COROLLA CROSS">COROLLA CROSS</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="FORTUNER">FORTUNER</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="LAND CRUISER">LAND CRUISER</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="INNOVA">INNOVA</option>
                        <option v-if="car_offer.car_brand === 'TOYOTA'" value="REVO">REVO</option>
                        <!-- VOLKSWAGEN -->
                        <option v-if="car_offer.car_brand === 'VOLKSWAGEN'" value="ATLAS">ATLAS</option>
                        <option v-if="car_offer.car_brand === 'VOLKSWAGEN'" value="BEETLE">BEETLE</option>
                        <option v-if="car_offer.car_brand === 'VOLKSWAGEN'" value="TIGUAN">TIGUAN</option>
                        <option v-if="car_offer.car_brand === 'VOLKSWAGEN'" value="JETTA">JETTA</option>
                        <option v-if="car_offer.car_brand === 'VOLKSWAGEN'" value="GOLF R">GOLF R</option>
                        <option v-if="car_offer.car_brand === 'VOLKSWAGEN'" value="GOLF GTI">GOLF GTI</option>
                        <!-- VOLVO -->
                        <option v-if="car_offer.car_brand === 'VOLVO'" value="XC40">XC40</option>
                        <option v-if="car_offer.car_brand === 'VOLVO'" value="XC60">XC60</option>
                    </select>
                </div> 
                <div class="mb-3">
                    <label for="car_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Year</label>
                    <input type="text" id="car_year"  placeholder="" v-model="car_offer.car_year" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-3">
                    <label for="car_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Color</label>
                    <input type="text" id="car_color"  placeholder="" v-model="car_offer.car_color" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-3">
                    <label for="car_mileage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mileage</label>
                    <input type="text" id="car_mileage"  placeholder="" v-model="car_offer.car_mileage" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
                <button @click="createNewCarOffer()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center first-letter: 
                    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Send
                </button>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            title: "Send Car Offer",
            car_offer: {
                cus_firstname: '',
                cus_lastname: '',
                cus_email: '',
                cus_phone: '',
                car_brand: '',
                car_model: '',
                car_year: '',
                car_color: '',
                car_mileage: '',
            },
            error: null
        }
    },
    methods: {
        async createNewCarOffer() {
            const url = "http://localhost/api/car_offers";
            this.error = null;

            try {
                const response = await axios.post(url, this.car_offer);
                console.table(this.car_offer);
                if (response.status === 201) {
                    this.car_offer.cus_firstname = '';
                    this.car_offer.cus_lastname = '';
                    this.car_offer.cus_email = '';
                    this.car_offer.cus_phone = '';
                    this.car_offer.car_brand = '';
                    this.car_offer.car_model = '';
                    this.car_offer.car_year = '';
                    this.car_offer.car_color = '';
                    this.car_offer.car_mileage = '';
                    alert("ส่งข้อเสนอเรียบร้อยแล้ว");
                }
            } catch (error) {
                this.error = error.message;
                console.log(error);
            }
        }
    }
}
</script>

<style>
.title1 {
    width: 900px;
    margin-left:auto;
    margin-right:auto;
    color: #000;
}

</style>