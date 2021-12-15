<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrizBronson;
use DB;

class MatrizBronsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tipomateriales = DB::table('tipomaterialpm')->get();
        $arraymatriz = [];
        $type = $request->get('type');
        if ($type){
            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['medidasmb']))? "" : " AND m.medidasPulgada LIKE '%".$input['medidasmb']."%'";
            $q0 .= (empty($input['medidaspb']))? "" : " AND m.medidaMilimetro LIKE '%".$input['medidaspb']."%'";
            $q0 .= (empty($input['diametrobb']))? "" : " AND m.diametroBoca LIKE '%".$input['diametrobb']."%'";
            $q0 .= (empty($input['materialidb']))? "" : " AND m.tipoMaterialid='".$input['materialidb']."'";

            $sql = 'SELECT '.
                   'm.medidasPulgada as MedidasPulgada,  m.medidaMilimetro as MedidasMilimetros, '.
                   'm.diametroBoca as DiametroBoca, t.descripcion as Descripcion, '.
                   'm.id FROM matrizbronson m '.
                   'LEFT JOIN tipomaterialpm t ON (t.id = m.tipoMaterialid) '.
                   'WHERE 1=1 '.$q0.' order by m.id asc ;';

            $results = DB::select($sql);
            foreach ($results as $result) {
                $arraymatriz[] = (object)['medidasp' => $result->MedidasPulgada, 'medidasm'=> $result->MedidasMilimetros, 'diametro'=> $result->DiametroBoca, 'tipo'=> $result->Descripcion, 'id'=>$result->id];
            }
        }
        else{
            $matrizes = MatrizBronson::all();
            foreach ($matrizes as $matriz) {
                $tipom = DB::table('tipomaterialpm')->where('id', '=', $matriz->tipoMaterialid)->first();
                if ($tipom == null){
                    $ti = "";
                }
                else {
                    $ti = $tipom->descripcion;
                }
                $arraymatriz[] = (object)['medidasp'=> $matriz->medidasPulgada, 'medidasm'=> $matriz->medidaMilimetro, 'diametro'=> $matriz->diametroBoca, 'tipo'=> $ti, 'id'=>$matriz->id];
            }            
        }
        return view('matrizbronson.index', compact('arraymatriz', 'tipomateriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matrizbronson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatrizBronson::create([
            'medidasPulgada' => $request->get('medidasPulgada'),
            'medidaMilimetro' => $request->get('medidaMilimetro'),
            'diametroBoca' => $request->get('diametroBoca'),
            'tipoMaterialid' => $request->get('tipoMaterialid'),
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
        $matriz = MatrizBronson::find($id);
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
        $matriz = MatrizBronson::find($id);
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
        $matriz = MatrizBronson::find($id);
        $matriz->medidasPulgada = $request->get('medidasPulgada');
        $matriz->medidaMilimetro = $request->get('medidaMilimetro');
        $matriz->diametroBoca = $request->get('diametroBoca');
        $matriz->tipoMaterialid = $request->get('tipoMaterialid');
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
        $matriz = MatrizBronson::find($id);
        $matriz->delete();
        return "true";
    }
}
