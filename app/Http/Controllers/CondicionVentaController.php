<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CondicionVenta;

class CondicionVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $condiciones = CondicionVenta::all();
        return view('condicionventa.index', compact('condiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('condicionventa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CondicionVenta::create([
            'descripcion' => $request->get('descripcion')
        ]);

        return back()->with('success', 'CondicionVenta Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $condicion = CondicionVenta::find($id);
        return $condicion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condicion = CondicionVenta::find($id);
        //return view('condicionventa.edit', compact('condicion'));
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
        $id_object = (int) $id;
        $condicion = CondicionVenta::find($id_object);
        $condicion->descripcion = $request->get('descripcion');
        $condicion->save();
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
        $condicion = CondicionVenta::find($id);
        $condicion->delete();
        return "true";
    }
}
