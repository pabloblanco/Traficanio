@extends('layouts.app')

@section('content')

<!-- page content -->
      <!-- Inicio de las ventanas modales-->
      <!--  modal Eliminar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel2">¿Está seguro que desea eliminar?</h5>
            </div>
            
            <div class="modal-footer">
              <button id="send" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals eliminar -->
      <!--  modal modifcar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Modificar Reporte Despachos</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="">
              <div class="form-group">
                  <div class="x_title">
                    <h5>Datos De Despacho</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Estado</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($estados as $estado)
                          <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Transporte</label>
                      <select id="" class="form-control">
                        <option value=""></option>
                        @foreach ($transportes as $transporte)
                          <option value="{{$transporte->id}}">{{$transporte->razon}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                      <label class="control-label" for="first-name">Fecha De Entrega</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Fecha - Desde</label>
                      <div class='input-group date' id='DatepickerModalModifDespachoDesde'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Fecha - Hasta</label>
                      <div class='input-group date' id='DatepickerModalModifDespachoHasta'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="x_title">
                    <h5>Zonas</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Zona Norte
                        <input type="checkbox" >
                        <span class="check"></span>
                      </label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Zona Sur
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Zona Oeste
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Zona Traficaño
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label class="checkbox">Zona Federal
                        <input type="checkbox">
                        <span class="check"></span>
                      </label>
                    </div>

                  </div>


                  

                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals modificar-->

    <!-- Fin de las ventanas modales-->
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Reporte de Despacho</h2>
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
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="form-group">

                    <div class="x_title">
                      <h5>Datos De Despacho</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Cliente</label>
                        <input type="text" id="clienteidb" placeholder="" class="form-control col-md-7 col-xs-12">
                      </div>
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
                        <label class="control-label" for="first-name">Transporte</label>
                        <select id="transporteidb" class="form-control">
                          <option></option>
                          @foreach ($transportes as $transporte)
                            <option value="{{$transporte->id}}">{{$transporte->razon}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-5 col-xs-12">
                        <label class="control-label" for="first-name">Fecha De Entrega</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Desde</label>
                        <div class='input-group date' id='DatepickerModalAddDespachoDesde'>
                          <input id="desdeb" type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="first-name">Fecha - Hasta</label>
                        <div class='input-group date' id='DatepickerModalAddDespachoHasta'>
                          <input id="hastab" type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="x_title">
                      <h5>Zonas</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Zona Norte
                          <input id="znorteb" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Zona Sur
                          <input id="zsurb" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Zona Oeste
                          <input id="zoesteb" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Zona Traficaño
                          <input id="ztrafib" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <label class="checkbox">Zona Federal
                          <input id="zfederalb" type="checkbox">
                          <span class="check"></span>
                        </label>
                      </div>

                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 ">
                        <a id="buscarreport" class="btn btn-primary  btn-sm">Ejecutar</a>
                        <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="col-md-4 col-sm-4 col-xs-12">
                </div>
                
                <div class="clearfix"></div>
                <div class="x_content">
                  <div class="row">
                    <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                    <div class="table-responsive">
                      <table id="datatable-buttonsreport" class="table table-striped table-bordered table-hover" style="width: 100%">
                        <thead>
                          <tr>
                            <th>N° De Despacho</th>
                            <th>Cliente</th>
                            <th>Fecha De Entrega</th>
                            <th>Zona</th>
                            <th>Fecha De Creación</th>
                            <th>A Procesar</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-1">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-modificar">Modificar</button>
                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
                  </div>
                </div> -->
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

    var table = $("#datatable-buttonsreport").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    $('#limpiarbusqueda').on('click', function(){
      $('#estadoidb').val("");
      $('#transporteidb').val("");
      $('#hastab').val("");
      $('#desdeb').val("");
      $('#clienteidb').val("");
      $("#znorteb").removeAttr('checked');
      $("#zsurb").removeAttr('checked');
      $("#zoesteb").removeAttr('checked');
      $("#ztrafib").removeAttr('checked');
      $("#zfederalb").removeAttr('checked');
    });

    $('#buscarreport').on('click', function(){
      var estadoidb = $('#estadoidb').val();
      var transporteidb = $('#transporteidb').val();
      var clienteidb = $('#clienteidb').val();
      var hastab = $('#hastab').val();
      var desdeb = $('#desdeb').val();
      var znorteb = $('#znorteb').is(':checked');
      if (znorteb != true)
        znorteb = null;
      var zsurb = $('#zsurb').is(':checked');
      if (zsurb != true)
        zsurb = null;
      var zoesteb = $('#zoesteb').is(':checked');
      if (zoesteb != true)
        zoesteb = null;
      var ztrafib = $('#ztrafib').is(':checked');
      if (ztrafib != true)
        ztrafib = null;
      var zfederalb = $('#zfederalb').is(':checked');
      if (zfederalb != true)
        zfederalb = null;


      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('buscarreport_despacho')}}",
        data: {
        'estadoidb' : estadoidb,
        'clienteidb' : clienteidb,
        'desdeb' : desdeb,
        'hastab' : hastab,
        'transporteidb' : transporteidb,
        'znorteb' : znorteb,
        'zsurb' : zsurb,
        'zoesteb' : zoesteb,
        'ztrafib' : ztrafib,
        'zfederalb' : zfederalb
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
          if (arrayReturn == undefined){
            table = $("#datatable-buttonsreport").DataTable({
              "data": [],
              "columns": [
                {"data": ""},
                {"data": ""},
                {"data": ""},
                {"data": ""},
                {"data": ""},
                {"data": ""},
                {"data": ""}
              ],
              "language": {
                  "sProcessing":     "Procesando.....",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "No se encontraron resultados de busqueda",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                  },
                  "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
                }
            });
            return;
          }
          table = $("#datatable-buttonsreport").DataTable({
            "data": arrayReturn,
            "columns": [
              {"data": "NDespacho"},
              {"data": "Cliente"},
              {"data": "FechadeEntrega"},
              {"data": "Zona"},
              {"data": "FechadeCreacion"},
              {"data": "AReprocesar"},
              {"data": "Estado"}
            ],
            "initComplete": function(settings, json) {
                //alert("completado");
                //$("#loadingSpinner").hide();
                //$('#loadingSpinner').hide();
                //or $('#loadingSpinner').empty();
            },
            "processing": true,
            "language": {
                "sProcessing":     "Procesando.....",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
                },
                "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
              }

          });

        }
      });
    });


  });
</script>
@endsection