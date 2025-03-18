<template>
    <h1 class="text-center">Produtos</h1>
    <div class="w-100 d-flex justify-content-center">
        <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#cadastroModal">Cadastrar Produto</button>
        <!--<button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#compraModal">Compra</button>-->
        <CadastroModal />
        <!--<CompraModal/>-->
    </div>
 
    <p class="m-2">Seus produtos:</p>
    <ListaProdutos :key="listaKey" />
</template>

<script>
import CadastroModal from './Components/Produtos/CadastroModal.vue';
import CompraModal from './Components/Produtos/CompraModal.vue';
import ListaProdutos from './Components/Produtos/ListaProdutos.vue';

export default {
    components: {
        ListaProdutos,
        CadastroModal,
        CompraModal
    },
    data(){
        return{
            listaKey:false
        }
    },
    methods: {
        changeKey(){
            this.listaKey++
        }
    },
    watch:{
        listaKey(){

        }
    }
}

</script>