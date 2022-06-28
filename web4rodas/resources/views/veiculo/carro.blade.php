
@extends('layouts.app')
@section('content')
   
<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav" data-toggle="collapse" aria-controls="navbar-examples">
                        <i class="fab " style="color: #0b0d97;"></i>
                        <span class="nav-link-text" style="color: #0b0d97;">{{ __('Veiculos:') }}</span>
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

<h1>Veiculo:</h1>
<div class="col-sm-10">
<div class="card">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matricula</th>
                    <th>Lotação</th>
                    <th>Tipo de Veiculo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td style="text-align: justify; vertical-align: middle">{{$carro->Marca}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$carro->modelo}}</td> 
                    <td style="text-align: justify; vertical-align: middle">{{$carro->matricula}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$carro->lotacao}}</td>
                    
                    @foreach($tipos as $tipo)
                    <td style="text-align: justify; vertical-align: middle">
                        <a >
                            {{$tipo->descricao_tipo}}
                        </a>
                    </td> 
                    @endforeach
                  
                    <td style="text-align: center; vertical-align: middle"> 
                        @method('UPDATE')
                        <button class="btn bg-warning text-white" style="width:30px; margin:0px">
                            <a href="/veiculo/editar_carro/{{$carro->id}}" style="color:white">
                                <i class="fa fa-edit"></i>
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{$carros->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
</div>
</div>
<a class="btn btn-primary" href="/veiculo/criar_carro" >Criar Carro</a>
@endsection