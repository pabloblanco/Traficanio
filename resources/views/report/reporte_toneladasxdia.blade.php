@extends('layouts.app')

@section('content')

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
          <h4 class="modal-title" id="myModalLabel2">Modificar Reporte De Toneladas Fabricadas</h4>
        </div>
        <div class="modal-body cuerpo-modal">
          <form action="">
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
                      <input type='text' class="form-control" />
                      <span class="input-group-addon">
                       <span class="fa fa-calendar"></span>
                     </span>
                   </div>
                 </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Subproceso</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($subprocesos as $sub)
                        <option value="{{$sub->id}}">{{$sub->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo De Orden</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipoordenes as $tipoorden)
                        <option value="{{$tipoorden->id}}">{{$tipoorden->descripcion}}</option>
                      @endforeach
                    </select>
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
          <form action="">

           <div class="x_title">
                  <h5>Datos Generales</h5>
                  <div class="clearfix"></div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Ingresar La Fecha</label>
                  <div class="form-group">
                    <div class='input-group date' id='myDatepicker10'>
                      <input type='text' class="form-control" />
                      <span class="input-group-addon">
                       <span class="fa fa-calendar"></span>
                     </span>
                   </div>
                 </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Subproceso</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($subprocesos as $sub)
                        <option value="{{$sub->id}}">{{$sub->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo De Orden</label>
                    <select id="" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipoordenes as $tipoorden)
                        <option value="{{$tipoorden->id}}">{{$tipoorden->descripcion}}</option>
                      @endforeach
                    </select>
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
<!-- /modals agregar-->

<!-- Fin de las ventanas modales-->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4>Reportes de Toneladas Reales Fabricadas Por Día</h4>
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
            <form autocomplete="off">
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
                      <input autocomplete="off" id="mesb" type='text' class="form-control" />
                      <span class="input-group-addon">
                       <span class="fa fa-calendar"></span>
                     </span>
                   </div>
                 </div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Subproceso</label>
                    <select id="subprocesoidb" class="form-control" required>
                      <option value=""></option>
                      @foreach ($subprocesos as $sub)
                        <option value="{{$sub->id}}">{{$sub->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label" for="first-name">Tipo De Orden</label>
                    <select id="tipoordenidb" class="form-control" required>
                      <option value=""></option>
                      @foreach ($tipoordenes as $tipoorden)
                        <option value="{{$tipoorden->id}}">{{$tipoorden->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               

                


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <a id="busquedareporte" class="btn btn-primary  btn-sm">Ejecutar</a>
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
            <br>
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div id="loader"  style="display: none; margin:0 auto; text-align: center;"><img src="{{ asset ('build/images/loading.gif') }}" width="50" height="50"></div>
                <div class="table-responsive">
                  <table id="datatable-buttonsreport" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Día</th>
                        <th>Ton/Día</th>
                        <th>Cantidad De Ordenes</th>
                        <th>Promedio Del Día</th>
                        <th>SubTotal Fabricado</th>
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

    $('#limpiarbusqueda').on('click', function(){
      $('#mesb').val("");
      $('#subprocesoidb').val("");
      $('#tipoordenidb').val("");
    });


    $("#busquedareporte").on('click', function(){
      var mesb = $('#mesb').val();
      var subprocesoidb = $('#subprocesoidb').val();
      var tipoordenidb = $('#tipoordenidb').val();
      if(mesb!==undefined && mesb!=""){
          mesb = convertirFechaAFormato(mesb);
      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
      type: "post",
      url: "{{route('buscar_report_toneladasxdia')}}",
      data: {
        'mesb': mesb,
        'subprocesoidb': subprocesoidb,
        'tipoordenidb': tipoordenidb
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
            {"data": "dia"},
            {"data": "tonedia"},
            {"data": "cantorde"},
            {"data": "promedio"},
            {"data": "subtotal"}
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