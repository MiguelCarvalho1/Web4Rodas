@extends('layouts.app')
@section('title', 'Motorista - Editar Motorista')


@section('content')
<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav" data-toggle="collapse" aria-controls="navbar-examples">
                        <i class="fab " style="color: #0b0d97;"></i>
                        <span class="nav-link-text" style="color: #0b0d97;">{{ __('Motorista:') }}</span>
                    </a>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="/calendario">
                        <i class="ni ni-calendar-grid-58"></i> Calendario
                    </a>
                </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/veiculo/carro">
                          <i class="ni ni-bus-front-12"></i> Veiculos
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/motorista/motorista">
                          <i class="ni ni-single-02"></i> Motoristas
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/agendar">
                          <i class="ni ni-ruler-pencil"></i>Agendamentos
                      </a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
                      <i class="ni ni-user-run"></i>Logout                       
                  </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      </form>
              </div>
            </ul>
        </div>
    </div>
</nav>

<h1>Editar Motoristas:{{$motorista->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/motorista/motorista/{{$motorista->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
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

           
            <input type="submit" class="btn btn-primary" value="Editar motorista">
        
            
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