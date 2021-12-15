<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Medida;

class StockPaqueteController extends Controller
{
    public function indexmedida()
    {
        return view('stockpaquete.medida');
    }

    public function indexpaquete()
    {
        $tipoaceros = DB::table('tipoacero')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $normas = DB::table('normas')->get();
        $proveedores = DB::table('proveedores')->get();
        $estados = DB::table('estadomateriaprima')->get();
        $formas = DB::table('formas')->get();
        $rubros = DB::table('rubros')->get();
        return view('stockpaquete.paquete', compact('proveedores', 'formas', 'rubros', 'estados', 'tipocosturas', 'tipoaceros', 'tratamientos', 'normas'));   
    }

    public function indexmovimiento()
    {
        $estados = DB::table('estadomateriaprima')->get();
        $tipos = DB::table('tipomovimientostock')->get();
        $tipoaceros = DB::table('tipoacero')->get();
        $tipocosturas = DB::table('tipocostura')->get();
        $tratamientos = DB::table('tratamientotermico')->get();
        $normas = DB::table('normas')->get();
        return view('stockpaquete.movimiento', compact('estados', 'tipos', 'tipoaceros', 'tipocosturas', 'tratamientos', 'normas'));
    }

    public function buscarpaquetes(Request $request)
    {
      $input = $request->all();
      $q0 = "";
      $q0 .= (empty($input['diametroextmaxdesdeb']))? "" : " AND cc.diametroExteriorMaximo>=".$input['diametroextmaxdesdeb']."";
      $q0 .= (empty($input['diametroextmaxhastab']))? "" : " AND cc.diametroExteriorMaximo<=".$input['diametroextmaxhastab']."";
      $q0 .= (empty($input['diametroextmindesdeb']))? "" : " AND cc.espesorMaximo>=".$input['diametroextmindesdeb']."";
      $q0 .= (empty($input['diametroextminhastab']))? "" : " AND cc.espesorMaximo<=".$input['diametroextminhastab']."";
      $q0 .= (empty($input['espesormaxdesdeb']))? "" : " AND cc.espesorMaximo>=".$input['espesormaxdesdeb']."";
      $q0 .= (empty($input['espesormaxhastab']))? "" : " AND cc.espesorMaximo<=".$input['espesormaxhastab']."";
      $q0 .= (empty($input['espesormindesdeb']))? "" : " AND cc.espesorMinimo>=".$input['espesormindesdeb']."";
      $q0 .= (empty($input['espesorminhastab']))? "" : " AND cc.espesorMinimo<=".$input['espesorminhastab']."";
      $q0 .= (empty($input['largomaxdesdeb']))? "" : " AND cc.largoMaximo>=".$input['largomaxdesdeb']."";
      $q0 .= (empty($input['largomaxhastab']))? "" : " AND AND cc.largoMaximo<=".$input['largomaxhastab']."";
      $q0 .= (empty($input['largomindesdeb']))? "" : " AND cc.largoMinimo>=".$input['largomindesdeb']."";
      $q0 .= (empty($input['largominhastab']))? "" : " AND cc.largoMinimo<=".$input['largominhastab']."";
      $q0 .= (empty($input['rubroidb']))? "" : " AND p.rubroid=".$input['rubroidb']."";
      $q0 .= (empty($input['formaidb']))? "" : " AND p.formaid=".$input['formaidb']."";
      $q0 .= (empty($input['tipoaceroidsb']))? "" : " AND m.tipoAceroSAE IN (".implode(", ",$input['tipoaceroidsb']).")";
      $q0 .= (empty($input['tipocosturaidsb']))? "" : " AND m.tipoCostura IN (".implode(", ",$input['tipocosturaidsb']).")";
      $q0 .= (empty($input['normaids']))? "" : " AND m.normaid IN (".implode(", ",$input['normaids']).")";
      $q0 .= (empty($input['tranzabilidadb']))? "" : " AND p.numeroTrazabilidad='".$input['tranzabilidadb']."'";
      $q0 .= (empty($input['estadoidb']))? "" : " AND p.estadoid=".$input['estadoidb']."";
      $q0 .= (empty($input['proveedoridb']))? "" : " AND p.proveedorid=".$input['proveedoridb']."";
      $q0 .= (empty($input['medidaidb']))? "" : " AND p.medidaid='".$input['medidaidb']."'";
      $q0 .= (empty($input['kilodesdeb']))? "" : " AND st.cantidad <=".$input['kilodesdeb']."";
      $q0 .= (empty($input['kilohastab']))? "" : " AND st.cantidad >=".$input['kilohastab']."";
      $kgmetro = "((m.diametroExterior - m.espesorNominal) * m.espesorNominal * 0.0246)";
      $q0 .= (empty($input['kilometroshastab']))? "" : " AND $kgmetro <=".$input['kilometroshastab']."";
      $q0 .= (empty($input['kilometrosdesdeb']))? "" : " AND $kgmetro >=".$input['kilometrosdesdeb']."";

      if (($input['deposito'])>0) {
          if (($input['ubicacion1'])<>"-1")
              $q0 .= " AND p.ubicacion LIKE '%".$input['ubicacion1']."%'";

          if (($input['ubicacion2'])>0)
              $q0 .= " AND p.ubicacion LIKE '%".((string)$input['ubicacion2'])."' ";

          if (((($input['ubicacion1'])<0) and (($input['ubicacion2'])<0)) or ((($input['ubicacion1'])<0) and (($input['ubicacion2'])>0))){
              
              $param  = ($input['deposito']==1)?"E-Z":"A-D";

              $q0 .= " AND (p.ubicacion REGEXP '^([$param])' )";


          }
          

      }     

      $sql = 'SELECT '.
             "rmp.fechaMovimiento as Fecha, p.numeroTrazabilidad as NTrazabilidad, ".
             "m.diametroExterior as DiametroExterior, m.espesorNominal as EspesorNominal, ".
             "IF (m.largoMaximo=m.largoMinimo, m.largoMaximo, CONCAT(m.largoMinimo, '/', m.largoMaximo)) as Largo, ".
             "tc.descripcion as Costura, tt.descripcion AS TTermico, ta.descripcion as Acero, ".
             "n.descripcion AS Norma, pr.razon as Proveedor, ".
             "st.cantidad  AS 'Stock(kgs)', ".
             "round(((m.diametroExterior - m.espesorNominal) * m.espesorNominal * 0.0246), 2) as 'Kg/m', ".
             "p.numeroTubos as Tubos, f.descripcion as Forma, r.descripcion as Rubro, ".
             "emp.descripcion as Estado, p.ubicacion as Ubicacion, cc.diametroExteriorMaximo as Diametromaximo, ".
             "cc.diametroExteriorMinimo as Diametrominimo, cc.espesorMaximo as Espesormaximo, ".
             "cc.espesorMinimo as Espesorminimo, cc.largoMaximo as Largomaximo, cc.largoMinimo as Largominimo, ".
             "cc.durezaCostura as DurezaCostura, cc.DurezaTubo as DurezaTubo, cc.abocardado as 'Abocardado(%)', ".
             "cc.carbono as Carbono, cc.manganeso as 'Manganeso(%)', cc.fosforo as 'Fosforo(%)', ".
             "cc.azufre as 'Azufre(%)', cc.silicio as 'Silicio(%)',cc.resistenciaFluenciamin as ResistenciaMin, ".
             "cc.resistenciaFluenciamax as ResistenciaMax, cc.cargaRoturamin as CargaRoturaMin, ".
             "cc.cargaRoturamax as CargaRoturaMax, IF (cc.biselado=1, 'Si', 'No') as Biselado, ".
             "IF (cc.estencilado=1, CONCAT('Si -', cc.leyendaEstencilado), 'No') as Estencilado, ".
             "te.descripcion as TipoEnsayo, cc.numeroCertificado as NCertificado, cc.numeroColada as NColada, ".
             "cc.alargamientomin as AlargMin, cc.alargamientomax as AlargMax, ". 
             "cc.observaciones as Observaciones, ".
             "p.id FROM  paquetes p ".
             "LEFT JOIN controlcalidad cc ON (cc.paqueteid = p.id) ".
             "LEFT JOIN estadomateriaprima emp ON ( emp.id = p.estadoid ) ".
             "LEFT JOIN recepcionmateriaprima rmp ON (rmp.id = p.pedidoid) ".
             "LEFT JOIN medidas m ON (m.id = p.medidaid) ".
             "LEFT JOIN proveedores pr ON (pr.id = p.proveedorid) ".
             "LEFT JOIN rubros r ON (r.id = p.rubroid) ".
             "LEFT JOIN tipoacero ta ON (ta.id  = m.tipoAceroSAE) ".
             "LEFT JOIN tipocostura tc ON (tc.id = m.tipoCostura) ".
             "LEFT JOIN normas n ON (n.id = m.normaid) ".
             "LEFT JOIN formas f ON (f.id  = p.formaid) ".
             "LEFT JOIN tipoensayo te ON (te.id = cc.tipoEnsayo) ".
             "LEFT JOIN tratamientotermico tt ON (tt.id = m.tratamientoTermico) ".
             "INNER JOIN stockmateriaprima st ON ( st.paqueteid = p.id ) ".
             "WHERE 1=1 $q0 order by p.id desc ;";

      $results = DB::select($sql);
      return response()->json(['resultado'=>$results]);   



    }

    public function buscarmedida(Request $request)
    {
      $input = $request->all();
      $q0 = "";
      $q0 .= (empty($input['diametroexteriorbm']))? "" : " AND diametroExterior=".$input['diametroexteriorbm']."";
      $q0 .= (empty($input['espesorbm']))? "" : " AND espesorNominal=".$input['espesorbm']."";
      $q0 .= (empty($input['largominbm']))? "" : " AND largoMinimo>=".$input['largominbm']."";
      $q0 .= (empty($input['largomaxbm']))? "" : " AND largoMaximo<=".$input['largomaxbm']."";
      $q0 .= (empty($input['tipoaceroidbm']))? "" : " AND tipoAceroSAE=".$input['tipoaceroidbm']."";
      $q0 .= (empty($input['tipocosturaidbm']))? "" : " AND tipoCostura=".$input['tipocosturaidbm']."";
      $q0 .= (empty($input['tratamientoidbm']))? "" : " AND tratamientoTermico=".$input['tratamientoidbm']."";
      $q0 .= (empty($input['normaidbm']))? "" : " AND normaid=".$input['normaidbm']."";
      
      /*$sql = 'SELECT '.
             "medida as MEDIDA
             
              n.descripcion as normas,
              ta.descripcion as tipoacero,
              tc.descripcion as tipocostura,
              tratamientotermico.descripcion as tratamientotermicod
             
             ,IF (SUM( st.cantidad )>0, SUM(st.cantidad), 0) AS Stockkgs, ".
             "m.id FROM medidas m ".

             "LEFT JOIN paquetes p ON (m.id = p.medidaid) ".
             "LEFT JOIN stockmateriaprima st ON ( st.paqueteid = p.id ) ".

             "LEFT JOIN estadomateriaprima emp ON (emp.id = p.estadoid)
                     LEFT JOIN tipoacero ta ON (ta.id  = m.tipoAceroSAE)
                     LEFT JOIN tipocostura tc ON (tc.id = m.tipoCostura)
                     LEFT JOIN normas n ON (n.id = m.normaid)
                     LEFT JOIN tratamientotermico ON (tratamientotermico.id = m.tratamientoTermico)
                     LEFT JOIN estadofabricacion tt ON (tt.id = m.tratamientoTermico)".

               
             "WHERE 1=1 $q0 GROUP BY m.id order by diametroExterior asc;";*/
      $sql = "SELECT m.medida as Medida,
                m.diametroExterior as Diametro,
                m.espesorNominal as Espesor,
            IF (m.largoMaximo=m.largoMinimo,m.largoMaximo,CONCAT(m.largoMinimo,'/',m.largoMaximo)) as Largo,
            tc.descripcion as Costura,
            
            ta.descripcion as Acero,
            n.descripcion AS Norma,
                
                
                
            n.descripcion as normas,
            ta.descripcion as tipoacero,
            tc.descripcion as tipocostura,
            tratamientotermico.descripcion as tratamientotermicod,
            

            IF (SUM( st.cantidad )>0, SUM(st.cantidad), 0) AS Stockkgs,

            m.id 
            FROM medidas m 
            
            LEFT JOIN paquetes p ON (m.id = p.medidaid) 
            LEFT JOIN stockmateriaprima st ON ( st.paqueteid = p.id ) 

             LEFT JOIN estadomateriaprima emp ON (emp.id = p.estadoid)
                     LEFT JOIN tipoacero ta ON (ta.id  = m.tipoAceroSAE)
                     LEFT JOIN tipocostura tc ON (tc.id = m.tipoCostura)
                     LEFT JOIN normas n ON (n.id = m.normaid)
                     LEFT JOIN tratamientotermico ON (tratamientotermico.id = m.tratamientoTermico)
                     LEFT JOIN estadofabricacion tt ON (tt.id = m.tratamientoTermico)

               
             WHERE 1=1 ".$q0." GROUP BY m.id order by diametroExterior asc
            ";
            

      $results = DB::select($sql);

      $results  = json_decode(json_encode($results), true);
      $array = [];
      $x=0;
      foreach ($results as $key => $value) {
        if(!is_null($value['Medida'])){
          $array[$x]=$value;
          $array[$x]['MEDIDA'] = $value['Diametro'].' x '.$value['Espesor'].' x '.$value['Largo']. ' x '.$value['normas']. ' x '.$value['tipoacero']. ' x '.$value['tipocostura'];
          $x++;
        }
      }
      return response()->json(['resultado'=>$array]);

    }

    public function buscarmovimiento(Request $request)
    {
        $input = $request->all();
        $q0 = "";
        $q0 .= (empty($input['nrob']))? "" : " AND p.numeroTrazabilidad='".$input['nrob']."'";
        $q0 .= (empty($input['tipoidb']))? "" : " AND ms.tipoMovimiento='".$input['tipoidb']."'";
        $q0 .= (empty($input['estadoidb']))? "" : " AND p.estadoid='".$input['estadoidb']."'";
        $q0 .= (empty($input['medidaidb']))? "" : " AND ms.medidaid='".$input['medidaidb']."'";
        $q0 .= (empty($input['fechadesdeb']))? "" : " AND date(ms.fecha)>='".$input['fechadesdeb']."'";
        $q0 .= (empty($input['fechahastab']))? "" : " AND date(ms.fecha)<='".$input['fechahastab']."'";

        $sql = 'SELECT '.
               'ms.id, '.
               'tm.descripcion AS TIPO, ms.cantidad as CANTIDAD, '.
               'IF (ms.tipoMovimiento=1, rmp.fechaMovimiento, emp.fecha) as FECHAMOVIMIENTO, m.medida as Medida, '.
               'p.numeroTrazabilidad as NPaquete, IF (tm.id=1, rmp.numeroRemito, emp.ordenProduccion) AS Documento, '.
               'pr.razon as PROVEEDOR, IF (ms.tipoMovimiento=1, "", emp.observaciones) as Observaciones '.
               'FROM  movimientostock ms '.
               'INNER JOIN paquetes p ON ( p.id = ms.paqueteid ) '.
               'LEFT JOIN medidas m ON ( m.id = p.medidaid ) '.
               'LEFT JOIN recepcionmateriaprima rmp ON (rmp.id = ms.documentoReferencia) '.
               'LEFT JOIN entregamateriaprima emp ON (emp.id = ms.documentoReferencia) '.
               'LEFT JOIN tipomovimientostock tm ON ( tm.id = ms.tipoMovimiento ) '.
               'LEFT JOIN proveedores pr ON (pr.id = p.proveedorid) '.
               'WHERE 1=1 '.$q0.' GROUP BY ms.id, ms.cantidad, tm.descripcion, ms.id order by ms.fecha ; ';

        $results = DB::select($sql);
        return response()->json(['resultado'=>$results]);
    }

    public function deposito(Request $request)
    {
      $input = $request->all();

      $idele = 0;

      $letras = [];

      if ($input['dep']=='dep1')
        $idele = "selectubi";
      else
        $idele = "selectubi2";

      $limit = 'D';
      $init = 'A';

      if ($input['val']==1){
          $limit = 'Z';
          $init = 'E';
      }

      if ($input['val']!=='-1'){
         foreach(range($init, $limit) as $letra) {
            $letras[] = $letra;
        }

      }

      $obj = (object) ['letras'=>$letras, 'idele'=>$idele];


      return response()->json($obj);
    }

    public function searchPaquetes(Request $request)
    {
      $sql = "SELECT paquetes.* ,
                estadomateriaprima.descripcion as estado,
                proveedores.razon as razon,
                movimientostock.fecha as   fechamov2,
                recepcionmateriaprima.fechaMovimiento as   fechamov,
                recepcionmateriaprima.kilogramos as kilogramos
              FROM paquetes 
              left join estadomateriaprima on estadomateriaprima.id = paquetes.estadoid
              left join proveedores on proveedores.id = paquetes.proveedorid
              left join movimientostock on movimientostock.paqueteid = paquetes.id
              left join recepcionmateriaprima on recepcionmateriaprima.id = paquetes.pedidoid
              WHERE paquetes.medidaid = ".$request->id." ";
      $res = DB::select($sql);
      return response()->json($res);
    }

    public function SearchMedida (Request $request)
    {
      $input = $request->all();


      $cadena_qry = "";

      $cadena_qry .= (!empty($input['diamextdesde'])?" AND m.diametroExterior>=".$input['diamextdesde']:"");
      $cadena_qry .= (!empty($input['diamexthasta'])?" AND m.diametroExterior<=".$input['diamexthasta']:"");
      $cadena_qry .= (!empty($input['espesordesde'])?" AND m.espesorNominal>=".$input['espesordesde']:"");
      $cadena_qry .= (!empty($input['espesorhasta'])?" AND m.espesorNominal<=".$input['espesorhasta']:"");
      $cadena_qry .= (!empty($input['largomaxdesde'])?" AND m.largoMaximo>=".$input['largomaxdesde']:"");
      $cadena_qry .= (!empty($input['largomaxhasta'])?" AND m.largoMaximo<=".$input['largomaxhasta']:"");
      $cadena_qry .= (!empty($input['largomindesde'])?" AND m.largoMinimo>=".$input['largomindesde']:"");
      $cadena_qry .= (!empty($input['largominhasta'])?" AND m.largoMinimo<=".$input['largomindesde']:"");
      $cadena_qry .= (($input['my-select-3'])!==null?" AND m.tipoAceroSAE IN (".implode(",",$input['my-select-3']).")":"");
      $cadena_qry .= (($input['my-select-2'])!==null?" AND m.tipoCostura IN (".implode(",",$input['my-select-2']).")":"");
      $cadena_qry .= (($input['tipotrat']>0)?" AND m.tratamientoTermico=".$input['tipotrat']:"");
      $cadena_qry .= (($input['my-select'])!==null?" AND m.normaid IN (".implode(",",$input['my-select']).")":"");
      //$cadena_qry .= (($input['forma']>0)?" AND p.formaid=".$input['forma']:"");
      $kilosqry = (!empty($input['kgshasta'])?" HAVING SUM( st.cantidad )<=".$input['kgshasta']:"");
      $kgsaux = (empty($input['kgshasta']))?"HAVING":"AND";
      $kilosqry .= (!empty($input['kgsdesde'])?" $kgsaux SUM( st.cantidad )>=".$input['kgsdesde']:"");
      $kgmetro = "((m.diametroExterior - m.espesorNominal) * m.espesorNominal * 0.0246)";

      $cadena_qry .= (!empty($input['kgmetroshasta'])?" AND $kgmetro <= (".$input['kgmetroshasta'].")":"");
      $cadena_qry .= (!empty($input['kgmetrosdesde'])?" AND $kgmetro >= (".$input['kgmetrosdesde'].")":"");


      if (($input['deposito'])>0) {
          if (($input['selectubi'])<>-1)
              $cadena_qry .= " AND p.ubicacion LIKE '%".$input['selectubi']."%'";

          if (($input['select3'])>0)
                  $cadena_qry .= " AND p.ubicacion LIKE '%".$input['select3']."'";

          if (((($input['selectubi'])<0) and (($input['select3'])<0)) or ((($input['selectubi'])<0) and (($input['select3'])>0))){

              $param  = ($input['deposito']==1)?"E-Z":"A-D";

              $cadena_qry .= " AND (p.ubicacion REGEXP '^([$param]+)' )";


          }


      }

      $db1 = "m.medida as 'Medida',
                  m.diametroExterior as 'Diametro Exterior',m.espesorNominal as 'Espesor Nominal',
              IF (m.largoMaximo=m.largoMinimo,m.largoMaximo,CONCAT(m.largoMinimo,'/',m.largoMaximo)) as 'Largo',tc.descripcion as 'Costura',
              tt.descripcion AS 'T Térmico',ta.descripcion as 'Acero',n.descripcion AS 'Norma',
                  emp.descripcion as 'Estado',IF (SUM( st.cantidad )>0,SUM(st.cantidad),0) AS 'Stock (kgs)',
                  round(((m.diametroExterior - m.espesorNominal) * m.espesorNominal * 0.0246),2) as 'Kg / m',
                  m.observaciones as 'Observaciones',
                  
              n.descripcion as normas,
              ta.descripcion as tipoacero,
              tc.descripcion as tipocostura,
              tratamientotermico.descripcion as tratamientotermicod
                  
              ";


                  

      /*$db = "SELECT ".$db1.",m.id".
            " FROM  medidas m
                     LEFT JOIN paquetes p ON (m.id = p.medidaid)
                     LEFT JOIN stockmateriaprima st ON ( st.paqueteid = p.id )
                     LEFT JOIN estadomateriaprima emp ON (emp.id = p.estadoid)
                     LEFT JOIN tipoacero ta ON (ta.id  = m.tipoAceroSAE)
                     LEFT JOIN tipocostura tc ON (tc.id = m.tipoCostura)
                     LEFT JOIN normas n ON (n.id = m.normaid)
                     LEFT JOIN estadofabricacion tt ON (tt.id = m.tratamientoTermico)
                     WHERE 1=1
                      $cadena_qry
                     GROUP BY m.id
                      $kilosqry order by m.diametroExterior";*/
        $db = "SELECT ".$db1.",m.id".
            " FROM  medidas m
                     LEFT JOIN paquetes p ON (m.id = p.medidaid)
                     LEFT JOIN stockmateriaprima st ON ( st.paqueteid = p.id )
                     LEFT JOIN estadomateriaprima emp ON (emp.id = p.estadoid)
                     LEFT JOIN tipoacero ta ON (ta.id  = m.tipoAceroSAE)
                     LEFT JOIN tipocostura tc ON (tc.id = m.tipoCostura)
                     LEFT JOIN normas n ON (n.id = m.normaid)
                     LEFT JOIN tratamientotermico ON (tratamientotermico.id = m.tratamientoTermico)
                     LEFT JOIN estadofabricacion tt ON (tt.id = m.tratamientoTermico)
                     WHERE 1=1
                      $cadena_qry
                     GROUP BY m.id
                      $kilosqry order by m.diametroExterior";

      $res = DB::select($db);
      $x=0;
      $res  = json_decode(json_encode($res), true);
      foreach ($res as $key => $value) {
        if(!is_null($value['Medida'])){
          $array[$x]=$value;
          $array[$x]['Medida'] = $value['Diametro Exterior'].' x '.$value['Espesor Nominal'].' x '.$value['Largo']. ' x '.$value['normas']. ' x '.$value['tipoacero']. ' x '.$value['tipocostura'];
          $x++;
        }
        
        
        
      }
      return response()->json($array);

    }

    public function procesarMateriaPrima(Request $request)
    {
      $input = $request->all();
      $input['nroorden'] = $input['numeroOrden'];

      $paquetes = json_decode($input['paquetes']);
      //dd($paquetes);
      $newa = [];

      $params = array("","proveedorid","nroremito","fecha","nroorden","nropaquetes","kilogramos");
      foreach ($params as $val){
        if ($val=="fecha")
          $input[$val]= $this->fechamysql($input[$val]);

        if($val=="")
          $newa[] = "";
        else
          $newa[] = $input[$val];
        
      }

      $medidaFind = Medida::find($input['medida']);
      $db = DB::select("INSERT INTO recepcionmateriaprima VALUES
      (?,?,?,?,?,?,?)", $newa);

      $materiaPid = DB::getPdo()->lastInsertId();

      $data_paq = array("","pedidoid","medida","nrotrazabilidad","nrotubos","ubicacion","estadoid","rubroid","formaid");

      $c_calidad = array("","paqueteid","diamextmin","diamextmax", "espesormin"  ,"espesormax"  ,"largomin" , "largomax" ,
          "espesorminEc"  , "espesormaxEc"  ,
          "carbono"  , "manganeso"  ,"fosforo"  ,"azufre"  ,"silicio"  , "tipoensayo" ,"abocardado" ,
          "durezatubo" ,"durezacostura" ,"cargaroturamin","cargaroturamax" ,"resistenciamin" ,"resistenciamax","nrocolada" ,"nrocertificado" ,
          "estencilado","leyendaEstencilado" ,"biselado" ,"aplastado" ,"alargamientomin","alargamientomax","observaciones");

      $medidaPrincipal = $input['medida'];
      $input['pedidoid']=$materiaPid; //EL PEDIDO ID ES PARA TODOS IGUAL, EL EJECUTADO ARRIBA,COMO NO VIENE POR REQUEST LO CREO ACÄ


      $estado=$input['estadoid'];//  ESTOS 4
      //$forma=$input['formaid'];// SON PARA CADA PAQUETE
      //$rubro=$input['rubroid'];// PERO EN EL INGRESO SE REPITEN

      $forma=$medidaFind->forma_id;// SON PARA CADA PAQUETE
      $rubro=$medidaFind->rubro_id;// PERO EN EL INGRESO SE REPITEN

      $input['medida']=array();

      foreach ($paquetes as $idx => $value){ //RECORREMOS TODOS LOS PAQUETES CARGADOS! (PUEDE SER MEDIDA O CUALQUIER OTRO DATO OBLIGATORIO

        $array_paq = array();
        
        
        // $medidaPrincipal = $value;// TOMO CUALQUIERA ; ES PARA ASIGNARLE PRECIO ; AL FINAL SIEMPRE SERA LA MISMA POR INGRESO
        /*  $_REQUEST['pedidoid'][$idx]=$materiaPid; //EL PEDIDO ID ES PARA TODOS IGUAL, EL EJECUTADO ARRIBA,COMO NO VIENE POR REQUEST LO CREO ACÄ
        $_REQUEST['estadoid'][$idx]=$_REQUEST['estadoid'];//  ESTOS 4
        $_REQUEST['formaid'][$idx]=$_REQUEST['formaid'];// SON PARA CADA PAQUETE
          
        $_REQUEST['medida'][$idx]=$medidaPrincipal;

        $_REQUEST['rubroid'][$idx]=$_REQUEST['rubroid'];// PERO EN EL INGRESO SE REPITEN

        /* foreach ($data_paq as $val_paq){ //RECORRO TODOS LOS DATOS DEL PAQUETE
        $array_paq[] = $_REQUEST[$val_paq][$idx];

        }*/

        $array_paq = array("",$materiaPid,$medidaPrincipal,$value->nrotrazabilidad,$value->nrotubos,$value->ubicacion,$estado,$rubro,$forma);      
        
        $array_paq[] = $input['proveedorid'];
        $array_paq[] = $input['precioMP'];

        $db1 = DB::select("INSERT INTO paquetes VALUES
        (?,?,?,?,?,?,?,?,?,?,?)", $array_paq);

        if(count($db1)==0){
          $paqueteid = DB::getPdo()->lastInsertId();

          $valorespaq = (array) $value->cc;

          if(isset($valorespaq['diamextmin'])){

            $valorespaq['paqueteid'] = $paqueteid;
            $array_cc = array();
            foreach ($c_calidad as $val_cc){


              if($val_cc=="")
                $array_cc[] = "";
              else
                $array_cc[] = $valorespaq[$val_cc];
              //$array_cc[] = $input[$val_cc][$idx];
            }

            $bar = implode('', $array_cc);

            if (!empty($bar)){
              $db2 = DB::select("INSERT INTO controlcalidad VALUES
                  (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $array_cc );// INSERTO
            }            
          }

          $date = date("Y-m-d H:i:s");

          $array_tipoM = array("",$paqueteid,$medidaPrincipal,1,$date,$value->kilos,$estado,$materiaPid); //value es el id de la medida declarado en el foreach inicial
          // EN ESTE CASO EL documentoReferencia es el id insert_id de la RecepecionMateriaMprima
          $db3 = DB::select("INSERT INTO movimientostock  VALUES (?,?,?,?,?,?,?,?)", $array_tipoM );

          if (count($db3)==0){
            // $db->setQuery("UPDATE stockMateriaPrima  SET cantidad=cantidad+".(int)$_REQUEST['kilos'][$idx]." WHERE id= $med_search ;");
            $db4 = DB::select("INSERT INTO stockmateriaprima  VALUES (?,?)", array($paqueteid,$value->kilos));

            // LA ACTUALIZACION DE PRECIO QUEDO DEPRECADA POR SOLICITUD DE TRAFICAÑO,
            // LA HARÄN MANUALMENTE DESDE AJUSTE DE PRECIOS. AQUI LE PASO FALSE PARA Q NO UPDATEE

            //19/04/2012 => SI NO CARGO PRECIO => NO LE ASIGNAMOS NADA!.
            if ($input['precioMP']>0)
              $this->cargar_precioMP($medidaPrincipal,$input['proveedorid'],$input['precioMP'],false, $input['moneda']);

          }

        }

      }

      return "true";
    }

    public function fechamysql($fphp){
     if (empty($fphp) or (!$this->validar_fecha($fphp)))
       return $fphp;
     $fecha_aux = explode('/', trim($fphp));
     $fecha = $fecha_aux[2]."-".$fecha_aux[1]."-".$fecha_aux[0];  
    return $fecha; 

    }

    public function validar_fecha($fecha,$vacio=false){

        if (empty($fecha))
          return $vacio;

        $date=explode('/', trim($fecha));
        return ((is_numeric($date[0]) and is_numeric($date[1]) and is_numeric($date[2]) and checkdate($date[1], $date[0], $date[2])));
            
    } 

    function cargar_precioMP($medida,$prove,$precio,$update=true, $moneda){

      $db = DB::select("SELECT 1 from preciompxproveedor where medidaid=$medida and proveedorid=$prove ");
      
      if (count($db)>0){
        $t=1; //$db->setQuery("UPDATE  precioMPxproveedor SET tipoMoneda=".$_REQUEST['moneda']." ,precioActual='$precio' where medidaid=$medida and proveedorid=$prove ");
      }
      else{
        $db1 = DB::select("INSERT into historicopreciop (precio,porcentaje,medidaid,proveedorid) VALUES ('$precio','',$medida,$prove);");

        $db2 = DB::select("INSERT into  preciompxproveedor VALUES ($medida,$prove,'$precio','$precio',".$moneda.");");
        $t = 0;

      }


      return $t;
    }

    public function indexmed(Request $request)
    {
      $type = $request->get('type');
      $normas = DB::table('normas')->get();
      $tipocostura = DB::table('tipocostura')->get();
      $tipoacero = DB::table('tipoacero')->get();
      $tratamiento = DB::table('tratamientotermico')->get();

      $formas = DB::table('formas')->get();
        $rubros = DB::table('rubros')->get();


      if ($type == 1){
          $input = $request->all();
          $q0 = "";
          $q0 .= (empty($input['diamex']))? "" : " AND diametroExterior=".$input['diamex']."";
          $q0 .= (empty($input['espesor']))? "" : " AND espesorNominal=".$input['espesor']."";
          $q0 .= (empty($input['largomin']))? "" : " AND largoMinimo<".$input['largomin']."";
          $q0 .= (empty($input['largomaxb']))? "" : " AND largoMaximo>".$input['largomaxb']."";
          $q0 .= (empty($input['costuraidb']))? "" : " AND tipoCostura=".$input['costuraidb']."";
          $q0 .= (empty($input['aceroidb']))? "" : " AND tipoAceroSAE=".$input['aceroidb']."";
          $q0 .= (empty($input['tratamientob']))? "" : " AND tratamientoTermico=".$input['tratamientob']."";
          $q0 .= (empty($input['normab']))? "" : " AND normaid=".$input['normab']."";

          $sql = 'SELECT '.
                 "medida as MEDIDA, id ".
                 "from medidas WHERE 1=1 $q0 ;";

          $res = DB::select($sql);

          if (count($res)>0){
              return response()->json(['resultado'=>$res]);
          }
          return "false";

      }

      return view('stock.indexmed',  compact('normas', 'tipoacero', 'tipocostura', 'tratamiento','formas','rubros'));
    }
}
