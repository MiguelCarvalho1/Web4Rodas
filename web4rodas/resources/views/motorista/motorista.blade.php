@extends('layouts.app')
@section('title', 'Motorista')


@section('content')
<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav" data-toggle="collapse" aria-controls="navbar-examples">
                        <i class="fab " style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Motorista:') }}</span>
                    </a>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="/veiculo/carro">
                        <i class="ni ni-spaceship"></i> Veiculos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/motorista/motorista">
                        <i class="ni ni-palette"></i> Motoristas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/agendamentos">
                        <i class="ni ni-ui-04"></i>Agendamentos
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
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

<h1>Motorista</h1>

<div class="col-sm-10">
    <div class="card">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                    <th>Nome</th>
                    <th>Nif</th>
                    <th>Telemovel</th>
                    <th>Email</th>
                    <th>Carta de Condução</th>
                    <th>Tipo de Carta</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($motoristas as $motorista)
                <tr>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->nif}}</td> 
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->telemovel}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->email}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->cartaCondu}}</td>
                    @foreach($tipoCartas as $tipoCarta)
                    <td style="text-align: justify; vertical-align: middle">
                        <a >
                            {{$tipoCarta->descricao_tipo}}
                        </a>
                    </td> 
                    @endforeach
                   
                   <td style="text-align: center; vertical-align: middle"> 
                       
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/motorista/editar_motorista/{{$motorista->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/motorista/motorista/{{$motorista->id}}" method="GET">
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{$motoristas->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
</div>
</div>
<a class="btn btn-primary" href="/veiculo/criar_carro">Criar Motorista</a>
@endsection