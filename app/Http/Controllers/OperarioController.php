<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operario;

class OperarioController extends Controller
{
    public function index()
    {
        $model = Operario::all();
        return view('operario.index',compact('model'));
    }

    public function show(Request $request)
    {
        $model = Operario::find($request->id);
        return response()->json($model);
    }

    public function update(Request $request)
    {
        $model = Operario::find($request->operario_id);
        $model->nombreCompleto = $request->nombre;
        $model->save();
        return response()->json(true,200);

    }

    public function store(Request $request)
    {
        $model = new Operario();
        $model->nombreCompleto = $request->nombre;
        $model->save();
        return response()->json(true,200);
    }

    public function delete(Request $request)
    {
        $model = Operario::find($request->id);
        
        $model->delete();
        return response()->json(true,200);
    }
}
