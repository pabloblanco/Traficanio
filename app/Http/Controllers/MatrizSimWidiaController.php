<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrizSimWidia;
use DB;
class MatrizSimWidiaController extends Controller
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
            $q0 .= (empty($input['diametrob']))? "" : " AND m.diametro LIKE '%".$input['diametrob']."%'";
            $q0 .= (empty($input['angb']))? "" : " AND m.ang LIKE '%".$input['angb']."%'";
            $q0 .= (empty($input['diametroeb']))? "" : " AND m.de LIKE '%".$input['diametroeb']."%'";
            $q0 .= (empty($input['diametroNominalb']))? "" : " AND m.dn LIKE '%".$input['diametroNominalb']."%'";
            $q0 .= (empty($input['hnb']))? "" : " AND m.hn LIKE '%".$input['hnb']."%'";
            $q0 .= (empty($input['dcb']))? "" : " AND m.dc LIKE '%".$input['dcb']."%'";
            $q0 .= (empty($input['hcb']))? "" : " AND m.hc LIKE '%".$input['hcb']."%'";
            $q0 .= (empty($input['observacionesb']))? "" : " AND m.observaciones LIKE '%".$input['observacionesb']."%'";

            $sql = 'SELECT '.
                   'm.diametro as Diametro, m.ang as Ang,  m.de as DiametroExterior, '.
                   'm.dn as DiametroNominal, m.hn as HN, '.
                   'm.dc as DC, m.hc as HC, m.observaciones as Observaciones, '.
                   'm.id FROM matrizsimwidia m '.
                   'WHERE 1=1 '.$q0.' order by m.id asc ;';

            $results = DB::select($sql);

            foreach ($results as $result) {
                $matrizes[] = (object)['diametro'=> $result->Diametro, 'ang'=> $result->Ang, 'de'=> $result->DiametroExterior, 'dn'=> $result->DiametroNominal, 'hn'=> $result->HN, 'dc'=> $result->DC, 'hc'=> $result->HC, 'observaciones'=> $result->Observaciones, 'id'=>$result->id];
            }

        }
        else{
            $matrizes = MatrizSimWidia::all();
            
        }
        return view('matrizsimwidia.index', compact('matrizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('matrizsimwidia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatrizSimWidia::create([
            'diametro' => $request->get('diametro'),
            'ang' => $request->get('ang'),
            'de' => $request->get('de'),
            'dn' => $request->get('dn'),
            'hn' => $request->get('hn'),
            'dc' => $request->get('dc'),
            'hc' => $request->get('hc'),
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
        $matriz = MatrizSimWidia::find($id);
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
        $id_object = (int) $id;
        $matriz = MatrizSimWidia::find($id_object);
        $matriz->diametro = $request->get('diametro');
        $matriz->ang = $request->get('ang');
        $matriz->de = $request->get('de');
        $matriz->dn = $request->get('dn');
        $matriz->hn = $request->get('hn');
        $matriz->dc = $request->get('dc');
        $matriz->hc = $request->get('hc');
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
        $matriz = MatrizSimWidia::find($id);
        $matriz->delete();
        return "true";
    }
}
