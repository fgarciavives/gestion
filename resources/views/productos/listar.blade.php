<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Facturas')

@section('content')

<div class="cajonCrearFactura">
    <div class="botonesPaginate">
        <div>
            {{$productos->links("pagination::bootstrap-4")}}
        </div>
    </div>
    <table border=1 class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>
                        <form action="{{route('productos.edit',$producto->id)}}" method="get">
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="{{route('productos.destroy',$producto)}}" method="post">
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