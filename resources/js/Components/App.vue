<template>
<!--Se a rota for igual a /login, não renderizar navbar-->
<Navbar />
<div style="top:56px;margin-top: 56px;">
    <RouterView /> 
</div>
  
</template>

<script setup>
import Navbar from './Modules/Navbar.vue';
</script>