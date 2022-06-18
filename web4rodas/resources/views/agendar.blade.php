@extends('layouts.main')
@section('title', 'Veiculo - Criar carro')


@section('content')

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
  