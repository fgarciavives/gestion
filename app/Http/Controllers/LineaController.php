<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\Linea;
use App\Models\Cliente;

class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $linea = new Linea;
        $linea->descripcion=$request->descripcion;
        $linea->cantidad=$request->cantidad;
        $linea->precio=$request->precio;
        $linea->factura_numero=$request->factura_numero;
        $linea->producto_id=$request->producto_id;
        $linea->save();

        $productos=Producto::all();
        return view('facturas.factura',['factura'=>Factura::find($request->factura_numero),'productos'=>$productos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $linea = Linea::find($id);
        $productos=Producto::all();
        return view('facturas.edit',['factura'=>Factura::find($request->factura_numero),'productos'=>$productos,'linea'=>$linea] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $linea = Linea::find($id);
        $linea->descripcion=$request->descripcion;
        $linea->cantidad=$request->cantidad;
        $linea->precio=$request->precio;
        $linea->update();

        $productos=Producto::all();
        return view('facturas.factura',['factura'=>Factura::find($request->factura_numero),'productos'=>$productos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $linea = Linea::find($id);
        $linea->delete();
        $productos=Producto::all();
        return view('facturas.factura',['factura'=>Factura::find($request->factura_numero),'productos'=>$productos]);
    }
}
