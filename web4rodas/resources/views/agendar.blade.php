@extends('layouts.main')
@section('title', 'Veiculo - Criar carro')


@section('content')

<h1>Criar Agendamentos:</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/agendar" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
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
           <!-- <div class="form-group">
                <label for="condutor">Condutor: *</label>
                <input type="text" class="form-control" id="condutor" name="condutor" placeholder="Condutor" >
            </div>
            <div class="form-group">
                <label for="veiculo">Veículo: *</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" placeholder="Veículo">
            </div>
          -->
            <input type="submit" class="btn btn-primary" value="Criar Agendamento">
        
            
    </div>

@endsection

<script type="text/javascript">
  function validateForm() {
    var data_incio = document.forms["Form"]["data_inicio"].value;
    var data_fim = document.forms["Form"]["data_fim"].value;
    var descricao = document.forms["Form"]["descricao"].value;
   // var condutor = document.forms["Form"]["condutor"].value;
  //  var veiculo = document.forms["Form"]["veiculo"].value;
    if (data_incio == null || data_incio == "", 
        data_fim == null || data_fim == "",
        descricao == null || descricao == ""){
        //condutor == null || condutor == "",
        //veiculo == null || veiculo == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>
  