<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class CotizacionController extends Controller
{
    public function indexcotizacion()
    {

    	$estadocotizacions = DB::table('estadocotizacion')->get();
    	$clientes      =  DB::table('clientes')->where('activo', '=', 1)->orderBy('razon', 'ASC')->get();
    	$formas        = DB::table('formas')->get();
    	$tipoacero     = DB::table('tipoacero')->get();
    	$tipocostura   =  DB::table('tipocostura')->get();
    	$normas        =  DB::table('normas')->get();
    	$tratamientos  =  DB::table('estadofabricacion')->get();
        $tiporden      =  DB::table("reventa")->get();
        $embalajes     =  DB::table("embalajes")->get();
        $usos          =  DB::table("usofinal")->get();
        $certificados  =  DB::table("certificado")->get();
        $condiciones   =  DB::table("condicionventa")->get();
        $monedas       =  DB::table("monedas")->get();
        $prioridades   =  DB::table("prioridades")->get();
        $usuarios      =  DB::table("usuarios")->get();

        return view('cotizacion.cotizacion', compact('estadocotizacions', 'clientes', 'formas', 'tipoacero', 'tipocostura', 'normas', 'tratamientos', 'tiporden', 'usos', 'embalajes', 'certificados', 'condiciones', 'monedas', 'prioridades', 'usuarios'));
    }

    public function searchcotizacion(Request $request)
    {
        $q0  = "";

        $input = $request->all();

        $q0 .= (empty($input['fechaDesde']))? "" : " AND cotizaciones.fecha>='".$input['fechaDesde']."'";

        $q0 .= (empty($input['fechaHasta']))? "" : " AND cotizaciones.fecha<='".$input['fechaHasta']."'";

        $q0 .= (empty($input['fechaEntregaDesde']))? "" : " AND cotizaciones.fechaEntrega>='".$input['fechaEntregaDesde']."'";

        $q0 .= (empty($input['fechaEntregaHasta']))? "" : " AND cotizaciones.fechaEntrega<='".$input['fechaEntregaHasta']."'";

        $q0 .= (empty($input['cliente']))? "": " AND clientes.razon LIKE '%".$input['cliente']."%'";

        $q0 .= (empty($input['codcliente']))? "": " AND cotizaciones.codigoPieza LIKE '%".str($input['codcliente'])."%'";

        $q0 .= (empty($input['tipocostura']))? "" : " AND medidascotizadas.costuraid='".$input['tipocostura']."'";

        $q0 .= (empty($input['tiponorma']))? "" : " AND medidascotizadas.normaid='".$input['tiponorma']."'";

        $q0 .= (empty($input['tipotratamientotermico']))? "" : " AND cotizaciones.tratamientoTermico='".$input['tipotratamientotermico']."'";

        $q0 .= (empty($input['tipouso']))? "" : " AND cotizaciones.uso='".$input['tipouso']."'";

        $q0 .= (empty($input['tiporden']))? "" : " AND cotizaciones.tipoReventa='".$input['tiporden']."'";

        $q0 .= (empty($input['tipoacero']))? "" : " AND cotizaciones.tipoAcero='".$input['tipoacero']."'";

        $q0 .= (empty($input['estado']))? "" : " AND cotizaciones.estadoid='".$input['estado']."'";

        $q0 .= (empty($input['diametroexteriordesde']))? "" : " AND medidascotizadas.diametroExteriorNominal>='".$input['diametroexteriordesde']."'";

        $q0 .= (empty($input['diametroexteriorhasta']))? "" : " AND medidascotizadas.diametroExteriorNominal<='".$input['diametroexteriorhasta']."'";

        $q0 .= (empty($input['diametroexteriormindesde']))? "" : " AND medidascotizadas.diametroExteriorMinimo>='".$input['diametroexteriormindesde']."'";

        $q0 .= (empty($input['diametroexteriorminhasta']))? "" : " AND medidascotizadas.diametroExteriorMinimo<='".$input['diametroexteriorminhasta']."'";

        $q0 .= (empty($input['diametroexteriormaxdesde']))? "" : " AND medidascotizadas.diametroExteriorMaximo>='".$input['diametroexteriormaxdesde']."'";

        $q0 .= (empty($input['diametroexteriormaxhasta']))? "" : " AND medidascotizadas.diametroExteriorMaximo<='".$input['diametroexteriormaxhasta']."'";

        $q0 .= (empty($input['largominimo']))? "" : " AND medidascotizadas.largoMinimo<'".$input['largominimo']."'";

        $q0 .= (empty($input['largomaximo']))? "" : " AND medidascotizadas.largoMaximo>'".$input['largomaximo']."'";


        $q0 .= (empty($input['kilosdesde']))? "" : " AND cotizaciones.kilos>='".$input['kilosdesde']."'";

        $q0 .= (empty($input['kiloshasta']))? "" : " AND cotizaciones.kilos<='".$input['kiloshasta']."'";

        $q0 .= (empty($input['diametrointeriordesde']))? "" : " AND medidascotizadas.diametroInteriorNominal>='".$input['diametrointeriordesde']."'";

        $q0 .= (empty($input['diametrointeriorhasta']))? "" : " AND medidascotizadas.diametroInteriorNominal<='".$input['diametrointeriorhasta']."'";

        $q0 .= (empty($input['diametrointeriormindesde']))? "" : " AND medidascotizadas.diametroInteriorMinimo>='".$input['diametrointeriormindesde']."'";

        $q0 .= (empty($input['diametrointeriorminhasta']))? "" : " AND medidascotizadas.diametroInteriorMinimo<='".$input['diametrointeriorminhasta']."'";

        $q0 .= (empty($input['diametrointeriormaxdesde']))? "" : " AND medidascotizadas.diametroInteriorMaximo>='".$input['diametrointeriormaxdesde']."'";

        $q0 .= (empty($input['diametrointeriormaxhasta']))? "" : " AND medidascotizadas.diametroInteriorMaximo<='".$input['diametrointeriormaxhasta']."'";

        $q0 .= (empty($input['espesordesde']))? "" : " AND medidascotizadas.espesorNominal>='".$input['espesordesde']."'";

        $q0 .= (empty($input['espesorhasta']))? "" : " AND medidascotizadas.espesorNominal<='".$input['espesorhasta']."'";

        $q0 .= (empty($input['espesorminexteriordesde']))? "" : " AND medidascotizadas.espesorMinimo>='".$input['espesorminexteriordesde']."'";

        $q0 .= (empty($input['espesorminexteriorhasta']))? "" : " AND medidascotizadas.espesorMinimo<='".$input['espesorminexteriorhasta']."'";

        $q0 .= (empty($input['espesormaximoexteriordesde']))? "" : " AND medidascotizadas.espesorMaximo>='".$input['espesormaximoexteriordesde']."'";

        $q0 .= (empty($input['espesormaximoexteriorhasta']))? "" : " AND medidascotizadas.espesorMaximo<='".$input['espesormaximoexteriorhasta']."'";

        $q0 .= (empty($input['codigomaterial']))? "" : " AND cotizaciones.codigoPieza='".$input['codigomaterial']."'";

        $q0 .= (!($input['urgente']=="true"))? "" : " AND cotizaciones.urgente=1";

        $q0 .= (empty($input['cotizacion']))? "" : " AND cotizaciones.id='".$input['cotizacion']."'";


        //$q0 .= (empty($input['diametroexteriornominal']))?
        //dd($input['urgente']);
        //dd($q0);

        $sql =  "SELECT ".
                "medidascotizadas.medida,cotizaciones.codigoPieza,cotizaciones.fecha, cotizaciones.fechaEntrega, ".
                "cotizaciones.id ,estadocotizacion.descripcion as estado, estadocotizacion.color,usofinal.descripcion as uso,estadofabricacion.detalle as tt ,pmp.precio,medidas.diametroExterior, ".
                "medidas.espesorNominal,round(((medidas.diametroExterior - medidas.espesorNominal) * medidas.espesorNominal * 0.0246),3) as mpkg, ".
                "IF(cotizaciones.metros=0,round(cotizaciones.kilos/((medidascotizadas.diametroExteriorNominal - medidascotizadas.espesorNominal) * medidascotizadas.espesorNominal * 0.0246),2),cotizaciones.metros) as metros, ".
                "IF(cotizaciones.kilos=0,round(cotizaciones.metros*((medidascotizadas.diametroExteriorNominal - medidascotizadas.espesorNominal) * medidascotizadas.espesorNominal * 0.0246),2),cotizaciones.kilos) as kilos, ".
                "IF (preciocotizaciones.precioKilo=0,  ".
                "round(preciocotizaciones.precioMetro/((medidascotizadas.diametroExteriorNominal - medidascotizadas.espesorNominal) * medidascotizadas.espesorNominal * 0.0246),2),preciocotizaciones.precioKilo) as preciokilo, ".
                "monedas.descripcion as moneda,cotizaciones.pesosx45,cotizaciones.precioxContribucion ,cotizaciones.id  ".
                "FROM cotizaciones  ".
                "LEFT JOIN medidascotizadas ON (medidascotizadas.id = cotizaciones.medidaid) ".
                "LEFT JOIN clientes  ON (clientes.id = cotizaciones.clienteid) ".
                "LEFT JOIN estadocotizacion  ON (estadocotizacion.id = cotizaciones.estadoid)  ".
                "LEFT JOIN preparacionmp pmp ON ".
                "(pmp.id =  ".
                    "(SELECT px2.procesoid  ".
                    "FROM procesosxcp px2 ".
                    "WHERE px2.tipoProceso =1 ".
                    "AND px2.idCP = cotizaciones.id ".
                    "AND procesoid >0  ".
                    "LIMIT 1  ".
                ") ".
                ") ".
                "LEFT JOIN medidas ON (medidas.id = pmp.medidaid) ".
                "LEFT JOIN usofinal  ON (usofinal.id = cotizaciones.uso) ".
                "LEFT JOIN preciocotizaciones  ON (preciocotizaciones.cotizacionid = cotizaciones.id and preciocotizaciones.fecha = (SELECT max(fecha) from preciocotizaciones where cotizacionid=cotizaciones.id)) ".
                "LEFT JOIN estadofabricacion  ON (estadofabricacion.id = cotizaciones.tratamientoTermico) ".
                "LEFT JOIN monedas ON(monedas.id=cotizaciones.tipoMoneda) ".
                "WHERE 1=1 $q0 GROUP BY cotizaciones.id order by cotizaciones.id desc ; ";


        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);
    }

    public function addcotizacion(Request $request)
    {

        $input = $request->all();

        $nombre_medida = "";
        $nombre_medida.= empty($input["nombreCliente"])? "" : $input["nombreCliente"]." ";
        $nombre_medida.= empty($input["diametroExteriorNominal"])? "" : $input["diametroExteriorNominal"]." x ";
        $nombre_medida.= empty($input["espesorNominal"])?"":$input["espesorNominal"]." x ";
        $nombre_medida.= empty($input["largoMinimo"])?"":$input["largoMinimo"]." / ";
        $nombre_medida.= empty($input["largoMaximo"])?"":$input["largoMaximo"]." ";
        $nombre_medida.= empty($input["costura"])?"":$input["nombrecostura"]." ";
        $nombre_medida.= empty($input["tipoacero"])?"":$input["nombretipoacero"]." ";

        $diametroExteriorNominal = empty($input["diametroExteriorNominal"])? 0: $input["diametroExteriorNominal"];
        $diametroExteriorMaximo  = empty($input["diametroExteriorMaximo"])?  0: $input["diametroExteriorMaximo"];
        $diametroExteriorMinimo  = empty($input["diametroExteriorMinimo"])?  0: $input["diametroExteriorMinimo"];
        $diametroInteriorNominal = empty($input["diametroInteriorNominal"])? 0: $input["diametroInteriorNominal"];
        $diametroInteriorMaximo  = empty($input["diametroInteriorMaximo"])?  0: $input["diametroInteriorMaximo"];
        $diametroInteriorMinimo  = empty($input["diametroInteriorMinimo"])?  0: $input["diametroInteriorMinimo"];
        $espesorNominal  = empty($input["espesorNominal"])? 0: $input["espesorNominal"];
        $espesorMaximo   = empty($input["espesorMaximo"])? 0: $input["espesorMaximo"];
        $espesorMinimo   = empty($input["espesorMinimo"])? 0: $input["espesorMinimo"];
        $largoMaximo     = empty($input["multiplomax"])? 0: $input["multiplomax"];
        $largoMinimo     = empty($input["multiplomin"])? 0: $input["multiplomin"];
        $largoMaxEntrega = empty($input["largoMaximoEntrega"])? 0: $input["largoMaximoEntrega"];
        $largoMinEntrega = empty($input["largoMinEntrega"])? 0: $input["largoMinEntrega"];
        $normaid         = $input["norma"];
        $costuraid       = $input["costura"];

        $medidaId = $input['producto_id'];

        $atributo = DB::table('atributosproducto')->where('cliente_id', '=', $input['cliente'])->first();
        if (!$atributo){
            $atributosdd = DB::table('atributosproducto')->insert([
                'cliente_id'=>$input['cliente'],
                'producto_id'=>$medidaId,
                'durezamin'=>$input['durezaminima'],
                'durezamax'=>$input['durezamaxima'],
                'rugosidad'=>$input['rugosidad'],
                'ensayoexp'=>$input['ensayo'],
                'usoid'=>$input['uso'],
                'certificadoid'=>$input['certificado'],
                'embalajeid'=>$input['embalaje'],
                'codigocliente'=>$input['codmaterial'],
                'largominentrega'=>$input['largoMinEntrega'],
                'largomaxentrega'=>$input['largoMaximoEntrega'],
                'multiplomin'=>$input['multiplomin'],
                'multiplomax'=>$input['multiplomax'],
            ]);            
        }
        else{
            $atributosup = DB::table('atributosproducto')->where('cliente_id', '=', $input['cliente'])->update([
                'producto_id'=>$medidaId,
                'durezamin'=>$input['durezaminima'],
                'durezamax'=>$input['durezamaxima'],
                'rugosidad'=>$input['rugosidad'],
                'ensayoexp'=>$input['ensayo'],
                'usoid'=>$input['uso'],
                'certificadoid'=>$input['certificado'],
                'embalajeid'=>$input['embalaje'],
                'codigocliente'=>$input['codmaterial'],
                'largominentrega'=>$input['largoMinEntrega'],
                'largomaxentrega'=>$input['largoMaximoEntrega'],
                'multiplomin'=>$input['multiplomin'],
                'multiplomax'=>$input['multiplomax'],
            ]); 
        }

        $medidacotizada_id = DB::table('medidascotizadas')->insertGetId([
            'medida'=>$nombre_medida,
            'diametroExteriorNominal'=>$diametroExteriorNominal,
            'diametroExteriorMaximo'=>$diametroExteriorMaximo,
            'diametroExteriorMinimo'=>$diametroExteriorMinimo,
            'diametroInteriorNominal'=>$diametroInteriorNominal,
            'diametroInteriorMaximo'=>$diametroInteriorMaximo,
            'diametroInteriorMinimo'=>$diametroInteriorMinimo,
            'espesorNominal'=>$espesorNominal,
            'espesorMaximo'=>$espesorMaximo,
            'espesorMinimo'=>$espesorMinimo,
            'largoMaximo'=>$largoMaximo,
            'largoMinimo'=>$largoMinimo,
            'largoMaxEntrega'=>$largoMaxEntrega,
            'largoMinEntrega'=>$largoMinEntrega,
            'normaid'=>$normaid,
            'costuraid'=>$costuraid,
            'producto_id'=>$medidaId
        ]);
        
        $estencilado = $input["estencilado"];
        $seguimiento = $input["crearSeguimiento"];

       if($medidaId>0)
       {
            $id_estencilado = null;

            if($estencilado=="1")
            {
                $largominimoEstencilado = empty($input["multiplomin"])? 0:$input["multiplomin"];
                $largomaximoEstencilado = empty($input["multiplomax"])? 0:$input["multiplomax"];
                $normaEstencilado = $input["tiponormaestencilado"];
                $numeroColada =  empty($input["numerocoladaestencilado"])? 0:$input["numerocoladaestencilado"];
                $medidaEstencilado = empty($input["medidaestencilado"])? 0:$input["medidaestencilado"];
                $tipoCosturaEstencilado = $input["costuraestancilado"];
                $observacionesEstencilado =  $input["observacionesestencilado"];

                $id_estencilado = DB::table('estencilado')->insertGetId([
                    'largoMinimo' =>$largominimoEstencilado,
                    'largoMaximo' =>$largomaximoEstencilado,
                    'normaid' => $normaEstencilado,
                    'numeroColada'=>$numeroColada,
                    'medida'=>$medidaEstencilado,
                    'tipoCostura'=>$tipoCosturaEstencilado,
                    'observaciones'=>$observacionesEstencilado
                ]);
            }


            $estado       = $input["estado"];
            $cliente      = $input["cliente"];

            $fecha        = $input["fecha"];
            $recepcion    = explode("/", $fecha);
            $fecha        = $recepcion[2]."-".$recepcion[1]."-".$recepcion[0];


            $embalaje     = $input["embalaje"];
            $biselado     = $input["biselado"];
            $durezamaxima = empty($input["durezamaxima"])? 0: $input["durezamaxima"];
            $durezaminima = empty($input["durezaminima"])? 0: $input["durezaminima"];
            $tipoacero    = $input["tipoacero"];
            $tipoOrden    = $input["tipoOrden"];
            $kilos        = empty($input["kilos"])? 0: $input["kilos"];
            $metros       = empty($input["metros"])? 0: $input["metros"];
            $piezas       = empty($input["piezas"])? 0: $input["piezas"];
            $kilogramosmetros = empty($input["kilogramosmetros"])? 0: $input["kilogramosmetros"];
            $lugarEntrega   =  $input["lugarEntrega"];
            $condicionventa = $input["condicionventa"];
            $urgente = $input["urgente"];
            $codigoPieza  = $input["codmaterial"];
            $precio45     = empty($input["precio45"])? 0: $input["precio45"];
            $precioContribucion = empty($input["precioContribucion"])? 0: $input["precioContribucion"];
            $precioCosto = empty($input["precioCosto"])? 0: $input["precioCosto"];
            $forma  = $input["forma"];
            $moneda = $input["tipomoneda"];
            $uso    = $input["uso"];
            $ordencompra = $input["ordencompra"];
            $flecha = $input["flecha"];
            $tratamiento = $input["tratamiento"];
            $ensayo = $input["ensayo"];
            $pestanado = $input["pestanado"];
            $rugosidad = $input["rugosidad"];
            $aplastado = $input["aplastado"];
            $certificado = $input["certificado"];
            $observacionVenta = $input["observacionesVenta"];
            $observacionProduccion = $input["observaciones"];


            $fechaEntrega  = $input["fechaOtro"];

            $recepcion    = explode("/", $fechaEntrega);
            $fechaEntrega        = $recepcion[2]."-".$recepcion[1]."-".$recepcion[0];

            $precio_pasado="";
            $precio_pasado.=($input["porKilo"]=="1"?"k":"");
            $precio_pasado.=($input["porMetro"]=="1"?"m":"");
            $precio_pasado.=($input["porPieza"]=="1"?"p":"");
            $cotizacionId = DB::table('cotizaciones')->insertGetId([
                'estadoid' => $estado,
                'clienteid' => $cliente,
                'fecha' => $fecha,
                'tipoEmbalaje'=>$embalaje,
                'medidaid'=> $medidacotizada_id,
                'durezaMaxima'=>$durezamaxima,
                'durezaMinima'=>$durezaminima,
                'biselado'=>$biselado,
                'tipoAcero'=>$tipoacero,
                'estenciladoid'=>$id_estencilado,
                'tipoReventa'=>$tipoOrden,
                'kilos'=>$kilos,
                'metros'=>$metros,
                'piezas'=>$piezas,
                'kilogrametro'=>$kilogramosmetros,
                'fechaEntrega'=>$fechaEntrega,
                'lugarEntrega'=>$lugarEntrega,
                'condicionVenta'=>$condicionventa,
                'urgente'=> $urgente,
                'precioPasado'=>$precio_pasado,
                'codigoPieza'=>$codigoPieza,
                'pesosx45'=> $precio45,
                'precioxContribucion'=>$precioContribucion,
                'precioxCostos'=>$precioCosto,
                'formaid'=>$forma,
                'tipoMoneda'=>$moneda,
                'uso'=>$uso,
                'observacionVenta'=>$observacionVenta,
                'observacionProduccion'=>$observacionProduccion,
                'ordenCompra'=>$ordencompra,
                'flecha'=>$flecha,
                'tratamientoTermico'=>$tratamiento,
                'ensayoExpansion'=>$ensayo,
                'rugosidad'=> $rugosidad,
                'pestaniado'=>$pestanado,
                'aplastado'=>$aplastado,
                'certificadoid'=>$certificado,
                'mem'=>'0,0'
            ]);

            if($cotizacionId>0)
            {
                $preciometro = empty($input["preciometro"])? 0:$input["preciometro"];
                $preciokilo  = empty($input["preciokilo"])? 0:$input["preciokilo"];
                $preciopieza = empty($input["preciopieza"])? 0:$input["preciopieza"];


                DB::table('preciocotizaciones')->insert([
                    'cotizacionid'=>$cotizacionId,
                    'precioKilo'=>$preciokilo,
                    'precioMetro'=>$preciometro,
                    'precioPieza'=>$preciopieza,
                    'fecha'=> NOW(),
                    'suba'=>0
                ]);
            }

            $idcopia = (int) $input['idcopia'];

            if ($input['accion'] == "C"){
                $sqlcopia = 'SELECT '.
                            "vxo2.id as vxoid ".
                            "FROM ordenproduccion op ".
                            "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
                            "where op.cotizacionid=$idcopia ".
                            "and vxo2.version=(SELECT MAX(vxo.version) ".
                            "from ordenproduccion op ".
                            "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
                            "where op.cotizacionid=$idcopia and ".
                            "vxo.ordenProduccion=vxo2.ordenProduccion ".
                            "GROUP BY (vxo.ordenProduccion) ) LIMIT 1 ;";
                
                $rescopia = DB::select($sqlcopia);
                if (count($rescopia)>0){
                    $dataOr = $rescopia[0]->vxoid;

                    $this->procesoCopiado($dataOr, $cotizacionId, null, null, True, null,  null);
                }
                else{
                    $this->procesoCopiado($idcopia, $cotizacionId, null, null, null, null,  null);
                }
            }
            else{
                for ($i=1;$i<16;$i++){
                    DB::table('procesosxcp')->insert([
                        'tipoProceso'=>$i,
                        'idCP'=>$cotizacionId,
                        'procesoid'=>0,
                    ]);
                }                 
            }


             if($seguimiento=="1"){

                $fechaPrometida  = $input["fechaPrometida"];
                $recepcion       = explode("/", $fechaPrometida);
                $fechaPrometida  = $recepcion[2]."-".$recepcion[1]."-".$recepcion[0];
                $prioridad = $input["prioridad"];
                $usuario   = $input["usuario"];
                $titulo    = $input["titulo"];
                $comentarios = $input["comentariosSeguimiento"];

                $seguimientoId = DB::table('crm_cliente')->insert([
                    'usuario_id'=>$usuario,
                    'cliente_id'=>$cliente,
                    'prioridad_id'=>$prioridad,
                    'fecha_prometida'=>$fechaPrometida,
                    'titulo'=>$titulo,
                    'comentarios'=>$comentarios,
                    'cotizacion_id'=>$cotizacionId
                ]);

            }

       }

        return response()->json(['resultado'=>$cotizacionId]);
    	
    }

    public function listado_precios(Request $request)
    {
        $condiciones .= " AND co.clienteid=";
        $condiciones .= " AND mc.costuraid=";
        $condiciones .= " AND co.tratamientoTermico=";
        $condiciones .= " AND co.uso=";


        $sql = "SELECT mc.medida as medida,tt.descripcion as ttermico,medor.diametroExterior
                        as diamext, co.fecha as fecha,medor.espesorNominal as espesor,c.razon as razon,co.codigoPieza as codigoCliente,pc.precioMetro as precioMetro,pc.precioKilo as precioKilo,pc.precioPieza as precioPieza,    
                        pc.fecha as fechaPrecio, co.id ,mon.descripcion as monedita
                         FROM cotizaciones co
                         LEFT JOIN clientes c ON (c.id = co.clienteid)
                         LEFT JOIN medidasCotizadas mc ON (mc.id = co.medidaid)                      
                         LEFT JOIN estadoCotizacion ec ON (ec.id = co.estadoid)
                         LEFT JOIN procesosxCP pxcp ON (pxcp.idCP = co.id and pxcp.tipoProceso=1 )
                         LEFT JOIN preparacionMP pmp ON (pmp.id = pxcp.procesoid)
                         LEFT JOIN medidas medor ON (medor.id = pmp.medidaid)
                         LEFT JOIN usoFinal uf  ON (uf.id = co.uso)
                            LEFT JOIN monedas mon  ON (mon.id = co.tipoMoneda)
                         LEFT JOIN precioCotizaciones pc ON (pc.cotizacionid = co.id and pc.fecha = (SELECT max(fecha) from precioCotizaciones where cotizacionid=co.id))
                         LEFT JOIN estadofabricacion tt ON (tt.id = co.tratamientoTermico)
                         WHERE 1=1 $condiciones
                         ORDER by medida, fechaPrecio desc
                    ";

    }

    public function editcotizacion(Request $request)
    {
        $id_cotizacion = (int) $request->get('id');
        $row = null;

        $sql = 'SELECT '.
               "pmp.medidaid,pmp.precio as precioMP,m.*,c.*,m.id as medid, ".
               "est.largoMaximo as largomaxest,est.numeroColada as numeroColada, ".
               "est.largoMinimo as largominest,est.id as ideste,tc.descripcion as costu,tt.descripcion as tt, ".
               "est.normaid as tiponormaest,est.tipoCostura as  tipocosturaest, ".
               "est.observaciones as observaeste,est.medida as med, pc.precioMetro, pc.precioKilo, pc.precioPieza, ".
               "c.estadoid as estadocoti, medor.diametroExterior as dexor,medor.espesorNominal as espor, ".
               "
                    crm_cliente.usuario_id as usuarioSeguimiento,
                    crm_cliente.prioridad_id as prioridadSeguimiento,
                    crm_cliente.fecha_prometida as fecha_prometidaSeguimiento,
                    crm_cliente.estado as estadoSeguimiento,
                    crm_cliente.titulo as tituloSeguimiento,
                    crm_cliente.comentarios as comentarioSeguimiento,

                    usuarios.usuario as usuarioSeguimientoNombre
               ".
               "FROM  cotizaciones c ".
               
               "LEFT JOIN crm_cliente on crm_cliente.cotizacion_id = c.id ".
               "LEFT JOIN usuarios on usuarios.id = crm_cliente.usuario_id ".
               "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
               "LEFT JOIN estencilado est ON (est.id = c.estenciladoid) ".
               "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = c.id and pxcp.tipoProceso=1 ) ".
               "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
               "LEFT JOIN medidas medor ON (medor.id = pmp.medidaid) ".
               "LEFT JOIN tipocostura tc ON (tc.id = m.costuraid) ".
               "LEFT JOIN estadofabricacion tt ON (tt.id = c.tratamientoTermico) ".
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
               "(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=$id_cotizacion)) where ".
               " c.id=$id_cotizacion LIMIT 1 ;";
        $db = DB::select($sql);

        if (count($db)>0){
            $row = $db[0];
            
            if ($row->estadoid==3){
                $sql1 = 'SELECT '.
                       "pmp.medidaid,pmp.precio as precioMP,m.*, c.*,vxo.*,m.id as medid,est.largoMaximo as largomaxest, ".
                       "est.numeroColada as numeroColada, est.largoMinimo as largominest, ".
                       "est.id as ideste,tc.descripcion as costu,tt.descripcion as tt, est.normaid as tiponormaest, ".
                       "est.tipoCostura as tipocosturaest,est.observaciones as observaeste,est.medida as med, ".
                       "pc.precioMetro,pc.precioKilo,pc.precioPieza,c.precioPasado,c.tipoMoneda, ".
                       "medor.diametroExterior as dexor, medor.espesorNominal as espor,c.estadoid as estadocoti ".
                       "FROM  ordenproduccion op ".
                       "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
                       "INNER JOIN cotizaciones c ON (c.id = op.cotizacionid) ".
                       "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                       "LEFT JOIN estencilado est ON (est.id = vxo.estenciladoid) ".
                       "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = c.id and pxcp.tipoProceso=1 ) ".
                       "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
                       "LEFT JOIN medidas medor ON (medor.id = pmp.medidaid) ".
                       "LEFT JOIN tipocostura tc ON (tc.id = m.costuraid) ".
                       "LEFT JOIN estadofabricacion tt ON (tt.id = vxo.tratamientoTermico) ".
                       "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha".
                       "=(SELECT MAX(fecha) ".
                       "from preciocotizaciones where cotizacionid=$id_cotizacion)) ".
                       "where op.cotizacionid=$id_cotizacion and vxo.version=".
                       "(SELECT MAX(vxo2.version) ".
                       "from ordenproduccion op ".
                       "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
                       "WHERE vxo2.ordenProduccion=vxo.ordenProduccion ".
                       "GROUP BY (vxo2.ordenProduccion) ) ;";
                $db1 = DB::select($sql1);
                if (count($db1)>0)
                    $row = $db1[0];
            }
        }
        // dd($row);
        return response()->json($row);
    }

    public function updatecotizacion(Request $request)
    {
        $input = $request->all();
        $idm = (int) $input['producto_id'];
        $nombre_medida = "";
        $nombre_medida.= empty($input["nombreCliente"])? "" : $input["nombreCliente"]." ";
        $nombre_medida.= empty($input["diametroExteriorNominal"])? "" : $input["diametroExteriorNominal"]." x ";
        $nombre_medida.= empty($input["espesorNominal"])?"":$input["espesorNominal"]." x ";
        $nombre_medida.= empty($input["largoMinimo"])?"":$input["largoMinimo"]." / ";
        $nombre_medida.= empty($input["largoMaximo"])?"":$input["largoMaximo"]." ";
        $nombre_medida.= empty($input["costura"])?"":$input["nombrecostura"]." ";
        $nombre_medida.= empty($input["tipoacero"])?"":$input["nombretipoacero"]." ";

        $diametroExteriorNominal = empty($input["diametroExteriorNominal"])? 0: $input["diametroExteriorNominal"];
        $diametroExteriorMaximo  = empty($input["diametroExteriorMaximo"])?  0: $input["diametroExteriorMaximo"];
        $diametroExteriorMinimo  = empty($input["diametroExteriorMinimo"])?  0: $input["diametroExteriorMinimo"];
        $diametroInteriorNominal = empty($input["diametroInteriorNominal"])? 0: $input["diametroInteriorNominal"];
        $diametroInteriorMaximo  = empty($input["diametroInteriorMaximo"])?  0: $input["diametroInteriorMaximo"];
        $diametroInteriorMinimo  = empty($input["diametroInteriorMinimo"])?  0: $input["diametroInteriorMinimo"];
        $espesorNominal  = empty($input["espesorNominal"])? 0: $input["espesorNominal"];
        $espesorMaximo   = empty($input["espesorMaximo"])? 0: $input["espesorMaximo"];
        $espesorMinimo   = empty($input["espesorMinimo"])? 0: $input["espesorMinimo"];
        $largoMaximo     = empty($input["multiplomax"])? 0: $input["multiplomax"];
        $largoMinimo     = empty($input["multiplomin"])? 0: $input["multiplomin"];
        $largoMaxEntrega = empty($input["largoMaximoEntrega"])? 0: $input["largoMaximoEntrega"];
        $largoMinEntrega = empty($input["largoMinEntrega"])? 0: $input["largoMinEntrega"];
        $normaid         = $input["norma"];
        $costuraid       = $input["costura"];

        $medidaId = $input['producto_id'];

        if ($idm){
            $medidacotizada_id = DB::table('medidascotizadas')->where('id', '=', $idm)->update([
                'medida'=>$nombre_medida,
                'diametroExteriorNominal'=>$diametroExteriorNominal,
                'diametroExteriorMaximo'=>$diametroExteriorMaximo,
                'diametroExteriorMinimo'=>$diametroExteriorMinimo,
                'diametroInteriorNominal'=>$diametroInteriorNominal,
                'diametroInteriorMaximo'=>$diametroInteriorMaximo,
                'diametroInteriorMinimo'=>$diametroInteriorMinimo,
                'espesorNominal'=>$espesorNominal,
                'espesorMaximo'=>$espesorMaximo,
                'espesorMinimo'=>$espesorMinimo,
                'largoMaximo'=>$largoMaximo,
                'largoMinimo'=>$largoMinimo,
                'largoMaxEntrega'=>$largoMaxEntrega,
                'largoMinEntrega'=>$largoMinEntrega,
                'normaid'=>$normaid,
                'costuraid'=>$costuraid,
                'producto_id'=>$medidaId
            ]);
        }

        $atributo = DB::table('atributosproducto')->where('cliente_id', '=', $input['cliente'])->first();
        if (!$atributo){
            $atributosdd = DB::table('atributosproducto')->insert([
                'cliente_id'=>$input['cliente'],
                'producto_id'=>$medidaId,
                'durezamin'=>$input['durezaminima'],
                'durezamax'=>$input['durezamaxima'],
                'rugosidad'=>$input['rugosidad'],
                'ensayoexp'=>$input['ensayo'],
                'usoid'=>$input['uso'],
                'certificadoid'=>$input['certificado'],
                'embalajeid'=>$input['embalaje'],
                'codigocliente'=>$input['codmaterial'],
                'largominentrega'=>$input['largoMinEntrega'],
                'largomaxentrega'=>$input['largoMaximoEntrega'],
                'multiplomin'=>$input['multiplomin'],
                'multiplomax'=>$input['multiplomax'],
            ]);            
        }
        else{
            $atributosup = DB::table('atributosproducto')->where('cliente_id', '=', $input['cliente'])->update([
                'producto_id'=>$medidaId,
                'durezamin'=>$input['durezaminima'],
                'durezamax'=>$input['durezamaxima'],
                'rugosidad'=>$input['rugosidad'],
                'ensayoexp'=>$input['ensayo'],
                'usoid'=>$input['uso'],
                'certificadoid'=>$input['certificado'],
                'embalajeid'=>$input['embalaje'],
                'codigocliente'=>$input['codmaterial'],
                'largominentrega'=>$input['largoMinEntrega'],
                'largomaxentrega'=>$input['largoMaximoEntrega'],
                'multiplomin'=>$input['multiplomin'],
                'multiplomax'=>$input['multiplomax'],
            ]); 
        }

        $estencilado = $input["estencilado"];
        $estenciladoid = $input["estenciladoid"];
        $seguimiento = $input["crearSeguimiento"];
        
        $largominimoEstencilado = empty($input["multiplomin"])? 0:$input["multiplomin"];
        $largomaximoEstencilado = empty($input["multiplomax"])? 0:$input["multiplomax"];
        $normaEstencilado = $input["tiponormaestencilado"];
        $numeroColada =  empty($input["numerocoladaestencilado"])? 0:$input["numerocoladaestencilado"];
        $medidaEstencilado = empty($input["medidaestencilado"])? 0:$input["medidaestencilado"];
        $tipoCosturaEstencilado = $input["costuraestancilado"];
        $observacionesEstencilado =  $input["observacionesestencilado"];

        if($estenciladoid>0)
            {
                $id_estencilado = DB::table('estencilado')->where('id', '=', $estenciladoid)->update([
                    'largoMinimo' =>$largominimoEstencilado,
                    'largoMaximo' =>$largomaximoEstencilado,
                    'normaid' => $normaid,
                    'numeroColada'=>$numeroColada,
                    'medida'=>$nombre_medida,
                    'tipoCostura'=>$costuraid,
                    'observaciones'=>$observacionesEstencilado
                ]);
            }
            else
            {
                $id_estencilado = DB::table('estencilado')->insertGetId([
                    'largoMinimo' =>$largominimoEstencilado,
                    'largoMaximo' =>$largomaximoEstencilado,
                    'normaid' => $normaid,
                    'numeroColada'=>$numeroColada,
                    'medida'=>$nombre_medida,
                    'tipoCostura'=>$costuraid,
                    'observaciones'=>$observacionesEstencilado
                ]);
            }

        $idcoti = (int) $input['idcoti'];

        //$estado       = $input["estado"];
        $cliente      = $input["cliente"];

        $fecha        = $input["fecha"];
        $recepcion    = explode("/", $fecha);
        $fecha        = $recepcion[2]."-".$recepcion[1]."-".$recepcion[0];


        $embalaje     = $input["embalaje"];
        $biselado     = $input["biselado"];
        $durezamaxima = empty($input["durezamaxima"])? 0: $input["durezamaxima"];
        $durezaminima = empty($input["durezaminima"])? 0: $input["durezaminima"];
        $tipoacero    = $input["tipoacero"];
        $tipoOrden    = $input["tipoOrden"];
        $kilos        = empty($input["kilos"])? 0: $input["kilos"];
        $metros       = empty($input["metros"])? 0: $input["metros"];
        $piezas       = empty($input["piezas"])? 0: $input["piezas"];
        $kilogramosmetros = empty($input["kilogramosmetros"])? 0: $input["kilogramosmetros"];
        $lugarEntrega   =  $input["lugarEntrega"];
        $condicionventa = $input["condicionventa"];
        $urgente = $input["urgente"];
        $codigoPieza  = $input["codmaterial"];
        $precio45     = empty($input["precio45"])? 0: $input["precio45"];
        $precioContribucion = empty($input["precioContribucion"])? 0: $input["precioContribucion"];
        $precioCosto = empty($input["precioCosto"])? 0: $input["precioCosto"];
        $forma  = $input["forma"];
        $moneda = $input["tipomoneda"];
        $uso    = $input["uso"];
        $ordencompra = $input["ordencompra"];
        $flecha = $input["flecha"];
        $tratamiento = $input["tratamiento"];
        $ensayo = $input["ensayo"];
        $pestanado = $input["pestanado"];
        $rugosidad = $input["rugosidad"];
        $aplastado = $input["aplastado"];
        $certificado = $input["certificado"];
        $observacionVenta = $input["observacionesVenta"];
        $observacionProduccion = $input["observaciones"];


        $fechaEntrega  = $input["fechaOtro"];

        if ($fechaEntrega){
            $recepcion    = explode("/", $fechaEntrega);
            $fechaEntrega        = $recepcion[2]."-".$recepcion[1]."-".$recepcion[0];          
        }
        else{
            $fechaEntrega = null;
        }

        if ($input['porKilo'] == "1"){
            $precio_pasado="k";
        }
        else if ($input['porMetro'] == "1"){
            $precio_pasado = "m";
        }
        else{
            $precio_pasado = "p";
        }

        //$precio_pasado="";
        //$precio_pasado.=(empty($input["preciokilo"])?"":"k");
        //$precio_pasado.=(empty($input["preciometro"])?"":"m");
        //$precio_pasado.=(empty($input["preciopieza"])?"":"p");

        $cotizacionId = DB::table('cotizaciones')->where('id', '=', $idcoti)->update([
            'clienteid' => $cliente,
            'fecha' => $fecha,
            'tipoEmbalaje'=>$embalaje,
            'medidaid'=> $idm,
            'durezaMaxima'=>$durezamaxima,
            'durezaMinima'=>$durezaminima,
            'biselado'=>$biselado,
            'tipoAcero'=>$tipoacero,
            'estenciladoid'=>$id_estencilado,
            'tipoReventa'=>$tipoOrden,
            'kilos'=>$kilos,
            'metros'=>$metros,
            'piezas'=>$piezas,
            'kilogrametro'=>$kilogramosmetros,
            'fechaEntrega'=>$fechaEntrega,
            'lugarEntrega'=>$lugarEntrega,
            'condicionVenta'=>$condicionventa,
            'urgente'=> $urgente,
            'precioPasado'=>$precio_pasado,
            'codigoPieza'=>$codigoPieza,
            'pesosx45'=> $precio45,
            'precioxContribucion'=>$precioContribucion,
            'precioxCostos'=>$precioCosto,
            'formaid'=>$forma,
            'tipoMoneda'=>$moneda,
            'uso'=>$uso,
            'observacionVenta'=>$observacionVenta,
            'observacionProduccion'=>$observacionProduccion,
            'ordenCompra'=>$ordencompra,
            'flecha'=>$flecha,
            'tratamientoTermico'=>$tratamiento,
            'ensayoExpansion'=>$ensayo,
            'rugosidad'=> $rugosidad,
            'pestaniado'=>$pestanado,
            'aplastado'=>$aplastado,
            'certificadoid'=>$certificado,
            'mem'=>'0,0'
        ]);

        $preciometro = empty($input["preciometro"])? 0:$input["preciometro"];
        $preciokilo  = empty($input["preciokilo"])? 0:$input["preciokilo"];
        $preciopieza = empty($input["preciopieza"])? 0:$input["preciopieza"];

        DB::table('preciocotizaciones')->where('cotizacionid', '=', $idcoti)->update([
            'precioKilo'=>$preciokilo,
            'precioMetro'=>$preciometro,
            'precioPieza'=>$preciopieza,
            'fecha'=> NOW(),
            'suba'=>0
        ]);

         if($seguimiento=="1"){

            $fechaPrometida  = $input["fechaPrometida"];
            $recepcion       = explode("/", $fechaPrometida);
            $fechaPrometida  = $recepcion[2]."-".$recepcion[1]."-".$recepcion[0];
            $prioridad = $input["prioridad"];
            $usuario   = $input["usuario"];
            $titulo    = $input["titulo"];
            $comentarios = $input["comentariosSeguimiento"];

            $seguimientoId = DB::table('crm_cliente')->insert([
                'usuario_id'=>$usuario,
                'cliente_id'=>$cliente,
                'prioridad_id'=>$prioridad,
                'fecha_prometida'=>$fechaPrometida,
                'titulo'=>$titulo,
                'comentarios'=>$comentarios
            ]);

        }

        return response()->json(['resultado'=>$idcoti]);

    }

    public function procesoCopiado($idcopia,$idnueva,$esOP=false,$new=false,$pegarOrdenEnCoti=false,$idor=false, $verop)
    {
        $table = array('preparacionmp'
        ,'horno'
        , 'batea'
        , 'punta'
        , 'trefila'
        , 'enderezadora'
        , 'corte'
        , 'eddycurrent'
        , 'pruebahidraulica'
        , 'estencilado'
        , 'empaquetado'
        , 'controlfinal'
        , 'entrega'
        , 'servicio'
        , 'procesocertificado');

        $tblRun = array('preparacionmprun'
        ,'hornorun'
        , 'batearun'
        , 'puntarun'
        , 'trefilarun'
        , 'enderezadorun'
        , 'corterun');


        if (!isset($verop))
            $verop = $idcopia;

        if (($new==1 or (!$esOP)) and (!$pegarOrdenEnCoti)){
            $sql1 = "SELECT * from ordenprocesocotizacion where idCotizacion=$idcopia ;";
            $r1 = DB::select($sql1);
        }
        else{
            $sql1 = 'SELECT '.
                    "* from ordenprocesoop where idOrdenProduccion=$verop ;";

            $r1 = DB::select($sql1);
        }        

        $fromTabla = ($esOP)?'procesosxop':'procesosxcp';


        if (count($r1)>0){
            $procesos = explode(",", $r1[0]->orden);
            $cont = 1;
            $orden = [];
            foreach ($procesos as $valt){
                $parser = explode("*",$valt);
                $val = $parser[0];
                $idprocparticular = $parser[1];

                $idp=0;
                $ix = $val-1;

                $arraycols = array();
                $sql2 = "SHOW COLUMNS FROM $table[$ix]";
                $r2 = DB::select($sql2);

                foreach ($r2 as $tr ) {
                    if ($tr->Field)
                        $arraycols[] = $tr->Field;
                }

                $arraycols = array_slice($arraycols, 1);
                $stringcols = implode(",",$arraycols);

                $and = "";
                if ($idprocparticular>0)
                    $and = "and procesoid=$idprocparticular";
                else
                    $idp = 0;


                $idCopy = (($new==1 or (!$esOP)) and (!$pegarOrdenEnCoti))?$idcopia:$verop;

                $fromtbl = (($new==1 or (!$esOP)) and (!$pegarOrdenEnCoti))?'procesosxcp':'procesosxop';

                $sql3 = 'SELECT '.
                        "procesoid FROM  $fromtbl WHERE idCP=$idCopy and tipoProceso=$val $and ";
                $r3 = DB::select($sql3);

                if (count($r3) > 0){

                    $db1 = 'INSERT '.
                            "INTO  $table[$ix] SELECT 0,$stringcols FROM $table[$ix] WHERE id=".$idprocparticular."";
                    $res = DB::select($db1);

                    if (count($res)==0){
                        $idp = 0;
                        $a = "SELECT id FROM $table[$ix] ORDER BY id DESC LIMIT 1 OFFSET 0;";
                        $b = DB::select($a);
                        $idp= $b[0]->id;
                    }

                    if ($ix==3){ // PARA PUNTA DEBO ELEGIR tb pasadaxPunta
                        $sql4 = "SELECT * from pasadasxpunta where puntaid=$idprocparticular;";
                        $rpta = DB::select($sql4);
                        $dataPta = array();

                        if ($rpta !== []){
                            foreach ($rpta as $tr ) {
                                if ($tr){
                                    $inser2 = DB::table('pasadasxpunta')->insertGetId([
                                        'puntaid'=>$idp,
                                        'largo' => $tr->largo,
                                        'tipoPunta'=> $tr->tipoPunta,
                                        'matriz' => $tr->matriz,
                                        'pasada' => $tr->pasada
                                    ]);
                                }
                            }

                        }
                    }

                    if ($esOP and ($idp>0) and ($val<8)){
                        if ((!$new) and $idor>0){
                            $sql = "UPDATE $tblRun[$ix] set idplan=$idp where idplan=$idprocparticular;";
                            $res = DB::select($sql);
                        }
                        else{
                            $sql = "INSERT INTO $tblRun[$ix] (id,estadoid,idplan) VALUES ('',1,$idp);";
                            $res = DB::select($sql);
                            if ($res != []){
                                $a = DB::select("SELECT LAST_INSERT_ID() AS 'ID' FROM $tblRun[$ix];");
                                $idProRun= $a[0]->ID;                        
                            }
                        }

                        if (!$new and $idor>0){
                            $sql = "UPDATE tiemposproduccion set procesoid=$idp where
                                ordenProduccion=$verop and tipoProceso=$val and procesoid=$idprocparticular ;";
                            $res = DB::select($sql);

                            $sql2 = "UPDATE subprocesosestado SET ordenProduccion=$idnueva,idplan=$idp where ordenProduccion=$verop and tipoProceso=$val and idplan=$idprocparticular ;";
                            $res2 = DB::select($sql2);
                        }
                        else {
                            $sql = "INSERT into  subprocesosestado  VALUES ($idProRun,$val,1,$idnueva,$idp,$cont) ;";
                            $res = DB::select($sql);

                        }

                    }

                }
                $orden[]= $val."*".$idp;

                $sql = "INSERT INTO $fromTabla VALUES ($idnueva,$val,$idp)";
                $res = DB::select($sql);
            }
            $nuevoOrden = implode(",",$orden);
        }
        else{
            $limit = ($esOP)?8:16;
            for ($i=1;$i<$limit;$i++){
                $sql = "INSERT INTO $fromTabla VALUES ($idnueva,$i,0)";
                $res = DB::select($sql);
                $orden[]= $i."*0";
                $nuevoOrden = implode(",",$orden);
            }
        }
        $tablaOrden = ($esOP)?'ordenprocesoop':'ordenprocesocotizacion';
        $sql = "INSERT INTO $tablaOrden VALUES ($idnueva,'".$nuevoOrden."')";
        $res = DB::select($sql);

        $this->actualizarTiempoProcesos();
        return "true";

    }

    public function actualizarTiempoProcesos(){
        $sql = 'SELECT '.
               "vxo2.ordenProduccion as idorden, vxo2.fechaInicio as fecha, ".
               "vxo2.fechaPrometida as fechaPr, se.idplan, ".
               "IF(vxo2.kilos>0,vxo2.kilos,round(vxo2.metros*((mc.diametroExteriorNominal -".
               " mc.espesorNominal) * mc.espesorNominal * 0.0246),2)) as kilos, ".
               "vxo2.id as idver,se.tipoProceso,op.estadoid as estOP,se.procesoid as procid, ".
               "se.estadoid as estSubp ".
               "from ordenproduccion op ".
               "INNER JOIN ( SELECT MAX( version ) version, ordenProduccion, id ".
               "FROM versionesxorden as vs3 GROUP BY vs3.ordenProduccion ".
               ")V ON ( op.id = V.ordenProduccion ) ".
               "INNER JOIN versionesxorden vxo2 ON ( vxo2.ordenProduccion = ".
               "op.id and vxo2.version = V.version) ".
               "INNER JOIN medidascotizadas mc ON (mc.id = vxo2.medidaid) ".
               "INNER JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
               "se.tipoProceso=1) where op.estadoid IN (2,3) ".
               "order by vxo2.urgente desc,vxo2.fechaPrometida asc,vxo2.id asc ;";

        $res = DB::select($sql);
        $res2 = DB::select($sql);
        $idsOrden = array();
        $idsOrden[] = 0;

        if (count($res) > 0){
            foreach ($res as $r) {
                if ($r->estOP == 2){
                    $idsOrden[] = $r->idorden;
                }
                else {


                }
            }
        }

        $delete = DB::select("DELETE FROM tiemposproduccion");

        if ($delete == []){
            foreach ($res2 as $r) {
                if (!(empty($r->idplan))){
                    $this->insertarTiempoProceso($r->idorden, $r->kilos, $r->tipoProceso, $r->fecha, $r->idplan, $r->estSubp);
                }

            }
        }

    }

    public function insertarTiempoProceso($oid,$kilos,$tipoProc,$fecha,$idplan,$estado){
        $tblRun = array(''
        ,'preparacionmprun'
        ,'hornorun'
        , 'batearun'
        , 'puntarun'
        , 'trefilarun'
        , 'enderezadorun'
        , 'corterun');



        $tope = DB::table('topes')->where('tipoProceso', '=', $tipoProc)->first();

        if (!$tope)
            return false;

        if ($estado==4){

            $day = $this->sumaDia(date('Y-m-d'), -1);
        }
        else {
            $diffecha = $this->restaFechaSql(date('Y-m-d'), $fecha);
            // SI ESTA EN PLANTA O SI LA FECHA A INSERTAR ES ANTERIOR AL DIA ACTUAL; TOMO A PARTIR DE HOY.
            if ($diffecha<0 ) //
                $fecha = date('Y-m-d');

            $dataArray = array($fecha,$tipoProc,$oid,$idplan,$kilos);
            $day = $this->insertarDia($tope->tope, $dataArray);
        }

        if (!$day)
            return false;

        $nextDay = $this->sumaDia($day, 1);

        $sql ="SELECT orden, ordenProduccion as ordProd FROM subprocesosestado where
                tipoProceso=$tipoProc
                and idplan=$idplan";

        $exesubproc = DB::select($sql);
        if (count($exesubproc)>0){
            $dataSP = $exesubproc[0];//BUSCO DATA DEL SIGUIENTE PROCESO, SI ES QUE HAY
            $sql = "SELECT * FROM subprocesosestado where
                    orden=".($dataSP->orden +1)."
                    and ordenProduccion=".$dataSP->ordProd." ";

            $exespNext = DB::select($sql);

            if (count($exespNext)>0){
                $dataNextProc = $exespNext[0];

                $this->insertarTiempoProceso($oid,$kilos,$dataNextProc->tipoProceso, $nextDay,$dataNextProc->idplan, $dataNextProc->estadoid);
            }
            else
                return false;
        }
        return false;
    }

    public function insertarDia($tope,$data){
        $newFecha = $this->fechaDisponible($data[1],$data[0]);

        if (!$newFecha)
            return false;

        $data[0] = $newFecha;

        $sql = "SELECT SUM(kilos) as  kilosdia from tiemposproduccion where fecha='$newFecha' and tipoProceso=$data[1] GROUP BY fecha";

        $res = DB::select($sql);

        $disponible = 0;

        if (count($res)>0){
            $datatp = $res[0];
            $disponible = $tope-$datatp->kilosdia;            
        }
        else{
            $disponible = $tope;
        }
     

        if ($data[4]<=$disponible){ 

            $sql= DB::table('tiemposproduccion')->insert([
                'fecha' =>$data[0],
                'tipoProceso' =>$data[1],
                'ordenProduccion' => $data[2],
                'procesoid' => $data[3],
                'kilos' => $data[4]
            ]);

            return $newFecha;
        }
        else{

            $kilajeInsert = $disponible;
            $kilosRestantes = $data[4] - $kilajeInsert;
            $data[4] = $kilajeInsert;

            if ($disponible>0){
                $sql= DB::table('tiemposproduccion')->insert([
                    'fecha' =>$data[0],
                    'tipoProceso' =>$data[1] ,
                    'ordenProduccion' => $data[2],
                    'procesoid' => $data[3],
                    'kilos' => $data[4]
                ]);
            }

            if ($kilosRestantes==0){

                return $newFecha;
            }
            else{
                $data[4] = $kilosRestantes;
                $data[0] = $this->sumaDia($newFecha, 1);// A PARTIR DE MAÑANA YA QUE HOY NO HABIA MAS LUGAR
                //dd($data[0]);
                return $this->insertarDia($tope,$data);
            }

        }

        //$exetp = $db->execute();

    }

    function fechaDisponible($tp,$fecha){
        if ($tp==2 or $tp==3){
            $sql = "SELECT MIN(fecha) as fecha from calendario where fecha>='$fecha' and incidente=$tp GROUP BY incidente";
            $respH = DB::select($sql);

            if (count($respH)>0){

                return $dataHo[0]->fecha;
            }
            else // NO SE CARGARON DIAS DE ENCENDIDO DE HORNO POSTERIORES A LA ORDEN
                return false;
        }
        else{
            // SI DEVUELVO 1 ES PORQ NO SE PUEDE
            // VEO Q EN ESE DIA, SI HAY MAQUINA ROTA  SEA LA Q ESTOY BUSCANDO, O Q ESE DIA SEA FERIADO O Q SEA SABADO O DOMINGO
            $sql ="SELECT 1
                    FROM calendario
                    WHERE
                    (
                    (fecha =  '$fecha'
                    AND (
                    (incidente = 4 AND tipoProceso =$tp)
                    OR incidente =1
            )
            )
                    OR DATE_FORMAT('$fecha',  '%w' ) IN ( 0, 6 )

            ) ";
            $resp = DB::select($sql);

            if (count($resp)>0){

                $fecha= $this->sumaDia($fecha,1);// SUMO UN DIA Y VEO SI MAÑANA SE PUEDE; ASI HASTA Q ENCUENTRE DIA
                return $this->fechaDisponible($tp,$fecha);

            }
            else{

                return $fecha;
            }
        }
    }

    public function sumaDia($fecha,$dia)// FORMATO SQL
    {
        list($year,$mon,$day) = explode('-',$fecha);
            
        return date('Y-m-d', mktime(0,0,0,$mon,($day+$dia),$year));

    }

    public function restaFechaSql($dFecIni,$dFecFin){
        $dFecIni = str_replace("-","",$dFecIni);
        $dFecFin = str_replace("-","",$dFecFin);

        preg_match( "/([0-9]{2,4})([0-9]{1,2})([0-9]{1,2})/", $dFecIni, $aFecIni);
        preg_match( "/([0-9]{2,4})([0-9]{1,2})([0-9]{1,2})/", $dFecFin, $aFecFin);

        $date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[3], $aFecIni[1]);
        $date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[3], $aFecFin[1]);

        return round(($date2 - $date1) / (60 * 60 * 24));
           
    }

    public function RechazarCotizacion(Request $request)
    {
        $id = (int) $request->get('id_coti');
        $estado = (int) $request->get('estado');
        $rechazoid = (int) $request->get('re_rechazoid');
        $detalle = $request->get('re_dettalle');
        $file_img = $request->file('re_file');
        $fileName = "";

        if ($file_img){
            $mime = $request->file('re_file')->getMimeType();
            $extension = strtolower($file_img->getClientOriginalExtension());
            $path = "uploads";

            switch ($mime)
                {
                    case "image/jpeg":
                    case "image/png":
                    case "image/gif":
                    case "application/pdf":

                    if ($file_img->isValid()){
                        $fileName = '/public/uploads/'.uniqid().'.'.$extension;
                        $file_img->move($path, $fileName);
                    }
                    break;
                    default:
                        return "false";
                }            
        }
        $dbcoti = DB::table('cotizaciones')->where('id', '=', $id)->update([
            'estadoid'=>$estado
        ]);

        $path = $fileName;
        if ($rechazoid && $rechazoid !== ""){
            $db = DB::table('cotizacionesrechazadas')->insertGetId([
                'cotizacionid'=>$id,
                'motivoid'=>$rechazoid,
                'detalles'=>$detalle,
                'path'=>$path
            ]);
        }
        $url = '/vercotind/'.$id;

        return redirect($url)->with('success', 'Gasto Agregado');

    }

    public function anular_cot(Request $request)
    {
        $id_cot = (int) $request->get('id');

        $cot = DB::table('cotizaciones')->where('id', '=', $id_cot)->update([
            'estadoid'=>4
        ]);
        return "true";
    }

}
