<template>
    <!--Card Container-->
    <div class="w-100">
        <!--Card-->
        <div class="card m-2 card-size" v-for="produto in produtos">
            <!--Conteúdo do cartão-->
            <div class="m-2 d-flex flex-column">
                <!--Parte de cima do card-->
                <div class="d-flex w-100 justify-content-between">
                    <p class="m-0 fw-bold">{{ produto.nome }}</p>
                    <button
                        class=""
                        data-bs-toggle="collapse"
                        :data-bs-target="'#cardDetails' + produto.id"
                        aria-expanded="false"
                        aria-controls="cardDetails"
                    >
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </div>
                <!--Meio do card-->
                <div>
                    <p class="fst-italic m-0">{{ produto.codigo_barra }}</p>
                </div>
                <!--Final do card-->
                <div class="d-flex w-100 justify-content-between">
                    <p class="m-0">R${{ produto.preco }}</p>
                    <p class="m-0">Em estoque: {{ produto.qnt_estoque }}</p>
                </div>
            </div>
            <!--Card details-->
            <!--Botão que abre o card-->
            <div class="collapse" :id="'cardDetails' + produto.id">
                <div class="m-2">
                    <p>Cadastro: {{ dateOnly(produto.created_at) }}</p>
                    <p>{{ produto.descricao }}</p>
                    <div class="d-flex justify-content-evenly">
                                                <button
                            class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#excluirProdutoModal"
                            @click="alterarIdModal(produto.id)"
                        >
                            <i class="bi bi-trash-fill"></i>Excluir Produto
                        </button>
                        <button
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#editarProdutoModal"
                            @click="alterarIdModal(produto.id)"
                        >
                            <i class="bi bi-pencil-square"></i> Editar Produto
                        </button>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ExcluirProduto :idProduto="this.idModal" />
    <EditarProduto :idProdutoEditar="this.idModal" />
</template>

<style lang="scss" src="./LPStyle.scss"></style>

<script>
import instance from "../../../Services/axiosConfig";
import { dateOnly } from "../../../Services/dateConverter";
import EditarProduto from "./ListaProdutos/EditarProduto.vue";
import ExcluirProduto from "./ListaProdutos/ExcluirProduto.vue";
export default {
    name: "ListaProdutos",
    components: {
        ExcluirProduto,
        EditarProduto,
    },
    data() {
        return {
            produtos: [],
            collapsed: true,
            idModal: 0
        };
    },
    created() {
        this.getProdutos();
        
    },
    
    methods: {
        getProdutos() {
            instance
                .get("/produto")
                .then((response) => {
                    this.produtos = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        dateOnly(date) {
            return dateOnly(date);
        },
        alterarIdModal(id){
            this.idModal = id;
        }
    },
};
</script>
