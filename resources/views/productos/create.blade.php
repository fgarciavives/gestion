<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Crear Producto')
    
@section('content')

<div class="cajonCrearFactura">
    
    <form action="{{route('productos.store')}}" method="post">
       
        
            Descripción: <input type="texto" name='descripcion' required="required"/>
            Precio: <input type="number" name='precio' required="required"/><br>
            <button type='submit' class="btn btn-warning" name="Insertar">Insertar</button>
    </form>

</div>

@endsection