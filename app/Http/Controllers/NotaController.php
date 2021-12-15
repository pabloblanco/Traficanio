<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\User;
use App\Cliente;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::all();
        return view('nota.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $users = User::all();
        return view('nota.create', compact('clientes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nota::create([
            'paraUserid' => $request->get('paraUserid'),
            'deUserid' => $request->get('deUserid'),
            'clienteid' => $request->get('clienteid'),
            'estadoid' => $request->get('estadoid'),
            'asunto' => $request->get('asunto'),
            'fecha' => $request->get('fecha'),
            'descripcion' => $request->get('descripcion')
        ]);

        return back()->with('success', 'Nota Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);
        return $nota;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::all();
        $users = User::all();
        $nota = Nota::find($id);
        //return view('nota.edit', compact('nota', 'clientes', 'users'));
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
        $nota = Nota::find($id);
        $nota->paraUserid = $request->get('paraUserid');
        $nota->clienteid = $request->get('clienteid');
        $nota->estadoid = $request->get('estadoid');
        $nota->asunto = $request->get('asunto');
        $nota->fecha = $request->get('fecha');
        $nota->descripcion = $request->get('descripcion');
        $nota->save();
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
        $nota = Nota::find($id);
        $nota->delete();
        return "true";
    }
}
