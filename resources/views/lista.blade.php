<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')

@section('title','Facturas')

@section('content')

<div class="tablaListarFacturas">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Número</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>
    @foreach ($facturas as $factura)
        <tr>
            <td><a href="{{route('facturas.edit',$factura->numero)}}">{{$factura->numero}}</a></td>
            <td>{{$factura->fecha}}</td>
            <td>{{$factura->nombre}}</td>
            <td>{{$factura->total()}}</td>
        </tr>
    @endforeach
    </table>
</div>

@endsection