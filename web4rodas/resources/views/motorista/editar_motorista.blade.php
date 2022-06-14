@extends('layouts.main')
@section('title', 'Motorista - Editar Motorista')


@section('content')

<h1>Editar Motoristas:{{$motorista->id}}</h1>
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