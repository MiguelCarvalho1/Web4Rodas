@extends('layouts.app')

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


<h1>Motorista:</h1>
<div class="all-title-box" style="display: flex;">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: rgb(22, 22, 23)">{{$motorista-> nome}}</h1>
  
	</div>
</div>
    <br>
    <br>    

				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">                                 
					<div class="message-box text-left">
                        <h2>{{__('NIF')}}:{{$motorista->nif}}</h2>
                        <hr>
                        <h3>{{__('E-mail')}}: {{$motorista->email}}</h3>
                        <hr>
                        
                        <h3>{{__('Telemovel')}}: {{$motorista->telemovel}}</h3>
                        <hr>
                        <h3>{{__('Carta de Condução')}}: {{$motorista->cartaCondu}}</h3>

                        @foreach($moradas as $morada)
                        <hr>
                        <h3>{{__('Rua')}}: {{$morada->rua}}</h3>
                        <hr>
                        <hr>
                        <h3>{{__('Nº Porta')}}: {{$morada->n_porta}}</h3>
                        <hr>
                        <hr>
                        <h3>{{__('Andar')}}: {{$morada->andar}}</h3>
                        <hr>
                        <hr>
                        <h3>{{__('Codigo-Postal')}}: {{$morada->codigoPostal}}</h3>
                        <hr>
                        <hr>
                        <h3>{{__('Concelho')}}: {{$morada->localidade}}</h3>
                        @endforeach
                        <hr>
                        <hr>
                        
                        <hr>
                         
                    </div>



            <br><br>
            <div class="message-box text-center">
                <a href="/motorista/motorista" class="btn btn-primary"><span><strong>{{__('Voltar Atrás')}}</strong></span></a>
            </div>  
        </div>    
    </div>