<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Editar Familia')
    
@section('content')

<div class="cajonCrearFactura">
    
    <form action="{{route('familias.update',$familia)}}" method="post">
        @csrf
        @method('put')
            Cod: <input type="number" name='cod' value="{{$familia->cod}}"required="required" disabled/>
            Nombre: <input type="text" name='nombre' value="{{$familia->nombre}}" required="required"/><br>
            Descripción: <input type="text" name='descripcion' value="{{$familia->descripcion}}">
            <button type='submit' class="btn btn-warning" name="Actualizar">Actualizar</button>
    </form>

</div>

@endsection
