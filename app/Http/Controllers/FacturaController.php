<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Producto;
use Exception;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas=Factura::paginate(10);
        return view('facturas.lista',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('facturas.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $factura = new Factura;
            $factura->numero=$request->numero;
            $factura->fecha=$request->fecha;
            $factura->nombre=$request->nombre;
            $factura->direccion=$request->direccion;
            $factura->poblacion=$request->poblacion;
            $factura->provincia=$request->provincia;
            $factura->cpostal=$request->cpostal;
            $factura->telefono=$request->telefono;
            $factura->iva=$request->iva;
            $factura->cliente_id=$request->cliente_id;
            $factura->save();
            return redirect()->route('facturas.edit',$request->numero);
        }catch(Exception $exc){
            return back()->withErrors([
                'message' => 'Complete todos los campos'
            ]);
        }
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
    public function edit($num)
    {
        $factura=Factura::find($num);
        $cliente = Cliente::select('*')->where('id','=', $factura->cliente_id)->get();
        $productos=Producto::all();
        return view('facturas.factura',['factura'=>$factura,'productos'=>$productos, 'cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $num)
    {
        $factura = Factura::find($num);
        $factura->fecha=$request->fecha;
        $factura->nombre=$request->nombre;
        $factura->direccion=$request->direccion;
        $factura->poblacion=$request->poblacion;
        $factura->provincia=$request->provincia;
        $factura->cpostal=$request->cpostal;
        $factura->telefono=$request->telefono;
        $factura->iva=$request->iva;
        $factura->update();

        $productos=Producto::all();
        return view('facturas.factura',['factura'=>$factura,'productos'=>$productos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
