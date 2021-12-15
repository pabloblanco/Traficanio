<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CabezaTurco;
use DB;

class CabezaTurcoController extends Controller
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

            $cabezas = [];

            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['numerob']))? "" : " AND c.numero LIKE '%".$input['numerob']."%'";
            $q0 .= (empty($input['medidaentradab']))? "" : " AND c.diametroEntrada LIKE '%".$input['medidaentradab']."%'";
            $q0 .= (empty($input['medidarodillob']))? "" : " AND c.medidaRodillo LIKE '%".$input['medidarodillob']."%'";

            $sql = 'SELECT '.
                   'c.numero as Numero,  c.diametroEntrada as DiametroEntrada, c.medidaRodillo as MedidaRodillo, '.
                   'c.id FROM cabezaturco c WHERE 1=1 '.$q0.' order by c.id asc ;';

            $results = DB::select($sql);
            foreach ($results as $result) {
                $cabezas[] = (object)['numero' => $result->Numero, 'diametroEntrada'=> $result->DiametroEntrada, 'medidaRodillo'=> $result->MedidaRodillo, 'id'=>$result->id];
            }
        }
        else {
            $cabezas = CabezaTurco::all();        
        }
        return view('cabezaturco.index', compact('cabezas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('cabeza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CabezaTurco::create([
            'numero' => $request->get('numero'),
            'diametroEntrada' => $request->get('diametroEntrada'),
            'medidaRodillo' => $request->get('medidaRodillo')
        ]);

        return back()->with('success', 'CabezaTurco Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabeza = CabezaTurco::find($id);
        return $cabeza;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabeza = CabezaTurco::find($id);
        //return view('cabeza.edit', compact('cabeza'));
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
        $cabeza = CabezaTurco::find($id_objetc);
        $cabeza->numero = $request->get('numero');
        $cabeza->diametroEntrada = $request->get('diametroEntrada');
        $cabeza->medidaRodillo = $request->get('medidaRodillo');
        $cabeza->save();
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
        $cabeza = CabezaTurco::find($id);
        $cabeza->delete();
        return "true";
    }
}
