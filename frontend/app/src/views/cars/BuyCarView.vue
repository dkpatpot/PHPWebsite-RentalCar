<template>
    <section class="mx-auto mt-20 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
        <div class="mt-20 line">
            <h3 class="text-2xl font-bold tracking-tight text-gray-900">{{ promotion_code }}</h3>
            <div>
                <div>
                    <label for="down_payment">Down Payment</label>
                    <input type="number" id="down_payment" v-model="car.down_payment" 
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div>
                    <label for="interest">Interest</label>
                    <input type="number" id="interest" v-model="car.interest" 
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div>
                    <label for="pay_period">Pay Period</label>
                    <input type="number" id="pay_period" v-model="car.pay_period"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div>
                    <label for="promotion_code">Promotion Code</label>
                    <input type="text" id="promotion_code" v-model="promotion_code"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <button @click="checkCode" class="text-blue-500">
                    check code
                </button>
            </div>
        </div>
        <div class="mt-20">
            <h3 class="text-2xl font-bold tracking-tight text-gray-900">Payment Summary</h3>
            <ul role="list" class="list-disc space-y-2 pl-4 text-sm mt-8"></ul>
            <li class="text-gray-400"><span class="text-gray-600">Price : {{ car.price }}</span></li>
            <li class="text-gray-400"><span class="text-gray-600">Down Payment : {{ car.down_payment }}</span></li>
            <li class="text-gray-400"><span class="text-gray-600">VAT 7 % : {{ price_with_vat }}</span></li>
            <div v-if="promotion != null">
                <div v-if="promotion.discount_type === 'amount'">
                    <li class="text-gray-400"><span class="text-gray-600">Discount = {{ promotion.amount }}</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Installment ={{ ((this.price_with_vat - this.car.down_payment - this.promotion.amount) + (((this.price_with_vat - this.car.down_payment - this.promotion.amount) * this.car.interest)/100)).toFixed(2) }}</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Monthly installment = {{ (((this.price_with_vat - this.car.down_payment - this.promotion.amount) + (((this.price_with_vat - this.car.down_payment - this.promotion.amount) * this.car.interest)/100)) / this.car.pay_period).toFixed(2) }}</span></li>
                </div>
                <div v-if="promotion.discount_type === 'percent'">
                    <li class="text-gray-400"><span class="text-gray-600">Discount = {{ promotion.percent }}</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Installment ={{ ((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) + (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) * this.car.interest)/100)).toFixed(2) }}</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Monthly installment = {{ (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) + (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) * this.car.interest)/100)) / this.car.pay_period).toFixed(2) }}</span></li>
                </div>
            </div>
            <div v-else>
                <li class="text-gray-400"><span class="text-gray-600">Installment = {{ ((this.price_with_vat - this.car.down_payment) + (((this.price_with_vat - this.car.down_payment) * this.car.interest)/100)).toFixed(2) }}</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Monthly installment = {{ (((this.price_with_vat - this.car.down_payment) + (((this.price_with_vat - this.car.down_payment) * this.car.interest)/100)) / this.car.pay_period).toFixed(2) }}</span></li>
            </div>
            <div>
                <button @click="onClickConfirm"
                class="text-white mt-7 flex w-20 items-center justify-center rounded-md border border-transparent bg-green-500">
                confirm</button>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import { useAuthStore } from '@/stores/auth.js'
    
    export default {
        setup() {
            const auth_store = useAuthStore()
            return { auth_store }
        },
        data() {
            return {
                car: {
                    down_payment: 0,
                    interest: 0,
                    pay_period: 0,
                },
                promotions: null,
                promotion: null,
                code_id: null,
                code: null,
                auth: null,
                error: null,
                price_with_vat: 0,
                promotion_code: "",
                // price_per_month: (((this.price_with_vat - this.car.down_payment) + (((this.price_with_vat - this.car.down_payment) * this.car.interest)/100)) / this.car.pay_period).toFixed(2),
                // total_price: ((this.price_with_vat - this.car.down_payment) + (((this.price_with_vat - this.car.down_payment) * this.car.interest)/100)).toFixed(2),
                // price_per_month_percent: (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) + (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) * this.car.interest)/100)) / this.car.pay_period).toFixed(2),
                // total_price_percent: ((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) + (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) * this.car.interest)/100)).toFixed(2),
                // price_per_month_amount: (((this.price_with_vat - this.car.down_payment - this.promotion.amount) + (((this.price_with_vat - this.car.down_payment - this.promotion.amount) * this.car.interest)/100)) / this.car.pay_period).toFixed(2),
                // total_price_amount: ((this.price_with_vat - this.car.down_payment - this.promotion.amount) + (((this.price_with_vat - this.car.down_payment - this.promotion.amount) * this.car.interest)/100)).toFixed(2),

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
        mounted() {
            if (this.auth_store.isAuthen) {
                this.auth = this.auth_store.getAuth
            } else {
                this.auth = null
                this.$router.push("/login");
            }
        },
        async created() {
            const id = this.$route.params.id;
            const url = `http://localhost/api/cars/${id}`;
            const url2 = `http://localhost/api/promotions`;

            try {
                const reponse = await axios.get(url);
                if (reponse.status == 200) {
                    this.car = reponse.data.data;
                    console.log(this.car);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }

            try {
                const reponse = await axios.get(url2);
                if (reponse.status == 200) {
                    this.promotions = reponse.data.data;
                    console.table(this.promotions);
                }
            } catch (error) {
                console.log(error);
                this.error = error.message;
            }
            this.price_with_vat = (this.car.price * 1.07).toFixed(2);
        }, 
        methods: {
            async onClickConfirm() {
                const url = `http://localhost/api/cars/${this.car.id}`;
                this.error = null;
                this.car.status = "sold";
                this.car.buy_by = this.auth.email;
                this.car.price_with_vat = this.price_with_vat;

                if (this.promotion != null) {
                    this.car.p_code = this.code.code;
                    this.car.p_name = this.code.name;
                    if (this.promotion.discount_type === 'amount') {
                        this.car.p_discount = this.promotion.amount;
                        this.car.monthly_payment = (((this.price_with_vat - this.car.down_payment - this.promotion.amount) + (((this.price_with_vat - this.car.down_payment - this.promotion.amount) * this.car.interest)/100)) / this.car.pay_period).toFixed(2);
                        this.car.total_price = ((this.price_with_vat - this.car.down_payment - this.promotion.amount) + (((this.price_with_vat - this.car.down_payment - this.promotion.amount) * this.car.interest)/100)).toFixed(2);
                    }

                    if (this.promotion.discount_type === 'percent') {
                        this.car.p_discount = this.price_with_vat * this.promotion.percent/100;
                        this.car.monthly_payment = (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) + (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) * this.car.interest)/100)) / this.car.pay_period).toFixed(2);
                        this.car.total_price = ((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) + (((this.price_with_vat - this.car.down_payment - (this.price_with_vat * this.promotion.percent/100)) * this.car.interest)/100)).toFixed(2);
                    }

                    try {
                        console.table(this.car);
                        const response = await axios.put(url, this.car);
                        if (response.status == 200) {
                            console.log(response.data);
                        }
                    } catch (error) {
                        this.error = error.message;
                        console.log(error);
                    }

                    const url_update_promotion = `http://localhost/api/promotion_codes/${this.code_id}`;
                    this.code.redeemed_at = new Date();
                    try {
                        console.table(this.code);
                        const response = await axios.put(url_update_promotion, this.code);
                        if (response.status === 200) {
                            alert("ยืนยันการซื้อรถสำเร็จ");
                            this.$router.push('/')
                        }
                    } catch (error) {
                        this.error = error.message;
                        console.log(error);
                    }
                }
                else {
                    this.car.monthly_payment = (((this.price_with_vat - this.car.down_payment) + (((this.price_with_vat - this.car.down_payment) * this.car.interest)/100)) / this.car.pay_period).toFixed(2);
                    this.car.total_price = ((this.price_with_vat - this.car.down_payment) + (((this.price_with_vat - this.car.down_payment) * this.car.interest)/100)).toFixed(2);
                    try {
                        const response = await axios.put(url, this.car);
                        if (response.status == 200) {
                            alert("ยืนยันการซื้อรถสำเร็จ");
                            this.$router.push('/')
                        }
                    } catch (error) {
                        this.error = error.message;
                        console.log(error);
                    }
                }

                
            },
            async checkCode() {
                if (this.promotion_code === "") {
                    this.promotion = null;
                    this.code = null;
                    alert("โปรดใส่โค้ด");
                }
                else {
                    let p_id = this.promotion_code.charAt(0);
                    const url3 = `http://localhost/api/promotions/${p_id}`;
                    try {
                        const reponse = await axios.get(url3);
                        if (reponse.status == 200) {
                            this.promotion = reponse.data.data;
                            console.table(this.promotion);
                        }
                    } catch (error) {
                        console.log(error);
                        this.error = error.message;
                        alert("โค้ดไม่ถูกต้อง");
                    }
                    if (this.promotion.is_active) {
                        this.promotion = null;
                        this.code = null;
                        alert("โปรโมชันนี้ไม่สามารถใช้งานได้");
                    }
                    else {
                        for (let i = 0; i < this.promotion.codes.length; i++) {
                            if (this.promotion.codes[i].code === this.promotion_code && this.promotion.codes[i].redeemed_at === null) {
                                this.code_id = this.promotion.codes[i].id;
                                this.code = this.promotion.codes[i];
                                i = this.promotion.codes.length;
                                alert("โค้ดสามารถใช้งานได้");
                            }

                            else if (this.promotion.codes[i].code === this.promotion_code && !this.promotion.codes[i].redeemed_at != null) {
                                this.promotion = null;
                                this.code = null;
                                i = this.promotion.codes.length;
                                alert("โค้ดนี้ถูกใช้งานแล้ว");
                            }
                            
                            else if (i === this.promotion.codes.length - 1) {
                                this.promotion = null;
                                this.code = null;
                                alert("โค้ดไม่ถูกต้อง2");
                            }
                        }
                    }
                    
                }
            }
        }
    }
</script>
<style>
    .line {
        border-right: 1px solid rgb(206, 206, 206);
        padding-right: 0.3rem;        
    }
</style>