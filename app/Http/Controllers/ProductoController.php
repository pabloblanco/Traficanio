<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $normas = DB::table('normas')->get();
        $formas = DB::table('formas')->get();
        $tiposaceros = DB::table('tipoacero')->get();
        $tipocostura = DB::table('tipocostura')->get();
        $estados = DB::table('estadofabricacion')->get();
        $rubros = DB::table('rubros')->get();

        if ($request->get('modal')){
            $obj = (object) ['normas'=>$normas, 'formas'=>$formas, 'ta'=>$tiposaceros, 'tc'=>$tipocostura, 'est'=>$estados, 'rb'=>$rubros];
            
            return response()->json(['resultados'=>$obj]);
        }

        return view('producto.producto', compact('rubros', 'normas', 'formas', 'tiposaceros', 'tipocostura', 'estados'));
    }

    public function buscarproducto(Request $request)
    {

        $q0  = "";

        $input = $request->all();

        $q0 .= (empty($input['diamex']))? "" : " AND medidas.diametroExterior=".$input['diamex']."";
        $q0 .= (empty($input['tolmasdiamex']))? "" : " AND medidas.tolmasdiamex=".$input['tolmasdiamex']."";
        $q0 .= (empty($input['tolmenosdiamex']))? "" : " AND medidas.tolmenosdiamex=".$input['tolmenosdiamex']."";
        $q0 .= (empty($input['espesor']))? "" : " AND medidas.espesorNominal=".$input['espesor']."";
        $q0 .= (empty($input['tolmasespesor']))? "" : " AND medidas.tolmasespesor=".$input['tolmasespesor']."";
        $q0 .= (empty($input['tolmenosespesor']))? "" : " AND medidas.tolmenosespesor=".$input['tolmenosespesor']."";
        $q0 .= (empty($input['diamein']))? "" : " AND medidas.diamein=".$input['diamein']."";
        $q0 .= (empty($input['tolmasdiamein']))? "" : " AND medidas.tolmasdiamein=".$input['tolmasdiamein']."";
        $q0 .= (empty($input['tolmenosdiamein']))? "" : " AND medidas.tolmenosdiamein=".$input['tolmenosdiamein']."";
        $q0 .= (empty($input['sae']))? "" : " AND medidas.tipoAceroSAE=".$input['sae']."";
        $q0 .= (empty($input['tcost']))? "" : " AND medidas.tipoCostura=".$input['tcost']."";
        $q0 .= (empty($input['estfabricacion']))? "" : " AND medidas.tratamientoTermico=".$input['estfabricacion']."";
        $q0 .= (empty($input['normaid']))? "" : " AND medidas.normaid=".$input['normaid']."";
        $q0 .= (empty($input['formaid']))? "" : " AND medidas.forma_id=".$input['formaid']."";



        $sql = 'SELECT '.
               "medidas.*, normas.descripcion as normades, formas.descripcion as formades, tipocostura.descripcion as tcost, ".
               "tipoacero.descripcion as sae, estadofabricacion.descripcion as tt ".
               "from medidas ".
               "LEFT JOIN normas ON (normas.id = medidas.normaid) ".
               "LEFT JOIN formas ON (formas.id = medidas.forma_id) ".
               "LEFT JOIN tipocostura ON (tipocostura.id = medidas.tipoCostura) ".
               "LEFT JOIN tipoacero ON (tipoacero.id = medidas.tipoAceroSAE) ".
               "LEFT JOIN estadofabricacion ON (estadofabricacion.id = medidas.tratamientoTermico) ".
               "WHERE 1=1 $q0 GROUP BY medidas.id order by medidas.id desc ; ";


        $results = DB::select($sql);
        
        if (count($results)>0){
            return response()->json($results);
        }
        else {
            return "false";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $diamex = str_replace(',', '.', $request->get('diamex'));
        $diamexfloat = (float) $diamex; 

        $diamein = str_replace(',', '.', $request->get('diamein'));
        $diameinfloat = (float) $diamein; 

        $espesor = str_replace(',', '.', $request->get('espesor'));
        $espesorfloat = (float) $espesor; 

        $db = DB::table('medidas')->insertGetId([
            'diametroExterior' => $diamexfloat,
            'tolmasdiamex' => str_replace(',', '.', $request->get('tolmasdiamex')),
            'tolmenosdiamex' => str_replace(',', '.', $request->get('tolmenosdiamex')),
            'espesorNominal' => $espesorfloat,
            'tolmasespesor' => str_replace(',', '.', $request->get('tolmasespesor')),
            'tolmenosespesor' => str_replace(',', '.', $request->get('tolmenosespesor')),
            'diamein' => $diameinfloat,
            'tolmasdiamein' => str_replace(',', '.', $request->get('tolmasdiamein')),
            'tolmenosdiamein' => str_replace(',', '.', $request->get('tolmenosdiamein')),
            'tipoAceroSAE' => $request->get('sae'),
            'tipoCostura' => $request->get('tcost'),
            'tratamientoTermico' => $request->get('estfabricacion'),
            'normaid' => $request->get('normaid'),
            'forma_id' => $request->get('formaid'),
            'activa' => $request->get('estado'),
            //ADICIONALES//
            'rubro_id' => $request->get('rubroid'),
            'largoMaximo' => $request->get('largomax'),
            'largoMinimo' => $request->get('largomin'),
            'medida' => $nombreMedida,
            'observaciones' => $request->get('obs'),

        ]);

        if ($db > 0){
            if ($request->get('modal')){
                if ($request->get('data') == 1) {
                    $producto = DB::table('medidas')->where('id', '=', $db)->first();
                    $text = 'Diametro Ext:'.$producto->diametroExterior.', Diametro Int:'.$producto->diamein.', Espesor:'.$producto->espesorNominal;
                    return response()->json(['resultado'=>$producto, 'text'=>$text]);                 
                }
                return "true";
            }
            return "true";
        }
        else{
            return "false";
        }
    }

    public function nombreMedida($data){

      $norma = "";
      $acero = "";
      $costura = "";
      $tratat = "";

      if($data['normaid']>0)
        $norma = DB::table('normas')->where('id', '=', $data['normaid'])->select('normas.descripcion')->first()->descripcion;

      if($data['sae']>0)
        $acero = DB::table('tipoacero')->where('id', '=', $data['sae'])->select('tipoacero.descripcion')->first()->descripcion;

      if($data['tcost']>0)
        $costura = DB::table('tipocostura')->where('id', '=', $data['tcost'])->select('tipocostura.descripcion')->first()->descripcion;

      if($data['estfabricacion']>0)
        $tratat = DB::table('estadofabricacion')->where('id', '=', $data['estfabricacion'])->select('estadofabricacion.descripcion')->first()->descripcion;

      //$largominmax = ($data["largomaximo"]==$data["largominimo"])?$data["largomaximo"]:$data["largominimo"]."/".$data["largomaximo"];

      $nombre = str_replace(".",",",$data['diamex'])." x ".str_replace(".",",",$data["espesor"])." x ".$costura." ".$tratat." ".$acero." ".$norma;

      return $nombre;

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
        $db = DB::table('medidas')->where('id', '=', $id)->update([
            'diametroExterior' => $request->get('diamex'),
            'tolmasdiamex' => $request->get('tolmasdiamex'),
            'tolmenosdiamex' => $request->get('tolmenosdiamex'),
            'espesorNominal' => $request->get('espesor'),
            'tolmasespesor' => $request->get('tolmasespesor'),
            'tolmenosespesor' => $request->get('tolmenosespesor'),
            'diamein' => $request->get('diamein'),
            'tolmasdiamein' => $request->get('tolmasdiamein'),
            'tolmenosdiamein' => $request->get('tolmenosdiamein'),
            'tipoAceroSAE' => $request->get('sae'),
            'tipoCostura' => $request->get('tcost'),
            'tratamientoTermico' => $request->get('estfabricacion'),
            'normaid' => $request->get('normaid'),
            'forma_id' => $request->get('formaid'),
            'activa' => $request->get('estado'),
            //ADICIONALES//
            'rubro_id' => $request->get('rubroid'),
            'largoMaximo' => $request->get('largomax'),
            'largoMinimo' => $request->get('largomin'),
            'medida' => $request->get('medida'),
            'observaciones' => $request->get('obs')
        ]);

        $dbMedida = DB::table('medidascotizadas')->where('producto_id', '=', $id)->update([
            'costuraid'=> $request->get('tcost'),
            'normaid'=> $request->get('normaid')
        ]);


        $dbCotizacion = DB::table('cotizaciones')->join('medidascotizadas', 'cotizaciones.medidaid', '=', 'medidascotizadas.id')->where('medidascotizadas.producto_id', '=', $id)->select('cotizaciones.*')->update([
                'formaid'=>$request->get('formaid'),
                'tipoAcero'=>$request->get('sae'),
                'tratamientoTermico'=>$request->get('estfabricacion'),
            ]);

        if ($db == 1){
            return "true";
        }
        else{
            return "false";
        }
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
}
