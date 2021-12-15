@extends('layouts.app')

@section('content')

<!-- page content -->
<!-- SECCION DE LOS MODALS-->
<!--  modal modificar-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Modificar Información De Rechazo</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">N° De Orden</label>
                <input type="text" id="nroorden" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Kilos</label>
                <input type="text" id="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Metros</label>
                <input type="text" id="" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Cliente</label>
                <input type="text" id="" class="form-control col-md-7 col-xs-12">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Desde</label>
                <div class='input-group date' id='myDatepickerRechazoModalDesde'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label class="control-label" for="first-name">Fecha - Hasta</label>
                <div class='input-group date' id='myDatepickerRechazoModalHasta'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-9 col-sm-9 col-xs-12 radio">
                <label>
                  <input type="radio" class="flat" checked name="iCheck"> Todos
                </label>
                <label>
                  <input type="radio" class="flat" checked name="iCheck"> Interno
                </label>
                <label>
                  <input type="radio" class="flat" checked name="iCheck"> Externo
                </label>
              </div>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<!--  modal generar orden  -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-generate">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title" id="myModalLabel2">¿Desdea generar una orden a partir de esta?</h5>
      </div>
      
      <div class="modal-footer">
        <button id="send_orden" type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- /modals generar orden-->

<!-- /cerrar modals Bucar Modificar-->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Información Detallada de los Rechazos</h2>
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
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cargar</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ver Rechazos</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Autorizar MP</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <form action="  " method="get" accept-charset="utf-8" id="formrechazo">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">N° De Orden</label>
                          <input type="text" id="Norden" class="form-control col-md-7 col-xs-12">
                          <span style="color:red;">*</span>
                        </div>
                        <div id="dataorden">
                        

                        </div>
                        <div class="col-md-5 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Motivo</label>
                          <select id="motivo" class="form-control">
                            <option value=""></option>
                            @foreach ($motivos as $motivo)
                              <option value="{{$motivo->id}}">{{$motivo->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12 check-rechazo">
                          <label class="checkbox">Es Interno
                            <input type="checkbox" id="interno">
                            <span class="check"></span>
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Piezas Rechazadas</label>
                          <input type="text" id="piezas" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Metros Rechazados</label>
                          <input type="text" id="metrosRE" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Kilos Rechazados</label>
                          <input type="text" id="kgs" class="form-control col-md-7 col-xs-12">
                          <span style="color:red;">*</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Detalle</label>
                          <input type="text" id="detalle" class="form-control col-md-7 col-xs-12">
                          <span style="color:red;">*</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Acción Correctiva</label>
                          <input type="text" id="accion_correctiva" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Ubicación</label>
                          <input type="text" id="ubicacion" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Estado</label>
                          <select id="estado_id" class="form-control">
                            <option value=""></option>
                            @foreach ($estados as $estado)
                              <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Forma</label>
                          <select id="forma_id" class="form-control">
                            <option value=""></option>
                            @foreach ($formas as $forma)
                              <option value="{{$forma->id}}">{{$forma->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Rubro</label>
                          <select id="rubro_id" class="form-control">
                            <option value=""></option>
                            @foreach ($rubros as $rubro)
                              <option value="{{$rubro->id}}">{{$rubro->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <h5>Información para reingresar Mp final</h5>
                      <div class="x_title"> </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Precio MP</label>
                          <input type="text" id="precioMP" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Largo Del Tubo</label>
                          <input type="text" id="longitud" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Paquetes</label>
                          <input type="text" id="paq" class="form-control col-md-7 col-xs-12">
                        </div>

                        <div id="paqadd">
                          
                        </div>
                          
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Fecha Rechazo</label>
                          <div class="form-group">
                            <div class='input-group date' id='DatepickerFechaRechazo'>
                              <input type='text' id="fechaR" class="form-control" />
                              <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">N° De Factura</label>
                          <input type="text" id="nFactura" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">N° De Remito</label>
                          <input type="text" id="nRemito" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Responsable de Ventas</label>
                          <select id="resVentas" class="form-control">
                            <option value=""></option>
                            @foreach ($responsables as $responsable)
                              <option value="{{$responsable->id}}">{{$responsable->nombreCompleto}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Responsable Expedición</label>
                          <select id="resExpedicion" class="form-control">
                            <option value=""></option>
                            @foreach ($responsables as $responsable)
                              <option value="{{$responsable->id}}">{{$responsable->nombreCompleto}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <button type="button" class="btn btn-primary btn-sm" id="saverechazo">Guardar</button>
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">N° De Orden</label>
                          <input type="text" id="ordenb" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Kilos</label>
                          <input type="text" id="kilosb" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Metros</label>
                          <input type="text" id="metrosb" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Cliente</label>
                          <input type="text" id="clienteb" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Fecha - Desde</label>
                          <div class='input-group date' id='myDatepickerRechazoDesde'>
                            <input id="desdeb" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="control-label" for="first-name">Fecha - Hasta</label>
                          <div class='input-group date' id='myDatepickerRechazoHasta'>
                            <input id="hastab" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-12 radio">
                          <label>
                            <input type="radio" class="flat" name="iCheck"> Todos
                          </label>
                          <label>
                            <input id="internob" type="radio" name="iCheck"> Interno
                          </label>
                          <label>
                            <input id="externob" type="radio" name="iCheck"> Externo
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                          <a id="buscarrechazo" class="btn btn-primary  btn-sm">Buscar</a>
                          <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                        </div>
                      </div>
                    </form>
                    <div class="ln_solid"></div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                      <div class="row">
                        <div class="">
                          <table id="datatable-buttonsrechazo" class="table table-striped table-bordered table-hover" style="width: 100%">
                            <thead>
                              <tr>
                                <th>N° De Orden</th>
                                <th>Cliente</th>
                                <th>Kilos</th>
                                <th>Mts</th>
                                <th>Piezas</th>
                                <th>Ubicación</th>
                                <th>Detalle</th>
                                <th>Acción Correctiva</th>
                                <th>Interno</th>
                                <th>Ver Detalle</th>
                                <th>Generar Orden</th>
                                <th>Anular</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
                      </div>
                      <div class="col-md-1">
                        <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <div class="row">
                    <div>
                      
                    </div>
                  </div>
                  
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

  var table = $("#datatable-buttonsrechazo").DataTable({
    "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
      }
  });

  $("#limpiarbusqueda").on('click', function(){
      $('#ordenb').val("");
      $('#kilosb').val("");
      $('#metrosb').val("");
      $('#clienteb').val("");
      $('#desdeb').val("");
      $('#hastab').val("");      
      //table = $("#datatable-buttonsrechazo").DataTable();
      //return;

    });

    function convertirFechaAFormato(fecha_recibida)
    {
      //console.log(fecha_recibida);
      var nuevafecha = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[2]+"-"+nuevafecha[1]+"-"+nuevafecha[0];
      return nuevafecha;
    }

  $("#buscarrechazo").on('click', function(){
    var ordenb = $('#ordenb ').val();
    var kilosb = $('#kilosb').val();
    var metrosb = $('#metrosb').val();
    var clienteb = $('#clienteb').val();
    var desdeb = $('#desdeb').val();
    var hastab = $('#hastab').val();
    var internob = $('#internob').is(':checked');
    var externob = $('#externob').is(':checked');

    if (desdeb){
      var desdeb = convertirFechaAFormato(desdeb);
      
    }
    else {
      var desdeb = null;
    }

    if (hastab){
      var hastab = convertirFechaAFormato(hastab);
      
    }
    else {
      var hastab = null;
    }

    if (internob){
      var ubicacion = 1;
    }

    if (externob){
      var ubicacion = 0;
    }


    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
        }
    });

    $.ajax({  
     type: "post",
     url: "{{route('buscarrechazo')}}",
     data: {
      'ordenb' : ordenb,
      'kilosb' : kilosb,
      'metrosb' : metrosb,
      'clienteb' : clienteb,
      'desdeb' : desdeb,
      'hastab' : hastab,
      'ubicacion' : ubicacion
     },
     success: function(data){
      if (data == "false"){
        $.toast({ 
          text : "Rechazo no Encontrado", 
          showHideTransition : 'slide',  
          bgColor : 'yellow',              
          textColor : '#000',            
          allowToastClose : false,     
          hideAfter : 5000,              
          stack : 5,                    
          textAlign : 'left',            
          position : 'top-right'       
        });
        return;

      }
      var arrayReturn = data.resultado;
      //console.log(arrayReturn);
      var arrayid = [];
      for (var i = 0; i < arrayReturn.length; i++) {
        arrayid.push(arrayReturn[i].id);
       // arrayid.push(arrayReturn[i].MEDIDA);
      }
      table.destroy();

      table = $("#datatable-buttonsrechazo").DataTable({
        "data": arrayReturn,
        "columns": [
          {"data": "ordenProduccion"},
          {"data": "razon"},
          {"data": "kilosR"},
          {"data": "metrosR"},
          {"data": "piezasR"},
          {"data": "ubicacion"},
          {"data": "detalle"},
          {"data": "accion_correctiva"},
          {"data": "interno"},
          {"data": "id", 
            render : function (data, type, row) {
              return "<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+data+"'><i class='fa fa-search'></i></a></td>";
            }
          },
          {"data": "estadoRechazo",
            render : function (data, type, row) {
              if(data==1){
                return "<td align='center'><a class='aceptOrden' href='#''><i style='color: green;' class='fa fa-check-circle'></i></a></td>";
              }
              else{
                return "Orden";
              }
            }
          },
          {"data": "estadoRechazo",
            render : function (data, type, row) {
              console.log(data);
              if(data==1){
                return "<td align='center'><a class='rejectOrden' href='#''></a><i style='color: red;' class='fa fa-times-circle'></i></td>";
              }
              else{
                return "Generada";
              }
            }
          },       
        ],

        columnDefs : [
          { targets : [8],
            render : function (data, type, row) {
              if (data == 1)
                return "Interno";
              else
                return "Externo";
            }
          },
          { targets : [9],
            "data" : null,
            "defaultContent": ""

          },
        ],
        //"paging":   false,
        //"ordering": false,
        //"info":     false,
        //"searching": false,

        "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                $(nRow).attr('data-id', arrayid['id']);
                $(nRow).attr('data-op', arrayid['ordenProduccion']);
                //$('td', nRow).eq(9).append("<td align='center'><a href='"+window.location.origin+"/public/detalle_rechazo/"+arrayid['id']+"'><i class='fa fa-search'></i></a></td>" );
                //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
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

  });

  $("a[href='#tab_content3']").on('click', function(){
    location.href = "{{route('autorizarMP')}}";
  });


  $('#Norden').on('change', function(){
    cargarMPrechazo($(this).val());
  });

  function clearDataOrden(){
    $('#dataorden br').remove();
    $('#dataorden div').remove();
  }

  function cargarMPrechazo(value){
    $.ajax({  
     type: "get",
     url: "{{route('mpRechazo')}}",
     data: {
      'nro':value
     },
     success: function(data){
      clearDataOrden();
       if(data!=="false" && data.tipo==1){
        data.dataarray[0] = parseFloat(data.dataarray[0]).toFixed(2);
        data.dataarray[1] = parseFloat(data.dataarray[1]).toFixed(2);
        data.dataarray[2] = parseFloat(data.dataarray[2]).toFixed(2);
        data.dataarray[6] = parseFloat(data.dataarray[6]).toFixed(2);

        if(data.db.metros==undefined)
          data.db.metros = 0;


        $('#dataorden').append(
          ` 
          <br> <br> <br> <br> <br>
          <div class="row" style="padding-left: 9px;">
              <div class="col-md-7 col-sm-4 col-xs-12">
                <div class="">
                  <table id="datatable-mprechazo" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Ø Exterior</th>
                        <th>Espesor</th>
                        <th>Ø Interior</th>
                        <th>Costura</th>
                        <th>Trat. Termico</th>
                        <th>Kilos</th>
                        <th>Largo</th>
                        <th>Dureza</th>
                      </tr>
                    </thead>
                    <tbody>
                      <td>${data.dataarray[0]}</td>
                      <td>${data.dataarray[1]}</td>
                      <td>${data.dataarray[2]}</td>
                      <td>${data.dataarray[3]}</td>
                      <td>${data.dataarray[4]}</td>
                      <td>${data.dataarray[5]}</td>
                      <td>${data.dataarray[6]}</td>
                      <td>${data.dataarray[7]}</td>
                    </tbody>
                  </table>
                </div>
              </div> 
              <br>
              <br>
              <h4>Kilogramos preparados: ${data.db.kilos} kgs.</h4>

              <input type="hidden" value="${data.db.kilos}" id="limk">
              <input type="hidden" value="${data.db.metros}" id="limm">
              <input type="hidden" value="${data.db.piezas}" id="limp">
              <input type="hidden" value="${data.db.idVer}" id="idVer">
              <input type="hidden" value="${data.db.idPmpRun}" id="idPmpRun">
              <input type="hidden" value="1" id="descontar">
              <input type="hidden" value="${data.db.opestado}" id="estadoOP">

              <input type="hidden" value="${data.db.clienteid}" id="cliente">
              <input type="hidden" value="${data.db.diametroExterior}" id="dex">
              <input type="hidden" value="${data.dataarray[1]}" id="espe">
              <input type="hidden" value="${data.db.diametroInterior}" id="din">
              <input type="hidden" value="${data.dataarray[6]}" id="longitudTubos">
              <input type="hidden" value="${data.db.normaid}" id="norma">
              <input type="hidden" value="${data.db.costuraid}" id="tipocostura">
              <input type="hidden" value="${data.db.durezaC}" id="dureza">
              <input type="hidden" value="${data.db.tipoAcero}" id="tipoacerosae">

          </div>
          `
          );
      }
      else if(data!=="false" && data.tipo==2){

        var kg = 0;

        if(data.db.kilos)
          kg = data.db.kilos;

        data.db.espMP = parseFloat(data.db.espMP).toFixed(2);
        data.db.dexMP = parseFloat(data.db.dexMP).toFixed(2);

        var div = `
                <br> <br> <br> <br> <br>
                <div class="row" style="padding-left: 9px;">
                    <div class="col-md-7 col-sm-4 col-xs-12">
                      <input type="hidden" value="${data.db.kilos}" id="limk">
                      <input type="hidden" value="${data.db.metros}" id="limm">
                      <input type="hidden" value="${data.db.piezas}" id="limp">
                      <input type="hidden" value="${data.db.idVer}" id="idVer">
                      <input type="hidden" value="${data.db.idPmpRun}" id="idPmpRun">
                      <input type="hidden" value="1" id="descontar">
                      <input type="hidden" value="${data.db.opestado}" id="estadoOP">

                      <h4>Datos medida</h4>

                      </div>
                      <br>
                      <br>
                        <div class="col-md-5 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ø Exterior</label>
                        <input type="text" id="dex" class="form-control" value="${data.db.dexMP}">

                        <label class="control-label" for="first-name">Espesor</label>
                        <input type="text" id="espe" class="form-control" value="${data.db.espMP}">

                          <label class="control-label" for="first-name">Tipo de Costura</label>
                          <select id="tipocostura" class="form-control">
                            <option value=""></option>
                            
                          </select>

                          <label class="control-label" for="first-name">Tipo de Acero</label>
                          <select id="tipoacerosae" class="form-control">
                            <option value=""></option>
                           
                          </select>

                          <label class="control-label" for="first-name">Tratamiento Térmico</label>
                          <select id="tratamientotermico" class="form-control">
                            <option value=""></option>
                           
                          </select>

                          <label class="control-label" for="first-name">Norma</label>
                          <select id="norma" class="form-control">
                            <option value=""></option>
                           
                          </select>

                          <label class="control-label" for="first-name">Dureza(HRB)</label>
                          <input type="text" id="dureza" class="form-control">

                          <h4>Kilogramos preparados: ${kg} kgs.</h4>
                          <hr>
                        </div>


                    </div>

                </div>

                `;

        $('#dataorden').append(div);

        for (var i = 0; i < data.tipoCosturas.length; i++) {
          var e = data.tipoCosturas[i];
          var opt = `<option value="${e.id}">${e.descripcion}</option>`;
          $('#tipocostura').append(opt);
        }

        for (var i = 0; i < data.tipoaceros.length; i++) {
          var e = data.tipoaceros[i];
          var opt = `<option value="${e.id}">${e.descripcion}</option>`;
          $('#tipoacerosae').append(opt);
        }

        for (var i = 0; i < data.tt.length; i++) {
          var e = data.tt[i];
          var opt = `<option value="${e.id}">${e.descripcion}</option>`;
          $('#tratamientotermico').append(opt);
        }


        console.log(data.normas);

        for (var i = 0; i < data.normas.length; i++) {
          var e = data.normas[i];
          var opt = `<option value="${e.id}">${e.descripcion}</option>`;
          $('#norma').append(opt);
        }

        $('#tipocostura').val(data.db.cosMP);
        $('#tipoacerosae').val(data.db.aceroMP);
        $('#tratamientotermico').val(data.db.ttMP);
        $('#norma').val(data.db.ttMP);
      }
      else{

      }
     }
    });
  }

  function procesarRechazo(obj){
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
        }
    });

    $.ajax({  
     type: "post",
     url: "{{route('procesarRechazo')}}",
     data: obj,
     success: function(data){
      if(data=="false1"){
        AlertToast("Se ha producido un Error", "red");
        return false;
      }

      if (data=="true"){
        AlertToast("Se ha cargado exitosamente");
        setTimeout(function(){ location.reload();  }, 2000);
      }

     }
    });
  }

  $('#saverechazo').on('click', function(){
    if(!validform()){

      AlertToast("Campo Requerido", "red");
      return false;
    }

    var forminput = $('#formrechazo input');
    var formselect = $('#formrechazo select');

    var obj = {};
    var kilosL = [];

    forminput.each(function( index ) {
      if($(this).attr('id')=="interno" && $(this).prop('checked')){
        obj[$(this).attr('id')] = 1;
      }
      else if($(this).attr('id')=="interno" && $(this).prop('checked')==false){
        obj[$(this).attr('id')] = 0;
      }
      else{
        obj[$(this).attr('id')] = $(this).val();
      }
    });

    formselect.each(function( index ) {
      obj[$(this).attr('id')] = $(this).val();
    });
    
    if ($('#paq').val()>0){
      var objkilos = {};
      var a = 1;
      for (var i = 0; i < $('#paq').val(); i++) {
        objkilos['paqk-'+a] = $('#paqk-'+a).val();
        a++;
      }
      kilosL.push(objkilos);
      obj['paquetes'] = JSON.stringify(kilosL);
    }

    procesarRechazo(obj);
  });

  $('#paq').on('change', function(){
    desplegarPqR($(this).val());
  });

  function agregarPqR(val){
        if (!($("#paq").val()>0))
            $("#paq").val(0);

        var inputkilo = `
            <div class="col-md-2 col-sm-2 col-xs-12">
              <label class="control-label" for="first-name">kilos:</label>
              <input id="paqk-${val}" data-paq="true" style="background: #E4EEFF;" type="text" class="form-control col-md-7 col-xs-12">
            </div>
        `;

        $('#paqadd').append(inputkilo);
        $("#paq").val(parseInt($("#paq").val())+1);
  }


  function desplegarPqR(este){
      $('#paqadd div').remove();

      var fin  = este;
      $("#paq").val(0);

      for (i=1;i<=fin;i++){
          agregarPqR(i);
      }
  }

  $('#piezas').on('change', function(){
    chgPiezas($(this).val());
    validar($(this), "p");
  });

  $('#metrosRE').on('change', function(){
    validar($(this), "m");
  });

  $('#kgs').on('change', function(){
    validar($(this), "k");
  });

  function chgPiezas(este){
      var de = parseFloat($("#dex").val());
      var espe = parseFloat($("#espe").val());
      if (!(de>0 && espe>0))
           return false;
      var kgmts = (((de-espe)*espe)*0.0246);
      var largofijo = parseFloat($("#longitudTubos").val());
      if (!(largofijo>0))
          return false;
      var mts = redondear((este*largofijo)/1000,2);
      var kgs = redondear(mts*kgmts,2);

      if (mts>$("#limm").val())
          $("#metrosRE").val(mts);
      if (kgs>$("#limk").val())
          $("#kgs").val(kgs);
  }

  function redondear(cantidad,decimales) {
      var cant = parseFloat(cantidad);
      var dec = parseFloat(decimales);
      decimales = (!dec ? 2 : dec);
      return Math.round(cant * Math.pow(10, decimales)) / Math.pow(10, decimales);
  }

  function validar(obj,lim){
          if (parseFloat(obj.val())>parseFloat($("#lim"+lim).val())){
              AlertToast('Exceso en cantidad rechazada', 'red');
              obj.val(0);
          }
  
  }

  function validform(){

    var nroorden = $('#Norden').val().length;
    if(!nroorden>0){
      $('#Norden').focus();
      return false;
    }

    var kgs = $('#kgs').val().length;
    if(!kgs>0){
      $('#kgs').focus();
      return false;
    }
    // else{

    //   if($('#kgs').val()==0){
    //     $('#kgs').focus();
    //     return "0";
    //   }
    // }

    var detalle = $('#detalle').val().length;
    if(!detalle>0){
      $('#detalle').focus();
      return false;
    }

    return true;
  }

  function AlertToast(dataText="", colorFont="green"){
    $.toast({ 
      text : dataText, 
      showHideTransition : 'slide',  
      bgColor : colorFont,              
      textColor : '#eee',            
      allowToastClose : false,     
      hideAfter : 5000,              
      stack : 5,                    
      textAlign : 'left',            
      position : 'top-right'       
    });
  }

  var tr = null;

  $(document).on('click', '.aceptOrden', function(){
    $('#modal-generate').modal('show');
    tr = $(this).parents('tr');    
  });

  $('#send_orden').on('click', function(){
    $('#modal-generate').modal('hide');
    OrdenG();
  });

  function OrdenG(){
    var id = tr.data('id');
    var op = tr.data('op');
    aceptOrden(op, id);
  }

  function procesarRechazoPOST(obj){
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
        }
    });

    $.ajax({  
     type: "post",
     url: "{{route('procesarRechazoPOST')}}",
     data: obj,
     success: function(data){
      //AlertToast("Se ha cargado exitosamente");

     }
    });
  }


  function aceptOrden(op, id)
  {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
        }
    });

    $.ajax({  
     type: "post",
     url: "{{route('procesarRechazoPOST')}}",
     data:{
      'opt':2,
      'nro':op,
      'rjt':id
     },
     success: function(data){
      location.href =`/public/oprechazo/${data}?accion=M&rjt=1`;

     }
    });
  }

});
</script>
@endsection