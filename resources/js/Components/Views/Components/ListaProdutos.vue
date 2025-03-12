<template>
    <!--Card Container-->
    <div>
        <div class="card m-2" v-for="produto in produtos">
            <!--Conteúdo do cartão-->
            <div class="m-2 d-flex">
            <div >
                <p class="m-0">{{ produto.nome }}</p>
                <p>{{ /*Quantidade em estoque*/ 50}}</p>
            </div>
            {{ produto.codigo_barra }}
            <div class="">
                
                R${{ produto.preco }}
            </div>
        </div>
           
        </div>
    </div>
</template>




<script>
import instance from '../../Services/axiosConfig';


export default {
    name: "ListaProdutos",
    data() {
        return {
            produtos: []
        }
    },
    created() {
        this.getProdutos();
    },
    methods: {
        getProdutos() {
            instance.get('/produto')
                .then((response) => { this.produtos = response.data })
                .catch((error) => { console.log(error) })
        }
    }
}
</script>