<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DireccionesController extends Controller
{
    public function buscar_direcciones(Request $request)
    {
    	$input = $request->all();
    	//$input['id']

    	$db = DB::table('direccionesclientes')->where('clienteid', '=', $input['id'])->get();
    	if (count($db)>0){
    		return response()->json($db);
    	}
    	return "false";
    }
}
