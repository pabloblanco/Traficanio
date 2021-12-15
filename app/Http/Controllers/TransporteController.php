<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;

class TransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportes = Transporte::all();
        //return view('transporte.index', compact('transportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('transporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transporte::create([
            'razon' => $request->get('razon'),
            'domicilio' => $request->get('domicilio'),
            'codigoPostal' => $request->get('codigoPostal'),
            'telefono1' => $request->get('telefono1'),
            'telefono2' => $request->get('telefono2'),
            'telefono3' => $request->get('telefono3'),
            'fax' => $request->get('fax'),
            'celular' => $request->get('celular'),
            'contacto' => $request->get('contacto'),
            'horarioRecepcion' => $request->get('horarioRecepcion'),
            'email' => $request->get('email'),
            'observaciones' => $request->get('observaciones')
        ]);

        return back()->with('success', 'Transporte Agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporte = Transporte::find($id);
        return response()->json($transporte);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transporte = Transporte::find($id);
        //return view('transporte.edit', compact('transporte'));
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
        $transporte = Transporte::find($id);
        $transporte->razon = $request->get('razon');
        $transporte->domicilio = $request->get('domicilio');
        $transporte->codigoPostal = $request->get('codigoPostal');
        $transporte->telefono1 = $request->get('telefono1');
        $transporte->telefono2 = $request->get('telefono2');
        $transporte->telefono3 = $request->get('telefono3');
        $transporte->fax = $request->get('fax');
        $transporte->celular = $request->get('celular');
        $transporte->contacto = $request->get('contacto');
        $transporte->horarioRecepcion = $request->get('horarioRecepcion');
        $transporte->email = $request->get('email');
        $transporte->observaciones = $request->get('observaciones');
        $transporte->save();

        //return redirect('transportes')->with('success', 'Transporte Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporte = Transporte::find($id);
        $transporte->delete();
        return "true";
    }
}
