@extends('layouts.main')
@section('title', 'Motorista - Editar motorista')


@section('content')

<h1>Editar Motoristas:{{$motorista->id}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/motorista/motorista/{{$carro->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
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
                <label for="telefone">Telefone: *</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" >
            </div>
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="cartacondu">Carta de Condução: *</label>
              <input type="text" class="form-control" id="cartacondu" name="cartacondu" placeholder="Carta de Condução">
          </div>

           
            <input type="submit" class="btn btn-primary" value="Editar motorista">
        
            
    </div>

@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var nif = document.forms["Form"]["nif"].value;
    var telefone = document.forms["Form"]["telefone"].value;
    var email = document.forms["Form"]["email"].value;
    var cartacondu = document.forms["Form"]["cartacondu"].value;
    if (nome == null || nome == "", 
        nif == null || nif == "",
        telefone == null || telefone == "",
        email == null || email == "",
        cartacondu:== null || cartacondu== "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>