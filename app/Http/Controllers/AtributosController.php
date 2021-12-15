<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AtributosController extends Controller
{
    public function show($id, $idp)
    {
        $attr = DB::table('atributosproducto')->where('cliente_id', '=', $id)->where('producto_id', '=', $idp)->first();
        if ($attr){
        	return response()->json($attr);
        }
        else{
        	return "false";
        }
    }

}
