<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function report_despacho()
    {
        $estados = DB::table('estadodespachos')->get();
        $transportes = DB::table('transportes')->get();
     	return view('report.reporte_despacho', compact('estados', 'transportes'));
    }

    public function buscarreport_despacho(Request $request)
    {
        $input = $request->all();
        if ($request->get('desdeb')){
            $f1 = explode(" ", $request->get('desdeb'));
            list($mes, $dia, $anio) = explode('/', $f1[0]);
            $desde = $anio."-".$mes."-".$dia;


        }

        if ($request->get('hastab')){
            $f2 = explode(" ", $request->get('hastab'));
            list($mes, $dia, $anio) = explode('/', $f2[0]);
            $hasta = $anio."-".$mes."-".$dia;

        }
        $zonas = [];
        $q0 = "";
        $q0 .= (empty($input['desdeb']))? "" : " AND dxo.fechaEntrega>='".$desde."'";
        $q0 .= (empty($input['hastab']))? "" : " AND dxo.fechaEntrega<='".$hasta."'";
        $q0 .= (empty($input['clienteidb']))? "" : " AND c.razon LIKE '%".$input['clienteidb']."%'";
        $q0 .= (empty($input['estadoidb']))? "" : " AND dxo.estadoid=".$input['estadoidb']."";
        $q0 .= (empty($input['transporteidb']))? "" : " AND t.id=".$input['transporteidb']."";

        if($input['znorteb']=="true"){
              $zonas[] = 1;
        }
        if($input['zsurb']=="true"){
              $zonas[] = 2;
        }
        if($input['zoesteb']=="true"){
              $zonas[] = 3;
        }
        if($input['ztrafib']=="true"){
              $zonas[] = 4;
        }
        if($input['zfederalb']=="true"){
              $zonas[] = 5;
        }

        if($input['znorteb']=="true" OR $input['zsurb']=="true" OR $input['zoesteb']=="true" OR $input['ztrafib']=="true" OR $input['zfederalb']=="true"){
        $q0 .= ' AND c.zonaid IN('.implode(",",$zonas).')';
        }

        $sql = 'SELECT '.
               "dxo.id as NDespacho, c.razon as Cliente, dxo.fechaEntrega as FechadeEntrega, ".
               "z.descripcion as Zona, dxo.fechaCreacion as FechadeCreacion, ".
               "IF(dxo.reprocesar=1, 'SI', 'NO') as AReprocesar, ed.descripcion as Estado, ".
               "t.id, dxo.id FROM despachosxorden dxo ".
               "LEFT JOIN clientes c ON (c.id = dxo.clienteid) ".
               "LEFT JOIN estadodespachos ed ON (ed.id=dxo.estadoid) ".
               "LEFT JOIN zonas z ON (z.id=c.zonaid) ".
               "LEFT JOIN transportesclientes tc ON (tc.clienteid=c.id) ".
               "LEFT JOIN transportes t ON (t.id=tc.transporteid) ".
               "WHERE 1=1 $q0 GROUP BY dxo.id order by dxo.id desc ;";

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);



    }


    public function report_entrega_mes()
    {
        return view('report.reporte_entrega_mes');
    }

    public function add_report_entrega_mes(Request $request)
    {
        DB::table('repoventasxsemana')->insert(
            ['fecha' => $request->get('fecha'), 'estimada' => $request->get('estimada'), 'objetivoRv' => $request->get('objetivoRv')]
        );
        return back()->with('success', 'Report Agregado');

    }

    public function show_report_entrega_mes($id)
    {
        $report = DB::table('repoventasxsemana')->where('id', '=', $id)->first();

        if ($report)
            return json_encode($report);
        else
            return "false";

    }

    public function update_report_entrega_mes(Request $request, $id)
    {
        DB::table('repoventasxsemana')->where('id', '=', $id)->update(
            ['fecha' => $request->get('fecha'), 'estimada' => $request->get('estimada'), 'objetivoRv' => $request->get('objetivoRv')]
        );
        return "true";

    }

    public function cargarreport(Request $request)
    {
        //Tipo de reporte = 1 (Reporte de Produccion) //
         $input = $request->all();
         if ($input['type'] == "1"){
            $report = DB::table('reporteproduccion')->where('id', '=', $input['id'])->first();
            return response()->json($report);
            //dd($report);


         }
         else{
            $report = DB::table('reporteventas')->where('id', '=', $input['id'])->first();
            return response()->json($report);

         }
    }

    public function ejecutarreport(Request $request)
    {
        if ($request->get('insert') == "3"){


        }
        else if ($request->get('insert') == "2"){
            // INSERTA REPORTE //
            $input = $request->all();

            $sinprocesob = 0;
            $enplanificacionb = 0;
            $enproduccionb = 0;
            $pendientesb = 0;
            $facturab = 0;
            $terminadab = 0;
            $anuladab = 0;
            $despachadab = 0;
            $rechazadab = 0;
            $hornob = 0;
            $bateab = 0;
            $puntab = 0;
            $trefilab = 0;
            $corteb = 0;
            $currentb = 0;
            $pruebab = 0;
            $aplastadob = 0;
            $pestanadob = 0;
            $inactivob = 0;
            $activadob = 0;
            $enprocesob = 0;
            $finalizadob = 0;
            $autorizacionb = 0;

            if ($input['sinprocesob'] == "true")
                $sinprocesob = 1;

            if ($input['enplanificacionb'] == "true")
                $enplanificacionb = 1;

            if ($input['enproduccionb'] == "true")
                $enproduccionb = 1;

            if ($input['pendientesb'] == "true")
                $pendientesb = 1;

            if ($input['facturab'] == "true")
                $facturab = 1;

            if ($input['terminadab'] == "true")
                $terminadab = 1;

            if ($input['anuladab'] == "true")
                $anuladab = 1;

            if ($input['despachadab'] == "true")
                $despachadab = 1;

            if ($input['rechazadab'] == "true")
                $rechazadab = 1;

            if ($input['hornob'] == "true")
                $hornob = 1;

            if ($input['bateab'] == "true")
                $bateab = 1;

            if ($input['puntab'] == "true")
                $puntab = 1;

            if ($input['trefilab'] == "true")
                $trefilab = 1;

            if ($input['corteb'] == "true")
                $corteb = 1;

            if ($input['currentb'] == "true")
                $currentb = 1;

            if ($input['pruebab'] == "true")
                $pruebab = 1;

            if ($input['inactivob'] == "true")
                $inactivob = 1;

            if ($input['activadob'] == "true")
                $activadob = 1;

            if ($input['enprocesob'] == "true")
                $enprocesob = 1;

            if ($input['finalizadob'] == "true")
                $finalizadob = 1;

            if ($input['autorizacionb'] == "true")
                $autorizacionb = 1;

            if ($input['aplastadob'] == "true")
                $aplastadob = 1;

            if ($input['pestanadob'] == "true")
                $pestanadob = 1;

            $report = DB::table('reporteproduccion')->insert([
                'clienteb'=> $input['clienteidb'],
                'febdesde'=> $input['desdeb'],
                'febhasta'=> $input['hastab'],
                'fepdesde'=> $input['plantadesdeb'],
                'fephasta'=> $input['plantahastab'],
                'sinProceso'=> $sinprocesob,
                'enPlanificacion'=> $enplanificacionb,
                'enProduccion'=> $enproduccionb,
                'pendienteControl'=> $pendientesb,
                'facturada'=> $facturab,
                'terminada'=> $terminadab,
                'anulada'=> $anuladab,
                'despachada'=> $despachadab,
                'rechazada'=> $rechazadab,
                'diamextb'=> $input['diametroextdesdeb'],
                'diamintb'=> $input['diametrointdesdeb'],
                'espesorb'=> $input['espesordesdeb'],
                'largob'=> $input['largomaxb'],
                'largoMinb'=> $input['largominb'],
                'kildesde'=> $input['kilosdesdeb'],
                'kilhasta'=> $input['kiloshastab'],
                'tipoacerob'=> $input['tipoaceroidb'],
                'tipocosturab'=> $input['tipocosturaidb'],
                'tipotratb'=> $input['tratamientoidb'],
                'tiponormab'=> $input['normaidb'],
                'revenb'=> $input['tipoordenidb'],
                'usob'=> $input['usoidb'],
                'horno'=> $hornob,
                'batea'=> $bateab,
                'punta'=> $puntab,
                'trefila'=> $trefilab,
                'corte'=> $corteb,
                'eddyCurrent'=> $currentb,
                'pruebaH'=> $pruebab,
                'durezaMin'=> $input['durezaminb'],
                'durezaMax'=> $input['durezamaxb'],
                'certificado'=> $input['cerfiticadoidb'],
                'rugosidad'=> $input['rugosidadb'],
                'flecha'=> $input['flechab'],
                'pestañado'=> $pestanadob,
                'aplastado'=> $aplastadob,
                'descripcion'=> $input['nombrereporte'],
                'inactivo'=> $inactivob,
                'activado'=> $activadob,
                'enProceso'=> $enprocesob,
                'finalizado'=> $finalizadob,
                'pendiente'=> $autorizacionb,
            ]);

            if ($report == true)
                return response()->json(['resultado'=>"true", 'insert'=> '2']);
            else
                return response()->json(['resultado'=>"false", 'insert'=> '2']);
        }
        else{
            // ACTUALIZA REPORTE //
            $input = $request->all();
            $id = $input['id'];
            $sinprocesob = 0;
            $enplanificacionb = 0;
            $enproduccionb = 0;
            $pendientesb = 0;
            $facturab = 0;
            $terminadab = 0;
            $anuladab = 0;
            $despachadab = 0;
            $rechazadab = 0;
            $hornob = 0;
            $bateab = 0;
            $puntab = 0;
            $trefilab = 0;
            $corteb = 0;
            $currentb = 0;
            $pruebab = 0;
            $aplastadob = 0;
            $pestanadob = 0;
            $inactivob = 0;
            $activadob = 0;
            $enprocesob = 0;
            $finalizadob = 0;
            $autorizacionb = 0;

            if ($input['sinprocesob'] == "true")
                $sinprocesob = 1;

            if ($input['enplanificacionb'] == "true")
                $enplanificacionb = 1;

            if ($input['enproduccionb'] == "true")
                $enproduccionb = 1;

            if ($input['pendientesb'] == "true")
                $pendientesb = 1;

            if ($input['facturab'] == "true")
                $facturab = 1;

            if ($input['terminadab'] == "true")
                $terminadab = 1;

            if ($input['anuladab'] == "true")
                $anuladab = 1;

            if ($input['despachadab'] == "true")
                $despachadab = 1;

            if ($input['rechazadab'] == "true")
                $rechazadab = 1;

            if ($input['hornob'] == "true")
                $hornob = 1;

            if ($input['bateab'] == "true")
                $bateab = 1;

            if ($input['puntab'] == "true")
                $puntab = 1;

            if ($input['trefilab'] == "true")
                $trefilab = 1;

            if ($input['corteb'] == "true")
                $corteb = 1;

            if ($input['currentb'] == "true")
                $currentb = 1;

            if ($input['pruebab'] == "true")
                $pruebab = 1;

            if ($input['inactivob'] == "true")
                $inactivob = 1;

            if ($input['activadob'] == "true")
                $activadob = 1;

            if ($input['enprocesob'] == "true")
                $enprocesob = 1;

            if ($input['finalizadob'] == "true")
                $finalizadob = 1;

            if ($input['autorizacionb'] == "true")
                $autorizacionb = 1;

            if ($input['aplastadob'] == "true")
                $aplastadob = 1;

            if ($input['pestanadob'] == "true")
                $pestanadob = 1;

            $report = DB::table('reporteproduccion')->where('id', '=', $id)->update([
                'clienteb'=> $input['clienteidb'],
                'febdesde'=> $input['desdeb'],
                'febhasta'=> $input['hastab'],
                'fepdesde'=> $input['plantadesdeb'],
                'fephasta'=> $input['plantahastab'],
                'sinProceso'=> $sinprocesob,
                'enPlanificacion'=> $enplanificacionb,
                'enProduccion'=> $enproduccionb,
                'pendienteControl'=> $pendientesb,
                'facturada'=> $facturab,
                'terminada'=> $terminadab,
                'anulada'=> $anuladab,
                'despachada'=> $despachadab,
                'rechazada'=> $rechazadab,
                'diamextb'=> $input['diametroextdesdeb'],
                'diamintb'=> $input['diametrointdesdeb'],
                'espesorb'=> $input['espesordesdeb'],
                'largob'=> $input['largomaxb'],
                'largoMinb'=> $input['largominb'],
                'kildesde'=> $input['kilosdesdeb'],
                'kilhasta'=> $input['kiloshastab'],
                'tipoacerob'=> $input['tipoaceroidb'],
                'tipocosturab'=> $input['tipocosturaidb'],
                'tipotratb'=> $input['tratamientoidb'],
                'tiponormab'=> $input['normaidb'],
                'revenb'=> $input['tipoordenidb'],
                'usob'=> $input['usoidb'],
                'horno'=> $hornob,
                'batea'=> $bateab,
                'punta'=> $puntab,
                'trefila'=> $trefilab,
                'corte'=> $corteb,
                'eddyCurrent'=> $currentb,
                'pruebaH'=> $pruebab,
                'durezaMin'=> $input['durezaminb'],
                'durezaMax'=> $input['durezamaxb'],
                'certificado'=> $input['cerfiticadoidb'],
                'rugosidad'=> $input['rugosidadb'],
                'flecha'=> $input['flechab'],
                'pestañado'=> $pestanadob,
                'aplastado'=> $aplastadob,
                'descripcion'=> $input['nombrereporte'],
                'inactivo'=> $inactivob,
                'activado'=> $activadob,
                'enProceso'=> $enprocesob,
                'finalizado'=> $finalizadob,
                'pendiente'=> $autorizacionb,
            ]);

            // BUSCA REPORTE //
            $input = $request->all();
            $q0 = "";
            $estados = [];
            $procesos = [];
            $estadoProcesos = [];

            if ($request->get('desdeb')){
                $f1 = explode(" ", $request->get('desdeb'));
                list($mes, $dia, $anio) = explode('/', $f1[0]);
                $desde = $anio."-".$mes."-".$dia;


            }

            if ($request->get('hastab')){
                $f1 = explode(" ", $request->get('hastab'));
                list($mes, $dia, $anio) = explode('/', $f1[0]);
                $hasta = $anio."-".$mes."-".$dia;


            }

            if ($request->get('plantadesdeb')){
                $f1 = explode(" ", $request->get('plantadesdeb'));
                list($mes, $dia, $anio) = explode('/', $f1[0]);
                $plantadesde = $anio."-".$mes."-".$dia;


            }

            if ($request->get('plantahastab')){
                $f1 = explode(" ", $request->get('plantahastab'));
                list($mes, $dia, $anio) = explode('/', $f1[0]);
                $plantahasta = $anio."-".$mes."-".$dia;


            }

            $q0 .= (empty($input['clienteidb']))? "" : " AND c.id=".$input['clienteidb']."";
            $q0 .= (empty($input['codigob']))? "" : " AND p.codigoPieza LIKE '% ".$input['codigob']."%'";
            $q0 .= (empty($input['desdeb']))? "" : " AND p.fechaPrometida>='".$desde."'";
            $q0 .= (empty($input['hastab']))? "" : " AND p.fechaPrometida<='".$hasta."'";
            $q0 .= (empty($input['plantadesdeb']))? "" : " AND p.fechaPlanta>='".$plantadesde."'";
            $q0 .= (empty($input['plantahastab']))? "" : " AND p.fechaPlanta<='".$plantahasta."'";

            if($input['sinprocesob']=="true"){
                  $estados[] = 1;
            }
            if($input['enplanificacionb']=="true"){
                  $estados[] = 2;
            }
            if($input['enproduccionb']=="true"){
                  $estados[] = 3;
            }
            if($input['pendientesb']=="true"){
                  $estados[] = 4;
            }
            if($input['terminadab']=="true"){
                  $estados[] = 5;
            }
            if($input['anuladab']=="true"){
                  $estados[] = 6;
            }
            if($input['despachadab']=="true"){
                  $estados[] = 7;
            }
            if($input['facturab']=="true"){
                  $estados[] = 9;
            }
            if($input['rechazadab']=="true"){
                  $estados[] = 8;
            }

            if($input['sinprocesob']=="true" OR $input['enplanificacionb']=="true" OR $input['enproduccionb']=="true" OR $input['pendientesb']=="true" OR $input['terminadab']=="true" OR $input['anuladab']=="true" OR $input['despachadab']=="true" OR $input['rechazadab']=="true" OR $input['facturab']=="true"){
            $q0 .= ' AND op.estadoid IN('.implode(",",$estados).')';
            }

            if($input['hornob']=="true"){
                  $procesos[] = 2;
            }
            if($input['bateab']=="true"){
                  $procesos[] = 3;
            }
            if($input['puntab']=="true"){
                  $procesos[] = 4;
            }
            if($input['trefilab']=="true"){
                  $procesos[] = 5;
            }
            if($input['corteb']=="true"){
                  $procesos[] = 7;
            }
            if($input['currentb']=="true"){
                  $procesos[] = 8;
            }
            if($input['pruebab']=="true"){
                  $procesos[] = 9;
            }

            if($input['hornob']=="true" OR $input['bateab']=="true" OR $input['puntab']=="true" OR $input['trefilab']=="true" OR $input['corteb']=="true" OR $input['currentb']=="true" OR $input['pruebab']=="true"){
            $q0 .= ' AND se.tipoProceso IN('.implode(",",$procesos).')';
            }

            if($input['inactivob']=="true"){
                  $estadoProcesos[] = 1;
            }
            if($input['activadob']=="true"){
                  $estadoProcesos[] = 2;
            }
            if($input['enprocesob']=="true"){
                  $estadoProcesos[] = 3;
            }
            if($input['finalizadob']=="true"){
                  $estadoProcesos[] = 4;
            }
            if($input['autorizacionb']=="true"){
                  $estadoProcesos[] = 5;
            }

            if($input['inactivob']=="true" OR $input['activadob']=="true" OR $input['enprocesob']=="true" OR $input['finalizadob']=="true" OR $input['autorizacionb']=="true"){
            $q0 .= ' AND se.estadoid IN('.implode(",",$estadoProcesos).')';
            }

            $q0 .= (empty($input['diametroextdesdeb']))? "" : " AND mc.diametroExteriorNominal >=".$input['diametroextdesdeb']."";
            $q0 .= (empty($input['diametroexthastab']))? "" : " AND mc.diametroExteriorNominal <=".$input['diametroexthastab']."";
            $q0 .= (empty($input['diametroextmindesdeb']))? "" : " AND mc.diametroExteriorMinimo >=".$input['diametroextmindesdeb']."";
            $q0 .= (empty($input['diametroextminhastab']))? "" : " AND mc.diametroExteriorMinimo <=".$input['diametroextminhastab']."";
            $q0 .= (empty($input['diametroextmaxdesdeb']))? "" : " AND mc.diametroExteriorMaximo >=".$input['diametroextmaxdesdeb']."";
            $q0 .= (empty($input['diametroextmaxhastab']))? "" : " AND mc.diametroExteriorMaximo <=".$input['diametroextmaxhastab']."";
            $q0 .= (empty($input['diametrointdesdeb']))? "" : " AND mc.diametroInteriorNominal >=".$input['diametrointdesdeb']."";
            $q0 .= (empty($input['diametrointhastab']))? "" : " AND mc.diametroInteriorNominal <=".$input['diametrointhastab']."";
            $q0 .= (empty($input['diametrointmindesdeb']))? "" : " AND mc.diametroInteriorMinimo >=".$input['diametrointmindesdeb']."";
            $q0 .= (empty($input['diametrointminhastab']))? "" : " AND mc.diametroInteriorMinimo <=".$input['diametrointminhastab']."";
            $q0 .= (empty($input['diametrointmaxdesdeb']))? "" : " AND mc.diametroInteriorMaximo >=".$input['diametrointmaxdesdeb']."";
            $q0 .= (empty($input['diametrointmaxhastab']))? "" : " AND mc.diametroInteriorMaximo <=".$input['diametrointmaxhastab']."";
            $q0 .= (empty($input['espesordesdeb']))? "" : " AND mc.espesorNominal >=".$input['espesordesdeb']."";
            $q0 .= (empty($input['espesorhastab']))? "" : " AND mc.espesorNominal <=".$input['espesorhastab']."";
            $q0 .= (empty($input['espesormindesdeb']))? "" : " AND mc.espesorMinimo >=".$input['espesormindesdeb']."";
            $q0 .= (empty($input['espesorminhastab']))? "" : " AND mc.espesorMinimo <=".$input['espesorminhastab']."";
            $q0 .= (empty($input['espesormaxdesdeb']))? "" : " AND mc.espesorMaximo >=".$input['espesormaxdesdeb']."";
            $q0 .= (empty($input['espesormaxhastab']))? "" : " AND mc.espesorMaximo <=".$input['espesormaxhastab']."";
            $q0 .= (empty($input['largomaxb']))? "" : " AND mc.largoMaximo=".$input['largomaxb']."";
            $q0 .= (empty($input['largominb']))? "" : " AND mc.largoMinimo=".$input['largominb']."";
            $q0 .= (empty($input['tipoaceroidb']))? "" : " AND p.tipoAcero=".$input['tipoaceroidb']."";
            $q0 .= (empty($input['tipocosturaidb']))? "" : " AND mc.costuraid=".$input['tipocosturaidb']."";
            $q0 .= (empty($input['normaidb']))? "" : " AND mc.normaid=".$input['normaidb']."";
            $q0 .= (empty($input['tipoordenidb']))? "" : " AND p.tipoReventa=".$input['tipoordenidb']."";
            $q0 .= (empty($input['tratamientoidb']))? "" : " AND co.tratamientoTermico=".$input['tratamientoidb']."";
            $q0 .= (empty($input['kilosdesdeb']))? "" : " AND p.kilos>=".$input['kilosdesdeb']."";
            $q0 .= (empty($input['kiloshastab']))? "" : " AND p.kilos<=".$input['kiloshastab']."";
            $q0 .= (empty($input['durezaminb']))? "" : " AND p.durezaMinima=".$input['durezaminb']."";
            $q0 .= (empty($input['durezamaxb']))? "" : " AND p.durezaMaxima=".$input['durezamaxb']."";
            $q0 .= (empty($input['rugosidadb']))? "" : " AND p.rugosidad=".$input['rugosidadb']."";
            $q0 .= (empty($input['flechab']))? "" : " AND p.flecha=".$input['flechab']."";
            $q0 .= (empty($input['aplastadob']))? "" : " AND co.aplastado=1";
            $q0 .= (empty($input['pestanadob']))? "" : " AND co.pestaniado=1";
            $q0 .= (empty($input['cerfiticadoidb']))? "" : " AND p.certificadoid=".$input['cerfiticadoidb']."";

            if ($q0 == ""){
                return response()->json(['resultado'=>'false', 'insert'=> '1']);
            }

            $sql =  'SELECT '.
                    "op.id as Norden, c.razon as Cliente, IF (p.urgente=1, 'U', '') as 'URG', ".
                    "semanaPrometida as Sem, pr2.descripcion as Procesoactual, p.fechaPlanta as Paseaplanta, ".
                    "p.fechaPedido as FechaPedido, mc.diametroExteriorNominal as Ext, mc.espesorNominal as Esp, ".
                    "p.piezas as Pzas, ".
                    "IF(p.metros>0, p.metros, round(p.kilos/((mc.diametroExteriorNominal - mc.espesorNominal) * ".
                    "mc.espesorNominal * 0.0246), 2)) as Mts, ".
                    "IF(p.kilos>0, p.kilos, round(p.metros*((mc.diametroExteriorNominal - mc.espesorNominal) * ".
                    "mc.espesorNominal * 0.0246), 2)) as Kgs, ".
                    "tc.descripcion as Cost, tt.descripcion as TTermico, pro.razon as Prov, ".
                    "me.diametroExterior as ExtMP, me.espesorNominal as EspMP, ".
                    "IF(p.kilos>0, p.kilos*1.1, round(p.metros*((mc.diametroExteriorNominal - mc.espesorNominal) * ".
                    "mc.espesorNominal * 0.0246), 2)*1.1) as Kgsaprep, ".
                    "tcm.descripcion as Tipo, es.descripcion as Estado, ".
                    "(SELECT GROUP_CONCAT( IF( se3.estadoid =3, CONCAT(pr3.descripcion), pr3.descripcion ) ".
                    "ORDER BY se3.orden SEPARATOR '<br />' ) ".
                    "FROM subprocesosestado se3 LEFT JOIN procesos pr3 ON (pr3.id=se3.tipoProceso) ".
                    "where se3.ordenProduccion=p.id ) as PROCESOS, ".
                    "p.codigoPieza as CodPieza, trev.descripcion as 'RV-PR-MP', ".
                    "p.fechaPrometida as Fechaprometida, p.version as Version, ".
                    "p.durezaMinima as Durezamin, p.durezaMaxima as Durezamax, p.rugosidad as ".
                    "Rugosidad, p.flecha as Flecha, cert.descripcion as Certificado, ".
                    "(p.id) FROM ordenproduccion op ".
                    "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
                    "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
                    "LEFT JOIN clientes c ON (c.id = p.clienteid) ".
                    "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
                    "LEFT JOIN tratamientocotizacion tt ON (tt.id = p.tratamientoTermico) ".
                    "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
                    "LEFT JOIN procesosxop pxp ON (pxp.tipoProceso = 1 and pxp.idCP=p.id ) ".
                    "LEFT JOIN preparacionmp mp ON (mp.id = pxp.procesoid) ".
                    "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                    "LEFT JOIN estadosop es ON (es.id = op.estadoid) ".
                    "LEFT JOIN tipocostura tcm ON (tcm.id = me.tipoCostura) ".
                    "LEFT JOIN subprocesosestado se ON ( se.ordenProduccion = p.id ) ".
                    "LEFT JOIN subprocesosestado se2 ON ( se2.ordenProduccion = p.id  and se2.estadoid=3) ".
                    "LEFT JOIN procesos pr2 ON ( pr2.id = se2.tipoProceso ) ".
                    "LEFT JOIN procesos pr ON ( pr.id = se.tipoProceso ) ".
                    "LEFT JOIN paquetes paq ON (paq.id = (SELECT pq.id from paquetes pq where ".
                    "pq.medidaid=me.id LIMIT 1) ) ".
                    "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                    "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = paq.id ) ".
                    "LEFT JOIN reventa trev ON (trev.id = p.tipoReventa) ".
                    "LEFT JOIN certificado cert ON(cert.id=p.certificadoid) ".
                    "WHERE 1=1 ".
                    "and p.version= (SELECT MAX(vxo.version) from ordenproduccion op ".
                    "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) WHERE ".
                    "vxo.ordenProduccion=p.ordenProduccion GROUP BY pr2.descripcion, (vxo.ordenProduccion) ) ".
                    "$q0 GROUP BY p.id, pr2.id, pro.id, me.id order by op.id desc ;";


            $results = DB::select($sql);
            if ($results != [])
                return response()->json(['resultado'=>$results, 'insert'=> '1']);
            else
                return response()->json(['resultado'=>'false', 'insert'=> '1']);

        }
    }


    public function report_produccion()
    {
        $reportes = DB::table('reporteproduccion')->get();
        $clientes = DB::table('clientes')->get();
        $tipoaceros = DB::table('tipoacero')->get();
        $normas = DB::table('normas')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $tipoordenes = DB::table('reventa')->get();
        $usos = DB::table('usofinal')->get();
        $certificados = DB::table('certificado')->get();
        return view('report.reporte_produccion', compact('reportes', 'clientes', 'tipoaceros', 'normas', 'tipocosturas', 'tratamientos', 'tipoordenes', 'usos', 'certificados'));
    }

    public function report_toneladasxdia()
    {
        $subprocesos = DB::table('procesos')->where('id', '<', 10)->get();
        $tipoordenes = DB::table('reventa')->get();
        return view('report.reporte_toneladasxdia', compact('subprocesos', 'tipoordenes'));
    }

    public function buscar_report_toneladasxdia(Request $request)
    {
        $input = $request->all();
        $q0 = "";
        $join = "";

        $q0 .= (empty($input['mesb'][0]))? "" : " AND contf.fecha>='".$input['mesb'][0]."'";
        $q0 .= (empty($input['mesb'][1]))? "" : " AND contf.fecha<='".$input['mesb'][1]."'";
        $q0 .= (empty($input['tipoordenidb']))? "" : " AND vxo.tipoReventa=".$input['tipoordenidb']."";

        if ($input['subprocesoidb'] == 1){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join preparacionmprun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";

        }
        if ($input['subprocesoidb'] == 2){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join hornorun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";
            $q0 .= " AND pr.fechaEjecucion>='".$input['mesb'][0]."'";
            $q0 .= " AND pr.fechaEjecucion<='".$input['mesb'][1]."'";

        }
        if ($input['subprocesoidb'] == 3){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join batearun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";
            $q0 .= " AND pr.fechaEjecucion>='".$input['mesb'][0]."'";
            $q0 .= " AND pr.fechaEjecucion<='".$input['mesb'][1]."'";
        }
        if ($input['subprocesoidb'] == 4){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join puntarun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";
            $q0 .= " AND pr.fechaEjecucion>='".$input['mesb'][0]."'";
            $q0 .= " AND pr.fechaEjecucion<='".$input['mesb'][1]."'";

        }
        if ($input['subprocesoidb'] == 5){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join trefilarun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";
            $q0 .= " AND pr.fechaEjecucion>='".$input['mesb'][0]."'";
            $q0 .= " AND pr.fechaEjecucion<='".$input['mesb'][1]."'";

        }
        if ($input['subprocesoidb'] == 6){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join enderezarun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";
            $q0 .= " AND pr.fechaEjecucion>='".$input['mesb'][0]."'";
            $q0 .= " AND pr.fechaEjecucion<='".$input['mesb'][1]."'";

        }
        if ($input['subprocesoidb'] == 7){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ".
                    "inner join corterun pr on (pr.idplan = se.idplan) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";
            $q0 .= " AND pr.fechaEjecucion>='".$input['mesb'][0]."'";
            $q0 .= " AND pr.fechaEjecucion<='".$input['mesb'][1]."'";

        }
        if ($input['subprocesoidb'] == 8){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";

        }
        if ($input['subprocesoidb'] == 9){
            $join = " INNER JOIN subprocesosestado se ON (se.ordenProduccion = contf.idVersion) ";
            $q0 .= " AND se.tipoProceso=".$input['subprocesoidb']."";

        }

        $sql = 'SELECT '.
               "DISTINCT(contf.idVersion), COUNT(*) as ordenes, contf.fecha as fecha ".
               "FROM controlfinal contf ".
               "LEFT JOIN versionesxorden vxo ON (vxo.id=contf.idVersion) ".
               "$join WHERE 1=1 $q0 ".
               "GROUP BY contf.fecha ;";
        //dd($sql);

        $results = DB::select($sql);
        $reportarray = [];

        if ($results != []){
            $dias = 1;
            $fabricado = 0;
            $ordenes = 0;
            $count = count($results);
            //dd($count);
            $sql2 = 'SELECT '.
                    "SUM(contp.kilosBalanza) as 'toneladas' FROM controlfinal contf ".
                    "$join ".
                    "LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid=contf.id) ".
                    "LEFT JOIN controlpaquetes contp ON (contp.id=pxc.controlPaqueteid) ".
                    "LEFT JOIN versionesxorden vxo ON(vxo.id=contf.idVersion) ".
                    "WHERE 1=1 $q0 GROUP BY contf.fecha ;";
            $results2 = DB::select($sql2);

            for ($i = 0; $i < $count; $i++){
               $fabricado = $fabricado + $results2[$i]->toneladas;
               $ordenes = $ordenes + $results[$i]->ordenes;
               $dias = $dias + 1;

            }

            $reportarray[] = (object) ['dia'=> "Total", 'tonedia'=> number_format($fabricado/1000,2,'.',''), 'cantorde'=>$ordenes, 'promedio'=> number_format($fabricado/($dias-1)/1000,2,'.',''), 'subtotal'=> number_format($fabricado/1000,2,'.','')];

            return response()->json(['resultado'=>$reportarray]);



        }


        return "false";

    }

    public function buscar_reporteventas(Request $request)
    {
        $input = $request->all();
        $q0 = "";

        if ($request->get('desdeb')){
            $f1 = explode(" ", $request->get('desdeb'));
            list($mes, $dia, $anio) = explode('/', $f1[0]);
            $desde = $anio."-".$mes."-".$dia;


        }

        if ($request->get('hastab')){
            $f2 = explode(" ", $request->get('hastab'));
            list($mes, $dia, $anio) = explode('/', $f2[0]);
            $hasta = $anio."-".$mes."-".$dia;

        }

        if($input['sincotizarb']=="true"){
              $estados[] = 1;
        }
        if($input['enseguimientob']=="true"){
              $estados[] = 2;
        }
        if($input['aprobadab']=="true"){
              $estados[] = 3;
        }
        if($input['anuladab']=="true"){
              $estados[] = 4;
        }
        if($input['rechazadab']=="true"){
              $estados[] = 5;
        }
        if($input['finalizadab']=="true"){
              $estados[] = 6;
        }

        if($input['sincotizarb']=="true" OR $input['enseguimientob']=="true" OR $input['aprobadab']=="true" OR $input['anuladab']=="true" OR $input['rechazadab']=="true" OR $input['finalizadab']=="true"){
        $q0 .= ' AND co.estadoid IN('.implode(",",$estados).')';
        }

        $q0 .= (empty($input['desdeb']))? "" : " AND date(co.fechaEntrega)>='".$desde."'";
        $q0 .= (empty($input['hastab']))? "" : " AND date(co.fechaEntrega)<='".$hasta."'";
        $q0 .= (empty($input['clienteidb']))? "" : " AND c.id=".$input['clienteidb']."";
        $q0 .= (empty($input['codigob']))? "" : " AND c.codigo LIKE '% ".$input['codigob']."%'";
        $q0 .= (empty($input['diametroexb']))? "" : " AND mc.diametroExteriorNominal=".$input['diametroexb']."";
        $q0 .= (empty($input['diametroexminb']))? "" : " AND mc.diametroExteriorMinimo=".$input['diametroexminb']."";
        $q0 .= (empty($input['diametroexmaxb']))? "" : " AND mc.diametroExteriorMaximo=".$input['diametroexmaxb']."";
        $q0 .= (empty($input['diametroinb']))? "" : " AND mc.diametroInteriorNominal=".$input['diametroinb']."";
        $q0 .= (empty($input['diametroinminb']))? "" : " AND mc.diametroInteriorMinimo=".$input['diametroinminb']."";
        $q0 .= (empty($input['diametroinmaxb']))? "" : " AND mc.diametroInteriorMaximo=".$input['diametroinmaxb']."";
        $q0 .= (empty($input['espesorb']))? "" : " AND mc.espesorNominal=".$input['espesorb']."";
        $q0 .= (empty($input['espesorminb']))? "" : " AND AND mc.espesorMinimo=".$input['espesorminb']."";
        $q0 .= (empty($input['espesormaxb']))? "" : " AND mc.espesorMaximo=".$input['espesormaxb']."";
        $q0 .= (empty($input['codigomaterialb']))? "" : " AND co.codigoPieza='".$input['codigomaterialb']."'";
        $q0 .= (empty($input['largomaxb']))? "" : " AND mc.largoMaximo<".$input['largomaxb']."";
        $q0 .= (empty($input['largominb']))? "" : " AND mc.largoMinimo>".$input['largominb']."";
        $q0 .= (empty($input['tipoaceroidb']))? "" : " AND co.tipoAcero=".$input['tipoaceroidb']."";
        $q0 .= (empty($input['tipocosturaidb']))? "" : " AND mc.costuraid=".$input['tipocosturaidb']."";
        $q0 .= (empty($input['normaidb']))? "" : " AND mc.normaid=".$input['normaidb']."";
        $q0 .= (empty($input['tipoordenidb']))? "" : " AND co.tipoReventa=".$input['tipoordenidb']."";
        $q0 .= (empty($input['tratamientoidb']))? "" : " AND co.tratamientoTermico=".$input['tratamientoidb']."";
        $q0 .= (empty($input['usoidb']))? "" : " AND co.uso=".$input['usoidb']."";
        $q0 .= (empty($input['formaidb']))? "" : " AND co.formaid=".$input['formaidb']."";
        $q0 .= (empty($input['embalajeidb']))? "" : " AND co.tipoEmbalaje=".$input['embalajeidb']."";
        $q0 .= (empty($input['kilosdesdeb']))? "" : " AND co.kilos>=".$input['kilosdesdeb']."";
        $q0 .= (empty($input['kiloshastab']))? "" : " AND co.kilos<=".$input['kiloshastab']."";
        $q0 .= (empty($input['urgenteb']))? "" : " AND co.urgente=1";
        $q0 .= (empty($input['biseladob']))? "" : " AND co.biselado=1";
        $q0 .= (empty($input['durezaminb']))? "" : " AND co.durezaMinima=".$input['durezaminb']."";
        $q0 .= (empty($input['durezamaxb']))? "" : " AND co.durezaMaxima=".$input['durezamaxb']."";
        $q0 .= (empty($input['rugosidadb']))? "" : " AND co.rugosidad=".$input['rugosidadb']."";
        $q0 .= (empty($input['flechab']))? "" : " AND co.flecha=".$input['flechab']."";
        $q0 .= (empty($input['certificadoidb']))? "" : " AND co.certificadoid=".$input['certificadoidb']."";
        $q0 .= (empty($input['aplastadob']))? "" : " AND co.aplastado=1";
        $q0 .= (empty($input['pestanadob']))? "" : " AND co.pestaniado=1";
        $q0 .= (empty($input['condicionb']))? "" : " AND co.condicionVenta=".$input['condicionb']."";

        $sql  = 'SELECT '.
                "mc.medida as MEDIDA, co.fecha as FECHA, co.id as NCot, ".
                "CONCAT(ec.descripcion ".'-'." ec.color) as ESTADO, ".
                "uf.descripcion as USO, tt.detalle as TTermico, pmp.precio as USDMPKG, ".
                "medor.diametroExterior as Ext, medor.espesorNominal as Esp, ".
                "round(((medor.diametroExterior - medor.espesorNominal) * medor.espesorNominal * 0.0246), 3) as ".
                "kgmMP, IF(co.metros=0, round(co.kilos/((mc.diametroExteriorNominal - mc.espesorNominal) * ".
                "mc.espesorNominal * 0.0246), 2), co.metros) as Mts, ".
                "IF(co.kilos=0, round(co.metros*((mc.diametroExteriorNominal - mc.espesorNominal) * mc.espesorNominal ".
                "* 0.0246), 2), co.kilos) as Kilos, IF (pc.precioKilo=0, round(pc.precioMetro/(( ".
                "mc.diametroExteriorNominal - mc.espesorNominal) * mc.espesorNominal * 0.0246), 2), ".
                "pc.precioKilo) as PRECIOKG, mon.descripcion as Moneda, co.pesosx45 as Pesosx45, ".
                "co.precioxContribucion as Preciocontrib, form.descripcion as Forma, ".
                "emb.descripcion as Embalaje, co.durezaMinima as Durezamin, co.durezaMaxima as Durezamax, ".
                "co.rugosidad as Rugosidad, co.flecha as Flecha, ".
                "cert.descripcion as Certificado, tac.descripcion as TipoAcero, ".
                "co.id FROM cotizaciones co ".
                "LEFT JOIN medidascotizadas mc ON (mc.id = co.medidaid) ".
                "LEFT JOIN clientes c ON (c.id = co.clienteid) ".
                "LEFT JOIN estadocotizacion ec ON (ec.id = co.estadoid) ".
                "LEFT JOIN preparacionmp pmp ON ".
                "(pmp.id =".
                "(SELECT px2.procesoid ".
                "FROM procesosxcp px2 ".
                "WHERE px2.tipoProceso =1 ".
                "AND px2.idCP = co.id ".
                "AND procesoid >0 ".
                "LIMIT 1 ".
                ")) ".
                "LEFT JOIN medidas medor ON (medor.id = pmp.medidaid) ".
                "LEFT JOIN usofinal uf  ON (uf.id = co.uso) ".
                "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = co.id and pc.fecha = (SELECT max(fecha) ".
                "from preciocotizaciones where cotizacionid=co.id)) ".
                "LEFT JOIN tratamientocotizacion tt ON (tt.id = co.tratamientoTermico) ".
                "LEFT JOIN formas form ON(form.id=co.formaid) ".
                "LEFT JOIN embalajes emb ON(emb.id=co.tipoEmbalaje) ".
                "LEFT JOIN certificado cert ON(cert.id=co.certificadoid) ".
                "LEFT JOIN tipoacero tac ON(tac.id=co.tipoAcero) ".
                "LEFT JOIN monedas mon ON(mon.id=co.tipoMoneda) ".
                "WHERE 1=1 $q0 GROUP BY co.id order by co.id desc ;";

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);
    }

    public function report_venta()
    {
        $reportes = DB::table('reporteventas')->get();
        $clientes = DB::table('clientes')->get();
        $tipoaceros = DB::table('tipoacero')->get();
        $normas = DB::table('normas')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $tipoordenes = DB::table('reventa')->get();
        $usos = DB::table('usofinal')->get();
        $formas = DB::table('formas')->get();
        $embalajes = DB::table('embalajes')->get();
        $certificados = DB::table('certificado')->get();
        $condiciones = DB::table('condicionventa')->get();
        return view('report.reporte_venta', compact('reportes', 'clientes', 'tipoaceros', 'normas', 'tipocosturas', 'tratamientos', 'tipoordenes', 'usos', 'certificados', 'formas', 'embalajes', 'condiciones'));
    }

    public function buscar_reporteprecioproveedor(Request $request)
    {

        if ($request->get('desdeb')){
            $f1 = explode(" ", $request->get('desdeb'));
            list($mes, $dia, $anio) = explode('/', $f1[0]);
            $desde = $anio."-".$mes."-".$dia;


        }

        if ($request->get('hastab')){
            $f2 = explode(" ", $request->get('hastab'));
            list($mes, $dia, $anio) = explode('/', $f2[0]);
            $hasta = $anio."-".$mes."-".$dia;

        }

        $input = $request->all();
        $q0 = "";
        $q0 .= (empty($input['proveedoridb']))? "" : " AND h.proveedorid=".$input['proveedoridb']."";
        $q0 .= (empty($input['desdeb']))? "" : " AND date(h.fechaIngreso)>='".$desde."'";
        $q0 .= (empty($input['hastab']))? "" : " AND date(h.fechaIngreso)<='".$hasta."'";
        $q0 .= (empty($input['diametrohastab']))? "" : " AND diametroExterior<=".$input['diametrohastab']."";
        $q0 .= (empty($input['diametrodesdeb']))? "" : " AND diametroExterior>=".$input['diametrodesdeb']."";
        $q0 .= (empty($input['espesorhastab']))? "" : " AND espesorNominal<=".$input['espesorhastab']."";
        $q0 .= (empty($input['espesordesdeb']))? "" : " AND espesorNominal>=".$input['espesordesdeb']."";
        $q0 .= (empty($input['largomaxb']))? "" : " AND largoMaximo<=".$input['largomaxb']."";
        $q0 .= (empty($input['largominb']))? "" : " AND largoMinimo>=".$input['largominb']."";
        $q0 .= (empty($input['tipoaceroidb']))? "" : " AND tipoAceroSAE=".$input['tipoaceroidb']."";
        $q0 .= (empty($input['tipocosturaidb']))? "" : " AND tipoCostura=".$input['tipocosturaidb']."";
        $q0 .= (empty($input['normaidb']))? "" : " AND normaid=".$input['normaidb']."";

        $sql = 'SELECT '.
               "p.razon as Proveedor, m.medida as Medida, h.fechaIngreso as FechaModificacion, ".
               "h.porcentaje as PorcentajeActualizacion, ROUND(h.precio, 2) as Precio, ".
               "mo.descripcion as Moneda, h.id FROM historicopreciop h ".
               "LEFT JOIN proveedores p ON (p.id = h.proveedorid) ".
               "LEFT JOIN medidas m ON (m.id=h.medidaid) ".
               "LEFT JOIN preciompxproveedor pmp ON(pmp.medidaid=h.medidaid and pmp.proveedorid=h.proveedorid) ".
               "LEFT JOIN monedas mo ON(mo.id=pmp.tipoMoneda) WHERE 1=1 $q0 GROUP BY m.medida, h.precio ".
               "order by h.medidaid asc, h.id asc ;";

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);
    }

    public function buscar_reporteentregames(Request $request)
    {
        $input = $request->all();
        $fechab = $input['fechab'];
        $q0 = "";
        $q0 .= (empty($input['fecha'][0]))? "" : " AND d.fechaEntrega>='".$input['fecha'][0]."'";
        $q0 .= (empty($input['fecha'][1]))? "" : " AND d.fechaEntrega<='".$input['fecha'][1]."'";

        $sql1 = 'SELECT '.
                "COUNT(*) as ordenes, d.fechaEntrega as fecha ".
                "FROM despachos d WHERE 1=1 $q0 GROUP BY d.fechaEntrega ;";
        $results1 = DB::select($sql1);
        $array = [];
        $arrayT = [];
        if ($results1 != []){
            $sql2 = 'SELECT '.
                    "SUM(d.kilos) as 'toneladas', d.fechaEntrega ".
                    "FROM despachos d ".
                    "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
                    "WHERE 1=1 $q0 GROUP BY d.fechaEntrega ;";
            $results2 = DB::select($sql2);

            $sql3 = 'SELECT '.
                    "fecha, objetivo, objetivoRv ".
                    "FROM repoentregadoxmes ".
                    "WHERE fecha='".$fechab."' ;";

            $results3 = DB::select($sql3);

            $sql4 = 'SELECT '.
                    "SUM(d.kilos) as 'toneladasReventa', d.fechaEntrega ".
                    "FROM despachos d ".
                    "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
                    "WHERE vxo.tipoReventa=1 ".
                    "$q0 GROUP BY d.fechaEntrega ;";
            $results4 = DB::select($sql4);

            $count = count($results1);

            $objetivo = 0;
            $objetivoRv = 0;
            $entregado = 0;
            $reventa = 0;
            $trefila = 0;

            for ($i = 0; $i < $count; $i++){
                $toneladasTot = 0;
                $toneladasRev = 0;

                $sql5 = 'SELECT '.
                        "SUM(d.kilos) as 'toneladas', d.fechaEntrega FROM despachos d ".
                        "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
                        "WHERE '".$results1[$i]->fecha."'=d.fechaEntrega ".
                        "GROUP BY d.fechaEntrega ;";
                $results5 = DB::select($sql5);

                if ($results5 != [])
                    $toneladasTot = (int) $results5[0]->toneladas;
                else
                    $toneladasTot = 1;

                $sql6 = 'SELECT '.
                        "SUM(d.kilos) as 'toneladas', d.fechaEntrega ".
                        "FROM despachos d ".
                        "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
                        "WHERE '".$results1[$i]->fecha."'=d.fechaEntrega and vxo.tipoReventa = 1 ".
                        "GROUP BY d.fechaEntrega ;";

                $results6 = DB::select($sql6);

                if ($results6 != [])
                    $toneladasRev = (int) $results6[0]->toneladas;
                else
                    $toneladasRev = 1;

                $objetivo = $objetivo + $results3[0]->objetivo/$count;
                $objetivoRv = $objetivoRv + $results3[0]->objetivoRv/$count;
                $porcentaje = ((($toneladasRev)*100)/$toneladasTot);

                $array[] = (object)[
                    'fecha'=>$results1[$i]->fecha,
                    'objetivo'=> number_format($objetivo,2,'.',''),
                    'reventa'=> number_format($toneladasRev/1000,2,'.',''),
                    'trefilado'=> number_format(($toneladasTot-$toneladasRev)/1000,2,'.',''),
                    'totalentregado'=> number_format($toneladasTot/1000,2,'.',''),
                    'porcentaje' => number_format($porcentaje,2,'.',''),
                    'objetivorv'=> number_format($objetivoRv,2,'.','')
                ];

                $entregado += $toneladasTot;
                $reventa += $toneladasRev;
                $trefila += $toneladasTot-$toneladasRev;
            }

            $porcentajeTotal = ((($reventa)*100)/$entregado);

            $arrayT[] = (object)[
                'total'=> 'TOTAL',
                'tobjetivo'=> number_format($results3[0]->objetivo,2,'.',''),
                'treventa'=> number_format($reventa/1000,2,'.',''),
                'ttrefila'=> number_format($trefila/1000,2,'.',''),
                'tentregagado'=> number_format($entregado/1000,2,'.',''),
                'tporcentaje' => number_format($porcentajeTotal,2,'.',''),
                'tobjetivorv' => number_format($results3[0]->objetivoRv,2,'.','')
            ];
        }
        if ($array == [] and $arrayT == [])
            return [];

        $global = [];
        $global[] = (object)['detalles'=> $array, 'totales'=>$arrayT];
       // dd($global);

        return response()->json(['resultado'=>$global[0]]);
    }

    public function report_precio_proveedor()
    {
        $tipoaceros = DB::table('tipoacero')->get();
        $normas = DB::table('normas')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $proveedores = DB::table('proveedores')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        return view('report.reporte_precio_proveedor', compact('tipoaceros', 'normas', 'tipocosturas', 'proveedores', 'tratamientos'));
    }
}
