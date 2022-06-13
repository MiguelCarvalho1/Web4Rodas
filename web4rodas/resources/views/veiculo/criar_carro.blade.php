@extends('layouts.main')
@section('title', 'Veiculo - Criar carro')


@section('content')

<h1>Criar Veiculos:</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/veiculo/carro" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        <div class="form-group">
                <label for="marca">Marca: *</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" >
            </div>
            <div class="form-group">
                <label for="modelo">Modelo: *</label>
                <input type="modelo" class="form-control" id="modelo" name="modelo" placeholder="Modelo" >
            </div>
            <div class="form-group">
                <label for="matricula">Matricula: *</label>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" >
            </div>
            <div class="form-group">
                <label for="lotacao">Lotação: *</label>
                <input type="text" class="form-control" id="lotacao" name="lotacao" placeholder="Lotação">
            </div>

            <div class="form-group">
              <label for="tipo_id">Tipo de Veiculo:</label>
              <select name="tipo" id="tipo_id" class="from-group">
                  <option value="3">D-Autocarro</option>
                  <option value="2">C-Camião</option>
                  <option value="1">B-Carro</option>
                  <option value="0">A-Moto</option>
              </select>
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