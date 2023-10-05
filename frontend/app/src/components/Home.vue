<script setup>
  import MySwiper from "./MySwiper.vue"
</script>

<template>
  <section id="home" class="grid place-items-center mt-20 md:mt-10 overflow-hidden">
    <div class="grid grid-flow-row-dense grid-cols-1 lg:grid-cols-2 items-end gap-10 lg:gap-16 w-full px-0 lg:px-10">
      <div class="text-5xl md:text-6xl font-bold text-black w-full pb-20 order-2 lg:order-1">
        <div class="flex items-center gap-3">
          <h2>CARCASH</h2>
          <img src="../assets/images/head1-img.png" alt="head1-img">
        </div>
        <h2 class="text-4xl md:text-5xl">Happy Halloween !!</h2>
        <p class="pt-5 text-lg font-normal">เว็ปไซด์เต็นท์รถมือสอง CAR CASH เว็ปไซด์ที่จะสามารถเปิดประสบการณ์การซื้อขายเต้นรถแบบออนไลน์ให้กับคุณ.</p>
      </div>
      <div class="w-full h-full order-1 lg:order-2">
        <MySwiper/>
      </div>
    </div>
  </section>
  <section class="grid grid-flow-col grid-cols-1 md:grid-cols-2 md:gap-10 items-center">
    <div class="md:p-10">
      <img src="../assets/CARCASH.jpg" alt="CARCASH">
    </div>
    <div class="text-center flex flex-col items-center">
      <h2 class="text-5xl md:text-6xl font-bold text-black">What's that</h2>
      <div class="flex items-center gap-5">
        <h2 class="text-5xl md:text-6xl font-bold text-black">CARCASH</h2>
        <img src="../assets/images/head2-img.png" class="w-9 md:w-12" alt="head2">
      </div>
      <p class="mt-8 md:mt-12 text-black text-lg md:text-xl w-full md:w-[80%]">เป็นเว็ปไซด์เต็นท์รถยนต์มือสองที่มีช่างพร้อมช่วยเหลือเเละรับรองการเช็คสภาพรถยนต์ที่ขายเเละเช็ค
สภาพรถเพื่อประเมินราคา โดยที่จะให้ผู้ใช้บริการเข้ามาขายรถให้กับเจ้าของเต็นท์รถเเล้วเจ้าของเต็นจะนำรถมาขายต่ออีกครั้ง.</p>
    </div>
  </section>
  
</template>