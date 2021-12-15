<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrizDoble;
use DB;

class MatrizDobleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        if ($type){
            $matrizes = [];
            $input = $request->all();
            $q0 = "";

            $q0 .= (empty($input['cajab']))? "" : " AND m.caja LIKE '%".$input['cajab']."%'";
            $q0 .= (empty($input['nucleo1b']))? "" : " AND m.nucleo1 LIKE '%".$input['nucleo1b']."%'";
            $q0 .= (empty($input['nucleo2b']))? "" : " AND m.nucleo2 LIKE '%".$input['nucleo2b']."%'";

            $sql = 'SELECT '.
                   'm.caja as Caja,  m.nucleo1 as Nucleo1, m.nucleo2 as Nucleo2, '.
                   'm.id FROM matrizdoble m '.
                   'WHERE 1=1 '.$q0.' order by m.id asc ;';
            $results = DB::select($sql);

            foreach ($results as $result) {
                $matrizes[] = (object)['caja'=> $result->Caja, 'nucleo1'=> $result->Nucleo1, 'nucleo2'=> $result->Nucleo2, 'id'=>$result->id];
            }
        }
        else {
            $matrizes = MatrizDoble::all();
        }

        return view('matrizdoble.index', compact('matrizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('matrizdoble.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MatrizDoble::create([
            'caja' => $request->get('caja'),
            'nucleo1' => $request->get('nucleo1'),
            'nucleo2' => $request->get('nucleo2')
        ]);

        return back()->with('success', 'Matriz Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matriz = MatrizDoble::find($id);
        return $matriz;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matriz = MatrizDoble::find($id);
        //return view('matrizdoble.edit', compact('matriz'));
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
        $matriz = MatrizDoble::find($id);
        $matriz->caja = $request->get('caja');
        $matriz->nucleo1 = $request->get('nucleo1');
        $matriz->nucleo2 = $request->get('nucleo2');
        $matriz->save();
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
        $matriz = MatrizDoble::find($id);
        $matriz->delete();
        return "true";
    }
}
