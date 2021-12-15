<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrmContacto;
use App\Transporte;
use App\Cliente;
use App\Nota;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class CRMController extends Controller
{
    public function calendario()
    {
        return view('crm.calendario');
    }

    public function cliente(Request $request)
    {
        $type = $request->get('type');
        $arraycontacto = [];
        $tipos = DB::table('tipocontacto')->get();
        $clientes = Cliente::all();
        if ($type){
            $input = $request->all();
            $clienteid = $request->get('clienteid');
            //dd($input);
            $q0 = "";
            $q0 .= (empty($input['date_start']))? "" : " AND crm.fecha>='".date("d/m/Y 00:00", strtotime($input['date_start']))."'";
            $q0 .= (empty($input['date_end']))? "" : " AND crm.fecha<='".date("d/m/Y 00:00", strtotime($input['date_end']))."'";
            $q0 .= (empty($input['tipoContactoid']))? "" : " AND crm.tipoContactoid='".$input['tipoContactoid']."'";
            $q0 .= (empty($input['titulo']))? "" : " AND crm.titulo LIKE '%".$input['titulo']."%'";
            $q0 .= (empty($input['descripcion']))? "" : " AND crm.descripcion LIKE '%".$input['descripcion']."%'";

            $sql = 'SELECT '.
                   "c.razon as Cliente, crm.titulo as Titulo, tc.descripcion as TipodeContacto, ".
                   "SUBSTRING(crm.descripcion, 1, 30) as Descripcion, ".
                   "crm.fecha as FechayHora, crm.id FROM crmcontacto crm ".
                   "LEFT JOIN tipocontacto tc ON (tc.id = crm.tipoContactoid) ".
                   "LEFT JOIN clientes c ON (c.id=crm.clienteid) ".
                   "WHERE 1=1 $q0 AND crm.clienteid='$clienteid' order by crm.id desc; ";

            $results = DB::select($sql);
            foreach ($results as $result) {
                $arraycontacto[] = (object) ['cliente'=>$result->Cliente, 'tipo'=> $result->TipodeContacto, 'descripcion' => $result->Descripcion, 'fecha'=> $result->FechayHora, 'id'=> $result->id];
            }

        }
        else{
            $arraycontacto = [];
            // $contactos = CrmContacto::all();
            // foreach ($contactos as $contacto) {
            //     $cl = "";
            //     $ti = "";

            //     $cliente = Cliente::find($contacto->clienteid);
            //     if ($cliente != null)
            //         $cl = $cliente->nombreFantasia;

            //     $tipo = DB::table('tipocontacto')->where('id', '=', $contacto->tipoContactoid)->first();
            //     if ($tipo != null)
            //         $ti = $tipo->descripcion;
            //     $arraycontacto[] = (object) ['cliente'=>$cl, 'tipo'=> $ti, 'descripcion' => $contacto->descripcion, 'fecha'=> $contacto->fecha, 'id'=> $contacto->id];
            // }            
        }
        return view('crm.cliente', compact('tipos', 'clientes', 'arraycontacto'));
    }

    public function CreateContactoCliente(Request $request)
    {   
        CrmContacto::create([
            'tipoContactoid' => $request->get('tipoContactoid'),
            'descripcion' => $request->get('descripcion'),
            'fecha' => $request->get('fecha'),
            'clienteid' => $request->get('clienteid'),
            'userid' => Auth::id(),
            'titulo' => $request->get('titulo')
        ]);

        return back()->with('success', 'Crm Agregada');
    }

    public function vercontacto($id)
    {
        $contacto = CrmContacto::find($id);
        return $contacto;
    }

    public function transporte()
    {
        $transportes = Transporte::all();
        return view('crm.vertransporte', compact('transportes'));
    }

    public function vertransporte($id)
    {
        $transporte = Transporte::find($id);
        return $transporte;
    }

    public function updatetransporte(Request $request, $id)
    {
        $transporte = Transporte::where('id', '=', $id)->update($request->all());
        return "true";
    }

    public function addtransporte(Request $request)
    {
        $data = $request->all();

        $create = Transporte::create($data);
        return "true";
    }

    public function deletetransporte($id)
    {
        $transporte = Transporte::find($id);
        $transporte->delete();
        return "true";
    }



    public function updatecontacto(Request $request, $id)
    {
        $contacto = CrmContacto::find($id);
        $contacto->tipoContactoid = $request->get('tipoContactoid');
        $contacto->descripcion = $request->get('descripcion');
        $contacto->fecha = $request->get('fecha');
        $contacto->clienteid = $request->get('clienteid');
        $contacto->titulo = $request->get('titulo');
        $contacto->save();
        return "true";
    }

    public function BuscarContactoCliente(Request $request)
    {
        $cliente = $request->get('clienteid');
        $descripcion = $request->get('descripcion');
        $titulo = $request->get('titulo');
        $tipo = $request->get('tipoContactoid');
        if ($request->get('fecha')) {
            list($dia, $mes, $anio) = explode('/', $request->get('fecha'));       
            $fecha = $anio."-".$mes."-".$dia;
        }

        if ($cliente and $tipo)
            $contactos = CrmContacto::where([
                ['clienteid', '=', $cliente],
                ['tipoContactoid', '=', $tipo],
            ])->get();
    }

    public function nota(Request $request)
    {
        $arraynotas = [];
        $clientes = Cliente::all();
        $usuarios = User::all();
        $estados = DB::table('estadonotas')->get();
        $type = $request->get('type');
        if ($type){
            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['estadoidb']))? "" : " AND n.estadoid='".$input['estadoidb']."'";
            $q0 .= (empty($input['paraidb']))? "" : " AND n.paraUserid='".$input['paraidb']."'";
            $q0 .= (empty($input['clienteidb']))? "" : " AND n.clienteid='".$input['clienteidb']."'";
            $q0 .= (empty($input['asuntob']))? "" : " AND n.asunto LIKE '%".$input['asuntob']."%'";

            $sql = 'SELECT '.
                   'n.asunto as Asunto, n.fecha as FechayHora, u2.usuario as De, u.usuario as Para, '.
                   'e.descripcion as Estado, n.id FROM crmnotas n '.
                   'LEFT JOIN estadonotas e ON (e.id = n.estadoid) '.
                   'LEFT JOIN usuarios u ON (u.id = n.paraUserid) '.
                   'LEFT JOIN usuarios u2 ON (u2.id = n.deUserid) '.
                   'WHERE 1=1 and (n.paraUserid='."18".' or n.deUserid='."18".') '.$q0.' order by n.id desc;';
            //Auth::id()
            
            $results = DB::select($sql);
            foreach ($results as $result) {
                $arraynotas[] = (object)['asunto' => $result->Asunto, 'fecha'=> $result->FechayHora, 'de'=> $result->De, 'para'=> $result->Para, 'estado'=> $result->Estado, 'id'=> $result->id];
            }

        }
        else{
            $notas = Nota::all();
            foreach ($notas as $nota) {
                $de = "";
                $para = "";
                $est = "";

                $deuser = User::find($nota->deUserid);
                if ($deuser != null)
                    $de = $deuser->usuario;

                $parauser = User::find($nota->paraUserid);
                if ($parauser != null)
                    $para = $parauser->usuario;

                $estado = DB::table('estadonotas')->where('id', '=', $nota->estadoid)->first();
                if ($estado != null)
                    $est = $estado->descripcion;

                $arraynotas[] = (object)['asunto' => $nota->asunto, 'fecha'=> $nota->fecha, 'de'=> $de, 'para'=> $para, 'estado'=> $est, 'id'=> $nota->id];
            }            
        }
        return view('crm.nota', compact('clientes', 'usuarios', 'estados', 'arraynotas'));
    }

    public function nota_create(Request $request)
    {
        list($dia, $mes, $anio) = explode('/', $request->get('fecha'));       
        $fecha = $anio."-".$mes."-".$dia;

        Nota::create([
            'paraUserid' => $request->get('paraUserid'),
            'deUserid' => Auth::id(),
            'clienteid' => $request->get('clienteid'),
            'estadoid' => $request->get('estadoid'),
            'asunto' => $request->get('asunto'),
            'fecha' => $fecha,
            'descripcion' => $request->get('descripcion')
        ]);

        return back()->with('success', 'Nota Agregada');
    }

    public function seguimiento()
    {
        $clientes = DB::table('clientes')->get();
        $usuarios = DB::table('usuarios')->get();
        $prioridades = DB::table('prioridades')->get();
        return view('crm.seguimiento', compact('clientes', 'usuarios', 'prioridades'));
    }

    public function buscarseguimiento(Request $request)
    {
       $q0  = "";

       $input = $request->all();

       $q0 .= (empty($input['usuarioid']))? "" : " AND n.usuario_id='".$input['usuarioid']."'";
       $q0 .= (empty($input['clienteid']))? "" : " AND n.cliente_id='".$input['clienteid']."'";
       $q0 .= (empty($input['prioridadid']))? "" : " AND n.prioridad_id='".$input['prioridadid']."'";
       $q0 .= (empty($input['descripcion']))? "" : " AND n.titulo='".$input['descripcion']."'";
       $q0 .= (empty($input['fechaprometidadesde']))? "" : " AND n.fecha_prometida >='".$input['fechaprometidadesde']."'";
       $q0 .= (empty($input['fechaprometidahasta']))? "" : " AND n.fecha_prometida <='".$input['fechaprometidahasta']."'";
       $q0 .= (empty($input['fecharealdesde']))? "" : " AND n.fecha_real >='".$input['fecharealdesde']."'";
       $q0 .= (empty($input['fecharealhasta']))? "" : " AND n.fecha_real <='".$input['fecharealhasta']."'";

       //dd($q0);
       $sql = "SELECT ".
       "c.razon, c.telefonos, u.usuario, c.id as clienteid, ".
       "n.fecha_prometida, n.fecha_real, n.titulo as Titulo, ".
       "n.comentarios as Comentarios, p.descripcion as Prioridad, ".
       "n.id FROM crm_cliente n ".
       "LEFT JOIN usuarios u ON (u.id = n.usuario_id) ".
       "LEFT JOIN clientes c ON (c.id = n.cliente_id) ".
       "LEFT JOIN prioridades p ON (p.id = n.prioridad_id) ".
       "WHERE 1=1 $q0 order by n.id desc ; ";

       $results = DB::select($sql);
       if ($results != [])
        return response()->json(['resultado'=>$results]);
       else 
        return "false";
    }

    public function DeleteNota($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
        return "true";
    }

    public function DeleteCrmContacto($id)
    {
        $nota = CrmContacto::find($id);
        $nota->delete();
        return "true";
    }

    public function buscarcoti(Request $request)
    {
        $input = $request->all();
        if ($input['id'] == "0")
            return "false";

        $sql = 'SELECT '.
               "co.id as Numero, mc.medida as Medida, co.fecha as Fecha, co.fechaEntrega as FechaEstimada, ".
               "ec.descripcion as Estado, co.id FROM cotizaciones co ".
               "LEFT JOIN medidascotizadas mc ON (mc.id = co.medidaid) ".
               "LEFT JOIN estadocotizacion ec ON (ec.id = co.estadoid) ".
               "WHERE co.clienteid=".$input['id'].";";
        
        $results = DB::select($sql);
        if ($results != [])
         return response()->json(['resultado'=>$results]);
        else 
         return "false";
    }

    public function vercotizacion($id)
    {
        $sql = 'SELECT '.
                "hor.id as horid, bat.id as batid, tre.id as idtre, pmp.precio as precioMP, c.tipoReventa as reventaid, ".
                "m.*, c.*, c.formaid as formid, m.id as medid, est.largoMaximo as largomaxest, est.largoMinimo as largominest, ".
                "est.id as ideste, est.normaid as tiponormaest, ta.descripcion as tacero, est.tipoCostura as tipocosturaest, ".
                "est.observaciones as observaeste, est.medida as med, ".
                "est.numeroColada as numeroColada, cl.razon, cl.codigo, tr.descripcion as descreventa, ".
                "tc.descripcion as descostura, n.descripcion as desnorma, f.descripcion as desforma, ".
                "uf.descripcion as desusofinal, e.descripcion as desembalaje, ec.descripcion as estcot, ".
                "tcest.descripcion as costuraidest, nest.descripcion as normaidest, ".
                "IF (c.urgente=1, 'SI', 'NO') as urgencia, IF (c.biselado=1,'SI','NO') as bise, tmon.descripcion as moneda, ".
                "IF (c.aplastado=1,'SI','NO') as aplas,IF (c.pestaniado=1,'SI','NO') as pesta, pc.precioKilo, ".
                "pc.precioPieza, pc.precioMetro, ".
                "cv.descripcion as condicionvta, tt.descripcion as desctt, tt.detalle as detallett, te.direccion as Lentrega ".
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
                "LEFT JOIN tratamientocotizacion tt ON (tt.id = c.tratamientoTermico) ".
                "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=(SELECT MAX(fecha) ".
                "from preciocotizaciones where cotizacionid=$id)) where c.id=$id LIMIT 1 ;";
        
        $results = DB::select($sql);
        $cotiz  = $results[0];
        $kilos = "";
        $metros = "";
        $unidad = "";
        $pkilo = "";
        $pmetro = "";
        $arrayprocesos = [];

        if (empty($cotiz->kilos))
        {
            $kilos = round($cotiz->metros*$cotiz->kilogrametro, 2);
            $metros = $cotiz->metros;
        }
        else
        {
            if ($cotiz->kilogrametro > 0)
            {
                $metros = round($cotiz->kilos/$cotiz->kilogrametro, 2);
            }
            if ($kilos)
                $kilos = $kilos->kilos;
            else
                $kilos = 0;

        }

        if ($cotiz->precioPasado)
            $unidad = $this->precP($cotiz->precioPasado);

        $kgm = $cotiz->kilogrametro;
        if (empty($cotiz->precioMetro)){
            
            $pmetro = round($cotiz->precioKilo * $kgm,2);
            $pkilo = $cotiz->precioKilo;
        }
        else{
            
            $pkilo = round($cotiz->precioMetro / $kgm,2);
            $pmetro = $cotiz->precioMetro;
        }

        /// PROCESOS ///
        $table = "c";
        $table2 = "c";
        $procesos = 1;
        $pr = DB::table('ordenprocesocotizacion')->where('idCotizacion', '=', $id)->get();
        if ($pr){
            $prObj = $pr[0];
            $array_proc = explode(",",$prObj->orden);
            $nroP = 0;
            $arrayprocGuardados = [];
            foreach ($array_proc as $valt){
                $parser = explode("*", $valt);
                $val = $parser[0];
                $arrayprocGuardados[] = $val;
                $idprocparticular = $parser[1];
                $procesoObj = $this->requestprocesos($val, $idprocparticular, $id, $table, $table2);
                $arrayprocesos [] = $procesoObj;
            }
           dd($arrayprocesos);

        }
        else {
            $procesos = 0;
        }



        return view('cotizacion.vercotizacion', compact('cotiz', 'kilos', 'metros', 'unidad', 'pmetro', 'pkilo', 'procesos'));
    }

    public function precP($char){
        
        if ($char=='k')
            return "KILOS";
        if ($char=='m')
            return 'METROS';
        if ($char=='p')
            return 'PIEZAS';
    }

    public function buscarordencliente(Request $request)
    {
        $input = $request->all();
        if ($input['id'] == "0")
            return "false";

        $sql = 'SELECT '.
               "op.id as Norden, mc.medida as Medida, IF (p.urgente=1, 'SI', 'NO') as URG, p.fechaPrometida as FechaPrometida, ".
               "es.descripcion as Estado, (p.id) FROM ordenproduccion op ".
               "INNER JOIN versionesxorden p ON (p.ordenProduccion=op.id) ".
               "LEFT JOIN medidascotizadas mc ON (mc.id = p.medidaid) ".
               "LEFT JOIN estadosop es ON (es.id = op.estadoid) ".
               "WHERE  p.version=".
               "(SELECT MAX(vxo.version) ".
               "from ordenproduccion op ".
               "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
               "WHERE vxo.ordenProduccion=p.ordenProduccion ".
               "GROUP BY (vxo.ordenProduccion) ) and p.clienteid=".$input['id'].";";               
        
        $results = DB::select($sql);
        if ($results != [])
         return response()->json(['resultado'=>$results]);
        else 
         return "false";
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


