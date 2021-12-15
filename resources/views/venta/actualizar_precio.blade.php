@extends('layouts.app')

@section('content')

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal-modificar">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Modificar Actualización</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Cliente</label>
                <select id="clienteid" name="clienteid" class="form-control" required>
                  <option value=""></option>
                  @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Tipo de cuenta</label>
                <select id="cuentaid" class="form-control" required>
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
                <select name="usoid" id="usoid" class="form-control" required>
                  <option value=""></option>
                  @foreach ($usos as $uso)
                    <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label" for="first-name">Moneda</label>
                <select id="" class="form-control" required>
                  <option value=""></option>
                  @foreach ($monedas as $moneda)
                    <option value="{{$moneda->id}}">{{$moneda->descripcion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="ln_solid"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="" type="submit" class="btn btn-primary">Aceptar</button>
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
        <h4 class="modal-title" id="myModalLabel2">Agregar Actualización</h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Cliente</label>
                  <select name="clienteid" id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($clientes as $cliente)
                      <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Tipo de cuenta</label>
                  <select id="cuentaid" class="form-control" required>
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
                  <select name="usoid" id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($usos as $uso)
                      <option value="{{$uso->id}}">{{$uso->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" for="first-name">Moneda</label>
                  <select id="" class="form-control" required>
                    <option value=""></option>
                    @foreach ($monedas as $moneda)
                      <option value="{{$moneda->id}}">{{$moneda->descripcion}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button id="" type="submit" class="btn btn-primary">Aceptar</button>
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
        <h4 class="modal-title" id="myModalLabel2">¿Está Seguro que desea Eliminar?</h4>
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
            <h2>Actualizar Precio</h2>
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
            <h5>Filtre por cliente, costura o uso - Ingrese su búsqueda</h5>
            <!-- <form id="demo-form2" action="{{route('actualizar_precio')}}" method="get" data-parsley-validate class="form-horizontal form-label-left">
              <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
              <input type="hidden" name="consulta" id="consulta" value="1">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Cliente</label>
                    <select name="clienteid" id="clienteidb" class="form-control">
                      <option value=""></option>
                      @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->razon}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Tipo de cuenta</label>
                    <select name="costuraid" id="costuraidb" class="form-control">
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
                    <label class="control-label" for="first-name">Moneda</label>
                    <select name="monedaid" id="monedaidb" class="form-control">
                      <option value=""></option>
                      @foreach ($monedas as $moneda)
                        <option value="{{$moneda->id}}">{{$moneda->descripcion}}</option>
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
            <!--   -->
            <br>
            <br>
            <!-- <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="">
                <button type="button" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modal-agregar">Agregar Actualización de precio</button>


              </li>
            </ul> -->
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div class="table-responsive">
                  <form id="formprocess" name="formprocess"  method="post">
                  <table id="datatable-buttonsprecio" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Medida</th>
                        <th>Cotización</th>
                        <th>Precio Kg</th>
                        <th>Seleccionar</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div id="seccionenviar">
                           
            </div>

          </form>
          </div>
              <div class="col-md-1">
                <a id="enviar" class="btn btn-default btn-sm">Enviar</a>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
      $("#monedaidb").val("");    
    }

    $("#limpiarbusqueda").on("click", function(){
      limpiarFormularioBusqueda();
    });

    $(document).on('click', '#all:checkbox', sel_all);

    function sel_all(){
      if ($('#all').is(':checked') ==true){
        var verd = 1;
      }
      else{
        var verd = 0;
      }
      $("input:checkbox").each(function() {
        var val =this.value;
        if (val !== "on"){
          if (verd == 1){
              console.log("entro");
              $('#sel-'+val).prop("checked", true);           
          }
          else {
              $('#sel-'+val).prop("checked", false); 
          }          
        }
      });
      
    }

    function getCheckedBox() {
      
      
    }

    $("#enviar").on("click", function(){
      var checkedBox = $.map($('input:checkbox:checked'), 
                             function(val, i) {
                                return val.value;
                             });

      var porcentaje = $('#porcentaje').val();
      if (porcentaje.length < 1){
        alert("debe ingresar el porcentaje");
        return;

      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('process_actualizar_precio')}}",
        data: {
          'porcentaje': porcentaje,
          'cotizaciones': JSON.stringify(checkedBox)
        },
        success: function(data){
          if (data == "true"){
            location.reload();
          }

        }
      });

      console.log(checkedBox);
    });

    $("#buscaraactualizacion").on('click', function(){
      var clienteid = $("#clienteidb").val();
      var costuraid = $("#costuraidb").val();
      var usoid = $("#usoidb").val();
      var monedaid = $("#monedaidb").val();
      var consulta = $("#consulta").val();

      
    $("#loadingSpinner").show();

      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });


    var urledit = "buscaraprecio";
      $.ajax({  
        type: "post",
        url: urledit,
        data: {
          'clienteid': clienteid,
          'costuraid': costuraid,
          'usoid': usoid,
          'monedaid': monedaid,
          'consulta': consulta
        },
        success: function(data){
        var arrayReturn = data.resultado;
        table.destroy();

        if (arrayReturn.length > 0){

          var div = `
                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <label class="control-label" for="first-name">Seleccionar Todos</label>
                      <input type="checkbox" id="all" value='' checked>
                    </div>              
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Subir %</label>
                    <input type="text" id="porcentaje">
                  </div> `;

          $('#seccionenviar').append(div);
        }
        else{
          $('#seccionenviar div').remove();
        }

        table = $("#datatable-buttonsprecio").DataTable({
          "data": arrayReturn,
          "columns": [
            {"data": "medida"},
            {"data": "id"},
            {"data": "precioKilo"}
          ],
          "columnDefs": [ {
            "targets": 3,
            "data": null,
            "defaultContent": ""
          } ],
          "order": [],   
          "fnCreatedRow": function( nRow, arrayid, iDataIndex ) {
                  $(nRow).attr('data-id', arrayid['id']);
                  $('td', nRow).eq(3).append("<td><input id='sel-"+arrayid['id']+"' value='"+arrayid['id']+"' type='checkbox' checked></td>" );
                  //$('td', nRow).eq(9).attr('href', "/detalle_rechazo" + arrayid['id']);
          },  
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
        }

      });


    });



   });
</script>
@endsection