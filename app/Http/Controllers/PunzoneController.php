<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Punzone;
use DB;
class PunzoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
        $arraypunzon = [];
        $tipos = DB::table('tipopunzon')->get();
        $tipomateriales = DB::table('tipomaterialpm')->get();
        $type = $request->get('type');
        if ($type){
            $input = $request->all();
            $arraypunzon = [];
            $q0 = "";
            $q0 .= (empty($input['diametrob']))? "" : " AND p.diametro LIKE '%".$input['diametrob']."%'";
            $q0 .= (empty($input['roscab']))? "" : " AND p.rosca LIKE '%".$input['roscab']."%'";
            $q0 .= (empty($input['espesorb']))? "" : " AND p.espesor LIKE '%".$input['espesorb']."%'";
            $q0 .= (empty($input['observacionesb']))? "" : " AND p.observaciones LIKE '%".$input['observacionesb']."%'";
            $q0 .= (empty($input['tipoMaterialidb']))? "" : " AND p.tipoMaterialid='".$input['tipoMaterialidb']."'";
            $q0 .= (empty($input['tipoPunzonidb']))? "" : " AND p.tipoPunzonid='".$input['tipoPunzonidb']."'";

            $sql = 'SELECT '.
                   'p.diametro as Diametro, p.rosca as Rosca, p.espesor as Espesor, '.
                   'p.observaciones as Observaciones, t.descripcion as DescripcionPunzon, '.
                   'm.descripcion as DescripcionMaterial, '.
                   'p.id FROM punzones p '.
                   'LEFT JOIN tipopunzon t ON (t.id = p.tipoPunzonid) '.
                   'LEFT JOIN tipomaterialpm m ON (m.id = p.tipoMaterialid) '.
                   'WHERE 1=1 '.$q0.' order by p.id desc ;';

            $results = DB::select($sql);
            foreach ($results as $result) {
                $arraypunzon[] = (object)['diametro' => $result->Diametro, 'rosca'=> $result->Rosca, 'espesor'=> $result->Espesor, 'observaciones' => $result->Observaciones, 'tipopunzon' => $result->DescripcionPunzon, 'tipomaterial' => $result->DescripcionMaterial, 'id'=>$result->id];
            }

        }
        else {
            $punzones = Punzone::all();
            foreach ($punzones as $punzon) {
                $tipop = DB::table('tipopunzon')->where('id', '=', $punzon->tipoPunzonid)->first();
                if ($tipop == null)
                    $tipopde = "";
                else
                    $tipopde = $tipop->descripcion;
                $tipom = DB::table('tipomaterialpm')->where('id', '=', $punzon->tipoMaterialid)->first();
                if ($tipom == null)
                    $tipomde = "";
                else
                    $tipomde = $tipom->descripcion;
                $arraypunzon[] = (object)['diametro' => $punzon->diametro, 'rosca' => $punzon->rosca, 'espesor' => $punzon->espesor, 'tipopunzon' => $tipopde , 'tipomaterial'=>$tipomde, 'observaciones' => $punzon->observaciones, 'id'=> $punzon->id];
            }            
        }
        return view('punzone.index', compact('punzones', 'tipos', 'tipomateriales', 'arraypunzon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('punzone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Punzone::create([
            'diametro' => $request->get('diametro'),
            'rosca' => $request->get('rosca'),
            'espesor' => $request->get('espesor'),
            'observaciones' => $request->get('observaciones'),
            'tipoMaterialid' => $request->get('tipoMaterialid'),
            'tipoPunzonid' => $request->get('tipoPunzonid')
        ]);

        return back()->with('success', 'Punzon Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $punzon = Punzone::find($id);
        return $punzon;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $punzon = Punzone::find($id);
        //return view('punzone.edit', compact('punzon'));
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
        $punzon = Punzone::find($id);
        $punzon->diametro = $request->get('diametro');
        $punzon->rosca = $request->get('rosca');
        $punzon->espesor = $request->get('espesor');
        $punzon->tipoMaterialid = $request->get('tipoMaterialid');
        $punzon->observaciones = $request->get('observaciones');
        $punzon->tipoPunzonid = $request->get('tipoPunzonid');
        $punzon->save();
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
        $punzon = Punzone::find($id);
        $punzon->delete();
        return "true";
    }
}
