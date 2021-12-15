<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\CemContacto;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = DB::table('zonas')->get();
        $rubros = DB::table('rubrosclientes')->get();
        $condiciones = DB::table('condicionventa')->get();
        $transportes = DB::table('transportes')->get();
        return view('cliente.index', compact('zonas', 'rubros', 'condiciones', 'transportes'));
    }

    public function clientes_search(Request $request)
    {
        $input = $request->all();

        $q0 = "";

        $q0 .= (empty($input['razon']))? "" : " AND c.razon LIKE '%".$input['razon']."%'";
        $q0 .= (empty($input['cuit']))? "" : " AND c.cuit='".$input['cuit']."'";
        $q0 .= (empty($input['nfanta']))? "" : " AND c.nombreFantasia LIKE '%".$input['nfanta']."%'";
        $q0 .= (empty($input['localidadid']))? "" : " AND l.nombre LIKE '%".$input['localidadid']."%'";
        $q0 .= (empty($input['zona']))? "" : " AND c.zonaid=".$input['zona']."";
        $q0 .= (empty($input['activo']))? "" : " AND c.activo=".$input['activo']."";

        $sql = 'SELECT '.
            "c.razon as Razon, REPLACE(c.telefonos,'/', ' --- ') as TELEFONO, c.nombreFantasia as Nombre, ".
            "CONCAT(l.nombre, ' , ', p.nombre, ' , ', pro.nombre) as Lugar, z.descripcion as Zona, c.id ".
            "FROM  clientes c ".
            "LEFT JOIN localidades l ON (l.id = c.localidadid) ".
            "LEFT JOIN partidos p ON (p.id = l.partidoid) ".
            "LEFT JOIN provincias pro ON (pro.id = p.provinciaid) ".
            "LEFT JOIN zonas z ON (z.id = c.zonaid) ".
            "WHERE 1=1 $q0 order by c.id ;";

        $res = DB::select($sql);
        if (count($res)>0){
            return response()->json(['resultado'=>$res]);
        }
        return "false";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('cliente.create');
    }

    public function getcliente(Request $request)
    {
        $input = $request->all();
        $id = (int) $input['id'];
        $transportes = [];
        $direcciones = [];
        $contactos = [];
        
        $sql = 'SELECT '.
               "c.*, CONCAT(l.nombre, ' , ', p.nombre, ' , ', pro.nombre) as Lugar ".
               "from clientes c ".
               "LEFT JOIN localidades l ON (l.id = c.localidadid) ".
               "LEFT JOIN partidos p ON (p.id = l.partidoid) ".
               "LEFT JOIN provincias pro ON (pro.id = p.provinciaid) ".
               "WHERE 1=1 and c.id=$id ;";

        $db = DB::select($sql);
        $clienteobj = $db[0];

        $db1 = DB::table('transportesclientes')->where('clienteid', '=', $id)->get();
        foreach ($db1 as $trc) {
            $db2 = DB::table('transportes')->where('id', '=', $trc->transporteid)->first();
            $transportes[] = $db2; 
        }

        $db2 = DB::table('direccionesclientes')->where('clienteid', '=', $id)->get();
        foreach ($db2 as $dr) {
            $direcciones[] = $dr; 
        }

        $db3 = DB::table('contactoclientes')->where('clienteid', '=', $id)->get();
        foreach ($db3 as $ccl) {
            $contactos[] = $ccl; 
        }

        $cliente = (object)['cliente'=>$clienteobj, 'transportes'=>$transportes, 'contactos'=>$contactos, 'direcciones'=>$direcciones];

        return response()->json($cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $telefonos = json_decode($request->get('telefonos'));
        $contactos = json_decode($request->get('contactos'));
        $direcciones = json_decode($request->get('direcciones'));
        $transportes = json_decode($request->get('transportes'));
        $transportesnew = [];
        $transportesexist = [];
        if (count($transportes)>0){
            $transportesnew = $transportes[1];    
            $transportesexist = $transportes[0];         
        }

        $tels = "";
        foreach ($telefonos as $tel){ // ALMACENO LOS TELEFONOS
            if (!empty($tel->telefono)){
                $tels .= $tel->telefono."/";
            }
        }

        $clientenew = Cliente::create([
            'razon'=> $request->get('razon'),
            'domicilio' => $request->get('domicilio'),
            'telefonos' => $tels,
            'codigoPostal' => $request->get('codigopostal'),
            'cuit' => $request->get('cuit'),
            'IIBB' => $request->get('iibb'),
            'sitioWeb' => $request->get('sitioweb'),
            'fax' => $request->get('fax'),
            'localidadid' => $request->get('localidadid'),
            'nombreFantasia' => $request->get('nombrefantasia'),
            'condicionVenta' => $request->get('condicionventa'),
            'rubroid' => $request->get('rubro'),
            'zonaid' => $request->get('zona'),
            'observaciones' => $request->get('observaciones'),
            'horarioRecepcion' => $request->get('horariorecepcion'),
            'codigo' => $request->get('codigocliente'),
            'activo' => $request->has('activo')        
        ]);

        $clienteIdPop = $clientenew->id;

        if (count($transportesnew)>0){
            foreach ($transportesnew as $tr) {
                $trans_id = DB::table('transportes')->insertGetId([
                    'razon'=>$tr->razon,
                    'direccion'=>$tr->direccion,
                    'localidadid'=>$tr->localidadid,
                    'codigoPostal'=>$tr->codigopostal,
                    'email'=>$tr->email,
                    'telefono1'=>$tr->telefono1,
                    'telefono2'=>$tr->telefono2,
                    'telefono3'=>$tr->telefono3,
                    'celular'=>$tr->celular,
                    'contacto'=>$tr->contacto,
                    'horarioRecepcion'=>$tr->horario,
                    'observaciones'=>$tr->observaciones
                ]);

                DB::table('transportesclientes')->insert([
                    'clienteid'=>$clienteIdPop,
                    'transporteid'=>$trans_id
                ]);
            }
        }

        if (count($transportesexist)>0){
            foreach ($transportesexist as $tr) {
                DB::table('transportesclientes')->insert([
                    'clienteid'=>$clienteIdPop,
                    'transporteid'=>$tr->ide
                ]);
            }
        }

        if (is_array($contactos)){
            if (count($contactos)>0){
                foreach ($contactos as $contacto) {
                    $contactonew = DB::table('contactoclientes')->insertGetId([
                        'clienteid'=>$clienteIdPop,
                        'contacto'=>$contacto->contacto,
                        'email'=>$contacto->email,
                        'celular'=>$contacto->celular
                    ]);
                }               
            }
        }

        if (is_array($direcciones)){
            if (count($direcciones)>0){
                foreach ($direcciones as $direccion) {
                    $direccionnew = DB::table('direccionesclientes')->insertGetId([
                        'clienteid'=>$clienteIdPop,
                        'direccion'=>$direccion->direccion,
                        'contacto'=>$direccion->contacto,
                        'telefono'=>$direccion->t1,
                        'horarioRecepcion'=>$direccion->recepcion,
                        //'localidadid'=>$direccion->celular
                    ]);
                }
            }
        }

        return "true";

        //return back()->with('success', 'Cliente Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        //return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        //return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarcliente(Request $request)
    {
        $telefonos = json_decode($request->get('telefonos'));
        $contactos = json_decode($request->get('contactos'));
        $direcciones = json_decode($request->get('direcciones'));
        $transportes = json_decode($request->get('transportes'));  
        $transportesnew = (isset($transportes[1]))?$transportes[1]:[];   
        $transportesexist = (isset($transportes[0]))?$transportes[0]:[];
        $clienteIdPop = (int) $request->get('id');

        $tels = "";
        foreach ($telefonos as $tel){ 
            if (!empty($tel->telefono)){
                $tels .= $tel->telefono."/";
            }
        }

        $clientenew = Cliente::where('id', '=', $clienteIdPop)->update([
            'razon'=> $request->get('razon'),
            'domicilio' => $request->get('domicilio'),
            'telefonos' => $tels,
            'codigoPostal' => $request->get('codigopostal'),
            'cuit' => $request->get('cuit'),
            'IIBB' => $request->get('iibb'),
            'sitioWeb' => $request->get('sitioweb'),
            'fax' => $request->get('fax'),
            'localidadid' => $request->get('localidadid'),
            'nombreFantasia' => $request->get('nombrefantasia'),
            'condicionVenta' => $request->get('condicionventa'),
            'rubroid' => $request->get('rubro'),
            'zonaid' => $request->get('zona'),
            'observaciones' => $request->get('observaciones'),
            'horarioRecepcion' => $request->get('horariorecepcion'),
            'codigo' => $request->get('codigocliente'),
            'activo' => $request->has('activo')        
        ]);

        //limpiamos los datos del cliente//
        $db = DB::table('transportesclientes')->where('clienteid', '=', $clienteIdPop)->delete();
        $db2 = DB::table('contactoclientes')->where('clienteid', '=', $clienteIdPop)->delete();
        $db3 = DB::table('direccionesclientes')->where('clienteid', '=', $clienteIdPop)->delete();

        if (count($transportesexist)>0){
            foreach ($transportesexist as $tr) {
                DB::table('transportesclientes')->insert([
                    'clienteid'=>$clienteIdPop,
                    'transporteid'=>$tr->ide
                ]);
            }
        }

        if (count($transportesnew)>0){
            foreach ($transportesnew as $tr) {
                $trans_id = DB::table('transportes')->insertGetId([
                    'razon'=>$tr->razon,
                    'direccion'=>$tr->direccion,
                    'localidadid'=>$request->get('localidadid'),
                    'codigoPostal'=>$tr->codigopostal,
                    'email'=>$tr->email,
                    'telefono1'=>$tr->telefono1,
                    'telefono2'=>$tr->telefono2,
                    'telefono3'=>$tr->telefono3,
                    'celular'=>$tr->celular,
                    'contacto'=>$tr->contacto,
                    'horarioRecepcion'=>$tr->horario,
                    'observaciones'=>$tr->observaciones
                ]);

                DB::table('transportesclientes')->insert([
                    'clienteid'=>$clienteIdPop,
                    'transporteid'=>$trans_id
                ]);
            }
        }

        if (is_array($contactos)){
            if (count($contactos)>0){
                foreach ($contactos as $contacto) {
                    $contactonew = DB::table('contactoclientes')->insertGetId([
                        'clienteid'=>$clienteIdPop,
                        'contacto'=>$contacto->contacto,
                        'email'=>$contacto->email,
                        'celular'=>$contacto->celular
                    ]);
                }               
            }
        }

        if (is_array($direcciones)){
            if (count($direcciones)>0){
                foreach ($direcciones as $direccion) {
                    $direccionnew = DB::table('direccionesclientes')->insertGetId([
                        'clienteid'=>$clienteIdPop,
                        'direccion'=>$direccion->direccion,
                        'contacto'=>$direccion->contacto,
                        'telefono'=>$direccion->t1,
                        //'telefono2'=>$direccion->t2,
                        'horarioRecepcion'=>$direccion->recepcion,
                        'localidadid'=>$request->get('localidadid')
                    ]);
                }
            }
        }


        return "true";
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->razon = $request->get('razon');
        $cliente->domicilio = $request->get('domicilio');
        $cliente->telefonos = $request->get('telefonos');
        $cliente->codigoPostal = $request->get('codigoPostal');
        $cliente->cuit = $request->get('cuit');
        $cliente->IIBB = $request->get('IIBB');
        $cliente->sitioWeb = $request->get('sitioWeb');
        $cliente->fax = $request->get('fax');
        $cliente->localidadid = $request->get('localidadid');
        $cliente->nombreFantasia = $request->get('nombreFantasia');
        $cliente->condicionVenta = $request->get('condicionVenta');
        $cliente->rubroid = $request->get('rubroid');
        $cliente->zonaid = $request->get('zonaid');
        $cliente->observaciones = $request->get('observaciones');
        $cliente->horarioRecepcion = $request->get('horarioRecepcion');
        $cliente->codigo = $request->get('codigo');
        $cliente->activo = $request->has('activo');
        $cliente->save();
        
        //return redirect('clientes')->with('success', 'Cliente Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_cliente = (int) $id;

        $db = DB::table('transportesclientes')->where('clienteid', '=', $id_cliente)->delete();
        $db2 = DB::table('contactoclientes')->where('clienteid', '=', $id_cliente)->delete();
        $db3 = DB::table('direccionesclientes')->where('clienteid', '=', $id_cliente)->delete();

        $cliente = Cliente::find($id_cliente);
        $cliente->delete();
        return "true";
    }

    public function buscar_cliente(Request $request)
    {
        $cliente_id = $request->get('cliente_id');
        $crmcontacto_id = $request->get('crmcontacto_id');
        $titulo = $request->get('titulo');
        $descripcion = $request->get('descripcion');
        $date_start = $request->get('date_start');
        $date_end = $request->get('date_end');

        $cliente = Cliente::find($cliente_id);
        return json_encode($cliente);
    }
}
