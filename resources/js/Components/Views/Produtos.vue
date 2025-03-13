<template>
    <h1 class="text-center">Produtos</h1>
    <div class="w-100 d-flex justify-content-center">
        <button class="btn btn-primary m-1">Cadastro</button>
        <button class="btn btn-primary m-1">Compra</button>
    </div>
 
    <p class="m-2">Seus produtos:</p>
    <ListaProdutos :key="1 /*Essa chave serve para re-renderizar*/"  />
</template>

<script>
import ListaProdutos from './Components/ListaProdutos.vue';

export default {
    components: {
        ListaProdutos
    }
}

</script>