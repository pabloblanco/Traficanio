<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFabricacion;

class EstadoFabricacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricacions = EstadoFabricacion::all();
        return view('fabricacion.index', compact('fabricacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('norma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EstadoFabricacion::create([
            'descripcion' => $request->get('descripcion'),
            'detalle' => $request->get('detalle')
        ]);

        return back()->with('success', 'EstadoFabricacion Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fabricacion = EstadoFabricacion::find($id);
        return $fabricacion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$norma = EstadoFabricacion::find($id);
        //return view('norma.edit', compact('norma'));
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
        $id_objetc = (int)$id;
        $fabricacion = EstadoFabricacion::find($id_objetc);
        $fabricacion->descripcion = $request->get('descripcion');
        $fabricacion->detalle = $request->get('detalle');
        $fabricacion->save();
        return "true";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fabricacion = EstadoFabricacion::find($id);
        $fabricacion->delete();
        return "true";
    }
}
