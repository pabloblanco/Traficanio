<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $type = $request->get('type');
        $normas = DB::table('normas')->get();
        $tipocostura = DB::table('tipocostura')->get();
        $tipoacero = DB::table('tipoacero')->get();
        $tratamiento = DB::table('tratamientotermico')->get();


        if ($type == 1){
            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['diamex']))? "" : " AND medidas.diametroExterior=".$input['diamex']."";
            $q0 .= (empty($input['espesor']))? "" : " AND medidas.espesorNominal=".$input['espesor']."";
            $q0 .= (empty($input['largomin']))? "" : " AND medidas.largoMinimo<=".$input['largomin']."";
            $q0 .= (empty($input['largomaxb']))? "" : " AND medidas.largoMaximo>=".$input['largomaxb']."";
            $q0 .= (empty($input['costuraidb']))? "" : " AND medidas.tipoCostura=".$input['costuraidb']."";
            $q0 .= (empty($input['aceroidb']))? "" : " AND medidas.tipoAceroSAE=".$input['aceroidb']."";
            $q0 .= (empty($input['tratamientob']))? "" : " AND medidas.tratamientoTermico=".$input['tratamientob']."";
            $q0 .= (empty($input['normab']))? "" : " AND medidas.normaid=".$input['normab']."";
            $q0 .= (empty($input['formaid']))? "" : " AND medidas.forma_id=".$input['formaid']."";
            $q0 .= (empty($input['rubroid']))? "" : " AND medidas.rubro_id=".$input['rubroid']."";

            /*$sql = 'SELECT '.
                   "medida as MEDIDA, id ".
                   "from medidas WHERE 1=1 $q0 ;";*/


            $sql = "
                    SELECT 
                    medidas.id,
                    medidas.diametroExterior,
                    medidas.espesorNominal
                    FROM medidas
                    LEFT JOIN normas on normas.descripcion = medidas.normaid
                    WHERE 1=1 $q0
                ";
            $res = DB::select($sql);

            if (count($res)>0){
                $array = [];
                foreach ($res as $key => $value) {
                    $array[]= [
                        'MEDIDA'=>$value->diametroExterior.' x '.$value->espesorNominal,
                        'id'=>$value->id
                    ];
                }
                return response()->json(['resultado'=>$array]);
            }
            return "false";

        }
        return view('medida.index', compact('normas', 'tipoacero', 'tipocostura', 'tratamiento'));
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
        
        $nombreMedida = $this->nombreMedida($request->all());

        $diamex = $request->get('diamex');
        $espesor = $request->get('espesor');
        $largomin = $request->get('largomin');
        $largomax = $request->get('largomax');
        $costuraida = $request->get('costuraida');
        $aceroida = $request->get('aceroida');
        $tratamientoa = $request->get('tratamientoa');
        $normaa = $request->get('normaa');

        $formaid = $request->get('formaid');
        $rubroid = $request->get('rubroid');
        $observacion = $request->get('observacion');

        $db = DB::table('medidas')->insert([
            'diametroExterior'=>$diamex,
            'espesorNominal'=>$espesor,
            'largoMaximo'=>$largomax,
            'largoMinimo'=>$largomin,
            'tipoCostura'=>$costuraida,
            'tipoAceroSAE'=>$aceroida,
            'tratamientoTermico'=>$tratamientoa,
            'normaid'=>$normaa,
            'activa'=>1,
            'medida'=>$nombreMedida,
            'forma_id'=>$formaid,
            'rubro_id'=>$rubroid
        ]);

        return back()->with('success', 'Agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = DB::table('medidas')->where('id', '=', $id)->first();
        if ($db){
            return response()->json($db);
        }
        return "false";
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
        $nombreMedida = $this->nombreMedida($request->all(), "u", "u");

        $diamex = $request->get('diamexu');
        $espesor = $request->get('espesoru');
        $largomin = $request->get('largominu');
        $largomax = $request->get('largomaxu');
        $costuraida = $request->get('costuraidu');
        $aceroida = $request->get('aceroidu');
        $tratamientoa = $request->get('tratamientou');
        $normaa = $request->get('normau');
        $observacion = $request->get('observacionu');

        $db = DB::table('medidas')->where('id', '=', $id)->update([
            'diametroExterior'=>$diamex,
            'espesorNominal'=>$espesor,
            'largoMaximo'=>$largomax,
            'largoMinimo'=>$largomin,
            'tipoCostura'=>$costuraida,
            'tipoAceroSAE'=>$aceroida,
            'tratamientoTermico'=>$tratamientoa,
            'normaid'=>$normaa,
            'activa'=>1,
            'medida'=>$nombreMedida
        ]);

        if ($db > 0){
            return "true";
        }
        return "false";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = DB::table('medidas')->where('id', '=', $id)->delete();
        return "true";
    }

    public function nombreMedida($data, $valor="a", $update=""){
      $norma = "";
      $acero = "";
      $costura = "";
      $tratat = "";

      if($data['norma'.$valor]>0)
        $norma = DB::table('normas')->where('id', '=', $data['norma'.$valor])->select('normas.descripcion')->first()->descripcion;

      if($data['aceroid'.$valor]>0)
        $acero = DB::table('tipoacero')->where('id', '=', $data['aceroid'.$valor])->select('tipoacero.descripcion')->first()->descripcion;

      if($data['costuraid'.$valor]>0)
        $costura = DB::table('tipocostura')->where('id', '=', $data['costuraid'.$valor])->select('tipocostura.descripcion')->first()->descripcion;

      if($data['tratamiento'.$valor]>0)
        $tratat = DB::table('tratamientotermico')->where('id', '=', $data['tratamiento'.$valor])->select('tratamientotermico.descripcion')->first()->descripcion;

      $largominmax = ($data["largomax".$update]==$data["largomin".$update])?$data["largomax".$update]:$data["largomin".$update]."/".$data["largomax".$update];

      $nombre = str_replace(".",",",$data['diamex'.$update])." x ".str_replace(".",",",$data["espesor".$update])." x ".$costura." ".$tratat." ".$acero." ".$norma;
      return $nombre;

    }
}
