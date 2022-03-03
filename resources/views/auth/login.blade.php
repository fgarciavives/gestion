@extends('layouts.auth')
@section('title','Iniciar Sesión')
@section('mensajeHeader','Inicia Sesión En La Aplicación')
@section('content')

<div class="cajonOpciones">

    @if ($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

    <form action='{{route('login.store')}}' method='post'>
        @csrf
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre de usuario: </label>
          <input type="text" class="form-control" name="name" placeholder="Introduce el nombre">
        </div>

        <div class="mb-3">
          <label for="nombre" class="form-label">Contraseña:</label>
          <input type="password" class="form-control" name="password" placeholder="Introduce la contraseña"/>
        </div>

        <button class="btn btn-danger" type="submit" name="guardar">Guardar</button>
        <a href="{{route('register.create')}}" type="button" class="btn btn-warning">Registrar</a>
    </form>
</div>

@endsection