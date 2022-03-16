<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Crear Producto')
    
@section('content')

<div class="cajonCrearFactura">
    
    <form action="{{route('productos.update',$producto)}}" method="post">
        @csrf
        @method('put')
            Descripción: <input type="texto" name='descripcion' value="{{$producto->descripcion}}"required="required"/>
            Precio: <input type="number" name='precio' value="{{$producto->precio}}" required="required"/><br>
            <button type='submit' class="btn btn-warning" name="Actualizar">Actualizar</button>
    </form>

</div>

@endsection