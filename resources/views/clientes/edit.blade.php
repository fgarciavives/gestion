<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Editar Factura')
    
@section('content')

<div class="cajonCrearFactura">

    <form action="{{route('clientes.update',$cliente->id)}}" method="post">
        @csrf
        @method('put')
            NIF: <input type="texto" name='nif' value="{{$cliente->nif}}" required="required"/>
            Direccion: <input type="text" name='direccion' value="{{$cliente->direccion}}" required="required"/><br>
            Nombre: <input type="text" name='nombre' size="50" value="{{$cliente->nombre}}" required="required"/><br>
            Dirección: <input type="text" name='direccion' size="50" value="{{$cliente->direccion}}" required="required"/><br>
            Población: <input type="text" name='poblacion' value="{{$cliente->poblacion}}" required="required"/>
            Provincia: <input type="text" name='provincia' value="{{$cliente->provincia}}" required="required"/>
            C. Postal: <input type="text" name='cpostal' size="5" value="{{$cliente->cpostal}}" required="required"/><br>
            Email: <input type="email" name="email" value="{{$cliente->email}}" required="required">
            Teléfono: <input type='text' name='telefono' value="{{$cliente->telefono}}" required="required"/>
            <button type='submit' class="btn btn-warning" name="Actualizar">Actualizar</button>
    </form>

</div>

@endsection