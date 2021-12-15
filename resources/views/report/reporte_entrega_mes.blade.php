@extends('layouts.app')

@section('content')

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
              <h4 class="modal-title" id="myModalLabel2">Modificar Reporte De Toneladas Fabricadas</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <div class="x_title">
                    <h5>Datos Generales</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Ingresar La Fecha</label>
                      <div class="form-group">
                        <div class='input-group date' id='myDatepicker11'>
                          <input autocomplete="off" name="fecha" type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Objetivo</label>
                      <input autocomplete="off" name="estimada" type="text" id="" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label" for="first-name">Objetivo RV</label>
                      <input autocomplete="off" name="objetivoRv" type="text" id="" class="form-control col-md-7 col-xs-12">
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
      <!--  modal agregar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Reporte De Toneladas Fabricadas</h4>
            </div>
            <div class="modal-body cuerpo-modal">
              <form action="{{route('add_report_entrega_mes')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="x_title">
                  <h5>Datos Generales</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Ingresar La Fecha</label>
                    <div class="form-group">
                      <div class='input-group date' id='myDatepicker10'>
                        <input autocomplete="off" name="fecha" type='text' class="form-control" />
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Objetivo</label>
                    <input autocomplete="off" name="estimada" type="text" id="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Objetivo RV</label>
                    <input autocomplete="off" name="objetivoRv" type="text" id="" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="button" class="btn  btn-delete" data-dismiss="modal">Cerrar</button>
            </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals agregar-->
    <!-- Fin de las ventanas modales-->
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h4>Reportes Total Entregado Por Mes</h4>
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
                      <h5>Datos Generales</h5>
                      <div class="clearfix"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Ingresar La Fecha</label>
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker9'>
                            <input id="fecha" autocomplete="off" type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Objetivo</label>
                        <input id="objetivo" autocomplete="off" type="text" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <label class="control-label" for="first-name">Objetivo RV</label>
                        <input id="objetivoRv" autocomplete="off" type="text" class="form-control col-md-7 col-xs-12">
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
                <!-- <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="">
                    <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Nuevo Reporte</button>
                  </li>
                </ul> -->
                <div class="clearfix"></div>
                <div class="x_content">
                  <div class="row">
                    <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                    <div class="table-responsive">
                      <table id="datatable-buttonsreport" class="table table-striped table-bordered table-hover" style="width: 100%">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Objetivo</th>
                            <th>Reventa</th>
                            <th>Trefilado</th>
                            <th>Total Entregado</th>
                            <th>% De Reventa</th>
                            <th>Objetivo RV</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                        <tfoot id="tfoot">

                        </tfoot>
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
      $('#objetivo').val("");
      $('#objetivoRv').val("");
      $('#fecha').val("");
    });

    function convertirFechaAFormato(fecha_recibida)
    {
      var nuevafecha = fecha_recibida.split("/");
      var nuevafecha2 = fecha_recibida.split("/");
      nuevafecha  = nuevafecha[1]+"-"+nuevafecha[0]+"-"+"01";
      nuevafecha2 = nuevafecha2[1]+"-"+nuevafecha2[0]+"-"+"31";
      var fechas = [];
      fechas.push(nuevafecha);
      fechas.push(nuevafecha2);
      return fechas;
    }

    $('#buscarreport').on('click', function(){
      var objetivo = $('#objetivo').val();
      var objetivoRv = $('#objetivoRv').val();
      var fecha = $('#fecha').val();
      var fechab = $('#fecha').val();

      if(fecha!==undefined && fecha!=""){
          fecha = convertirFechaAFormato(fecha);
      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "POST",
        url: "{{route('buscar_reporteentregames')}}",
        data: {
        'objetivo' : objetivo,
        'objetivoRv' : objetivoRv,
        'fecha' : fecha,
        'fechab': fechab
        },
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function(){
          $('#loader').hide();
        },
        success: function(data){
          var arrayReturn = data.resultado.detalles;
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
              {"data": "fecha"},
              {"data": "objetivo"},
              {"data": "reventa"},
              {"data": "trefilado"},
              {"data": "totalentregado"},
              {"data": "porcentaje"},
              {"data": "objetivorv"}
            ],
            fixedHeader: {
            //header: true,
            footer: true
            },
            columnDefs : [
              { targets : [0],
                render : function (data, type, row) {
                  if (data){
                    var nuevafecha = data.split("-");
                    nuevafecha = nuevafecha[2]+"/"+nuevafecha[1]+"/"+nuevafecha[0];
                    return nuevafecha;
                  }
                }
              },
              { targets : [5],
                render : function (data, type, row) {
                  if (data)
                    return data+" %";
                }
              },
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'print'
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

          var total = data.resultado.totales[0];
          console.log(total);

          var foot = `<tr>
                        <td>Total</td>
                        <td>${total.tobjetivo}</td>
                        <td>${total.treventa}</td>
                        <td>${total.ttrefila}</td>
                        <td>${total.tentregagado}</td>
                        <td>${total.tporcentaje} %</td>
                        <td>${total.tobjetivorv}</td>
                      <tr>`;
          $("#tfoot").append(foot);
          //console.log(arrayReturn);

        }

      });

    });
  });
</script>
@endsection