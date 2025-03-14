<template>
    <!--Card Container-->
    <div class="w-100">
        <!--Card-->
        <div class="card m-2 card-size" v-for="produto in produtos">
            <!--Conteúdo do cartão-->
            <div class="m-2 d-flex flex-column">
                <div class="d-flex w-100 justify-content-between">
                    <div class="d-flex justify-content-between w-100">
                    <p class="m-0 fw-bold">{{ produto.nome }}</p>
                    <p class=" m-0">Em estoque: {{ produto.qnt_estoque }}</p>
                </div>
                    
                    
                    <button class="" data-bs-toggle="collapse" :data-bs-target="'#cardDetails' + produto.id"
                    aria-expanded="false" aria-controls="cardDetails"><i class="bi bi-chevron-down" ></i>
                </button>
                </div>
                <div>
                    <p class="fst-italic m-0">{{ produto.codigo_barra }}</p>
                </div>
                
                <div class="d-flex w-100 justify-content-end">
                    
                    <p class="m-0">R${{ produto.preco }}</p>
                </div>

            </div>
            <!--Card details-->
            <div class="collapse" :id="'cardDetails' + produto.id">
                <div class="m-2">
                <p>Cadastro:  {{ dateOnly(produto.created_at)  }}</p>
                <p>{{produto.descricao}}</p>
                <div class="d-flex justify-content-evenly">
                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar Produto</button>
                <button class="btn btn-danger"><i class="bi bi-trash-fill"></i>Excluir Produto</button>
                </div>
            </div>
            </div>
        </div>

    </div>
</template>

<style lang="scss" src="./LPStyle.scss"></style>


<script>
import instance from '../../../Services/axiosConfig';
import { dateOnly } from '../../../Services/dateConverter';
export default {
    name: "ListaProdutos",
    data() {
        return {
            produtos: [],
            collapsed: true,
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
        },
        dateOnly(date){
            return dateOnly(date);
        }
    }
}
</script>