<template>
    <h1 class="text-center">Produtos</h1>
    <button class="btn btn-primary m-1">Cadastro</button>
    <button class="btn btn-primary m-1">Compra</button>
    <p>Seus produtos:</p>
    <p>{{ valor[0] }}</p>
</template>

<script setup>
import axios from 'axios';
import { getProdutos } from '../Services/ProductService';

    var valor = getProdutos();
</script>