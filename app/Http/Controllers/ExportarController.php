<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cezpdf;

class ExportarController extends Controller
{
	public function exportarcotizacion($id)
    {
        $db = DB::table('cotizaciones')->where('id', '=', $id)->update([
            'estadoid'=>2
        ]);

    	$sql = 'SELECT '.
    	       "m.*,c.*,m.id as medid,est.largoMaximo as largomaxest,est.largoMinimo as largominest,est.id as ideste, ".
    	       "est.normaid as tiponormaest,est.tipoCostura as  tipocosturaest,est.observaciones as observaeste, ".
    	       "est.medida as med, cl.razon,tr.descripcion as descreventa, tc.descripcion as descostura, ".
    	       "n.descripcion as desnorma, f.descripcion as desforma, uf.descripcion as desusofinal, ".
    	       "e.descripcion as desembalaje, cv.descripcion as condcionventa, c.observacionVenta as observacionventa, ".
    	       "cl.telefonos as telefonos, ccl.contacto as contacto, pc.precioMetro, pc.precioKilo, pc.precioPieza, ".
    	       "vc.cambio, cl.iibb as iibb, tcot.descripcion as tratamientot ".
    	       "FROM  cotizaciones c ".
    	       "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
    	       "LEFT JOIN estadofabricacion tcot ON (tcot.id = c.tratamientotermico) ".
    	       "LEFT JOIN estencilado est ON (est.id = c.estenciladoid) ".
    	       "LEFT JOIN clientes cl ON (cl.id = c.clienteid) ".
    	       "LEFT JOIN reventa tr ON (tr.id = c.tipoReventa) ".
    	       "LEFT JOIN tipocostura tc ON (tc.id = m.costuraid) ".
    	       "LEFT JOIN normas n ON (n.id = m.normaid) ".
    	       "LEFT JOIN formas f ON (f.id = c.formaid) ".
    	       "LEFT JOIN usofinal uf ON (uf.id = c.uso) ".
    	       "LEFT JOIN embalajes e ON (e.id = c.tipoembalaje) ".
    	       "LEFT JOIN condicionventa cv ON (cv.id = c.condicionVenta) ".
    	       "LEFT JOIN contactoclientes ccl ON (ccl.clienteid = cl.id) ".
    	       "LEFT JOIN valorcambio vc ON (vc.fecha = c.fecha) ".
    	       "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and ".
    	       "pc.fecha=(SELECT MAX(fecha) ".
    	       "from preciocotizaciones where cotizacionid=$id)) where c.id=$id LIMIT 1 ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];
    		$idrow = (string)$row->id;
    		$pdf = new Cezpdf('a4');
    		//$pdf->selectFont(public_path().'/fonts/courier.afm');
    		$pdf->selectFont(public_path().'/fonts/Courier.afm');
    		$namefile = uniqid();
    		$path = public_path().'/pdf/archivo'.$namefile.'.pdf';
    		$pdf->ezImage(public_path()."/images/logo3.jpg",0,'550','',0);
    		$pdf->ezImage(public_path()."/images/separar.jpg",0,'550','',0);
    		//$pdf->ezText("<b>Cotización Nº: </b>".$idrow,13);
    		$pdf->ezText("<b>Cotización: </b> ".$row->id,13);
    		$pdf->ezText("<b>Fecha: </b> ".$this->fechaphp($row->fecha),11);
    		$pdf->ezText("\n",10);
    		$pdf->ezText("<b>Datos del Cliente:</b>",12);
    		$pdf->ezText("\n",3);
    		$pdf->ezImage(public_path()."/images/separar2.jpg",0,'550','',0);	
    		$pdf->ezText("<b>Cliente: </b>".$row->razon,10);
    		$pdf->ezText("<b>Teléfono: </b>".$row->telefonos,10);
    		$pdf->ezText("<b>Contacto: </b>".$row->contacto,10);
    		$pdf->ezText("\n\n",10);
    		$pdf->ezText("<b>Según lo solicitado cotizamos a Uds. los siguientes tubos:</b>",12);
    		$pdf->ezText("\n",3);
    		$pdf->ezImage(public_path()."/images/separar2.jpg",0,'550','',0);
    		$pdf->ezText("\n",10);
    		$unidad = "no definida";
    		$preciopasado = $row->precioPasado;
    		$kilogramometro = $row->kilogrametro;
    		if ($preciopasado == "k") {
    			$unidad = "Kg";				
    			if ($row->kilos == '0') {
    				$cantidad = number_format($kilogramometro*$row->metros,2);	
    			}else{
    				$cantidad = $row->kilos;
    			}
    			if (empty($row->precioKilo)) {
    				$precioCotiza = number_format($row->precioMetro/$kilogramometro,2);	
    			}else{
    				$precioCotiza = $row->precioKilo;
    			}			
    		}else if ($preciopasado == "p"){
    			$unidad = "Piezas";
    			$cantidad = $row->piezas;
    			$precioCotiza = $row->precioPieza;
    		}else{
    			$unidad = "Metros";	
    			if ($row->metros == '0') {
    				$cantidad = number_format($row->kilos/$kilogramometro,2);	
    			}else{
    				$cantidad = $row->metros;
    			}
    			if (empty($row->precioMetro)) {
    				$precioCotiza = number_format($row->precioKilo*$kilogramometro,2,'.','');	
    			}else{
    				$precioCotiza = $row->precioMetro;
    			}
    		}
    		if ($row->tipoMoneda=='2'){
    			$tipomoneda = '$';
    		}else{
    			$tipomoneda = 'U$D';
    		}

    		$precio_subtotal = $precioCotiza*$cantidad;
    		$iibb = 0;
    		if ($row->iibb !== "")
    			$iibb = (($row->iibb)/100);

     		$valor_iibb =  ($iibb*$precio_subtotal);
			$valor_iva = $precio_subtotal*0.21;
			$precio_total = $precio_subtotal+$valor_iibb+$valor_iva;

			if (empty($row->largoMinimo) and empty($row->largoMaximo)){
				$lminimo = $row->largoMinEntrega;
				$lmaximo = $row->largoMaxEntrega;
			}else{
				$lminimo = $row->largoMinimo;
				$lmaximo = $row->largoMaximo;
			}	

			$data[] = array('dext'=>$row->diametroExteriorNominal, 'esp'=>$row->espesorNominal, 'dint'=>$row->diametroInteriorNominal, 'tc'=>$row->descostura, 'tt'=>$row->tratamientot, 'norma'=>$row->desnorma, 'lmm'=>$lminimo." / ".$lmaximo, 'cant'=>"$cantidad", 'uni'=>$unidad,'precio'=>(number_format($precioCotiza,2,'.','')),'subtotal'=>(number_format($precio_subtotal,2,'.','')));
			$titles = array('dext'=>'<b>Ø Ext.</b>', 'esp'=>'<b>Esp.</b>', 'dint'=>'<b>Ø Int.</b>', 'tc'=>'<b>T.C.</b>', 'tt'=>'<b>T.T.</b>', 'norma'=>'<b>Norma</b>', 'lmm'=>'<b>Largo Min/Max.</b>', 'cant'=>'<b>Cant.</b>', 'uni'=>'<b>U</b>', 'precio'=>'<b>Precio </b>'.$tipomoneda,'subtotal'=>'<b>Subtotal </b>'.$tipomoneda);
			$pdf->ezTable($data,$titles,'',array('cols' => array('dext'=> array('justification'=>'left','width'=> 40),'esp'=> array('justification'=>'left','width'=> 40),'dint'=> array('justification'=>'left','width'=> 40),'tc'=> array('justification'=>'left','width'=> 40),'tt'=> array('justification'=>'left','width'=> 40),'norma'=> array('justification'=>'left','width'=> 95),'lmm'=> array('justification'=>'left','width'=> 55),'cant'=> array('justification'=>'left','width'=> 40),'uni'=> array('justification'=>'left','width'=> 45),'precio'=> array('justification'=>'left','width'=> 60),'subtotal'=> array('justification'=>'right','width'=> 60)),'xPos'=>'right','xOrientation'=>'left'));

			$pdf->ezText("\n",4);
			$data_precio = array( array('num'=>1,'name'=>'+ IVA 21%','type'=>(number_format($valor_iva,2,'.','')))
			,array('num'=>2,'name'=>'+ IIBB','type'=>(number_format($valor_iibb,2,'.',''))) 
			,array('num'=>3,'name'=>'TOTAL '.$tipomoneda,'type'=>(number_format($precio_total,2,'.','')))
			); 		
			$pdf->ezTable($data_precio,array('name'=>'','type'=>''),'' ,array('cols' => array('name'=> array('justification'=>'left','width'=> 60),'type'=> array('justification'=>'right','width'=> 60)),'showHeadings'=>0,'shaded'=>2,'xPos'=>'right','xOrientation'=>'left'));

			$pdf->ezText("<b>Requerimiento Técnicos</b>",12);
			$pdf->ezText("\n",3);
			$pdf->ezImage(public_path()."/images/separar2.jpg",0,'550','',0);
			$pdf->ezText("<b>Uso: </b>".$row->desusofinal,10);
			$pdf->ezText("<b>Observaciones: </b>".$row->observacionVenta,10);
			$pdf->ezText("\n",10);
			$pdf->ezText("<b>Condiciones de Venta y Pago</b>",12);
			$pdf->ezText("\n",3);
			$pdf->ezImage(public_path()."/images/separar2.jpg",0,'550','',0);  
			$fecha = date("d/m/Y", strtotime ("".$row->fecha." + 10 day"));
			$pdf->ezText("<b>Validez de la oferta: </b>".$fecha,10);
			$pdf->ezText("<b>Condición de Pago: </b>".$row->condcionventa,10);
			$pdf->ezText("<b>Fecha de Entrega: </b>".$this->fechaphp($row->fechaEntrega),10);
			$pdf->ezText("\n",10);	
			$pdf->ezText("<b>El precio será ajustable por variación de precio de materia prima y/o dólar vendedor Bco. Nación Argentina, desde la fecha de pedido hasta la fecha de entrega, Base dólar vendedor (BNA): $ " .$row->cambio .' /U$D  '.$this->fechaphp($row->fecha) ." o se tomara valor de tipo de cambio del día anterior a la facturacion.</b>",10);	
			$pdf->ezText("<b>Los precios indicados son en $tipomoneda por $unidad, más Impuestos. Reajustables por variación de materia prima, mano de obra e insumos.</b>\n",10);
			$pdf->ezText("<b>El valor total estará sujeto a la retención de ingresos brutos especificado de la tabla emitida por ARBA.</b>\n\n\n",10);	

			$pdf->ezText("<b>Datos para realizar transferencias bancaria o depositos:</b>",12);
			$pdf->ezText("\n",3);
			$pdf->ezImage(public_path()."/images/separar2.jpg",0,'550','',0);  
			$pdf->ezText("<b>Nuestra denominación: Traficaño S.A.</b>",10);
			$pdf->ezText("<b>C.U.I.T 30-61075955-2</b>",10);
			$pdf->ezText("<b>Banco Credicoop (191) Sucursal: Villa Insuperable (005)</b>",10);
			$pdf->ezText("<b>Cuenta Corriente en Pesos Numero: 5923/6</b>",10);
			$pdf->ezText("<b>C.B.U. :19100056 55000500592364</b>\n\n",10);
			$pdf->ezText("<b>Atentamente</b>",10);		
			$pdf->ezText("                            <b>P/Traficaño S.A.</b>",10);


    		$content = $pdf->ezOutput();
    		file_put_contents($path, $content);
    		$headers = [
    			'Content-Type'=> 'application/pdf',
    			'Content-Disposition'=> 'attachment;filename="nombre.pdf"'
    		];
    		return response()->download(public_path().'/pdf/archivo'.$namefile.'.pdf', 'archivo'.$namefile.'.pdf', $headers)->deleteFileAfterSend(true);
    	}
    }

    public function exportarorden($id)
    {
    	$sql = 'SELECT '.
    	       "op.estadoid as est,op.ordenReferencia as orefencia,vxo.*,vxo.id as idverop,vxo.critico as critico, ".
    	       "vxo.urgente as urgente,op.cotizacionid as idCoti, m.*,m.id as medid,est.largoMaximo as largomaxest, ".
    	       "est.largoMinimo as largominest,est.id as ideste, est.normaid as tiponormaest, ".
    	       "est.tipoCostura as  tipocosturaest,est.observaciones as observaeste,est.medida as med, ".
    	       "vxo.observacionProduccion as obs_p, pc.precioMetro, pc.precioKilo,pc.precioPieza,cl.telefonos, ".
    	       "cl.razon as razon,vxo.fechaPedido as fechaped, vxo.fechaPrometida as fechapro,c.mem as memo, ".
    	       "tco.descripcion as ttcot,eop.descripcion as estado,tc.descripcion as tipocosturamed, ".
    	       "emb.descripcion as embalaje,cer.descripcion as certificado, tr.descripcion as tiporev, ".
    	       "no.descripcion as normamed, uf.descripcion as uso, tace.descripcion as tipoaceronombre, ".
    	       "form.descripcion as forma FROM ordenproduccion op ".
    	       "INNER JOIN versionesxorden vxo ON (vxo.ordenProduccion = op.id) ".
    	       "LEFT JOIN formas form ON (form.id = vxo.formaid) ".
    	       "LEFT JOIN clientes cl on (cl.id = vxo.clienteid) ".
    	       "LEFT JOIN estadosop eop on (eop.id = vxo.estadoid) ".
    	       "LEFT JOIN medidascotizadas m ON (m.id = vxo.medidaid) ".
    	       "LEFT JOIN tipocostura tc on (tc.id = m.costuraid) ".
    	       "LEFT JOIN certificado cer on (cer.id = vxo.certificadoid) ".
    	       "LEFT JOIN embalajes emb on (emb.id = vxo.tipoEmbalaje) ".
    	       "LEFT JOIN normas no on (no.id = m.normaid) ".
    	       "LEFT JOIN usofinal uf on (uf.id = vxo.uso) ".
    	       "LEFT JOIN estencilado est ON (est.id = vxo.estenciladoid) ".
    	       "LEFT JOIN reventa tr ON (tr.id = vxo.tipoReventa) ".
    	       "LEFT JOIN cotizaciones c ON (c.id = op.cotizacionid) ".
    	       "LEFT JOIN tratamientocotizacion tco ON (tco.id = vxo.tratamientoTermico) ".
    	       "LEFT JOIN tipoacero tace ON (tace.id = vxo.tipoAcero) ".
    	       "LEFT JOIN preciocotizaciones pc ON (pc.cotizacionid = c.id and pc.fecha=(SELECT MAX(fecha) ".
    	       "from preciocotizaciones where cotizacionid=c.id)) where vxo.id=$id LIMIT 1 ;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];
    		$db = "UPDATE versionesxorden set copia=copia+1 where id=$id ;";
    		$res1 = DB::select($db);
    		
    		$NRO_ORDEN = $row->ordenProduccion;
    	    $NRO_ORDEN_REFENCIA = $row->orefencia;
    		$CLIENTE = $row->razon;

            $FECHAPROMETIDA = "0000-00-00";

            if(isset($row->fechapro)){
        		$FECHAPROMETIDA = $this->fechaphp($row->fechapro);
            }

    		$FECHAPEDIDO = $this->fechaphp($row->fechaped);
    		$OBSERVACIONES_P = $row->obs_p;
    	    $MEMO = explode(',',$row->memo);
    	    $fechaexp = explode("/",$FECHAPROMETIDA);

    	    if (!empty($fechaexp[2]))
    	   		$SEMANA = date('W', mktime(0,0,0,$fechaexp[1] ,$fechaexp[0],$fechaexp[2]));
    	    else
    	        $SEMANA = $row->semanaPrometida;

    	     $ORDEN_COMPRA = $row->ordenCompra;
    	     $DEXT_NOMINAL = $row->diametroExteriorNominal;
    	     $DINT_NOMINAL = $row->diametroInteriorNominal;
    	     $ESP_NOMINAL = $row->espesorNominal;
    	     $DEXT_MINIMO = $row->diametroExteriorMinimo;
    	     $DINT_MINIMO = $row->diametroInteriorMinimo;
    	     $ESP_MINIMO = $row->espesorMinimo;
    	     $DEXT_MAXIMO = $row->diametroExteriorMaximo;
    	     $DINT_MAXIMO = $row->diametroInteriorMaximo;
    	     $ESP_MAXIMO = $row->espesorMaximo;
    		
    		$TCOST_MEDIDA =  $row->tipocosturamed;
    		$CODIGO_CLIENTE = $row->codigoPieza;
    	        $FORMA = $row->forma;

    		if (empty($row->kilogrametro) or $row->kilogrametro==0.00)
    	        $row->kilogrametro = $this->kilogrametro($row->diametroExteriorNominal,$row->espesorNominal);

    		$KGM = round($row->kilogrametro,3);
    		
    	        if ($row->kilos == '0'){
    	            $KILOS = round($KGM*$row->metros);
    		}else{
    	            $KILOS = $row->kilos;
    	        }
    	        
    	        if ($row->metros == '0'){
    	            $METROS = number_format($row->kilos/$KGM,2);	
    		}else{
    	            $METROS = $row->metros;
    		}

    		$PIEZAS = $row->piezas;
			$DUREZA_MINIMA = $row->durezaMinima;
			$DUREZA_MAXIMA = $row->durezaMaxima;
			$RUGOSIDAD = $row->rugosidad;
			$ENSAYO_EXPANSION = $row->ensayoExpansion;
			$EMBALAJE = $row->embalaje;
		    $TCOTIZACION = $row->ttcot;
			$CERTIFICADO = $row->certificado;
			$NORMA = $row->normamed;
			$USO = $row->uso;
			$LARGO_MINIMO = $row->largoMinEntrega;
			$LARGO_MAXIMO = $row->largoMaxEntrega;
			$LARGO_MINIMO_MULTIPLO = $row->largoMinimo;
			$LARGO_MAXIMO_MULTIPLO = $row->largoMaximo;

			if ($DEXT_MAXIMO>0){
			    $TOLERANCIA_MAS_DIAEXT = abs($DEXT_MAXIMO - $DEXT_NOMINAL);
			}else{
			    $TOLERANCIA_MAS_DIAEXT = 0;
			}
			
			if ($DEXT_MINIMO>0){
			    $TOLERANCIA_MENOS_DIAEXT = abs($DEXT_NOMINAL - $DEXT_MINIMO);
			}else{
			    $TOLERANCIA_MENOS_DIAEXT = 0;
			}
			
			if ($DINT_MAXIMO>0){
			    $TOLERANCIA_MAS_DIAINT = abs($DINT_MAXIMO - $DINT_NOMINAL);
			}else{
			    $TOLERANCIA_MAS_DIAINT = 0;
			}
			
			if ($DINT_MINIMO>0){
			    $TOLERANCIA_MENOS_DIAINT = abs($DINT_NOMINAL - $DINT_MINIMO);
			}else{
			    $TOLERANCIA_MENOS_DIAINT = 0;
			}
			
			if ($ESP_MAXIMO>0){
			    $TOLERANCIA_MAS_ESP = abs($ESP_MAXIMO - $ESP_NOMINAL);
			}else{
			    $TOLERANCIA_MAS_ESP = 0;
			}
			
			if ($ESP_MINIMO>0){
			    $TOLERANCIA_MENOS_ESP = abs($ESP_NOMINAL - $ESP_MINIMO);
			}else{
			    $TOLERANCIA_MENOS_ESP = 0;
			}

    		$DUREZA = '';
    		$TIPOACERO = $row->tipoaceronombre;
    		$COLOR = array(0,0,0);
    		$CRITICO = $row->critico;                          
    		$URGENTE = $row->urgente;
    	}
    	$pdf = new Cezpdf('LEGAL');
    	$pdf->selectFont(public_path().'/fonts/Helvetica.afm');
    	//$pdf->ezStream();
    	$pdf->ezStartPageNumbers('120','20',8,'left','Página {PAGENUM} de {TOTALPAGENUM}  F:7.5.0.0.1',1);
    	$namefile = uniqid();
    	$path = public_path().'/pdf/archivo'.$namefile.'.pdf';

    	if($CRITICO==1 and $URGENTE==0){
    	    $pdf->ezImage(public_path()."/images/critico.jpg",'','200','','');
    	    
    	}elseif($URGENTE==1 and $CRITICO==1){
    	    $dataxurg[] = array('urgente'=>"URGENTE",'critico'=>"CRÍTICO");
    	    $titlesxurg = array('urgente'=>'<b>urgente</b>','critico'=>'<b>critico</b>');
    	    $pdf->ezTable($dataxurg,$titlesxurg,'',array('cols' => array('urgente'=> array('justification'=>'left'),'critico'=> array('justification'=>'right')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'fontSize'=>20,'textCol' =>array(255,0,0) ,'width'=>560));
    	    $pdf->ezText("\n",1);
    	}elseif($URGENTE==1 and $CRITICO==0){
    	    $dataxurg2[] = array('urgente'=>"URGENTE");
    	    $titlesxurg2 = array('urgente'=>'<b>urgente</b>');
    	    $pdf->ezTable($dataxurg2,$titlesxurg2,'',array('cols' => array('urgente'=> array('justification'=>'left')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'fontSize'=>20,'textCol' =>array(255,0,0) ,'width'=>560));
    	    $pdf->ezText("\n",1);
    	}
    	if($CRITICO==1 OR $URGENTE==1){
    	    $COLOR = array(255,0,0);
    	}

    	$datax1[] = array('titulo'=>$row->tiporev);
		$titlesx1 = array('titulo'=>'<b>titulo</b>');
		$pdf->ezTable($datax1,$titlesx1,'',array('cols' => array('titulo'=> array('justification'=>'centre','width'=>190)),'showHeadings'=>0,'shaded'=>0,'showLines'=>1,'fontSize'=>20,'textCol' => $COLOR,'width'=>560));
		$pdf->ezText("\n",1);

		$data_m1[] = array('cliente'=>"<b>$CLIENTE</b>",'orden'=>"<b>ORDEN Nº:".$NRO_ORDEN." / ".(empty($row->version)?1:$row->version)."</b>");
		$titles_m1 = array('cliente'=>'<b>cliente</b>','orden'=>"<b>orden</b>");
		$pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('cliente'=> array('justification'=>'left'),'orden'=> array('justification'=>'right')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>14,'textCol' => $COLOR,'width'=>560));

		$data_m2[] = array('telefono'=>"Tel:".$row->telefonos,'ordenReferencia'=>"REFERENCIA Nº: $NRO_ORDEN_REFENCIA");
		$titles_m2 = array('telefono'=>'<b>telefono</b>','ordenReferencia'=>"<b>ordenReferencia</b>");
		$pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('telefono'=> array('justification'=>'left'),'ordenReferencia'=> array('justification'=>'right')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => $COLOR,'width'=>560));
        $pdf->ezText("\n",2);

        $data_m3[] = array('fechaPedido'=>"FECHA PEDIDO: $FECHAPEDIDO",'fechaPrometida'=>"FECHA PROMETIDA: $FECHAPROMETIDA",'semanaPrometida'=>"SEM. PROMETIDA: $SEMANA");
		$titles_m3 = array('fechaPedido'=>'<b>fechaPedido</b>','fechaPrometida'=>"<b>fechaPrometida</b>",'semanaPrometida'=>"<b>semanaPrometida</b>");
		$pdf->ezTable($data_m3,$titles_m3,'',array('cols' => array('fechapedido'=> array('justification'=>'left'),'fechaPrometida'=> array('justification'=>'left'),'semanaPrometida'=> array('justification'=>'right')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => $COLOR,'width'=>560));
		$pdf->ezText("\n",2);

		$data_m4[] = array('uso'=>"USO:$USO",'realizo'=>"REALIZO OP:");
		$titles_m4 = array('uso'=>'<b>uso</b>','realizo'=>"<b>realizo</b>");
		$pdf->ezTable($data_m4,$titles_m4,'',array('cols' => array('uso'=> array('justification'=>'left','width'=>380),'realizo'=> array('justification'=>'left','width'=>180)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => $COLOR,'width'=>560));

		$data_m5[] = array('forma'=>"FORMA:$FORMA",'controlo'=>"CONTROLO OP:");
		$titles_m5 = array('forma'=>'<b>forma</b>','controlo'=>"<b>controlo</b>");
		$pdf->ezTable($data_m5,$titles_m5,'',array('cols' => array('forma'=> array('justification'=>'left','width'=>380),'controlo'=> array('justification'=>'left','width'=>180)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => $COLOR,'width'=>560));

		$titles_m6 = array('codigoCliente'=>'<b>codigoCliente</b>','ordenCompre'=>"<b>ordenCompre</b>");
		$pdf->ezTable($data_m6,$titles_m6,'',array('cols' => array('codigoCliente'=> array('justification'=>'left','width'=>380),'ordenCompre'=> array('justification'=>'left','width'=>180)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => $COLOR,'width'=>560));
	    $pdf->ezText("\n",4);

	    $data_m7[] = array('dext'=>"$DEXT_NOMINAL\n(+$TOLERANCIA_MAS_DIAEXT/-$TOLERANCIA_MENOS_DIAEXT)", 'esp'=>"$ESP_NOMINAL\n(+$TOLERANCIA_MAS_ESP/-$TOLERANCIA_MENOS_ESP)", 'dint'=>"$DINT_NOMINAL\n(+$TOLERANCIA_MAS_DIAINT/-$TOLERANCIA_MENOS_DIAINT)", 'sae'=>$TIPOACERO, 'metros'=>$METROS, 'km'=>$KGM, 'kilos'=>$KILOS, 'piezas'=>$PIEZAS);
		$titles_m7 = array('dext'=>'<b>DIAM.EXT.</b>', 'esp'=>'<b>ESPESOR</b>', 'dint'=>'<b>DIAM.INT.</b>', 'sae'=>'<b>SAE</b>', 'metros'=>'<b>METROS</b>', 'km'=>'<b>KG/MT</b>', 'kilos'=>'<b>KILOS</b>', 'piezas'=>'<b>PIEZAS</b>');
		$pdf->ezTable($data_m7,$titles_m7,'',array('cols' => array('dext'=> array('justification'=>'centre'),'esp'=> array('justification'=>'centre'),'dint'=> array('justification'=>'centre'),'sae'=> array('justification'=>'centre'),'metros'=> array('justification'=>'centre'),'km'=> array('justification'=>'centre'),'kilos'=> array('justification'=>'centre'),'piezas'=> array('justification'=>'centre')),'colGap' => 12,'showHeadings'=>1,'shaded'=>0,'fontSize'=>10,'textCol' => array(0,0,255),'showLines'=>0,'width'=>585));
	        $pdf->ezText("\n",4);

	    $data_m8[] = array('tc'=>"$TCOST_MEDIDA", 'dureza'=>"$DUREZA_MINIMA/$DUREZA_MAXIMA", 'estf'=>"$TCOTIZACION", 'rugosidad'=>$RUGOSIDAD, 'ee'=>$ENSAYO_EXPANSION, 'certificado'=>$CERTIFICADO, 'norma'=>$NORMA);
		$titles_m8 = array('tc'=>'<b>T/COST.</b>', 'dureza'=>'<b>DUREZA</b>', 'estf'=>'<b>EST.FAB.</b>', 'rugosidad'=>'<b>RUGOSIDAD</b>', 'ee'=>'<b>ENS.DE EXP.</b>', 'certificado'=>'<b>CERTIFICADO</b>', 'norma'=>'<b>NORMA</b>');
		$pdf->ezTable($data_m8,$titles_m8,'',array('cols' => array('tc'=> array('justification'=>'centre'),'dureza'=> array('justification'=>'centre'),'estf'=> array('justification'=>'centre'),'rugosidad'=> array('justification'=>'centre'),'ee'=> array('justification'=>'centre'),'certificado'=> array('justification'=>'centre'),'norma'=> array('justification'=>'centre')),'colGap' => 12,'showHeadings'=>1,'shaded'=>0,'fontSize'=>10,'textCol' => array(0,0,255),'showLines'=>0,'width'=>585));
	        $pdf->ezText("\n",4);

	    $data_m9[] = array('enblanco'=>"",'largominimo'=>"LARGO MIN: $LARGO_MINIMO",'largominmultiplo'=>"L. MIN. MÚLTIPLO: $LARGO_MINIMO_MULTIPLO");
		$titles_m9 = array('enblanco'=>"<b>uso</b>",'largominimo'=>'<b>largominimo</b>', 'largominmultiplo'=>"<b>largominmultiplo</b>");
		$pdf->ezTable($data_m9,$titles_m9,'',array('cols' => array('largominimo'=> array('justification'=>'left','width'=>150),'largominmultiplo'=> array('justification'=>'left','width'=>150),'enblanco'=> array('justification'=>'right','width'=>260)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10  ,'textCol' => array(0,0,255),'width'=>560));

		$data_m10[] = array('embalaje'=>"EMBALAJE: $EMBALAJE",'largomaximo'=>"LARGO MAX: $LARGO_MAXIMO",'largomaxmultiplo'=>"L. MAX. MÚLTIPLO: $LARGO_MAXIMO_MULTIPLO");
		$titles_m10 = array('embalaje'=>"<b>embalaje</b>",'largomaximo'=>'<b>largomaximo</b>', 'largomaxmultiplo'=>"<b>largomaxmultiplo</b>");
		$pdf->ezTable($data_m10,$titles_m10,'',array('cols' => array('largomaximo'=> array('justification'=>'left','width'=>150),'largomaxmultiplo'=> array('justification'=>'left','width'=>150),'embalaje'=> array('justification'=>'left')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => array(0,0,255),'width'=>560));

		$data_m11[] = array('observaciones'=>"OBSERVACIONES: $OBSERVACIONES_P");
		$titles_m11 = array('observaciones'=>"<b>observaciones</b>");
		$pdf->ezTable($data_m11,$titles_m11,'',array('cols' => array('observaciones'=> array('justification'=>'left')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'textCol' => array(0,0,255),'width'=>560));
		$pdf->ezText("\n",4);

		$y = 0;
		if($CRITICO==1 OR $URGENTE==1){
            if($LARGO_MAXIMO_MULTIPLO>0)
                $pdf->ellipse(500,$y+680,90,30);
            if($MEMO[0]==1 or $MEMO[1]==1)
                $pdf->ellipse(45,$y+764,35,20);
            if($MEMO[0]==3 or $MEMO[1]==3)
                $pdf->ellipse(125,$y+764,35,20);
            if($MEMO[0]==2 or $MEMO[1]==2)
                $pdf->ellipse(205,$y+764,35,20);
        }else{
            if($LARGO_MAXIMO_MULTIPLO>0)
                $pdf->ellipse(500,$y+715,90,30);
            if($MEMO[0]==1 or $MEMO[1]==1)
                $pdf->ellipse(45,$y+797,35,20);
            if($MEMO[0]==3 or $MEMO[1]==3)
                $pdf->ellipse(125,$y+797,35,20);
            if($MEMO[0]==2 or $MEMO[1]==2)
                $pdf->ellipse(205,$y+797,35,20);
        }

        /////////////FIN DEL ARCHIVO ESTANDAR///////////////
        $table = array('verpreparacionmp'
                    ,'verhorno'
                    , 'verbatea'
                    , 'verpunta'
                    , 'vertrefila'
                    , 'verenderezadora'
                    , 'vercorte'
                    , 'vereddycurrent'
                    , 'verpruebah'
                    , 'verestencilado'
                    , 'verempaquetado'
                    , 'vercontrol'
                    , 'verentrega'
                    , 'verservicio'
                    , 'vercertificado');

        $sql3 = 'SELECT '.
                "mp.*,m.id as medid,m.medida,m.diametroExterior as dexor, ".
                "m.espesorNominal as espor,tc.descripcion as nomCostura, ".
                "m.largoMaximo as largoMax, m.largoMinimo as largoMin, pro.razon as provee, ".
                "ta.descripcion as tipoAcero ".
                "from preparacionmp mp ".
               	"LEFT JOIN medidas m ON (m.id = mp.medidaid) ".
               	"LEFT JOIN paquetes paq ON (paq.medidaid = m.id) ".
               	"LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
               	"LEFT JOIN tipocostura tc  ON (tc.id = m.tipoCostura) ".
               	"LEFT JOIN tipoacero ta  ON (ta.id = m.tipoAceroSAE) ".
               	"where mp.id=$id ;";

        $res3 = DB::select($sql3);
        if (count($res3)>0){
        	$row = $res3[0];
	        $KG_MT_M = $this->kilogrametro($row->dexor,$row->espor);
	    	$LARGO_TUBO_M = (($row->largoMax+$row->largoMin)/2000);

	    	$sql4 = 'SELECT '.
	    	        "orden FROM ordenprocesoop WHERE idOrdenProduccion=$id ;";
	    	$res4 = DB::select($sql4);
	    	if (count($res4)>0){
	    		$row = $res4[0];
	    		$procesos = explode(",",$row->orden);
                $cont = 1;
                foreach ($procesos as $valt){
                    $parser = explode("*",$valt);
                    $val = $parser[0];
                    $idprocparticular = $parser[1];
 				    $idp=0;
                    $ix = $val-1;
				 	if ($table[$ix] == 'vertrefila'){
				 		$LARGO_TUBO_M = $LARGO_TUBO_M - 0.2;
			 	   		$KG_MT_M = $this->vertrefila($idprocparticular, $id, $KG_MT_M, $LARGO_TUBO_M, [$pdf, $KILOS, $KGM, $COLOR]);
				 	}else{
				 		$this->procesos_imp($table[$ix], $idprocparticular, [$pdf, $KILOS, $KGM, $COLOR]);
				 	}
     		    }
	    	}
        }

        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);

        $datax[] = array('titulo'=>"CONTROL FINAL");
        $titlesx = array('titulo'=>'<b>titulo</b>');
        $pdf->ezTable($datax,$titlesx,'',array('cols' => array('titulo'=> array('justification'=>'centre','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'fontSize'=>10,'width'=>560));
        $pdf->ezText("\n",8);

        $data7[] = array('dexts'=>"$DEXT_NOMINAL\nMIN     MAX\n$DEXT_MINIMO     $DEXT_MAXIMO", 'dextm'=>"", 'esps'=>"$ESP_NOMINAL\nMIN     MAX\n$ESP_MINIMO     $ESP_MAXIMO", 'espm'=>"", 'dints'=>"$DINT_NOMINAL\nMIN     MAX\n$DINT_MINIMO     $DINT_MAXIMO", 'dintm'=>"");
        $titles7 = array('dexts'=>'<b>Ø Ext.Solicitado</b>', 'dextm'=>'<b>Ø Ext.Medido</b>', 'esps'=>'<b>Esp. Solicitado</b>', 'espm'=>'<b>Esp. Medido</b>', 'dints'=>'<b>Ø Int. Solicitado</b>', 'dintm'=>'<b>Ø Int. Medido</b>');
        $pdf->ezTable($data7,$titles7,'',array('cols' => array('dexts'=> array('justification'=>'centre'),'dextm'=> array('justification'=>'centre'),'esps'=> array('justification'=>'centre'),'espm'=> array('justification'=>'centre'),'dints'=> array('justification'=>'centre'),'dintm'=> array('justification'=>'centre')),'colGap' => 6,'showHeadings'=>1,'shaded'=>0,'showLines'=>1,'fontSize'=>10,'textCol' => array(255,0,0),'width'=>560));
        $pdf->ezText("\n",4);

        $data8[] = array('durezas'=>"$DUREZA(HRB)", 'durezam'=>"", 'abos'=>"", 'abom'=>"", 'aplass'=>"", 'kgm'=>"");
        $titles8 = array('durezas'=>'<b>Dureza Solicitado</b>', 'durezam'=>'<b>Dureza Medida</b>', 'abos'=>'<b>Abocardado Solicitado</b>', 'abom'=>'<b>Abocardado Medido</b>', 'aplass'=>'<b>Aplastado Block</b>', 'kgm'=>'<b>Kg/Mt</b>');
        $pdf->ezTable($data8,$titles8,'',array('cols' => array('durezas'=> array('justification'=>'centre'),'durezam'=> array('justification'=>'centre'),'abos'=> array('justification'=>'centre'),'abom'=> array('justification'=>'centre'),'aplass'=> array('justification'=>'centre'),'kgm'=> array('justification'=>'centre')),'colGap' => 6,'showHeadings'=>1,'shaded'=>0,'showLines'=>1,'fontSize'=>10,'textCol' => array(255,0,0),'width'=>560));
        $pdf->ezText("\n",4);

        $data9 = array(array('Nº Paquete'=>"",'Nº Trazabilidad'=>"",'Longitud c/Tubo'=>"", 'Cantidad Tubos'=>"", 'Metros'=>"", 'Kilos'=>"", 'Kilos Balanza'=>""),array('Nº Paquete'=>"",'Nº Trazabilidad'=>"",'Longitud c/Tubo'=>"", 'Cantidad Tubos'=>"", 'Metros'=>"", 'Kilos'=>"", 'Kilos Balanza'=>""),array('Nº Paquete'=>"",'Nº Trazabilidad'=>"",'Longitud c/Tubo'=>"", 'Cantidad Tubos'=>"", 'Metros'=>"", 'Kilos'=>"", 'Kilos Balanza'=>""),array('Nº Paquete'=>"",'Nº Trazabilidad'=>"",'Longitud c/Tubo'=>"", 'Cantidad Tubos'=>"", 'Metros'=>"", 'Kilos'=>"", 'Kilos Balanza'=>""),array('Nº Paquete'=>"",'Nº Trazabilidad'=>"",'Longitud c/Tubo'=>"", 'Cantidad Tubos'=>"", 'Metros'=>"", 'Kilos'=>"", 'Kilos Balanza'=>""),array('Nº Paquete'=>"TOTALES",'Nº Trazabilidad'=>"",'Longitud c/Tubo'=>"", 'Cantidad Tubos'=>"", 'Metros'=>"", 'Kilos'=>"", 'Kilos Balanza'=>""));
        //$titles9 = array('np'=>'<b>Nº Paquete</b>','nt'=>'<b>Nº Trazabilidad</b>','lt'=>'<b>Longitud c/Tubo</b>', 'ct'=>'<b>Cantidad Tubos</b>', 'mt'=>'<b>Metros</b>', 'kl'=>'<b>Kilos</b>', 'dintm'=>'<b>Kilos Balanza</b>');
        $pdf->ezTable($data9,'','',array('cols' => array('np'=> array('justification'=>'centre'),'nt'=> array('justification'=>'centre'),'lt'=> array('justification'=>'centre'),'ct'=> array('justification'=>'centre'),'mt'=> array('justification'=>'centre'),'kl'=> array('justification'=>'centre'),'dintm'=> array('justification'=>'centre')),'colGap' => 6,'showHeadings'=>1,'shaded'=>0,'showLines'=>2,'fontSize'=>10,'textCol' => array(255,0,0),'width'=>560));
        $pdf->ezText("\n",12);
        
        $pdf->ezText("<b>Aprobado por:_____________</b>",10, array('justification'=>'right'));
        $pdf->ezText("\n",2);
        $pdf->ezText("<b><b>Fecha:___/___/______</b>",10, array('justification'=>'right'));
        $pdf->ezText("\n",2);
        $pdf->ezText("<b>Observaciones:</b>",10);
        $pdf->ezText("\n",2);
        $pdf->ezText("<b>Nota tecnica:</b>",10);

    	$content = $pdf->ezOutput();
    	file_put_contents($path, $content);
    	$headers = [
    		'Content-Type'=> 'application/pdf',
    		'Content-Disposition'=> 'attachment;filename="nombre.pdf"'
    	];
    	return response()->download(public_path().'/pdf/archivo'.$namefile.'.pdf', 'archivo'.$namefile.'.pdf', $headers)->deleteFileAfterSend(true);

    }

    public function procesos_imp($metodo, $id, $data){
    	if ($metodo == 'verpreparacionmp'){
    		$this->verpreparacionmp($id, $data);
    	}
    	else if ($metodo == 'verhorno'){
    		$this->verhorno($id, $data);
    	}
    	else if ($metodo == 'verbatea'){
    		$this->verbatea($id, $data);
    	}
    	else if ($metodo == 'verpunta'){
    		$this->verpunta($id, $data);
    	}
    	else if ($metodo == 'verenderezadora'){
    		$this->verenderezadora($id, $data);
    	}
    	else if ($metodo == 'vercorte'){
    		$this->vercorte($id, $data);
    	}
    	else if ($metodo == 'vereddycurrent'){
    		$this->vereddycurrent($id, $data);
    	}
    	else if ($metodo == 'verpruebah'){
    		$this->verpruebah($id, $data);
    	}
    	else if ($metodo == 'verestencilado'){
    		$this->verestencilado($id, $data);
    	}
    	else if ($metodo == 'verempaquetado'){
    		$this->verempaquetado($id, $data); 
    	}
    	else if ($metodo == 'verentrega'){
    		$this->verentrega($id, $data); 
    	}
    	else if ($metodo == 'verservicio'){
    		$this->verservicio($id, $data); 
    	}
    	else if ($metodo == 'vercertificado'){
    		$this->vercertificado($id, $data); 
    	}
    	else {

    	}
    }

    public function verhorno($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "h.*,th.descripcion as hornoTipo ".
    	       "from horno h ".
    	       "LEFT JOIN tipohorno th ON(th.id=h.tipoHornoid) ".
    	       "where h.id=$id ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];
    		$OBSERVACION_HORNO = $row->observaciones;

            $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
            
            $data_m1[] = array('titulo'=>"<b>HORNO:</b>");
            $titles_m1 = array('titulo'=>'<b>titulo</b>');
            $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
                                            
            $data_m2[] = array('hrb'=>"HRB ENT:",'hrbsalida'=>"HRB SALIDA:",'aboc'=>"ABOC:");
            $titles_m2 = array('hrb'=>'<b>hrb</b>','hrbsalida'=>"<b>hrbsalida</b>",'aboc'=>"<b>aboc</b>");
            $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('hrb'=> array('justification'=>'left','width'=>150),'hrbsalida'=> array('justification'=>'left','width'=>150),'aboc'=> array('justification'=>'left','width'=>260)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));	
            
            $data_m3[] = array('Observaciones'=>"Observaciones: $OBSERVACION_HORNO",'realizo'=>"____________/____________");
            $titles_m3 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
            $pdf->ezTable($data_m3,$titles_m3,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
            $pdf->ezText("\n",2);	
    	}

    	return true;
   	}

    public function verpruebah($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "ph.* from pruebahidraulica ph ".
    	       "where ph.id=$id ;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];

    		$OBSERVACION_PRUEBA = $row->observaciones;

	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	        //$pdf->ezText("\n",2);
	        
	        $data_m1[] = array('titulo'=>"<b>PRUEBA HIDRAULICA: Presión de Prueba(kg/cm2)</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_PRUEBA",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);
    	}

    	return true;
    }

    public function vercertificado($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "c.*,tc.detalle as detalleCertificado from procesocertificado c ".
    	       "LEFT JOIN certificado tc ON (tc.id = c.certificadoid) ".
    	       "where c.id=$id ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];
    		$OBSERVACION_CERTIFICADO = $row->observaciones;

        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
        //$pdf->ezText("\n",2);
        
        $data_m1[] = array('titulo'=>"<b>CERTIFICADO:</b>");
        $titles_m1 = array('titulo'=>'<b>titulo</b>');
        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
	
        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_CERTIFICADO",'realizo'=>"____________/____________");
        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
        $pdf->ezText("\n",2);
    	}
    	return true;
    }

    public function verservicio($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "s.*, tc.descripcion as descripcionCentro ".
    	       "from servicio s ".
    	       "LEFT JOIN tipocentro tc ON(tc.id = s.tipoCentroid) ".
    	       "WHERE s.id=$id ;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];

    		$OBSERVACIONES_SERVICIO = $row->observaciones;
	
	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	        
	        $data_m1[] = array('titulo'=>"<b>SERVICIO:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACIONES_SERVICIO",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);
    	}

    	return true;
   	}

    public function verentrega($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       " e.*,te.descripcion as descripcionEntrega, tra.razon as transportenombre ".
    	       "from entrega e ".
    	       "LEFT JOIN tipoentrega te ON (te.id = e.tipoEntregaid) ".
    	       "LEFT JOIN transportes tra ON (tra.id = e.transporteid) ".
    	       "where e.id=$id ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];
    		$OBSERVACION_ENTREGA = $row->observaciones;

	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	        //$pdf->ezText("\n",2);
	        
	        $data_m1[] = array('titulo'=>"<b>ENTREGA:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_ENTREGA",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);
    	}

    	return true;

   	}

    public function verestencilado($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "e.* from estencilado e where e.id=$id;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];
    		$OBSERVACION_ESTENCILADO = $row->observaciones;

	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	        //$pdf->ezText("\n",2);
	        
	        $data_m1[] = array('titulo'=>"<b>ESTENCILADO:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_ESTENCILADO",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);
    	}

    	return true;
   	}

    public function vereddycurrent($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "e.* from eddycurrent e where e.id=$id ;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];
    		$OBSERVACION_EDDYCURRENT = $row->observaciones;
        
	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	        //$pdf->ezText("\n",2);
	        
	        $data_m1[] = array('titulo'=>"<b>EDDYCURRENT:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_EDDYCURRENT",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);

    	}

    	return true;
   	}

    public function vercorte($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "c.*, tc.descripcion as corteTipo ".
			   "from corte c ".
			   "LEFT JOIN tipocorte tc ON(tc.id = c.tipoCorteid) ".
			   "where c.id=$id ;";

		$res = DB::select($sql);

		if (count($res)>0){
			$row = $res[0];

			$OBSERVACION_CORTE = $row->observaciones;

	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	        
	        $data_m1[] = array('titulo'=>"<b>CORTE:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_CORTE",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);
		}

		return true;
    }

    public function verenderezadora($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "e.*,te.descripcion as enderezadoTipo from enderezadora e ".
    	       "LEFT JOIN tipoenderezado te ON (te.id = e.tipo)	".
    	       "where e.id=$id ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];

    		$OBSERVACION_ENDEREZADORA = $row->observaciones;

	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
	                
	        $data_m1[] = array('titulo'=>"<b>ENDEREZADORA:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_ENDEREZADORA",'realizo'=>"____________/____________");
	        $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);

    	}

    	return true;
    }

    public function verpunta($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "p.observaciones as observaciones,p.id from punta p ".
    	       "where p.id=$id ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];

    		$OBSERVACIONES_PUNTA = $row->observaciones;
	
			$pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);

		    $data_m1[] = array('titulo'=>"<b>PUNTA:</b>");
		    $titles_m1 = array('titulo'=>'<b>titulo</b>');
		    $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
			
		    $data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACIONES_PUNTA",'realizo'=>"Cant.Puntas[           ]       ____________/____________");
		    $titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
		    $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>300),'realizo'=> array('justification'=>'rigth','width'=>260)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
		    $pdf->ezText("\n",2);
    	}

    }

    public function verbatea($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "b.*,tb.descripcion as bateatipo from batea b ".
    	       "LEFT JOIN tipobatea tb ON (tb.id = b.tipoBateaid) ".
    	       "where b.id=$id ;";

    	$res = DB::select($sql);

    	if (count($res)>0){
    		$row = $res[0];

    		$OBSERVACION_BATEA = $row->observaciones;

	        $pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);

	        
	        $data_m1[] = array('titulo'=>"<b>BATEA:</b>");
	        $titles_m1 = array('titulo'=>'<b>titulo</b>');
	        $pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		
	        $data_m3[] = array('Observaciones'=>"Observaciones: $OBSERVACION_BATEA",'realizo'=>"____________/____________");
	        $titles_m3 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
	        $pdf->ezTable($data_m3,$titles_m3,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
	        $pdf->ezText("\n",2);
    	}

    	return true;
    }

    public function verpreparacionmp($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "mp.*,m.id as medid,m.medida,m.diametroExterior as dexor, ".
               "m.espesorNominal as espor,tc.descripcion as nomCostura, ".
               "m.largoMaximo as largoMax, m.largoMinimo as largoMin, pro.razon as provee, ".
               "ta.descripcion as tipoAcero ".
               "from preparacionmp mp ".
               "LEFT JOIN medidas m ON (m.id = mp.medidaid) ".
               "LEFT JOIN paquetes paq ON (paq.medidaid = m.id) ".
               "LEFT JOIN proveedores pro ON (pro.id = paq.proveedorid) ".
               "LEFT JOIN tipocostura tc  ON (tc.id = m.tipoCostura) ".
               "LEFT JOIN tipoacero ta  ON (ta.id = m.tipoAceroSAE) ".
               "where mp.id=$id ;";
        $res = DB::select($sql);
        if (count($res)>0){
        	$row = $res[0];
        	$LARGO_OBTENER = 0;
        	$CANTIDAD_TUBOS = 0;

        	$PROVEEDOR = $row->provee;

		    $ACERO = $row->tipoAcero;
			$DIAMETRO_EXTERIOR = $row->dexor;
			$ESPESOR = $row->espor;
			$DIAMETRO_INTERIOR = $row->dexor- $row->espor - $row->espor;
			$TIPO = $row->nomCostura;
			$LARGO_TUBO = number_format((($row->largoMax+$row->largoMin)/2000),2);
		    $KG_MT = $this->kilogrametro($row->dexor,$row->espor);
		    //dd((int)$KG_MT/0);
			if($KG_MT<>0 OR $LARGO_TUBO<>0){
		        $CANTIDAD_TUBOS = intval(((($KILOS*1.1)/$KG_MT)/$LARGO_TUBO));
				$LARGO_OBTENER = number_format((($KG_MT/$KGM)*($LARGO_TUBO-0.2)),2);
		    }
			$KILOS_MP = $KILOS*1.11;
       		$OBSERVACIONES = $row->observaciones;
       		
       		$pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
       		$data_m1[] = array('titulo'=>"<b>PREPARACIÓN MP:</b>",'mpp'=>"PROVEEDOR: $PROVEEDOR",'largoao'=>"LARGO FINAL A OBT.: $LARGO_OBTENER");
			$titles_m1 = array('titulo'=>'<b>titulo</b>','mpp'=>"<b>mpp</b>",'largoao'=>"<b>largoao</b>");
			$pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>140),'mpp'=> array('justification'=>'left','width'=>250),'largoao'=> array('justification'=>'left')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));

			$data_m2[] = array('dext'=>$DIAMETRO_EXTERIOR, 'esp'=>$ESPESOR, 'dint'=>"$DIAMETRO_INTERIOR", 'tipo'=>$TIPO,'sae'=>$ACERO, 'lt'=>$LARGO_TUBO, 'cantt'=>$CANTIDAD_TUBOS, 'kgmt'=>$KG_MT, 'kilos'=>$KILOS_MP);
			$titles_m2 = array('dext'=>'<b>DIAM.EXT.</b>', 'esp'=>'<b>ESPESOR</b>', 'dint'=>'<b>DIAM.INT</b>', 'tipo'=>'<b>TIPO</b>','sae'=>'<b>SAE</b>', 'lt'=>'<b>L.TUBO</b>', 'cantt'=>'<b>C.TUBOS</b>', 'kgmt'=>'<b>KG/MT</b>', 'kilos'=>'<b>KILOS</b>');
			$pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('dext'=> array('justification'=>'centre'),'esp'=> array('justification'=>'centre'),'dint'=> array('justification'=>'centre'),'tipo'=> array('justification'=>'centre'),'sae'=> array('justification'=>'centre'),'lt'=> array('justification'=>'centre'),'cantt'=> array('justification'=>'centre'),'kgmt'=> array('justification'=>'centre'),'kilos'=> array('justification'=>'centre')),'colGap' => 12,'showHeadings'=>1,'shaded'=>0,'fontSize'=>10,'showLines'=>0,'width'=>585));
		        $pdf->ezText("\n",2);

		    $data_m3[] = array('Observaciones'=>"Observaciones: $OBSERVACIONES",'realizo'=>"____________/____________");
			$titles_m3 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
			$pdf->ezTable($data_m3,$titles_m3,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
		        $pdf->ezText("\n",2);

		    return true;

        }
    }

    public function vertrefila($id, $idOP, $KG_MT_M2, $LARGO_TUBO_M2, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "t.*,tm.descripcion as matrizTipo, ma.diametroNominal as descripMatrizAcero, ".
    	       "w.diametro as dem,m.diametroInteriorNominal as dim, ".
    	       "w.diametro as descripMatrizWidia, md.nucleo1 as descripMatrizDoble, mt.diametroExterior as descripMatrizTL, ".
    	       "CONCAT('N¼ ',ca.numero,'  DE ',ca.diametroEntrada) as descripMatrizCabeza, tp.descripcion as punzonTipo, p.*, ".
    	       "p.diametro as descripPunzones, p2.diametro as descripPunzonesD, t.observaciones as observa, ".
    	       "t.espesor as esptrefila ".
    	       "from trefila t ".
    	       "LEFT JOIN tipomatriz tm ON (tm.id = t.tipoMatrizid) ".
    	       "LEFT JOIN matrizsimacero ma ON (ma.id = t.matrizSimAcero) ".
    	       "LEFT JOIN matrizsimwidia w ON (w.id = t.matrizSimWidia) ".
    	       "LEFT JOIN matrizdoble md ON (md.id = t.matrizDoble) ".
    	       "LEFT JOIN matriztl mt ON (mt.id = t.matrizTL) ".
    	       "LEFT JOIN cabezaturco ca ON (ca.id = t.cabezaTurco) ".
    	       "LEFT JOIN punzones p ON (p.id = t.punzonid) ".
    	       "LEFT JOIN punzones p2 ON (p2.id = t.punzonDoble) ".
    	       "LEFT JOIN tipopunzon tp ON (tp.id = p.tipoPunzonid) ".
    	       "LEFT JOIN versionesxorden c ON (c.id = $idOP) ".
    	       "LEFT JOIN medidascotizadas m ON (m.id = c.medidaid) ".
    	       "where t.id=$id ;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];

    		$MATRIZ = $row->matrizTipo;

    		switch ($row->tipoMatrizid) {
			    case 1:
		                   if ($row->tipo==1){
					$MATRIZ_MATERIAL = "A";
					$MATRIZ_NOMBRE = $row->descripMatrizAcero;		
		                   }else{
					$MATRIZ_MATERIAL = "W";	
					$MATRIZ_NOMBRE = $row->descripMatrizWidia;
		                   }
			    break;
			    case 2:
		                   $MATRIZ_MATERIAL = "";	
		                   $MATRIZ_NOMBRE = $row->descripMatrizDoble;
			    break;
		            case 3:
				   $MATRIZ_MATERIAL = "";	
		                   $MATRIZ_NOMBRE = $row->descripMatrizTL;
		            break;	
		            case 4:
				   $MATRIZ_MATERIAL = "";	
		                   $MATRIZ_NOMBRE = $row->descripMatrizTL;
		            break;
		            case 5:
		                   $MATRIZ_MATERIAL = "";	
		                   $MATRIZ_NOMBRE = $row->descripMatrizCabeza;
		            break;
		            Default:
		                   $MATRIZ_MATERIAL = "";
		                   $MATRIZ_NOMBRE = "";
			}

			$PUNZON = $row->punzonTipo;
	
			switch ($row->tipoPunzonid) {
			    case 1:
		                   if ($row->tipoMaterialid==1){
					$PUNZON_MATERIAL = "A";
					$PUNZON_NOMBRE = $row->descripPunzones;		
		                   }else{
					$PUNZON_MATERIAL = "W";	
					$PUNZON_NOMBRE = $row->descripPunzones;
				   }
			    break;
			    case 2:
		                   $PUNZON_MATERIAL = "";
		                   $PUNZON_NOMBRE = $row->espesor;
			    break;
		            case 3:
		                   $PUNZON_MATERIAL = "";
		                   $PUNZON_NOMBRE = $row->espesor;
		            break;        
		            case 4:
		                   $PUNZON_MATERIAL = "";
		                   $PUNZON_NOMBRE = $row->espesor;
		            break;
		            case 5:
		                   $PUNZON_MATERIAL = "Al Aire";
		                   $PUNZON_NOMBRE = "";
		            break;
		            Default:
		                   $PUNZON_MATERIAL = "";
		                   $PUNZON_NOMBRE = "";
			}

			$ESPESOR = $row->esptrefila;
			$REDUCCION = $row->reduccion;
			$OBSERVACION = $row->observa;
			$kgmcalc = number_format(($MATRIZ_NOMBRE - $ESPESOR)*$ESPESOR*0.0246, 3);
            $LARGO = 0;
            if($kgmcalc!=="0.000")
			  $LARGO = number_format(($KG_MT_M2/$kgmcalc)*($LARGO_TUBO_M2), 2);

			$pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);

			if ($row->punzonDoble>0){
				if ($row->tipoMaterialid==1){
					$PUNZON_MATERIAL_DOBLE = "A";
					$PUNZON_NOMBRE_DOBLE = $row->descripPunzonesD;		
				}else{
					$PUNZON_MATERIAL_DOBLE = "W";	
					$PUNZON_NOMBRE_DOBLE = $row->descripPunzonesD;
				}

				$data_m1[] = array('titulo'=>"<b>TREFILA:</b>",'tipoMatriz'=>"Matriz $MATRIZ $MATRIZ_MATERIAL Ø $MATRIZ_NOMBRE",'tipoPunzon1'=>"Punzón Doble $PUNZON_MATERIAL Ø $PUNZON_NOMBRE",'tipoPunzon2'=>"Punzón Doble $PUNZON_MATERIAL_DOBLE Ø $PUNZON_NOMBRE_DOBLE",'espesor'=>"ESPESOR: $ESPESOR",'largo'=>"LARGO: $LARGO");
				$titles_m1 = array('titulo'=>'<b>titulo</b>','tipoMatriz'=>"<b>tipoMatriz</b>",'tipoPunzon1'=>"<b>tipoPunzon1</b>",'tipoPunzon2'=>"<b>tipoPunzon2</b>",'espesor'=>"<b>espesor</b>",'largo'=>"<b>largo</b>");
				$pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>60),'tipoMatriz'=> array('justification'=>'left'),'tipoPunzon1'=> array('justification'=>'left'),'tipoPunzon2'=> array('justification'=>'left'),'espesor'=> array('justification'=>'left')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
			}
			else{
				$data_m2[] = array('titulo'=>"<b>TREFILA:</b>",'tipoMatriz'=>"Matriz $MATRIZ $MATRIZ_MATERIAL Ø $MATRIZ_NOMBRE",'tipoPunzon'=>"Punzón $PUNZON_MATERIAL Ø $PUNZON_NOMBRE",'espesor'=>"ESPESOR: $ESPESOR");
                $titles_m2 = array('titulo'=>'<b>titulo</b>','tipoMatriz'=>"<b>tipoMatriz</b>",'tipoPunzon'=>"<b>tipoPunzon</b>",'espesor'=>"<b>espesor</b>");
                $pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>60),'tipoMatriz'=> array('justification'=>'left'),'tipoPunzon'=> array('justification'=>'left'),'espesor'=> array('justification'=>'left')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
			}

			$data_m3[] = array('reduccion'=>"REDUCCIÓN: $REDUCCION%",'dureza'=>"DUREZA:         ", 'frec'=>"FREC.CONTROL:        ", 'ap'=>"AP.MUEST:        ", 'aboc'=>"ABOC:        ", 'kmmt'=>"Kg/mt: $kgmcalc" );
			$titles_m3 = array('reduccion'=>'<b>reduccion</b>', 'dureza'=>"<b>dureza</b>",'frec'=>"<b>frec</b>",'ap'=>"<b>ap</b>",'aboc'=>"<b>aboc</b>", 'kmmt'=>"<b>kmmt</b>");
			$pdf->ezTable($data_m3,$titles_m3,'',array('cols' => array('reduccion'=> array('justification'=>'left'),'dureza'=> array('justification'=>'left'),'frec'=> array('justification'=>'right'),'ap'=> array('justification'=>'right'),'aboc'=> array('justification'=>'right')),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
		        
		    $data_m4[] = array('Observaciones'=>"Observaciones: $OBSERVACION",'realizo'=>"____________/____________");
			$titles_m4 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
			$pdf->ezTable($data_m4,$titles_m4,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
		        $pdf->ezText("\n",2);
    		return ($kgmcalc);
    	}
    	return false;
    }

    public function verempaquetado($id, $data){
    	$pdf = $data[0];
    	$KILOS = $data[1];
    	$KGM = $data[2];
    	$COLOR = $data[3];

    	$sql = 'SELECT '.
    	       "e.*,temp.descripcion as empaquetadotipo from empaquetado e ".
    	       "LEFT JOIN tipoempaquetado temp ON (temp.id=e.tipoEmpaquetadoid) ".
    	       "WHERE e.id=$id ;";

    	$res = DB::select($sql);
    	if (count($res)>0){
    		$row = $res[0];
    		$OBSERVACION_EMPAQUETADO = $row->observaciones;
    		$pdf->ezImage(public_path()."/images/separar2.jpg",0,'560','',0);
    		$data_m1[] = array('titulo'=>"<b>EMPAQUETADO:</b>");
    		$titles_m1 = array('titulo'=>'<b>titulo</b>');
    		$pdf->ezTable($data_m1,$titles_m1,'',array('cols' => array('titulo'=> array('justification'=>'left','width'=>560)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','fontSize'=>10,'width'=>560));
    		
    		$data_m2[] = array('Observaciones'=>"Observaciones: $OBSERVACION_EMPAQUETADO",'realizo'=>"____________/____________");
    		$titles_m2 = array('Observaciones'=>'<b>Observaciones</b>','realizo'=>"<b>realizo</b>");
    		$pdf->ezTable($data_m2,$titles_m2,'',array('cols' => array('Observaciones'=> array('justification'=>'left','width'=>412),'realizo'=> array('justification'=>'rigth','width'=>148)),'showHeadings'=>0,'shaded'=>0,'showLines'=>0,'xPos'=>'centre','textCol' => $COLOR,'fontSize'=>10,'width'=>560));
    		$pdf->ezText("\n",2);
    	}

    	return true;
    }

    public function kilogrametro($de,$es){

        return number_format(($de-$es)*$es*0.0246, 3);

    }

    public function fechaphp($fecha){
      list($dia, $mes, $anio) = explode('-', $fecha);       
      $date = $anio."/".$mes."/".$dia;
      return $date;
    }
}
