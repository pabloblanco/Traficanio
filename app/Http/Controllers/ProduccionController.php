<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class ProduccionController extends Controller
{
    public function indexrechazo()
    {
        $motivos = DB::table('tiporechazo')->get();
        $estados = DB::table('estadomateriaprima')->get();
        $formas = DB::table('formas')->get();
        $rubros = DB::table('rubros')->get();
        $responsables = DB::table('personal')->get();
        return view('produccion.rechazo', compact('motivos', 'estados', 'rubros', 'formas', 'responsables'));
    }

    public function mostrarprocesos(Request $request)
    {
      $tipo = (int) $request->get('tipo');
      $process = (int) $request->get('eje');
      $accion = (int) $request->get('accion');

      if ($tipo == 1){
        $paquetes = (int) $request->get('paq');
        $procesos = $this->vertourpreparacionmp($process, $accion, $paquetes);

      }
      else if ($tipo == 2){

        $procesos = $this->vertourhorno($process, $accion);
      }
      else if ($tipo == 3){

        $procesos = $this->vertourbatea($process, $accion);
      }
      else if ($tipo == 4){

        $procesos = $this->vertourpunta($process, $accion);
      }
      else if ($tipo == 5){

        $procesos = $this->vertourtrefila($process, $accion);
      }
      else if ($tipo == 6){

        $procesos = $this->vertourenderezado($process, $accion);
      }
      else if ($tipo == 7){

        $procesos = $this->vertourcorte($process, $accion);
      }
      else{
        return false;
      }

      if (count($procesos)>0){
          return response()->json(['resultado'=>$procesos]);
      }
      else{
        return "false";
      }

    }

    public function vertourpreparacionmp($process, $accion, $paquetes)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];

        if ($accion > 0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        if ($paquetes > 0){
          // CON PAQUETES //
          $db = 'SELECT '.
                "pmp.|1 3 idpmp, vxo2.id as vxoid, paq.id as paqid ".
                "from ordenproduccion op ".
                "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
                "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
                "se.tipoProceso=1) ".
                "LEFT JOIN preparacionmprun pmp ON (pmp.idplan = se.idplan) ".
                "INNER JOIN procesosxop pxp ON (pxp.tipoProceso = 1 and pxp.idCP=vxo2.id ) ".
                "INNER JOIN preparacionmp mp ON (mp.id = pxp.procesoid) ".
                "INNER JOIN medidas me ON (me.id = mp.medidaid) ".
                "INNER JOIN paquetes paq ON (paq.id = (SELECT pq.id from paquetes pq ".
                "where pq.medidaid=me.id order by pq.id desc LIMIT 1) ) ".
                "WHERE (op.estadoid=2 or op.estadoid=3) and  se.estadoid=$est ".
                "and vxo2.version=(SELECT MAX(vxo.version) ".
                "from ordenproduccion op ".
                "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
                "where (op.estadoid=2 or op.estadoid=3)  and ".
                "vxo.ordenProduccion=vxo2.ordenProduccion ".
                "GROUP BY (vxo.ordenProduccion) ) ".
                "order by vxo2.urgente desc,fechaPrometida desc ;";

        }
        else{
          // SIN PAQUETES //
          $db = 'SELECT '.
                "pmp.id as idpmp,vxo2.id as vxoid from ordenproduccion op ".
                "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
                "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
                "se.tipoProceso=1) ".
                "LEFT JOIN preparacionmprun pmp ON (pmp.idplan = se.idplan) ".
                "where (op.estadoid=2 or op.estadoid=3) and  se.estadoid=$est ".
                "and vxo2.version=(SELECT MAX(vxo.version) ".
                "from ordenproduccion op ".
                "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
                "where (op.estadoid=2 or op.estadoid=3)  and ".
                "vxo.ordenProduccion=vxo2.ordenProduccion ".
                "GROUP BY (vxo.ordenProduccion) ) ".
                "order by vxo2.urgente desc,fechaPrometida desc ;";
        }

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                   "mpr.id as idmp, me.id, op.id as 'nro', vxo.*, c.razon as cliente, ".
                   "mpr.idplan, mp.*, m.diametroExteriorNominal as diamExt, m.espesorNominal as ".
                   "Espe, tc.descripcion as tratter, IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                   "tcos.descripcion as costura, ".
                   "IF (SUM( st.cantidad )>0,SUM(st.cantidad),0) AS stock, ".
                   "IF(me.largoMaximo=me.largoMinimo, me.largoMaximo, ".
                   "round(((me.largoMaximo-me.largoMinimo)/2)/2,2)) as lg ".
                   "from preparacionmprun mpr ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=mpr.id and se.tipoProceso=1) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = mpr.idplan) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = paq.id ) ".
                   "where mpr.id=$r->idpmp GROUP BY mpr.id, op.id, vxo.id, pro.razon;";

            $res1 = DB::select($sql);
            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $cadena[] = (object)['idmp'=>$r1->idmp];

                $kg = $r1->kilogrametro;
                if (!($kg>0))
                  $kg = $this->kilogrametro ($r1->diamExt, $r1->Espe);

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?(($r1->kilogrametro*$r1->metros)):$r1->kilos;

                $dataTre[] = (object)['fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamex'=>$r1->diamExt, 'esp'=>$r1->Espe, 'metros'=>$metros, 'kilos'=>number_format($kilos), 'kilosap'=>round($kilos*1.1), 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg];
              }
            }
          }
        }

        $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

        return $obj;
      }     
    }

    public function vertourhorno($process, $accion)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];

        if ($accion >0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        $db = 'SELECT '.
              "h.id as idhor,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
              "se.tipoProceso=2) ".
              "LEFT JOIN hornorun h ON (h.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and  se.estadoid=$est ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $db1 = 'SELECT DISTINCT '.
                   "h.id as idhor, op.id as 'nro', vxo.*, c.razon as cliente, h.idplan, ".
                   "hor.*, m.diametroExteriorNominal as diamExt, m.espesorNominal as ".
                   "Espe, tc.descripcion as tratter, IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                   "tcos.descripcion as costura ".
                   "from hornorun h ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=h.id and se.tipoProceso=2) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN horno hor ON (hor.id = h.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where h.id=$r->idhor GROUP BY h.id ;";

            $res1 = DB::table($db1);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $cadena[] = (object)['idhor'=>$r1->idhor];

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?round(($r1->kilogrametro*$r1->metros)):$r1->kilos;

                $dataTre[] = (object)['fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamex'=>$r1->diamExt, 'espe'=>$r1->Espe, 'metros'=>$metro, 'kilos'=>$kilos, 'kilosap'=>round($kilos*1.1), 'piezas'=>$r1->piezas, 'tratamiento'=> $r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura];       
              }
            }
          }
        }

        $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

        return $obj;
      }  
    }

    public function vertourbatea($process, $accion)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];

        if ($accion >0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        $db = 'SELECT '.
              "b.id as idbatrun, vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = ".
              "vxo2.id and se.tipoProceso=3) ".
              "LEFT JOIN batearun b ON (b.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and  se.estadoid=$est ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $db1 = 'SELECT DISTINCT '.
                   "b.id as idbatrun, op.id as 'nro', vxo.*, c.razon as cliente, b.idplan, ".
                   "ba.*, m.diametroExteriorNominal as diamExt, ".
                   "m.espesorNominal as Espe, tc.descripcion as tratter, ".
                   "IF (vxo.urgente=1,'U','') as urg, pro.razon as provee, me.diametroExterior ".
                   "me.espesorNominal, tcos.descripcion as costura, ".
                   "IF(me.largoMaximo=me.largoMinimo, me.largoMaximo, ".
                   "round(((me.largoMaximo-me.largoMinimo)/2)/2,2)) as lg ".
                   "from batearun b ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=b.id and se.tipoProceso=3) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN batea ba ON (ba.id = b.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where b.id=$r->idbatrun GROUP BY b.id');";

            $res1 = DB::select($db1);

            if (count($res1)>0){
              foreach ($res1 as $r1) {

                $cadena[] = (object)['idbatrun'=>$r1->idbatrun];

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?(round($r1->kilogrametro*$r1->metros)):$r1->kilos;

                $dataTre[] = (object)['fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamex'=>$r1->diamExt, 'esp'=>$r1->Espe, 'kilos'=>$kilos, 'metros'=>$metros, 'kilosap'=> round($kilos*1.1), 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg];
              }
            }
          }
        }

        $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

        return $obj;
      }
    }

    public function vertourpunta($process, $accion)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];

        if ($accion >0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        $db = 'SELECT '.
              "p.id as idpunrun, vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
              "se.tipoProceso=4) ".
              "LEFT JOIN puntarun p ON (p.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=$est ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc; ";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $db1 = 'SELECT DISTINCT '.
                   "p.id as idpun, op.id as 'nro', vxo.*, c.razon as cliente ".
                   "p.idplan, pun.*, m.diametroExteriorNominal as diamExt, ".
                   "m.espesorNominal as Espe, tc.descripcion as tratter, ".
                   "IF (vxo.urgente=1,'U','') as urg, pro.razon as provee, ".
                   "me.diametroExterior, me.espesorNominal, tcos.descripcion as costura, ".
                   "IF(me.largoMaximo=me.largoMinimo, me.largoMaximo, ".
                   "round(((me.largoMaximo-me.largoMinimo)/2)/2,2)) as lg ".
                   "from puntarun p ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=p.id and se.tipoProceso=4) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN punta pun ON (pun.id = p.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where p.id=$r->idpunrun GROUP BY p.id');";

            $res1 = DB::select($db1);
            if (count($res1)>0){
              foreach ($res1 as $r1) {

                $cadena[] = (object)['idpun'=>$r1->idpun];

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;

                $kilos = empty($r1->kilos)?round(($r1->kilogrametro*$r1->metros)):$r1->kilos;

                $dataTre[] = (object)['fechapedido'=> $r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamex'=>$r1->diamExt, 'espe'=>$r1->Espe, 'metros'=>$metros, 'kilos'=>$kilos, 'kilosap'=>round($kilos*1.1), 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg];
              }
            }
          }
        }

        $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

        return $obj;
      }
    }

    public function vertourtrefila($process, $accion)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];
        $ordertrefila = [];

        if ($accion >0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        $db = 'SELECT '.
              "t.id as idtrerun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
              "se.tipoProceso=5) ".
              "LEFT JOIN trefilarun t ON (t.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=$est ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $db1 = 'SELECT DISTINCT '.
                   "t.id as idtrerun, op.id as 'nro',vxo.*,vxo.id as idvers,c.razon as cliente, ".
                   "t.idplan,tre.*,m.diametroExteriorNominal as diamExt,m.espesorNominal as Espe ".
                   "tc.descripcion as tratter,IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee,me.diametroExterior,me.espesorNominal, ".
                   "tcos.descripcion as costura, IF(me.largoMaximo=me.largoMinimo,me.largoMaximo, ".
                   "round(((me.largoMaximo-me.largoMinimo)/2)/2,2)) as lg ".
                   "from trefilarun t ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=t.id and se.tipoProceso=5) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN trefila tre ON (tre.id = t.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where t.id=$r->idtrerun  GROUP BY t.id ;";

            $res1 = DB::select($db1);

            if (count($res1)>0){
              foreach ($res1 as $r1) {

                $db2 = DB::table('ordenprocesoop')->where('idOrdenProduccion', '=', $r1->idvers)->first();

                $cadena[] = (object)['idtrerun'=>$r1->idtrerun];

                if ($db2){
                  $dataord = $db2;
                  $ordexpl = explode(",",$dataord->orden);
                  $cont = 1;

                  foreach ($ordexpl as $vls){
                     $parser = explode("*",$vls);
                     if ($ordertrefila[0]==5){                         
                         $ordertrefila[$r1->idvers][$parser[1]] = $cont;
                        $cont++;
                     }
                   
                  }
              }

              $lugar = ($ordertrefila[$r1->idvers][$r1->idplan])>1?'FIN':'INT.';

              $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
              $kilos = empty($r1->kilos)?round(($r1->kilogrametro*$r1->metros)):$r1->kilos;

              $dataTre[] = (object)['nrotrefila'=>$r1->numero, 'fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'kilos'=>$kilos, 'metros'=>$metros, 'piezas'=>$r1->piezas, 'kilosap'=>round($kilos*1.1), 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg];
            }
          }
        }

      }
      $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

      return $obj;
      }
    }

    public function vertourenderezado($process, $accion)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];
        $ordertrefila = [];

        if ($accion >0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        $db = 'SELECT '.
              "e.id as idendrun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
              "se.tipoProceso=6) ".
              "LEFT JOIN enderezadorun e ON (e.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and  se.estadoid=$est ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ". 
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $db1 = 'SELECT DISTINCT '.
                   "er.id as idend,op.id as 'nro', vxo.*,c.razon as cliente, er.idplan, ".
                   "e.*,m.diametroExteriorNominal as diamExt, m.espesorNominal as Espe, ".
                   "tc.descripcion as tratter, IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                   "tcos.descripcion as costura, IF(me.largoMaximo=me.largoMinimo, ".
                   "me.largoMaximo, round(((me.largoMaximo-me.largoMinimo)/2)/2,2)) as lg ".
                   "from enderezadorun er ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=er.id and se.tipoProceso=6) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN enderezadora e ON (e.id = er.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxopc pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where er.id=$r->idendrun GROUP BY er.id ;";

            $res1 = DB::select($db1);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $cadena[] = (object)['idend'=>$r1->idend];

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?round(($r1->kilogrametro*$r1->metros)):$r1->kilos;

                $dataTre[] = (object) ['fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamex'=>$r1->diamExt, 'esp'=>$r1->Espe, 'kilos'=>$kilos, 'metros'=>$metros, 'kilosap'=>round($kilos*1.1), 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg];
              }
            }
          }
        }

        $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

        return $obj;
      }
    }

    public function vertourcorte($process, $accion)
    {
      if ($process > 0){

      } 
      else {
        $dataTre = [];
        $cadena = [];

        if ($accion > 0){
          $est = 3;
        }
        else{
          $est = 2;
        }

        $db = 'SELECT '.
              "c.id as idcorrun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion = vxo2.id and ".
              "se.tipoProceso=7) ".
              "LEFT JOIN corterun c ON (c.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and  se.estadoid=$est ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $db1 = 'SELECT DISTINCT '.
                   "co.id as idcorun,op.id as 'nro', vxo.*,c.razon as cliente, co.idplan, ".
                   "ct.*,m.diametroExteriorNominal as diamExt, m.espesorNominal as Espe, ".
                   "tc.descripcion as tratter, IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee, me.diametroExterior,me.espesorNominal, ".
                   "tcos.descripcion as costura, ".
                   "IF(me.largoMaximo=me.largoMinimo,me.largoMaximo, ".
                   "round(((me.largoMaximo-me.largoMinimo)/2)/2,2)) as lg ".
                   "from corterun co ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=co.id and ".
                   "se.tipoProceso=7) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN corte ct ON (ct.id = co.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where co.id=$r->idcorrun GROUP BY co.id ;";

            $res1 = DB::select($db1);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $cadena[] = (object)['idcorun'=>$r1->idcorun];

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?(round($r1->kilogrametro*$r1->metros)):$r1->kilos;

                $dataTre[] = (object) ['fechapedido'=>$r->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'kilos'=>$kilos, 'metros'=>$metros, 'kilosap'=>round($kilos*1.1), 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg];                
              }
            }
          }
        }

        $obj = ['procesos'=>$dataTre, 'cadena'=>$cadena];

        return $obj;
      }

    }
    public function buscarrechazo(Request $request)
    {
       $input = $request->all();

       $q0 = "";
       $q0 .= (empty($input['ordenb']))? "" : " AND r.ordenProduccion=".$input['ordenb']."";
       $q0 .= (empty($input['kilosb']))? "" : " AND r.kilosR=".$input['kilosb']."";
       $q0 .= (empty($input['metrosb']))? "" : " AND r.piezasR=".$input['metrosb']."";
       $q0 .= (empty($input['desdeb']))? "" : " AND r.fechaRechazo>='".$this->fechamysql($input['desdeb'])."'";
       $q0 .= (empty($input['hastab']))? "" : " AND r.fechaRechazo<='".$this->fechamysql($input['hastab'])."'";

       if ($request->get('ubicacion') == "0")
        $q0 .= " AND r.interno="."0"."";

       if ($request->get('ubicacion') == "1")
        $q0 .= " AND r.interno="."1"."";

       $q0 .= (empty($input['clienteb']))? "" : " AND cli.razon LIKE '%".$input['clienteb']."%'";

       $sql = 'SELECT '.
              "r.*, cli.razon ".
              "from rechazos  r ".
              "LEFT JOIN ordenproduccion o ON (o.id = r.ordenProduccion) ".
              "LEFT JOIN cotizaciones c ON (c.id = o.cotizacionid) ".
              "LEFT JOIN clientes cli ON (cli.id = c.clienteid) ".
              "where r.estadoRechazo<>3 $q0 ;";

       $results = DB::select($sql);
       
       if ($results != [])
          return response()->json(['resultado'=>$results]);
       else
          return "false";

    }

    public function detalle_rechazo($id)
    {
        $sql = 'SELECT '.
               "r.*,cli.razon, contf.paquetes, contp.longitudTubos ".
               "from rechazos r ".
               "LEFT JOIN ordenproduccion o ON (o.id = r.ordenProduccion) ".
               "LEFT JOIN cotizaciones c ON (c.id = o.cotizacionid) ".
               "LEFT JOIN clientes cli ON (cli.id = c.clienteid) ".
               "LEFT JOIN versionesxorden vxo ON(o.id = vxo.ordenProduccion) ".
               "LEFT JOIN controlfinal contf ON (vxo.id=contf.idVersion) ".
               "LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid=contf.id) ".
               "LEFT JOIN controlpaquetes contp ON (contp.id=pxc.controlPaqueteid) ".
               "where r.id=$id ;" ;
               

        $results = DB::select($sql);

        $res = end($results);
        //dd($res);

        $motivos = DB::table('tiporechazo')->where('id', '=', $res->motivoid)->first();
        $estados = DB::table('estadomateriaprima')->where('id', '=', $res->estado_id)->first();
        $formas = DB::table('formas')->where('id', '=', $res->forma_id)->first();
        $rubros = DB::table('rubros')->where('id', '=', $res->rubro_id)->first();
        $personaventa = DB::table('personal')->where('id', '=', $res->responsableVentas)->first();
        $personalexpe = DB::table('personal')->where('id', '=', $res->responsableExpedicion)->first();

        return view('produccion.detalle_rechazo', compact('res', 'motivos', 'estados', 'formas', 'rubros', 'personaventa', 'personalexpe'));
    }

    public function indexcalendario()
    {
        return view('produccion.calendario');
    }

    public function datacalendario(Request $request)
    {
      $montyear = json_decode($request->get('data'));
      $mont = $montyear[0];
      $year = $montyear[1];

      $db = 'SELECT '.
            "i.tipo as nombre, i.id as id, DAY(c.fecha) as dia FROM calendario c ".
            "LEFT JOIN  incidentes i ON (i.id = c.incidente) ".
            "WHERE  MONTH(c.fecha)='".$mont."' AND YEAR(c.fecha)='".$year."' ;";

      $res = DB::select($db);

      if (count($res)>0){
        return response()->json(['resultado'=>$res, 'month'=>$mont, 'year'=>$year]);
      }
      return "false";

    }

    public function indexsubproceso()
    {
        return view('produccion.subproceso');
    }

    public function indextour()
    {
        return view('produccion.tour');
    }

    public function ejeprocesos(Request $request)
    {
      
      $eje = $request->get('eje');
      $tipo = $request->get('tipo');
      $datajson = json_decode($request->get('datos'));

      $date = Carbon::now();
      $hoy = $date->toDateString();
      //dd($tipo);
      $mp = 0;

      if ($tipo == 1){
        $mp=1;
        $procesos = $this->runpreparacionmp($eje, $datajson, $hoy);

      }
      else if ($tipo == 2){
        $procesos = $this->runhorno($eje, $datajson, $hoy);

      }
      else if ($tipo == 3){
        $procesos = $this->runbatea($eje, $datajson, $hoy);
      }
      else if ($tipo == 4){
        $procesos = $this->runpunta($eje, $datajson, $hoy);
      }
      else if ($tipo == 5){
        $procesos = $this->runtrefila($eje, $datajson, $hoy);
      }
      else if ($tipo == 6){
        $procesos = $this->runenderezadora($eje, $datajson, $hoy);
      }
      else if ($tipo == 7){
        $procesos = $this->runcorte($eje, $datajson, $hoy);
      }
      else {
        return false;
      }

      if($mp==1)
        return $procesos;
      
      return "true";

    }

    public function runprocesos(Request $request)
    {
      $tipo = $request->get('tipo');
      $procesos = [];
      $eje = 0;

      if ($tipo == 1){
        $procesos = $this->runpreparacionmp($eje, null, null);

      }
      else if ($tipo == 2){
        $procesos = $this->runhorno($eje, null, null);

      }
      else if ($tipo == 3){
        $procesos = $this->runbatea($eje, null, null);
        
      }
      else if ($tipo == 4){
        $procesos = $this->runpunta($eje, null, null);  

      }
      else if ($tipo == 5){
        $procesos = $this->runtrefila($eje, null, null);
        
      }
      else if ($tipo == 6){
        $procesos = $this->runenderezadora($eje, null, null);
        
      }
      else if ($tipo == 7){
        $procesos = $this->runcorte($eje, null, null);
        
      }
      else{
        return "false";
      }

      if (count($procesos)>0){
          return response()->json(['resultado'=>$procesos]);
      }
      else{
        return "false";
      }

    }

    public function runpreparacionmp($eje, $datos)
    {
      
      $carbon = Carbon::now();
      $date = $carbon->toDateTimeString();
      $fecha = $carbon->toDateString();
      $dataR = [];
      $auto = "false";

      

      if ($eje > 0){
        $autorequired = 0;
        foreach ($datos as $d) {
          
          // Cambio el estado de la cotizacion de la que proviene la orden ////
          $db = DB::table('cotizaciones')->where('id', '=', $d->cotizacionid)->update([
            'estadoid'=>6
          ]);

          $db1 = DB::table('entregamateriaprima')->insertGetid([
            'ordenProduccion'=>$d->op,
            'fecha'=>$date,
            'observaciones'=> 'Producción'
          ]);

          $identregamp = $db1;
          $movid = 2;
          $medida = $d->medida;
          $kilosTotales = 0;
          $array_paq = json_decode($d->cargatraza);
          

          
          
          if (count($array_paq)>0){
            foreach ($array_paq as $paq) {
              
              $db2 = 'SELECT '.
                     "id,estadoid ".
                     "from paquetes where numeroTrazabilidad='$paq->nrotrazabilidad';";

              $res2 = DB::select($db2);

              $kilosTotales = $kilosTotales + $paq->kgs;
              
              if (count($res2)>0){
                $idspaq = $res2[0]->id;
                
                $estadopaq = $res2[0]->estadoid;
                if (is_numeric($idspaq)){
                  $cant = DB::table('stockmateriaprima')->where('paqueteid', '=', $idspaq)->first();
                  
                  $aguardar = $cant->cantidad - $paq->kgs;
                  
                  $db3 = DB::table('stockmateriaprima')->where('paqueteid', '=', $cant->paqueteid)->update([
                    'cantidad'=> $aguardar
                  ]);
                  
                  $db4 = DB::table('movimientostock')->insert([
                    'paqueteid'=>$idspaq,
                    'medidaid'=>$medida,
                    'tipoMovimiento'=>$movid,
                    'fecha'=>$date,
                    'cantidad'=>$paq->kgs,
                    'estadoid'=>$estadopaq,
                    'documentoReferencia'=>$identregamp
                  ]);
                }
              }
            }
          }

          //dd('damwkjalwjdklajwdjaw');

          $db5 = DB::table('preparacionmprun')->where('id', '=', $d->idproceso)->update([
            'trazabilidad'=>$d->nrodetraza,
            'stock'=>$d->stock,
            'virgen'=>$d->virgen,
            'kilos'=>$kilosTotales,
            'horno'=>$d->horno,
            'batea'=>$d->batea,
            'reprocesar'=>$d->arepro,
            'corte'=>$d->cont,
            'operario'=>$d->operario,
            'estadoid'=>4,
            'fechaEjecucion'=>$date
          ]);

          if ($db5 !== 1)
            return "false";

          // SI LA MATERIA PRIMA EXCEDIO EN UN MAS DE 20% EL KILAJE INGRESADO EN LA COTIZACION
          // => PASA A ESTADO PENDIENTE DE AUTORIZACION (TAMBIEN SI ESTA 20% POR DEBAJO SE OFRECE UNA NUEVA ORDEN A PARTIR DE
          // ACTUAL
          // SE LE AGREGA UN EXTRA DE 10% QUE ES ESTIMADO POR TRAFICAÑO, YA QUE LA MP PUEDE PASAR POR VARIAS TREFILAS;ETC.
          //  POR ESO LO MULTIPLICO POR 1.1
          // $_POST KIL ES EL QUE CARGARON EN RUNPREPARACIONMP
          // POST[kgs] SON LOS QUE SE PIDIERON Y ESTAN EN LA ORDEN ($ktotal)
          // POST[kil] SON LOS QUE CARGARON EN EL REGRESO DEL TOUR, ES DECIR LOS REALES, LOS QUE SE SEPARARON ($kilosTotales)
          $ktotal = 0;
          if ($d->kgs !== "")
            $ktotal = intval(preg_replace("/[^-0-9\.]/","",$d->kgs));

          $kgN = 0;

          if((abs($kilosTotales-$ktotal)>(0.2*($ktotal*1.1)))){
            if(($kilosTotales*1.1)-$ktotal>0){
              $db6 = DB::table('subprocesosestado')->where('procesoid', '=', $d->idproceso)->where('tipoProceso', '=', 1)->update([
                'estadoid'=>5
              ]);              
              $autorequired = 1;
              $auto = "true";
            }
            else{ // FALTANTE DE MP, => PREGUNTO SI QUIERE GENERAR NUEVA ORDEN POR FALTANTE
              $autorequired=2;
              $kgN = ($ktotal-$kilosTotales);
              $this->upd_subprocesosE(1, $d->idproceso, $fecha);
              
              $dataR[] = (object)['autorequired'=>$autorequired, 'kgn'=>$kgN, 'op'=>$d->op, 'ver'=>$d->ver, 'coti'=>$d->cotizacionid];
            }

          }
          else{
            $this->upd_subprocesosE(1, $d->idproceso, $fecha);
          }


        }

        $objR = (object)['listprocess'=>$dataR, 'auto'=>$auto];
        //dd($objR);

        return response()->json($objR);

      }
      else{
        $dataTre = [];

        $db = 'SELECT '.
              "pmp.id as idpmp,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=1) ".
              "LEFT JOIN preparacionmprun pmp ON (pmp.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version= ".
              "(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            if ($r->idpmp > 0){
              $idpmp = $r->idpmp;

              $sql = 'SELECT DISTINCT '.
                     "mpr.id as idmp, me.id as medOri, op.id as 'nro', vxo.*, c.razon as cliente, ".
                     "mpr.idplan, mp.*, m.diametroExteriorNominal as diamExt,  m.espesorNominal as ".
                     "Espe, tc.descripcion as tratter, IF (vxo.urgente=1,'U','') as urg, ".
                     "vxo.id as idVer, pro.razon as provee,me.diametroExterior,me.espesorNominal, ".
                     "tcos.descripcion as costura, ".
                     "paq.numeroTrazabilidad as traza,IF (SUM( st.cantidad )>0,SUM(st.cantidad),0) ".
                     "AS stock, op.cotizacionid, ".
                     "IF(me.largoMaximo=me.largoMinimo,me.largoMaximo,round(((me.largoMaximo-me".
                     ".largoMinimo)/2)/2,2)) as lg ".
                     "from preparacionmprun mpr ".
                     "INNER JOIN subprocesosestado se ON (se.procesoid=mpr.id and se.tipoProceso=1) ".
                     "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                     "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                     "LEFT JOIN preparacionmp mp ON (mp.id = mpr.idplan) ".
                     "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                     "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                     "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                     "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                     "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                     "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                     "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                     "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = paq.id ) ".
                     "where mpr.id=$idpmp GROUP BY me.id;";

              $res1 = DB::select($sql);

              if (count($res1)>0){

                foreach ($res1 as $r1) {
                  $Kgrametro = 0;
                  if (!($r1->kilogrametro>0))
                    $Kgrametro = $this->kilogrametro ($r1->diamExt, $r1->Espe);

                  $metros = empty($r1->metros)?($r1->kilos/$r1->kilogrametro):$r1->metros;
                  $kilos = empty($r1->kilos)?($r1->kilogrametro*$metros):$r1->kilos;

                  $dataTre[] = (object) ['idmp'=> $r1->idmp, 'fechapedido'=> $r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'espesor'=>$r1->Espe, 'metros'=>number_format($metros,2), 'kilos'=>number_format($kilos,2), 'piezas'=>$r1->piezas, 'tratamiento'=> $r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesorNominal'=>$r1->espesorNominal, 'costura'=>$r1->costura, 'lg'=>$r1->lg, 'cotizacionid'=>$r1->cotizacionid, 'medida'=>$r1->medOri, 'op'=>$r1->nro, 'ver'=>$r1->idVer, 'stock'=>$r1->stock, 'nrodetraza'=>$r1->traza];
                }
              }
            }
          }
        }

        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;        
      }
    }

    public function runhorno($eje, $datos, $date)
    {
      if ($eje > 0){
        foreach ($datos as $d) {
          $db = DB::table('hornorun')->where('id', '=', $d->idproceso)->update([
            'horaCarga' => $d->horacarga,
            'fechaEjecucion' => $date,
            'caniosxCamada' => $d->canioxcam,
            'largo' => $d->largocanio,
            'kilogrametroCamada' => $d->kgcamada,
            'kilosLote' => $d->kiloslote,
            'durezaEntrada' => $d->entradasol,
            'durezaSalida' => $d->salidasol,
            'registroGas' => $d->mtsgas,
            'temperatura' => $d->mufla,
            'velocidad' => $d->veloc,
            'color' => $d->color,
            'relacionGenAire' => $d->aire,
            'relacionGenGas' => $d->gas,
            'operario' => $d->operario,
            'estadoid' => 4
          ]);

          $this->upd_subprocesosE(2, $d->idproceso, $date);

        }
        return true;
      }
      else{
        $dataTre = [];
        $db = 'SELECT '.
              "h.id as idhor,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=2) ".
              "LEFT JOIN hornorun h ON (h.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version= ".
              "(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                  "h.id as idhor, op.id as 'nro', vxo.*, c.razon as cliente, ".
                  "h.idplan, hor.*, m.diametroExteriorNominal as diamExt, ".
                  "m.espesorNominal as Espe,tc.descripcion as tratter,IF (vxo.urgente=1, ".
                  "'U', '') as urg, pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                  "tcos.descripcion as costura from hornorun h ".
                  "INNER JOIN subprocesosestado se ON (se.procesoid=h.id and se.tipoProceso=2) ".
                  "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                  "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                  "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                  "LEFT JOIN horno hor ON (hor.id = h.idplan) ".
                  "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                  "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                  "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                  "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                  "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                  "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                  "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                  "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                  "where h.id=$r->idhor  GROUP BY h.id ;";

            $res1 = DB::select($sql);

            if (count($res1)>0){
              foreach ($res1 as $r1) {

                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?number_format(($r1->kilogrametro*$r1->metros), 2):$r1->kilos;

                $dataTre[] = (object)['idhor'=>$r1->idhor, 'fechapedido'=> $r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'metros'=>$r1->metros, 'kilos'=>$r1->kilos, 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesorNominal'=>$r1->espesorNominal, 'costura'=>$r1->costura];
              }
            }
          }
        }

        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;        
      }
    }

    public function runbatea($eje, $datos, $date)
    {
      if ($eje > 0){
        foreach ($datos as $d) {
          list($dia, $mes, $anio) = explode('/', $d->fecha);

          if (strlen($dia) < 2)
            $di = '0'.$dia; 
          else
            $di = $dia;      

          $fecha = $anio."-".$mes."-".$di;

          $db = DB::table('batearun')->where('id', '=', $d->idproceso)->update([
            'largo' => $d->largo,
            'cantidadPaquetes' => $d->cantpaq,
            'tubosxPaquete' => $d->tubosxpaq,
            'kilosEnjabonado' => $d->kgenja,
            'kilosOtros' => $d->kgotros,
            'fechaEjecucion' => $fecha,
            'horaInicio' => $d->horaini,
            'horaFin' => $d->horafin,
            'operario' => $d->operario,
            'observaciones' => $d->obs,
            'estadoid'=> 4
          ]);

          $this->upd_subprocesosE(3, $d->idproceso, $date);

        }
        return true;          
      }
      else {
        $dataTre = [];

        $db = 'SELECT '.
              "b.id as idbatrun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=3) ".
              "LEFT JOIN batearun b ON (b.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version=".
              "(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                   "b.id as idbatrun, op.id as 'nro', vxo.*, c.razon as cliente, b.idplan, ba.*, ".
                   "m.diametroExteriorNominal as diamExt, m.espesorNominal as Espe, ".
                   "tc.descripcion as tratter, IF (vxo.urgente=1,'U', '') as urg, ".
                   "pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                   "tcos.descripcion as costura from batearun b ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=b.id and se.tipoProceso=3) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN batea ba ON (ba.id = b.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "lEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where b.id=$r->idbatrun  GROUP BY b.id ;";

            $res1 = DB::select($sql);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                # code...
                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;

                $kilos = empty($r1->kilos)?number_format(($r1->kilogrametro*$r1->metros), 2):$r1->kilos;

                $dataTre[] = (object)['idbatrun'=>$r1->idbatrun, 'fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'kilos'=>$kilos, 'metros'=>$metros, 'piezas'=> $r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura];
              }

            }

          }

        }

        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;        
      }
    }

    public function runpunta($eje, $datos, $date)
    {
      if ($eje > 0){
        foreach ($datos as $d) {

          list($dia, $mes, $anio) = explode('/', $d->fecha);

          if (strlen($dia) < 2)
            $di = '0'.$dia; 
          else
            $di = $dia;      

          $fecha = $anio."-".$mes."-".$di;

          $db = DB::table('puntarun')->where('id', '=', $d->idproceso)->update([
            'maquina'=>$d->maquina,
            'tubos'=>$d->tubos,
            'kilos'=>$d->kilos,
            'fechaEjecucion'=>$fecha,
            'horaInicio'=>$d->horainiop,
            'horaFin'=>$d->horafinop,
            'horarioPreparacion'=>$d->horaprep,
            'operario'=>$d->operario,
            'observaciones'=>$d->obs,
            'estadoid'=> 4
          ]);

          $this->upd_subprocesosE(4, $d->idproceso, $date);


        }
        return true; 
      }
      else {
        $dataTre = [];

        $db = 'SELECT '.
              "p.id as idpunrun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=4) ".
              "LEFT JOIN puntarun p ON (p.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                   "p.id as idpun, op.id as 'nro', vxo.*, c.razon as cliente, p.idplan, pun.*, ".
                   "m.diametroExteriorNominal as diamExt, m.espesorNominal as Espe, ".
                   "tc.descripcion as tratter, IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee,me.diametroExterior,me.espesorNominal, ".
                   "tcos.descripcion as costura ".
                   "from puntarun p ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=p.id and se.tipoProceso=4) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN punta pun ON (pun.id = p.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where p.id=$r->idpunrun GROUP BY p.id ;";

            $res1 = DB::select($sql);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?number_format(($r1->kilogrametro*$r1->metros), 2):$r1->kilos;

                $dataTre[] = (object)['idpun'=>$r1->idpun, 'fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'kilos'=>$r1->kilos, 'metros'=>$r1->metros, 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura];
              }
            }
          }

        }

        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;        
      }
    }

    public function runtrefila($eje, $datos, $date)
    {
      if ($eje > 0){
        foreach ($datos as $d) {

          list($dia, $mes, $anio) = explode('/', $d->fecha);

          if (strlen($dia) < 2)
            $di = '0'.$dia; 
          else
            $di = $dia;      

          $fecha = $anio."-".$mes."-".$di;

          $db = DB::table('trefilarun')->where('id', '=', $d->idproceso)->update([
            'numero'=>$d->nrotrefila,
            'fechaEjecucion'=>$fecha,
            'horaInicio'=>$d->horainiop,
            'horaFin'=>$d->horafinop,
            'horarioPreparacion'=>$d->horaprep,
            'operario'=>$d->operario,
            'observaciones'=>$d->obs,
            'estadoid'=> 4
          ]);

          $this->upd_subprocesosE(5, $d->idproceso, $date);


        }
        return true; 
      }
      else {
        $dataTre = [];
        $ordertrefila = [];

        $db = 'SELECT '.
              "t.id as idtrerun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=5) ".
              "LEFT JOIN trefilarun t ON (t.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);


        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                   "t.id as idtrerun, op.id as 'nro', vxo.*, vxo.id as idvers, ".
                   "c.razon as cliente, t.idplan, tre.*, m.diametroExteriorNominal as diamExt, ".
                   "m.espesorNominal as Espe, tc.descripcion as tratter, ".
                   "IF (vxo.urgente=1,'U', '') as urg, pro.razon as provee, me.diametroExterior, ".
                   "me.espesorNominal, tcos.descripcion as costura from trefilarun t ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=t.id and se.tipoProceso=5) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN trefila tre ON (tre.id = t.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where t.id=$r->idtrerun and se.estadoid=3 GROUP BY t.id ;";

            $res1 = DB::select($sql);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $sql1 = 'SELECT '.
                        "orden from ordenprocesoop where idOrdenProduccion=$r1->idvers ;";

                $res2 = DB::select($sql1);

                if (count($res2)>0){
                  $dataord = $res2[0];
                  $ordexpl = explode(",",$dataord->orden);
                  $cont = 1;

                  foreach ($ordexpl as $vls){
                     $parser = explode("*",$vls);
                     if ($parser[0]==5){
                         
                         $ordertrefila[$r1->idvers][$parser[1]] = $cont;
                        $cont++;
                     }
                   
                  }

                  $lugar = ($ordertrefila[$r1->idvers][$r1->idplan])>1?'FIN':'INT.';

                  $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                  $kilos = empty($r1->kilos)?number_format(($r1->kilogrametro*$r1->metros), 2):$r1->kilos;

                  $dataTre[] = (object)['idplan'=>$r1->idplan, 'idtrerun'=>$r1->idtrerun, 'fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'metros'=>$metros, 'kilos'=>$r1->kilos, 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura];
                }
              }
            }
          }
        }

        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;        
      }
    }

    public function runenderezadora($eje, $datos, $date)
    {
      if ($eje > 0){
        foreach ($datos as $d) {

          list($dia, $mes, $anio) = explode('/', $d->fecha);

          if (strlen($dia) < 2)
            $di = '0'.$dia; 
          else
            $di = $dia;      

          $fecha = $anio."-".$mes."-".$di;

          $db = DB::table('enderezadorun')->where('id', '=', $d->idproceso)->update([
            'tipoEnderezado' =>$d->tipoenderazado,
            'fechaEjecucion' =>$fecha,
            'horaInicio' =>$d->horainiop,
            'horaFin' =>$d->horafinop,
            'horarioPreparacion' =>$d->horaprep,
            'operario' =>$d->operario,
            'observaciones' =>$d->obs,
            'estadoid' =>4
          ]);

          $this->upd_subprocesosE(6, $d->idproceso, $date);

        }

        return true;
      }
      else {
        $dataTre = [];

        $db = 'SELECT '.
              "e.id as idendrun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=6) ".
              "LEFT JOIN enderezadorun e ON (e.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                   "er.id as idend, op.id as 'nro', vxo.*, c.razon as cliente, ". 
                   "er.idplan, e.*,m.diametroExteriorNominal as diamExt, ".
                   "m.espesorNominal as Espe, tc.descripcion as tratter, ".
                   "IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                   "tcos.descripcion as costura from enderezadorun er ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=er.id and se.tipoProceso=6) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN enderezadora e ON (e.id = er.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where er.id=$r->idendrun GROUP BY er.id ;";

            $res1 = DB::select($sql);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                
                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;

                $kilos = empty($r1->kilos)?number_format(($r1->kilogrametro*$r1->metros), 2):$r1->kilos;

                $dataTre[] = (object)['idend'=>$r1->idend, 'fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'metros'=>$metros, 'kilos'=>$kilos, 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura];
              }
            }

          }
        }
        
        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;
      }

      
    }

    public function runcorte($eje, $datos, $date)
    {
      if ($eje > 0){
        foreach ($datos as $d) {

          list($dia, $mes, $anio) = explode('/', $d->fecha);

          if (strlen($dia) < 2)
            $di = '0'.$dia; 
          else
            $di = $dia;      

          $fecha = $anio."-".$mes."-".$di;

          $db = DB::table('corterun')->where('id', '=', $d->idproceso)->update([
            'numero'=>$d->nrocorta,
            'fechaEjecucion'=>$fecha,
            'horaInicio'=>$d->horainiop,
            'horaFin'=>$d->horafinop,
            'horarioPreparacion'=>$d->horaprep,
            'operario'=>$d->operario,
            'observaciones'=>$d->obs,
            'estadoid'=>4
          ]);

          $this->upd_subprocesosE(7, $d->idproceso, $date);

        }

        return true;

      }
      else {
        $dataTre = [];

        $db = 'SELECT '.
              "c.id as idcorrun,vxo2.id as vxoid ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
              "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=7) ".
              "LEFT JOIN corterun c ON (c.idplan = se.idplan) ".
              "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=3 ".
              "and vxo2.version=(SELECT MAX(vxo.version) ".
              "from ordenproduccion op ".
              "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
              "where (op.estadoid=2 or op.estadoid=3)  and ".
              "vxo.ordenProduccion=vxo2.ordenProduccion ".
              "GROUP BY (vxo.ordenProduccion) ) ".
              "order by vxo2.urgente desc,fechaPrometida desc ;";

        $res = DB::select($db);

        if (count($res)>0){
          foreach ($res as $r) {
            $sql = 'SELECT DISTINCT '.
                   "co.id as idcorun, op.id as 'nro', vxo.*, c.razon as cliente, ".
                   "co.idplan, ct.*, m.diametroExteriorNominal as diamExt, ".
                   "m.espesorNominal as Espe, tc.descripcion as tratter, ".
                   "IF (vxo.urgente=1,'U','') as urg, ".
                   "pro.razon as provee, me.diametroExterior, me.espesorNominal, ".
                   "tcos.descripcion as costura ".
                   "from corterun co ".
                   "INNER JOIN subprocesosestado se ON (se.procesoid=co.id and se.tipoProceso=7) ".
                   "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                   "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                   "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                   "LEFT JOIN corte ct ON (ct.id = co.idplan) ".
                   "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                   "LEFT JOIN estadofabricacion tc ON (tc.id = vxo.tratamientoTermico) ".
                   "LEFT JOIN procesosxop pxop ON (pxop.idCP = vxo.id and pxop.tipoProceso=1) ".
                   "LEFT JOIN preparacionmp mp ON (mp.id = pxop.procesoid) ".
                   "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                   "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                   "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                   "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                   "where co.id=$r->idcorrun GROUP BY co.id ;";

            $res1 = DB::select($sql);

            if (count($res1)>0){
              foreach ($res1 as $r1) {
                $metros = empty($r1->metros)?number_format(($r1->kilos/$r1->kilogrametro), 2):$r1->metros;
                $kilos = empty($r1->kilos)?number_format(($r1->kilogrametro*$r1->metros), 2):$r1->kilos;

                $dataTre[] = (object)['idcorun'=>$r1->idcorun, 'fechapedido'=>$r1->fechaPedido, 'cliente'=>$r1->cliente, 'diamext'=>$r1->diamExt, 'esp'=>$r1->Espe, 'metros'=>$metros,'kilos'=>$r1->kilos, 'piezas'=>$r1->piezas, 'tratamiento'=>$r1->tratter, 'nro'=>$r1->nro, 'urg'=>$r1->urg, 'provee'=>$r1->provee, 'diametroExterior'=>$r1->diametroExterior, 'espesor'=>$r1->espesorNominal, 'costura'=>$r1->costura];
              }
            }
          }
        }

        $operarios = DB::table('personal')->get();

        $obj = ['procesos'=>$dataTre, 'operarios'=>$operarios];

        return $obj;        
      }

    }

    public function kilogrametro($de,$es){
      
        return number_format(($de-$es)*$es*0.0246, 3);

    }

    public function upd_subprocesosE($tipoP,$key, $hoy){

      $db = DB::table('subprocesosestado')->where('tipoProceso', '=', $tipoP)->where('procesoid', '=', $key)->update([
        'estadoid'=>4
      ]);

      $db1 = DB::table('subprocesosestado')->where('tipoProceso', '=', $tipoP)->where('procesoid', '=', $key)->first();

      $db2 = DB::table('subprocesosestado')->where('orden', '=', ($db1->orden + 1))->where('ordenProduccion', '=', $db1->ordenProduccion)->update([
        'estadoid'=>3
      ]);

      if ($db2==0){
        $db3 = DB::table('versionesxorden')->where('id', '=', $db1->ordenProduccion)->select('versionesxorden.ordenProduccion as ido')->first();

        $db4 = DB::table('ordenproduccion')->where('id', '=', $db3->ido)->update([
          'estadoid'=> 4
        ]);
      }
      else {
        $db5 = DB::table('versionesxorden')->where('id', '=', $db1->ordenProduccion)->update([
          'fechaInicio'=> $hoy
        ]);
      }

    }

    public function open_tour(Request $request){
      $dataids = json_decode($request->get('dataids'));
      $tipoproceso = (int) $request->get('tipo');

      $l = "";
      foreach ($dataids as $key => $value) {
        $l .= $value->idmp.", ";
      }

      $e = trim($l);

      $list = rtrim($e, ",");

      if (count($dataids)>0){
        $db = 'UPDATE '.
              "subprocesosestado set estadoid=3 where tipoProceso=$tipoproceso and ".
              "procesoid IN ($list) ;";
              
        $res = DB::select($db);
      }

      return "true";
    }

    public function SeleTraza(Request $request){
      $datacheck = [];
      $seleccion = (int) $request->get('seleccion');
      $idmp = (int) $request->get('mpid');
      $ordenid = (int) $request->get('ordenid');
      $medidaid = (int) $request->get('medidaid');

      if ($seleccion == 1){
        /// Ejecutar Stock ///

      }
      else{
        /// Listar Stock ///
        $db = 'SELECT '.
              "p.*,smp.cantidad ".
              " FROM paquetes p ".
              "INNER JOIN  stockmateriaprima smp ON (smp.paqueteid = p.id) ".
              "LEFT JOIN medidas m ON (m.id = p.medidaid) ".
              "where p.medidaid=$medidaid ;";

        $res = DB::select($db);
        // dd($medidaid);

        if (count($res)>0){
          foreach ($res as $r) {
            $datacheck[] = (object)['id'=>$r->id, 'nrotrazabilidad'=>$r->numeroTrazabilidad, 'cantidad'=>$r->cantidad, 'medida'=>$medidaid];
          }
          return response()->json(['resultado'=>$datacheck]);
        }
        return "false";
      }
    }

    public function pasaraplanta(Request $request){

      $date = Carbon::now();
      $hoy = $date->toDateString();

      $procesos = json_decode($request->get('procesos'));

      if (count($procesos)>0){
        foreach ($procesos as $orden) {
          $db = 'SELECT '.
                "vxo.id FROM versionesxorden vxo where ".
                "vxo.ordenProduccion=$orden and ".
                "vxo.version=(SELECT MAX(vxo2.version) ".
                "from versionesxorden vxo2 where vxo2.ordenProduccion=$orden);";

          $res = DB::select($db);

          if(count($res)>0){
            foreach ($res as $r) {
              $db1 = DB::table('subprocesosestado')->where('orden', '=', 1)->where('ordenProduccion', '=', $r->id)->update([
                'estadoid'=>3
              ]);

              $db2 = DB::table('versionesxorden')->where('id', '=', $r->id)->update([
                'fechaPlanta'=>$hoy
              ]);
            }
          }
        }
      }


      $cadena = implode(", ", $procesos);
      
      $db3 = 'UPDATE '.
             "ordenproduccion set estadoid=3 WHERE id IN ($cadena);";

      $res3 = DB::select($db3);

      return "true";

    }

    public function ordenes(){

      $estados = DB::table('estadosop')->get();
      $tipoacero = DB::table('tipoacero')->get();
      $tipocostura = DB::table('tipocostura')->get();
      $tratamiento = DB::table('estadofabricacion')->get();
      $normas = DB::table('normas')->get();
      $tipoorden = DB::table('reventa')->get();
      $uso = DB::table('usofinal')->get();

      return view('produccion.ordenes', compact('tipoacero', 'tipocostura', 'tratamiento', 'normas', 'tipoorden', 'uso', 'estados'));
    }

    public function buscarordenes(Request $request){
      $input = $request->all();
      $q0 = "";
      $q0 .= (empty($input['fechadesde']))? "" : " AND p.fechaPlanta>='".$this->convertdate($input['fechadesde'])."'";
      $q0 .= (empty($input['fechahasta']))? "" : " AND p.fechaPlanta<='".$this->convertdate($input['fechahasta'])."'";
      $q0 .= (empty($input['fechaplantadesde']))? "" : " AND p.fechaPrometida>='".$this->convertdate($input['fechaplantadesde'])."'";
      $q0 .= (empty($input['fechaplantahasta']))? "" : " AND p.fechaPrometida<='".$this->convertdate($input['fechaplantahasta'])."'";
      $q0 .= (empty($input['clienteb']))? "" : " AND c.razon LIKE '%".$input['clienteb']."%'";
      $q0 .= (empty($input['codigoclienteb']))? "" : " AND p.codigoPieza LIKE '%".$input['codigoclienteb']."%'";
      $q0 .= (empty($input['diamexdesde']))? "" : " AND mc.diametroExteriorNominal>=".$input['diamexdesde']."";
      $q0 .= (empty($input['diamexhasta']))? "" : " AND mc.diametroExteriorNominal<=".$input['diamexhasta']."";
      $q0 .= (empty($input['diamexmindesde']))? "" : " AND mc.diametroExteriorMinimo>=".$input['diamexmindesde']."";
      $q0 .= (empty($input['diamexminhasta']))? "" : " AND mc.diametroExteriorMinimo<=".$input['diamexminhasta']."";
      $q0 .= (empty($input['diamexmaxdesde']))? "" : " AND mc.diametroExteriorMaximo>=".$input['diamexmaxdesde']."";
      $q0 .= (empty($input['diamexmaxhasta']))? "" : " AND mc.diametroExteriorMaximo<=".$input['diamexmaxhasta']."";
      $q0 .= (empty($input['diameindesde']))? "" : " AND mc.diametroInteriorNominal>=".$input['diameindesde']."";
      $q0 .= (empty($input['diameinhasta']))? "" : " AND mc.diametroInteriorNominal<=".$input['diameinhasta']."";
      $q0 .= (empty($input['diameinmindesde']))? "" : " AND mc.diametroInteriorMinimo>=".$input['diameinmindesde']."";
      $q0 .= (empty($input['diameinminhasta']))? "" : " AND mc.diametroInteriorMinimo<=".$input['diameinminhasta']."";
      $q0 .= (empty($input['diameinmaxdesde']))? "" : " AND mc.diametroInteriorMaximo>=".$input['diameinmaxdesde']."";
      $q0 .= (empty($input['diameinmaxhasta']))? "" : " AND mc.diametroInteriorMaximo<=".$input['diameinmaxhasta']."";
      $q0 .= (empty($input['espesordesde']))? "" : " AND mc.espesorNominal>=".$input['espesordesde']."";
      $q0 .= (empty($input['espesorhasta']))? "" : " AND mc.espesorNominal<=".$input['espesorhasta']."";
      $q0 .= (empty($input['espesorminextdesde']))? "" : " AND mc.espesorMinimo>=".$input['espesorminextdesde']."";
      $q0 .= (empty($input['espesorminexthasta']))? "" : " AND mc.espesorMinimo<=".$input['espesorminexthasta']."";
      $q0 .= (empty($input['largomax']))? "" : " AND mc.largoMaximo=".$input['largomax']."";
      $q0 .= (empty($input['largomin']))? "" : " AND mc.largoMinimo=".$input['largomin']."";
      $q0 .= (empty($input['tipoacerob']))? "" : " AND p.tipoAcero=".$input['tipoacerob']."";
      $q0 .= (empty($input['tipocosturab']))? "" : " AND mc.costuraid=".$input['tipocosturab']."";
      $q0 .= (empty($input['tiponormab']))? "" : " AND mc.normaid=".$input['tiponormab']."";
      $q0 .= (empty($input['nroordenb']))? "" : " AND op.id=".$input['nroordenb']."";
      $q0 .= (empty($input['estadob']))? "" : " AND op.estadoid=".$input['estadob']."";
      if ($request->get('estadob')<>6)
          $q0 .= " AND op.estadoid<>6 ";
      $q0 .= (empty($input['tipoordenb']))? "" : " AND p.tipoReventa=".$input['tipoordenb']."";
            $q0 .= (empty($input['tratamientob']))? "" : " AND co.tratamientoTermico=".$input['tratamientob']."";
      $q0 .= (empty($input['usob']))? "" : " AND p.uso=".$input['usob']."";
      $q0 .= (empty($input['kilosdesde']))? "" : " AND p.kilos>=".$input['kilosdesde']."";
      $q0 .= (empty($input['kiloshasta']))? "" : " AND p.kilos<=".$input['kiloshasta']."";


      $db = 'SELECT '.
            "op.id as Norden, co.id as idcotizacion, c.razon as Cliente, p.codigoPieza as 'Codigo', ".
            "IF (p.urgente=1, 'U', '') as 'URG',semanaPrometida as 'Sem', ".
            "(pr2.descripcion) as Procesoactual,p.fechaPlanta as Paseaplanta, ".
            "p.fechaPedido as FechaPedido,  mc.diametroExteriorNominal as Ext, ".
            "mc.espesorNominal as Esp, p.piezas as Pzas, ".
            "IF(p.metros>0, p.metros, round(p.kilos/((mc.diametroExteriorNominal ".
            "- mc.espesorNominal) * mc.espesorNominal * 0.0246), 2)) as Mts, ".
            "IF(p.kilos>0, p.kilos, round(p.metros*((mc.diametroExteriorNominal ".
            "- mc.espesorNominal) * mc.espesorNominal * 0.0246), 2)) as Kgs, ".
            "tc.descripcion as Cost,tt.descripcion as TTermico, tt.detalle as TTdetalle, ".
            "pro.razon as Prov,me.diametroExterior as ExtMP,me.espesorNominal as EspMP, ".
            "IF(p.kilos>0, p.kilos*1.1, round(p.metros*((mc.diametroExteriorNominal -".
            "mc.espesorNominal) * mc.espesorNominal * 0.0246), 2)*1.1) as Kgsaprep, ".
            "tcm.descripcion as Tipo,es.descripcion as Estado, cert.descripcion as Certificado, ".
            "(SELECT  GROUP_CONCAT(IF( se.estadoid =3, CONCAT(  '<b>', pr.descripcion, '</b>' ), ".
            "pr.descripcion ) ORDER BY se.orden ASC SEPARATOR  '<br/> ') ".
            "from  subprocesosestado se LEFT JOIN procesos pr ON (pr.id = se.tipoProceso ) ".
            "where  se.ordenProduccion = p.id ) as 'PROCESOS', ".
            "p.codigoPieza as CodPieza,trev.descripcion as 'RVPRMP', ".
            "p.fechaPrometida as Fechaprometida,p.version as Version, ".
            "(p.id) FROM ordenproduccion op ".
            "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
            "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
            "LEFT JOIN clientes c ON (c.id = p.clienteid) ".
            "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
            "LEFT JOIN estadofabricacion tt ON (tt.id = p.tratamientoTermico) ".
            "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
            "LEFT JOIN preparacionmp mp ON (mp.id = (SELECT px2.procesoid ".
            "FROM procesosxop px2 WHERE px2.tipoProceso =1 AND px2.idCP = p.id ".
            "AND procesoid >0 LIMIT 1)) ".
            "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
            "LEFT JOIN estadosop es ON (es.id = op.estadoid) ".
            "LEFT JOIN tipocostura tcm ON (tcm.id = me.tipoCostura) ".
            "LEFT JOIN subprocesosestado se2 ON ( se2.ordenProduccion = p.id  and se2.estadoid=3) ".
            "LEFT JOIN procesos pr2 ON ( pr2.id = se2.tipoProceso ) ".
            "LEFT JOIN paquetes paq ON (paq.id =".
            "(SELECT pq.id from paquetes pq where pq.medidaid=me.id LIMIT 1) ) ".
            "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
            "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = paq.id ) ".
            "LEFT JOIN reventa trev ON (trev.id = p.tipoReventa) ".
            "LEFT JOIN certificado cert ON (cert.id = p.certificadoid) ".
            "WHERE 1=1 and p.version=(SELECT MAX(vxo.version) ".
            "from ordenproduccion op ".
            "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
            "WHERE vxo.ordenProduccion=p.ordenProduccion ".
            "GROUP BY (vxo.ordenProduccion) ) $q0 GROUP BY p.id order by op.id desc;";

      $res = DB::select($db);
      if (count($res)>0){
        return response()->json(['resultado'=>$res]);

      }
      return "false";

    }

    public function convertdate($fecha){
      list($dia, $mes, $anio) = explode('/', $fecha);       
            $date = $anio."-".$mes."-".$dia;
      return $date;
    }

    public function ver_orden($id, $coti)
    {
      $resobj = null;

      if ($coti > 0 || $coti !== null){
        // $db = 'SELECT '.
        // "hor.id as horid,bat.id as batid,tre.id as idtre,pmp.precio as precioMP, ".
        // "m.*,c.*,c.formaid as formid,m.id as medid,est.largoMaximo as largomaxest, ".
        // "est.largoMinimo as largominest,est.id as ideste, ".
        // "est.normaid as tiponormaest,ta.id as tacero,est.tipoCostura as tipocosturaest, ".
        // "est.observaciones as observaeste,est.medida as med, ".
        // "est.numeroColada as numeroColada,cl.razon as razon, cl.id as idcliente, ".
        // "tr.descripcion as descreventa, tc.descripcion as descostura, ".
        // "n.descripcion as desnorma, f.descripcion as desforma, ".
        // "uf.descripcion as desusofinal, e.descripcion as desembalaje,ec.descripcion as estcot, ".
        // "tcest.descripcion as costuraidest,nest.descripcion as normaidest, ".
        // "IF (c.urgente=1, 'SI', 'NO') as urgencia,IF (c.biselado=1,'SI','NO') as bise, ".
        // "tmon.descripcion as moneda, ".
        // "IF (c.aplastado=1,'SI','NO') as aplas,IF (c.pestaniado=1,'SI','NO') as pesta, ".
        // "pc.precioKilo,pc.precioPieza,pc.precioMetro,pc.fecha as fechapc, ".
        // "cv.descripcion as condicionvta,tt.descripcion as desctt,tt.detalle as detallett, ".
        // "te.direccion as Lentrega ".
        // "FROM  cotizaciones c ".
        // "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
        // "LEFT JOIN estencilado est ON (est.id = c.estenciladoid) ".
        // "LEFT JOIN clientes cl ON (cl.id = c.clienteid) ".
        // "LEFT JOIN entrega te ON (te.id = c.lugarEntrega) ".
        // "LEFT JOIN reventa tr ON (tr.id = c.tipoReventa) ".
        // "LEFT JOIN tipocostura tc ON (tc.id = m.costuraid) ".
        // "LEFT JOIN tipocostura tcest ON (tcest.id = est.tipoCostura) ".
        // "LEFT JOIN normas n ON (n.id = m.normaid) ". 
        // "LEFT JOIN normas nest ON (nest.id = est.normaid) ".
        // "LEFT JOIN formas f ON (f.id = c.formaid) ".
        // "LEFT JOIN usofinal uf ON (uf.id = c.uso) ".
        // "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = c.id and pxcp.tipoProceso=1 ) ".
        // "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
        // "LEFT JOIN procesosxcp ptrefi ON (ptrefi.idCP = c.id and ptrefi.tipoProceso=5 ) ".
        // "LEFT JOIN trefila tre ON (tre.id = ptrefi.procesoid) ".
        // "LEFT JOIN procesosxcp phorno ON (phorno.idCP = c.id and phorno.tipoProceso=2 ) ".
        // "LEFT JOIN horno hor ON (hor.id = phorno.procesoid) ".
        // "LEFT JOIN procesosxcp pbatea ON (pbatea.idCP = c.id and pbatea.tipoProceso=3) ".
        // "LEFT JOIN batea bat ON (bat.id = pbatea.procesoid) ".
        // "LEFT JOIN embalajes e ON (e.id = c.tipoembalaje) ".
        // "LEFT JOIN estadocotizacion ec ON (ec.id = c.estadoid) ".
        // "LEFT JOIN tipoacero ta ON (ta.id = c.tipoAcero) ".
        // "LEFT JOIN monedas tmon ON (tmon.id = c.tipoMoneda) ".
        // "LEFT JOIN condicionventa cv ON (cv.id = c.condicionVenta) ".
        // "LEFT JOIN estadofabricacion tt ON (tt.id = c.tratamientoTermico) ".
        // "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
        // "(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=$coti)) where c.id=$coti LIMIT 1 ".
        // ";";
        $db = 'SELECT '.
                "op.estadoid as est,vxo.*,vxo.id as idverop,vxo.critico as critico, ".
                "op.cotizacionid as idCoti, m.*,m.id as medid, est.largoMaximo as largomaxest, ".
                "est.largoMinimo as largominest,est.id as ideste, est.normaid as tiponormaest, ".
                "est.tipoCostura as  tipocosturaest, est.observaciones as observaeste, ".
                "est.medida as med,est.numeroColada as coladaest, tmon.descripcion as moneda, ".
                "cvt.descripcion as condicionvta, pc.precioMetro,pc.precioKilo,pc.precioPieza, ".
                "c.pesosx45 ,c.precioxContribucion,c.precioPasado, op.ordenReferencia ".
                "FROM ordenproduccion op ".
                "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
                "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                "LEFT JOIN estencilado est ON (est.id = vxo.estenciladoid) ".
                "LEFT JOIN cotizaciones c ON (c.id = op.cotizacionid) ".
                "LEFT JOIN condicionventa cvt ON (cvt.id = c.condicionVenta) ".
                "LEFT JOIN monedas tmon ON (tmon.id = c.tipoMoneda) ".
                "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
                "(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=c.id)) ".
                "where vxo.id=$id LIMIT 1 ;";

        $res = DB::select($db);
        if (count($res)>0){
          //dd($res[0]);
          $resobj = json_encode($res[0]);
        }
      }

      $resultado = null;

      $db = 'SELECT '.
            "op.estadoid as est,op.id   from ordenproduccion op ".
            "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
            "where vxo.id=$id ;";

      $res1 = DB::select($db);
      if (count($res1)>0){
        $resultado = $res1[0];
      }

      $estado_orden = $resultado->est;

      $now = Carbon::now()->toDateString();
      return view('produccion.ver_orden', compact('resultado', 'estado_orden', 'resobj', 'id', 'coti', 'now'));
    }

    public function subprocesoplanificado($id)
    {
      $db = 'SELECT '.
            "* from ordenprocesoop  where idOrdenProduccion=$id ;";
      $res = DB::select($db);

      

      $nuevo= 0 ;
      $datapp = [];
      $arrayprocGuardados = [];
      $listprocesos = [];
      $versionesxorden = [];
      $procesosSel = [];
       $tablesProc = array('preparacionMP',
       'horno'
      , 'batea'
      , 'punta'
      , 'trefila'
      , 'enderezadora'
      , 'corte'
      , 'eddyCurrent'
      , 'pruebaHidraulica'
      , 'estencilado'
      , 'empaquetado'
      , 'controlFinal'
      , 'entrega'
      , 'servicio'
      , 'procesoCertificado');

       if (count($res)<1){
          
          // eduardo para traer los proceso de la cotizacion
          $sqlTraerCotizacionProcesos = "SELECT ordenprocesocotizacion.* FROM versionesxorden
            LEFT JOIN ordenproduccion on ordenproduccion.id = versionesxorden.ordenProduccion
            LEFT JOIN ordenprocesocotizacion on ordenprocesocotizacion.idCotizacion = ordenproduccion.cotizacionid
            WHERE versionesxorden.id = ".$id."
          ";
           
          $res1 = DB::select($sqlTraerCotizacionProcesos);

          if(count($res1) > 0){
            $explodeArray = explode(",",$res1[0]->orden);
            foreach($explodeArray as $value){
              $parser = explode("*",$value);
  
              $msql = "SELECT id,descripcion from procesos WHERE id = ".$parser[0]." ;";
  
              $res2 = DB::select($msql);
  
              $datapp[] = $res2[0];
  
              
            }

          }else{
             $db1 = 'SELECT '. 
                  "id,descripcion from procesos";
            $nuevo=1;
            $res1 = DB::select($db1);
            foreach ($res1 as $r1) {
                $datapp[] = $r1;             
            }
          }
          
          
          // dd($datapp);

          
       }
       else{
        $nuevo = 0;
        $rw = $res[0];
        $array_proc = explode(",",$rw->orden);
        foreach ($array_proc as $valt){
          $parser = explode("*",$valt);
          $val = $parser[0];
          $arrayprocGuardados[] = $val;
          $idprocparticular = $parser[1];
          $and = "";
          if ($parser[1]<>0)
              $and = " and pr$val.id=$parser[1] ";

          $ix = $val-1;
          $cons = $parser[1];
          $tables1 = strtolower($tablesProc[$ix]);
          $db2 = 'SELECT '.
                 "$cons as data,p.id,p.descripcion,pr$val.id as idprocp ".
                 "from procesos p ".
                 "LEFT JOIN procesosxop pxcp ON (pxcp.idCP = ".$id." and pxcp.tipoProceso=$val) ".
                 "LEFT JOIN $tables1 pr$val ON (pr$val.id = pxcp.procesoid) ".
                 "where p.id=$val $and ;";

          $res2 = DB::select($db2);
          if (count($res2)>0){
            $datapp[] = $res2[0];
          }

        }
       }


      if (count($datapp)>0){
        $db3 = 'SELECT '.
               "mp.*,m.id as medid,m.medida,m.diametroExterior as dexor, ".
               "m.espesorNominal as espor, ".
               "IF(m.largoMaximo=m.largoMinimo,m.largoMaximo, ".
               "round(((m.largoMaximo-m.largoMinimo)/2)/2,2)) as lg ".
               "from preparacionmp mp ".
               "LEFT JOIN procesosxop pxcp  ON (pxcp.procesoid=mp.id) ".
               "LEFT JOIN medidas m  ON (m.id = mp.medidaid) ".
               "where pxcp.idCP=$id and pxcp.tipoProceso=1 ;";

        $res3 = DB::select($db3);

        if (count($res3)>0){
          $row = $res3[0];
          
          $db4 = 'SELECT '.
                 "diametroExteriorNominal as den, espesorNominal as en, c.kilogrametro, ".
                 "diametroInteriorNominal as din, mc.medida, mc.normaid,mc.costuraid, ".
                 "tc.descripcion as costu, tt.descripcion as tt, c.kilos,c.metros, ".
                 "pc.precioMetro, pc.precioKilo, pc.precioPieza, cl.razon, ".
                 "c.ordenProduccion as nop, c.version ".
                 "from versionesxorden c ".
                 "INNER JOIN medidascotizadas mc ON (mc.id = c.medidaid) ".
                 "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
                 "LEFT JOIN clientes cl ON (cl.id = c.clienteid) ".
                 "LEFT JOIN estadofabricacion tt ON (tt.id = c.tratamientoTermico) ".
                 "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
                 "(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=$id)) ".
                 "where c.id=$id ;";

          $res4 = DB::select($db4);
          if (count($res4)>0){
            $rmed = $res4[0];
            $kgmmp = number_format(($row->dexor-$row->espor)*$row->espor*0.0246,3);
            $kg2= number_format(($rmed->den-$rmed->en)*$rmed->en*0.0246,3);
            $kilos = (empty($rmed->kilos))?number_format(($kg2*$rmed->metros), 2):$rmed->kilos;
            // dd(floatval($kg2));
          $metros = (empty($rmed->metros))?number_format(($rmed->kilos/floatval($kg2)), 2):$rmed->metros;
            //$metros = 0;

            $versionesxorden[] = (object)['orden'=>$rmed->nop.'-'.$rmed->version, 'cliente'=>$rmed->razon, 'diamex'=>$rmed->den, 'esp'=>$rmed->en, 'diamein'=>$rmed->din, 'costura'=>$rmed->costu, 'tratamiento'=>$rmed->tt, 'kgm'=>$kgmmp, 'mts'=>$metros, 'ext'=>$row->dexor, 'espesor'=>$row->espor, 'lg'=>$row->lg, 'kgmp'=>$kgmmp, 'kilos'=>$kilos];
          }
        }

        ////////////////////////////////////////////////////////////////////////////
        $i = 0;
        if (is_array($datapp)){
          foreach ($datapp as $rowpr){
            $desc = str_replace("á","a",$rowpr->descripcion);
            $desc = str_replace("ó","o",$desc);
            $link= preg_replace('[\s+]','', ucfirst(strtolower($desc)));
            if(isset($rowpr->idprocp)){
              $idpropio = ($rowpr->idprocp>0)?$rowpr->idprocp:0;            
              
              if ($rowpr->data==0 or empty($rowpr->data))
                  $idpropio=0;
            }
            else{
              $idpropio = 0;
            }

              $listprocesos[] = (object)['id'=>$rowpr->id, 'idpropio'=>$idpropio, 'descripcion'=>$rowpr->descripcion, 'idorden'=>$id];
            $i++;
          }
        }


        $res4 = json_encode([]);
        if (!$nuevo){
          for ($j=1;$j<16;$j++){
              if (!in_array($j, $arrayprocGuardados)){
                  $procesosSel[] = $j;
              }
          }


          if (is_array($procesosSel)){
            $procSel = implode(",",$procesosSel);
          }

          if ($procSel !== ""){
            $qry_sp = 'SELECT '.
            "id,descripcion FROM procesos  WHERE id IN ($procSel) order by descripcion asc ;";

            $res4 = json_encode(DB::select($qry_sp));            
          }
        }

      }

      $procesosplanificados = json_encode($listprocesos);

      //$procesosplanificados son los procesos planificados que se ejecutaran (JSON)
      //$res4 son los procesos que van en el select para insertar nuevos procesos (JSON)

      $accion = "M";

      $tipobateas = DB::table('tipobatea')->get();
      $tipopuntas = DB::table('tipopunta')->get();
      $tipomatpuntas = DB::table('tipomaterialpm')->get();
      $tipoenderezados = DB::table('tipoenderezado')->get();
      $tipocorte = DB::table('tipocorte')->get();
      $tipocosturas = DB::table('tipocostura')->get();
      $normas = DB::table('normas')->get();
      $tipoempaquetados = DB::table('tipoempaquetado')->get();
      $tipoentregas = DB::table('tipoentrega')->get();
      $transportes = DB::table('transportes')->get();
      $tipohornos = DB::table('tipohorno')->get();
      $tiporubros = DB::table('tipocentro')->get();
      $certificados = DB::table('certificado')->get();

      return view('produccion.subprocesoplanificado', compact('versionesxorden', 'id', 'procesosplanificados', 'accion', 'res4', 'tipobateas', 'tipopuntas', 'tipomatpuntas', 'tipoenderezados', 'tipocorte', 'tipocosturas', 'normas', 'tipoempaquetados', 'tipoentregas', 'transportes', 'tipohornos', 'tiporubros', 'certificados'));

    }

    public function selectores()
    {
      $estados = DB::table('estadosop')->select('id', 'descripcion')->get();
      $clientes = DB::table('clientes')->select('id', 'razon')->get();
      $reventas = DB::table('reventa')->select('id', 'descripcion')->get();
      $formas = DB::table('formas')->select('id', 'descripcion')->get();
      $tratamientos = DB::table('estadofabricacion')->select('id', 'descripcion')->get();
      $embalajes = DB::table('embalajes')->select('id', 'descripcion')->get();
      $usos = DB::table('usofinal')->select('id', 'descripcion')->get();
      $costuras = DB::table('tipocostura')->select('id', 'descripcion')->get();
      $normas = DB::table('normas')->select('id', 'descripcion')->get();
      $entregas = DB::table('entrega')->select('id', 'direccion')->get();
      $aceros = DB::table('tipoacero')->select('id', 'descripcion')->get();
      $certificados = DB::table('certificado')->select('id', 'descripcion')->get();

      return response()->json(['estados'=>$estados, 'clientes'=>$clientes, 'formas'=>$formas, 'reventas'=>$reventas, 'tratamientos'=>$tratamientos, 'embalajes'=>$embalajes, 'usos'=>$usos, 'costuras'=>$costuras, 'normas'=>$normas, 'entregas'=>$entregas, 'aceros'=>$aceros, 'certificados'=>$certificados]);
    }

    public function subprocesoenejecucion($id)
    {
      $dataArray = [];
      $now = Carbon::now();
      $hoy = $now->toDateString();

      $db = 'SELECT '.
      "v.*,c.razon,pmp.*,m.id as medid,m.medida,m.diametroExterior as dexor, ".
      "m.espesorNominal as espor,mc.diametroExteriorNominal as den,mc.espesorNominal as en, ".
      "mc.diametroInteriorNominal as din,mc.medida,mc.normaid,mc.costuraid, ".
      "IF(v.kilos>0,v.kilos,round(v.metros*((mc.diametroExteriorNominal - mc.espesorNominal) ".
      "* mc.espesorNominal * 0.0246),2)) as kilos, ".
      "tc.descripcion as costu,tt.descripcion as tt,u.descripcion as uso,e.descripcion as emba ".
      "FROM versionesxorden v ".
      "LEFT JOIN clientes c ON (c.id = v.clienteid) ".
      "LEFT JOIN medidascotizadas mc ON (mc.id=v.medidaid) ".
      "LEFT JOIN usofinal u ON (u.id = v.uso) ".
      "LEFT JOIN embalajes e ON (e.id = v.tipoEmbalaje) ".
      "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
      "LEFT JOIN estadofabricacion tt ON (tt.id = v.tratamientoTermico) ".
      "LEFT JOIN subprocesosestado se ON (se.tipoProceso=1 and se.ordenProduccion=$id) ".
      "LEFT JOIN preparacionmp pmp ON (pmp.id = se.idplan) ".
      "LEFT JOIN medidas m ON (m.id = pmp.medidaid) ".
      "where v.id=$id ;";
      $res = DB::select($db);

      $resultado = null;
      $semana = null;
      if (count($res)>0){
        $title = $res[0];
        $semana = 0;
        $fechaprometida = "";
        if ($title->fechaPrometida){
          $fechap = explode("-", $title->fechaPrometida);
          $f = Carbon::create($fechap[0], $fechap[1], $fechap[2]);          
          $semana = $f->weekOfYear;
          $fechaprometida = $this->convertdateString($title->fechaPrometida);
        }
        $fechapedido = $this->convertdateString($title->fechaPedido);

        $kgmmp = number_format(($title->dexor-$title->espor)*$title->espor*0.0246,3);
        $kg2= number_format(($title->den-$title->en)*$title->en*0.0246,3);

        $resultado = (object)['orden'=>$title->ordenProduccion."/".$title->version, 'cliente'=>$title->razon, 'diamex'=>$title->den, 'esp'=>$title->en, 'diamein'=>$title->din, 'costura'=>$title->costu, 'term'=>$title->tt, 'kgm'=>$kg2, 'extmp'=>$title->dexor, 'espmp'=>$title->espor, 'kgmmp'=>$kgmmp, 'kgs'=>$title->kilos, 'kilosap'=>($title->kilos*1.1), 'uso'=>$title->uso, 'embalaje'=>$title->emba];

        $sql2 = 'SELECT '.
               "* from  tiemposproduccion ".
               "where ordenProduccion=$title->ordenProduccion  order by fecha asc ;";

        $res2 = DB::select($sql2);

        $fechaPlan = [];
        $arrayLdays = [];
        $hayPlanificacion = false;
        $mensaje = null;
        $datamensaje = [];
        if (count($res2)>0){
          foreach ($res2 as $days) {
            $arrayLdays[] = $this->convertdateString($days->fecha);
            $fechaPlan[$days->tipoProceso][$days->procesoid] = $this->convertdateString($days->fecha);
          }
          $hayPlanificacion = true;

        }


        $mensajeplan = null;

        if ($hayPlanificacion){
          $mensajeplan = json_encode((object)['fechainicio'=>$this->convertdateString($title->fechaInicio), 'paseaplanta'=>$this->convertdateString($title->fechaPlanta), 'fechaplanfinalizacion'=>end($arrayLdays), 'totaldias'=>$this->restaFechas($title->fechaInicio, end($arrayLdays))]);
        }
        else{
          $mensajeplan = json_encode((object)['sinplan'=>'No hay fecha planificada para esta Orden.']);
          
        }


        $mensaje = json_encode(['mensaje'=> "SUBPROCESOS ORDEN ".$title->ordenProduccion." -".$title->version]);

        //dd($id);
        $tblRun = array(''
                    ,'preparacionMPrun'
                    ,'hornoRun'
                    , 'bateaRun'
                    , 'puntaRun'
                    , 'trefilaRun'
                    , 'enderezadoRun'
                    , 'corteRun');

        $sql3 = 'SELECT '.
                "procesoid,tipoProceso,estadoid,idplan from  subprocesosestado ".
                "where ordenProduccion=$id order by orden ;";

        $res3 = DB::select($sql3);
        $listP = [];

        if (count($res3)>0){
          $ix=0;
          foreach ($res3 as $r3) {
            $pr = strtolower($tblRun[$r3->tipoProceso]);
            $sql4 = 'SELECT '.
                    "sb.*,e.descripcion,e.imagen,per.nombreCompleto as ope from ".
                    "$pr sb ".
                    "LEFT JOIN estadossubpro e ON (e.id =".$r3->estadoid.") ".
                    "LEFT JOIN personal per ON (per.id = sb.operario) ".
                    "where sb.id=$r3->procesoid ;";

            $res4 = DB::select($sql4);
            if (count($res4)>0){
              $datfin = $res4[0];
              $subs = substr($pr,0,-3);

              if ($r3->estadoid==4){
                $fechaThisProc = $this->fechaphp($datfin->fechaEjecucion);
              }
              else{
                $existe = array_key_exists($r3->tipoProceso, $fechaPlan);
                if ($existe == true){
                  $fechaThisProc = $fechaPlan[$r3->tipoProceso][$r3->idplan];
                }
                else{
                  $fechaThisProc = $this->convertdateString($hoy);
                }
              }

              $img = $this->imagenes($datfin->imagen);

              $datamensaje[] = (object)['color'=>$img, 'mensaje'=>ucfirst($subs)."->".$datfin->descripcion." (".$fechaThisProc.")"];

              $listP[] = (object)['data'=>$datfin, 'tp'=>$r3->tipoProceso];
            }              
            $ix++;
          }
        }

      }

      if (count($datamensaje)>0){
        $mensajearray = json_encode($datamensaje);
        $dataProcesos = json_encode($listP);
      }
      else{
        $mensajearray = null;
        $dataProcesos = null;
      }

      return view('produccion.subprocesoenejecucion', compact('resultado', 'semana', 'fechaprometida', 'fechapedido', 'mensaje', 'mensajearray', 'id', 'mensajeplan', 'dataProcesos'));
    }

    public function convertdateString($fecha){
      list($dia, $mes, $anio) = explode('-', $fecha);       
            $date = $anio."/".$mes."/".$dia;
      return $date;
    }

    public function fechaphp($fecha){
      list($dia, $mes, $anio) = explode('-', $fecha);       
      $date = $anio."/".$mes."/".$dia;

      $a = explode('/', $date);
      $b = explode(' ', $a[0]);
      $fecha = $b[0]."/".$mes."/".$dia.$b[1];

      return $fecha;
    }

    public function imagenes($string){
      
      $des = explode('.', $string);
      return $des[0];
    }

    public function controlfinal($id)
    {
      $estados = DB::table('estadomateriaprima')->get();
      $personal = DB::table('personal')->get();

      $sql = 'SELECT '.
             "vxo.*,mc.*,vxo.id as vxoid,c.razon,paq.id as paqOr ".
             " from ordenproduccion op ".
             "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
             "LEFT JOIN medidascotizadas mc ON (mc.id = vxo.medidaid) ".
             "LEFT JOIN subprocesosestado se ON (se.tipoProceso = 1 and ".
             "se.ordenProduccion=vxo.id) ".
             "LEFT JOIN preparacionmp pmp ON (pmp.id =  se.idplan) ".
             "LEFT JOIN paquetes paq ON (paq.medidaid =  pmp.medidaid) ".
             "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
             "where vxo.id =$id and (op.estadoid=4 or op.estadoid=5 or op.estadoid=7 ".
             "or op.estadoid=9) ;";

      $db = DB::select($sql);

      $dataCF = DB::table('controlfinal')->where('idVersion', '=', $id)->first();
      $dataCXP = [];
      $accionC = "N";
      if($dataCF){
        $accionC = "M";
        $dataCXP[] = DB::select("SELECT cp.* from controlpaquetes cp
                                        INNER JOIN paquetesxcontrol pxc ON (pxc.controlPaqueteid = cp.id)
                                        where controlid=".$dataCF->id)[0];

      }

      $data = null;
      $res = null;
      if (count($db)>0){
        $res = json_encode($db[0]);

      }

      $objControl = json_encode((object)['ControlFinal'=>$dataCF, 'dataCXP'=>$dataCXP]);

      //dd($objControl);
      return view('produccion.controlfinal', compact('personal', 'estados', 'res', 'accionC', 'objControl'));
    }

    public function controlcalidad($id){


      return view('produccion.controlcalidad');
    }

    public function eliminarproceso(Request $request)
    {
      $idpro = $request->get('idpro');
      $nropr = $request->get('nropr');
      $idcoti = $request->get('idcoti');
      $esop = (int) $request->get('esop');

      if ($esop == 1){
        $tabla =  array(''
        ,'preparacionMPrun'
        ,'hornoRun'
        , 'bateaRun'
        , 'puntaRun'
        , 'trefilaRun'
        , 'enderezadoRun'
        , 'corteRun');

        $db = DB::table('subprocesosestado')->where('ordenProduccion', '=', $idcoti)->where('procesoid', '=', $idpro)->where('tipoProceso', '=', $nropr)->delete();

        $existe = in_array($nropr, $tabla);
        if ($existe)
          $tablesql = strtolower($tabla[$nropr]);
        else
          return "false";

        $db1 = DB::table($tablesql)->where('id', '=', $idpro)->delete();

      }

      $tt = ($esop==1)?'procesosxop':'procesosxcp';

      $db2 = DB::table($tt)->where('idCP', '=', $idcoti)->where('procesoid', '=', $idpro)->where('tipoProceso', '=', $nropr)->delete();
      return "true";
    }

    public function guardarproceso(Request $request)
    {

      // dd($request->get('data'));
      $data = null;
      $tipo = (int) $request->get('tipo');
      $idorden = $request->get('idorden'); 
      $idproceso = $request->get('idproceso'); 
      $esop = (int) $request->get('esop');
      $verproceso = $request->get('op');

      if ($request->get('data'))
        $data = json_decode($request->get('data'));

      $tablePr = ($esop==1)?'procesosxop':'procesosxcp';
      $tblcons = ($esop==1)?'versionesxorden':'cotizaciones';

      // dd($esop);
      

      if ($tipo == 1){
        $proceso = $this->ProcesoPreparacionMP($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 2) {
        $proceso = $this->ProcesoHorno($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 3) {
        $proceso = $this->ProcesoBatea($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 4) {
        $proceso = $this->ProcesoPunta($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 5) {
        $proceso = $this->ProcesoTrefila($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 6) {
        $proceso = $this->ProcesoEnderezado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 7) {
        $proceso = $this->ProcesoCorte($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 8) {
        $proceso = $this->ProcesoCurrent($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 9) {
        $proceso = $this->ProcesoPruebaHidraulica($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 10){
        $proceso = $this->ProcesoEstencilado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 11){
        $proceso = $this->ProcesoEmpaquetado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 12){
        $proceso = [];
        //$proceso = $this->ProcesoControlFinal($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 13){
        $proceso = $this->ProcesoEntrega($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 14){
        $proceso = $this->ProcesoServicio($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else if ($tipo == 15){
        $proceso = $this->ProcesoCertificado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop);
      }
      else{
        return false;
      }

      return response()->json(['procesos'=>$proceso]);
    }

    public function ProcesoPreparacionMP($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
     
      $tableOrd = ($esop==1)?'ordenprocesoop':'ordenprocesocotizacion';
      $tipoId = ($esop==1)?'idOrdenProduccion':'idCotizacion';

      $verdata = null;
      $row = null;
      $kgm2 = 0;
      $kgm1 = 0;
      $reduccion = 0;
      $LARGO_TUBO = 0;
      $tablamedida = [];
      $rw = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "mp.*,m.id as medid,m.medida,m.diametroExterior as dexor, ".
              "m.espesorNominal as espor,m.largoMaximo as largoMax,m.largoMaximo as ".
              "largoMin, IF(m.largoMaximo=m.largoMinimo,m.largoMaximo, ".
              "round(((m.largoMaximo+m.largoMinimo)/2000),2)) as lg ".
              " from preparacionmp mp ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=mp.id) ".
              "LEFT JOIN medidas m  ON (m.id = mp.medidaid) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=1 ".
              "and pxcp.procesoid=$idproceso ;";


        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
        }

        $db1 = 'SELECT '.
               "diametroExteriorNominal as den,espesorNominal as en, ".
               "c.kilogrametro as kilogrametro, diametroInteriorNominal as din, ".
               "mc.medida,mc.normaid,mc.costuraid, tc.descripcion as costu, ".
               "tt.descripcion as tt,c.kilos,c.metros, pc.precioMetro,pc.precioKilo, ".
               "pc.precioPieza ".
               "from $tblcons c ".
               "INNER JOIN medidascotizadas mc ON (mc.id = c.medidaid) ".
               "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
               "LEFT JOIN estadofabricacion tt ON (tt.id = c.tratamientoTermico) ".
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
               "(SELECT MAX(fecha) from preciocotizaciones where ".
               "cotizacionid=".$idorden.")) where c.id=".$idorden.";";

        $res1 = DB::select($db1);
        $dexor = (isset($row->dexor))?$row->dexor:0;
        $espor = (isset($row->espor))?$row->espor:0;
        $largoMax = (isset($row->largoMax))?$row->largoMax:0;
        $largoMin = (isset($row->largoMin))?$row->largoMin:0;
        //dd($dexor);
         if (count($res1)>0){
          $rmed = $res1[0];

          
          $kgm2 = number_format(($dexor-$espor)*$espor*0.0246,3);
          $kgm1 = number_format(($rmed->den-$rmed->en)*$rmed->en*0.0246,3);

          if ($dexor>0)
            $reduccion = number_format((1-($kgm1/$kgm2))*100,2);
  

          $LARGO_TUBO = number_format((($largoMax+$largoMin)/2000),2);

          $kilogrametro = $rmed->kilogrametro;
          if (empty($rmed->kilogrametro) or $rmed->kilogrametro==0.00){
            
            $kilogrametro = $this->kilogrametro($rmed->den,$rmed->en);
            // dd($kilogrametro);
          }
          
          $KGM = round($kilogrametro,3);
          // dd('no');
          $LARGO_OBTENER = number_format((($kgm2/$KGM)*($LARGO_TUBO-0.2)),2);

        }
        $den = 0;
        $en = 0;
        $din = 0;
        $tipore = 0;
        if ($rmed){
          $den = $rmed->den;
          $en = $rmed->en;
          $din = $rmed->din;
          $tipore = 0;

          $sqlproceso = 'SELECT '.
                        "procesoid as idp,tipoProceso as tp from $tablePr ".
                        "where idCP=$idorden and tipoProceso IN (2,3,5) ;";

          $procesores = DB::select($sqlproceso);

          $bateas = "";
          $trefila = "";
          $horno = "";

          if (count($procesores)>0){
            $sqlproceso2 = 'SELECT '.
                           "orden from $tableOrd where $tipoId=$idorden ;";

            $procesosres2 = DB::select($sqlproceso2);

            if (count($procesosres2)>0){
              $rw = $procesosres2[0];

              $arrayorden = explode(",",$rw->orden);
              foreach ($arrayorden as $sinast){
                  $dit = explode("*",$sinast);
                  $arrayproc[] = $dit[0];

              }
              $procscant = array_count_values($arrayproc);
              $ar = (array) $procscant;
              if (isset($ar['3']))
                $bateas = $ar['3'];

              if (isset($ar['2']))
                $horno = $ar['2'];

              if (isset($ar['5']))
                $trefila = $ar['5'];


            }
          }       

          $precio = (isset($row->precio))?$row->precio:0;
          $lg = (isset($row->lg))?$row->lg:0;

          $kgmmp = number_format(($dexor-$espor)*$espor*0.0246,3);
          $kg2 = number_format(($rmed->den-$rmed->en)*$rmed->en*0.0246,3);
          $kilos = (empty($rmed->kilos))?number_format(($kg2*$rmed->metros), 2):$rmed->kilos;
          $metros = (empty($rmed->metros))?number_format(($rmed->kilos/$kg2), 2):$rmed->metros;
          $tablamedida[] = (object) ['den'=>$rmed->den, 'en'=>$en, 'din'=>$din, 'costu'=>$rmed->costu, 'tt'=>$rmed->tt, 'kg2'=>$kg2, 'metros'=>$metros, 'preciomp'=>$precio, 'dexor'=>$dexor, 'espor'=>$espor, 'lg'=>$lg, 'kgmmp'=>$kgmmp, 'bateas'=>$bateas, 'trefila'=>$trefila, 'horno'=>$horno, 'kilos'=>$kilos];
        }

        $tabla = json_encode($tablamedida);

        $medida = (isset($row->medida))?$row->medida:"";
        $medid = (isset($row->medid))?$row->medid:0;
        $precio = (isset($row->precio))?$row->precio:0;

        $verdata = (object)['medida'=>$medida, 'largofinal'=>$LARGO_OBTENER, 'medidaid'=>$medid, 'reduccion'=>$reduccion, 'precio'=>$precio, 'den'=>$den, 'en'=>$en, 'din'=>$din, 'tiporeventa'=>$tipore, 'tabla'=>$tabla];

        return $verdata;
      }
      else{ /// Se Inserta o Actualiza
        // dd($data);
        $medidaid = $data->medidaid;
        $largofin = $data->largofin;
        $reduccion = $data->reduccion;
        $precio = $data->precio;
        $observaciones = $data->observaciones;
        $accion = $data->accion;

        if ((int) $idproceso == 0){ // Se Inserta
          $db = DB::table('preparacionmp')->insertGetId([
            'medidaid'=>$medidaid,
            'precio'=>$precio,
            'observaciones'=>$observaciones,
          ]);

          $procid = $db;

          if ($data->accion == "N"){
            $db1 = DB::table($tablePr)->insert([
              'idCP'=>$idorden,
              'tipoProceso'=> 1,
              'procesoid'=>$procid
            ]);

          }
          else{
            $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 1)->update([
                'procesoid'=>$procid
            ]);

            if ($db1 == 0){
              $db2 = DB::table($tablePr)->insert([
                'idCP'=>$idorden,
                'procesoid'=>$procid,
                'tipoProceso'=>1
              ]);
            }
            
            if ($esop == 1){
              $this->insertSubpro(1,$procid,$idorden);
            }
          }

        }
        else{ // Se Actualiza
          $procid = $idproceso;
          $db = DB::table('preparacionmp')->where('id', '=', $idproceso)->update([
            'medidaid'=>$medidaid,
            'precio'=>$precio,
            'observaciones'=>$observaciones,
          ]);
        }

        return $procid;
      }
    }

    public function ProcesoServicio($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "s.* from servicio s ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=s.id) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=14 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
        }

        $verdata = (object)['row'=>$row];

        return $verdata;
      }
      else{
        //insertar
        if ($idproceso == 0){
          $db = DB::table('servicio')->insertGetId([
            'tipoCentroid'=>$data->tiporubro,
            'lugarEntrega'=>$data->lugar,
            'proveedor'=>$data->proveedor,
            'precio'=>$data->precio,
            'observaciones'=>$data->obs,
          ]);

          $procid = $db;

          if ($data->accion == "N"){
            $db1 = DB::table($tablePr)->insert([
              'idCP'=>$idorden,
              'tipoProceso'=> 14,
              'procesoid'=>$procid
            ]);

          }
          else{
            $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 14)->update([
                'procesoid'=>$procid
            ]);
          }
        }
        else{
          $procid = $idproceso;

          $db = DB::table('servicio')->where('id', '=', $idproceso)->update([
            'tipoCentroid'=>$data->tiporubro,
            'lugarEntrega'=>$data->lugar,
            'proveedor'=>$data->proveedor,
            'precio'=>$data->precio,
            'observaciones'=>$data->obs,
          ]);
        }

        return $procid;
      }
    }

    public function ProcesoEntrega($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "e.* from entrega e ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=13 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
        }
        else{
          $db = 'SELECT '.
                "d.direccion,tc.transporteid,t.razon from $tblcons co ".
                "LEFT JOIN clientes c   ON (co.clienteid=c.id) ".
                "LEFT JOIN direccionesclientes d ON (d.clienteid = c.id) ".
                "LEFT JOIN transportesclientes tc ON (tc.clienteid = c.id) ".
                "LEFT JOIN transportes t ON (t.id = tc.transporteid) ".
                "where co.id=$idorden ;";

          $res = DB::select($db);
          if (count($res)>0){
            $row = $res[0];
          }
        }

        $verdata = (object)['row'=>$row];

        return $verdata;
      }
      else{
        //insertar
        if ($idproceso == 0){
          $db = DB::table('entrega')->insertGetId([
            'tipoEntregaid'=>$data->tipo,
            'direccion'=>$data->direccion,
            'costoxKilo'=>$data->costo,
            'transporteid'=>$data->transporteid,
            'observaciones'=>$data->obs
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion = "N"){
              $db1 = DB::table($tablePr)->insert([
                'procesoid'=>$procid,
                'tipoProceso'=>13,
                'idCP'=>$idorden
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 13)->update([
                'procesoid'=>$procid
              ]);
            }

          }
        }
        else{
          $procid = $idproceso;

          $db = DB::table('entrega')->where('id', '=', $idproceso)->update([
            'tipoEntregaid'=>$data->tipo,
            'direccion'=>$data->direccion,
            'costoxKilo'=>$data->costo,
            'transporteid'=>$data->transporteid,
            'observaciones'=>$data->obs
          ]);
        }

        return $procid;
      }
    }

    public function ProcesoEmpaquetado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;
      $tubosxpaquete = "";
      $kilosxpaquete = "";

      if ($verproceso == 1){
        $db = 'SELECT '.
              "e.*,es.numeroColada from empaquetado e ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
              "LEFT JOIN $tablePr pxcp2  ON (pxcp2.idCP=".$idorden." and ".
              "pxcp2.tipoProceso=10) ".
              "LEFT JOIN estencilado es ON (es.id = pxcp2.procesoid) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=11 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);
        if (count($res)>0){
          $row = $res[0];
        }
        else{

          $db = 'SELECT '.
                "c.piezas as tubosxPaquete,es.numeroColada,c.kilos as kilosxPaquete, ".
                "c.tipoEmbalaje as tipoEmpaquetadoid from $tblcons c ".
                "LEFT JOIN $tablePr pxcp  ON (pxcp.idCP=c.id) ".
                "LEFT JOIN estencilado es ON (es.id = pxcp.procesoid) ".
                "where c.id=$idorden and pxcp.idCP=$idorden and pxcp.tipoProceso=11 ;";

          $res = DB::select($db);
          if (count($res)>0){
            $row = $res[0];
          }
        }

        $verdata = (object)['row'=>$row, 'tubosxpaquete'=>$tubosxpaquete, 'kilosxpaquete'=>$kilosxpaquete];

        return $verdata;
      }
      else{
        if ($idproceso == 0){
          $db = DB::table('empaquetado')->insertGetId([
            'tipoEmpaquetadoid'=>$data->tipoempaquetado,
            'tubosxPaquete'=>$data->tubosxpaquetesem,
            'kilosxPaquete'=>$data->kgporpaquetesem,
            'observaciones'=>$data->obs
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion = "N"){
              $db1 = DB::table($tablePr)->insert([
                'procesoid'=>$procid,
                'tipoProceso'=>11,
                'idCP'=>$idorden
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 11)->update([
                'procesoid'=>$procid
              ]);
            }
          }
        }
        else{
          $procid = $idproceso;
          $db = DB::table('empaquetado')->where('id', '=', $idproceso)->update([
            'tipoEmpaquetadoid'=>$data->tipoempaquetado,
            'tubosxPaquete'=>$data->tubosxpaquetesem,
            'kilosxPaquete'=>$data->kgporpaquetesem,
            'observaciones'=>$data->obs
          ]);
        }
        return $procid;
      }
    }

    public function ProcesoPruebaHidraulica($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "ph.* from pruebahidraulica ph ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=ph.id) ".
              "where  pxcp.idCP=$idorden and pxcp.tipoProceso=9 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
        }

        $verdata = (object)['row'=>$row];

        return $verdata;
      }
      else{
        if ($idproceso == 0){
          $db = DB::table('pruebahidraulica')->insertGetId([
            'presion'=>$data->presionprueba,
            'tiempo'=>$data->tiempo,
            'precio'=>$data->precio,
            'observaciones'=>$data->obs,
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'idCP'=>$idorden,
                'tipoProceso'=> 9,
                'procesoid'=>$procid
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 9)->update([
                'procesoid'=>$procid
              ]);
            }

          }
        }
        else{
          $procid = $idproceso;
          $db = DB::table('pruebahidraulica')->where('id', '=', $idproceso)->update([
            'presion'=>$data->presionprueba,
            'tiempo'=>$data->tiempo,
            'precio'=>$data->precio,
            'observaciones'=>$data->obs,
          ]);

        }

        return $procid;
      }
    }

    public function ProcesoCurrent($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "e.* from eddycurrent e ".
              " LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=8 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
        }

        $verdata = (object)['row'=>$row];

        return $verdata;
      }
      else{
        if ((int) $idproceso == 0){ // Se Inserta
          $db = DB::table('eddycurrent')->insertGetId([
            'observaciones'=>$data->obs,
            //'precio'=>$data->precio
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'idCP'=>$idorden,
                'tipoProceso'=> 8,
                'procesoid'=>$procid
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 8)->update([
                  'procesoid'=>$procid
              ]);
            }
          }
        }
        else{
          $procid = $idproceso;

          $db = DB::table('eddycurrent')->where('id', '=', $idproceso)->update([
            'observaciones'=>$data->obs,
            //'precio'=>$data->precio
          ]);
        }
        return $procid;
      }
    }

    public function ProcesoCorte($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "c.* from corte c ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=c.id) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=7 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);

        if (count($res)>0)
          $row = $res[0];

        $verdata = (object)['row'=>$row];

        return $verdata;
      }
      else{

        if ((int) $idproceso == 0){ // Se Inserta
          $db = DB::table('corte')->insertGetId([
            'cortePunta'=>$data->cortepunta,
            'tipoCorteid'=>$data->tipocorte,
            'elemento'=>$data->elementocorte,
            'resto'=>$data->resto,
            'observaciones'=>$data->obs,
            'cortes'=>$data->cantidad
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'idCP'=>$idorden,
                'tipoProceso'=> 7,
                'procesoid'=>$procid
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 7)->update([
                  'procesoid'=>$procid
              ]);

              if ($db1 == 0){
                $procid = $idproceso;

                $db2 = DB::table($tablePr)->insert([
                  'idCP'=>$idorden,
                  'tipoProceso'=> 7,
                  'procesoid'=>$procid
                ]);
              }

              if ($esop == 1)
                $this->insertSubpro(7,$procid,$idorden);
            }
            
          }
        }
        else{
          $procid = $idproceso;

          $db = DB::table('corte')->where('id', '=', $idproceso)->update([
            'cortePunta'=>$data->cortepunta,
            'tipoCorteid'=>$data->tipocorte,
            'elemento'=>$data->elementocorte,
            'resto'=>$data->resto,
            'observaciones'=>$data->obs,
            'cortes'=>$data->cantidad
          ]);
        }
        return $procid;
      }
    }

    public function ProcesoEnderezado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;
      $tipo = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "e.* from enderezadora e ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
              "where  pxcp.idCP=$idorden and pxcp.tipoProceso=6 ".
              "and pxcp.procesoid=$idproceso ;";
              
        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
          $tipo = $row->tipo;
        }
        else{
          $db = 'SELECT '.
                "diametroExteriorNominal as den,espesorNominal as en,largoMaxEntrega ".
                "from medidascotizadas mc,$tblcons c ".
                "where c.id=".$idorden." and c.medidaid=mc.id ;";

          $res = DB::select($db);

          if (count($res)>0){
            $rmed = $res[0];

            $db2 = 'SELECT '.
                   "m.diametroExterior,m.espesorNominal ".
                   "from preparacionmp mp ".
                   "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=mp.id) ".
                   "LEFT JOIN medidas m  ON (m.id = mp.medidaid) ".
                   "where pxcp.idCP=$idorden and pxcp.tipoProceso=1 ;";

            $res2 = DB::select($db2);

            if (count($res2)>0){
              $rmp = $res2[0];
              $kgm = $this->kilogrametro($rmed->den,$rmed->en);
              $kgm2 = $this->kilogrametro($rmp->diametroExterior,$rmp->espesorNominal);  

              $dex = $rmp->diametroExterior;

              switch ($dex){
                  case ($dex<= 19):{
                    $tipo = 1;
                    break;
                  }
                  case ($dex> 19 and $dex <=27):{
                    $tipo = 2;
                    break;       
                  }
                  case ($dex> 27 and $dex <=50):{
                    $tipo = 3;
                    break;        
                  }
                  case ($dex>50 ):{
                    $tipo = 4;
                    break;        
                  }
                  case ($dex==9.52 or $dex==12.7):{
                    $tipo = 5;
                    break;          
                  }
                  default: ($tipo=$row->tipo);
                  break;
              }          
            }

          }
        }

        $verdata = (object)['row'=>$row, 'tipo'=>$tipo];
        return $verdata;
      }
      else{
        if ($idproceso == 0){
          $db = DB::table('enderezadora')->insertGetId([
            'tipo'=>$data->tipoenderezado,
            'observaciones'=>$data->obs
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db2 = DB::table($tablePr)->insertGetId([
                'idCP'=>$idorden,
                'tipoProceso'=>6,
                'procesoid'=>$procid
              ]);
            }
            else{
              $db = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 6)->update([
                'procesoid'=>$procid
              ]);

              if ($db == 0){
                $db2 = DB::table($tablePr)->insertGetId([
                  'idCP'=>$idorden,
                  'tipoProceso'=>6,
                  'procesoid'=>$procid
                ]);
              }
            }
            if ($esop == 1)
              $this->insertSubpro(6,$procid,$idorden);
          }

        }
        else{
          $procid = $idproceso;

          $db = DB::table('enderezadora')->where('id', '=', $idproceso)->update([
            'tipo'=>$data->tipoenderezado,
            'observaciones'=>$data->obs
          ]);
          $procid = $idproceso;
        }

        return $procid;
      }

    }

    public function ProcesoPunta($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;

      if ($verproceso == 1){ 
        $pasada = [];

        $db = 'SELECT '.
              "p.* ".
              "from punta p ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=p.id) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=4 ".
              "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);

        if (count($res)>0){
          $row = $res[0];
          $db1 = 'SELECT '.
                 "pxp.*,IF (pxp.tipoPunta=1,mm.tipoMaterialid,mb.tipoMaterialid) as material ".
                 "from pasadasxpunta pxp ".
                 "LEFT JOIN matrizmitchell mm ON (mm.id = pxp.matriz) ".
                 "LEFT JOIN matrizbronson mb ON (mb.id = pxp.matriz) ".
                 "WHERE puntaid=$idproceso ORDER BY pxp.pasada asc ;";

          $res1 = DB::select($db1);

          if (count($res1)>0){
            foreach ($res1 as $row2) {
              $pasada[]=$row2;
            }
          }
        }

        $tipopunta = DB::table('tipopunta')->get();
        $tipomaterial = DB::table('tipomaterialpm')->get();

        $verdata = (object)['row'=>$row, 'pasada'=>$pasada, 'tipopunta'=>$tipopunta, 'tipomaterial'=>$tipomaterial];

        return $verdata;
      }
      else{
        $pasadas = 0;
        $arrayPasxp = [];
        for ($ct=1;$ct<4;$ct++){
          $a = 'largopunta'.$ct;
          $b = 'tipopunta'.$ct;
          $c = 'tipopm'.$ct;
          if (!empty($data->$a)){
            $pasadas++;
            $arrayPasxp[$ct] = (object)['largo'=>$data->$a, 'tipopunta'=>$data->$b, 'tipopm'=>$data->$c, 'numero'=>$ct];
                        
          }          
        }


        if ((int) $idproceso == 0){ // Se Inserta

          $db = DB::table('punta')->insertGetId([
            'pasadas'=>$pasadas
          ]);

          $procid = $db;

          foreach ($arrayPasxp as $otroArray){
            $db1 = DB::table('pasadasxpunta')->insertGetId([
              'puntaid'=>$db,
              'largo'=>$otroArray->largo,
              'tipoPunta'=>$otroArray->tipopunta,
              'matriz'=>$otroArray->tipopm,
              'pasada'=>$otroArray->numero
            ]);

          }
            if ($data->accion == "N"){
              $db2 = DB::table($tablePr)->insertGetId([
                'idCP'=>$idorden,
                'tipoProceso'=>4,
                'procesoid'=>$procid
              ]);

              $ejeproce = $db2;
            }
            else{
              $db2 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 4)->update([
                'procesoid'=>$procid
              ]);

              if ($db2 == 0){
                $db3 = DB::table($tablePr)->insert([
                  'idCP'=>$idorden,
                  'tipoProceso'=>4,
                  'procesoid'=>$procid
                ]);
              }
            }

            if ($esop == 1){
              $this->insertSubpro(4,$procid,$idorden);
            }

        }
        else{//se actualizas
          $deletedb = DB::table('pasadasxpunta')->where('puntaid', '=', $idproceso)->delete();

          $procid = $idproceso;
          if (is_array($arrayPasxp)){
            foreach ($arrayPasxp as $otroArray){
              $db1 = DB::table('pasadasxpunta')->insertGetId([
                'puntaid'=>$idproceso,
                'largo'=>$otroArray->largo,
                'tipoPunta'=>$otroArray->tipopunta,
                'matriz'=>$otroArray->tipopm,
                'pasada'=>$otroArray->numero
              ]);
            }

            $dbp = DB::table('punta')->where('id', '=', $idproceso)->update([
              'pasadas'=>$pasadas
            ]);

          }
        }

        return $procid;
      }

    }

    public function ProcesoTrefila($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;
      $bron = 0;
      $mitch = 0;
      $limon = 0;
      $trilo = 0;
      $matpun = 0;
      $idpun = 0;
      $row2 = null;
      $kgmcalc = 0;

      if ($verproceso == 1){
        $db1 = 'SELECT '.
               "f.*,p.tipoPunzonid as idpun,p.tipoMaterialid as matpun,mtl.tipoMatriz as matTL, ".
               "p2.tipoMaterialid as matpun2 ".
               " from trefila f ".
               "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=f.id) ".
               "LEFT JOIN punzones p ON (p.id = f.punzonid) ".
               "LEFT JOIN punzones p2 ON (p2.id = f.punzonDoble) ".
               "LEFT JOIN matriztl mtl ON (mtl.id = f.matrizTL) ".
               "where pxcp.idCP=$idorden and pxcp.tipoProceso=5 ".
               "and pxcp.procesoid=$idproceso ;";

        $res1 = DB::select($db1);

        if (count($res1)>0){
          $row = $res1[0];
        }

        $sele1 = 'SELECT '.
                 "id,descripcion FROM tipomatriz where id NOT IN (6,7) ;";
        $seletipomatriz = DB::select($sele1);

        $sele2 = 'SELECT '.
                 "id,CONCAT(caja,  ' N1: ',nucleo1, ' N2: ',nucleo2) as descripcion FROM matrizdoble ;";

        $selematrizdoble = DB::select($sele2);

        $db = 'SELECT '.
              "m.diametroExteriorNominal as dem,m.diametroInteriorNominal as dim, ".
              "m.espesorNominal as en, me.diametroExterior as de,me.espesorNominal as espemed, ".
              "me.id AS IDMED ".
              "FROM $tblcons c ".
              "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
              "LEFT JOIN $tablePr pxmp ON (pxmp.tipoProceso = 1 and pxmp.idCP=c.id) ".
              "LEFT JOIN preparacionmp mp ON (mp.id = pxmp.procesoid) ".
              "LEFT JOIN medidas me ON (me.id = mp.medidaid) where c.id=$idorden ;";

        $res = DB::select($db);


        if (count($res)>0){
          $row2 = $res[0];

          $kgMP = $this->kilogrametro($row2->de, $row2->espemed);
          $kgAux = $kgMP;

          $db1 = 'SELECT '.
                 "* from ordenprocesoop where idOrdenProduccion=$idorden ;";

          $res1 = DB::select($db1);
          if (count($res1)>0){
            $rw = $res1[0];
            $array_proc = explode(",",$rw->orden);
            foreach ($array_proc as $valt){
              $parser = explode("*",$valt);
              $val = $parser[0];
              $idprocparticular = $parser[1];
              if ($val==5){
                $db2 = 'SELECT '.
                       "reduccion as red from trefila where id=$idprocparticular ;";
                $res2 = DB::select($db2);
                if (count($res2)>0){
                  $trefs = $res2[0];
                  if ($trefs){
                    $trer = $trefs;
                    if ($idprocparticular==$idproceso){
                        break;
                    }
                    $kgAux =number_format($kgAux - (($trer->red*$kgAux)/100),3);
                  }
                }
              }
            }
          }

          $valesp = (($row2->dem-$row2->dim)/2);
          $kgmcalc = $this->kilogrametro($row2->dem,$valesp);

          if (isset($row->matrizBronson))
            $bron = $row->matrizBronson;

          if (isset($row->matrizMitchell))
            $mitch = $row->matrizMitchell;

          if (isset($row->matTL) && $row->matTL==3)
            $trilo = $row->matrizTL;

          if (isset($row->matpun))
            $matpun = $row->matpun;

          if (isset($row->matTL) && $row->matTL==4)
            $limon = $row->matrizTL;

          //dd($row->idpun);          
          //$tipoPunzon = (isset($row->idpun))?$row->idpun:5;
          $tipoPunzon = (!empty($row->idpun))?$row->idpun:5;

          if (isset($row->punzonDoble)){
                 $idpun = 4;
                 $tipoPunzon = 4;
          }
        }

        $db = 'SELECT '.
              "id,descripcion FROM tipomatriz where id NOT IN (6,7) ;";

        $res = DB::select($db);

        $db1 = 'SELECT '.
              "id,descripcion FROM tipomaterialpm ;";

        $res1 = DB::select($db1);

        $db2 = 'SELECT '.
              "id,CONCAT(caja,'  N1:',nucleo1,' N2:',nucleo2) as descripcion FROM matrizdoble ;";

        $res2 = DB::select($db2);

        $db3 = 'SELECT '.
              "id,CONCAT(numero,' DN:',diametroNominal,' ANG:',ang,' E: ',entrada,' ZONA:' ,altZonaUtil,' Dm:',diametroMatriz,' ALTO:',altoMatriz) as descripcion FROM matrizsimacero ;";

        $res3 = DB::select($db3);

        $db4 = 'SELECT '.
              "id,CONCAT(diametro,'  ANG',ang,'  DE',de,'  DN',dn,'  HN',hn,'  DC',dc,'  HC',hc) as descripcion FROM matrizsimwidia ;";

        $res4 = DB::select($db4);

        $db5 = 'SELECT '.
              "tml.id,tml.diametroExterior as descripcion ,p.espesor FROM matriztl tml ".
              "LEFT JOIN punzones p ON (p.id = tml.punzonid) where tml.tipoMatriz=3; ";

        $res5 = DB::select($db5);

        $db6 = 'SELECT '.
              "tml.id,tml.diametroExterior as descripcion ,p.espesor FROM matriztl tml ".
              "LEFT JOIN punzones p ON (p.id = tml.punzonid) where tml.tipoMatriz=4; ";

        $res6 = DB::select($db6);

        $db7 = 'SELECT '.
               "id,CONCAT('N ',numero,'  dE ',diametroEntrada,'  Rod:',medidaRodillo) as descripcion FROM cabezaturco ;";

        $res7 = DB::select($db7);

        $db8 = 'SELECT '.
               "id,descripcion FROM tipopunzon ;";

        $res8 = DB::select($db8);



        $tablas = (object)['tipomatriz'=>$res, 'material'=>$res1, 'matrizdoble'=>$res2, 'matrizsimacero'=>$res3, 'matrizsimwidia'=>$res4, 'matriztltipo3'=>$res5, 'matriztltipo4'=>$res6, 'cabezaturco'=>$res7, 'tipopunzon'=>$res8];

        $verdata = (object)['row'=>$row, 'row2'=>$row2, 'kgAux'=>$kgAux, 'kgmcalc'=>$kgmcalc, 'brom'=>$bron, 'mitch'=>$mitch, 'limon'=>$limon, 'trilo'=>$trilo, 'tablas'=>$tablas, 'tipoPunzon'=>$tipoPunzon, 'valesp'=>$valesp];

        return $verdata;
      }
      else{
        $key=0;
        $doble = null;
        if (isset($data->punzonDoble))
          $doble = $data->punzonDoble;

        $limontribo = $data->matriztl2; 
        if ($data->matriztl>0)
          $limontribo = $data->matriztl;
        if ((int) $idproceso == 0){ // Se Inserta
          $db = DB::table('trefila')->insertGetId([
            'numero'=>$data->nrotrefila,
            'tipo'=>$data->tipomaterialpm,
            'tipoMatrizid'=>$data->tipoMatrizid,
            'punzonid'=>$data->punzonid,
            'punzonDoble'=> $doble,
            'matrizDoble'=> $data->matrizDoble,
            'cabezaTurco'=> $data->cabezaTurco,
            'matrizSimAcero'=> $data->matrizSimAcero,
            'matrizSimWidia'=> $data->matrizSimWidia,
            'matrizTL'=>$limontribo,
            'espesor'=>$data->espesortrefila,
            'reduccion'=>$data->reducciontrefila,
            'flecha'=>$data->flechatre,
            'observaciones'=>$data->observaciontre
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'idCP'=>$idorden,
                'tipoProceso'=> 5,
                'procesoid'=>$procid
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 5)->update([
                'procesoid'=>$procid
              ]);

              if ($db1 == 0){
                $db1 = DB::table($tablePr)->insert([
                  'idCP'=>$idorden,
                  'tipoProceso'=> 5,
                  'procesoid'=>$procid
                ]);
              }
            }

            if ($esop == 1){
              $this->insertSubpro(5,$procid,$idorden);
            }
          }
          else{
            //
          }
        }
        else{ // Se Actualiza
          $doble = null;
          if (isset($data->punzonDoble))
            $doble = $data->punzonDoble;

          $limontribo = $data->matriztl2; 
          if ($data->matriztl>0)
            $limontribo = $data->matriztl;
          
          $procid = $idproceso;
          $db = DB::table('trefila')->where('id', '=', $idproceso)->update([
            'numero'=>$data->nrotrefila,
            'tipo'=>$data->tipomaterialpm,
            'tipoMatrizid'=>$data->tipoMatrizid,
            'punzonid'=>$data->punzonid,
            'punzonDoble'=> $doble,
            'matrizDoble'=> $data->matrizDoble,
            'cabezaTurco'=> $data->cabezaTurco,
            'matrizSimAcero'=> $data->matrizSimAcero,
            'matrizSimWidia'=> $data->matrizSimWidia,
            'matrizTL'=>$limontribo,
            'espesor'=>$data->espesortrefila,
            'reduccion'=>$data->reducciontrefila,
            'flecha'=>$data->flechatre,
            'observaciones'=>$data->observaciontre
          ]);
        }
        return $procid;
      }
    }

    public function ProcesoHorno($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
        $verdata = null;
        $row = null;
        $kgMP = null;

        if ($verproceso == 1){
          $db = 'SELECT '.
                "h.* from horno h ".
                "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=h.id) ".
                "where pxcp.idCP=$idorden and pxcp.tipoProceso=2 ".
                "and pxcp.procesoid=$idproceso ;";

          $res = DB::select($db);

          if (count($res)>0){
            $row = $res[0];
          }
          else{
            $db = 'SELECT '.
                  "durezaMaxima,durezaMinima from cotizaciones ".
                  "where id=$idorden ;";

            $res = DB::select($db);
            if (count($res)>0){
              $row = $res[0];
            }
          }

          $db1 = 'SELECT '.
                 "me.diametroExterior as de,me.espesorNominal as espemed ".
                 "FROM $tblcons c ".
                 "LEFT JOIN $tablePr pxmp ON (pxmp.tipoProceso = 1 and pxmp.idCP=c.id) ".
                 "LEFT JOIN preparacionmp mp ON (mp.id = pxmp.procesoid) ".
                 "LEFT JOIN medidas me ON (me.id = mp.medidaid) where c.id=$idorden ;";

          $res1 = DB::select($db1);

          if (count($res1)>0){
            $row2 = $res1[0];
            $kgMP = $this->kilogrametro($row2->de, $row2->espemed);
          }

          $verdata = (object)['row'=>$row, 'kgMP'=>$kgMP];
          return $verdata;
        }
        else{
          if ($idproceso == 0){
            $db = DB::table('horno')->insertGetId([
              'tipoHornoid'=>$data->tipohorno,
              'carga'=>$data->cargahorno,
              'durezaMaxima'=>$data->durezamaxhorno,
              'durezaMinima'=>$data->durezaminhorno,
              'velocidad'=>$data->velocidadhorno,
              'temperatura'=>$data->temperatura,
              'tubosxCamilla'=>$data->tubosxcamilla,
              'observaciones'=>$data->obshorno
            ]);


            if ($db == true){
              $procid = $db;

              if ($data->accion == "N"){
                $db1 = DB::table($tablePr)->insert([
                  'procesoid'=>$procid,
                  'idCP'=>$idorden,
                  'tipoProceso'=>2
                ]);
              }
              else{
                $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 2)->update([
                  'procesoid'=>$procid
                ]);

                if ($db1 == 0){
                  $db2 = DB::table($tablePr)->insert([
                    'procesoid'=>$procid,
                    'idCP'=>$idorden,
                    'tipoProceso'=>2
                  ]);
                }
              }

              if ($esop == 1)
                $this->insertSubpro(2,$procid,$idorden);
            }
          }
          else{
            $procid = $idproceso;

            $db = DB::table('horno')->where('id', '=', $idproceso)->update([
              'tipoHornoid'=>$data->tipohorno,
              'carga'=>$data->cargahorno,
              'durezaMaxima'=>$data->durezamaxhorno,
              'durezaMinima'=>$data->durezaminhorno,
              'velocidad'=>$data->velocidadhorno,
              'temperatura'=>$data->temperatura,
              'tubosxCamilla'=>$data->tubosxcamilla,
              'observaciones'=>$data->obshorno
            ]);
          }

          return $procid;
        }
    }

    public function ProcesoBatea($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $row = null;
      if ($verproceso == 1){
        $db = 'SELECT '.
              "b.* from batea b ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=b.id) ".
              "where pxcp.idCP=$idorden and pxcp.tipoProceso=3 and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db);
        if (count($res)>0){
          $row = $res[0];
        }
        
        $verdata = (object)['row'=>$row];
        return $verdata;
      } 
      else{
        if ($idproceso == 0){
          $db = DB::table('batea')->insertGetId([
            'tipoBateaid'=>$data->tipobatea,
            'observaciones'=>$data->obs
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'procesoid'=>$procid,
                'idCP'=>$idorden,
                'tipoProceso'=>3
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 3)->update([
                'procesoid'=>$procid
              ]);

              if ($db1 == 0){
                $db2 = DB::table($tablePr)->insert([
                  'procesoid'=>$procid,
                  'idCP'=>$idorden,
                  'tipoProceso'=>3
                ]);
              }
            }
            if ($esop == 1)
              $this->insertSubpro(3,$procid,$idorden);
          }
        }
        else{
          $procid = $idproceso;
          $db = DB::table('batea')->where('id', '=', $idproceso)->update([
            'tipoBateaid'=>$data->tipobatea,
            'observaciones'=>$data->obs
          ]);
        }
        return $procid;
      }
    }

    public function ProcesoCertificado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop){
      if ($verproceso == 1){
        $verdata = null;
        $row = null;

        $db1 = 'SELECT '.
               "c.* from procesocertificado c ".
               "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=c.id) ".
               "where pxcp.idCP=$idorden and pxcp.tipoProceso=15 ".
               "and pxcp.procesoid=$idproceso ;";

        $res = DB::select($db1);

        if (count($res)>0){
          $row = $res[0];
        }
        else{
          $db2 = 'SELECT '.
                 "c.certificadoid from $tblcons c ".
                 "where c.id=$idorden ;";

          $res2 = DB::select($db2);

          if (count($res2)>0){
            $row = $res2[0];
          }
        }

        $verdata = (object)['row'=>$row];
        return $verdata;
      }
      else{
        if ($idproceso == 0){
          $db = DB::table('procesocertificado')->insertGetId([
            'certificadoid'=>$data->tipo,
            'observaciones'=>$data->obs
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'procesoid'=>$procid,
                'idCP'=>$idorden,
                'tipoProceso'=>15
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 15)->update([
                'procesoid'=>$procid
              ]);
            }
          }
        }
        else{
          $procid = $idproceso;

          $db = DB::table('procesocertificado')->where('id', '=', $idproceso)->update([
            'certificadoid'=>$data->tipo,
            'observaciones'=>$data->obs
          ]);
        }
        return $procid;
      }
      
    }

    public function ProcesoEstencilado($tablePr, $tblcons, $idorden, $idproceso, $verproceso, $data, $esop)
    {
      $verdata = null;
      $estenceid = null;
      $row = null;

      if ($verproceso == 1){
        $db = 'SELECT '.
              "e.* from estencilado e ".
              "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
              "where  pxcp.idCP=$idorden and pxcp.tipoProceso=10 ".
              "and pxcp.procesoid=$idproceso ;";
        $res = DB::select($db);

        if (count($res)>0){ // SE CARGO ESTENCILADO COMO PROCESO
          $estenceid = $res[0]->id;
          $row = $res[0];
        }
        else{ // SINO MUESTRO EL ESTENCILADO DE LA COTIZACION
          $db = 'SELECT '.
                "e.* from estencilado e ".
                "INNER JOIN $tblcons c  ON (c.estenciladoid=e.id) ".
                "where c.id=$idorden ;";

          $res = DB::select($db);
          if (count($res)>0){
            $row = $res[0];
          }
          else{
            if ($esop == 1){
              $db2 = 'SELECT '.
                     "e.* from versionesxOrden v ".
                     "INNER JOIN ordenproduccion o ON (o.id = v.ordenProduccion) ".
                     "INNER cotizaciones c ON (c.id = o.cotizacionid) ".
                     "LEFT JOIN procesosxcp pxcp  ON (pxcp.idCP=c.id and pxcp.tipoProceso=10) ".
                     "INNER JOIN estencilado e ON (e.id = pxcp.procesoid) ".
                     "where v.id=$idorden ;";

              $res2 = DB::select($db2);
              if (count($res2)>0){ // SE CARGO ESTENCILADO COMO PROCESO de cotizacion
                $estenceid = $res2[0]->id;
              }
            }
          }
        }

        $verdata = (object)['estenceid'=>$estenceid, 'row'=>$row];
        return $verdata;
      }
      else {
        if ($idproceso == 0){
          $db = DB::table('estencilado')->insertGetId([
            'largoMinimo'=> $data->largomin,
            'largoMaximo'=> $data->largomax,
            'normaid'=> $data->normaid,
            'numeroColada'=> $data->nrocolada,
            'medida'=> $data->medida,
            'tipoCostura'=> $data->costuraid,
            'observaciones'=> $data->obs
          ]);

          if ($db == true){
            $procid = $db;

            if ($data->accion == "N"){
              $db1 = DB::table($tablePr)->insert([
                'procesoid'=>$procid,
                'idCP'=>$idorden,
                'tipoProceso'=>10
              ]);
            }
            else{
              $db1 = DB::table($tablePr)->where('procesoid', '=', 0)->where('idCP', '=', $idorden)->where('tipoProceso', '=', 10)->update([
                'procesoid'=>$procid
              ]);
            }
          }
        }
        else{
          $procid = $idproceso;
          $db = DB::table('estencilado')->where('id', '=', $idproceso)->update([
            'largoMinimo'=> $data->largomin,
            'largoMaximo'=> $data->largomax,
            'normaid'=> $data->normaid,
            'numeroColada'=> $data->nrocolada,
            'medida'=> $data->medida,
            'tipoCostura'=> $data->costuraid,
            'observaciones'=> $data->obs
          ]);
        }
        return $procid;
      }
    }

    public function restaFechas($dFecIni, $dFecFin)
    {
        $dFecIni = str_replace("/","",$dFecIni);
        $dFecFin = str_replace("/","",$dFecFin);

        preg_match( "/([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})/", $dFecIni, $aFecIni);
        preg_match( "/([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})/", $dFecFin, $aFecFin);

        $date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[1], $aFecIni[3]);
        $date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[1], $aFecFin[3]);

        return round(($date2 - $date1) / (60 * 60 * 24));
    }

    public function selectoresindividuales(Request $request)
    {
      $tables = json_decode($request->get('tables'));
      $list = [];
      foreach ($tables as $table) {
        if (Schema::hasTable($table))
        {
          $db = DB::table($table)->get();
          $list[] = (object)['selector'=>$db];
        }
        else{
          $list[] = (object)['selector'=>null];        
        }
      }
      return response()->json(['resultados'=>$list]);
    }

    public function insertSubpro($tipo, $idplan, $idorden, $or=0){
      $tblRun = array(''
                      ,'preparacionmprun'
                      ,'hornorun'
                      , 'batearun'
                      , 'puntarun'
                      , 'trefilarun'
                      , 'enderezadorun'
                      , 'corterun');

      $db = DB::table($tblRun[$tipo])->insertGetId([
        'estadoid'=>1,
        'idplan'=>$idplan,
      ]);

      $db1 = DB::table('subprocesosestado')->insert([
        'procesoid'=>$db,
        'tipoProceso'=>$tipo,
        'estadoid'=>1,
        'ordenProduccion'=>$idorden,
        'idplan'=>$idplan,
        'orden'=>$or
      ]);

      return true;
    }

    public function vercot(Request $request)
    {
      $cadena = $request->get('list');
      $esop = (int) $request->get('esop');
      $id = (int) $request->get('idcot');
      $parser = [];

      $array_or = explode(",",$cadena);
      foreach ($array_or as $vls){
         $parser[] = explode("*",$vls);

      }
      if ($esop == 1){
        //es orden de producion;
        $table = "procesosxop";
        $db = 'SELECT '.
              "1 ,op.estadoid as estOP,v.fechaPrometida,op.id as idorden ".
              "from ordenprocesoop ".
              "LEFT JOIN versionesxorden v ON (v.id=$id) ".
              "LEFT JOIN ordenproduccion op ON (op.id = v.ordenProduccion) ".
              "where idOrdenProduccion=$id ;";

        $res = DB::select($db);
        $rr = null;

        if (count($res)>0){
          $rr = $res[0];
          $up = DB::table('ordenprocesoop')->where('idOrdenProduccion', '=', $id)->update([
            'orden'=>$cadena
          ]);
        }
        else{
          DB::table('ordenprocesoop')->insert([
            'orden'=>$cadena,
            'idOrdenProduccion'=>$id
          ]);

          $rr = DB::select($db)[0];

        }

        if ($rr){
          if ($rr->estOP == 1){
            $db1 = 'UPDATE '.
                   "ordenproduccion SET estadoid=2 where id=(SELECT ordenProduccion from ".
                   "versionesxorden where id=$id) ;";

            $res1 = DB::select($db1);
          }
        }

        $cont = 1;
        $arrNotDel = array();
        $ultimoProceso = end($parser);

        if ($rr->estOP ==1 or $rr->estOP ==2 ){
          foreach ($parser as $data){
            if ($data[1]<>0 and  ($data[0]<8)){
              $db2 = DB::table('subprocesosestado')->where('idplan', '=', $data[1])->where('tipoProceso', '=', $data[0])->where('ordenProduccion', '=', $id)->update([
                'orden'=>$cont
              ]);

              $db3 = 'SELECT '.
                     "1 from subprocesosestado where idplan=".$data[1]." and ".
                     "tipoProceso=".$data[0]." and ordenProduccion=$id ;";

              $res3 = DB::select($db3);

              if (count($res3)==0){
                $this->insertSubpro($data[0],$data[1],$id,$cont);
              }

              $arrNotDel[] = $data[1];
              $cont++;
            }
          }

          if (count($arrNotDel)>0){
              $db4 = "DELETE from subprocesosestado where idplan NOT IN (".implode(",",$arrNotDel).") and ordenProduccion=$id";
              
              $db4 = DB::select($db4);
          }

          $this->actualizarTiempoProcesos();

          if (empty($rr->fechaPrometida)){
            $db5 = 'SELECT '.
                   "fecha from tiemposproduccion where tipoProceso=".$ultimoProceso[0]." and procesoid=".$ultimoProceso[1]." and ordenProduccion=$id ;";

            $res5 = DB::select($db5);
            if (count($res5)>0){
              $rsptt = $res5[0];
              $db6 = DB::table('versionesxorden')->where('id', '=', $id)->update([
                'fechaPrometida'=>$rsptt->fecha
              ]);
            }
          }
        }
      }
      else{
        // es una cotizacion
        $table = "procesosxcp";
        $db1 = DB::table('ordenprocesocotizacion')->where('idCotizacion', '=', $id)->delete();
        $db2 = DB::table('ordenprocesocotizacion')->insert([
          'idCotizacion'=>$id,
          'orden'=>$cadena
        ]);
      }
      
      $db = DB::table($table)->where('idCP', '=', $id)->delete();

      foreach ($parser as $newV) {
        $db3 = DB::table($table)->insert([
          'idCP'=>$id,
          'procesoid'=>$newV[1],
          'tipoProceso'=>$newV[0]
        ]);       
      }


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

    public function buscarmedidaproceso(Request $request)
    {
      $input = $request->all();

      $q0 = "";
      $q0 .= (empty($input['diamexdesde']))? "" : " AND m.diametroExterior>=".$input['diamexdesde']."";
      $q0 .= (empty($input['diamexhasta']))? "" : " AND m.diametroExterior<=".$input['diamexhasta']."";
      $q0 .= (empty($input['espesordesde']))? "" : " AND m.espesorNominal>=".$input['espesordesde']."";
      $q0 .= (empty($input['espesorhasta']))? "" : " AND m.espesorNominal<=".$input['espesorhasta']."";
      $q0 .= (empty($input['largomaxdesde']))? "" : " AND m.largoMaximo>=".$input['largomaxdesde']."";
      $q0 .= (empty($input['largomaxhasta']))? "" : " AND m.largoMaximo<=".$input['largomaxhasta']."";
      $q0 .= (empty($input['largomindesde']))? "" : " AND m.largoMinimo>=".$input['largomindesde']."";
      $q0 .= (empty($input['largominhasta']))? "" : " AND m.largoMinimo<=".$input['largominhasta']."";
      $q0 .= (empty($input['tipoacero']))? "" : " AND tipoAceroSAE=".$input['tipoacero']."";
      $q0 .= (empty($input['tipocostura']))? "" : " AND tipoCostura=".$input['tipocostura']."";
      $q0 .= (empty($input['tratamiento']))? "" : " AND tratamientoTermico=".$input['tratamiento']."";
      $q0 .= (empty($input['norma']))? "" : " AND normaid=".$input['norma']."";

      $kgm = $this->kilogrametro(($input['den']), ($input['en']));

      if ($input['estandar']<>1){
        $q0 .= (!empty($input['reduccionmin'])?" AND ".
          "(1-($kgm / (round(((diametroExterior - espesorNominal) * ".
          "espesorNominal * 0.0246),2)))))>= 0.".$input['reduccionmin']. " AND ".
          "(diametroExterior>".$input['den']." AND espesorNominal>".$input['en'].")":"");

        $q0 .= (!empty($input['reduccionmax'])?" AND ".
          "((1-($kgm / (round(((diametroExterior - espesorNominal) *".
          "espesorNominal * 0.0246),2)))))<=0.".$input['reduccionmax']:"");
      }

      $diamIntMP =  (($input['den'])-(2*$input['en']));
      $q0 .= (!empty($input['plus'])?" AND (($diamIntMP+".$input['plus'].") < ".
        "(diametroExterior - (2*espesorNominal)))":"");

      $sql = 'SELECT '.
      "m.medida as Medida,
      m.diametroExterior as Diametro,
      m.espesorNominal as Espesor,
              IF (m.largoMaximo=m.largoMinimo,m.largoMaximo,CONCAT(m.largoMinimo,'/',m.largoMaximo)) as Largo,
              tc.descripcion as Costura,
              
              ta.descripcion as Acero,
              n.descripcion AS Norma,
                  
                  
                  
              n.descripcion as normas,
              ta.descripcion as tipoacero,
              tc.descripcion as tipocostura,
              tratamientotermico.descripcion as tratamientotermicod,
             
             
             IF (SUM( st.cantidad )>0, SUM(st.cantidad), 0) AS 'Stock(kgs)', ".
             "(SELECT (SUM( co.kilos )) ".
             "FROM medidas mx ".
             "INNER JOIN preparacionmp pmpx ON ( pmpx.medidaid = mx.id ) ".
             "INNER JOIN procesosxcp pcpx ON ( pcpx.tipoProceso =1 ".
             "AND pcpx.procesoid = pmpx.id ) ".
             "INNER JOIN cotizaciones co ON ( co.id = pcpx.idCP and (co.estadoid=2 or ".
             "co.estadoid=1) ) WHERE mx.id = m.id GROUP BY mx.id) AS 'KGsreservaCotizacion', ".
             "(SELECT (SUM( co2.kilos )) ".
             "FROM medidas mx2 ".
             "LEFT JOIN preparacionmp pmpx2 ON ( pmpx2.medidaid = mx2.id ) ".
             "LEFT JOIN procesosxcp pcpx2 ON ( pcpx2.tipoProceso =1 ".
             "AND pcpx2.procesoid = pmpx2.id ) ".
             "LEFT JOIN cotizaciones co2 ON ( co2.id = pcpx2.idCP and co2.estadoid=3 ) ".
             "WHERE mx2.id = m.id GROUP BY mx2.id) AS 'KGsreservaProduccion', ".
             "m.id FROM medidas m ".
             "LEFT JOIN paquetes p ON (m.id = p.medidaid) ".
             "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = p.id ) ".

             "LEFT JOIN estadomateriaprima emp ON (emp.id = p.estadoid)
             LEFT JOIN tipoacero ta ON (ta.id  = m.tipoAceroSAE)
             LEFT JOIN tipocostura tc ON (tc.id = m.tipoCostura)
             LEFT JOIN normas n ON (n.id = m.normaid)
             LEFT JOIN tratamientotermico ON (tratamientotermico.id = m.tratamientoTermico)
             LEFT JOIN estadofabricacion tt ON (tt.id = m.tratamientoTermico)".
             "WHERE 1=1 $q0 GROUP BY m.id ".
             "order by diametroExterior asc ;";

      $res = DB::select($sql);
      $results  = json_decode(json_encode($res), true);
      $array = [];
      $x=0;
      foreach ($results as $key => $value) {
        if(!is_null($value['Medida'])){
          $array[$x]=$value;
          $array[$x]['MEDIDA'] = $value['Diametro'].' x '.$value['Espesor'].' x '.$value['Largo']. ' x '.$value['normas']. ' x '.$value['tipoacero']. ' x '.$value['tipocostura']. ' x '.$value['tratamientotermicod'];
          $x++;
        }
      }
      return response()->json(['resultados'=>$array]);

    }

    public function selectortrefila()
    {
     
      dd($tablas);
    }

    public function buscarprocesoop(Request $request, $id, $type)
    {

      $tipoaceros = DB::table('tipoacero')->get();
      $tipocostura = DB::table('tipocostura')->get();
      $tratamientos = DB::table('tratamientotermico')->get();
      $normas = DB::table('normas')->get();
      $tipoorden =  DB::table("reventa")->get();
      $usos =  DB::table("usofinal")->get();

      return view('produccion.buscarproceso', compact('id', 'type', 'tipoaceros', 'tipocostura', 'tratamientos', 'normas', 'tipoorden', 'usos'));
    }

    public function consultarprocesosop(Request $request)
    {
      $input = $request->all();
//      dd($input);
      $q0 = "";
      $q0 .= (empty($input['cliente']))? "" : " AND c.razon LIKE '%".$input['cliente']."%'";
      $q0 .= (empty($input['dedesde']))? "" : " AND mc.diametroExteriorNominal>=".$input['dedesde']."";
      $q0 .= (empty($input['dehasta']))? "" : " AND mc.diametroExteriorNominal<=".$input['dehasta']."";
      $q0 .= (empty($input['esdesde']))? "" : " AND mc.espesorNominal>=".$input['esdesde']."";
      $q0 .= (empty($input['eshasta']))? "" : " AND mc.espesorNominal<=".$input['eshasta']."";
      $q0 .= (empty($input['didesde']))? "" : " AND mc.diametroInteriorNominal>=".$input['didesde']."";
      $q0 .= (empty($input['dihasta']))? "" : " AND mc.diametroInteriorNominal<=".$input['dihasta']."";
      $q0 .= (empty($input['lamin']))? "" : " AND mc.largoMinimo>".$input['lamin']."";
      $q0 .= (empty($input['lamax']))? "" : " AND mc.largoMaximo<".$input['lamax']."";
      $q0 .= (empty($input['kidesde']))? "" : " AND p.kilos>=".$input['kidesde']."";
      $q0 .= (empty($input['kihasta']))? "" : " AND p.kilos<=".$input['kihasta']."";
      $q0 .= (empty($input['tipoacero']))? "" : " AND p.tipoAcero=".$input['tipoacero']."";
      $q0 .= (empty($input['tipocostura']))? "" : " AND mc.costuraid=".$input['tipocostura']."";
      $q0 .= (empty($input['tratamiento']))? "" : " AND co.tratamientoTermico=".$input['tratamiento']."";
      $q0 .= (empty($input['tiponorma']))? "" : " AND mc.normaid=".$input['tiponorma']."";
      $q0 .= (empty($input['tipoorden']))? "" : " AND co.tipoReventa=".$input['tipoorden']."";
      $q0 .= (empty($input['orden']))? "" : " AND op.id=".$input['orden']."";

      $namesProc = array('','Preparación MP',
                  'Horno'
                 , 'Batea'
                 , 'Punta'
                 , 'Trefila'
                 , 'Enderezadora'
                 , 'Corte'
                 , 'Eddy Current'
                 , 'Prueba Hidraulica'
                 , 'Estencilado'
                 , 'Empaquetado'
                 , 'Control Final'
                 , 'Entrega'
                 , 'Servicio'
                 , 'Certificado');

      $sql = 'SELECT '.
             "medida,op.id as nroOrd,p.id as verid ".
             "FROM ordenproduccion op ".
             "INNER  JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
             "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
             "LEFT JOIN clientes c ON (c.id = p.clienteid) ".
             "LEFT JOIN cotizaciones co ON (co.id = op.cotizacionid) ".
             "WHERE 1=1 and p.version=".
             "(SELECT MAX(vxo.version) from ordenproduccion op ".
             "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
             "WHERE vxo.ordenProduccion=p.ordenProduccion ".
             "GROUP BY (vxo.ordenProduccion) ) $q0 order by op.id desc ;";

      $db = DB::select($sql);

      $retorno = [];

      if (count($db)>0){
        foreach ($db as $row) {
          $verid = $row->verid;
          $sql1 = 'SELECT '.
                  "* from ordenprocesoop where idOrdenProduccion=$verid ;";
          $db1 = DB::select($sql1);
          if (count($db1)>0){
            $rw = $db1[0];
            $array_proc = explode(",",$rw->orden);
            $parser = array();
            $cadena = array();
            foreach ($array_proc as $valt){

                $parser = explode("*",$valt);
                $val = $parser[0];
                $cadena[] = $namesProc[$val];
                
            }
          }
          $data =  implode(" - ",$cadena);
          $retorno[] = (object)['medida'=>$row->medida, 'nroOrd'=>$row->nroOrd, 'procesos'=>$data, 'verid'=>$verid];
        }
      }

      return response()->json(['resultados'=>$retorno]);
    }

    public function punzonestrefila(Request $request)
    {
      $input = $request->all();
      $material = 0;
      if ($request->get('material') !== null)
        $material = $input['material'];

      $concat = "CONCAT";
      $tipomat = "and tipoMaterialid=".$material;


      if ($input['tipopunzon']==1){
          
          $concat .= ($input['material']==1)?"(diametro)":"(diametro,' ',rosca,' ',observaciones)";
      }
      else {
          $concat .= "(espesor)";
          $tipomat = "";
      }

      $tipopunzon = $input['tipopunzon'];

      $qry_s = "";


      $sql = 'SELECT '.
      "id, $concat as descripcion ".
      "FROM punzones where tipoPunzonid=$tipopunzon $tipomat ;";

      $qry_s = DB::select($sql);
      $n = 0;
      

      if ($input['pDoble']==1){
        //Nuevo punzon
        $sql1 = 'SELECT id,descripcion FROM tipomaterialpm ';

        $selector = DB::select($sql1);
        $n = 1;
      }
      else{
        $selector = $qry_s;
      }
      $variables = [$material, $tipopunzon, $input['pDoble']];

      $obj = (object)['nuevo'=>$n, 'selector'=>$selector, 'punzon'=>$qry_s, 'variables'=>$variables];
      return response()->json(['resultado'=>$obj]);
    }

    public function verordenproduccion(Request $request, $id)
    {
      $input = $request->all();
      $orden = $input['orden'];
      $precioPasado = $input['preciopasado'];
      $id_cotizacion = $id;
      $estadoid = (int) $input['estadoid'];

      $dbordendeproduccion = DB::table('ordenproduccion')->insertGetId([
        'cotizacionid'=>$id_cotizacion,
        'estadoid'=>1
      ]);

      $NRO_ORDEN = $dbordendeproduccion;
      $orderNew = 1;

      $sql = 'SELECT '.
             "hor.id as horid,bat.id as batid,tre.id as idtre,pmp.precio as precioMP, ".
             "m.*,c.*,c.formaid as formid,m.id as medid,est.largoMaximo as largomaxest, ".
             "est.largoMinimo as largominest,est.id as ideste, ".
             "m.normaid as tiponormaest,ta.id as tacero,est.tipoCostura as tipocosturaest, ".
             "est.observaciones as observaeste,est.medida as med, ".
             "est.numeroColada as numeroColada,cl.razon as razon, cl.id as idcliente, ".
             "tr.descripcion as descreventa, tc.descripcion as descostura, ".
             "n.descripcion as desnorma, f.descripcion as desforma, ".
             "uf.descripcion as desusofinal, e.descripcion as desembalaje,ec.descripcion as estcot, ".
             "tcest.descripcion as costuraidest,nest.descripcion as normaidest, ".
             "IF (c.urgente=1, 'SI', 'NO') as urgencia,IF (c.biselado=1,'SI','NO') as bise, ".
             "tmon.descripcion as moneda, ".
             "IF (c.aplastado=1,'SI','NO') as aplas,IF (c.pestaniado=1,'SI','NO') as pesta, ".
             "pc.precioKilo,pc.precioPieza,pc.precioMetro,pc.fecha as fechapc, ".
             "cv.descripcion as condicionvta,tt.descripcion as desctt,tt.detalle as detallett, ".
             "te.direccion as Lentrega, c.urgente as urgentecot ".
             "FROM  cotizaciones c ".
             "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
             "LEFT JOIN estencilado est ON (est.id = c.estenciladoid) ".
             "LEFT JOIN clientes cl ON (cl.id = c.clienteid) ".
             "LEFT JOIN entrega te ON (te.id = c.lugarEntrega) ".
             "LEFT JOIN reventa tr ON (tr.id = c.tipoReventa) ".
             "LEFT JOIN tipocostura tc ON (tc.id = m.costuraid) ".
             "LEFT JOIN tipocostura tcest ON (tcest.id = est.tipoCostura) ".
             "LEFT JOIN normas n ON (n.id = m.normaid) ". 
             "LEFT JOIN normas nest ON (nest.id = est.normaid) ".
             "LEFT JOIN formas f ON (f.id = c.formaid) ".
             "LEFT JOIN usofinal uf ON (uf.id = c.uso) ".
             "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = c.id and pxcp.tipoProceso=1 ) ".
             "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
             "LEFT JOIN procesosxcp ptrefi ON (ptrefi.idCP = c.id and ptrefi.tipoProceso=5 ) ".
             "LEFT JOIN trefila tre ON (tre.id = ptrefi.procesoid) ".
             "LEFT JOIN procesosxcp phorno ON (phorno.idCP = c.id and phorno.tipoProceso=2 ) ".
             "LEFT JOIN horno hor ON (hor.id = phorno.procesoid) ".
             "LEFT JOIN procesosxcp pbatea ON (pbatea.idCP = c.id and pbatea.tipoProceso=3) ".
             "LEFT JOIN batea bat ON (bat.id = pbatea.procesoid) ".
             "LEFT JOIN embalajes e ON (e.id = c.tipoembalaje) ".
             "LEFT JOIN estadocotizacion ec ON (ec.id = c.estadoid) ".
             "LEFT JOIN tipoacero ta ON (ta.id = c.tipoAcero) ".
             "LEFT JOIN monedas tmon ON (tmon.id = c.tipoMoneda) ".
             "LEFT JOIN condicionventa cv ON (cv.id = c.condicionVenta) ".
             "LEFT JOIN estadofabricacion tt ON (tt.id = c.tratamientoTermico) ".
             "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
             "(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=$id_cotizacion)) ".
             "where c.id=$id_cotizacion LIMIT 1 ;";
             

      $res = DB::select($sql);

      if (count($res)>0){
        
        $row = $res[0];
        //dd($row);
        $fechaRun = "";

        if (!($this->validar_fecha($row->fechaEntrega))){// SI NO CARGARON FECHA, LA DE INICIO ES LA DEL PEDIDO
          $fechaRun = $row->fechapc;
        }

        $rsp = 0;
        if (!($this->validar_fecha($fechaRun)) and ($this->validar_fecha($row->fechaEntrega))){
          // CONTAMOS LA CANTIDAD DE PROCESOS QUE TIENE PARA RESTARLOS y CALCULAR LA FECHA DE INICIO
          // AQUI VERIFICAMOS QUE SI ESTA INICIADA LA ORDEN
          // SOLO DEBEMOS CONTAR LOS DIAS DE LOS PROCESOS QUE RESTAN

          $tblpx = "procesosxcp";
          $dataEq = $id;
          $sqlpro = 'SELECT '.
                    "count(idCP) as tot from $tblpx where idCP=$dataEq ;";
          $respro = DB::select($sqlpro);
          if (count($respro)>0)
            $rsp = $respro[0]->tot;
          
          $fechaRun = $this->sumaDia($this->fechamysql($row->fechaEntrega), -$rsp);
        }
        $semana = 0;

        if ($this->validar_fecha($row->fechaEntrega)){
          $fechaexp = explode("-",$row->fechaEntrega);
          $semana = date('W', mktime(0,0,0,$fechaexp[1] ,$fechaexp[0],$fechaexp[2]));
        }
        
        $sqlnorma = "SELECT * from tipoacero WHERE id=".$row->tipoAcero;
        
        $rn = DB::select($sqlnorma);
        $rr = $rn[0];
        $acero = $rr->descripcion;

        $sqlcost = "SELECT * from tipocostura WHERE id=".$row->costuraid;
        $rn = DB::select($sqlcost);
        $rr = $rn[0];
        $costura = $rr->descripcion;

        $namecliente = $row->razon;

        $name_med = $namecliente." ".$row->diametroExteriorNominal." x ".$row->espesorNominal. "x" .$row->largoMinimo."/".$row->largoMaximo." ".$costura." ".$acero." ".$row->precioMP;

        $arrayMed = array("medida"=>$name_med,"diametroExteriorNominal"=>$row->diametroExteriorNominal,"diametroExteriorMaximo"=>$row->diametroExteriorMaximo, "diametroExteriorMinimo"=>$row->diametroExteriorMinimo,"diametroInteriorNominal"=>$row->diametroInteriorNominal,
            "diametroInteriorMaximo"=>$row->diametroInteriorMaximo,"diametroInteriorMinimo"=>$row->diametroInteriorMinimo,"espesorNominal"=>$row->espesorNominal,"espesorMaximo"=>$row->espesorMaximo, "espesorMinimo"=>$row->espesorMinimo
            ,"largoMaximo"=>$row->largoMaximo,"largoMinimo"=>$row->largoMinimo,"largoMaxEntrega"=>$row->largoMaxEntrega,"largoMinEntrega"=>$row->largoMinEntrega,"normaid"=>$row->normaid,
            "costuraid"=>$row->costuraid);

        $arrayEst = array("largoMinimo"=>$row->largominest,"largoMaximo"=>$row->largomaxest,"normaid"=>$row->tiponormaest,"numeroColada"=>$row->numeroColada,"medida"=>$row->med,
            "tipoCostura"=>$row->costuraid,"observaciones"=>$row->observaeste
        );

        $medid = DB::table('medidascotizadas')->insertGetId($arrayMed);

        $estid = DB::table('estencilado')->insertGetId($arrayEst);

        $lugar = $row->lugarEntrega;

        $version = 0;

        //"fechaPrometida"=>$this->fechamysql($row->fechaprom)
        $arrayVerProd = array("ordenProduccion"=>$NRO_ORDEN,"copia"=>0,"version"=>0,"estadoid"=>1,
          "clienteid"=>$row->idcliente,"medidaid"=>$medid,"tipoEmbalaje"=>$row->tipoReventa,"durezaMaxima"=>$row->durezaMaxima,"durezaMinima"=>$row->durezaMinima,
          "biselado"=>$row->biselado,"tipoAcero"=>$row->tipoAcero,"estenciladoid"=>$estid,"tipoReventa"=>$row->tipoReventa,"kilos"=>$row->kilos,
          "metros"=>$row->metros,"piezas"=>$row->piezas,"kilogrametro"=>$row->kilogrametro,"fechaPedido"=>$this->fechamysql($row->fechapc),"fechaInicio"=>$fechaRun,
          "semanaPrometida"=>$semana,"lugarEntrega"=>$lugar,"urgente"=>$row->urgentecot,"formaid"=>$row->formaid,"uso"=>$row->uso,
          "observacionProduccion"=>$row->observacionProduccion,"ordenCompra"=>$row->ordenCompra,"flecha"=>$row->flecha,"tratamientoTermico"=>$row->tratamientoTermico,"ensayoExpansion"=>$row->ensayoExpansion,
          "rugosidad"=>$row->rugosidad,"pestaniado"=>$row->pestaniado,"aplastado"=>$row->aplastado,"certificadoid"=>$row->certificadoid,"codigoPieza"=>$row->codigoPieza,"critico"=>0,"fechaPlanta"=>""
            );

        $versionid = DB::table('versionesxorden')->insertGetId($arrayVerProd);
        
        $db = DB::table('cotizaciones')->where('id', '=', $id)->update([
          'estadoid'=>3
        ]);
        $accion = "N";

        $estadosop = DB::table('estadosop')->get();
        $clientes = DB::table('clientes')->get();
        $tiporeventa = DB::table('reventa')->get();
        $formas = DB::table('formas')->get();
        $tratamientos = DB::table('estadofabricacion')->get();
        $costuras = DB::table('tipocostura')->get();
        $normas = DB::table('normas')->get();
        $selLugar = "SELECT id,CONCAT(direccion,' - ',contacto) as dire from direccionesclientes where clienteid=".$row->clienteid;

        $lugares = DB::select($selLugar);
        $usos = DB::table('usofinal')->get();
        $embalajes = DB::table('embalajes')->get();
        $aceros = DB::table('tipoacero')->get();
        $certificados = DB::table('certificado')->get();

        return view('produccion.verordenindividual', compact('NRO_ORDEN', 'accion', 'orderNew', 'id', 'estadosop', 'clientes', 'tiporeventa', 'formas', 'tratamientos', 'costuras', 'normas', 'lugares', 'usos', 'embalajes', 'aceros', 'certificados', 'versionid'));
      }


    }

    public function validar_fecha($fecha,$vacio=false){

        if (empty($fecha))
          return $vacio;

        $date=explode('/', trim($fecha));
        return ((is_numeric($date[0]) and is_numeric($date[1]) and is_numeric($date[2]) and checkdate($date[1], $date[0], $date[2])));
            
    } 

    public function fechamysql($fphp){
     if (empty($fphp) or (!$this->validar_fecha($fphp)))
       return $fphp;
     $fecha_aux = explode('/', trim($fphp));
     $fecha = $fecha_aux[2]."-".$fecha_aux[1]."-".$fecha_aux[0];  
    return $fecha; 

    }

    public function data_verproduct(Request $request)
    {
      $accion = $request->get('accion');
      $idcot = $request->get('id');

      if ($accion == "N"){
        $sql = 'SELECT '.
               "m.*,c.*,c.id as idCoti,c.fechaEntrega as fechaPrometida,m.id as medid, ".
               "est.largoMaximo as largomaxest,est.largoMinimo as largominest,est.id as ideste, ".
               "est.numeroColada as coladaest,tmon.descripcion as moneda, ".
               "est.normaid as tiponormaest,est.tipoCostura as  tipocosturaest, ".
               "est.observaciones as observaeste,est.medida as med, ".
               "pc.precioMetro,pc.precioKilo,pc.precioPieza,cvt.descripcion as condicionvta ".
               "FROM  cotizaciones c ".
               "LEFT JOIN monedas tmon ON (tmon.id = c.tipoMoneda) ".
               "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
               "LEFT JOIN estencilado est ON (est.id = c.estenciladoid) ".
               "LEFT JOIN condicionventa cvt ON (cvt.id = c.condicionVenta) ".
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id ".
               "and pc.fecha=(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=$idcot)) ".
               "where c.id=$idcot LIMIT 1 ;";

      }
      else{
        $sql = 'SELECT '.
               "op.estadoid as est,vxo.*,vxo.id as idverop,vxo.critico as critico, ".
               "op.cotizacionid as idCoti, m.*,m.id as medid, ".
               "est.largoMaximo as largomaxest,est.largoMinimo as largominest, ".
               "est.id as ideste, est.normaid as tiponormaest,est.tipoCostura as tipocosturaest, ".
               "est.observaciones as observaeste,est.medida as med,est.numeroColada as coladaest, ".
               "tmon.descripcion as moneda,cvt.descripcion as condicionvta, ".
               "pc.precioMetro,pc.precioKilo,pc.precioPieza,c.pesosx45 ,c.precioxContribucion, ".
               "c.precioPasado, op.ordenReferencia ".
               "FROM ordenProduccion op ".
               "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
               "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
               "LEFT JOIN estencilado est ON (est.id = vxo.estenciladoid) ".
               "LEFT JOIN cotizaciones c ON (c.id = op.cotizacionid) ".
               "LEFT JOIN  condicionventa cvt ON (cvt.id = c.condicionVenta) ".
               "LEFT JOIN monedas tmon ON (tmon.id = c.tipoMoneda) ".
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=".
               "(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=c.id)) ".
               "where vxo.id=$idcot ;";
      }

      $res = DB::select($sql);
      if (count($res)>0){
        return response()->json($res);
      }
      return "false";

    }

    public function procesarProduccion(Request $request)
    {
      
      $action = $request->get('action');
      $input = $request->all();
      
      $tpacero = $request->get('tipoacero');
      $tpcostura = $request->get('tipocostura');

      if($action=="M"){
        $sql = "SELECT * from tipoacero WHERE id=".$tpacero;
        $tpacero = DB::select($sql)[0];

        $sql1 = "SELECT * from tipocostura WHERE id=".$tpcostura;
        $tpcostura = DB::select($sql1)[0];

        $acero = $tpacero->descripcion;
        $costura = $tpcostura->descripcion;

        $precio = "";

        $namecliente = $this->nombreCliente($input['cliente']);

        $name_med = $namecliente." ".$input['diamExtNom']." x ".$input['espesorNom']. "x" .$input['largoMin']."/".$input['largoMax']." ".$costura." ".$acero." ".$precio;

        $arrayMed = array($name_med,$input['diamExtNom'],$input['diamExtMax'],$input['diamExtMin'],$input['diamIntNom'],
        $input['diamIntMax'],$input['diamIntMin'],$input['espesorNom'],$input['espesorMax'],$input['espesorMin']
        ,$input['largoMax'],$input['largoMin'],$input['largoMaxEn'],$input['largoMinEn'],$input['tiponorma'],
        $input['tipocostura']);

        $upMedida = "UPDATE medidascotizadas SET medida=?, diametroExteriorNominal=?, diametroExteriorMaximo=?, diametroExteriorMinimo=?,
            diametroInteriorNominal=?, diametroInteriorMaximo=?, diametroInteriorMinimo=?, espesorNominal=?, espesorMaximo=?, espesorMinimo=?, largoMaximo=?, 
            largoMinimo=?, largoMaxEntrega=?, largoMinEntrega=?, normaid=?, costuraid=? WHERE id = ".$input['idmedi'];

        $upMedida_db = DB::select($upMedida, $arrayMed);


        $medid = $input['idmedi'];
        $arrayVerProd[6] = $medid;

        $estid = null;


        if (false){
          // esto se paso a falso porque generaba un error al guardar la orden debido a qur no tiene el med , que el error viene desde cotizacion
        //if ($input['estencilado']>0 && $input['estenciladoid']){

        $arrayEst = array($input['largoMinEst'],$input['largoMaxEst'],$input['tiponormaest'],$input['numeroColada'],$input['med'],
          $input['tipocosturaest'],$input['observaeste']
          );

          $upEstencilado = "UPDATE estencilado SET largoMinimo=?, largoMaximo=?, normaid=?, numeroColada=?, medida=?, tipoCostura=?, observaciones=?
              WHERE id = ".$input['estenciladoid'];

          $upEstencilado_db = DB::table($upEstencilado, $arrayEst);

          $estid = $input['estenciladoid'];
          $arrayVerProd[12] = $estid;

        }
        else if($input['estencilado']>0){

          $inEstencilado_db = DB::table('estencilado')->insertGetId([
            "largoMinimo"=>$input['largoMinEst'],
            "largoMaximo"=>$input['largoMaxEst'],
            "normaid"=>$input['tiponormaest'],
            "numeroColada"=>$input['numeroColada'],
            //"medida"=>$input['med'],
            //"medida"=>0, //se comenta por error de med ,
            "tipoCostura"=>$input['tipocosturaest'],
            "observaciones"=>$input['observaeste']
          ]);

          $estid = $inEstencilado_db;
          $arrayVerProd[12] = $estid;
        }

        $version = (!$input['versionAnt'])?1:($input['versionAnt']+1);

        ///AQUI VA SI INSERTARON UNA NUEVA DIRECCION///
        $lugar = $input['lugar'];


        if (!($this->validar_fecha($input['fechaRun'])) and !($this->validar_fecha($input['fechaprom']))){
          $input['fechaRun'] = ($input['new']==1)?$input['fecha']:$input['fechaRunOld'];
        }




        if (!($this->validar_fecha($input['fechaRun'])) and ($this->validar_fecha($input['fechaprom']))){
          $tblpx = ($input['new']==1)?"procesosxcp":"procesosxop";
          $dataEq = ($input['new']==1)?$input['idCoti']:$input['idverOP'];
          $db = "SELECT count(idCP) as tot
                from $tblpx
                where idCP=".$dataEq.";";

          $rt = DB::select($db);

          $rsp = 0;
          if (count($rt)>0)
            $rsp = $rt[0]->tot;
            
          $input['fechaRun'] = $this->sumaDia($this->fechamysql($input['fechaprom']),-($rsp));


          if (strtotime(($input['fechaRun']))<=strtotime($this->fechamysql($input['fecha']))){
            $input['fechaRun']  = $this->fechamysql($input['fecha']);
          }

        }


        if ($this->validar_fecha($input['fechaRun'])){
          $input['fechaRun'] = $this->fechamysql($input['fechaRun']);
        }

        $semana = 0;
        if ($this->validar_fecha($input['fechaprom'])){
          $fechaexp = explode("/",$input['fechaprom']);
          $semana = date('W', mktime(0,0,0,$fechaexp[1] ,$fechaexp[0],$fechaexp[2]));
        }

        $arrayVerProd = array($input['idOrden'],0,$version,$input['estado'],
        $input['cliente'],$medid,$input['tipoembalaje'],$input['durezaMax'],$input['durezaMin'],
        $input['biselado'],$input['tipoacero'],$estid,$input['tiporev'],$input['kilosv'],
        $input['metrosv'],$input['piezas'],$input['kgmetro'],$this->fechamysql($input['fecha']),$this->fechamysql($input['fechaprom']),($input['fechaRun']),
        $semana,$lugar,$input['urgente'],$input['forma'],$input['uso'],
        $input['observacionesPro'],$input['numerooc'],$input['flecha'],$input['tratamiento'],$input['ensayoexpansion'],
        $input['rugosidad'],$input['pestanado'],$input['aplastado'],$input['certificado'],$input['codigoPieza'],$input['critico'],"");
        
        $arrayVerProd[1]= $input['idOrden'];

        $sql = DB::select("UPDATE versionesxorden SET ordenProduccion=?, copia=?, version=?, estadoid=?, clienteid=?, medidaid=?, tipoEmbalaje=?,
              durezaMaxima=?, durezaMinima=?, biselado=?, tipoAcero=?, estenciladoid=?, tipoReventa=?, kilos=?, metros=?, piezas=?, kilogrametro=?, fechaPedido=?, 
              fechaPrometida=?, fechaInicio=?, semanaPrometida=?, lugarEntrega=?, urgente=?, formaid=?, uso=?, observacionProduccion=?, ordenCompra=?, flecha=?, 
              tratamientoTermico=?, ensayoExpansion=?, rugosidad=?, pestaniado=?, aplastado=?, certificadoid=?, codigoPieza=?, critico=?, fechaPlanta=? 
              WHERE id = ".$input['idverOP'], $arrayVerProd);

        if (count($sql)==0){
          $sql = DB::table('cotizaciones')->where('id', '=', $input['idCoti'])->update([
            'estadoid'=>3
          ]);
        }

        return "true";
      
      }

    }

    public function nombreCliente($id){
      $sql = "SELECT razon from clientes WHERE id=$id";
      $res = DB::select($sql)[0];
      return $res->razon;
    }

    public function generarxdif(Request $request)
    {
      $input = $request->all();

      $idver = $input['ver']; 
      $idop = $input['op']; 
      $coti = $input['coti']; 
      $kg = $input['kgn'];

      $op_id = DB::table('ordenproduccion')->insertGetId([
        'cotizacionid'=>$coti,
        'ordenReferencia'=>$idop,
        'estadoid'=>1
      ]);

      $Oarraycols = array();

      $db = DB::select('SHOW COLUMNS FROM versionesxorden');

      foreach ($db as $Otr) {
        if ($Otr->Field=='kilos')
        $Oarraycols[] = $kg;
        else
        $Oarraycols[] = $Otr->Field;
      }

      $Oarraycols = array_slice($Oarraycols, 2);// LE SACO EL ID y OP PARA COPIAR LOS OTROS CAMPOS

      $Ostringcols = implode(",",$Oarraycols);

      $db = DB::select("INSERT into versionesxorden  SELECT 0,$op_id,$Ostringcols FROM versionesxorden v WHERE v.id=".$idver);

      $idvernew = DB::table('versionesxorden')->select('versionesxorden.id')->orderBy('id', 'DESC')->first()->id;
      
      if ($this->procesoCopiado($idver, $idvernew, true,1, false, false, 1))
        return $op_id;
      else
        return "false";
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


        if ($verop == 1)
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
        return true;

    }

    public function autorizarMP(Request $request)
    {
      $sql = 'SELECT '.
            "pmp.id as idpmp,vxo2.id as vxoid,op.id as ordenpro ".
            "from ordenproduccion op ".
            "INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id) ".
            "LEFT JOIN subprocesosestado se ON (se.ordenProduccion=vxo2.id and se.tipoProceso=1) ".
            "LEFT JOIN preparacionmprun pmp ON (pmp.idplan = se.idplan) ".
            "where (op.estadoid=2 or op.estadoid=3) and se.estadoid=5 ".
            "and vxo2.version= ".
            "(SELECT MAX(vxo.version) ".
            "from ordenproduccion op ".
            "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
            "where (op.estadoid=2 or op.estadoid=3)  and ".
            "vxo.ordenProduccion=vxo2.ordenProduccion ".
            "GROUP BY (vxo.ordenProduccion) ) ".
            "order by vxo2.urgente desc,fechaPrometida desc ;";

      $db = DB::select($sql);
      $listR = [];

      if (count($db)>0){
        foreach ($db as $res) {
          $sql = 'SELECT DISTINCT '.
                 "mpr.id as idmp,me.id as medOri,op.id as 'nro',vxo.*,c.razon as ".
                 "cliente,mpr.idplan,mp.*,m.diametroExteriorNominal as diamExt, ".
                 "m.espesorNominal as Espe,tc.descripcion as tratter, ".
                 "IF (vxo.urgente=1,'U','') as urg,mpr.kilos as kilospreparados, ".
                 "pro.razon as provee,me.diametroExterior,me.espesorNominal, ".
                 "tcos.descripcion as costura,mpr.trazabilidad, ".
                 "paq.numeroTrazabilidad as traza,IF (SUM( st.cantidad )>0, ".
                 "SUM(st.cantidad),0) AS stock ".
                 "from preparacionmprun mpr ".
                 "INNER JOIN subprocesosestado se ON (se.procesoid=mpr.id and se.tipoProceso=1) ".
                 "INNER JOIN versionesxorden vxo ON (vxo.id = se.ordenProduccion ) ".
                 "LEFT JOIN ordenproduccion op ON (op.id=vxo.ordenProduccion) ".
                 "LEFT JOIN preparacionmp mp ON (mp.id = mpr.idplan) ".
                 "LEFT JOIN clientes c ON (c.id = vxo.clienteid) ".
                 "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
                 "LEFT JOIN tratamientocotizacion tc ON (tc.id = vxo.tratamientoTermico) ".
                 "LEFT JOIN medidas me ON (me.id = mp.medidaid) ".
                 "LEFT JOIN paquetes paq ON (paq.medidaid = me.id) ".
                 "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
                 "LEFT JOIN tipocostura tcos ON (tcos.id = me.tipoCostura) ".
                 "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = paq.id ) ".
                 "where mpr.id=$res->idpmp GROUP BY me.id ;";

          $db1 = DB::select($sql)[0];

          $db2 = DB::table('paquetes')->where('numeroTrazabilidad', '=', $db1->traza)->select('id')->first();

          $kgm = 0;
          $metros = 0;
          $kilos = 0;

          if (($db1->kilogrametro>0)){
            $kgm = $this->kilogrametro($db1->diamExt, $db1->Espe);
            $metros = empty($db1->metros)?number_format(($db1->kilos/$db1->kilogrametro), 2):$db1->metros;
            $kilos = empty($db1->kilos)?number_format(($db1->kilogrametro*$db1->metros), 2):$db1->kilos;

          }

          $listR[] = (object)["data"=>$db1, "traza"=>$db2, 'kilogrametro'=> (float)$kgm, 'metros'=>$metros, 'kilos'=>$kilos, 'idpmp'=>$res->idpmp, 'ordenpro'=>$res->ordenpro, 'vxoid'=>$res->vxoid];
        }
      }

      return view('produccion.autorizarmp', compact('listR'));
    }

    public function processautorizarMP(Request $request)
    {
      $input = json_decode($request->all()['procesos']);
      $carbon = Carbon::now();
      $fecha = $carbon->toDateString();

      foreach ($input as $key => $value) {
        $datap = [];
        $orden = [];
        $newkgs = (int) $value->newkgs;
        $prepkgs = (int) $value->prepkgs;
        if ((int)$newkgs>0 and (int)$newkgs<=$prepkgs){
          $diferenciaKilos = $prepkgs - $newkgs;


          if($diferenciaKilos>0){
            $datap['id'] = $value->paqueteid;
            $datap['medida'] = $value->medidaid;
            $datap['traza'] = $value->traza;
            $orden['id'] = $value->ordenid;
            $orden['version'] = $value->versionid;

            $this->ingresarPaqueteStock($datap,$diferenciaKilos,$orden);
          }

          $this->upd_subprocesosE(1, $value->autor, $fecha);
        }
        DB::table('preparacionmprun')->where('id', '=', $value->autor)->update([
          'kilos'=>$newkgs
        ]);
        
      }


      return "true";
    }


    public function ingresarPaqueteStock($dataPaq,$kgstotal,$orden)
    {
      $idNewMed = $dataPaq['medida'];

      // INFODOC RESPONDE A NºFACTURA y Nº REMMITO
      $infoDoc = $orden['id']."/".$orden['version'];

      $provee = 37; // ES TRAFICAÑO EL PROVEEDOR
      $params = array("",$provee,$infoDoc,'NOW()',$infoDoc,1,$kgstotal);

      $db = DB::select("INSERT INTO recepcionmateriaprima VALUES
      (?,?,?,?,?,?,?)", $params);

      $materiaPid = DB::table('recepcionmateriaprima')->orderBy('id', 'DESC')->select('recepcionmateriaprima.id')->first()->id;

      $traza = "AU".$orden['id']."-".$dataPaq['traza'];

      $tubos = 0;

      $paq_last = DB::table('paquetes')->where('id', '=', $dataPaq['id'])->first();

      $idPaq = DB::table('paquetes')->insertGetId([
        'pedidoid'=>$materiaPid,
        'medidaid'=>$idNewMed,
        'numeroTrazabilidad'=>$traza,
        'numeroTubos'=>0,
        'ubicacion'=>$paq_last->ubicacion,
        'estadoid'=> $paq_last->estadoid,
        'rubroid'=>$paq_last->rubroid,
        'formaid'=>$paq_last->formaid,
        'proveedorid'=>$provee,
        'precioMP'=>$paq_last->precioMP        
      ]);

      $db1 = DB::table('controlcalidad')->where('paqueteid', '=', $dataPaq['id'])->first();

      if($db1){
        $db2 = DB::table('controlcalidad')->insert([
          'paqueteid'=>$idPaq,
          'diametroExteriorMinimo'=> $db1->diametroExteriorMinimo,
          'diametroExteriorMaximo'=>$db1->diametroExteriorMaximo,
          'espesorMinimo'=>$db1->espesorMinimo,
          'espesorMaximo'=>$db1->espesorMaximo,
          'largoMinimo'=>$db1->largoMinimo,
          'largoMaximo'=>$db1->largoMaximo,
          'espesorMinEc'=>$db1->espesorMinEc,
          'espesorMaxEc'=>$db1->espesorMaxEc,
          'carbono'=>$db1->carbono,
          'manganeso'=>$db1->manganeso,
          'fosforo'=>$db1->fosforo,
          'azufre'=>$db1->azufre,
          'silicio'=>$db1->silicio,
          'tipoEnsayo'=>$db1->tipoEnsayo,
          'abocardado'=>$db1->abocardado,
          'durezaTubo'=>$db1->durezaTubo,
          'durezaCostura'=>$db1->durezaCostura,
          'cargaRoturamin'=>$db1->cargaRoturamin,
          'cargaRoturamax'=>$db1->cargaRoturamax,
          'resistenciaFluenciamin'=>$db1->resistenciaFluenciamin,
          'resistenciaFluenciamax'=>$db1->resistenciaFluenciamax,
          'numeroColada'=>$db1->numeroColada,
          'numeroCertificado'=>$db1->numeroCertificado,
          'estencilado'=>$db1->estencilado,
          'leyendaEstencilado'=>$db1->leyendaEstencilado,
          'biselado'=>$db1->biselado,
          'aplastado'=>$db1->aplastado,
          'alargamientoMin'=>$db1->alargamientoMin,
          'alargamientoMax'=>$db1->alargamientoMax,
          'observaciones'=>$db1->observaciones
        ]);
      }

      $date = date("Y-m-d H:i:s");
      $array_tipoM = array("",$idPaq,$idNewMed,1,$date,$kgstotal,4,$materiaPid);

      $db3 = DB::select("INSERT INTO movimientostock  VALUES
      (?,?,?,?,?,?,?,?)", $array_tipoM);

      $db4 = DB::select("INSERT INTO stockmateriaprima  VALUES
      (?,?)", array($idPaq,$kgstotal));

      return true;

    }

    public function processrechazoMP(Request $request)
    {
      $input = json_decode($request->all()['procesos']);

      foreach ($input as $key => $value) {
        $mpid = $value->autor;
        $db = DB::select("UPDATE subprocesosestado set estadoid=1 where tipoProceso=1 and procesoid=$mpid");
      }

      return "true";
    }


    public function storecontrolfinal(Request $request)
    {
      $input = $request->all();
      
      $arrayCF = array('',$input['vxoid'],$input['demed'],$input['espmed'],$input['dimed'],
      $input['aplastado'],$input['dureza'],  $this->fechamysql($input['fecha']),
      $input['abocardado'],$input['aprobado'],$input['cantidad_paquetes']
      );

      if ($input['accion']=='M'){
        $arrayUpd = array_slice($arrayCF, 2);
        $arrayUpd[] = $input['idCF'];
        $idCF = $input['idCF'];
        $db = DB::select("UPDATE controlfinal SET
            diametroExterior=?,espesor=?,diametroInterior=?,aplastado=?,
            dureza=?,fecha=?,abocardado=?,aprobadoPor=?,paquetes=?
            where id=?",$arrayUpd);

        $db1 = DB::select("DELETE from paquetesxcontrol where controlid=?",array($input['idCF']));

        $db2 = DB::select("DELETE from controlpaquetes where id IN (".$input['oldpq'].")");
      }
      else
      {
        $db3 = DB::select("INSERT INTO controlfinal VALUES
            (?,?,?,?,?,?,?,?,?,?,?)",$arrayCF);

        $idCF = DB::table('controlfinal')->orderBy('id', 'DESC')->select('controlfinal.id')->first()->id;

      }

      $paquetes = json_decode($input['paquetes']);

      foreach ($paquetes as $key => $value) {
        $arrayPaq = array('',$value->traza,$value->longitud,$value->cantidad,
        $value->metros,$value->kilos,$value->kilosbalanza,$value->nota);

        $db4 = DB::select("INSERT INTO controlpaquetes VALUES
            (?,?,?,?,?,?,?,?)",$arrayPaq);

        $idControlPaq = DB::table('controlpaquetes')->orderBy('id', 'DESC')->select('controlpaquetes.id')->first()->id;

        $db5 = DB::select("INSERT INTO paquetesxcontrol VALUES ($idCF,$idControlPaq)");
      }

      if ($input['cliente']==718 and ($input['accion']!="M")){
        if (empty($input['espmed'])){
          $input['espmed'] = ($input['demed'] - $input['dimed'])/2;
        }
        
        $dataM = array($input['demed'],$input['espmed'],json_decode($input['paquetes'])[0]->longitud,
        $input['costura'],$input['acero'],$input['tratamientot'],$input['norma']
        );

        $this->ingresoStock($dataM, $input);

      }

      $db = DB::select("UPDATE ordenproduccion set estadoid=5 where id=?",array($input['op']));


      return "true";
    }


    public function ingresoStock($dataMed, $request)
    {
      $request['diametroexterior'] = $dataMed[0];
      $request["espesornominal"] = $dataMed[1];
      $request["largomaximo"]  =$dataMed[2];
      $request['largominimo'] = $dataMed[2];

      $nombreM = $this->nombreMedida($request);

      $db = DB::select("INSERT INTO medidas (medida,diametroExterior,espesorNominal,largoMaximo,largoMinimo,tipoCostura,
          tipoAceroSAE,tratamientoTermico,normaid,observaciones,activa)
          VALUES ('".
      $nombreM."',".
      $dataMed[0].",".
      $dataMed[1].",".
      $dataMed[2].",".
      $dataMed[2].",".
      $dataMed[3].",".
      $dataMed[4].",".
      $dataMed[5].",".
      $dataMed[6].",
          '',
          '1')
          ");

      $idNewMed = DB::table('medidas')->orderBy('id', 'DESC')->select('medidas.id')->first()->id;

      $infoDoc = $request['op']."/".$request['version'];

      $paquetes = json_decode($request['paquetes']);
      
      $provee = 37; // ES TRAFICAÑO EL PROVEEDOR
      $kgstotal = 0;

      foreach ($paquetes as $key => $value) {
        $kgstotal = $kgstotal+ $value->kilos;
      }

      $params = array("",$provee,$infoDoc,'NOW()',$infoDoc,$request['cantidad_paquetes'],$kgstotal);

      $db1 = DB::select("INSERT INTO recepcionmateriaprima VALUES
        (?,?,?,?,?,?,?)", $params );

      $materiaPid = DB::table('recepcionmateriaprima')->orderBy('id', 'DESC')->select('recepcionmateriaprima.id')->first()->id;

      foreach ($paquetes as $key => $value) {

        $traza = $value->traza;
        // FALTA CANTIDAD DE TUBOS Y UBICACION
        $request['ubi'] = null;
        $request['estadoMP'] = null;
        $request['rubroid'] = null;
        $precio = null;

        $arrayPaq = array("",$materiaPid,$idNewMed,$traza,
        $value->cantidad,$request['ubi'],$request['estadoMP'],
        $request['rubroid'],$request['forma'],$provee,$precio);

        $db2 = DB::select("INSERT into paquetes VALUES (?,?,?,?,?,?,?,?,?,?,?)",$arrayPaq);

        $idPaq = DB::table('paquetes')->orderBy('id', 'DESC')->select('paquetes.id')->first()->id;

        if($request['paqOr']>0){
          $paq = DB::table('controlcalidad')->where('paqueteid', '=', $request['paqOr'])->first();
          
          if($paq){
            $db4 = DB::table('controlcalidad')->insertGetId([
              'paqueteid'=>$idPaq,
              'diametroExteriorMinimo'=>$paq->diametroExteriorMinimo,
              'diametroExteriorMaximo'=>$paq->diametroExteriorMaximo,
              'espesorMinimo'=>$paq->espesorMinimo,
              'espesorMaximo'=>$paq->espesorMaximo,
              'largoMinimo'=>$paq->largoMinimo,
              'largoMaximo'=>$paq->largoMaximo,
              'espesorMinEc'=>$paq->espesorMinEc,
              'espesorMaxEc'=>$paq->espesorMaxEc,
              'carbono'=>$paq->carbono,
              'manganeso'=>$paq->manganeso,
              'fosforo'=>$paq->fosforo,
              'azufre'=>$paq->azufre,
              'silicio'=>$paq->silicio,
              'tipoEnsayo'=>$paq->tipoEnsayo,
              'abocardado'=>$paq->abocardado,
              'durezaTubo'=>$paq->durezaTubo,
              'durezaCostura'=>$paq->durezaCostura,
              'cargaRoturamin'=>$paq->cargaRoturamin,
              'cargaRoturamax'=>$paq->cargaRoturamax,
              'resistenciaFluenciamin'=>$paq->resistenciaFluenciamin,
              'resistenciaFluenciamax'=>$paq->resistenciaFluenciamax,
              'numeroColada'=>$paq->numeroColada,
              'numeroCertificado'=>$paq->numeroCertificado,
              'estencilado'=>$paq->estencilado,
              'leyendaEstencilado'=>$paq->leyendaEstencilado,
              'biselado'=>$paq->biselado,
              'aplastado'=>$paq->aplastado,
              'alargamientoMin'=>$paq->alargamientoMin,
              'alargamientoMax'=>$paq->alargamientoMax,
              'observaciones'=>$paq->observaciones
            ]);
          }
        }

        $date = date("Y-m-d H:i:s");


        $kilosxpaq = $value->kilos;

        $array_tipoM = array("",$idPaq,$idNewMed,1,$date,$kilosxpaq,4,$materiaPid); //value es el id de la medida declarado en el foreach inicial
        // EN ESTE CASO EL documentoReferencia es el id insert_id de la RecepecionMateriaMprima

        $db5 = DB::select("INSERT INTO movimientostock  VALUES
            (?,?,?,?,?,?,?,?)", $array_tipoM );

        $db6 = DB::select("INSERT INTO stockmateriaprima  VALUES (?,?)", array($idPaq,$kilosxpaq));

      }
      return true;
    }

    public function nombreMedida($data){

      $norma = "";
      $acero = "";
      $costura = "";
      $tratat = "";

      if($data['norma']>0)
        $norma = DB::table('normas')->where('id', '=', $data['norma'])->select('normas.descripcion')->first()->descripcion;

      if($data['acero']>0)
        $acero = DB::table('tipoacero')->where('id', '=', $data['acero'])->select('tipoacero.descripcion')->first()->descripcion;

      if($data['costura']>0)
        $costura = DB::table('tipocostura')->where('id', '=', $data['costura'])->select('tipocostura.descripcion')->first()->descripcion;

      if($data['tratamientot']>0)
        $tratat = DB::table('estadofabricacion')->where('id', '=', $data['tratamientot'])->select('estadofabricacion.descripcion')->first()->descripcion;

      $largominmax = ($data["largomaximo"]==$data["largominimo"])?$data["largomaximo"]:$data["largominimo"]."/".$data["largomaximo"];

      $nombre = str_replace(".",",",$data['diametroexterior'])." x ".str_replace(".",",",$data["espesornominal"])." x ".$largominmax." ".$costura." ".$tratat." ".$acero." ".$norma;

      return $nombre;

    }

    public function mpRechazo(Request $request)
    {
      $input = $request->all();
      $dataarray = null;

      if(isset($input['nro']) ) {
        $db = DB::select("SELECT cf.id as idcf,cf.*,v.piezas,c.razon,c.id as clienteid,tc.descripcion as costura,tt.descripcion as tratat,
        IF (cdim.dureza>0,cdim.dureza,cf.dureza) as durezaC,
        v.tipoAcero,mc.*,op.estadoid as opestado,
        me.diametroExterior as dexMP,me.espesorNominal as espMP,me.tipoCostura cosMP,
        me.tipoAceroSae as aceroMP,me.tratamientoTermico as ttMP,me.normaid as normaMP,
        IF(v.metros>0,v.metros,round(v.kilos/((mc.diametroExteriorNominal - mc.espesorNominal) * mc.espesorNominal * 0.0246),2)) as metrosOP,
        IF(v.kilos>0,v.kilos,round(v.metros*((mc.diametroExteriorNominal - mc.espesorNominal) * mc.espesorNominal * 0.0246),2)) as kilosOP,
        pmpRun.kilos as kilos,v.id as idVer,pmpRun.id as idPmpRun,
        IF(v.metros=0,1,2) as required

        FROM ordenproduccion op
        INNER JOIN versionesxorden v ON (v.ordenProduccion = op.id)
        LEFT JOIN controlfinal cf ON (cf.idVersion = v.id)
        LEFT JOIN clientes c ON (c.id = v.clienteid)
        LEFT JOIN calidadproduccion calp ON (calp.idVersion = v.id)
        LEFT JOIN certificadodimensional cdim ON (cdim.id = calp.certificadoDimensionalid)
        LEFT JOIN tratamientotermico tt ON (tt.id = v.tratamientoTermico)
        LEFT JOIN medidascotizadas mc ON (mc.id = v.medidaid)
        LEFT JOIN tipocostura tc ON (mc.costuraid = tc.id)
        LEFT JOIN subprocesosestado se ON (se.tipoProceso = 1 and se.ordenProduccion=v.id)
        LEFT JOIN preparacionmp pmp ON (pmp.id =  se.idplan)
        LEFT JOIN preparacionmprun pmpRun ON (pmpRun.id = se.procesoid)
        LEFT JOIN medidas me ON (me.id = pmp.medidaid)

        WHERE op.id=?
        and v.version=
        (SELECT MAX(vxo.version)
        from ordenproduccion op
        INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id)
        WHERE
        vxo.ordenProduccion=v.ordenProduccion
        GROUP BY (vxo.ordenProduccion) )

        GROUP BY cf.idVersion

        ", array($input['nro']));

        if(count($db)>0){

          if($db[0]->idVersion || isset($input['rechazo'])){
            $tableJson = [];

            $cf = DB::select("SELECT round(AVG(cp.longitudTubos),2) as sum  FROM controlfinal cf
            LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid = cf.id)
            LEFT JOIN controlpaquetes cp ON (cp.id = pxc.controlPaqueteid)
            where cf.id=? GROUP BY (cf.id)
            ",array($db[0]->idcf));

            if (empty($db[0]->espesor))
              $db[0]->espesor = ($db[0]->diametroExterior - $db[0]->diametroInterior) / 2;

            $dataarray = array($db[0]->diametroExterior,$db[0]->espesor,$db[0]->diametroInterior,$db[0]->costura,$db[0]->tratat,$db[0]->kilos,$cf[0]->sum,$db[0]->durezaC);

            $objReturn = (object)['dataarray'=>$dataarray, 'db'=>$db[0], 'razon'=>$db[0]->razon, 'tipo'=>1];

            return response()->json($objReturn);

          }
          else{
            $tipoCosturas = DB::table('tipocostura')->get();
            $aceros = DB::table('tipoacero')->get();
            $tt = DB::table('estadofabricacion')->get();
            $normas = DB::table('normas')->get();

            $objReturn = (object)['db'=>$db[0], 'tipo'=>2, 'tipoCosturas'=>$tipoCosturas, 'tipoaceros'=>$aceros, 'tt'=>$tt, 'normas'=>$normas];
            return response()->json($objReturn);
          }
        }
        return "false";

      }
    }


    function procesarRechazo(Request $request)
    {
      $input = $request->all();

      //dd($input);

      $input['kilos'] = (isset($input['kilos']))?$input['kilos']:0;
      $input['metros'] = (isset($input['metros']))?$input['metros']:0;
      $input['piezas'] = (isset($input['piezas']))?$input['piezas']:0;
      $input['cliente'] = (isset($input['cliente']))?$input['cliente']:null;
      $input['proveedorid'] = (isset($input['proveedorid']))?$input['proveedorid']:null;
      $input['tratamientotermico'] = (isset($input['tratamientotermico']))?$input['tratamientotermico']:null;
      $input['nroorden'] = $input['Norden'];

      $op = DB::select("SELECT v.*
      FROM versionesxorden v
      where v.id=".$input['idVer']."
      ")[0];

      if (!($op->kilogrametro>0))
        $op->kilogrametro = $this->kilogrametro($op->dex, $op->espe);

      $metros = empty($op->metros)?number_format(($op->kilos/$op->kilogrametro), 2):$op->metros;
      $kilos = empty($op->kilos)?number_format(($op->kilogrametro*$op->metros), 2):$op->kilos;
      $op->kilos = $kilos;

      // SI LOS KILOS A RECHAZAR SUPERAN LA CANTIDAD QUE TENIA LA ORDEN SALIMOS
      // SI ES TOTAL , LE HACEMOS RECHAZO TOTAL

      // VERIFICACION DE SI SE CARGARON KILOS O METROS, PARA DESCONTAR
      // AHORA ES SIEMPRE UNO YA QUE SE DESCUENTAN DE PMP RUN

      // VALIDATE = TRUE QUIERE DECIR QUE NO
      if ($input['descontar']==1){
        // $validate = ($op['limk']<$input['kilos'])?false:true;
        $validate = true;
        $concat_qry = "kilos=(kilos-".$input['kilos'].")";

      }
      else{
        $validate = ($op->metros<$input['metros'])?true:false;
        $concat_qry = "metros=(metros-".$input['metros'].")";
      }

      if ((!$validate) or ($input['estadoOP']==8) or ($input['estadoOP']==6))
      {


        //$log_error = (" Estado Rjt - Kgs/Mts Sup");
        return "false1";
      }

      $arrayRj = array('',$input['nroorden'],
      $input['motivo'],
      $input['cliente'],
      $input['piezas'],
      $input['kilos'],
      $input['metros'],
      $this->fechamysql($input['fechaR']),
      $input['nFactura'],
      $input['nRemito'],
      $input['resVentas'],
      $input['resExpedicion'],
      $input['precioMP'],
      1,
      $input['interno'],
      $input['detalle'],
      $input['accion_correctiva'],
      $input['ubicacion'],
      $input['estado_id'],
      $input['forma_id'],
      $input['rubro_id']
      );

      $db = DB::select("INSERT INTO rechazos VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ",$arrayRj);
      $id = DB::getPdo()->lastInsertId();

      $db1 = DB::select("UPDATE preparacionmprun set kilos=kilos-".$input['kilos']." where id=".$input['idPmpRun']);

      if ($input['limk']<=$input['kilos']){
        // RECHAZO TOTAL
        $db2 = DB::select("UPDATE ordenproduccion set estadoid=8 where id=".$op->ordenProduccion);

      }

      // $path = getImageData();
      // if ($path){
      //   $db->setQuery("INSERT INTO bibliotecaMedidas(medidaid, motivoid, detalles, path, tipoobjetoid, objetoid) VALUES((SELECT medidaid FROM cotizaciones where id = (SELECT cotizacionid FROM ordenProduccion WHERE id = ?)), ?, ?, ?, (select id from tipoObjeto where tabla = 'ordenProduccion'), ?)", array($op['ordenProduccion'], $_REQUEST['motivo'], $_REQUEST['detalle'], $path, $op['ordenProduccion']));
      //   $rsp = $db->execute();
      // }

      $ccalidad = array();

      // NO ES INTERNO Y CON CONTROL FINAL REALIZADOand ($_REQUEST['cfid']>0)
      if ($input['interno']<>1 ){
        $db4 = DB::select("SELECT cf.*,c.razon,c.id as idCliente,tc.descripcion as costura,tt.descripcion as tratat,v.kilos,cf.id as idCF,
          cq.*,cdim.*,cm.*,v.ensayoExpansion,v.estenciladoid,v.biselado,v.tipoAcero
          FROM ordenproduccion op
          INNER JOIN versionesxorden v ON (v.ordenProduccion = op.id)
          LEFT JOIN controlfinal cf ON (cf.idVersion = v.id)
          LEFT JOIN clientes c ON (c.id = v.clienteid)
          LEFT JOIN tratamientotermico tt ON (tt.id = v.tratamientoTermico)
          LEFT JOIN medidascotizadas mc ON (mc.id = v.medidaid)

          LEFT JOIN tipocostura tc ON (mc.costuraid = tc.id)
          LEFT JOIN calidadproduccion calp ON (calp.idVersion = v.id)
          LEFT JOIN certificadodimensional cdim ON (cdim.id = calp.certificadoDimensionalid)
          LEFT JOIN certificadoquimico cq ON (cq.id = calp.certificadoQuimicoid)
          LEFT JOIN certificadomecanico cm ON (cm.id = calp.certificadoMecanicoid)
          LEFT JOIN paquetesxcontrol pxc ON (pxc.controlid = cf.id)
          LEFT JOIN controlpaquetes cp ON (cp.id = pxc.controlPaqueteid)
          WHERE op.id=?
          and v.version=
          (SELECT MAX(vxo.version)
          from ordenproduccion op
          INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id)
          WHERE
          vxo.ordenProduccion=v.ordenProduccion
          GROUP BY (vxo.ordenProduccion) )
          order by cf.id desc limit 1
          ",array($input['nroorden']));

        if($db4)
          $ftcha = $db4[0];

        $db5 = DB::select("SELECT cp. * , p.rubroid, p.numeroTrazabilidad, CONCAT_WS('/', p.proveedorid, p.estadoid, p.rubroid, p.formaid ) AS extra
          FROM controlfinal cf
          INNER JOIN paquetesxcontrol pxc ON ( pxc.controlid = cf.id )
          INNER JOIN controlpaquetes cp ON ( cp.id = pxc.controlPaqueteid )
          INNER JOIN paquetes p ON ( p.numeroTrazabilidad = cp.trazabilidad )
          WHERE cf.id = ".$ftcha->idCF." LIMIT 1");

        if (count($db5)>0)
          $icf = $db5[0];

        $dataExt = explode("/",$icf->extra);

        $ccalidad = array("","",$ftcha->diametroExteriorMedido,$ftcha->diametroExteriorMedido,
        $ftcha->espesorMedido ,$ftcha->espesorMedido ,$input['longitudTubos'], $input['longitudTubos'],
            ""  , ""  ,$ftcha->realC  ,$ftcha->realMn  ,$ftcha->realP  ,$ftcha->realS ,
        $ftcha->realSi ,$ftcha->ensayoExpansion ,$ftcha->abocardado,
        $ftcha->dureza ,"" ,$ftcha->tensionRoturaMedido,$ftcha->tensionRoturaMedido,$ftcha->tensionFluenciaMedido  ,$ftcha->tensionFluenciaMedido ,"" ,"" ,
        $ftcha->estenciladoid,"" ,$ftcha->biselado,$ftcha->aplastado ,$ftcha->AlargamientoMedido,$ftcha->AlargamientoMedido,"");
      }
      else{
        // SINO QUIERE DECIR QUE NO PASO POR CONTROL FINAL Y DEBEMOS ASIGNAR LA INFORMACION DE LA MP ORIGINAL
        // EN REALIDAD LEVANTAMOS INFO DE LA TRAZABILIDAD INGRESADA AL REGRESAR LA MP DEL TOUR

        // AHORA QUE PASO EL PMPRUN ESTA CONSULTA SE PUEDE ACORTAR MUCHISIMO
        $db6 = DB::select("SELECT cc.*,CONCAT_WS('/', p.proveedorid, p.estadoid, p.rubroid, p.formaid ) AS extra
            FROM ordenproduccion op
            INNER JOIN versionesxorden v ON (v.ordenProduccion = op.id)
            LEFT JOIN subprocesosestado se ON (se.tipoProceso = 1 and se.ordenProduccion=v.id)
            LEFT JOIN procesosxop pxo ON (pxo.tipoProceso = 1 and pxo.idCP = v.id)
            LEFT JOIN preparacionmprun mpr ON (mpr.id  = se.procesoid)
            LEFT JOIN paquetes p ON (p.numeroTrazabilidad = mpr.trazabilidad)
            LEFT JOIN controlcalidad cc ON (cc.paqueteid = p.id)
            WHERE op.id=? and v.version=
            (SELECT MAX(vxo.version)
            from ordenproduccion op
            INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id)
            WHERE
            vxo.ordenProduccion=v.ordenProduccion
            GROUP BY (vxo.ordenProduccion) )
            order by p.numeroTrazabilidad desc limit 1
            ",array($input['nroorden']));

        if(count($db6)>0){
          $ccalidad[0] = "";
          $ccalidad[1] = "";
          // echo $db->lastQuery();
          //$info['campo'] = 'valor';

          foreach ($db6[0] as $key => $value) {
            if ($key<>"extra" and $key<>"id" and $key<>"paqueteid")
              $ccalidad[] = $value;
          }

          $dataExt = explode("/",$db6[0]->extra);

        }

      }

      //print_r($dataExt);
      $input['diametroexterior'] = $input['dex'];

      $input["espesornominal"] = $input['espe'];

      if (!($input["espesornominal"])>0)
      $input["espesornominal"] = (($input['dex']-$input["din"])/2);


      $input["largomaximo"]  =$input['longitud'];
      $input['largominimo'] = $input['longitud'];
      $input['acero'] = $input['tipoacerosae'];
      $input['costura'] = $input['tipocostura'];
      $input['tratamientot'] = 0;

      $nombreM = $this->nombreMedida($input);

      $db7 = DB::select("INSERT INTO medidas (medida,diametroExterior,espesorNominal,largoMaximo,largoMinimo,tipoCostura,
          tipoAceroSAE,tratamientoTermico,normaid,observaciones,activa)
          VALUES ('".
      $nombreM."','".
      $input["diametroexterior"]."','".
      $input["espesornominal"]."','".
      $input["largomaximo"]."','".
      $input["largominimo"]."','".
      $input["tipocostura"]."','".
      $input["tipoacerosae"]."','".
      $input["tratamientotermico"]."','".
      $input["norma"]."',
          '',
          '1')
          ");

      $idNewMed = DB::getPdo()->lastInsertId();

      //$info[0'extra']  es el proveedor
      // $dataExt[0] es el proveedor, ahora asigno traficaño que es el 37 . VER.

      $provee = ($dataExt[0]>0)?$dataExt[0]:37;


      $params = array("",$provee,$input['nRemito'],'NOW()',$input['nFactura'],$input['paq'],$input['kilos']);
      $db8 = DB::select("INSERT INTO recepcionmateriaprima VALUES
          (?,?,?,?,?,?,?)", $params );

      $materiaPid = DB::getPdo()->lastInsertId();

      $paquetes = json_decode($input['paquetes'])[0];

      $i = 0;

      //dd($paquetes);
      foreach ($paquetes as $key => $value) {
        $j = $i+1;
        $traza = "R".$input['nroorden']."/".$j;
        // FALTA CANTIDAD DE TUBOS Y UBICACION
        $arrayPaq = array("",$materiaPid,$idNewMed,$traza,"","",$dataExt[1],$dataExt[2],$dataExt[3],$provee,$input['precioMP']);

        $db9 = DB::select("INSERT into paquetes VALUES (?,?,?,?,?,?,?,?,?,?,?)",$arrayPaq);

        $idPaq = DB::getPdo()->lastInsertId();
        $ccalidad[1] = $idPaq;

        $bar = implode('', $ccalidad);

        if (!empty($bar)){
          $db10 = DB::select("INSERT INTO controlcalidad VALUES
              (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $ccalidad );// INSERTO
        }

        $date = date("Y-m-d H:i:s");

        // LOS KILOS DEBEN CALCULARSE POR PAQUETE
        /*if (!empty($_REQUEST['paq']))
        $kilosxpaq = ($_REQUEST['kilosp'][$i] / $_REQUEST['paq']);*/
        $kilosxpaq = $value ;
        $array_tipoM = array("",$idPaq,$idNewMed,1,$date,$kilosxpaq,4,$materiaPid); //value es el id de la medida declarado en el foreach inicial
        // EN ESTE CASO EL documentoReferencia es el id insert_id de la RecepecionMateriaMprima

        $db11 = DB::select("INSERT INTO movimientostock  VALUES
            (?,?,?,?,?,?,?,?)", $array_tipoM);

        $db12 = DB::select("INSERT INTO stockmateriaprima  VALUES (?,?)", array($idPaq,$kilosxpaq));


        $this->cargar_precioMP($idNewMed,$dataExt[0],$_REQUEST['precioMP'],false, 1);
        $i++;
      }


      return "true";
    }


    function cargar_precioMP($medida,$prove,$precio,$update=true, $moneda){

      $db = DB::select("SELECT 1 from preciompxproveedor where medidaid=$medida and proveedorid=$prove ");
      
      if (count($db)>0){
        $t=1; //$db->setQuery("UPDATE  precioMPxproveedor SET tipoMoneda=".$_REQUEST['moneda']." ,precioActual='$precio' where medidaid=$medida and proveedorid=$prove ");
      }
      else{
        $db1 = DB::select("INSERT into historicopreciop (precio,porcentaje,medidaid,proveedorid) VALUES ('$precio','',$medida,$prove);");

        $db2 = DB::select("INSERT into  preciompxproveedor VALUES ($medida,$prove,'$precio','$precio',".$moneda.");");
        $t = 0;

      }


      return $t;
    }

    public function procesarRechazoPOST(Request $request)
    {
      $input = $request->all();

      $coti = 0;

      $versionid = null;

      if(isset($input['nro'])){
        $db = DB::select("UPDATE rechazos set estadoRechazo=? where id=?",array($input['opt'],$input['rjt']));

        if($input['opt']==3){
          return "true";
        }
        else{
          $db1 = DB::select("SELECT vxo.*,op.cotizacionid,vxo.id as idver,mp.medidaid,r.*
                             from rechazos r
                             INNER JOIN ordenproduccion op ON (op.id = r.ordenProduccion)
                             INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id)
                             LEFT JOIN subprocesosestado se ON (se.tipoProceso=1 and se.ordenProduccion=vxo.id)
                             LEFT JOIN preparacionmp mp ON (mp.id = se.idplan)
                             where op.id= ?
                             and vxo.version=
                            (SELECT MAX(vxo2.version)
                            from ordenproduccion op
                            INNER JOIN versionesxorden vxo2 ON (vxo2.ordenProduccion = op.id)
                            where 
                            vxo2.ordenProduccion=vxo.ordenProduccion
                            GROUP BY (vxo.ordenProduccion) )
                            and r.id=?
                             ",array($input['nro'],$input['rjt']));


          if(count($db1)){
            $dt = $db1[0];
            $coti = $dt->cotizacionid;
            $db2 = DB::select("INSERT into ordenproduccion VALUES (?,?,?,?)",array('',$dt->cotizacionid,2,$input['nro']));

            $newO = DB::getPdo()->lastInsertId();

            $datavxo = [];

            foreach ($dt as $k => $vals){
                 $datavxo[] = $vals;
                 
            }


            //ESTOS COMENTADOS SON PIEZAS Y METROS; EN RECHAZOS PASO SOLO LOS KILOS
            //DE TODAS MANERAS SE PUEDEN AGREGAR
            //           $datavxo[15] = $dt[47];
            //                 $datavxo[16] = $dt[45];
            $datavxo[0]= "";
            $datavxo[1]= $newO;
            $datavxo[2] = 0;
            $datavxo[3] = 1;
            $datavxo[4] = 2;
            $datavxo[14] = $dt->kilosR;

            $datavxo[17] = 0;
            $datavxo[18] =   date("Y-m-d");
            $arraver = array_slice($datavxo, 0, 37);
            $arraver[] = "";

            $exversion = DB::select("INSERT INTO versionesxorden VALUES
                                        (?,?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?,?,?,?)",$arraver);


            if(count($exversion)==0){
               $versionid = DB::getPdo()->lastInsertId();
               //$db3 = DB::select("INSERT INTO preparacionmp values (?,?,?,?,?)", array('',$dt->medidaid,$dt->precioMP,'',''));

               $idmp = DB::table('preparacionmp')->insertGetId([
                'medidaid'=>$dt->medidaid,
                'precio'=>$dt->precioMP,
               ]);

               $db3 = DB::select("INSERT INTO procesosxop values (?,?,?)",array($versionid,1,$idmp));

               $db4 = DB::select("INSERT INTO ordenprocesoop values (?,?)",array($versionid,"1*$idmp"));

               $db5 = DB::select("INSERT into preparacionmprun (id,estadoid,idplan) values (?,?,?) ",array('',1,$idmp));

              if(count($db5)==0){
                $idrun = DB::getPdo()->lastInsertId();

                $db6 = DB::select("INSERT into subprocesosestado values (?,?,?,?,?,?)
                            ",array($idrun,1,1,$versionid,$idmp,1));
              }
            }
          }
        }
      }
      return $versionid;
    }

    public function oprechazo(Request $request, $id)
    {
      $input = $request->all();

      $row = null;

      if ($input['accion']=='M'){
           $db = DB::select("SELECT op.estadoid as est,vxo.*,vxo.id as idverop,vxo.critico as critico,op.cotizacionid as idCoti, m.*,m.id as medid,
                                        est.largoMaximo as largomaxest,est.largoMinimo as largominest,est.id as ideste,
                                        est.normaid as tiponormaest,est.tipoCostura as  tipocosturaest,
                                        est.observaciones as observaeste,est.medida as med,est.numeroColada as coladaest,
                                        tmon.descripcion as moneda,cvt.descripcion as condicionvta,
                                         pc.precioMetro,pc.precioKilo,pc.precioPieza,c.pesosx45 ,c.precioxContribucion,c.precioPasado,
                                         op.ordenReferencia
                                        FROM ordenproduccion op
                                        INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id)
                                        LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid)
                                        LEFT JOIN estencilado est ON (est.id = vxo.estenciladoid)
                                        LEFT JOIN cotizaciones c ON (c.id = op.cotizacionid)
                                         LEFT JOIN  condicionventa cvt ON (cvt.id = c.condicionVenta)
                                        LEFT JOIN monedas tmon ON (tmon.id = c.tipoMoneda)
                                        LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=(SELECT MAX(fecha) from preciocotizaciones where cotizacionid=c.id))
                                        where vxo.id=? LIMIT 1
                                            ",array($id));
            $row = $db[0];
          
      }

      $accion = $input['accion'];
      $orderNew = 0;
      $NRO_ORDEN = $row->ordenProduccion;

      $estadosop = DB::table('estadosop')->get();
      $clientes = DB::table('clientes')->get();
      $tiporeventa = DB::table('reventa')->get();
      $formas = DB::table('formas')->get();
      $tratamientos = DB::table('estadofabricacion')->get();
      $costuras = DB::table('tipocostura')->get();
      $normas = DB::table('normas')->get();
      $selLugar = "SELECT id,CONCAT(direccion,' - ',contacto) as dire from direccionesclientes where clienteid=".$row->clienteid;

      $lugares = DB::select($selLugar);
      $usos = DB::table('usofinal')->get();
      $embalajes = DB::table('embalajes')->get();
      $aceros = DB::table('tipoacero')->get();
      $certificados = DB::table('certificado')->get();

      $versionid = $row->idverop;

      $row = json_encode($db[0]);

      $resultado = DB::select("SELECT op.estadoid as est,op.id   from ordenproduccion op
                    INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id)
                    where vxo.id=".$id)[0];


      //dd($row);

      return view('produccion.oprechazo', compact('accion', 'orderNew', 'NRO_ORDEN', 'estadosop', 'row', 'clientes', 'tiporeventa', 'formas', 'tratamientos', 'costuras', 'normas', 'selLugar', 'lugares', 'usos', 'embalajes', 'aceros', 'aceros', 'certificados', 'versionid', 'resultado', 'id'));
    }
}
