@extends('layouts.app')
@section('title', 'Veiculo - Criar carro')


@section('content')

<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav" data-toggle="collapse" aria-controls="navbar-examples">
                        <i class="fab " style="color: #0b0d97;"></i>
                        <span class="nav-link-text" style="color: #0b0d97;">{{ __('Agendamentos:') }}</span>
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
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout.perform').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                </a>
            </div>
            </ul>
        </div>
    </div>
</nav>

<div class="row">
  @if(session("msg"))
      <p class="msg" style="background-color: #8df0a4;
                              color: #04270c;
                              border: 1px solid #daf2e0;
                              width: 100%;
                              margin-bottom: 0;
                              text-align: center;
                              padding: 10px;
                              margin:10px;">
                              {{session('msg')}}
      </p>
  @endif
</div>


<h1>Criar Agendamentos:</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/agendar" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        <div class="form-group">
          <label for="modelo">Nome do Evento: *</label>
          <input type="text "class="form-control" name = "nome" placeholder="Nome do Evento">
          </div>
        <div class="form-group">
                <label for="data_inicio">Data Ínicio: *</label>
                <input type="date" class="form-control" id="data_incio" name="data_inicio" placeholder="Data_inicio" >
            </div>
        <div class="form-group">
              <label for="data_fim">Data Fim: *</label>
              <input type="date" class="form-control" id="data_fim" name="data_fim" placeholder="Data_fim" >
          </div>
            <div class="form-group">
                <label for="modelo">Descrição: *</label>
                <textarea rows = "8" cols = "60" class="form-control" name = "descricao" placeholder="Descricão"></textarea>
            </div>
            <div class="form-group">
                <label for="motorista">Motorista: *</label>
                <input type="text"  class="form-control" id="motorista" name="motorista" placeholder="Motorista" >
            </div>
            <div class="form-group">
                <label for="veiculo">Veículo: *</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" placeholder="Veículo">
            </div>
          
            <input type="submit" class="btn btn-primary" value="Criar Agendamento">
        
            
    </div>

@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var data_incio = document.forms["Form"]["data_inicio"].value;
    var data_fim = document.forms["Form"]["data_fim"].value;
    var descricao = document.forms["Form"]["descricao"].value;
    var motorista = document.forms["Form"]["condutor"].value;
    var veiculo = document.forms["Form"]["veiculo"].value;
    if (nome == null || nome == "",
      data_incio == null || data_incio == "", 
        data_fim == null || data_fim == "",
        descricao == null || descricao == "",
          motorista == null || motorista == "",
        veiculo == null || veiculo == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>
  