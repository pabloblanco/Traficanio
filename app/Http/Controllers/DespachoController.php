<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DespachoController extends Controller
{
    public function buscardespachos(Request $request)
    {
        $input = $request->all();
        $q0  = "";
        $q0 .= (empty($input['nrodespachobd']))? "" : " AND dxo.id=".$input['nrodespachobd']."";
        $q0 .= (empty($input['fechadesde']))? "" : " AND dxo.fechaEntrega>='".$input['fechadesde']."'";
        $q0 .= (empty($input['fechahasta']))? "" : " AND dxo.fechaEntrega<='".$input['fechahasta']."'";
        $q0 .= (empty($input['clienteidbd']))? "" : " AND dxo.clienteid=".$input['clienteidbd']."";
        $q0 .= (empty($input['estadoidb']))? "" : " AND dxo.estadoid=".$input['estadoidb']."";
        $q0 .= (empty($input['zonaidbd']))? "" : " AND c.zonaid=".$input['zonaidbd'].""; 
        $q0 .= (empty($input['transporteidbd']))? "" : " AND t.id=".$input['transporteidbd']."";
        
        $sql = 'SELECT '.
               "dxo.id as NdeDespacho, c.razon as Cliente, dxo.fechaEntrega as FechadeEntrega, ".
               "z.descripcion as Zona, dxo.fechaCreacion as FechadeCreacion, ".
               "IF(dxo.reprocesar=1, 'SI', 'NO') as AReprocesar, ed.descripcion as Estado, ".
               "t.id, dxo.id FROM despachosxorden dxo ".
               "LEFT JOIN clientes c ON (c.id = dxo.clienteid) ".
               "LEFT JOIN estadodespachos ed ON (ed.id=dxo.estadoid) ".
               "LEFT JOIN zonas z ON (z.id=c.zonaid) ".
               "LEFT JOIN transportesclientes tc ON (tc.clienteid=c.id) ".
               "LEFT JOIN transportes t ON (t.id=tc.transporteid) ".
               "WHERE 1=1  $q0 GROUP BY dxo.id order by dxo.id desc ;";

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);

    }

    public function procesarControlEntrega(Request $request)
    {
      $datastr = $request->get('data');
      $data = json_decode($datastr);

      foreach ($data as $key) {
        $db = DB::table('despachos')->where('id', '=', $key->despachoid)->update([
          'operarioControl'=> $key->control,
          'operarioDespacho'=> $key->despacho,
          'horaEntrada'=> $key->centrada,
          'horaSalida'=> $key->csalida,
          'lugarEntrega'=> $key->lg,
          'paquetes'=> $key->paquete,
          'numeroRemito'=> $key->remito,
          'estadoid'=> 2,
          'fechaEntrega'=> $key->fechae,
          'fletePropio'=> $key->flete
        ]);

        $this->procesarEstadoDespacho($key->despachoid);

        $this->procesarEstadoOrden($key->despachoid);
      }

      return "true";
    }

    public function procesarEstadoOrden($id)
    {
      $despachoid = $id;

      $sql = 'SELECT '.
             "d.versionesxOrdenid as 'vxoid' FROM despachos d WHERE d.id=$despachoid ;";

      $res = DB::select($sql);

      if (count($res)>0){
        $despacho = $res[0]->vxoid;

        $sql1 = 'SELECT '.
                "SUM(contp.cantidadTubos) as 'Piezas', SUM(contp.metros) as 'Metros', ".
                "SUM(contp.kilos) as 'Kilos', op.id as 'idop' ".
                "from ordenproduccion op ".
                "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
                "LEFT JOIN controlfinal contf ON (contf.idVersion=p.id) ".
                "LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid=contf.id) ".
                "LEFT JOIN controlpaquetes contp ON (contp.id=pxc.controlPaqueteid) ".
                "where p.id=".$despacho." group by p.id";

        $res1 = DB::select($sql1);

        if (count($res1)>0){
          $datos1 = $res1[0];

          $sql2 = 'SELECT '.
                  "SUM(d.kilos) as 'skilos',SUM(d.piezas) as 'spiezas', ".
                  "SUM(d.metros) as 'smetros' ".
                  "FROM despachos d ".            
                  "LEFT JOIN versionesxorden vxo ON (vxo.id = d.versionesxOrdenid) ".
                  "WHERE d.versionesxOrdenid=".$despacho." ;";

          $res2 = DB::select($sql2);

          $saldo = 0;

          if (count($res2)>0){
            $datos = $res2[0];

            if($datos->skilos==NULL){
              $kilos3 = 0;
            }else{
              $kilos3 = $datos->skilos;
            }

            $saldo = $datos1->Kilos - $kilos3;

          }

          if ($saldo == 0){
            $db3 = DB::table('ordenproduccion')->where('id', '=', $datos1->idop)->update([
              'estadoid'=>7
            ]);
          }
        }

      }
    }

    public function procesarEstadoDespacho($id)
    {
      $despachoid = $id;

      $sql = 'SELECT '.
             "d.despachosxOrdenid as 'despacho' FROM despachos d ".
             "WHERE d.id=$despachoid ;";

      $res = DB::select($sql);

      if (count($res)>0){
        $despacho = $res[0]->despacho;

        $sql1 = 'SELECT '.
                "d.id FROM despachos d WHERE d.estadoid=1 and d.despachosxordenid=$despacho; ";

        $res1 = DB::select($sql1);

        if (count($res1)==0){
          $db = DB::table('despachosxorden')->where('id', '=', $despacho)->update([
            'estadoid'=>2
          ]);
        }

      }

      return true;
    }

    public function autorizacion(Request $request)
    {
        $type = $request->get('type');
        if ($type){
            //dd($type);
            $q0  = "";
            $input = $request->all();

            if ($request->get('fechadesdeb')){
                list($dia, $mes, $anio) = explode('/', $request->get('fechadesdeb'));       
                $fechadesdeb = $anio."-".$mes."-".$dia;

            }
            else {
                $fechadesdeb = null;
            }

            if ($request->get('fechahastab')){
                list($dia, $mes, $anio) = explode('/', $request->get('fechahastab'));       
                $fechahastab = $anio."-".$mes."-".$dia;

            }
            else {
                $fechahastab = null;
            }

            $q0 .= (empty($fechadesdeb))? "" : " AND contf.fecha>='".$fechadesdeb."'";
            $q0 .= (empty($fechahastab))? "" : " AND contf.fecha<='".$fechahastab."'";
            $q0 .= (empty($input['clienteidb']))? "" : " AND p.clienteid=".$input['clienteidb']."";
            $q0 .= (empty($input['estadoidb']))? "" : " AND op.estadoid=".$input['estadoidb']."";
            $q0 .= (empty($input['tipoordenidb']))? "" : " AND p.tipoReventa=".$input['tipoordenidb']."";
            $q0 .= (empty($input['zonaidb']))? "" : " AND c.zonaid=".$input['zonaidb']."";

            //$q0 .= (empty($input['fechaHasta']))? "" : " AND cotizaciones.fecha<='".$input['fechaHasta']."'";

            $sql = 'SELECT '.
            "op.id as 'Ordenp', c.razon as Cliente, mc.diametroExteriorNominal as 'DiaExt', ".
            "mc.espesorNominal as 'Esp', tc.descripcion as 'Cost', p.codigoPieza as 'Codigo', ".
            "CASE WHEN co.preciopasado='k' THEN 'KILOS' WHEN co.preciopasado='m' THEN 'METROS' ".
            "ELSE 'PIEZAS' END as 'UM', ".
            "pco.precioKilo as precioKilo, pco.precioMetro as precioMetro, pco.precioPieza as precioPieza, ".
            "SUBSTRING(mon.descripcion, 8, 11) as 'Moneda', p.ordenCompra as 'OrdenCompra', ".
            "n.descripcion as 'norma', entr.direccion as 'entrega', ".
            "(SELECT SUM( contpx.cantidadTubos ) FROM controlfinal contfx ".
            "LEFT JOIN paquetesxcontrol pxcx ON ( pxcx.controlid = contfx.id ) ".
            "LEFT JOIN controlpaquetes contpx ON ( contpx.id = pxcx.controlPaqueteid ) where ".
            "contfx.idVersion = p.id ".
            "GROUP BY contfx.idVersion) as 'Piezas', ".
            "(SELECT SUM(contpx.metros) FROM controlfinal contfx ".
            "LEFT JOIN paquetesxcontrol pxcx ON ( pxcx.controlid = contfx.id ) ".
            "LEFT JOIN controlpaquetes contpx ON ( contpx.id = pxcx.controlPaqueteid ) where ".
            "contfx.idVersion = p.id GROUP BY contfx.idVersion) as 'Metros', ".
            "(SELECT SUM(contpx.kilos) FROM controlfinal contfx ".
            "LEFT JOIN paquetesxcontrol pxcx ON ( pxcx.controlid = contfx.id ) ".
            "LEFT JOIN controlpaquetes contpx ON ( contpx.id = pxcx.controlPaqueteid ) where ".
            "contfx.idVersion = p.id GROUP BY contfx.idVersion) as 'Kilos', ".
            "(SELECT contpx.longitudTubos FROM controlfinal contfx ".
            "LEFT JOIN paquetesxcontrol pxcx ON ( pxcx.controlid = contfx.id ) ".
            "LEFT JOIN controlpaquetes contpx ON ( contpx.id = pxcx.controlPaqueteid ) where ".
            "contfx.idVersion = p.id GROUP BY contfx.idVersion) as 'longitudTubos', ".
            "p.id as 'versionid', es.descripcion as 'estado', es.color, ".
            "co.observacionVenta as observacionVenta,  p.clienteid as 'clienteid', ".
            "co.preciopasado as preciopasado, p.kilogrametro as kilogrametro, z.descripcion as 'Zona' ".
            "FROM ordenproduccion op ".
            "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
            "LEFT JOIN controlfinal contf ON (contf.idVersion = p.id) ".
            "LEFT JOIN certificado cert ON (cert.id = p.certificadoid)  ".
            "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
            "LEFT JOIN normas n ON (n.id = mc.normaid) ".
            "LEFT JOIN clientes c ON (c.id = p.clienteid) ".
            "LEFT JOIN zonas z ON (z.id = c.zonaid) ".
            "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
            "LEFT JOIN monedas mon ON (mon.id = co.tipoMoneda) ".
            "LEFT JOIN preciocotizaciones pco ON (pco.cotizacionid = co.id and pco.fecha = (SELECT ".
            "max(fecha) from preciocotizaciones where cotizacionid=co.id)) ".
            "LEFT JOIN tratamientocotizacion tt ON (tt.id = p.tratamientoTermico) ".
            "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
            "LEFT JOIN procesosxop pxp ON (pxp.tipoProceso = 1 and pxp.idCP=p.id) ".
            "LEFT JOIN preparacionmp mp ON (mp.id = pxp.procesoid) ".
            "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
            "LEFT JOIN estadosop es ON (es.id = op.estadoid) ".
            "LEFT JOIN tipocostura tcm ON (tcm.id = me.tipoCostura) ".
            "LEFT JOIN reventa trev ON (trev.id = p.tipoReventa) ".
            "LEFT JOIN direccionesclientes entr ON (entr.id = p.lugarEntrega) ".
            "WHERE 1=1 and p.version= (SELECT MAX(vxo.version) from ordenproduccion op ".
            "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
            "WHERE vxo.ordenProduccion=p.ordenProduccion GROUP BY (vxo.ordenProduccion) ) ".
            $q0." GROUP BY p.id";

            $results = [];


            set_time_limit(0);
            $resultdb = DB::select($sql);

            foreach ($resultdb as $result) {
                $sqlsum = 'SELECT '.
                          "SUM(d.kilos) as 'skilos', ".
                          "SUM(d.piezas) as 'spiezas', ".
                          "SUM(d.metros) as 'smetros' ".
                          "FROM despachos d ".
                          "LEFT JOIN versionesxorden vxo ON (vxo.id = d.versionesxOrdenid) ".
                          "WHERE d.versionesxOrdenid=$result->versionid;";

                $resultsum = DB::select($sqlsum);

                foreach ($resultsum as $res) {
                    $kilos_saldo =  number_format($result->Kilos - $res->skilos,2,'.','');
                    $metros_saldo =  number_format($result->Metros - $res->smetros,2,'.','');
                    $piezas_saldo =  number_format($result->Piezas - $res->spiezas,2,'.','');                           
                }

                $kgm = $result->kilogrametro;

                $resultpkilo = $result->precioKilo;
                if ($result->precioKilo == "")
                  $resultpkilo = 0;

                if (empty($result->precioMetro)){
                    $pmetro = round($resultpkilo * $kgm,2);
                    $pkilo = $resultpkilo;
                }
                else{
                    $pkilo = round($result->precioMetro / $kgm,2);
                    $pmetro = $result->precioMetro;
                }  
                 
                if($result->preciopasado=='m'){
                    $precioBase = $pmetro;
                }elseif($result->preciopasado=='k'){
                    $precioBase = $pkilo;                                
                }else{
                    $precioBase = $result->precioPieza;
                }

                $results[] = (object)['Ordenp'=> $result->Ordenp, 'Cliente'=> $result->Cliente, 'DiaExt'=>$result->DiaExt, 'Esp'=> $result->Esp, 'Cost'=>$result->Cost, 'Codigo'=>$result->Codigo, 'UM'=>$result->UM, 'precioKilo'=> $result->precioKilo, 'precioMetro'=>$result->precioMetro, 'precioPieza'=> $result->precioPieza, 'Moneda'=>$result->Moneda, 'OrdenCompra'=>$result->OrdenCompra, 'norma'=> $result->norma, 'entrega'=> $result->entrega, 'Piezas'=> $result->Piezas, 'Metros'=>$result->Metros, 'Kilos'=>$result->Kilos, 'longitudTubos'=>$result->longitudTubos, 'versionid'=>$result->versionid, 'estado'=>$result->estado, 'color'=> $result->color, 'observacionVenta'=> $result->observacionVenta, 'clienteid'=>$result->clienteid, 'preciopasado'=>$result->preciopasado, 'kilogrametro'=> $result->kilogrametro, 'Zona'=>$result->Zona, 'kilos_saldo'=> $kilos_saldo, 'metros_saldo'=> $metros_saldo, 'precio'=>$precioBase, 'piezas_saldo'=>$piezas_saldo, 'clienteid'=> $result->clienteid];
            }
        }
        else {
            $results = [];
            
        }
        $estados = DB::table('estadosop')->get();
        $estadosdes = DB::table('estadodespachos')->get();
        $zonas = DB::table('zonas')->get();
        $tipos = DB::table('reventa')->get();
        $clientes = DB::table('clientes')->get();
        $transportes = DB::table('transportes')->get();

        //dd($results);
        return view('despacho.autorizacion', compact('results', 'estadosdes', 'estados', 'zonas', 'tipos', 'clientes', 'transportes'));
    }

    public function historial_despacho($id, $type)
    {
      $sql = 'SELECT '.
             "op.id as 'Orden', c.razon as 'Cliente', mc.diametroExteriorNominal as 'Ext', ".
             "mc.espesorNominal as 'Esp', tc.descripcion as 'Cost', p.codigoPieza as 'CodPieza', ".
             "p.fechaPrometida as 'Fechaprometida', cert.descripcion as 'Certificado', ".
             "p.ordenCompra as 'OrdenCompra', SUM(contp.cantidadTubos) as 'Piezas', SUM(".
             "contp.metros) as 'Metros', ".
             "SUM(contp.kilos) as 'Kilos', ".
             "CASE WHEN co.preciopasado='k' THEN 'KILOS' WHEN co.preciopasado='m' ".
             "THEN 'METROS' ELSE 'PIEZAS' END as 'UM', ".
             "CASE WHEN co.preciopasado='k' THEN pco.precioKilo WHEN co.preciopasado".
             "='m' THEN pco.precioMetro ELSE pco.precioPieza END as 'Precio', ".
             "mon.descripcion as 'Moneda' FROM ordenproduccion op ".
             "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
             "LEFT JOIN controlfinal contf ON (contf.idVersion=p.id) ".
             "LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid=contf.id) ".
             "LEFT JOIN controlpaquetes contp ON (contp.id=pxc.controlPaqueteid) ".
             "LEFT JOIN certificado cert ON (cert.id = p.certificadoid) ".
             "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
             "LEFT JOIN clientes c ON (c.id = p.clienteid) ".
             "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
             "LEFT JOIN monedas mon ON (mon.id = co.tipoMoneda) ".
             "LEFT JOIN preciocotizaciones pco ON (pco.cotizacionid = co.id and pco.".
             "fecha = (SELECT max(fecha) from preciocotizaciones where cotizacionid=co.id)) ".
             "LEFT JOIN tratamientocotizacion tt ON (tt.id = p.tratamientoTermico) ".
             "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
             "LEFT JOIN procesosxop pxp ON (pxp.tipoProceso = 1 and pxp.idCP=p.id) ".
             "LEFT JOIN preparacionmp mp ON (mp.id = pxp.procesoid) ".
             "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
             "LEFT JOIN estadosop es ON (es.id = op.estadoid) ".
             "LEFT JOIN tipocostura tcm ON (tcm.id = me.tipoCostura) ".
             "LEFT JOIN reventa trev ON (trev.id = p.tipoReventa) WHERE 1=1 and p.".
             "version= (SELECT MAX(vxo.version) from ordenproduccion op ".
             "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) WHERE ".
             "vxo.ordenProduccion=p.ordenProduccion GROUP BY (vxo.ordenProduccion) ) AND ".
             "p.id=$id GROUP BY p.id order by op.id desc;";

      $db = DB::select($sql);


      return view('despacho.historial', compact('db', 'id', 'type'));

    }

    public function procesar_despacho(Request $request)
    {
      $procesar = json_decode($request->get('detalles'));
      $iibb = $request->get('iibb');
      $anticipo = $request->get('anticipo');
      $observaciones = $request->get('observaciones');
      $aprocesar = $request->get('aprocesar');
      $fecha = $request->get('fecha');

      foreach ($procesar as $p) {
        if ($p->clienteid){
          $db = DB::table('despachosxorden')->insertGetId([
              'observaciones'=>$observaciones,
              'clienteid'=>$p->clienteid,
              'fechaEntrega'=>$fecha,
              'iibb'=>$iibb,
              'reprocesar'=>$aprocesar,
              'anticipo' => $anticipo
          ]);

          $iddespacho = $db;

          $db2 = DB::table('despachos')->insert([
            'versionesxOrdenid' => $p->versionid,
            'kilos' => $p->kilos,
            'piezas' => $p->piezas,
            'metros' => $p->metros,
            'lugarEntrega' => $p->entrega,
            'despachosxordenid' => $iddespacho,
            'precio' => $p->precio,
            'estadoid' => 1,
            'transporteid' => $p->transporte
          ]);

        }
      }

      return "true";
    }

    public function cliente_despacho($id)
    {
        $idorden = $id;


        $sql = 'SELECT '.
               "dxo.fechaCreacion as 'fechaCreacion', dxo.fechaEntrega as 'fechaEntrega', ".
               "dxo.iibb as iibb, dxo.reprocesar as reprocesar, ".
               "c.razon as 'cliente', c.cuit, c.condicionVenta, dxo.observaciones as ".
               "observaciones, dxo.clienteid as 'clienteid', dxo.anticipo as 'anticipo' ".
               "FROM despachosxorden dxo ".
               "LEFT JOIN clientes c ON (c.id = dxo.clienteid) ".
               "WHERE dxo.id=$idorden ;";

        $db = DB::select($sql);
        if (count($db) > 0){
          $res = $db[0];
          $cliente_id = $res->clienteid;
        }
        else{
          $res = null;
          $cliente_id = null;
        }

        $sql2 = 'SELECT '.
                "d.*, mc.diametroExteriorNominal as 'DiaExtCot', mc.espesorNominal as 'EspCot', ".
                "mc.diametroInteriorNominal as 'DiaIntCot',  tc.descripcion as 'Cost', ".
                "cert.descripcion as 'Certificado', d.versionesxOrdenid as 'Verid', ".
                "vxo.ordenCompra as 'OrdenCompra', vxo.codigoPieza as 'codPieza', ".
                "CASE WHEN co.preciopasado='k' THEN 'KILOS' WHEN co.preciopasado='m' THEN ".
                "'METROS' ELSE 'PIEZAS' END as 'UM', d.precio as 'Precio', ".
                "CASE WHEN co.preciopasado='k' THEN d.precio*d.kilos WHEN ".
                "co.preciopasado='m' THEN d.precio*d.metros ELSE d.precio*d.piezas ".
                "END as 'PrecioOrden', ".
                "SUBSTRING(mon.descripcion, 8, 11) as 'moneda', ed.descripcion as 'estado', ".
                "trans.razon as 'transporte', op.id as 'Orden', vxo.tipoReventa as 'reventa', ".
                "co.mem as 'mem', ".
                "d.lugarEntrega as 'lugarEntrega', no.descripcion as 'norma', ".
                "mon.id as 'monedaid' FROM despachos d ".
                "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
                "LEFT JOIN controlfinal cf ON (cf.idVersion = vxo.id) ".
                "LEFT JOIN medidascotizadas mc ON (mc.id = vxo.medidaid) ".
                "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
                "LEFT JOIN normas no ON (no.id = mc.normaid) ".
                "LEFT JOIN certificado cert ON (cert.id = vxo.certificadoid) ".
                "LEFT JOIN ordenproduccion op ON (op.id = vxo.ordenProduccion) ".
                "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
                "LEFT JOIN monedas mon ON (mon.id = co.tipoMoneda) ".
                "LEFT JOIN estadodespachos ed ON (ed.id=d.estadoid) ".
                "LEFT JOIN transportes trans ON(trans.id=d.transporteid) ".
                "LEFT JOIN preciocotizaciones pco ON (pco.cotizacionid = co.id and pco.".
                "fecha = (SELECT max(fecha) from preciocotizaciones where cotizacionid=".
                "co.id)) WHERE d.despachosxOrdenid=$idorden ;";

        $res2 = DB::select($sql2);

        $datos = [];
        $descripcion = [];
        $PrecioTotal = 0;


        if (count($res2)){
          foreach ($res2 as $tabla ) {

            $datos[] = (object)['Orden'=>$tabla->Orden, 'estado'=>$tabla->estado, 'codPieza'=>$tabla->codPieza, 'DiaExtCot'=> $tabla->DiaExtCot, 'EspCot'=>$tabla->EspCot, 'Cost'=>$tabla->Cost, 'kilos'=>$tabla->kilos, 'piezas'=>$tabla->piezas, 'metros'=>$tabla->metros, 'paquetes'=>$tabla->paquetes, 'Certificado'=>$tabla->Certificado, 'OrdenCompra'=>$tabla->OrdenCompra, 'lugarEntrega'=>$tabla->lugarEntrega, 'transporte'=>$tabla->transporte, 'numeroRemito'=>$tabla->numeroRemito, 'Precio'=> $tabla->Precio, 'UM'=>$tabla->UM, 'PrecioOrden'=>$tabla->PrecioOrden, 'moneda'=>$tabla->moneda, 'id'=>$tabla->id];

            $PrecioTotal = $PrecioTotal+$tabla->PrecioOrden;

            if($tabla->Cost){
                $costura = " ".$tabla->Cost;
            }else{
                $costura = "";
            }
            if($tabla->reventa==2 or $tabla->reventa==3){

                $ordenTipo = "OP";
            }else{

                $ordenTipo = "OR";
            }
            
            $MEMO = explode(',',$tabla->mem);
            
            // SI TIENE MEMORIA MOSTRAMOS LOS PRINCIPALES

            $DiaInt = "";
            
            if (!empty($MEMO[0])){
              if($MEMO[0]==1 or $MEMO[1]==1){
                  $DiaExt = $tabla->DiaExtCot;
                  $por= "x";
              }else{
                  $DiaExt = "";
                  $por2 = "";
              }

              if($MEMO[0]==2 or $MEMO[1]==2){
                  $DiaInt = $tabla->DiaIntCot;
                  $por2= "x";
              }else{
                  $DiaInt = "";
                  $por2 = "";
              }

              if($MEMO[0]==3 or $MEMO[1]==3){
                  $Esp = $tabla->EspCot;
                  $por2 = "";
              }else{
                  $Esp = "";
                  $por2= "";
              }
            }
            else {
                if($tabla->DiaExtCot){
                    $DiaExt = $tabla->DiaExtCot;
                    $por= "x";
                }else{
                    $DiaExt = "";
                }

                if($tabla->EspCot>0){
                    $Esp = $tabla->EspCot;
                    $por2 = "";
                }else{
                    $Esp = "";
                    $por2= "";
                }
            }
            $diametros = ",".$DiaExt.$por.$DiaInt.$por2.$Esp;

            $OC = ",".$ordenTipo.$tabla->Orden;

            if($tabla->codPieza){
                $codPieza = ",COD".$tabla->codPieza;
            }else{
                $codPieza = "";
            }

            if($tabla->UM=="KILOS"){
              $unidad = ",K";
              $primerDato = $tabla->metros."M";
              $segundoDato = $tabla->piezas."P";
              $unidadesMultiplicar = $tabla->kilos;
            }
            if($tabla->UM=="METROS"){
              $unidad = ",M";
              $primerDato = $tabla->kilos."K";
              $segundoDato = $tabla->piezas."P";
              $unidadesMultiplicar = $tabla->metros;
            }
            if($tabla->UM=="PIEZAS"){
              $unidad = ",P";
              $primerDato = $tabla->metros."M";
              $segundoDato = $tabla->kilos."K";
              $unidadesMultiplicar = $tabla->piezas;
            }

            $sele = 'SELECT '.
                    "sub.*, t.punzonid as 'punzon' ".
                    "FROM subprocesosestado sub ".
                    "LEFT JOIN trefila t ON(t.id = sub.procesoid) ".
                    "WHERE sub.ordenProduccion=$tabla->Verid and tipoProceso=5; ";

            $res3 = DB::select($sele);

            $punzon = 0;

            if (count($res3) > 0){
              $punzon = $res3[0]->punzon;
            }

            if($tabla->reventa==2 or $tabla->reventa==3 ){
                if($punzon==0){
                    $trefi = ",T";
                }else{
                    $trefi = ",TyP";
                }
            }else{
                $trefi = "";
            }

            $frase = $primerDato.$segundoDato.$costura.$trefi.$diametros.$OC.$codPieza.$unidad;
            $desc_primera = substr($frase, 0,29);
            $desc_adicional = substr($frase, 29,49);
            $descripcion[] = array($tabla->Verid,$desc_primera,$desc_adicional,$tabla->Precio,$unidadesMultiplicar);


          }

          $iibb = ($PrecioTotal/100)*$res->iibb;
          $iva = $PrecioTotal*0.21;
          $precioFinal = $PrecioTotal+$iva+$iibb;

          $otras = [];

          $otras[] = (object) ['titulo'=>'+ IVA', 'valor'=> number_format($iva,2), 'moneda'=>$tabla->moneda];

          $otras[] = (object) ['titulo'=>'+ IIBB', 'valor'=> number_format($iibb,2),  'moneda'=>$tabla->moneda];

          $otras[] = (object) ['titulo'=>'TOTAL', 'valor'=> number_format($precioFinal,2),  'moneda'=>$tabla->moneda];

          ///INPUT HIDDEN///
          $description = null;
          $idtiporeventa = 0;
          $valortiporeventa = null;
          $cuit = null;
          $condicionVenta = null;
          $moneda = null;
          $monedaid = null;

          if (count($descripcion)>0)
            $description = json_encode($descripcion);

          if ($tabla){
            $idtiporeventa = $tabla->Verid;
            $valortiporeventa = $tabla->reventa;
            $moneda = $tabla->moneda;
            $monedaid = $tabla->monedaid;
          }

          $preciof = $precioFinal;

          if ($res){
            $cuit = $res->cuit;
            $condicionVenta = $res->condicionVenta;

          }


        }


        return view('despacho.cliente', compact('idorden', 'cliente_id', 'res', 'datos', 'otras'));
    }

    public function estadoFacturadoDespacho(Request $request){
      $id = $request->get('id');
      $db = DB::table('despachosxorden')->update([
        'estadoid'=>4,
        'id' => $id
      ]);

      if ($db == "true")
        return "true";

      return "false";
    }

    public function cancelar_despacho(Request $request)
    {
      $id = $request->get('id');

      $db = DB::table('despachos')->where('id', '=', $id)->delete();

      if ($db == 1){
        
        $db2 = DB::table('despachosxorden')->where('id', '=', $id)->where('estadoid', '=', 3)->delete();
      }


      return "true";

    }

    public function guardar_despacho(Request $request)
    {
      $idorden = $request->get('id');
      $iibb = $request->get('iibb');
      $obs = $request->get('obs');
      $anticipo = $request->get('anticipo');
      $fecha = $request->get('fecha');
      $procesar = $request->get('aprocesar'); 

      $db = DB::table('despachosxorden')->where('id', '=', $idorden)->update([
        'observaciones' => $obs,
        'fechaEntrega' => $fecha,
        'iibb' => $iibb,
        'reprocesar' => $procesar,
        'anticipo' => $anticipo
      ]);

      if ($db == 1)
        return "true";

      return "false";
    }

    public function datos_control(Request $request, $id)
    {
      $idorden = $id;

      $sql = 'SELECT '.
             "op.id as 'ordenid', c.razon as 'cliente', mc.diametroExteriorNominal as 'ext', ".
             "mc.espesorNominal as 'esp', d.kilos as 'kilos', d.piezas as 'piezas', ".
             "d.metros as 'metros', d.numeroRemito as 'remito', p.nombreCompleto as ".
             "'despacho', trans.razon as 'razonTransporte', d.paquetes as 'paquetes', ".
             "d.horaEntrada as 'horaEntrada', d.horaSalida as 'horaSalida', ".
             "d.lugarEntrega as 'LE', pe.nombreCompleto as 'controlo', d.id as ".
             "'despachoid', d.operarioControl as 'oControl', d.operarioDespacho as 'oDespacho' ".
             "FROM despachos d ".
             "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
             "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
             "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ". 
             "LEFT JOIN medidascotizadas mc ON (mc.id = vxo.medidaid) ".
             "LEFT JOIN personal p ON (p.id=d.operarioDespacho) ".
             "LEFT JOIN personal pe ON (pe.id=d.operarioControl) ".
             "LEFT JOIN transportes trans ON (trans.id=d.transporteid) ".
             "WHERE 1=1 ".
             "and vxo.version= (SELECT MAX(vxom.version) ".
             "from ordenproduccion opn ".
             "INNER JOIN versionesxorden vxom ON (vxom.ordenProduccion = opn.id) ".
             "WHERE vxom.ordenProduccion=vxo.ordenProduccion ".
             "GROUP BY (vxom.ordenProduccion)) AND d.id=$idorden ;";

      $resultados = DB::select($sql);

      $personal = DB::table('personal')->get();

               
      return view('despacho.datos_control', compact('resultados', 'personal', 'idorden'));
    }

    public function adddatos_control()
    {
          


        return view('despacho.datos_control');
    }

    public function update_despacho(Request $request)
    {
        $id = $request->get('ordenid');        
        $control = $request->get('opControl');          
        $despacho = $request->get('opDespacho');          
        $paquetes = $request->get('paquetes');
        $entrada = $request->get('cEntrada');            
        $salida = $request->get('cSalida');          
        $lugar = $request->get('lugar');          
        $remito = $request->get('remito');

        $db = DB::table('despachos')->where('id', '=', $id)->insert([
          'operarioControl'=> $control,
          'operarioDespacho' => $despacho,
          'horaEntrada'=> $entrada,
          'horaSalida' => $salida,
          'lugarEntrega' => $lugar,
          'paquetes' => $paquetes,
          'numeroRemito' => $remito
        ]);
        
        if ($db == true){
          return "true";
        }
        return "false";
    }

    public function buscarentrega(Request $request)
    {
        $input = $request->all();
        $q0 = "";

        $q0 .= (empty($input['fechadesde']))? "" : " AND d.fechaEntrega>='".$input['fechadesde']."'";
        $q0 .= (empty($input['fechahasta']))? "" : " AND d.fechaEntrega<='".$input['fechahasta']."'";
        $q0 .= (empty($input['clienteidb']))? "" : " AND vxo.clienteid=".$input['clienteidb']."";
        $q0 .= (empty($input['estadoidb']))? "" : " AND op.estadoid=".$input['estadoidb']."";
        $q0 .= (empty($input['usoidb']))? "" : " AND vxo.uso=".$input['usoidb']."";
        $q0 .= (empty($input['fechab']))? "" : " AND d.fechaEntrega='".$input['fechab']."'";
        $q0 .= (empty($input['ordenb']))? "" : " AND op.id=".$input['ordenb']."";

        $sql0 = "(SELECT AVG(cp.longitudTubos) FROM controlpaquetes cp ".
                "LEFT JOIN paquetesxcontrol pxc ON (cp.id = pxc.controlPaqueteid) ".
                "LEFT JOIN controlfinal cf ON (pxc.controlid = cf.id) ".
                "WHERE cf.idVersion = vxo.id) AS Largo ";

        $sql = 'SELECT '.
               "op.id as OrdenN, c.razon as Cliente, mc.diametroExteriorNominal as Ext, ".
               "mc.espesorNominal as Esp, mc.diametroInteriorNominal as 'Int', ".
               "tc.descripcion as 'Cost', d.metros as Metros, d.piezas as Tubos, d.kilos as Kilos, $sql0, ".
               "dxo.fechaCreacion as FechadeCreacion, d.fechaEntrega as FechaEntrega, z.descripcion as ".
               "Zona, trans.razon as Transporte, d.lugarEntrega as LugardeEntrega, ed.descripcion as ".
               "Estado, d.numeroRemito as NdeRemito, d.horaEntrada as CtrolEntrada, d.horaSalida as CtrolSalida, ".
               "d.paquetes as Paquetes, REPLACE(d.precio,'.',',')  as Precio, mon.descripcion as Moneda, ".
               "CASE WHEN co.preciopasado='k' THEN 'KILOS' WHEN co.preciopasado='m' THEN 'METROS' ".
               "ELSE 'PIEZAS' END as 'UM', us.descripcion as 'Uso', d.id FROM despachos d ".
               "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
               "LEFT JOIN despachosxorden dxo ON (dxo.id=d.despachosxordenid) ".
               "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
               "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
               "LEFT JOIN zonas z ON (z.id=c.zonaid) ".
               "LEFT JOIN transportes trans ON (trans.id=d.transporteid) ".
               "LEFT JOIN medidascotizadas mc ON (mc.id = vxo.medidaid) ".
               "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
               "LEFT JOIN personal p ON (p.id=d.operarioDespacho) ".
               "LEFT JOIN personal pe ON (pe.id=d.operarioControl) ".
               "LEFT JOIN estadodespachos ed ON (ed.id=d.estadoid) ".
               "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ". 
               "LEFT JOIN monedas mon ON (mon.id = co.tipoMoneda) ".
               "LEFT JOIN usofinal us on (us.id = vxo.uso) ".
               "WHERE 1=1 ".
               "and vxo.version= (SELECT MAX(vxom.version) from ordenproduccion opn ".
               "INNER JOIN versionesxorden vxom ON (vxom.ordenProduccion = opn.id) ".
               "WHERE ".
               "vxom.ordenProduccion=vxo.ordenProduccion ".
               "GROUP BY (vxom.ordenProduccion) ) $q0 order by d.id desc ;";

        $results = DB::select($sql);
        if ($results != [])
            return response()->json(['resultado'=>$results]);
        else
            return "false";
          
    }

    public function despacho()
    {
        $estados = DB::table('estadodespachos')->get();
        $usos = DB::table('usofinal')->get();
        $clientes = DB::table('clientes')->get();
        return view('despacho.despacho', compact('estados', 'usos', 'clientes'));
    }

    public function control_entrega()
    {
      $sql = 'SELECT '.
             "op.id as 'ordenid', c.razon, mc.diametroExteriorNominal, mc.espesorNominal, ".
             "d.kilos, d.numeroRemito, p.nombreCompleto, d.paquetes, d.horaEntrada, uo.ubicacion, ".
             "d.horaSalida, d.lugarEntrega, pe.nombreCompleto, d.id as ".
             "'despachoid', trans.razon as 'razonTransporte' FROM despachos d ".
             "LEFT JOIN versionesxorden vxo ON (vxo.id=d.versionesxOrdenid) ".
             "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
             "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
             "LEFT JOIN transportes trans ON (trans.id=d.transporteid) ".
             "LEFT JOIN medidascotizadas mc ON (mc.id = vxo.medidaid) ".
             "LEFT JOIN personal p ON (p.id=d.operarioDespacho) ".
             "LEFT JOIN personal pe ON (pe.id=d.operarioControl) ".
             "LEFT JOIN ubicacionorden uo ON (uo.ordenProduccion=vxo.id) ".
             "WHERE 1=1 and d.estadoid=1 ".
             "and vxo.version= (SELECT MAX(vxom.version) ".
             "from ordenproduccion opn ".
             "INNER JOIN versionesxorden vxom ON (vxom.ordenProduccion = opn.id) ".
             "WHERE vxom.ordenProduccion=vxo.ordenProduccion ".
             "GROUP BY (vxom.ordenProduccion)) ORDER BY c.razon ;";

      $db = DB::select($sql);

      $despachos = DB::table('personal')->get();
      return response()->json(['resultado'=>$db, 'despachos'=>$despachos]);
    }
    
    public function agregar_despacho($idorden, $clienteid)
    {
      $sql = 'SELECT '.
             "op.id as 'Ordenp', c.razon as 'Cliente', mc.diametroExteriorNominal as 'DiaExt', ".
             "mc.espesorNominal as 'Esp', tc.descripcion as 'Cost', co.codigoPieza as 'Codigo', ".
             "CASE WHEN co.preciopasado='k' THEN 'KILOS' WHEN co.preciopasado='m' ".
             "THEN 'METROS' ELSE 'PIEZAS' END as 'UM', ".
             "CASE WHEN co.preciopasado='k' THEN pco.precioKilo WHEN co.preciopasado='m' ".
             "THEN pco.precioMetro ELSE pco.precioPieza END as 'Precio', ".
             "SUBSTRING(mon.descripcion, 8, 11) as 'Moneda', SUM(contp.cantidadTubos) ".
             "as 'Piezas', SUM(contp.metros) as 'Metros', ".
             "SUM(contp.kilos) as 'Kilos', p.id as 'versionid' FROM ordenproduccion op ".
             "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
             "LEFT JOIN controlfinal contf ON (contf.idVersion=p.id) ".
             "LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid=contf.id) ".
             "LEFT JOIN controlpaquetes contp ON (contp.id=pxc.controlPaqueteid) ".
             "LEFT JOIN certificado cert ON (cert.id = p.certificadoid) ".
             "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
             "LEFT JOIN clientes c ON (c.id = p.clienteid) ".
             "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
             "LEFT JOIN monedas mon ON (mon.id = co.tipoMoneda) ".
             "LEFT JOIN preciocotizaciones pco ON (pco.cotizacionid = co.id and pco.fecha ".
             "= (SELECT max(fecha) from preciocotizaciones where cotizacionid=co.id)) ".
             "LEFT JOIN tratamientocotizacion tt ON (tt.id = p.tratamientoTermico) ".
             "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
             "LEFT JOIN procesosxop pxp ON (pxp.tipoProceso = 1 and pxp.idCP=p.id) ".
             "LEFT JOIN preparacionmp mp ON (mp.id = pxp.procesoid) ".
             "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
             "LEFT JOIN estadosop es ON (es.id = op.estadoid) ".
             "LEFT JOIN tipocostura tcm ON (tcm.id = me.tipoCostura) ".
             "LEFT JOIN reventa trev ON (trev.id = p.tipoReventa) ".
             "WHERE 1=1 and p.version= (SELECT MAX(vxo.version) ".
             "from ordenproduccion op ".
             "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
             "WHERE ".
             "vxo.ordenProduccion=p.ordenProduccion ".
             "GROUP BY (vxo.ordenProduccion) ) ".
             "and p.clienteid=$clienteid and op.estadoid=5 GROUP BY p.id ;";

      $res = DB::select($sql);
      $listado = [];

      if (count($res) > 0){
        foreach ($res as $r) {
          $sql2 = 'SELECT '.
                  "SUM(d.kilos) as 'skilos', ".
                  "SUM(d.piezas) as 'spiezas', ".
                  "SUM(d.metros) as 'smetros' FROM despachos d ".
                  "LEFT JOIN versionesxorden vxo ON (vxo.id = d.versionesxOrdenid) ".
                  "WHERE d.versionesxOrdenid=$r->versionid; ";
          $res2 = DB::select($sql2);

          foreach ($res2 as $rowp2){
              $kilos_saldo = $res[0]->Kilos - $rowp2->skilos;
              $metros_saldo = $res[0]->Metros - $rowp2->smetros;
              $piezas_saldo = $res[0]->Piezas - $rowp2->spiezas;
          }

          $listado[] = (object)['Ordenp'=>$r->Ordenp, 'Cliente'=>$r->Cliente, 'DiaExt'=>$r->DiaExt, 'Esp'=>$r->Esp, 'Cost'=>$r->Cost, 'Kilos'=>$r->Kilos, 'Piezas'=>$r->Piezas, 'Metros'=>$r->Metros, 'Codigo'=>$r->Codigo, 'Moneda'=>$r->Moneda, 'UM'=>$r->UM, 'versionid'=>$r->versionid];
        }

      }
        return view('despacho.facturar', compact('listado', 'idorden', 'clienteid'));
    }

    public function insertar_despacho(Request $request)
    {
      $despachos = json_decode($request->get('despachos')); //array
      $orden = $request->get('ordenid');

      if (count($despachos)>0){
        foreach ($despachos as $despacho) {
          $db = DB::table('despachos')->insert([
            'versionesxOrdenid' => $despacho->versionid,
            'kilos' => $despacho->kilos,
            'piezas' => $despacho->piezas,
            'metros'=>$despacho->metros,
            'localidad' => $despacho->localidad,
            'despachosxordenid' => $orden,
            'precio' => $despacho->precio,
            'estadoid' => 1
          ]);   
        }
        return "true";
      }
      return "false";

    }

    public function runprocesos()
    {
        $sql = 'SELECT '.
               "tr.descripcion as tiporev, vxo2.id AS vxoid, vxo2.version as vid, ".
               "vxo2.fechaPedido, vxo2.fechaPrometida, op.id as nro, ci.razon, mc.medida as medida ".
               "FROM ordenproduccion op ".
               "INNER JOIN versionesxorden vxo2 ON ( vxo2.ordenProduccion = op.id ) ".
               "LEFT JOIN clientes ci ON (ci.id = vxo2.clienteid) ".
               "LEFT JOIN reventa tr ON (tr.id = vxo2.tipoReventa) ".
               "INNER JOIN cotizaciones co ON op.cotizacionid = co.id ".
               "INNER JOIN medidascotizadas mc ON mc.id = co.medidaid ".
               "WHERE op.estadoid =2 AND vxo2.version".
               "=(SELECT MAX( vxo.version ) FROM ordenproduccion op ".
               "INNER JOIN versionesxorden vxo ON ( vxo.ordenProduccion = op.id ) ".
               "WHERE op.estadoid =2 AND vxo.ordenProduccion = vxo2.ordenProduccion ".
               "GROUP BY (vxo.ordenProduccion)) ;";

        $results = DB::select($sql);
        $nroordenblo = "";
        $aprocesar = [];
        if ($results != []){
            $ordenbloqueada = false;
            $nroordenblo = "";
            foreach ($results as $result) {
                $sql2 = 'SELECT '.
                        "s.ordenProduccion FROM subprocesosestado s ".
                        "INNER JOIN subprocesosestado se ON ( se.ordenProduccion = s.ordenProduccion ".
                        "AND s.tipoProceso <> se.tipoProceso AND s.orden=se.orden ) ".
                        "WHERE s.ordenProduccion=".$result->vxoid." GROUP BY s.ordenProduccion ;";
                $results2 = DB::select($sql2);
                if ($results2 != []){
                    $ordenbloqueada = true;
                    $nroordenblo = $result->nro;

                }
                $aprocesar[] = (object)['nro'=>$result->nro, 'version'=> $result->vid, 'cliente'=>$result->razon, 'tipo'=>$result->tiporev, 'medida'=> $result->medida, 'fechap'=>$result->fechaPedido, 'fechae'=>$result->fechaPrometida];
            }

        }

        //dd($nroordenblo);
        return view('despacho.run', compact('aprocesar', 'nroordenblo'));
    }

    public function ubicacion()
    {
        $clientes = DB::table('clientes')->get();
        return view('despacho.ubicacion', compact('clientes'));
    }

    public function addubicacion(Request $request)
    {
        $nro_orden = (int) $request->get('nro_orden');
        $ubicacion = DB::table('ubicacionorden')->where('ordenProduccion', '=', $nro_orden)->update([
            'ubicacion' => $request->get('ubicacion') . $request->get('ubicacion2')
        ]);

        if ($ubicacion == 1)
            return back()->with('success', 'Ubicacion Agregada');
        else
            return redirect('ubicacion')->with('status', 'Nro de Orden no Encontrada');
    }   


    
}
