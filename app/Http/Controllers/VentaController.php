<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class VentaController extends Controller
{
    public function actualizar_precio(Request $request)
    {
        $cotizaciones = [];
        

        $clientes = DB::table('clientes')->get();
        $tipos = DB::table('tipocostura')->get();
        $monedas = DB::table('monedas')->get();
        $usos = DB::table('usofinal')->get();
        return view('venta.actualizar_precio', compact('clientes', 'cotizaciones', 'tipos', 'monedas', 'usos'));
    }

    public function buscar_actualizar_precio(Request $request)
    {
        $q0  = "";

        $input = $request->all();

        $q0 .= (empty($input['clienteid']))? "": " AND co.clienteid='".$input['clienteid']."'"; 
        $q0 .= (empty($input['costuraid']))? "" : " AND mc.costuraid='".$input['costuraid']."'";
        $q0 .= (empty($input['usoid']))? "" : " AND co.uso='".$input['usoid']."'";
        $q0 .= (empty($input['monedaid']))? "" : " AND co.tipoMoneda='".$input['monedaid']."'";

        $sql = "SELECT ".
               "mc.medida as medida, tt.detalle as ttermico, medor.diametroExterior as diamext, ".
               "medor.espesorNominal as espesor, c.razon as razon, pc.precioKilo, co.id FROM cotizaciones co ".
               "LEFT JOIN clientes c ON (c.id = co.clienteid) ".
               "LEFT JOIN medidascotizadas mc ON (mc.id = co.medidaid) ".
               "LEFT JOIN estadocotizacion ec ON (ec.id = co.estadoid) ".
               "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = co.id and pxcp.tipoProceso=1) ".
               "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
               "LEFT JOIN medidas medor ON (medor.id = pmp.medidaid) ".
               "LEFT JOIN usofinal uf  ON (uf.id = co.uso) ".
               "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = co.id and pc.fecha = (SELECT max(fecha) from preciocotizaciones where cotizacionid=co.id)) ".
               "LEFT JOIN tratamientocotizacion tt ON (tt.id = co.tratamientoTermico) ".
               "WHERE 1=1 $q0 GROUP BY co.id, mc.medida, tt.detalle, medor.diametroExterior, medor.espesorNominal, c.razon, pc.precioKilo ; ";

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);

    }

    public function process_actualizar_precio(Request $request)
    {
        $cotizaciones = json_decode($request->get('cotizaciones'));
        $porcentaje = (int) $request->get('porcentaje');
        $carbon = Carbon::now();
        $hoy = $carbon->toDateString();
        foreach ($cotizaciones as $c) {
          $db = DB::table('preciocotizaciones')->where('cotizacionid', '=', $c)->latest('fecha')->first();
          $precioKilo = "";
          $precioMetro = "";
          $precioPieza = "";
          if ($db){
            if ($porcentaje < 0){
              if ($db->precioKilo !== "")
                $precioKilo = $db->precioKilo-((abs($porcentaje)*$db->precioKilo)/100);

              if ($db->precioMetro !== "")
                $precioMetro = $db->precioMetro-((abs($porcentaje)*$db->precioMetro)/100);

              if ($db->precioPieza !== "")
                $precioPieza = $db->precioPieza-((abs($porcentaje)*$db->precioPieza)/100);           
            }
            else{
              if ($db->precioKilo !== "")
                $precioKilo = $db->precioKilo+((abs($porcentaje)*$db->precioKilo)/100);

              if ($db->precioMetro !== "")
                $precioMetro = $db->precioMetro+((abs($porcentaje)*$db->precioMetro)/100);

              if ($db->precioPieza !== "")
                $precioPieza = $db->precioPieza+((abs($porcentaje)*$db->precioPieza)/100); 
            }
          }
          $db1 = DB::table('preciocotizaciones')->insert([
            'cotizacionid'=>$c,
            'precioKilo'=>$precioKilo,
            'precioMetro'=>$precioMetro,
            'precioPieza'=>$precioPieza,
            'fecha'=>$hoy,
            'suba'=>$porcentaje
          ]);
        }

        return "true";
    }

    public function cambio()
    {
        $cambio = DB::table('valorcambio')->orderBy('id', 'DESC')->first();
        return view('venta.cambio', compact('cambio'));
    }

    public function addcambio(Request $request)
    {
        $hoy = Carbon::now();
        $hoy->toDateString();
        $cambio = DB::table('valorcambio')->whereDate('fecha', '=', $hoy)->orderBy('id', 'DESC')->first();
        if ($cambio != null){
            $cambio = DB::table('valorcambio')->update([
                'fecha' => $hoy,
                'cambio' => $request->get('cambio')
            ]);
        }
        else {
            $cambio = DB::table('valorcambio')->insert([
                'fecha' => $hoy,
                'cambio' => $request->get('cambio')
            ]);
            
        }

        return back()->with('success', 'Coeficiente Agregado');
       
    }


    public function lista_precio()
    {        
        $clientes = DB::table('clientes')->get();
        $tipos = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientocotizacion')->get();
        $usos = DB::table('usofinal')->get();
        return view('venta.lista_precio', compact('clientes', 'tipos', 'tratamientos', 'usos'));
    }

    public function buscarlistaprecio(Request $request)
    {
        $consulta = 0;


        if ($request->get('consulta') == 1)
            $consulta = 1;

        if ($consulta > 0){

            $q0 = "";

            $input = $request->all();

            $q0 .= (empty($input['clienteid']))? "": " AND co.clienteid='".$input['clienteid']."'"; 
            $q0 .= (empty($input['costuraid']))? "" : " AND mc.costuraid='".$input['costuraid']."'";
            $q0 .= (empty($input['usoid']))? "" : " AND co.uso='".$input['usoid']."'";
            $q0 .= (empty($input['tratamientoid']))? "" : " AND co.tratamientoTermico='".$input['tratamientoid']."'";

            $sql = "SELECT ".
                   "mc.medida as medida, tt.descripcion as ttermico, medor.diametroExterior as diamext, ".
                   "co.fecha as fecha, medor.espesorNominal as espesor, c.razon as razon, ".
                   "co.codigoPieza as codigoCliente, pc.precioMetro as precioMetro, ".
                   "pc.precioKilo as precioKilo, pc.precioPieza as precioPieza, pc.fecha as fechaPrecio, ".
                   "co.id , mon.descripcion as monedita FROM cotizaciones co ".
                   "LEFT JOIN clientes c ON (c.id = co.clienteid) ".
                   "LEFT JOIN medidascotizadas mc ON (mc.id = co.medidaid) ".
                   "LEFT JOIN estadocotizacion ec ON (ec.id = co.estadoid) ".
                   "LEFT JOIN procesosxcp pxcp ON (pxcp.idCP = co.id and pxcp.tipoProceso=1 ) ".
                   "LEFT JOIN preparacionmp pmp ON (pmp.id = pxcp.procesoid) ".
                   "LEFT JOIN medidas medor ON (medor.id = pmp.medidaid) ".
                   "LEFT JOIN usofinal uf  ON (uf.id = co.uso) ".
                   "LEFT JOIN monedas mon  ON (mon.id = co.tipoMoneda) ".
                   "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = co.id and pc.fecha = (SELECT max(fecha) from preciocotizaciones where cotizacionid=co.id)) ".
                   "LEFT JOIN tratamientocotizacion tt ON (tt.id = co.tratamientoTermico) ".
                   "WHERE 1=1 $q0 ORDER by medida, fechaPrecio desc ; ";
            
            $results = DB::select($sql);

            return response()->json(['resultado'=>$results]);
        }
        else
            return "false";
    }
}
