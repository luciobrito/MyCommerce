<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 z-9 " style="margin: 0; top: 0;">
    <div class="container-fluid">
      <a href="/" class="navbar-brand">MyCommerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <RouterLink class="nav-link active p-0" to="/vendas">
              <div data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">Vendas</div>
            </RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link active p-0" to="/produtos">
              <div class="pt-2" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">Produtos</div>
            </RouterLink>
          </li>
          <li class="nav-item dropdown">
            <!--
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          
          <ul class="dropdown-menu" >
            
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>-->
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <!--
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
      </div>
    </div>
  </nav>
</template>
<script>
import { RouterLink } from 'vue-router';

</script>