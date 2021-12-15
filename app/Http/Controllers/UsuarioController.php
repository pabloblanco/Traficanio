<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
    	$sector = DB::table('sectorauditoria')->get();
        return view('usuario.index', compact('sector'));
    }

    public function listarusuarios()
    {
    	$me = Auth::id();
    	$usuarios = DB::table('usuarios')->join('sectorauditoria', 'usuarios.sectorid', '=', 'sectorauditoria.id')->where('usuarios.id', '!=', $me)->select('usuarios.id', 'usuarios.usuario as nombre', 'sectorauditoria.descripcion as sector')->get();

    	if (count($usuarios)>0){
    		return response()->json(['resultado'=>$usuarios]);
    	}
    	return "false";
    }

    public function verusuario($id){
    	$usuario = DB::table('usuarios')->where('id', '=', $id)->select('id', 'usuario as nombre', 'sectorid')->first();

    	if ($usuario){
    		return response()->json($usuario);
    	}
    	return "false";

    }

    public function updateusuario(Request $request, $id){
    	$pass = $request->get('password');
    	$user = $request->get('usuario');
    	$sectorid = $request->get('sectorid');

    	if ($pass){
    		$db = DB::table('usuarios')->where('id', '=', $id)->update(['password'=>Hash::make($pass), 'usuario'=>$user, 'sectorid'=>$sectorid]);
    	}
    	else{
    		$db = DB::table('usuarios')->where('id', '=', $id)->update(['usuario'=>$user, 'sectorid'=>$sectorid]);
    	}

    	if ($db>0){
    		return "true";
    	}
    }

    public function deleteusuario($id){
    	$db = DB::table('usuarios')->where('id', '=', $id)->delete();
    	return "true";
    }
    
}
