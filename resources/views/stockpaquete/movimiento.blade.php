@extends('layouts.app')

@section('content')

    
    <!-- Inicio de las ventanas modales-->
    <!--  modal Eliminar ajuste -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar-matriz">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Eliminar Ajuste</h4>
          </div>
          <div class="modal-body cuerpo-modal">
           <form action="  " method="get" accept-charset="utf-8">

            <div class="form-group">

              <div class="col-md-6 col-sm-6 div-input-modal">
                <label for="first-name" for="first-name">Usuario</label>
                <input type="text" id="first-name" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-6 col-sm-6 div-input-modal">
                <label for="first-name" for="pass">Contraseña</label>
                <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
          <button id="send" type="button" class="btn btn-primary">Guardar</button>
        </div>

      </div>
    </div>
  </div>
  <!-- /modals eliminar ajuste-->


  <!--  modal Bucar Medida-->
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-medida">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Buscar Medida</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form autocomplete="off">
            <div class="form-group">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Diametro Exterior</label>
                <input type="text" id="diametroexteriorbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Espesor</label>
                <input type="text" id="espesorbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Largo mínimo</label>
                <input type="text" id="largominbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Largo Máximo</label>
                <input type="text" id="largomaxbm" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo Acero</label>
                <select id="tipoaceroidbm" class="form-control">
                  <option></option>
                  @foreach ($tipoaceros as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Tipo Costura</label>
                <select id="tipocosturaidbm" class="form-control">
                  <option></option>
                  @foreach ($tipocosturas as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Tratamiento Térmico</label>
                <select id="tratamientoidbm" class="form-control">
                  <option></option>
                  @foreach ($tratamientos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Norma</label>
                <select id="normaidbm" class="form-control">
                  <option></option>
                  @foreach ($normas as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                  @endforeach
                </select>
              </div>


              <div class="x_content"><br><br>
                <table id="datatable-buttonsmedidas" class="table table-stripped table-bordered">
                  <thead>
                    <tr>
                      <th>Medida</th>
                      <th>Stock (kgs)</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
          <a id="buscarmedida" class="btn btn-primary">Buscar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /cerrar modals Bucar Medida-->


  

  <!-- Fin de las ventanas modales-->

  <div class="right_col" role="main">
    <div class="">  
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Movimientos</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
             <h5>Consulte movimiento del stock por materia prima</h5>
             <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="documento">Nº de Paquete Trazabilidad</label>
                  <input id="nrob" type="text" id="documento" class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Fecha - Desde</label>
                  <div class='input-group date' id='myDatepicker17'>
                    <input autocomplete="off" id="fechadesdeb" type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Fecha - Hasta</label>
                  <div class='input-group date' id='myDatepicker18'>
                    <input autocomplete="off" id="fechahastab" type='text' class="form-control" />
                    <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
                </div>    
                
              </div>
              
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Estado</label>
                  <select id="estadoidb" class="form-control">
                    <option></option>
                    @foreach ($estados as $estado)
                      <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <label class="control-label" for="first-name">Tipo De Movimiento</label>
                  <select id="tipoidb" class="form-control">
                    <option></option>
                    @foreach ($tipos as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label class="control-label" for="documento">Medida</label>
                  <input data-id="" id="medidaidb" disabled="" type="text" id="documento" class="form-control col-md-7 col-xs-12">
                  
                </div> 
                <div class="col-md-1 col-sm-1 col-xs-12">
                  <button data-toggle="modal" data-target="#modal-medida" type="" class="btn btn-primary btn-calidad btn-sm btn-margin"><i class="fa fa-search"></i></button>
                </div>

              </div>
              



              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 ">

                  <button id="buscarmovimiento" class="btn btn-primary  btn-sm">Buscar</button>
                  <button id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
                </div>
              </div>

            </div>
            
            <div class="clearfix"></div>
            <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
            <div class="x_content">
              <div  class="table-responsive">
                
                <table id="datatable-buttonsmovimiento" class="table table-striped table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Tipo</th>
                      <th>Cantidad (Kgs)</th>
                      <th>Fecha Mov.</th>
                      <th>Medida</th>
                      <th>Nº Paquete</th>
                      <th>Documento</th>
                      <th>Proveedor</th>
                      <th>Observaciones</th>
                    </tr>
                  </thead>
                  <tbody>
                                   
                  </tbody>
                </table>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-1">
                <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar-matriz">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

@endsection

@section('js_extra')
<script type="text/javascript">
   $(function(){

    var table = $("#datatable-buttonsmovimiento").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $("#loadingSpinner").hide();


    function getDate(dateString)
    {
      var dateNew = dateString.split("-");
      return new Date(dateNew[0], dateNew[1]-1, dateNew[2]);
    }

    function validarNumero(elemento)
    {
      var is_numerico = $.isNumeric(elemento);
      return is_numerico;
    }


    function limpiarFormularioBusqueda()
    {
      $("#fechadesdeb").val("");
      $("#fechahastab").val("");
      $("#estadoidb").val("");
      $("#medidaidb").val("");
      $("#nrob").val("");
      $("#tipoidb").val("");
      table.clear().draw();
    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });

    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

    ////////// SCRIPT SEARCH MEDIDA ////////////////

    //// Valores a reemplazar o añadir : [
    //// 1 - nombre de la tabla de medidas -----> ('#datatable-buttonsmedidas')
    //// 2 - id de los input para buscar las medidas 
    //// 3 - id del boton de buscar medidas -----> ('#buscarmedida')
    //// 4 - valor del campo del buscador principal -----> ('medida_id')
    /// ] 
    var medida_id = 0;
    var namemedida = "";

    $('#datatable-buttonsmedidas').on('click', 'tr', function(){
      medida_id = $(this).attr('id');
      namemedida = $(this).data('medida');
      $("#medidaidb").val(namemedida);
      
      if($(this).hasClass('selected-table')){
        $(this).removeClass('selected-table');
      }else{
        $("#datatable-buttonsmedidas tbody tr.selected-table").removeClass('selected-table');
        $(this).addClass('selected-table');
      }

      $(function () {
         $('#modal-medida').modal('toggle');
      });

    });

    $("#buscarmedida").on('click', function(){
      var diametroexteriorbm = $("#diametroexteriorbm").val();
      var espesorbm = $("#espesorbm").val();
      var largominbm = $("#largominbm").val();
      var largomaxbm = $("#largomaxbm").val();
      var tipoaceroidbm = $("#tipoaceroidbm").val();
      var tipocosturaidbm = $("#tipocosturaidbm").val();
      var tratamientoidbm = $("#tratamientoidbm").val();
      var normaidbm = $("#normaidbm").val();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscarmedidas')}}",
        data: {
          'diametroexteriorbm': diametroexteriorbm,
          'espesorbm': espesorbm,
          'largominbm': largominbm,
          'largomaxbm': largomaxbm,
          'tipoaceroidbm': tipoaceroidbm,
          'tipocosturaidbm': tipocosturaidbm,
          'tratamientoidbm': tratamientoidbm,
          'normaidbm': normaidbm          

        },
        success: function(data){
          var arrayReturn = data.resultado;
          var arrayid = [];
          var arrayNameMedida = [];
          for (var i = 0; i < arrayReturn.length; i++) {
            arrayid.push(arrayReturn[i].id);
            arrayid.push(arrayReturn[i].MEDIDA);
          }
          console.log(arrayNameMedida);
          table.destroy();
          table = $("#datatable-buttonsmedidas").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "MEDIDA"},
              {"data": "Stockkgs"},
            ],
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false,

            "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                    $(nRow).attr('id', arrayid['id']);
                    $(nRow).attr('data-medida', arrayid['MEDIDA']);
            },

            "initComplete": function(settings, json) {
                //alert("completado");
                //$("#loadingSpinner").hide();
                //$('#loadingSpinner').hide();
                //or $('#loadingSpinner').empty();
            },

          });

        }

      });

      ////////////// END SEARCH MEDIDA ///////////////



    });

    $("#buscarmovimiento").on('click', function(){
      table.clear().draw();
      var fechadesdeb = $("#fechadesdeb").val();
      var fechahastab = $("#fechahastab").val();
      var estadoidb = $("#estadoidb").val();
      var medidaidb = medida_id;
      var nrob = $("#nrob").val();
      var tipoidb = $("#tipoidb").val();

    var d1 = null;
    if(fechadesdeb!==undefined && fechadesdeb!=""){
        fechadesdeb = convertirFechaAFormato(fechadesdeb);
        d1 = getDate(fechadesdeb);
      }

    var d2 = null;
    if(fechahastab!==undefined && fechahastab!=""){
        fechahastab = convertirFechaAFormato(fechahastab);
        d2 = getDate(fechahastab);
      }
      
    $("#loadingSpinner").show();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

    var urledit = "buscarmovimiento";
      $.ajax({  
        type: "post",
        url: urledit,
        data: {
          'fechadesdeb': fechadesdeb,
          'fechahastab': fechahastab,
          'estadoidb': estadoidb,
          'medidaidb': medidaidb,
          'nrob': nrob,
          'tipoidb': tipoidb
        },
        beforeSend: function() {
           $('#loader').show();
        },
        complete: function(){
           $('#loader').hide();
        },
        success: function(data){
         var arrayReturn = data.resultado;
         table.destroy();
         table = $("#datatable-buttonsmovimiento").DataTable({
           "data": arrayReturn,
           "columns": [
             {"data": "TIPO"},
             {"data": "CANTIDAD"},
             {"data": "FECHAMOVIMIENTO"},
             {"data": "Medida"},
             {"data": "NPaquete"},
             {"data": "Documento"},
             {"data": "PROVEEDOR"},
             {"data": "Observaciones"}
           ],
           
         });
        }

          

      });


    });



   });
</script>
@endsection