<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = DB::table('proveedores')->get();
        $tipoaceros = DB::table('tipoacero')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $normas = DB::table('normas')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $medidas = DB::table('medidas')->get();
        return view('stock.egreso', compact('proveedores', 'tipoaceros', 'tipocosturas', 'normas', 'tratamientos', 'medidas'));
    }


    public function searchCambio(Request $request)
    {


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function actualizarEgreso(Request $request)
    {

        $fecha    = $request->get('fecha');
        $medida   = $request->get('medida');
        $orden    = $request->get('orden');
        $observaciones = $request->get('observaciones');
        $tipo     = $request->get('tipo');
        $paquetes = json_decode($request->get('paquetes'), true);

        //dd($observaciones);

        $id_documento = DB::table('entregamateriaprima')->insertGetId([
                'ordenProduccion' => $orden,
                'fecha' => $fecha,
                'observaciones' => $observaciones
        ]);


        $movid = ($tipo=="AJUSTE")? 3:2;
        $ope   = ($tipo=="AJUSTE")? "+":"-";

        foreach($paquetes as $paquete)
        {
            $sql = "UPDATE stockmateriaprima   SET cantidad=cantidad$ope".$paquete['cantidad']." WHERE paqueteid=".$paquete['id']." ";
            DB::update($sql);
            $sql = "INSERT INTO movimientostock(paqueteid, medidaid, tipoMovimiento, fecha, cantidad, estadoid, documentoReferencia)  VALUES(".$paquete['id'].", ".$paquete['medida'].", ".$movid.", '".$fecha."', ".$paquete['cantidad'].", ".$paquete['estado'].", ".$id_documento." )";
            DB::insert($sql);
        }

        return "true";
    }

/*

    function procesarEgresoStockMp($action){
        global $db;
        $array_paq = array();
        $array_paq = $_REQUEST["paquete"];
    if (is_array($array_paq)){
        $fecha_mov = fechamysql($_REQUEST["fecha"]);
        $medida = $_REQUEST['medelegida'];
        $ar_datos = array("",$_REQUEST["orden"],$fecha_mov,$_REQUEST["observaciones"]);
        $db->setQuery("INSERT into entregaMateriaPrima VALUES (?,?,?,?)",$ar_datos);

        $ex_emp = $db->execute();

        $id_docentrega = $db->insertid();

        //***********************
         //* EN PRINCIPIO SE GENERA UN REGISTRO DE MOVIMIENTO POR CADA PAQUETE;
         //* SINO GENERAR TABLA PAQUETESXMOVIMIENTO CREANDO UNICO REGISTRO DEL MOVIMIENTO CON LOS PAQUETES ASOCIADOS
        // * EN EL CASO DE INGRESO O AJUSTE SERA 1 a 1.
        // *
        $movid = ($action=='A')?3:2;
        $ope = ($action=='A')?"+":"-";

        foreach ($array_paq as $idspaq){
            if (is_numeric($_REQUEST["cantpq_".$idspaq])){
                $db->setQuery("UPDATE stockMateriaPrima   SET cantidad=cantidad$ope".$_REQUEST["cantpq_".$idspaq]." WHERE paqueteid=$idspaq ", false );
                $eje = $db->execute();
                $array_tipoM = array("",$idspaq,$medida,$movid,$fecha_mov,$_REQUEST["cantpq_".$idspaq],$_REQUEST['estado_'.$idspaq],$id_docentrega);
                $db->setQuery("INSERT INTO movimientoStock  VALUES
                        (?,?,?,?,?,?,?,?)", $array_tipoM );
                    
                $ejex = $db->execute();

            }
        }

    }
    else
    return false;

    return true;

}
    */

    public function buscaregreso(Request $request)
    {
        $q0 = "";
        $input = $request->all();



        if($input['tipobusqueda']=="M"){
            $q0 = " p.medidaid=".$input['identificador']."";
        }

        if($input['tipobusqueda']=="NT"){
            $q0 = " p.numeroTrazabilidad='".$input['identificador']."'";
        }

        if($input['tipobusqueda']=="P"){
            $q0 = " p.proveedorid=".$input['identificador']."";
        }
        


        $sql = "SELECT p.*,pr.razon as prove,smp.cantidad,emp.descripcion as esta,m.medida
                                from stockmateriaprima smp
                                INNER JOIN paquetes p ON (p.id = smp.paqueteid)
                                LEFT JOIN medidas m ON (m.id = p.medidaid)
                                LEFT JOIN estadomateriaprima emp ON (emp.id = p.estadoid)
                                LEFT JOIN proveedores pr ON (pr.id = p.proveedorid)
                                where smp.cantidad>0 and $q0 ";
        $results = DB::select($sql);

        return response()->json(['resultado'=>$results]);

    }

    public function buscarajuste(Request $request)
    {
        $q0  = "";

        $input = $request->all();
        dd($input);

    }

}




