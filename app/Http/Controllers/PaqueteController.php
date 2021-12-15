<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PaqueteController extends Controller
{
    public function buscar_medida(Request $request)
    {
    	$diametroExterior = $request->get('diametroExterior');
    	$espesorNominal = $request->get('espesorNominal');
    	$largoMaximo = $request->get('largoMaximo');
    	$largoMinimo = $request->get('largoMinimo');
    	$tipoCostura = $request->get('tipoCostura');
    	$tipoAceroSAE = $request->get('tipoAceroSAE');
    	$tratamientoTermico = $request->get('tratamientoTermico');
    	$normaid = $request->get('normaid');

    	$result = [];

    	$querymedidas = DB::table('medidas')->get();
    	foreach ($querymedidas as $medida) {
    		if ($medida->diametroExterior == $diametroExterior and $medida->espesorNominal == $espesorNominal and $medida->largoMaximo == $largoMaximo and $medida->largoMinimo == $largoMinimo and $medida->tipoCostura == $tipoCostura and $medida->tipoAceroSAE == $tipoAceroSAE and $medida->tratamientoTermico == $tratamientoTermico and $medida->normaid == $normaid){
    			print_r($medida);
    			$result[] = (object)['id'=> $medida->id, 'medida' => $medida ];
    		}
    	}

    	// if ($diametroExterior != null){
    	// 	$querymedidas->where('diametroExterior', $diametroExterior);
    	// }

    	// if ($espesorNominal != null){
    	// 	$querymedidas->where('espesorNominal', '=', $espesorNominal);
    	// }

    	// if ($largoMaximo != null){
    	// 	$querymedidas->where('largoMaximo', '=', $largoMaximo);
    	// }

    	// if ($largoMinimo != null){
    	// 	$querymedidas->where('largoMinimo', '=', $largoMinimo);
    	// }

    	// $querymedidas->get();
 
        dd($result);

    }
}
