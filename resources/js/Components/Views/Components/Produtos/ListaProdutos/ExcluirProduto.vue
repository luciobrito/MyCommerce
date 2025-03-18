<template>
<!-- Modal -->
<div class="modal fade" id="excluirProdutoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> {{ excluido ? "Produto excluído.": `Excluir ${this.nomeProduto}?` }}</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ref="closeBtn"></button>
      </div>
      <div class="modal-body" v-if="!this.excluido">
        Tem certeza que deseja excluir {{ this.nomeProduto }}?
      </div>
      <div class="modal-footer">

        <div class="d-flex justify-content-around w-100">
          <button type="button" :disabled="excluido || excluindo" class="btn btn-danger" @click="deletarProduto"><i class="bi bi-trash-fill"></i>{{excluindo ? "Excluindo..." : excluido ? "Excluído" : "Confirmar Exclusão"}}</button></div>
        
        <div class="alert alert-warning w-100" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i> A exclusão é permanente e não pode ser revertida!
</div>
      </div>
    </div>
  </div>
</div>

</template>

<script>
import instance from '../../../../Services/axiosConfig';

    export default{
        props:{
            idProduto : Number,
            nomeProduto : String
        },
        methods:{
          deletarProduto(){
            this.$parent.getProdutos();
            this.excluindo = true;
            instance.delete(`/produto/${this.idProduto}`)
            .then(()=>{this.excluindo = false; this.excluido = true})
          }
        },
        data(){
          return{
            excluindo: false,
            excluido: false
          }
        }
    }
</script>