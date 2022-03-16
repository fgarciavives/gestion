<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Crear Familia')
    
@section('content')

<div class="cajonCrearFactura">
    @if ($errors->any())
      <h4>{{$errors->first()}}</h4>
    @endif
    <form action="{{route('familias.store')}}" method="post">
        @csrf
            Cod: <input type="number" name='cod' required="required"/>
            Nombre: <input type="text" name='nombre' required="required"/><br>
            Descripción: <input type="text" name='descripcion' required="required"/><br>
            <button type='submit' class="btn btn-warning" name="Insertar">Insertar</button>
    </form>

</div>

@endsection