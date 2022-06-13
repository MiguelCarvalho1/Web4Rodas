
<!--
<form>
  <fieldset>
      <div>
        These should be formatted as Dates 
        <label>Data início</label>
        <input type="date" class="required" id="start-date" />
        
        <label>Data fim</label>
        <input type="date" class="required" id="end-date" />
       
      </div>
      <br>
      <div>
      <div>
        <label>Descrição</label>
        <textarea rows = "8" cols = "60" name = "descricao">
       </textarea>
      </div>
      <div>
        <br>
        <label>Motorista</label>
        <input type="text" id="instructor"/>
        <br>
      </div>
      <div>
        <br>
        <label>Veículo</label>
        <input type="text" id="instructor"/>
      </div>
      <br>
      <div class="button">
        <button id="save" type="submit">Guardar</button>
      </div>
    </fieldset>
     <br>
     -->
     
@extends('layouts.main')
@section('title', 'Veiculo - Criar carro')


@section('content')

<h1>Criar Agendamentos:</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/veiculo/carro" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
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
            <div class="form-group">
                <label for="condutor">Condutor: *</label>
                <input type="text" class="form-control" id="condutor" name="condutor" placeholder="Condutor" >
            </div>
            <div class="form-group">
                <label for="veiculo">Veículo: *</label>
                <input type="text" class="form-control" id="veiculo" name="veiculo" placeholder="Veículo">
            </div>
           
            <input type="submit" class="btn btn-primary" value="Criar Carro">
        
            
    </div>

@endsection

<script type="text/javascript">
  function validateForm() {
    var marca = document.forms["Form"]["marca"].value;
    var modelo = document.forms["Form"]["modelo"].value;
    var matricula = document.forms["Form"]["matricula"].value;
    var lotacao = document.forms["Form"]["lotacao"].value;
    if (marca == null || marca == "", 
        modelo == null || modelo == "",
        matricula == null || matricula == "",
        lotacao == null || lotacao == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>
  