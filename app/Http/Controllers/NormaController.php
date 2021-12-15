<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Norma;

class NormaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $normas = Norma::all();
        return view('norma.index', compact('normas'));
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
        Norma::create([
            'descripcion' => $request->get('descripcion')
        ]);

        return back()->with('success', 'Norma Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $norma = Norma::find($id);
        return $norma;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $norma = Norma::find($id);
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
        $norma = Norma::find($id_objetc);
        $norma->descripcion = $request->get('descripcion');
        $norma->save();
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
        $norma = Norma::find($id);
        $norma->delete();
        return "true";
    }
}
