<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Crear Factura')
    
@section('content')

<div class="cajonCrearFactura">

    <form action="{{route('clientes.store')}}" method="post">
        @csrf
            NIF: <input type="texto" name='nif' required="required"/>
            Direccion: <input type="text" name='direccion' required="required"/><br>
            Nombre: <input type="text" name='nombre' size="50" required="required"/><br>
            Dirección: <input type="text" name='direccion' size="50" required="required"/><br>
            Población: <input type="text" name='poblacion' required="required"/>
            Provincia: <input type="text" name='provincia' required="required"/>
            C. Postal: <input type="text" name='cpostal' size="5" required="required"/><br>
            Email: <input type="email" name="email" required="required">
            Teléfono: <input type='text' name='telefono' required="required"/>
            <button type='submit' class="btn btn-warning" name="Insertar">Insertar</button>
    </form>

</div>

@endsection