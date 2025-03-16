<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="cadastroModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Cadastrar Produto
                    </h1>
                </div>
                <div class="modal-body">
                    <!--Formulário de cadastro-->
                    <form>
                        <!--Campo Nome-->
                        <label for="nome" class="form-label">Nome:</label>
                        <input
                            v-model="this.cadFormData.nome"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': this.cadFormErrors?.nome }"
                            id="validationNome"
                            aria-describedby="inputGroupPrepend3 validationNome"
                            required
                        />
                        <div id="validationNome" class="invalid-feedback">
                            {{ this.cadFormErrors.nome?.[0] }}
                        </div>
                        <div class="d-flex">
                            <!--Campo Código de barra-->
                            <div>
                                <label for="codigo_barra" class="form-label"
                                    >Código de Barra:</label
                                >
                                <input
                                    v-model="this.cadFormData.codigo_barra"
                                    type="text"
                                    id="codigo_barra"
                                    placeholder="78910000"
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            this.cadFormErrors?.codigo_barra,
                                    }"
                                />
                                <div id="codigo_barra" class="invalid-feedback">
                                    {{ this.cadFormErrors.codigo_barra?.[0] }}
                                </div>
                            </div>
                            <!--Campo de preço-->
                            <div>
                                <label for="preco" class="form-label"
                                    >Preço:</label
                                >
                                <div class="input-group mb-3">
                                    <span class="input-group-text">R$</span>
                                    <input
                                        v-model="this.cadFormData.preco"
                                        type="number"
                                        min="1"
                                        step="any"
                                        id="preco"
                                        class="form-control"
                                    />
                                </div>
                            </div>
                        </div>
                        <!--Campo de descrição-->
                        <label for="desc" class="form-label">Descrição:</label>
                        <input
                            id="desc"
                            v-model="this.cadFormData.descricao"
                            type="text"
                            class="form-control"
                            :class="{
                                'is-invalid': this.cadFormErrors?.descricao,
                            }"
                            placeholder="Calma calabrezo"
                        />
                        <div id="desc" class="invalid-feedback">
                            {{ this.cadFormErrors.descricao?.[0] }}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        @click="close"
                    >
                        Cancelar
                    </button>
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="cadastrarProduto"
                    >
                        Cadastrar Produto
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import instance from "../../../Services/axiosConfig";

export default {
    methods: {
        close() {
            this.$parent.changeKey();
        },
        cadastrarProduto() {
            console.log(this.cadFormData);
            instance
                .post("/produto", this.cadFormData)
                .then(() => {
                    this.close();
                    this.cadFormData = {};
                })
                .catch((error) => {
                    this.cadFormErrors = error.response.data.errors;
                })
                .finally();
        },
    },
    data() {
        return {
            cadFormData: {
                nome: "",
                codigo_barra: "",
                preco: 0,
                descricao: "",
            },
            cadFormErrors: {
                nome: "",
                codigo_barra: "",
                preco: "",
                descricao: "",
            },
        };
    },
};
</script>
