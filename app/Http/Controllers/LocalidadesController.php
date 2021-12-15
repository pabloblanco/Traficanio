<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LocalidadesController extends Controller
{
    public function buscarlocalidades(Request $request)
    {
    	$string = $request->get('data');

    	$queryString = trim($this->limpiarCaracteresEspeciales($string));
    	$list = [];

    	if(strlen($queryString) >0) {
    		$sql = 'SELECT '.
    		       "l.id as idlocal,l.nombre as localidad,l.partidoid, p.nombre as partido,p.id, ".
    		       "pcia.nombre as provincia FROM localidades l ".
    		       "LEFT JOIN partidos p ON (p.id = l.partidoid) ".
				   "LEFT JOIN provincias pcia ON (p.provinciaid = pcia.id) ".			
				   "WHERE l.nombre LIKE '".$queryString."%' LIMIT 0, 10";

			$query = DB::select($sql);

			if (count($query)>0){
				foreach ($query as $l) {
					$texto = $l->localidad.' ,'.$l->partido.' , '.$l->provincia;
					$list[] = (object)['index'=>$l->idlocal, 'id'=>$l->idlocal, 'name'=>$texto];					
				}
			}

			return response()->json($list);
    	}
    }

    public function limpiarCaracteresEspeciales($string){
     $string = htmlentities($string);
     $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
     return $string;
    }
}
