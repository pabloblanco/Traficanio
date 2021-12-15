<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrizMitchell;
use DB;
class MatrizMitchellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $arraymatriz = [];
        $tipomateriales = DB::table('tipomaterialpm')->get();
        if ($type){

            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['codigob']))? "" : " AND m.codigo LIKE '%".$input['codigob']."%'";
            $q0 .= (empty($input['diametroNominalb']))? "" : " AND m.diametroNominal LIKE '%".$input['diametroNominalb']."%'";
            $q0 .= (empty($input['tipomatrizidb']))? "" : " AND m.tipoMaterialid='".$input['tipomatrizidb']."'";

            $sql = 'SELECT '.
                   'm.codigo as Codigo,  m.diametroNominal as DiametroNominal, '.
                   't.descripcion as TipodeMaterial, m.id FROM matrizmitchell m '.
                   'LEFT JOIN tipomaterialpm t ON (t.id = m.tipoMaterialid) '.
                   'WHERE 1=1 '.$q0.' order by m.id asc ;';

            $results = DB::select($sql);

            foreach ($results as $result) {
                $arraymatriz[] = (object)['codigo' => $result->Codigo, 'diametroNominal'=> $result->DiametroNominal, 'tipo'=> $result->TipodeMaterial, 'id'=>$result->id];
            }
        }
        else{
            $matrizes = MatrizMitchell::all();
            foreach ($matrizes as $matriz) {
                $tipom = DB::table('tipomaterialpm')->where('id', '=', $matriz->tipoMaterialid)->first();
                if ($tipom == null){

                    $ti = "";
                }
                else {
                    $ti = $tipom->descripcion;
                }
                $arraymatriz[] = (object)['codigo'=> $matriz->codigo, 'diametroNominal'=> $matriz->diametroNominal, 'tipo'=>$ti, 'id'=>$matriz->id];
            }            
        }
        return view('matrizmitchell.index', compact('arraymatriz', 'tipomateriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('matrizmitchell.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatrizMitchell::create([
            'codigo' => $request->get('codigo'),
            'diametroNominal' => $request->get('diametroNominal'),
            'tipoMaterialid' => $request->get('tipoMaterialid')
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
        $matriz = MatrizMitchell::find($id);
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
        $matriz = MatrizMitchell::find($id);
        //return view('matrizmitchell.edit', compact('matriz'));
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
        $matriz = MatrizMitchell::find($id);
        $matriz->codigo = $request->get('codigo');
        $matriz->diametroNominal = $request->get('diametroNominal');
        $matriz->tipoMaterialid = $request->get('tipoMaterialid');
        $matriz->save();
        return  "true";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matriz = MatrizMitchell::find($id);
        $matriz->delete();
        return "true";
    }
}
