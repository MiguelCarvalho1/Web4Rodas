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