<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Familias')

@section('content')

<div class="cajonCrearFactura">
    <div class="botonesPaginate">
        <div>
            {{$familias->links("pagination::bootstrap-4")}}
        </div>
    </div>
    <table border=1 class="table table-hover">
        <thead>
            <th>Cod</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($familias as $familia)
                <tr>
                    <td>{{$familia->cod}}</td>
                    <td>
                        <a href="{{route("familias.show",$familia->id)}}">{{$familia->nombre}}</a>
                    </td>
                    <td>{{$familia->descripcion}}</td>
                    <td>
                        <form action="{{route('familias.edit',$familia->id)}}" method="get">
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="{{route('familias.destroy',$familia->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection

