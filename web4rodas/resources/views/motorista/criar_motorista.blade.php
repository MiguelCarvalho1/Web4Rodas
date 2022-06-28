@extends('layouts.app')
@section('title', 'Motorista - Criar Motorista')


@section('content')

<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
          <!-- Form -->
          <form class="mt-4 mb-3 d-md-none">
              <div class="input-group input-group-rounded input-group-merge">
                  <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                  <div class="input-group-prepend">
                      <div class="input-group-text">
                          <span class="fa fa-search"></span>
                      </div>
                  </div>
              </div>
          </form>
          <!-- Navigation -->
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav" data-toggle="collapse" aria-controls="navbar-examples">
                      <i class="fab " style="color: #f4645f;"></i>
                      <span class="nav-link-text" style="color: #f4645f;">{{ __('Motorista:') }}</span>
                  </a>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                  <a class="nav-link" href="/veiculo/carro">
                      <i class="ni ni-spaceship"></i> Veiculos
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/motorista/motorista">
                      <i class="bi bi-person"></i> Motoristas
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/agendamentos">
                      <i class="ni ni-ui-04"></i>Agendamentos
                  </a>
              </li>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
              </a>
          </div>
          </ul>
      </div>
  </div>
</nav>

<h1>Criar Motoristas:</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/motorista/motorista" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" >
            </div>
            <div class="form-group">
                <label for="nif">Nif: *</label>
                <input type="nif" class="form-control" id="nif" name="nif" placeholder="Nif" >
            </div>
            <div class="form-group">
                <label for="telemovel">Telemovel: *</label>
                <input type="text" class="form-control" id="telemovel" name="telemovel" placeholder="Telemovel" >
            </div>
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="cartaCondu">Carta de Condução: *</label>
              <input type="text" class="form-control" id="cartaCondu" name="cartaCondu" placeholder="Carta de Condução">
          </div>

           
            <input type="submit" class="btn btn-primary" value="Criar motorista">
        
            
    </div>

@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var nif = document.forms["Form"]["nif"].value;
    var telemovel = document.forms["Form"]["telemovel"].value;
    var email = document.forms["Form"]["email"].value;
    var cartaCondu = document.forms["Form"]["cartaCondu"].value;
    if (nome == null || nome == "", 
        nif == null || nif == "",
        telemovel == null || telemovel == "",
        email == null || email == "",
        cartaCondu:== null || cartaCondu== "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>