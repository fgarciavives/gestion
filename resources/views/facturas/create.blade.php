<link rel="stylesheet" href="{{asset('css/app.css')}}">
@extends('layouts.app')
@section('title','Crear Factura')
    
@section('content')

<div class="cajonCrearFactura">

    <form action="{{route('facturas.store')}}" method="post">
        @csrf
        @if ($errors->any())
      <h4>{{$errors->first()}}</h4>
    @endif <br>
        <br>
        Elige Cliente: 
            <select name="cliente_id" id="cliente_id">
                <option value="0" selected>Elige</option>
                @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                @endforeach
            </select>
            <br><br>
            Número: <input type="number" name='numero' size="6"/>
            Fecha: <input type="date" name='fecha'/><br>
            Nombre: <input type="text" name='nombre' id="nombre" size="50"/><br>
            Dirección: <input type="text" name='direccion' id="direccion" size="50"/><br>
            Población: <input type="text" name='poblacion' id="poblacion"/>
            Provincia: <input type="text" name='provincia' id="provincia"/>
            C. Postal: <input type="text" name='cpostal' size="5" id="cpostal"/><br>
            Teléfono: <input type='text' name='telefono' id="telefono"/>
            Iva:
            <select name="iva">
                <option value="0">0%</option>
                <option value="4">4%</option>
                <option value="10">10%</option>
                <option value="21">21%</option>
            </select>
            
            <button type='submit' class="btn btn-warning" name="Insertar">Insertar</button>
    </form>
</div>
@endsection
@section('scripts')
    <script>
$(document).ready(function(){
		
	$("#cliente_id").change(function(){
 

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	
        var id=$("select[name=cliente_id]").val();
        if (id!=0){
        $.ajax({
            url: '{{route('ajax.cliente')}}',
            method:'post',
            data:{'id':id},
            success:function(data){
                var datos=JSON.parse(data);
                $("#nombre").val(datos.nombre);
                $("#direccion").val(datos.direccion);
                $("#telefono").val(datos.telefono);
                $("#poblacion").val(datos.poblacion);
                $("#provincia").val(datos.provincia);
                $("#cpostal").val(datos.cpostal);
                
            }
        });

        }else{
            alert("Producto no seleccionado");
        }


            
        });
    });
    </script>

@endsection