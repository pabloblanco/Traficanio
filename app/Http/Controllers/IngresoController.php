<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $proveedores = DB::table('proveedores')->get();
        $medidas = DB::table('medidas')->get();
        $valorcambio = DB::table('valorcambio')->orderBy('id', '=', "DESC")->first();
        $monedas = DB::table('monedas')->get();
        $estados_materias = DB::table('estadomateriaprima')->get();
        $formas = DB::table('formas')->get();
        $rubros = DB::table('rubros')->get();
        $tipoaceros = DB::table('tipoacero')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $normas = DB::table('normas')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $tipoensayos = DB::table('tipoensayo')->get();

        $fechaMovimiento = Carbon::now()->toDateString();

        $db = DB::select("SELECT id,fecha,cambio from valorcambio where fecha='".date('Y-m-d')."'");
        $dolarhoy = 1;

        if(count($db)>0){
            $datexp = $db[0];
            $dolarhoy = $datexp->cambio;
        }
        else{
            $datexp = "error";

        }

        $ensayos = DB::table('tipoensayo')->get();


        return view('stock.ingreso', compact('proveedores', 'medidas', 'valorcambio', 'monedas', 'estados_materias', 'formas', 'rubros', 'tipocosturas', 'tipoaceros', 'normas', 'tratamientos', 'tipoensayos', 'fechaMovimiento', 'datexp', 'dolarhoy', 'ensayos'));
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

    public function addingreso(Request $request)
    {
        //recepcionmateriaprima
        //paquetes
        //movimientostock
        //stockmateriaprima
        //controlcalidad
        //historicopreciop
        //preciompxproveedor

        //dd($request);

        $fech_movimiento = $request->get('fecha');
        list($dia, $mes, $anio) = explode("/", $fech_movimiento);
        $fechaR           = $anio[0].$anio[1].$anio[2].$anio[3]."-".$mes."-".$dia;
        $proveedorid      = $request->get('proveedor_id');
        $numeroRemito     = $request->get('nro_remito');
        $fechaMovimiento  = $fechaR;
        $numeroOrden      = $request->get('numeroOrden');
        $cantidadPaquetes = $request->get('cantidad_paquetes');
        $kilogramos       = $request->get('cantidad_kilos');
        $forma            =  $request->get('forma_id');
        $rubro            = $request->get('rubro_id');
        $estado_materia   = $request->get('estadomateria_id');
        $precio_mp        =  $request->get('preciomp');
        $medida_id        = $request->get('medida_id');
        $tipo_moneda      = $request->get('tipomoneda_id');


        //dd($fechaR);

        //dd($anio);

        $insert_recepcion_materia = DB::table('recepcionmateriaprima')->insertGetId([
            'proveedorid' => $proveedorid,
            'numeroRemito' => $numeroRemito,
            'fechaMovimiento' => $fechaMovimiento,
            'numeroOrden' => $numeroOrden,
            'cantidadPaquetes' => $cantidadPaquetes,
            'kilogramos' => $kilogramos,
        ]);

        
        $paquetes = json_decode($request->get('paquetes'), true);
        $existeTrazabilidad = false;


        

        foreach($paquetes as $paquete)
        {
            $sql =  "SELECT COUNT(numeroTrazabilidad) as cantidad FROM paquetes  WHERE numeroTrazabilidad='".$paquete['nrotranzabilidad']."'";
            $resultado = DB::select($sql);

            if(($resultado[0]->cantidad)>0){
                return "Ya existe un Paquete con el Nro Trazabilidad: ".$paquete['nrotranzabilidad'].", Cambie el Nro para continuar";

            }
        }

       

        foreach($paquetes as $paquete)
        {

            $insert_paquete = DB::table('paquetes')->insertGetId([
                'pedidoid' => $insert_recepcion_materia,
                'medidaid' => $paquete['medida'],
                'numeroTrazabilidad' => $paquete['nrotranzabilidad'],
                'numeroTubos' => $paquete['nroTuboValor'],
                'ubicacion' => $paquete['ubicacionValor'],
                'estadoid' => $paquete['estado'],
                'rubroid' =>  $paquete['rubro'],
                'formaid' =>  $paquete['forma'],
                'proveedorid' => $proveedorid,
                'precioMP' => $precio_mp,
            ]);

            $insert_movimiento_stock = DB::table('movimientostock')->insertGetId([
                'paqueteid' => $insert_paquete,
                'medidaid' => $paquete['medida'],
                'tipoMovimiento' => 1,
                'fecha' => $fechaMovimiento,
                'cantidad' => $paquete['kilogramo'],
                'estadoid' => $paquete['estado'],
                'documentoReferencia' => $insert_recepcion_materia
            ]);

            $insert_stock_materia_prima = DB::table('stockmateriaprima')->insertGetId([
                'paqueteid' => $insert_paquete,
                'cantidad' =>  $kilogramos
            ]);

            //dd($paquete['paquetecalidad']);

            if(array_key_exists("paquetecalidad",$paquete)){
                $insert_control_calidad = DB::table('controlcalidad')->insertGetId([
                    'paqueteid' => $insert_paquete,
                    'diametroExteriorMinimo' => $paquete['paquetecalidad']['diametroExteriorMaximoCl'],
                    'diametroExteriorMaximo' => $paquete['paquetecalidad']['diametroExteriorMinimoCl'],
                    'espesorMinimo' => $paquete['paquetecalidad']['espesorMinimoCl'],
                    'espesorMaximo' => $paquete['paquetecalidad']['espesorMaximoCl'],
                    'largoMinimo' => $paquete['paquetecalidad']['largoMinimoCl'],
                    'largoMaximo' => $paquete['paquetecalidad']['largoMaximoCl'],
                    'espesorMinEc' => $paquete['paquetecalidad']['espesorMinimoCl'],
                    'espesorMaxEc' => $paquete['paquetecalidad']['espesorMaximoCl'],
                    'carbono' => $paquete['paquetecalidad']['porcentajeCarbonoCl'],
                    'manganeso' => $paquete['paquetecalidad']['porcentajeManganesoCl'],
                    'fosforo' => $paquete['paquetecalidad']['porcentajeFosforoCl'],
                    'azufre' => $paquete['paquetecalidad']['porcentajeAzufreCl'],
                    'silicio' => $paquete['paquetecalidad']['porcentajeSilicioCl'],
                    'tipoEnsayo' => $paquete['paquetecalidad']['tipoensayocl'],
                    'abocardado' => $paquete['paquetecalidad']['abocardadocl'],
                    'durezaTubo' => $paquete['paquetecalidad']['durezaTuboCl'],
                    'durezaCostura' => $paquete['paquetecalidad']['durezaCosturaCl'],
                    'cargaRoturamin' => $paquete['paquetecalidad']['cargaRoturaMinimaCl'],
                    'cargaRoturamax' => $paquete['paquetecalidad']['cargaRoturaMaximaCl'],
                    'resistenciaFluenciamin' => $paquete['paquetecalidad']['ResistenciaFluenciaMinimaCl'],
                    'resistenciaFluenciamax' => $paquete['paquetecalidad']['ResistenciaFluenciaMaximaCl'],
                    'numeroColada' => $paquete['paquetecalidad']['nroColadaCl'],
                    'numeroCertificado' => $paquete['paquetecalidad']['nroCertificadoCl'],
                    'estencilado' => $paquete['paquetecalidad']['estenciladoCl'],
                    'leyendaEstencilado' => $paquete['paquetecalidad']['leyendaEstanciladoCl'],
                    'biselado' => $paquete['paquetecalidad']['biseladoCl'],
                    'aplastado' => $paquete['paquetecalidad']['aplastadoCl'],
                    'alargamientoMin' => $paquete['paquetecalidad']['alargamientoMinimoCl'],
                    'alargamientoMax' => $paquete['paquetecalidad']['alargamientoMaximoCl'],
                    'observaciones' => $paquete['paquetecalidad']['observacionesCl']
                ]);

            }
        
        }


        if ($precio_mp > 0){

            $insert_historico_precio = DB::table('historicopreciop')->insertGetId([
                'precio' => $precio_mp,
                'porcentaje' => 0,
                'medidaid' => $medida_id,
                'proveedorid' => $proveedorid
            ]);

            $insert_preciomp_proveedor = DB::table('preciompxproveedor')->insertGetId([
                'medidaid' => $medida_id,
                'proveedorid' => $proveedorid,
                'precio' => $precio_mp,
                'precioActual' => $precio_mp,
                'tipoMoneda' => $tipo_moneda
            ]);
        }

        return "true";

    }
}
