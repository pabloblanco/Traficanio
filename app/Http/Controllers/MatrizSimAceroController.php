<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrizSimAcero;
use DB;
class MatrizSimAceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        if ($type){
            $matrizes = [];
            $input = $request->all();
            $q0 = "";

            $q0 .= (empty($input['numerob']))? "" : " AND m.numero LIKE '%".$input['numerob']."%'";
            $q0 .= (empty($input['diametroNominalb']))? "" : "  AND m.diametroNominal LIKE '%".$input['diametroNominalb']."%'";
            $q0 .= (empty($input['entradab']))? "" : " AND m.entrada LIKE '%".$input['entradab']."%'";
            $q0 .= (empty($input['altZonaUtilb']))? "" : " AND m.altZonaUtil LIKE '%".$input['altZonaUtilb']."%'";
            $q0 .= (empty($input['diametroMatrizb']))? "" : " AND m.diametroMatriz LIKE '%".$input['diametroMatrizb']."%'";
            $q0 .= (empty($input['angb']))? "" : " AND m.ang ='".$input['angb']."'";
            $q0 .= (empty($input['altoMatrizb']))? "" : " AND m.altoMatriz LIKE '%".$input['altoMatrizb']."%'";
            $q0 .= (empty($input['observacionesb']))? "" : " AND m.observaciones LIKE '%".$input['observacionesb']."%'";
            $sql = 'SELECT '.
                   'm.numero as Numero,  m.diametroNominal as DiametroNominal, m.ang as Ang, m.entrada as Entrada, '.
                   'm.altZonaUtil as AltZonaUtil, m.diametroMatriz as DiametroMatriz, m.altoMatriz as AltoMatriz, '.
                   'm.observaciones as Observaciones, '.
                   'm.id FROM matrizsimacero m WHERE 1=1 '.$q0.' order by m.id asc ;';
            
            $results = DB::select($sql);

            foreach ($results as $result) {
                $matrizes[] = (object)['numero'=> $result->Numero, 'diametroNominal'=> $result->DiametroNominal, 'ang'=> $result->Ang, 'entrada'=> $result->Entrada, 'altZonaUtil'=> $result->AltZonaUtil, 'diametroMatriz'=> $result->DiametroMatriz, 'altoMatriz'=> $result->AltoMatriz, 'observaciones'=> $result->Observaciones, 'id'=>$result->id];
            }

        }
        else{
            $matrizes = MatrizSimAcero::all();
            
        }
        return view('matrizsimacero.index', compact('matrizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('matrizsimacero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatrizSimAcero::create([
            'numero' => $request->get('numero'),
            'diametroNominal' => $request->get('diametroNominal'),
            'ang' => $request->get('ang'),
            'entrada' => $request->get('entrada'),
            'altZonaUtil' => $request->get('altZonaUtil'),
            'diametroMatriz' => $request->get('diametroMatriz'),
            'altoMatriz' => $request->get('altoMatriz'),
            'observaciones' => $request->get('observaciones')
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
        $matriz = MatrizSimAcero::find($id);
        return $matriz;
        //return view('matrizsimacero.show', compact('matriz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matriz = MatrizSimAcero::find($id);
        //return view('matrizsimacero.edit', compact('matriz'));
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
        $matriz = MatrizSimAcero::find($id);
        $matriz->numero = $request->get('numero');
        $matriz->diametroNominal = $request->get('diametroNominal');
        $matriz->ang = $request->get('ang');
        $matriz->entrada = $request->get('entrada');
        $matriz->altZonaUtil = $request->get('altZonaUtil');
        $matriz->diametroMatriz = $request->get('diametroMatriz');
        $matriz->altoMatriz = $request->get('altoMatriz');
        $matriz->observaciones = $request->get('observaciones');
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
        $matriz = MatrizSimAcero::find($id);
        $matriz->delete();
        return "true";
    }
}
