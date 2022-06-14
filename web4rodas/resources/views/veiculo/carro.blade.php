@extends('layouts.main')
@section('title', 'Veiculo')


@section('content')

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

<h1>Veiculo</h1>


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
                    <!--td style="text-align: justify; vertical-align: middle"><a {{--$carro->tipo_id}}>{{$carro->tipo->descricao_tipo--}}</a></td--> 
                   <td style="text-align: center; vertical-align: middle"> 
                        @method('UPDATE')
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/veiculo/editar_carro/{{$carro->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/veiculo/carro/{{$carro->id}}" method="GET">
                        
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
<button class="btn btn-primary" style="color:white"><a href="/veiculo/criar_carro">Criar Carro</button>
@endsection