<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class StockMPController extends Controller
{
    public function actualizarmp(Request $request)
    {
    	$type = $request->get('type');
    	$proveedores = DB::table('proveedores')->get();
    	$tipocosturas = DB::table('tipocostura')->get();
    	$tipoaceros = DB::table('tipoacero')->get();
    	$tratamientos = DB::table('tratamientotermico')->get();
    	$normas = DB::table('normas')->get();

    	if ($type){
    		$input = $request->all();
    		$mparray = [];
    		$q0 = "";
            $q0 .= (empty($input['proveedoridb']))? "" : " AND pa.proveedorid='".$input['proveedoridb']."'";
            $q0 .= (empty($input['diametroextdesdeb']))? "" : " AND diametroExterior>=".$input['diametroextdesdeb']."";
            $q0 .= (empty($input['diametroexthastab']))? "" : " AND diametroExterior<=".$input['diametroexthastab']."";
            $q0 .= (empty($input['espesordesdeb']))? "" : " AND espesorNominal>=".$input['espesordesdeb']."";

            $q0 .= (empty($input['espesorhastab']))? "" : " AND espesorNominal<=".$input['espesorhastab']."";

            $q0 .= (empty($input['largomaxb']))? "" : " AND largoMaximo<='".$input['largomaxb']."'";

            $q0 .= (empty($input['largominb']))? "" : " AND largoMinimo>='".$input['largominb']."'";
            $q0 .= (empty($input['tipoaceroidb']))? "" : " AND tipoAceroSAE='".$input['tipoaceroidb']."'";
            $q0 .= (empty($input['tipocosturaidb']))? "" : " AND tipoCostura='".$input['tipocosturaidb']."'";
            $q0 .= (empty($input['tratamientoidb']))? "" : " AND tratamientoTermico='".$input['tratamientoidb']."'";
            $q0 .= (empty($input['normaidb']))? "" : " AND normaid='".$input['normaidb']."'";

            $sql = 'SELECT '.
                   "m.medida, p.razon , IF(ISNULL(pmp.precioActual),0,pmp.precioActual) as precio, ".
                   "p.id as prove, m.id as med FROM medidas m ".
                   "INNER JOIN paquetes pa ON (pa.medidaid = m.id) ".
                   "LEFT JOIN proveedores p ON (p.id = pa.proveedorid) ".
                   "LEFT JOIN preciompxproveedor pmp ON (pmp.medidaid = m.id and pmp.proveedorid=p.id) ".
                   "WHERE 1=1  $q0 GROUP BY m.id ;";

            $mparray = DB::select($sql);

    	}
    	else{
    		$mparray = [];
    	}

        return view('stockmp.actualizarmp', compact('mparray', 'tipoaceros', 'tipocosturas', 'tratamientos', 'normas', 'proveedores'));
    }

    public function actualizarMPPrecio(Request $request)
    {
 
        $items = json_decode($request->get('items'),true);
        $user = Auth::user()->id;

        //dd($items);


        foreach($items as $item)
        {

            $proveedor =  $item['proveedor'];
            $id_medida    = $item['medida'];
            $nuevo_precio = isset($item['nuevoprecio'])? $item['nuevoprecio'] : 0;
            $porcentaje_subida;
            $moneda;

            if($nuevo_precio>0)
            {
                $sql = "SELECT precioActual FROM preciompxproveedor WHERE proveedorid=$proveedor AND medidaid=$id_medida ";

                $results = DB::select($sql);

                

                $precioAnterior = empty($results[0]->precioActual)? 0 : $results[0]->precioActual;
                

                $porcentaje_sub = 0;
                if($precioAnterior>0){
                    $porcentaje_subida = (($nuevo_precio-$precioAnterior)/$precioAnterior)*100;
                }else{
                    $porcentaje_subida = (($nuevo_precio-$precioAnterior)/1)*100;
                }



                $sql1="SELECT precioActual FROM preciompxproveedor WHERE medidaid=$id_medida AND proveedorid=$proveedor";
                $sql2 = "SELECT cambio FROM valorcambio ORDER BY id DESC LIMIT 1";
                
                $query ="INSERT INTO historicopreciop (precio,porcentaje,medidaid,proveedorid,precio_nuevo,usuario,tasa_cambio,moneda) VALUES ".
                "($precioAnterior,'$porcentaje_subida',$id_medida,$proveedor,'$nuevo_precio','$user',($sql2),'1')";

                DB::insert($query);

                $query ="UPDATE preciompxproveedor SET precioActual=$nuevo_precio WHERE medidaid=$id_medida and proveedorid=$proveedor";

                DB::update($query);

            }  

        }

        return "true";
   
    }

    public function historialMp(Request $request)
    {
        $input = $request->all();
        $idp = $input['idprove'];
        if ($input['type'] == "m"){
            $idm = $input['idmed'];
            $sql = 'SELECT '.
                   "DATE_FORMAT(historicopreciop.fechaIngreso,'%d/%m/%Y %h:%i:%s %p') as fecha, historicopreciop.fechaIngreso, ".
                   "historicopreciop.precio, historicopreciop.precio_nuevo, truncate(historicopreciop.porcentaje, 2) as p, ".
                   "historicopreciop.usuario, proveedores.razon, medidas.medida, truncate(historicopreciop.tasa_cambio, 2) as tas, ".
                   "moneda, ".
                   "IF (medidas.largoMaximo=medidas.largoMinimo,medidas.largoMaximo,CONCAT(medidas.largoMinimo/".
                   "medidas.largoMaximo)) as medidas, ".
                   "tipocostura.descripcion as costura, tratamientotermico.descripcion as tratamiento, ".
                   "tipoacero.descripcion as tipoacero, normas.descripcion as norma, ".
                   "rubros.descripcion as rubros ".
                   "FROM historicopreciop ".
                   "LEFT JOIN proveedores ON proveedores.id=historicopreciop.proveedorid ".
                   "LEFT JOIN medidas ON medidas.id =historicopreciop.medidaid ".
                   "LEFT JOIN tipocostura  ON (tipocostura.id = medidas.tipoCostura) ".
                   "LEFT JOIN tratamientotermico  ON (tratamientotermico.id = medidas.tratamientoTermico) ".
                   "LEFT JOIN tipoacero ON (tipoacero.id  = medidas.tipoAceroSAE) ".
                   "LEFT JOIN normas ON (normas.id=medidas.normaid) ".
                   "LEFT JOIN rubros ON (rubros.id = medidas.rubro_id) ".
                   "WHERE historicopreciop.medidaid =$idm AND  historicopreciop.proveedorid =$idp ORDER BY fechaIngreso DESC;";
            $results = DB::select($sql);
            if ($results!= [])
                return response()->json(['resultado'=>$results, 'type'=>"m"]);
            return response()->json(['resultado'=>"false", 'type'=>"m"]);
        }
        else{
            $sql = 'SELECT '.
                   "DATE_FORMAT(historicopreciop.fechaIngreso,'%d/%m/%Y %h:%i:%s %p') as f, historicopreciop.fechaIngreso as fech, ".
                   "historicopreciop.precio as precio, historicopreciop.precio_nuevo as precio_nuevo, ".
                   "truncate(historicopreciop.porcentaje,2) as p, historicopreciop.usuario, proveedores.razon, medidas.medida, ".
                   "truncate(historicopreciop.tasa_cambio,2) as tasa, moneda, ".
                   "IF (medidas.largoMaximo=medidas.largoMinimo,medidas.largoMaximo,CONCAT(medidas.largoMinimo/".
                   "medidas.largoMaximo)) as Largo, ".
                   "tipocostura.descripcion as costura, tratamientotermico.descripcion as tratamiento, ".
                   "tipoacero.descripcion as acero, normas.descripcion as norma, ".
                   "rubros.descripcion ".
                   "FROM historicopreciop ".
                   "LEFT JOIN proveedores ON proveedores.id=historicopreciop.proveedorid ".
                   "LEFT JOIN medidas ON medidas.id =historicopreciop.medidaid ".
                   "LEFT JOIN tipocostura  ON (tipocostura.id = medidas.tipoCostura) ".
                   "LEFT JOIN tratamientotermico  ON (tratamientotermico.id = medidas.tratamientoTermico) ".
                   "LEFT JOIN tipoacero ON (tipoacero.id  = medidas.tipoAceroSAE) ".
                   "LEFT JOIN normas ON (normas.id=medidas.normaid) ".
                   "LEFT JOIN rubros ON (rubros.id = medidas.rubro_id) ".
                   "WHERE historicopreciop.proveedorid =$idp ORDER BY fechaIngreso DESC, medidaid ASC";
            $results = DB::select($sql);
            if ($results!= [])
                return response()->json(['resultado'=>$results, 'type'=>"p"]);
            return response()->json(['resultado'=>"false", 'type'=>"p"]);
        }

    }
}
