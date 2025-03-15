<template>
  <!-- Modal -->
  <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Produto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--Formulário de cadastro-->
          <form>
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" placeholder="Perfume Calabrezo" class="form-control">
            <label for="codigo_barra" class="form-label">Código de Barra:</label>
            <input type="text" id="codigo_barra" placeholder="78910000" class="form-control">
            <label for="preco" class="form-label" >Preço:</label>
            <div class="input-group mb-3">
              
              <span class="input-group-text">R$</span>
              <input type="number" min="1" step="any" id="preco" class="form-control">
            </div>
            <label for="desc" class="form-label">Descrição:</label>
            <input type="text" class="form-control" placeholder="Calma calabrezo">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="close()">Cancelar</button>
          <button type="button" class="btn btn-primary">Cadastrar Produto</button>
        </div>
      </div>
    </div>
  </div>

</template>

<script>

export default {
  methods: {
    close() {
      this.$parent.changeKey();
    }
  }
}
</script>