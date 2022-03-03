@extends('layouts.auth')
@section('title','Register')
@section('mensajeHeader','Registrate en la Aplicación')
@section('content')

<div class="cajonOpciones">

    @if ($errors->any())
      <h4>{{$errors->first()}}</h4>
    @endif

    <form action='{{route('register.store')}}' method='post'> 
    @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombre de usuario:</label>
          <input type="text" class="form-control" name="nombre" placeholder="Introduce el nombre">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="Introduce el email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
          <input type="password" class="form-control" name="passUno" placeholder="Introduce la contraseña">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Repite Contraseña:</label>
          <input type="password" class="form-control" name="passDos" placeholder="Repite la contraseña">
        </div>
        <button type="submit" class="btn btn-danger">Registrar</button>
        <a href="{{route('login.create')}}" type="button" class="btn btn-warning">Ir Login</a>
      </form>
</div>

@endsection