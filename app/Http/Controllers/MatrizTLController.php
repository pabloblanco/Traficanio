<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrizTL;
use DB;

class MatrizTLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposmatrizes = DB::table('tipomatriz')->get();
        $punzones = DB::table('tipopunzon')->get();
        $type = $request->get('type');
        if ($type){
            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['diametroExteriorb']))? "" : " AND m.diametroExterior LIKE '%".$input['diametroExteriorb']."%'";
            $q0 .= (empty($input['tipomatrizidb']))? "" : " AND m.tipoMatriz='".$input['tipomatrizidb']."'";
            $q0 .= (empty($input['tipopunzonidb']))? "" : " AND m.punzonid='".$input['tipopunzonidb']."'";

            $sql = 'SELECT '.
                   'm.diametroExterior as DiametroExterior,  p.descripcion as DescripcionPunzon, '.
                   't.descripcion as DescripcionMatriz, m.id FROM matriztl m '.
                   'LEFT JOIN tipopunzon p ON (p.id = m.punzonid) '.
                   'LEFT JOIN tipomatriz t ON (t.id = m.tipoMatriz) '.
                   'WHERE 1=1 '.$q0.' order by m.id asc ;';

            $results = DB::select($sql);

            foreach ($results as $result) {
                $arraymatriz[] = (object)['diametro' => $result->DiametroExterior, 'tipomatriz'=> $result->DescripcionMatriz, 'punzon'=> $result->DescripcionPunzon, 'id'=>$result->id];
            }
            
        }
        else {
            $arraymatriz = [];
            $matrizes = MatrizTL::all();
            foreach ($matrizes as $matriz) {
                $punzon = DB::table('tipopunzon')->where('id', '=', $matriz->punzonid)->first();
                if ($punzon == null)
                    $punzon_id = "";
                else
                    $punzon_id = $punzon->descripcion;
                $tipomatriz = DB::table('tipomatriz')->where('id', '=', $matriz->tipoMatriz)->first();
                if ($tipomatriz == null)
                    $matriz_id = "";
                else
                    $matriz_id = $tipomatriz->descripcion;
                $arraymatriz[] = (object)['diametro'=> $matriz->diametroExterior, 'tipomatriz'=> $matriz_id, 'punzon'=> $punzon_id, 'id'=> $matriz->id];
            }            
        }
        return view('matriztl.index', compact('punzones', 'tiposmatrizes', 'arraymatriz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('matriztl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatrizTL::create([
            'diametroExterior' => $request->get('diametroExterior'),
            'tipoMatriz' => $request->get('tipoMatriz'),
            'punzonid' => $request->get('punzonid')
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
        $matriz = MatrizTL::find($id);
        return $matriz;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matriz = MatrizTL::find($id);
        //return view('matriztl.edit', compact('matriz'));
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
        $matriz = MatrizTL::find($id);
        $matriz->diametroExterior = $request->get('diametroExterior');
        $matriz->tipoMatriz = $request->get('tipoMatriz');
        $matriz->punzonid = $request->get('punzonid');
        $matriz->save();
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
        $matriz = MatrizTL::find($id);
        $matriz->delete();
        return "true";
    }
}
