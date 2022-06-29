@extends('layouts.app')
@section('title', $motorista -> nome)
@section('title', 'Motorista')


@section('content')

<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav" data-toggle="collapse" aria-controls="navbar-examples">
                        <i class="fab " style="color: #0b0d97;"></i>
                        <span class="nav-link-text" style="color: #0b0d97;">{{ __('Motorista:') }}</span>
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
                  <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
                      <i class="ni ni-user-run"></i>Logout                       
                  </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      </form>
              </div>
            </ul>
        </div>
    </div>
</nav>
<!-- end Nav -->


<h1>Ver Motoristas:{{$motorista->nome}}</h1>
<div class="all-title-box" style="display: flex;">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: rgb(20, 11, 189)">{{$motorista-> nome}}</h1>
        <h3 style="color: rgb(20, 11, 189)">{{$motorista-> nif}}</h3>
	</div>
</div>


<div id="overviews" class="section lb" style="background-color: rgb(179, 155, 246)">
    <br>
    <br>    
    <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                </div><!-- end col -->
				
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
                        @foreach($tipoCartas as $motorista)
                            <tr>
                                <td style="text-align: justify; vertical-align: middle">{{$motorista->nome}}</td>
                                <td style="text-align: justify; vertical-align: middle">{{$motorista->nif}}</td> 
                                <td style="text-align: justify; vertical-align: middle">{{$motorista->telemovel}}</td>
                                <td style="text-align: justify; vertical-align: middle">{{$motorista->email}}</td>
                                <td style="text-align: justify; vertical-align: middle">{{$motorista->cartaCondu}}</td>
                              
                                <td style="text-align: justify; vertical-align: middle">
                                    <a >
                                        {{$motorista->descricao_tipo}}
                                    </a>
                                </td> 
                            </tr>
                        @endforeach
                
			</div>
            <br><br>
            <div class="message-box text-center">
                <a href="/motorista/motorista" class="btn btn-light btn-radius btn-brd grd1"><span><strong>{{__('message.VoltarAtras')}}</strong></span></a>
            </div>  
        </div>    
    </div>