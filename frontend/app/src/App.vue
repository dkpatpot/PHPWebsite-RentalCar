<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Profile from './components/profile/Profile.vue'
import Navbar from './components/Navbar.vue';
import Home from './components/Home.vue';
// import Footer from './components/Footer.vue';
</script>

<template>
  
  <div class="container overflow-x-hidden">
    <Navbar/>    
    <!-- <Home/> -->
    <!-- <Footer/> -->
    <RouterView />
  </div>

</template>
<style>
nav {
    margin-left: auto;
    margin-top: auto;
  }
</style>
