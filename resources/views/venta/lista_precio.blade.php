@extends('layouts.app')

@section('content')

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Modificar Precio</h4>
            </div>
            <div class="modal-body cuerpo-modal">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Cliente</label>
                          <select name="clienteid" id="clienteidm" class="form-control">
                            <option value=""></option>
                            @foreach ($clientes as $cliente)
                              <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Tipo de costura</label>
                          <select id="costuraidm" class="form-control">
                            <option value=""></option>
                            @foreach ($tipos as $tipo)
                              <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Uso</label>
                          <select name="usoid" id="usoidm" class="form-control">
                            <option value=""></option>
                            @foreach ($usos as $uso)
                              <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Tratamiento Térmico</label>
                          <select name="tratamientoidb" id="tratamientoidm" class="form-control">
                            <option value=""></option>
                            @foreach ($tratamientos as $tt)
                              <option value="{{$tt->id}}">{{$tt->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      
                    </div>
            </div>
            <div class="modal-footer">
              <button id="" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cancelar</button>

            </div>

          </div>
        </div>
      </div>
      <!-- /modals modificar -->
      <!--  modal agregar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-agregar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Agregar Precio</h4>
            </div>
            <div class="modal-body cuerpo-modal">
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Cliente</label>
                          <select id="" class="form-control">
                            <option value=""></option>
                            @foreach ($clientes as $cliente)
                              <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Tipo de costura</label>
                          <select id="" class="form-control">
                            <option value=""></option>
                            @foreach ($tipos as $tipo)
                              <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Uso</label>
                          <select name="usoid" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($usos as $uso)
                              <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Tratamiento Térmico</label>
                          <select name="tratamientoid" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($tratamientos as $tt)
                              <option value="{{$tt->id}}">{{$tt->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                          <button type="" class="btn btn-primary  btn-sm">Buscar</button>
                          <button type="" class="btn btn-success  btn-sm">Limpiar</button>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button id="" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cancelar</button>

            </div>

          </div>
        </div>
      </div>
      <!-- /modals agregar -->
      <!--  modal Eliminar  -->
      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-eliminar">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h5 class="modal-title" id="myModalLabel2">¿Estas Seguro que desea Eliminar?</h5>
            </div>
            <div class="modal-body cuerpo-modal">
            </div>
            <div class="modal-footer">
              <button id="" type="button" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-delete" data-dismiss="modal">Cancelar</button>

            </div>

          </div>
        </div>
      </div>
      <!-- /modals eliminar -->
      <!-- Fin de las ventanas modales-->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h5>Generar nueva lista de precios buscando por los siguientes campos</h5>
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
                  <h6>Filtre por cliente, costura o uso - Ingrese su búsqueda</h6>
                    <input type="hidden" id="consulta" value="1">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Cliente</label>
                          <select id="clienteidb" class="form-control">
                            <option value=""></option>
                            @foreach ($clientes as $cliente)
                              <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Tipo de costura</label>
                          <select id="costuraidb" class="form-control">
                            <option value=""></option>
                            @foreach ($tipos as $tipo)
                              <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Uso</label>
                          <select name="usoid" id="usoidb" class="form-control">
                            <option value=""></option>
                            @foreach ($usos as $uso)
                              <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" for="first-name">Tratamiento Térmico</label>
                          <select name="tratamientoid" id="tratamientoidb" class="form-control">
                            <option value=""></option>
                            @foreach ($tratamientos as $tt)
                              <option value="{{$tt->id}}">{{$tt->descripcion}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                          <button id="buscaraactualizacion" class="btn btn-primary  btn-sm">Buscar</button>
                          <button id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</button>
                        </div>
                      </div>
                    </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                  </div>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="">
                      <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Precio</button>


                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="x_content">
                    <div class="row">
                      <div class="table-responsive">
                        <table id="datatable-buttonslistaprecio" class="table table-striped table-bordered table-hover" style="width: 100%">
                          <thead>
                            <tr>
                              <th>Medida</th>
                              <th>Cód. Cliente</th>
                              <th>Tratamiento Térmico</th>
                              <th>Moneda</th>
                              <th>Precio por metro</th>
                              <th>Precio por kilo</th>
                              <th>Precio por pieza</th>
                              <th>Fecha</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              
                            </tr>
                            
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
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

@endsection

@section('js_extra')
<script type="text/javascript">
   $(function(){

    var table = $("#table_egreso").DataTable({
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
      $("#clienteidb").val("");
      $("#costuraidb").val("");
      $("#usoidb").val("");
      $("#tratamientoidb").val("");    
    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });

    $("#buscaraactualizacion").on('click', function(){
      var clienteid = $("#clienteidb").val();
      var costuraid = $("#costuraidb").val();
      var usoid = $("#usoidb").val();
      var tratamientoid = $("#tratamientoidb").val();
      var consulta = $("#consulta").val();

      
    $("#loadingSpinner").show();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      console.log(clienteid);

    var urledit = "buscarlistadeprecios";
      $.ajax({  
        type: "post",
        url: urledit,
        data: {
          'clienteid': clienteid,
          'costuraid': costuraid,
          'usoid': usoid,
          'tratamientoid': tratamientoid,
          'consulta': consulta
        },
        success: function(data){
        var arrayReturn = data.resultado;

        table.destroy();

        table = $("#datatable-buttonslistaprecio").DataTable({
          "data": arrayReturn,
          "columns": [
            {"data": "medida"},
            {"data": "codigoCliente"},
            {"data": "ttermico"},
            {"data": "monedita"},
            {"data": "precioMetro"},
            {"data": "precioKilo"},
            {"data": "precioPieza"}, 
            {"data": "fecha"}
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

        //$("#table_result_cotizacion").html("");
        console.log(data.resultado);
        }

      });


    });



   });
</script>
@endsection