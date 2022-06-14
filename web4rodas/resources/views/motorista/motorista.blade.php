@extends('layouts.main')
@section('title', 'Motorista')


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

<h1>motorista</h1>


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                    <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">Mome</th>
                    <th>Nif</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Carta de Condução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($motoristas as $motorista)
                <tr>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->nif}}</td> 
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->telefone}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->email}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$motorista->cartacondu}}</td>
                    <!--td style="text-align: justify; vertical-align: middle"><a {{--$motorista->tipo_id}}>{{$motorista->tipo->descricao_tipo--}}</a></td--> 
                   <td style="text-align: center; vertical-align: middle"> 
                        @method('UPDATE')
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/motorista/editar_motorista/{{$motorista->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/motorista/motorista/{{$motorista->id}}" method="GET">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Pretende apagar a motorista &quot {{$motorista->nome}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        
                        
                        
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
<button class="btn btn-primary" style="color:white"><a href="/motorista/criar_motorista">Criar Motorista</button>
@endsection