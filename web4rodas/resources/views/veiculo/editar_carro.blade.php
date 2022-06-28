@extends('layouts.app')
@section('title', 'Veiculo - Editar carro . $carro->id')


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
                      <span class="nav-link-text" style="color: #f4645f;">{{ __('Veiculos:') }}</span>
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
                      <i class="ni bi-person"></i> Motoristas
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

<h1>Editar Veiculos: {{$carro->id}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/veiculo/atualizar_carro/{{$carro->id}}" method="GET" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('GET')
        <div class="form-group">
                <label for="marca">Marca: *</label>
                <input type="text" class="form-control" id="Marca" name="marca" placeholder="Marca" value="{{$carro->Marca}}">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo: *</label>
                <input type="modelo" class="form-control" id="modelo" name="modelo" placeholder="Modelo" value="{{$carro->modelo}}">
            </div>
            <div class="form-group">
                <label for="matricula">Matricula: *</label>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" value="{{$carro->matricula}}">
            </div>
            <div class="form-group">
                <label for="lotacao">Lotação: *</label>
                <input type="text" class="form-control" id="lotacao" name="lotacao" placeholder="Lotação" value="{{$carro->lotacao}}">
            </div>

            <div class="form-group">
              <label for="tipo_id">Tipo de Veiculo:</label>
              <select name="tipo" id="tipo_id" class="from-group">
                @foreach ($tipos as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->descricao_tipo}}</option>
            @endforeach
              </select>
          </div>
           
            <input type="submit" class="btn btn-primary" value="Editar carro">
        </form>
            
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var marca = document.forms["Form"]["marca"].value;
    var modelo = document.forms["Form"]["modelo"].value;
    var matricula = document.forms["Form"]["matricula"].value;
    var lotacao = document.forms["Form"]["lotacao"].value;
    var tipo_id = document.forms["Form"]["tipo_id"].value;
    if (marca == null || marca == "", 
        modelo == null || modelo == "",
        matricula == null || matricula == "",
        lotacao == null || lotacao == "",
        tipo_id== null || tipo_id== "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>
