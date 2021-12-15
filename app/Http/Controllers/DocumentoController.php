<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use Carbon\Carbon;
use DB;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arraydoc = [];
        $estados = DB::table('estadosdoc')->get();
        $tipos = DB::table('tipodoc')->get();
        $type = $request->get('type');
        if ($type){
            $input = $request->all();
            $q0 = "";
            $q0 .= (empty($input['titulob']))? "" : " AND b.titulo LIKE '%".$input['titulob']."%'";
            $q0 .= (empty($input['codigob']))? "" : " AND b.codigo LIKE '%".$input['codigob']."%'";
            $q0 .= (empty($input['versionb']))? "" : " AND b.version LIKE '%".$input['versionb']."%'";
            $q0 .= (empty($input['estadoidb']))? "" : " AND  b.estadoid='".$input['estadoidb']."'"; 
            $q0 .= (empty($input['tipoidb']))? "" : " AND  b.tipoid='".$input['tipoidb']."'";

            $sql = 'SELECT '.
                   "b.titulo as TITULO, b.codigo as Codigo, b.version as Version, t.descripcion as TipodeDocumento, ".
                   "e.descripcion as Estado, b.id FROM biblioteca b ".
                   "LEFT JOIN estadosdoc e ON (e.id=b.estadoid) ".
                   "LEFT JOIN tipodoc t ON (t.id=b.tipoid) ".
                   "WHERE 1=1 $q0 order by b.id desc ;";

            $results = DB::select($sql);

            foreach ($results as $result) {
                $arraydoc[] = (object)['titulo'=> $result->TITULO, 'codigo'=> $result->Codigo, 'version' => $result->Version, 'tipo'=> $result->TipodeDocumento, 'estado'=> $result->Estado, 'id'=> $result->id];                 
             } 
            
        }
        else {
            $documentos = Documento::all();
            foreach ($documentos as $documento) {
                $est = "";
                $tip = "";

                $estado = DB::table('estadosdoc')->where('id', '=', $documento->estadoid)->first();
                if ($estado != null)
                    $est = $estado->descripcion;

                $tipo = DB::table('tipodoc')->where('id', '=', $documento->tipoid)->first();
                if ($tipo != null)
                    $tip = $tipo->descripcion;
                
                $arraydoc[] = (object)['titulo'=> $documento->titulo, 'codigo'=> $documento->codigo, 'version' => $documento->version, 'tipo'=> $tip, 'estado'=> $est, 'id'=> $documento->id];
            }            
        }
        return view('biblioteca.documento', compact('estados', 'tipos', 'arraydoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::now();

        $day = $today->day;
        $month = $today->month;
        $year = $today->year;
        $lenDay = strlen($day);
        $lenMonth = strlen($month);
        if ($lenDay == 1)
            $day = "0". $day;
        if ($lenMonth == 1)
            $month = "0". $month;

        $file = null;
        if ($request->file('file')){
          $documento = Documento::orderBy('id', 'DESC')->first();
          if($documento)
            $doc_id = $documento->id;
          else
            $doc_id = 1;
          $file = $request->file('file')->getMimeType();
          if ($file == "application/pdf")
            $type = ".pdf";
          $nombre = "filedoc".$year.$month.$day.($doc_id + 1).$type;
          $path = public_path() .'/uploads';
          $request->file('file')->move($path, $nombre);
          $file = "http://trafi2.itoeste.biz/public/"."uploads/".$nombre;
        }
        Documento::create([
            'titulo' => $request->get('titulo'),
            'codigo' => $request->get('codigo'),
            'estadoid' => $request->get('estadoid'),
            'tipoid' => $request->get('tipoid'),
            'version' => $request->get('version'),
            'comentario' => $request->get('comentario'),
            'file' => $file
        ]);

        return back()->with('success', 'Documento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::find($id);
        return $documento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $today = Carbon::now();

        $day = $today->day;
        $month = $today->month;
        $year = $today->year;
        $lenDay = strlen($day);
        $lenMonth = strlen($month);
        if ($lenDay == 1)
            $day = "0". $day;
        if ($lenMonth == 1)
            $month = "0". $month;

        $file = null;
        if ($request->file('file')){
          $documento = Documento::orderBy('id', 'DESC')->first();
          if($documento)
            $doc_id = $documentos->id;
          else
            $doc_id = 1;
          $file = $request->file('file')->getMimeType();
          if ($file == "image/png")
            $type = ".png";
          $nombre = "filedoc".$year.$month.$day.($doc_id + 1).$type;
          $path = public_path() .'/uploads';
          $request->file('file')->move($path, $nombre);
          $file = "http://trafi2.itoeste.biz/public/"."uploads/".$nombre;
        }

        $documento = Documento::find($id);
        $documento->titulo = $request->get('titulo');
        $documento->codigo = $request->get('codigo');
        $documento->estadoid = $request->get('estadoid');
        $documento->tipoid = $request->get('tipoid');
        $documento->version = $request->get('version');
        $documento->comentario = $request->get('comentario');
        $documento->file = $file;
        $documento->save();

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
        $documento = Documento::find($id);
        $documento->delete();
        return "true";
    }
}
