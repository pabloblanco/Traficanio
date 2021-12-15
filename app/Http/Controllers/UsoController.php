<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usos = DB::table('usofinal')->orderBy('id', 'DESC')->get();
        return view('uso.index', compact('usos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = DB::table('usofinal')->insert([
            'descripcion'=>$request->get('descripcion')
        ]);

        return back()->with('success', 'Uso Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = DB::table('usofinal')->where('id', '=', $id)->first();
        return response()->json($db);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $db = DB::table('usofinal')->where('id', '=', $id)->update([
            'descripcion'=>$request->get('descripcion')
        ]);
        
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
        $db = DB::table('usofinal')->where('id', '=', $id)->delete();
        return "true";
    }
}
