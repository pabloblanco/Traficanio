<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 500);

use Illuminate\Http\Request;
use DB;

class ProcesoController extends Controller
{
    public function copiar(Request $request)
    {
        $input = $request->all();
        $idpadre = $input['cotpadre'];
        $idhijo = $input['cothijo']; 
        $tipo = $input['co'];
        if ($idpadre){
            $cons = "DELETE from ordenprocesocotizacion where idCotizacion=$idhijo";
            $cons2 = "DELETE from procesosxcp where idCP=$idhijo";   
            if ($tipo == 0){ //es una orden de produccion
                $cons = "DELETE from ordenprocesoop where idOrdenProduccion=$idhijo";
                $cons2 = "DELETE from procesosxop where idCP=$idhijo";
                $cons3 = "DELETE FROM subprocesosestado where ordenProduccion=$idhijo";
                $sql1 = DB::select($cons3);
            }    

            $sql2 = DB::select($cons2);
            $sql = DB::select($cons);

            if ($tipo == 0){
                $proceso = $this->procesoCopiado($idpadre, $idhijo, 1, false, false, 1, 1);
                return $proceso;
            }
            else {
                $proceso = $this->procesoCopiado($idpadre, $idhijo, null, null, null, null,  null);
                return $proceso;

            }

        }
    }

    public function resumenProceso($id)
    {
        $db = DB::table('procesosxcp')->where('idCP', '=', $id)->whereIn('tipoProceso', [2, 3, 5])->select('procesoid as idp', 'tipoProceso as tp')->get();
        
        $arrayproc = [];
        if (count($db)>0){
            $rw = DB::table('ordenprocesocotizacion')->where('idCotizacion', '=', $id)->first();
            // dd($rw);
            $arrayorden = explode(",",$rw->orden);
            foreach ($arrayorden as $sinast){
                $dit = explode("*",$sinast);
                $arrayproc[] = $dit[0];
            }
            $procscant = array_count_values($arrayproc);
        }

        $horno = 0;
        $batea = 0;
        $trefila = 0;
        if(isset($procscant['2'])){
            $horno = $procscant['2'];
        }
        if(isset($procscant['3'])){
            $batea = $procscant['3'];
        }

        if(isset($procscant['5'])){
            $trefila = $procscant['5'];
        }

        $obj = (object)['horno'=>$horno, 'batea'=>$batea, 'trefila'=> $trefila];
        
        return response()->json($obj);
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

    public function probando($id)
    {
        $this->insertarTiempoProceso(20091, 1618.99, 5, '2018-12-10', 33182, 3);

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

    
    public function buscarmedidaproceso(Request $request)
    {
        $input = $request->all();
        $id = $input['idcot'];
        $q0= "";
        $q0 .= (empty($input['clienteb']))? "" : " AND c.razon LIKE '%".$input['clienteb']."%'";
        $q0 .= (empty($input['codigoclienteb']))? "" : " AND c.codigo LIKE '% ".$input['codigoclienteb']."%'";
        $q0 .= (empty($input['fechad']))? "" : " AND p.fechaPrometida>='".$input['fechad']."'";
        $q0 .= (empty($input['fechah']))? "" : " AND p.fechaPrometida<='".$input['fechah']."'";
        $q0 .= (empty($input['diametroextdesdeb']))? "" : " AND mc.diametroExteriorNominal >=".$input['diametroextdesdeb']."";
        $q0 .= (empty($input['diametroexthastab']))? "" : " AND mc.diametroExteriorNominal <=".$input['diametroexthastab']."";
        $q0 .= (empty($input['diametroextmindesdeb']))? "" : " AND mc.diametroExteriorMinimo >=".$input['diametroextmindesdeb']."";
        $q0 .= (empty($input['diametroextminhastab']))? "" : " AND mc.diametroExteriorMinimo <=".$input['diametroextminhastab']."";
        $q0 .= (empty($input['diametroextmaxdesdeb']))? "" : " AND mc.diametroExteriorMaximo >=".$input['diametroextmaxdesdeb']."";
        $q0 .= (empty($input['diametroextmaxhastab']))? "" : " AND mc.diametroExteriorMaximo <=".$input['diametroextmaxhastab']."";
        $q0 .= (empty($input['diametrointminb']))? "" : " AND mc.diametroInteriorNominal >=".$input['diametrointminb']."";
        $q0 .= (empty($input['diametrointmaxb']))? "" : " AND mc.diametroInteriorNominal <=".$input['diametrointmaxb']."";
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
        $q0 .= (empty($input['codigomaterialb']))? "" : " AND co.codigoPieza='".$input['codigomaterialb']."'";
        $q0 .= (empty($input['largomaxb']))? "" : " AND mc.largoMaximo <".$input['largomaxb']."";
        $q0 .= (empty($input['largominb']))? "" : " AND mc.largoMinimo >".$input['largominb']."";
        $q0 .= (empty($input['tipoaceroidb']))? "" : " AND co.tipoAcero=".$input['tipoaceroidb']."";
        $q0 .= (empty($input['tipocosturaidb']))? "" : " AND mc.costuraid=".$input['tipocosturaidb']."";
        $q0 .= (empty($input['normaidb']))? "" : " AND mc.normaid=".$input['normaidb']."";
        $q0 .= (empty($input['numerob']))? "" : " AND co.id=".$input['numerob']."";
        $q0 .= (empty($input['tipoordenidb']))? "" : " AND co.tipoReventa=".$input['tipoordenidb']."";
        $q0 .= (empty($input['tratamiendoidb']))? "" : " AND co.tratamientoTermico=".$input['tratamiendoidb']."";
        $q0 .= (empty($input['usoidb']))? "" : " AND co.uso=".$input['usoidb']."";
        $q0 .= (empty($input['kilosdesdeb']))? "" : " AND co.kilos >=".$input['kilosdesdeb']."";
        $q0 .= (empty($input['kiloshastab']))? "" : " AND co.kilos <=".$input['kiloshastab']."";

        $sql = 'SELECT '.
               "mc.medida,co.id as idco ".
               "FROM cotizaciones co ".
               "LEFT JOIN medidascotizadas mc ON (mc.id = co.medidaid) ".
               "LEFT JOIN clientes c ON (c.id = co.clienteid) ".
               "LEFT JOIN estadocotizacion ec ON (ec.id = co.estadoid) ".
               "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = co.id and pxcp.tipoProceso=1 ) ".
               "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
               "LEFT JOIN medidas medor ON (medor.id = pmp.medidaid) ".
               "LEFT JOIN usofinal uf  ON (uf.id = co.uso) ".
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = co.id and ".
               "pc.fecha = (SELECT max(fecha) from preciocotizaciones where cotizacionid=co.id)) ".
               "LEFT JOIN tratamientocotizacion tt ON (tt.id = co.tratamientoTermico) ".
               "WHERE 1=1 $q0 GROUP BY co.id order by co.id desc ;";

        $results = DB::select($sql);

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

        $arrayCotizaciones = [];
        if ($results != []){
            foreach ($results as $co ) {
                $pro = DB::table('ordenprocesocotizacion')->where('idcotizacion', '=', $co->idco)->get();

                if ($pro != []){
                    foreach ($pro as $pr) {
                        $array_proc = explode(",", $pr->orden);
                        $parser = array();
                        $cadena = array();

                        foreach ($array_proc as $valt){

                            $parser = explode("*",$valt);
                            $val = $parser[0];
                            $cadena[] = $namesProc[$val];
                            
                        }
                        $data =  implode(" - ",$cadena);
                        $arrayCotizaciones[] = (object)['medida'=>$co->medida, 'idco'=>$co->idco, 'procesos'=>$data];             
                        
                    }

                }

            }
        }

        return response()->json(['id'=>$id,'resultado'=>$arrayCotizaciones]);

    }

    public function procesos(Request $request, $id)
    {
        $listprocesos = [];

        $sql = 'SELECT * '.
               "from ordenprocesocotizacion where idCotizacion=$id ;";
               
        $results = DB::select($sql);

         $tablesProc = array('preparacionmp',
         'horno'
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

        $procesosejecutados = [];
        $arrayprocGuardados = [];
        $selector = [];
        $nuevo = 0;
        $procesosSel = [];
        $datapp = [];

        if (count($results) <1){
            $msql = "SELECT id,descripcion from procesos ;";
            $nuevo = 1;
            $resm = DB::select($msql);
            foreach ($resm as $r) {
                $datapp[] = $r;
                # code...
            }
        }else{
            $nuevo = 0;
            $rw = $results[0];
            $array_proc = explode(",",$rw->orden);

            //dd($array_proc);

            foreach ($array_proc as $valt){
                $verifi = strpos($valt, '-');
                if($verifi!==0){
                    $parser = explode("*",$valt);
                    $val = $parser[0];
                    $arrayprocGuardados[] = $val;
                    $idprocparticular = $parser[1];
                    $and = "";
                   
                    if ($parser[1]<>0 && strlen($parser[1]) !== 2)
                        $and = " and pr$val.id=$parser[1] "; //pr3.id=04
                    
                    $ix = $val-1;


                    $db = 'SELECT '.
                          "$parser[1] as data,p.id,p.descripcion,pr$val.id as idprocp ".
                          "from procesos p ".
                          "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = ".$id." and ".
                          "pxcp.tipoProceso=$val) ".
                          "LEFT JOIN $tablesProc[$ix] pr$val ON (pr$val.id = pxcp.procesoid) ".
                          "where p.id=$val $and ;";

                    $res = DB::select($db);

                    // echo '<pre>';
                    // print_r($db);
                    // echo '</pre>';
                    if (count($res)>0){
                        $datapp[] = $res[0];
                    }                    
                }
            }
        }
        if (count($datapp)>0){
            $i  = 0;
            if (is_array($datapp)){
                
                foreach ($datapp as $rowpr){
                    $desc = str_replace("á","a",$rowpr->descripcion);
                    $desc = str_replace("ó","o",$desc);
                    $link= preg_replace('[\s+]','', ucfirst(strtolower($desc)));
                    if (isset($rowpr->idprocp)){
                        $idpropio = ($rowpr->idprocp>0)?$rowpr->idprocp:0;                    
                        if ($rowpr->data==0 or empty($rowpr->data))
                            $idpropio=0;
                    }
                    else{
                        $idpropio = 0;
                    }

                    $listprocesos[] = (object)['idpropio'=>$idpropio, 'tipoproceso'=>$rowpr->id, 'descripcion'=>$rowpr->descripcion];
                }
            }
        }

        $ejecutandose = json_encode($listprocesos); //Elemento a Enviar a la vista

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
                $db1 = 'SELECT '.
                       "id,descripcion FROM procesos  WHERE id IN ($procSel) ".
                       "order by descripcion asc ;";

                $res1 = DB::select($db1);

                if (count($res1)>0){
                    foreach ($res1 as $rowSel) {
                        $selector[] = (object)['id'=>$rowSel->id, 'des'=>$rowSel->descripcion];
                    }
                }                
            }

        }
        $selectores = json_encode($selector);

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
        return view('procesos.proceso', compact('id', 'ejecutandose', 'selectores', 'tipobateas', 'tipopuntas', 'tipomatpuntas', 'tipoenderezados', 'tipocorte', 'tipocosturas', 'normas', 'tipoempaquetados', 'tipoentregas', 'transportes', 'tipohornos', 'tiporubros', 'certificados'));
        
    }

    public function buscar_proceso(Request $request, $id, $type)
    {
        $tipoaceros = DB::table('tipoacero')->get();
        $tipocostura = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $normas = DB::table('normas')->get();
        $tipoorden =  DB::table("reventa")->get();
        $usos =  DB::table("usofinal")->get();

        return view('procesos.busca_procesos', compact('tipoaceros', 'tipocostura', 'tratamientos', 'normas', 'tipoorden', 'usos', 'id', 'type'));
        
    }

    public function copiarprocesocot(Request $request, $id)
    {
        dd($id);
    }

    public function vercotind(Request $request, $id)
    {
        $sql = 'SELECT '.
               "hor.id as horid,bat.id as batid,tre.id as idtre,pmp.precio as precioMP, c.tipoReventa as reventaid, ".
               "m.*,c.*,c.formaid as formid,m.id as medid,est.largoMaximo as largomaxest,est.largoMinimo as largominest, ".
               "est.id as ideste, est.normaid as tiponormaest,ta.descripcion as tacero,est.tipoCostura as tipocosturaest, ".
               "est.observaciones as observaeste,est.medida as med, est.numeroColada as numeroColada, cl.razon, ".
               "cl.codigo,tr.descripcion as descreventa, tc.descripcion as descostura, n.descripcion as desnorma, ".
               "f.descripcion as desforma, uf.descripcion as desusofinal, e.descripcion as desembalaje, ".
               "ec.descripcion as estcot,tcest.descripcion as costuraidest,nest.descripcion as normaidest, ".
               "IF (c.urgente=1, 'SI', 'NO') as urgencia,IF (c.biselado=1,'SI','NO') as bise,tmon.descripcion as moneda, ".
               "IF (c.aplastado=1,'SI','NO') as aplas,IF (c.pestaniado=1,'SI','NO') as pesta, ".
               "pc.precioKilo,pc.precioPieza,pc.precioMetro, cv.descripcion as condicionvta,tt.descripcion as desctt, ".
               "tt.detalle as detallett, dir.direccion as Lentrega ".
               "FROM  cotizaciones c ".
               "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
               "LEFT JOIN estencilado est ON (est.id = c.estenciladoid) ".
               "LEFT JOIN clientes cl ON (cl.id = c.clienteid) ".
               "LEFT JOIN direccionesclientes dir ON (dir.id = c.lugarEntrega) ".//
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
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=(SELECT MAX(fecha) ".
               "from preciocotizaciones where cotizacionid=$id)) ".
               "where c.id=$id LIMIT 1 ;";

        $res = DB::select($sql);
        //dd($res);
        $hiddens = [];
        $row = null;
        $infocotiza = "";
        $fecha = "";
        $fechae = "";
        $kilos = "";
        $metros = "";
        $le = "";
        $pmetro = "";
        $pkilo = "";
        $kgm = "";
        $precioPasado = "";
        $precioMP = "";
        $precioCtr = "";
        $arrayprocGuardados = [];

        if (count($res)>0){
            $row = $res[0];
            $mems  = explode(",",$row->mem);
            $mem1 = $mems[0];
            $mem2 = $mems[1];

            $infocotiza = (!empty($row->id)?"Nº ".$row->id:"");
            $fecha = (!empty($row->fecha)?$this->fechaphp($row->fecha):"");
            $fechae = (!empty($row->fechaEntrega)?$this->fechaphp($row->fechaEntrega):"");

            if (empty($row->kilos))
            {
                $kilos = round($row->metros*$row->kilogrametro,2);
                $metros = $row->metros;
            }
            else
            {
                if ($row->kilogrametro > 0)
                {
                    $metros = round($row->kilos/$row->kilogrametro,2);
                }                   
                $kilos = $row->kilos;

            }
            $le = ($row->lugarEntrega>0?$row->Lentrega:'');

            $kgm = ($row->kilogrametro==0?1:$row->kilogrametro);

            if (empty($row->precioMetro)){
                
                $pmetro = round($row->precioKilo * $kgm,2);
                $pkilo = $row->precioKilo;
            }
            else{
                $pkilo = round($row->precioMetro / $kgm,2);
                $pmetro = $row->precioMetro;
            }

            $preciomateriaprima = ($row->precioMP!==null?$row->precioMP:0);
            $precioPasado = $this->precP($row->precioPasado);
            $precioMP = $this->preciox45($row->precioMP);
            $precioCtr = $this->precioContri($preciomateriaprima,$row->id,$row->kilogrametro);

            $hiddens[] = [$mem1, $mem2];
        }

        ///PROCESOS///
        $DBprocesos = DB::table('ordenprocesocotizacion')->where('idCotizacion', '=', $id)->get();

         $archProc = array('PreparacionMP',
         'Horno'
        , 'Batea'
        , 'Punta'
        , 'Trefila'
        , 'Enderezadora'
        , 'Corte'
        , 'Eddycurrent'
        , 'Prueba Hidraulica'
        , 'Estencilado'
        , 'Empaquetado'
        , 'Control Final'
        , 'Entrega'
        , 'Servicio'
        , 'Certificado');

        if (count($DBprocesos)<1){
            $procesoscoti = null;
        }
        else{
            $rw = $DBprocesos[0];
            $array_proc = explode(",",$rw->orden);
            $refid= $id;
            $nroP = 0;


            foreach ($array_proc as $valt){
                //$val = substr($valt, 0, strpos($valt,"*"));
                
                $parser = explode("*",$valt);
                $val = $parser[0];
                $idprocparticular = $parser[1];                
                $arrayprocGuardados[] = (object)['tipo'=>$val, 'id'=>$idprocparticular];

                $nroP++;
            }
            $procesoscoti = json_encode($arrayprocGuardados);
        }


        $normas = json_encode(DB::table('normas')->get());
        $tipohornos = json_encode(DB::table('tipohorno')->get());
        $tipocosturas = json_encode(DB::table('tipocostura')->get());
        $transportes = json_encode(DB::table('transportes')->get());

        $db3 = 'SELECT '.
              "id,CONCAT(numero,' DN:',diametroNominal,' ANG:',ang,' E: ',entrada,' ZONA:' ,altZonaUtil,' Dm:',diametroMatriz,' ALTO:',altoMatriz) as descripcion FROM matrizsimacero ;";

        $matrizsimacero = json_encode(DB::select($db3));

        $db4 = 'SELECT '.
              "id,CONCAT(diametro,'  ANG',ang,'  DE',de,'  DN',dn,'  HN',hn,'  DC',dc,'  HC',hc) as descripcion FROM matrizsimwidia ;";

        $matrizsimwidia = json_encode(DB::select($db4));

        $db2 = 'SELECT '.
              "id,CONCAT(caja,'  N1:',nucleo1,' N2:',nucleo2) as descripcion FROM matrizdoble ;";

        $matrizdoble = json_encode(DB::select($db2));

        $db5 = 'SELECT '.
              "tml.id,tml.diametroExterior as descripcion ,p.espesor FROM matriztl tml ".
              "LEFT JOIN punzones p ON (p.id = tml.punzonid) where tml.tipoMatriz=3; ";

        $matriztribular = json_encode(DB::select($db5));

        $db6 = 'SELECT '.
              "tml.id,tml.diametroExterior as descripcion ,p.espesor FROM matriztl tml ".
              "LEFT JOIN punzones p ON (p.id = tml.punzonid) where tml.tipoMatriz=4; ";

        $matrizlimon = json_encode(DB::select($db6));

        $db7 = 'SELECT '.
               "id,CONCAT('N ',numero,'  dE ',diametroEntrada,'  Rod:',medidaRodillo) as descripcion FROM cabezaturco ;";

        $cabezaturco = json_encode(DB::select($db7));

        $tiporechazos = DB::table('tiporechazo')->get();

        return view('cotizacion.vercoti', compact('row', 'pmetro', 'precioPasado', 'pkilo', 'kgm', 'fecha', 'fechae', 'kilos', 'metros', 'le', 'infocotiza', 'hiddens', 'id', 'precioMP', 'precioCtr', 'procesoscoti', 'normas', 'tipohornos', 'tipocosturas', 'transportes', 'matrizsimacero', 'matrizsimwidia', 'matrizdoble', 'matriztribular', 'matrizlimon', 'cabezaturco', 'tiporechazos'));

    }

    public function fechaphp($fecha){
      list($dia, $mes, $anio) = explode('-', $fecha);       
      $date = $anio."/".$mes."/".$dia;

      return $date;
    }

    public function precP($char){
        if ($char=='k')
            return "KILOS";
        if ($char=='m')
            return 'METROS';
        if ($char=='p')
            return 'PIEZAS';
    }

    public function precioContri($precioMP,$idcot,$kgmtro){

        $sql = 'SELECT '.
               "procesoid as idp,tipoProceso as tp from procesosxcp ".
                "where idCP=$idcot and tipoProceso IN (2,3,5) ;";

        $exec = DB::select($sql);
        if (!count($exec)>0){

            $data = $precioMP*1.5;

        }
        else {

            $sql = 'SELECT '.
                   "orden from ordenprocesocotizacion where idCotizacion=$idcot ;";
            $ej = DB::select($sql);

            if (count($ej)>0){
                $rw = $ej[0];
                $arrayorden = explode(",",$rw->orden);
                foreach ($arrayorden as $sinast){
                    $dit = explode("*",$sinast);
                    $arrayproc[] = $dit[0];

                }



                $vecprocesos = array_count_values($arrayproc);
                $pr3 = array_key_exists('3', $vecprocesos);
                $pr5 = array_key_exists('5', $vecprocesos);
                $pr2 = array_key_exists('2', $vecprocesos);
                $pro3 = ($pr3?$vecprocesos[3]:0);
                $pro5 = ($pr5?$vecprocesos[5]:0);
                $pro2 = ($pr2?$vecprocesos[2]:0);

                if ($kgmtro<1.5){

                    $data = $kgmtro*(-1.25)+1.875+0.95+($pro3/4)+($pro5*0.3)+($pro2/5)+$precioMP;

                }
                else{
                    $data = (-1.25)+1.875+0.95+($pro3/4)+($pro5*0.3)+($pro2/5)+$precioMP;                    
                }
            }
            $data = 0;
        }
        return $data;
    }

    public function preciox45($val){
        return number_format(100*$val/45, 2);
    }

    public function preparacionmp(Request $request, $id)
    {
        $type = $request->get('type');
        $input = $request->all();
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 1)->first();
        $procesoStatus = false;
        $preparacionmpObj = null;
        if ($proceso){
            $procesoStatus = true;
            $preparacionmpObj = DB::table('preparacionmp')->where('id', '=', $proceso->procesoid)->first();

        }
        if ($type){
            if($procesoStatus == false){
                $insert = DB::table('preparacionmp')->insertGetId([
                    'medidaid' => $request->get('medidab'),
                    'precio' => $request->get('preciob'),
                    'observaciones' => $request->get('observacionesb')
                    //'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 1,
                    'procesoid' => $insert
                ]);

            }
            else{
                $update = DB::table('preparacionmp')->where('id', '=', $preparacionmpObj->id)->update([
                    'medidaid' => $request->get('medidab'),
                    'precio' => $request->get('preciob'),
                    'observaciones' => $request->get('observacionesb')
                ]);
            }

        }

        $tipoaceros = DB::table('tipoacero')->get();
        $tipocostura = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $normas = DB::table('normas')->get();
        return view('procesos.preparacionmp', compact('tipoaceros', 'tipocostura', 'tratamientos', 'normas', 'id', 'preparacionmpObj'));
        
    } 

    public function buscarmedidapreparacionmp(Request $request)
    {
        $input = $request->all();
        $q0 = "";
        $q0 .= (empty($input['diametroextdesde']))? "" : " AND m.diametroExterior>=".$input['diametroextdesde']."";
        $q0 .= (empty($input['diametroexthasta']))? "" : " AND m.diametroExterior<=".$input['diametroexthasta']."";
        $q0 .= (empty($input['espesordesde']))? "" : " AND m.espesorNominal>=".$input['espesordesde']."";
        $q0 .= (empty($input['espesorhasta']))? "" : " AND m.espesorNominal<=".$input['espesorhasta']."";
        $q0 .= (empty($input['largomaxdesde']))? "" : " AND m.largoMaximo>=".$input['largomaxdesde']."";
        $q0 .= (empty($input['largomaxhasta']))? "" : " AND m.largoMaximo<=".$input['largomaxhasta']."";
        $q0 .= (empty($input['largomaxdesde']))? "" : " AND m.largoMinimo>=".$input['largomaxdesde']."";
        $q0 .= (empty($input['largomaxhasta']))? "" : " AND m.largoMinimo<=".$input['largomaxhasta']."";
        $q0 .= (empty($input['tipoaceroid']))? "" : " AND tipoAceroSAE=".$input['tipoaceroid']."";
        $q0 .= (empty($input['tipocosturaid']))? "" : " AND tipoCostura=".$input['tipocosturaid']."";
        $q0 .= (empty($input['tratamientoid']))? "" : " AND tratamientoTermico=".$input['tratamientoid']."";
        $q0 .= (empty($input['normaid']))? "" : " AND normaid=".$input['normaid']."";

        $kgm = $this->kilogrametro(($input['dec']), ($input['espc']));


        dd($q0);
    }

    public function empaquetado(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 11)->first();
        $procesoStatus = false;
        $empaquetadoObj = null;
        if ($proceso){
            $procesoStatus = true;
            $empaquetadoObj = DB::table('empaquetado')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $insert = DB::table('empaquetado')->insertGetId([
                    'tipoEmpaquetadoid' => $request->get('tipoid'),
                    'tubosxPaquete' => $request->get('tubos'),
                    'kilosxPaquete' => $request->get('kilos'),
                    'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 11,
                    'procesoid' => $insert
                ]);
            }
            else{
                $update = DB::table('empaquetado')->where('id', '=', $empaquetadoObj->id)->update([
                    'tipoEmpaquetadoid' => $request->get('tipoid'),
                    'tubosxPaquete' => $request->get('tubos'),
                    'kilosxPaquete' => $request->get('kilos'),
                    'observaciones' => $request->get('obser')
                ]);

            }


        }

        $tipoempaquetados = DB::table('tipoempaquetado')->get();        
        return view('procesos.empaquetado', compact('tipoempaquetados', 'id', 'empaquetadoObj'));
        
    }

    public function entrega(Request $request)
    {

        $tipoentregas = DB::table('tipoentrega')->get();
        
        return view('procesos.entrega', compact('tipoentregas'));
        
    }

    public function certificado(Request $request, $id)
    {
        
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 15)->first();
        $procesoStatus = false;
        $certificadoObj = null;
        if ($proceso){
            $procesoStatus = true;
            $certificadoObj = DB::table('procesocertificado')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $insert = DB::table('procesocertificado')->insertGetId([
                    'certificadoid' => $request->get('tipoid'),
                    'observaciones' => $request->get('obser'),
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 15,
                    'procesoid' => $insert
                ]);
            }
            else{
                //dd("actualizando");
                $update = DB::table('procesocertificado')->where('id', '=', $certificadoObj->id)->update([
                    'certificadoid' => $request->get('tipoid'),
                    'observaciones' => $request->get('obser'),
                ]);

            }


        }


        $certificados = DB::table('certificado')->get();
        
        return view('procesos.certificados', compact('certificados', 'id', 'certificadoObj'));
        
    }

    public function horno(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 2)->first();
        $procesoStatus = false;
        $hornoObj = null;
        if ($proceso){
            $procesoStatus = true;
            $hornoObj = DB::table('horno')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $hornoinsert = DB::table('horno')->insertGetId([
                    'tipoHornoid' => $request->get('tipohornoid'),
                    'carga' => $request->get('carga'),
                    'durezaMinima' => $request->get('durezamin'),
                    'durezaMaxima' => $request->get('durezamax'),
                    'temperatura' => $request->get('temp'),
                    'velocidad' => $request->get('velocidad'),
                    'tubosxCamilla' => $request->get('tubos'),
                    'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 2,
                    'procesoid' => $hornoinsert
                ]);
            }
            else{
                //dd("actualizando");
                $hornoupdate = DB::table('horno')->where('id', '=', $hornoObj->id)->update([
                    'tipoHornoid' => $request->get('tipohornoid'),
                    'carga' => $request->get('carga'),
                    'durezaMinima' => $request->get('durezamin'),
                    'durezaMaxima' => $request->get('durezamax'),
                    'temperatura' => $request->get('temp'),
                    'velocidad' => $request->get('velocidad'),
                    'tubosxCamilla' => $request->get('tubos'),
                    'observaciones' => $request->get('obser')
                ]);

            }


        }


        $tipos = DB::table('tipohorno')->get();
        
        return view('procesos.horno', compact('tipos', 'id', 'hornoObj'));
        
    }

    public function corte(Request $request, $id)
    {

        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 7)->first();
        $procesoStatus = false;
        $corteObj = null;
        if ($proceso){
            $procesoStatus = true;
            $corteObj = DB::table('corte')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $corteInsert = DB::table('corte')->insertGetId([
                    'cortePunta' => $request->has('cortep'),
                    'tipoCorteid' => $request->get('tipocorteid'),
                    'elemento' => $request->get('elemento'),
                    'resto' => $request->get('resto'),
                    'observaciones' => $request->get('obser'),
                    'cortes' => $request->get('cantidad')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 7,
                    'procesoid' => $corteInsert
                ]);
            }
            else{
                $corteupdate = DB::table('corte')->where('id', '=', $corteObj->id)->update([
                    'cortePunta' => $request->has('cortep'),
                    'tipoCorteid' => $request->get('tipocorteid'),
                    'elemento' => $request->get('elemento'),
                    'resto' => $request->get('resto'),
                    'observaciones' => $request->get('obser'),
                    'cortes' => $request->get('cantidad')
                ]);

            }


        }

        $tipos = DB::table('tipocorte')->get();
        
        return view('procesos.corte', compact('tipos', 'id', 'corteObj'));
        
    }

    public function enderezadora(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 6)->first();
        if ($proceso->procesoid == 0){
            $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 6)->delete();        
        }
        $procesoStatus = false;
        $enderezadoObj = null;
        if ($proceso){
            $procesoStatus = true;
            $enderezadoObj = DB::table('enderezadora')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $enderezadoInsert = DB::table('enderezadora')->insertGetId([
                    'tipo' => $request->get('tipo'),
                    'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 6,
                    'procesoid' => $enderezadoInsert
                ]);
            }
            else{
                $enderezadoupdate = DB::table('enderezadora')->where('id', '=', $enderezadoObj->id)->update([
                    'tipo' => $request->get('tipo'),
                    'observaciones' => $request->get('obser')
                ]);

            }


        }

        $tipos = DB::table('tipoenderezado')->get();
        
        return view('procesos.enderezadora', compact('tipos', 'enderezadoObj', 'id'));
        
    }

    public function servicio(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 14)->first();
        $procesoStatus = false;
        $servicioObj = null;
        if ($proceso){
            $procesoStatus = true;
            $servicioObj = DB::table('servicio')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $Insert = DB::table('servicio')->insertGetId([
                    'tipoCentroid' => $request->get('tipoid'),
                    'precio' => $request->get('precio'),
                    'lugarEntrega' => $request->get('lugar'),
                    'proveedor' => $request->get('proveedor'),
                    'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 14,
                    'procesoid' => $Insert
                ]);
            }
            else{
                $update = DB::table('servicio')->where('id', '=', $servicioObj->id)->update([
                    'tipoCentroid' => $request->get('tipoid'),
                    'precio' => $request->get('precio'),
                    'lugarEntrega' => $request->get('lugar'),
                    'proveedor' => $request->get('proveedor'),
                    'observaciones' => $request->get('obser')
                ]);

            }


        }

        $tipos = DB::table('tipocentro')->get();
        
        return view('procesos.servicio', compact('tipos', 'id', 'servicioObj'));
        
    }

    public function trefila(Request $request)
    {

        $tipomatriz = DB::table('tipomatriz')->get();
        $tipopunzon = DB::table('tipopunzon')->get(); 
        $tipomaterialpm = DB::table('tipomaterialpm')->get();
        
        return view('procesos.trefila', compact('tipomatriz', 'tipopunzon', 'tipomaterialpm'));
        
    }

    public function punta(Request $request)
    {
        $tipopunta = DB::table('tipopunta')->get(); 
        $tipomaterialpm = DB::table('tipomaterialpm')->get();
        
        return view('procesos.punta', compact('tipopunta', 'tipomaterialpm'));
        
    }

    public function pruebahidraulica(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 9)->first();
        $procesoStatus = false;
        $pruebaObj = null;
        if ($proceso){
            $procesoStatus = true;
            $pruebaObj = DB::table('pruebahidraulica')->where('id', '=', $proceso->procesoid)->first();

        }
        if ($type){
            if ($procesoStatus == false){
                $insert = DB::table('pruebahidraulica')->insertGetId([
                    'presion' => $request->get('presion'),
                    'tiempo' => $request->get('tiempo'),
                    'observaciones' => $request->get('obser'),
                    'precio' => $request->get('precio'),
                    //'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 9,
                    'procesoid' => $insert
                ]);
            }
            else{
                //dd("actualizando");
                $update = DB::table('pruebahidraulica')->where('id', '=', $pruebaObj->id)->update([
                    'presion' => $request->get('presion'),
                    'tiempo' => $request->get('tiempo'),
                    'observaciones' => $request->get('obser'),
                    'precio' => $request->get('precio'),
                    //'observaciones' => $request->get('obser')
                ]);

            }


        }
        
        return view('procesos.pruebahidraulica', compact('id', 'pruebaObj'));
        
    }

    
    public function estencilado(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 10)->first();
        $procesoStatus = false;
        $esteObj = null;
        if ($proceso){
            $procesoStatus = true;
            $esteObj = DB::table('estencilado')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $Insert = DB::table('estencilado')->insertGetId([
                    'largoMinimo' => $request->get('largomin'),
                    'largoMaximo' => $request->get('largomax'),
                    'normaid' => $request->get('normaid'),
                    'numeroColada' => $request->get('colada'),
                    'medida' => $request->get('medida'),
                    'tipoCostura' => $request->get('tipoid'),
                    'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 10,
                    'procesoid' => $Insert
                ]);
            }
            else{
                $update = DB::table('estencilado')->where('id', '=', $esteObj->id)->update([
                    'largoMinimo' => $request->get('largomin'),
                    'largoMaximo' => $request->get('largomax'),
                    'normaid' => $request->get('normaid'),
                    'numeroColada' => $request->get('colada'),
                    'medida' => $request->get('medida'),
                    'tipoCostura' => $request->get('tipoid'),
                    'observaciones' => $request->get('obser')
                ]);

            }


        }
        
        $tipocostura = DB::table('tipocostura')->get();
        $normas = DB::table('normas')->get();
        return view('procesos.estencilado', compact('tipocostura', 'normas', 'id', 'esteObj'));
        
    }

    public function current(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 8)->first();
        $procesoStatus = false;
        $currentObj = null;
        if ($proceso){
            $procesoStatus = true;
            $currentObj = DB::table('eddycurrent')->where('id', '=', $proceso->procesoid)->first();

        }
        if ($type){
            if ($procesoStatus == false){
                $bateainsert = DB::table('eddycurrent')->insertGetId([
                    'observaciones' => $request->get('obser')
                    //'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 8,
                    'procesoid' => $bateainsert
                ]);
            }
            else{
                //dd("actualizando");
                $bateaupdate = DB::table('eddycurrent')->where('id', '=', $currentObj->id)->update([
                    'observaciones' => $request->get('obser')
                    //'observaciones' => $request->get('obser')
                ]);

            }


        }
    
        return view('procesos.current', compact('id', 'currentObj'));
        
    }

    public function batea(Request $request, $id)
    {
        $type = $request->get('type');
        $proceso = DB::table('procesosxcp')->where('idCP', '=', $id)->where('tipoProceso', '=', 3)->first();
        $procesoStatus = false;
        $bateaObj = null;
        if ($proceso){
            $procesoStatus = true;
            $bateaObj = DB::table('batea')->where('id', '=', $proceso->procesoid)->first();

        }

        if ($type){
            if ($procesoStatus == false){
                $bateainsert = DB::table('batea')->insertGetId([
                    'tipoBateaid' => $request->get('tipobateaid'),
                    'observaciones' => $request->get('obser')
                ]);

                $procesoInsert = DB::table('procesosxcp')->insert([
                    'idCP'=>$id,
                    'tipoProceso' => 3,
                    'procesoid' => $bateainsert
                ]);
            }
            else{
                //dd("actualizando");
                $bateaupdate = DB::table('batea')->where('id', '=', $bateaObj->id)->update([
                    'tipoBateaid' => $request->get('tipobateaid'),
                    'observaciones' => $request->get('obser')
                ]);

            }


        }
        
        $tipos = DB::table('tipobatea')->get();
        return view('procesos.batea', compact('tipos', 'id', 'bateaObj'));
    }
        
    

    public function requestprocesos($proceso, $idproceso, $idcotizacion, $table, $table2)
    {
        $tablePr = ($table == "op")?'procesosxop':'procesosxcp';
        $tblcons = ($table2 == "vxo")?'versionesxorden':'cotizaciones';

        if ($proceso == "1"){
            //preparacionmp//
            $sql = 'SELECT '.
                   "mp.*, m.id as medid, m.medida, m.diametroExterior as dexor, ".
                   "m.espesorNominal as espor, m.largoMaximo as largoMax, m.largoMaximo as largoMin, ".
                   "IF(m.largoMaximo=m.largoMinimo,m.largoMaximo,round(((m.largoMaximo+m.largoMinimo)/2000),2)) as lg ".
                   "from preparacionmp mp ".
                   "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=mp.id) ".
                   "LEFT JOIN medidas m  ON (m.id = mp.medidaid) ".
                   "where pxcp.idCP=$idcotizacion and pxcp.tipoProceso=1 and pxcp.procesoid=$idproceso ;";
            $procesodb = DB::select($sql);
            $pr = $procesodb[0];

            $sql2 = 'SELECT '.
                    "diametroExteriorNominal as den, espesorNominal as en, c.kilogrametro as kilogrametro, ".
                    "diametroInteriorNominal as din, mc.medida, mc.normaid, mc.costuraid, ".
                    "tc.descripcion as costu, tt.descripcion as tt, c.kilos, c.metros, ".
                    "pc.precioMetro, pc.precioKilo, pc.precioPieza ".
                    "from $tblcons c ".
                    "INNER JOIN medidascotizadas mc ON (mc.id = c.medidaid) ".
                    "LEFT JOIN tipocostura tc ON (tc.id = mc.costuraid) ".
                    "LEFT JOIN tratamientocotizacion tt ON (tt.id = c.tratamientoTermico) ".
                    "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=(SELECT MAX(fecha) from ".
                    "preciocotizaciones where cotizacionid=$idcotizacion)) where c.id=$idcotizacion ;";
            $tabledb = DB::select($sql2);
            $tb = $tabledb[0];
            // if ($procesodb == [] AND $tabledb == [])
            //     return null;
            $kgm2 = number_format(($pr->dexor-$pr->espor)*$pr->espor*0.0246,3);
            $kgm1 = number_format(($tb->den-$tb->en)*$tb->en*0.0246,3);
            if ($pr->dexor>0)
                $reduccion = number_format((1-($kgm1/$kgm2))*100,2);

            if (empty($tb->kilogrametro) or $tb->kilogrametro==0.00)
                $tb->kilogrametro = $this->kilogrametro($tb->den, $tb->en);

            $KGM = round($tb->kilogrametro, 3);

            $LARGO_TUBO = number_format((($pr->largoMax+$pr->largoMin)/2000),2);
            $LARGO_OBTENER = number_format((($kgm2/$KGM)*($LARGO_TUBO-0.2)),2);

            $Objeto = (object)['tipoproceso'=> 1, 'medida'=> $pr->medida, 'largo_final'=>$LARGO_OBTENER, 'medidaid'=>$pr->medid, 'reduccion'=> $reduccion, 'precio'=> $pr->precio, 'obs'=> $pr->observaciones];
            return $Objeto;
        }
        if ($proceso == "2"){
            
        }
        if ($proceso == "3"){
            
        }
        if ($proceso == "4"){
            
        }
        if ($proceso == "5"){
            
        }
        if ($proceso == "6"){
            
        }
        if ($proceso == "7"){
            
        }
        if ($proceso == "8"){
            
        }
        if ($proceso == "9"){
            
        }
        if ($proceso == "10"){
            $ideste = null;
            $este = 'SELECT '.
                   "e.* from estencilado e LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) where ".
                   "pxcp.idCP=$idcotizacion and pxcp.tipoProceso=10 and pxcp.procesoid=$idproceso ;";
            $estenciladoid = DB::select($este);
            if ($estenciladoid != []){
                $ideste = $estenciladoid[0]->id;
            }
            else{
                $sql = 'SELECT '.
                       "e.* from estencilado e INNER JOIN $tblcons c  ON (c.estenciladoid=e.id) ".
                       "where c.id=$idcotizacion ;"; 
                $tabledb = DB::select($sql);
                if ($tabledb != []){
                    $pr = $tabledb[0];
                }
                else{
                    if ($table2 == "vxo"){
                        $sql = 'SELECT '.
                                "from versionesxOrden v ".
                                "NNER JOIN ordenProduccion o ON (o.id = v.ordenProduccion) ".
                                "INNER cotizaciones c ON (c.id = o.cotizacionid) ".
                                "LEFT JOIN procesosxCP pxcp  ON (pxcp.idCP=c.id and pxcp.tipoProceso=10) ".
                                "INNER JOIN estencilado e ON (e.id = pxcp.procesoid) ".
                                "where v.id=$idcotizacion ;";
                        $tabledb = DB::select($sql);
                        if ($tabledb != []){
                            $pr = $tabledb[0];
                        }

                        
                    }
                }
                $Objeto = (object)['tipoproceso'=> 10, 'largomin'=>$pr->largoMinimo, 'largomax'=> $pr->largoMaximo, 'colada'=> $pr->numeroColada, 'medida'=> $pr->medida, 'costuraid'=> $pr->tipoCostura, 'normaid'=> $pr->normaid, 'obs'=>$pr->observaciones];
                return $Objeto;

            }

            //dd($pr);
            
        }
        if ($proceso == "11"){
            $sql = 'SELECT '.
                   "e.*, es.numeroColada from empaquetado e ".
                   "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
                   "LEFT JOIN $tablePr pxcp2  ON (pxcp2.idCP=$idcotizacion and pxcp2.tipoProceso=10) ".
                   "LEFT JOIN estencilado es ON (es.id = pxcp2.procesoid) ".
                   "where pxcp.idCP=$idcotizacion and pxcp.tipoProceso=11 and pxcp.procesoid=$idproceso ;";

            $tabledb = DB::select($sql);
            if ($tabledb != []){
                $pr = $tabledb[0];
                $obs = $pr->observaciones;
            }
            else{
                $sql = 'SELECT '.
                       "c.piezas as tubosxPaquete, es.numeroColada, c.kilos as kilosxPaquete, c.tipoEmbalaje as tipoEmpaquetadoid ".
                       "from $tblcons c ".
                       "LEFT JOIN $tablePr pxcp  ON (pxcp.idCP=c.id) ".
                       "LEFT JOIN estencilado es ON (es.id = pxcp.procesoid) ".
                       "where ".
                       "c.id=$idcotizacion and pxcp.idCP=$idcotizacion and pxcp.tipoProceso=11 ;";
                $tabledb = DB::select($sql);
                if ($tabledb != []){
                    $pr = $tabledb[0];
                    $obs = "";
                }
            }

            if ($table2 == "vxo"){
                $tubosxPaquete = "";
                $kilosxPaquete = "";
            }
            else{
                $tubosxPaquete = $pr->tubosxPaquete;
                $kilosxPaquete = $pr->kilosxPaquete;
            }

            $Objeto = (object)['tipoproceso' =>11, 'colada'=>$pr->numeroColada, 'tipo'=> $pr->tipoEmpaquetadoid, 'tubos'=>$tubosxPaquete, 'kilos'=>$kilosxPaquete, 'obs'=>$obs];
            return $Objeto;

            
        }
        if ($proceso == "12"){
            //$sql = 'SELECT '.
            //       ""
            
        }
        if ($proceso == "13"){
            $sql = 'SELECT '.
                   "e.* from entrega e ".
                   "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=e.id) ".
                   "where ".
                   "pxcp.idCP=$idcotizacion and pxcp.tipoProceso=13 ".
                   "and pxcp.procesoid=$idproceso ;";
            $tabledb = DB::select($sql);
            if ($tabledb != []){
                $pr = $tabledb[0];
                $obs = $pr->observaciones;
                $tipoentrega = $pr->tipoEntregaid;
                $costo = $pr->costoxKilo;
            }
            else {
                $sql = 'SELECT '.
                       "d.direccion, tc.transporteid, t.razon from $tblcons co ".
                       "LEFT JOIN clientes c   ON (co.clienteid=c.id) ".
                       "LEFT JOIN direccionesclientes d ON (d.clienteid = c.id) ".
                       "LEFT JOIN transportesclientes tc ON (tc.clienteid = c.id) ".
                       "LEFT JOIN transportes t ON (t.id = tc.transporteid) ".
                       "where co.id=$idcotizacion ;";
                $tabledb = DB::select($sql);
                if ($tabledb != []){
                    $pr = $tabledb[0];
                    $obs = "";
                    $tipoentrega = "";
                    $costo = 0;
                }
            }
            $Objeto = (object)['tipoproceso'=>13, 'tipoentrega'=> $tipoentrega, 'obs'=>$obs, 'costo'=>$costo, 'direccion'=>$pr->direccion, 'transporte'=>$pr->razon];
            return $Objeto;            
        }
        if ($proceso == "14"){
            $sql = 'SELECT '.
                   "s.* from servicio s ".
                   "LEFT JOIN $tablePr pxcp  ON (pxcp.procesoid=s.id) ".
                   "where ".
                   "pxcp.idCP=$idcotizacion and pxcp.tipoProceso=14 ".
                   "and pxcp.procesoid=$idproceso ;";
            $tabledb = DB::select($sql);
            if ($tabledb != []){
                $pr = $tabledb;
                $Objeto = (object) ['tipoproceso'=> 14, 'centroid'=> $pr->tipoCentroid, 'lugar'=>$pr->lugarEntrega, 'precio'=>$pr->precio, 'proveedor'=>$pr->proveedor, 'obs'=> $pr->observaciones];
            }
            else{
                $Objeto = (object)['tipoproceso'=> 14];
            }

            return $Objeto;

        }
        if ($proceso == "15"){

        }
    }

    public function kilogrametro($de,$es){

        return number_format(($de-$es)*$es*0.0246, 3);

    }


}
