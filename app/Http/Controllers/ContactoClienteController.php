<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactoCliente;
use App\Cliente;

class ContactoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = ContactoCliente::all();
        return view('crm.cliente', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        //return view('contactocliente.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ContactoCliente::create([
            'clienteid' => $request->get('clienteid'),
            'contacto' => $request->get('contacto'),
            'email' => $request->get('email'),
            'celular' => $request->get('celular')
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
        $contacto = ContactoCliente::find($id);
        //return view('contactocliente.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = ContactoCliente::find($id);
        //return view('contactocliente.edit', compact('contacto'));
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
        $contacto = ContactoCliente::find($id);
        $contacto->clienteid = $request->get('clienteid');
        $contacto->contacto = $request->get('contacto');
        $contacto->email = $request->get('email');
        $contacto->celular = $request->get('celular');
        return redirect('contactoclientes')->with('success', 'MAtriz Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = ContactoCliente::find($id);
        $contacto->delete();
        return "true";
    }
}
