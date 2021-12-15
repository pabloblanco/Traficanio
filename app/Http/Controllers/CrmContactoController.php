<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrmContacto;
use App\Cliente;


class CrmContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $contactos = CrmContacto::all();
        //return view('crmcontacto.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        //return view('crmcontacto.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CrmContacto::create([
            'tipoContactoid' => $request->get('tipoContactoid'),
            'descripcion' => $request->get('descripcion'),
            'fecha' => $request->get('fecha'),
            'clienteid' => $request->get('clienteid'),
            'userid' => $request->get('userid'),
            'titulo' => $request->get('titulo')
        ]);

        return back()->with('success', 'Matriz Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = CrmContacto::find($id);
        //return view('crmcontacto.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = CrmContacto::find($id);
        //return view('crmcontacto.edit', compact('contacto'));
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
        $contacto = CrmContacto::find($id);
        $contacto->tipoContactoid = $request->get('tipoContactoid');
        $contacto->descripcion = $request->get('descripcion');
        $contacto->fecha = $request->get('fecha');
        $contacto->clienteid = $request->get('clienteid');
        $contacto->userid = $request->get('userid');
        $contacto->titulo = $request->get('titulo');
        return redirect('crmcontactos')->with('success', 'MAtriz Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = CrmContacto::find($id);
        $contacto->delete();
        return "true";
    }
}
