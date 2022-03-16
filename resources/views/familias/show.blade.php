<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Familias')

@section('content')

<div class="cajonCrearFactura">
    <h1>Productos de la familia: {{$familia->nombre}}</h1>

    <table border=1 class="table">
        <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>
                </tr>
            @endforeach
        </tbody>    
    </table>

</div>

@endsection