<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Linea;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::paginate(5);
        return view('clientes.listar',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Cliente();
        $clientes->nif=$request->nif;
        $clientes->direccion=$request->direccion;
        $clientes->nombre=$request->nombre;
        $clientes->direccion=$request->direccion;
        $clientes->poblacion=$request->poblacion;
        $clientes->provincia=$request->provincia;
        $clientes->cpostal=$request->cpostal;
        $clientes->email=$request->email;
        $clientes->telefono=$request->telefono;
        $clientes->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        //$facturas = Factura::select('*')->where('cliente_id','=', $cliente->id)->get();

        return view('clientes.show', ["cliente"=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view ('clientes.edit', compact('cliente'));
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
        $clientes = Cliente::find($id);
        $clientes->nif=$request->nif;
        $clientes->direccion=$request->direccion;
        $clientes->nombre=$request->nombre;
        $clientes->direccion=$request->direccion;
        $clientes->poblacion=$request->poblacion;
        $clientes->provincia=$request->provincia;
        $clientes->cpostal=$request->cpostal;
        $clientes->email=$request->email;
        $clientes->telefono=$request->telefono;
        $clientes->update();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente)
    {
        $cliente = Cliente::find($cliente);
        $cliente->delete();
        return redirect()->route("clientes.index");
    }
}
