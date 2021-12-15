<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arraytarea = [];


        $tareas = Tarea::all();
        $prioridades = DB::table('prioridades')->get();
        $tipotareas = DB::table('tipotarea')->get();
        $frecuencias = DB::table('frecuenciatarea')->get();
        $estadotareas = DB::table('estadotarea')->get();
        $usuarios = User::all();

        if ($request->all() !== []){
            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['tipotareaid']))? "" : " AND t.tipoTareaid='".$input['tipotareaid']."'";
            $q0 .= (empty($input['frecuenciaid']))? "" : " AND t.frecuenciaid='".$input['frecuenciaid']."'";
            $q0 .= (empty($input['usuarioid']))? "" : " AND t.userid='".$input['usuarioid']."'";
            $q0 .= (empty($input['prioridadid']))? "" : " AND t.prioridadid='".$input['prioridadid']."'";
            $q0 .= (empty($input['estadoid']))? "" : " AND t.estadoid='".$input['estadoid']."'";
            
            $sql = "SELECT ".
                   'tt.descripcion as tipotarea, t.tareaObjetivo as tarea, '.
                   't.fechaPrometida as fecha, u.usuario as usuario, et.descripcion as estado, '.
                   't.id FROM tareas t '.
                   'LEFT JOIN tipoTarea tt ON (tt.id = t.tipoTareaid) '.
                   'LEFT JOIN usuarios u ON (u.id = t.userid) '.
                   'LEFT JOIN estadoTarea et ON (et.id = t.estadoid) '.
                   'WHERE 1=1 '.$q0.' order by t.id desc ;' ;
            
            $arraytarea = DB::select($sql);            

        }
        else{
            
            foreach ($tareas as $tarea) {
                $tipo = "";
                $user = "";
                $estado = "";
                $tipotarea = DB::table('tipotarea')->where('id', '=', $tarea->tipoTareaid)->first();
                if ($tipotarea != null)
                    $tipo = $tipotarea->descripcion;

                $usuario = DB::table('usuarios')->where('id', '=', $tarea->userid)->first();
                if ($usuario != null)
                    $user = $usuario->usuario;

                $estadotarea = DB::table('estadotarea')->where('id', '=', $tarea->estadoid)->first();
                if ($estadotarea != null)
                    $estado = $estadotarea->descripcion;

                $arraytarea[] = (object)['tipotarea'=>$tipo, 'tarea'=>$tarea->tareaObjetivo, 'fecha'=> $tarea->fechaPrometida, 'usuario'=> $user, 'estado'=>$estado, 'id'=> $tarea->id];

            }
            //dd(count($arraytarea));


        }

        return view('tarea.index', compact('tipotareas', 'prioridades', 'frecuencias', 'estadotareas', 'arraytarea', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prioridaddes = DB::table('prioridades')->get();
        $tipotareas = DB::table('tipotarea')->get();
        $frecuencias = DB::table('frecuenciatarea')->get();
        $estadotareas = DB::table('estadotarea')->get();
        $usuarios = User::all();
        return view('tarea.create', compact('tipotareas', 'prioridaddes', 'frecuencias', 'estadotareas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('fechaPrometida')){
            list($dia, $mes, $anio) = explode('/', $request->get('fechaPrometida'));       
            $fecha = $anio."-".$mes."-".$dia;

        }
        else {
            $fecha = null;
        }

        $tarea = Tarea::create([
            'tipoTareaid' => $request->get('tipoTareaid'),
            'frecuenciaid' => $request->get('frecuenciaid'),
            'userid' => $request->get('userid'),
            'prioridadid' => $request->get('prioridadid'),
            'tareaObjetivo' => $request->get('tareaobjetivo'),
            'fechaPrometida' => $fecha,
            'detalle' => $request->get('detalle'),
            'estadoid' => $request->get('estadoid'),
            'creoUserid' => Auth::id()

        ]);

        return back()->with('success', 'Tarea Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        return $tarea;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        //return view('tarea.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->get('fechaPrometida')){
            list($dia, $mes, $anio) = explode('/', $request->get('fechaPrometida'));       
            $fecha = $anio."-".$mes."-".$dia;

        }
        else {
            $fecha = null;
        }

        $tarea = Tarea::find($id);
        $tarea->tipoTareaid = $request->get('tipoTareaid');
        $tarea->frecuenciaid = $request->get('frecuenciaid');
        $tarea->prioridadid = $request->get('prioridadid');
        $tarea->tareaObjetivo = $request->get('tareaObjetivo');
        $tarea->fechaPrometida = $fecha;
        $tarea->detalle = $request->get('detalle');
        $tarea->estadoid = $request->get('estadoid');
        $tarea->userid = $request->get('userid');
        $tarea->save();
        return "true";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return "true";
    }

    public function buscartarea(Request $request)
    {

    }
}
