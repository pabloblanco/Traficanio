<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class CostoController extends Controller
{
    public function coCentro(Request $request)
    {
        // $type = $request->get('type');
        // if ($type){
        //     dd($type);
        //     $fecha = $request->get('fecha');
        //     if ($fecha){
        //     list($mes, $anio) = explode('/', $fecha);
        //     $fecha = $anio."-".$mes;
        //     }

        // }
        // else {

        // }
        $coeficiente_last = DB::table('coeficientes')->orderBy('id', 'DESC')->first();
        return view('costo.cocentro', compact('coeficiente_last'));
    }

    public function addcoeficiente(Request $request)
    {
        $hoy = Carbon::now();
        $fecha = $hoy->toDateTimeString();

        //dd($request->all());
        DB::table('coeficientes')->insert(
            ['fechaCreacion' => $fecha, 'coeficienteTransporte' => $request->get('coeficienteTransporte'), 'coeficienteHorno' => $request->get('coeficienteHorno'), 'coeficienteBatea' => $request->get('coeficienteBatea'), 'coeficienteTP' => $request->get('coeficienteTP'), 'coeficienteEnderezado' => $request->get('coeficienteEnderezado'), 'coeficienteCorte' => $request->get('coeficienteCorte')]
        );
        return back()->with('success', 'Coeficiente Agregado');
    }

    public function buscar_coeficiente(Request $request)
    {
        $fecha = '01/'.$request->get('fecha');

        if ($fecha){
            list($dia, $mes, $anio) = explode('/', $fecha);
            $fecha = $anio."-".$mes."-".$dia;
        }

        $coeficiente = DB::table('coeficientes')->whereDate('fechaCreacion', '=', $fecha)->get();

        dd($coeficiente);
    }

    public function costoCentro()
    {

        return view('costo.costocentro');
    }

    public function addcostoporcentro(Request $request)
    {
        //Variavbles Request//
        $fecha = $request->get('fecha');
        $Operhora = $request->get('Operhora');
        $GasCantidad = $request->get('GasCantidad');
        $GasMes = $request->get('GasMes');
        $Gasm3 = $request->get('Gasm3');
        $TransporteMes = $request->get('TransporteMes');
        $TransporteTonsMes = $request->get('TransporteTonsMes');
        $TransporteCoeficiente = $request->get('TransporteCoeficiente');
        $HornoCantOper = $request->get('HornoCantOper');
        $HornoHsTrabajadas = $request->get('HornoHsTrabajadas');
        $HornoCoeficiente = $request->get('HornoCoeficiente');
        $Hornom3ton = $request->get('Hornom3ton');
        $HornoTon = $request->get('HornoTon');
        $HornotonsMOD = $request->get('HornotonsMOD');
        $BateaCantOper = $request->get('BateaCantOper');
        $BateaHsTrabajadas = $request->get('BateaHsTrabajadas');
        $BateaCoeficiente = $request->get('BateaCoeficiente');
        $BateaConsumos = $request->get('BateaConsumos');
        $Bateam3ton = $request->get('Bateam3ton');
        $BateaTon = $request->get('BateaTon');
        $TYPGastosvarios = $request->get('TYPGastosvarios');
        $TYPHsTrefila = $request->get('TYPHsTrefila');
        $TYPCoeficiente = $request->get('TYPCoeficiente');
        $TYPTonTrefila = $request->get('TYPTonTrefila');
        $TYPHsPunta = $request->get('TYPHsPunta');
        $TYPTonPunta = $request->get('TYPTonPunta');
        $EnderezadoHsEnderezado = $request->get('EnderezadoHsEnderezado');
        $EnderezadoTonEnderezado = $request->get('EnderezadoTonEnderezado');
        $EnderezadoCoeficiente = $request->get('EnderezadoCoeficiente');
        $CorteHsTrabajadas = $request->get('CorteHsTrabajadas');
        $CorteKGmts = $request->get('CorteKGmts');
        $CorteCantTubos = $request->get('CorteCantTubos');
        $CorteCoeficiente = $request->get('CorteCoeficiente');
        $ZincadorTonsMes = $request->get('ZincadorTonsMes');
        $Zincador = $request->get('Zincador');
        $ZincadorCoeficiente = $request->get('ZincadorCoeficiente');
        $PrecioCortador = $request->get('PrecioCortador');
        $ToneladasCortador = $request->get('ToneladasCortador');
        $CoeficienteCortador = $request->get('CoeficienteCortador');

        $id_costo = $request->get('id_costo');

        if ($id_costo == null){
            $CostoGeneral = DB::table('costosxmes')->insert([
                    'fecha' => $fecha,
                    'operaXhora' => $Operhora,
                    'gasXmes' => $GasCantidad,
                    'precioGasXmes' => $GasMes,
                    'precioGasXm3' => $Gasm3,
                    'precioTransporteXmes' => $TransporteMes,
                    'toneladasXmesTransporte' => $TransporteTonsMes,
                    'coeficienteTransporte' => $TransporteCoeficiente,
                    'cantidadOperariosHorno' => $HornoCantOper,
                    'horasTrabajadasHorno' => $HornoHsTrabajadas,
                    'coeficienteHorno' => $HornoCoeficiente,
                    'm3XtoneladaHorno' => $Hornom3ton,
                    'toneladasxMesHorno' => $HornoTon,
                    'precioToneladasHorno' => $HornotonsMOD,
                    'cantidadOperariosBatea' => $BateaCantOper,
                    'horasTrabajadasBatea' => $BateaHsTrabajadas,
                    'coeficienteBatea' => $BateaCoeficiente,
                    'consumosBatea' => $BateaConsumos,
                    'm3XtoneladaBatea' => $Bateam3ton,
                    'toneladasxMesBatea' => $BateaTon,
                    'gastosTP' => $TYPGastosvarios,
                    'horasTrabajadasTrefila' => $TYPHsTrefila,
                    'coeficienteTP' => $TYPCoeficiente,
                    'toneladasxMesTrefila' => $TYPTonTrefila,
                    'horasTrabajadasPunta' => $TYPHsPunta,
                    'toneladasxMesPunta' => $TYPTonPunta,
                    'horasTrabajadasEnderezado' => $EnderezadoHsEnderezado,
                    'toneladasXmesEnderezado' => $EnderezadoTonEnderezado,
                    'coeficienteEnderezado' => $EnderezadoCoeficiente,
                    'horasTrabajadasEddy' => null,
                    'toneladasXmesEddy' => null,
                    'coeficienteEddy' => null,
                    'horasTrabajadasCorte' => $CorteHsTrabajadas,
                    'kgmCorte' => $CorteKGmts,
                    'cantidadTubosCorte' => $CorteCantTubos,
                    'coeficienteCorte' => $CorteCoeficiente,
                    'toneladasXmesZincador' => $ZincadorTonsMes,
                    'precioZincadorXmes' => $Zincador,
                    'coeficienteZincador' => $ZincadorCoeficiente,
                    'toneladasXmesCortador' => $PrecioCortador,
                    'precioCortadorXmes' => $ToneladasCortador,
                    'coeficienteCortador' => $CoeficienteCortador,
                ]);

            return "true";

        }
        else{
            $CostoGeneral = DB::table('costosxmes')->where('id', '=', $id_costo)->update([
                    'fecha' => $fecha,
                    'operaXhora' => $Operhora,
                    'gasXmes' => $GasCantidad,
                    'precioGasXmes' => $GasMes,
                    'precioGasXm3' => $Gasm3,
                    'precioTransporteXmes' => $TransporteMes,
                    'toneladasXmesTransporte' => $TransporteTonsMes,
                    'coeficienteTransporte' => $TransporteCoeficiente,
                    'cantidadOperariosHorno' => $HornoCantOper,
                    'horasTrabajadasHorno' => $HornoHsTrabajadas,
                    'coeficienteHorno' => $HornoCoeficiente,
                    'm3XtoneladaHorno' => $Hornom3ton,
                    'toneladasxMesHorno' => $HornoTon,
                    'precioToneladasHorno' => $HornotonsMOD,
                    'cantidadOperariosBatea' => $BateaCantOper,
                    'horasTrabajadasBatea' => $BateaHsTrabajadas,
                    'coeficienteBatea' => $BateaCoeficiente,
                    'consumosBatea' => $BateaConsumos,
                    'm3XtoneladaBatea' => $Bateam3ton,
                    'toneladasxMesBatea' => $BateaTon,
                    'gastosTP' => $TYPGastosvarios,
                    'horasTrabajadasTrefila' => $TYPHsTrefila,
                    'coeficienteTP' => $TYPCoeficiente,
                    'toneladasxMesTrefila' => $TYPTonTrefila,
                    'horasTrabajadasPunta' => $TYPHsPunta,
                    'toneladasxMesPunta' => $TYPTonPunta,
                    'horasTrabajadasEnderezado' => $EnderezadoHsEnderezado,
                    'toneladasXmesEnderezado' => $EnderezadoTonEnderezado,
                    'coeficienteEnderezado' => $EnderezadoCoeficiente,
                    'horasTrabajadasEddy' => null,
                    'toneladasXmesEddy' => null,
                    'coeficienteEddy' => null,
                    'horasTrabajadasCorte' => $CorteHsTrabajadas,
                    'kgmCorte' => $CorteKGmts,
                    'cantidadTubosCorte' => $CorteCantTubos,
                    'coeficienteCorte' => $CorteCoeficiente,
                    'toneladasXmesZincador' => $ZincadorTonsMes,
                    'precioZincadorXmes' => $Zincador,
                    'coeficienteZincador' => $ZincadorCoeficiente,
                    'toneladasXmesCortador' => $PrecioCortador,
                    'precioCortadorXmes' => $ToneladasCortador,
                    'coeficienteCortador' => $CoeficienteCortador,
                ]);

                return "true";
        }


    }

    public function buscarcostoporcentro(Request $request)
    {
        $fecha = $request->get('fecha');

        $sql = 'SELECT '.
               'fecha as Fecha, operaXhora as Operhora, gasXmes as GasCantidad, precioGasXmes as GasMes, '.
               'precioGasXm3 as Gasm3, precioTransporteXmes as TransporteMes, '.
               'toneladasXmesTransporte as TransporteTonsMes, coeficienteTransporte as TransporteCoeficiente, '.
               'cantidadOperariosHorno as HornoCantOper, horasTrabajadasHorno as HornoHsTrabajadas, '.
               'm3XtoneladaHorno as Hornom3ton, toneladasxMesHorno as HornoTon, '.
               'precioToneladasHorno as HornotonsMOD, coeficienteHorno as HornoCoeficiente, '.
               'cantidadOperariosBatea as BateaCantOper, horasTrabajadasBatea as BateaHsTrabajadas, '.
               'm3XtoneladaBatea as Bateam3ton, toneladasxMesBatea as BateaTon, '.
               'consumosBatea as BateaConsumos, coeficienteBatea as BateaCoeficiente, '.
               'gastosTP as TYPGastosvarios, horasTrabajadasTrefila as TYPTonTrefila, '.
               'toneladasxMesTrefila as TYPHsTrefila, horasTrabajadasPunta as TYPHsPunta, '.
               'toneladasxMesPunta as TYPTonPunta, coeficienteTP as TYPCoeficiente, '.
               'horasTrabajadasEnderezado as EnderezadoHsEnderezado, '.
               'toneladasXmesEnderezado as EnderezadoTonEnderezado, '.
               'coeficienteEnderezado as EnderezadoCoeficiente, kgmCorte as CorteKGmts, '.
               'cantidadTubosCorte as CorteCantTubos, horasTrabajadasCorte as CorteHsTrabajadas, '.
               'coeficienteCorte as CorteCoeficiente, id FROM costosxmes '.
               'WHERE 1=1 and fecha='."'{$fecha}'".' order by substring(fecha,1,2) asc ;';

        $results = DB::select($sql);
        if ($results != []){
            return response()->json(['resultado'=>$results[0]]);
        }
        else{
            return Response("false");
        }

    }

    public function costoGeneral()
    {
        return view('costo.costogeneral');
    }

    public function buscarcostos(Request $request)
    {
        $fecha = $request->get('date');

        if ($fecha){
            list($mes, $anio) = explode('/', $fecha);
            $fecha = $mes."-".$anio;
        }
        $sql = "SELECT ".
               "fecha as Fecha, toneladasTotales as TTTermindas, toneladasReventa as TonsReventa, ".
               "toneladasMPT as TonsMPTraficano, toneladasPro as TonsProducidas, ".
               "gastosGenerales as GastosGeneralesTotal, gastosGeneralesReventa as GastosgeneralesReventa, ".
               "gastosGeneralesMPT as GastosgeneralesMPTraficano, ".
               "gastosGeneralesPro as GastosgeneralesProduccion, ".
               "gastoTotalesMO as GastosporManodeobratotales, gastoReventaMO as GastosporManodeobraReventa, ".
               "gastoMPTMO as GastosporManodeobraMPTraficano, gastoProMO as GastosporManodeobraProduccion, ".
               "id FROM costosGenerales ".
               "WHERE 1=1 and substring(fecha,4,7)=".$fecha." order by substring(fecha,1,2) asc ; ";

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results[0]]);
    }

    public function showcostoGeneral(Request $request)
    {
        $fecha = $request->get('date');
        if ($fecha){
            list($mes, $anio) = explode('/', $fecha);
            $fecha = $mes."-".$anio;
        }

        $coeficiente = DB::table('costosgenerales')->where('fecha', '=', $fecha)->first();
        if ($coeficiente)
            return json_encode($coeficiente);
        else
            return "false";
    }

    public function addcostoGeneral(Request $request)
    {
        $today = Carbon::now();
        $month = $today->month;
        $year = $today->year;
        if (strlen($month) < 2)
            $mes = "0" . $month;
        $id = $request->get('id_costo');
        $gastosGeneralesReventa = $request->get('gastosGeneralesReventa');
        $gastosGeneralesMPT = $request->get('gastosGeneralesMPT');
        $gastosGeneralesPro = $request->get('gastosGeneralesPro');
        $gastosGenerales = $request->get('gastosGenerales');
        $toneladasReventa = $request->get('toneladasReventa');
        $toneladasPro = $request->get('toneladasPro');
        $toneladasTotales = $request->get('toneladasTotales');
        $gastoTotalesMO = $request->get('gastoTotalesMO');
        $gastoReventaMO = $request->get('gastoReventaMO');
        $toneladasTotales = $request->get('toneladasTotales');
        $gastoProMO = $request->get('gastoProMO');
        $fecha = $request->get('fecha');


        if ($fecha == "0"){
            $fecha = $mes."-".$year;
        }

        if ($id != "0"){
            $coeficienteUpdate = DB::table('costosgenerales')->where('id', '=', $id)->update([
                    'gastosGeneralesReventa' => $gastosGeneralesReventa,
                    'gastosGeneralesMPT' => $gastosGeneralesMPT,
                    'gastosGeneralesPro' => $gastosGeneralesPro,
                    'gastosGenerales' => $gastosGenerales,
                    'toneladasReventa' => $toneladasReventa,
                    'toneladasPro' => $toneladasPro,
                    'toneladasTotales' => $toneladasTotales,
                    'gastoTotalesMO' => $gastoTotalesMO,
                    'gastoReventaMO' => $gastoReventaMO,
                    'toneladasTotales' => $toneladasTotales,
                    'gastoProMO' => $gastoProMO,
                    'fecha' => $fecha,
                ]);
        }
        else {
            $coeficienteCreate = DB::table('costosgenerales')->insert([
                'gastosGeneralesReventa' => $gastosGeneralesReventa,
                'gastosGeneralesMPT' => $gastosGeneralesMPT,
                'gastosGeneralesPro' => $gastosGeneralesPro,
                'gastosGenerales' => $gastosGenerales,
                'toneladasReventa' => $toneladasReventa,
                'toneladasPro' => $toneladasPro,
                'toneladasTotales' => $toneladasTotales,
                'gastoTotalesMO' => $gastoTotalesMO,
                'gastoReventaMO' => $gastoReventaMO,
                'toneladasTotales' => $toneladasTotales,
                'gastoProMO' => $gastoProMO,
                'fecha' => $fecha,

            ]);
        }
        return back()->with('success', 'Coeficiente Agregado');
    }
}
