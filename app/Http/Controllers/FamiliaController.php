<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familia;
use App\Models\Producto;
use Exception;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familias = Familia::paginate(10);
        return view('familias.listar',compact('familias'));
    }

    // public function ordenacion()
    // {
    //     $familias = Familia::select('*')->where('nombre','=','error')->get();
    //     return view('familias.ordenacion',compact('familias'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $familia = new Familia();
            $familia->cod=$request->cod;
            $familia->nombre=$request->nombre;
            $familia->descripcion=$request->descripcion;
            $familia->save();

            return redirect()->route('familias.index');
        }catch(Exception $e){
            return back()->withErrors([
                'message' => 'Por favor inserte otro código.'
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
        $familia = Familia::find($id);
        $familias = Familia::select('*')->where('nombre','=',$familia->nombre)->get();
        $productos = Producto::select('*')->where('familia_id','=',$familia->id)->get();
        return view('familias.show', ["familia"=>$familia, "familias"=>$familias, "productos" => $productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familia = Familia::find($id);
        return view ('familias.edit', compact('familia'));
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
        $familia = Familia::find($id);
        $familia->nombre=$request->nombre;
        $familia->descripcion=$request->descripcion;
        $familia->update();
        return redirect()->route('familias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $familia = Familia::find($id);
        $familia->delete();
        return redirect()->route("familias.index");
    }

}
