@extends('layouts.app')
@section('title','Facturar')
    
@section('content')

<div class="facturaDatos">
    <form action="" method="post">
        @csrf
            Número: <input type="number" name='numero' size=6 value="{{$factura->numero}}" disabled/>
            Fecha: <input type="date" name='fecha' value="{{$factura->fecha}}"/><br>
            Nombre: <input type="text" name='nombre' size="50" value="{{$factura->nombre}}"/><br>
            Dirección: <input type="text" name='direccion' size="50" value="{{$factura->direccion}}"/><br>
            Población: <input type="text" name='poblacion' value="{{$factura->poblacion}}"/>
            Provincia: <input type="text" name='provincia' value="{{$factura->provincia}}"/>
            C. Postal: <input type="text" name='cpostal' size=5 value="{{$factura->cpostal}}"/><br>
            Teléfono: <input type='text' name='telefono' value="{{$factura->telefono}}"/>
            <button type='submit' class="btn btn-warning" name="Actualizar">Actualizar</button>
    </form>
</div>
<br>
<br>
<div class="facturaProducto">
    <form action="{{route('lineas.update',$linea->id)}}" method="post">
        @csrf
        @method('put')
        <input type="hidden" name='factura_numero' size="50" value="{{$factura->numero}}"/>
            Producto: <select name='producto_id' id='producto_id'>
                <option value="0" selected>Elige un producto</option>
                @foreach ($productos as $producto)
                    <option value="{{$producto->id}}">{{$producto->descripcion}}</option>
                @endforeach
                </select><br>
            Descripción: <input type="text" name='descripcion' id="descripcion" value="{{$linea->descripcion}}"/>
            Cantidad: <input type="text" name='cantidad' id="cantidad" value="{{$linea->cantidad}}"/>
            Precio: <input type="text" name='precio' id="precio" value="{{$linea->precio}}"/>
        <button type='submit' class="btn btn-warning" name="Actualizar">Actualizar</button>
        <br>
    </form>
</div>

<br>
<br>

<div class="facturaTabla">
    <table border="1" class="table">
        <thead class="table-dark">
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Importe</td>
            <td>Operaciones</td>
        </thead>

    @foreach ($factura->lineas as $linea)
    <tr><td>{{$linea->descripcion}}</td>
        <td>{{$linea->cantidad}}</td>
        <td>{{$linea->precio}}</td>
        <td>{{$linea->cantidad*$linea->precio}}</td>
        <td>
            <form action="{{route('lineas.edit',$linea->id)}}" method="get">
                <button type="submit" class="btn btn-warning">Editar</button>
            </form>
            <form action="{{route('lineas.destroy',$linea)}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach

    </table>
</div>

@endsection
@section('scripts')
    <script>


    

$(document).ready(function(){
		
	$("#producto_id").change(function(){
 

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	
        var id=$("select[name=producto_id]").val();
        if (id!=0){
        $.ajax({
            url: '{{route('ajax.producto')}}',
            method:'post',
            data:{'id':id},
            success:function(data){
                var datos=JSON.parse(data);
                $("#precio").val(datos.precio);
                $("#descripcion").val(datos.descripcion);
                
            }
        });

        }else{
            alert("Producto no seleccionado");
        }
            
        });
    });
    </script>

@endsection