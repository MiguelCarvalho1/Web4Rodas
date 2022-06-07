@extends('layouts.main')
@section('title', 'Veiculo')


@section('content')

<div class="row">
                @if(session("msg"))
                    <p class="msg" style="background-color: #d4edda;
                                            color: #155724;
                                            border: 1px solid #c3e6cb;
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
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matricula</th>
                    <th>Lotação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$carro->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$carro->marca}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$carro->modelo}}</td> 
                    <td style="text-align: justify; vertical-align: middle">{{$carro->matricula}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$carro->lotacao}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        @method('UPDATE')
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/veiculo/editar_carro/{{$carro->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/veiculo/carro/{{$carro->id}}" method="GET">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Pretende apagar a carro &quot {{$carro->modelo}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>
                        
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
@endsection