<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Facturas')

@section('content')

<div class="cajonCrearFactura">
    <div class="botonesPaginate">
        <div>
            {{$clientes->links("pagination::bootstrap-4")}}
        </div>
    </div>
    <table border=1 class="table table-sm table-hover">
        <thead>
            <th>NIF</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Poblacion</th>
            <th>Provincia</th>
            <th>C. Postal</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Operaciones</th>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->nif}}</td>
                <td>
                    <a href="{{route('clientes.show',$cliente->id)}}">{{$cliente->nombre}}</a>
                </td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->poblacion}}</td>
                <td>{{$cliente->provincia}}</td>
                <td>{{$cliente->cpostal}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>
                    <form action="{{route('clientes.edit',$cliente->id)}}" method="get">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </form>
                    <form action="{{route('clientes.destroy',$cliente)}}" method="post">
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