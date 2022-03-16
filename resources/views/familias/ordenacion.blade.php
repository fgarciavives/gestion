<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Listar Familias')
    
@section('content')

<div class="cajonCrearFactura">
    @foreach ($familias as $familia)
        <?php var_dump($familia) ?>
    @endforeach
</div>
    

@endsection