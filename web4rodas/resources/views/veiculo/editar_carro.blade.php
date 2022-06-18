@extends('layouts.main')
@section('title', 'Veiculo - Editar carro . $carro->id')


@section('content')

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
