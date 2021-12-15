<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use App\Seguimiento;
use DB;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimientos = Seguimiento::all();
        //return view('seguimiento.index', compact('seguimientos'));
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
        $prioridades = DB::table('prioridades')->get();
        //return view('nota.create', compact('clientes', 'users', 'prioridades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Seguimiento::create([
            'usuario_id' => $request->get('usuario_id'),
            'cliente_id' => $request->get('cliente_id'),
            'prioridad_id' => $request->get('prioridad_id'),
            'fecha_prometida' => $request->get('fecha_prometida'),
            'titulo' => $request->get('titulo'),
            'estado' => $request->get('estado'),
            'comentarios' => $request->get('comentarios'),
            'fecha_real' => $request->get('fecha_real')
        ]);

        return back()->with('success', 'Seguimiento Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguimiento = Seguimiento::find($id);
        //return view('seguimiento.show', compact('seguimiento'));
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
        $prioridades = DB::table('prioridades')->get();
        $seguimiento = Nota::find($id);
        //return view('seguimiento.edit', compact('seguimiento', 'clientes', 'users', 'prioridades'));
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
        $seguimiento = Seguimiento::find($id);
        $seguimiento->usuario_id = $request->get('usuario_id');
        $seguimiento->cliente_id = $request->get('cliente_id');
        $seguimiento->prioridad_id = $request->get('prioridad_id');
        $seguimiento->fecha_prometida = $request->get('fecha_prometida');
        $seguimiento->titulo = $request->get('titulo');
        $seguimiento->estado = $request->get('estado');
        $seguimiento->comentarios = $request->get('comentarios');
        $seguimiento->fecha_real = $request->get('fecha_real');
        $seguimiento->save();
        //return redirect('seguimientos')->with('success', 'seguimiento Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seguimiento = Seguimiento::find($id);
        $seguimiento->delete();
        return "true";
    }
}
