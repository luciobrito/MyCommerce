<template>
    <div class="modal fade" id="editarProdutoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar {{ this.produto.nome }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Formulário aqui
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>

</template>

<script>
import instance from '../../../../Services/axiosConfig';

    export default{
        props:{
            idProdutoEditar : Number
        },
        data(){
          return{
            produto:{

            }
          }
        },
        methods:{
          getProduto(){
            instance.get(`/produto/${this.idProdutoEditar}`).then(response => {this.produto = response.data})
          }
        },
        watch:{
          idProdutoEditar(){
            this.getProduto()
          }
        }
    }
</script>