@extends('layouts.app')

@section('content')

  <!-- page content -->
  <!-- Inicio de las ventanas modales-->

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
<!--  modal Bucar Medida-->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="modal-historial">
  <div class="modal-dialog" style="width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="titulotable"></h4>
      </div>
      <div class="modal-body cuerpo-modal">
        <form autocomplete="off">
          <div class="form-group">
            


            <div class="x_content"><br><br>
              <table id="datatable-historial" class="table table-stripped table-bordered">
                <thead>
                  <tr>
                    <th>Diametro</th>
                    <th>Esp</th>
                    <th>Largo</th>
                    <th>Costura</th>
                    <th>Termico</th>
                    <th>Acero</th>
                    <th>Norma</th>
                    <th>Rubro</th>
                    <th>Proveedor</th>
                    <th>Precio</th>
                    <th>Porcentaje</th>
                    <th>T.C</th>
                    <th>Moneda</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
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
            <h2>Actualizar MP</h2>
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
            <h5>Filtre por medida y proveedor a actualizar</h5>
            <form action="{{route('actualizarmp')}}" method="get" autocomplete="off">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="type" value="1">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Proveedor</label>
                    <select name="proveedoridb" id="proveedoridb" class="form-control">
                      <option></option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->razon}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div  class="row">
                  <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Diámetro Exterior</label>
                  </div>
                  <div class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-2">
                    <label class="control-label" for="first-name">Espesor</label>
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" name="diametroextdesdeb" id="diametroextdesdeb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" name="diametroexthastab" id="diametroexthastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Desde</label>
                    <input type="text" name="espesordesdeb" id="espesordesdeb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Hasta</label>
                    <input type="text" name="espesorhastab" id="espesorhastab" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                </div>
                <div  class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Máx.</label>
                    <input type="text" name="largomaxb" id="largomaxb" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Largo Mín.</label>
                    <input type="text" name="largominb" id="largominb" placeholder="" class="form-control col-md-7 col-xs-3">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo De Acero</label>
                    <select name="tipoaceroidb" id="tipoaceroidb" class="form-control">
                      <option></option>
                      @foreach ($tipoaceros as $tipoacero)
                        <option value="{{$tipoacero->id}}">{{$tipoacero->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <label class="control-label" for="first-name">Tipo De Costura</label>
                    <select name="tipocosturaidb" id="tipocosturaidb" class="form-control">
                      <option></option>
                      @foreach ($tipocosturas as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Tratamiento Térmico</label>
                    <select name="tratamientoidb" id="tratamientoidb" class="form-control">
                      <option></option>
                      @foreach ($tratamientos as $tratamiento)
                        <option value="{{$tratamiento->id}}">{{$tratamiento->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label" for="first-name">Norma</label>
                    <select name="normaidb" id="normaidb" class="form-control">
                      <option></option>
                      @foreach ($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->descripcion}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 ">
                    <button type="submit" class="btn btn-primary  btn-sm">Buscar</button>
                    <a id="limpiarbusqueda" class="btn btn-success  btn-sm">Limpiar</a>
                  </div>
                </div>
              </div>
            </form>

            <br>

            
            <div class="clearfix"></div>
            <div class="x_content">
              <div class="row">
                <div class="table-responsive">
                  <table id="datatable-mp" class="table table-striped table-bordered table-hover" style="width: 100%">
                    <thead>
                      <tr>
                        <th>Medida</th>
                        <th>Proveedor</th>
                        <th>Precio Actual</th>
                        <th>Precio Actualizado</th>
                        <th>Historial Medida</th>
                        <th>Historial Proveedor</th>
                        <th>Seleccionar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($mparray as $mp)
                      <tr>
                        <td data-medida="{{$mp->med}}">{{$mp->medida}}</td>
                        <td data-proveedor="{{$mp->prove}}">{{$mp->razon}}</td>
                        <td>{{$mp->precio}}</td>
                        <td class="js-precioactualizado" data-precio="{{$mp->precio}}"></td>
                        <td data-toggle="modal" data-target="#modal-historial" data-type="m" data-prove="{{$mp->prove}}" data-med="{{$mp->med}}" align='center'><i class='fa fa-search'></i></td>
                        <td data-toggle="modal" data-target="#modal-historial" data-type="p" data-prove="{{$mp->prove}}" align='center'><i class='fa fa-search'></i></td>
                        <td align="center">
                          <input type="checkbox"  class="flat js-selection" name="table_records" data-proveedor="{{$mp->prove}}"  data-medida="{{$mp->med}}" data-precio="{{$mp->precio}}">
                        </td>
                      </tr>
                      @empty
                        No hay Registros
                      @endforelse
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
            <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label" for="first-name">Seleccionar Todos</label>
                     <input type="checkbox" class="flat" name="table_records" id="selectionAll">
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label" for="first-name">Suba (%)</label>
                    <input type="text" id="percentage" placeholder="" class="form-control col-md-7 col-xs-12">
                  </div>
                
            </div><br>
            <div class="row">
              <div class="col-md-1">
                <button type="button" id="procesar" class="btn btn-primary btn-sm">Guardar</button>
              </div>
            
              
              <!-- <div class="col-md-1">
                <button type="button" class="btn btn-delete  btn-sm" data-toggle="modal" data-target="#modal-eliminar">Eliminar</button>
              </div> -->
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
    var idSeleccionado = 0;
    var table = $("#datatable-historial").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    var table2 = $("#datatable-mp").DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    function tablevacia(){
      table = $("#datatable-historial").DataTable({
        "data": [],
        "columns": [
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""},
          {"data": ""}
        ],
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
    $('table tr').on('click', 'td', function(){
      idSeleccionado = $(this).data('id');
      idmed = $(this).data('med');
      idprove = $(this).data('prove');
      type   = $(this).data('type');
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
          }
      });

      $.ajax({  
        type: "post",
        url: "{{route('historialMp')}}",
        data: {
          'idmed': idmed,
          'idprove': idprove,
          'type': type
        },
        success: function(data){
          var res = data.resultado;
          table.destroy();
          if (data.type =="m"){
            $('#titulotable').append("Buscar Medida");
            if (data.resultado != "false"){
              console.log("entro en medidas");
              table = $("#datatable-historial").DataTable({
                "data": data.resultado,
                "columns": [
                  {"data": "medida",
                  render:
                      function(data,type,row){
                        if (data){
                          var esp = data.split("x");
                          return esp[0];
                          
                        }
                        return "";
                      }
                  },
                  {"data": "medida",
                  render:
                      function(data,type,row){
                        if (data){
                          var esp = data.split("x");
                          return esp[1];                          
                        }
                        return "";
                      }
                  },
                  {"data": "medidas"},
                  {"data": "costura"},
                  {"data": "tratamiento"},
                  {"data": "tipoacero"},
                  {"data": "norma"},
                  {"data": "rubros"},
                  {"data": "razon"},
                  {"data": "precio_nuevo"},
                  {"data": "p"},
                  {"data": "tas"},
                  {"data": "moneda"},
                  {"data": "fecha"},
                  {"data": "usuario"}
                ],
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
              return;
            }
            else{
              tablevacia();
              
            }
            return;
          }
          else{
            if (data.resultado != "false"){
              table = $("#datatable-historial").DataTable({
                "data": data.resultado,
                "columns": [
                  {"data": "medida",
                  render:
                      function(data,type,row){
                        if (data){
                          var esp = data.split("x");
                          return esp[0];
                          
                        }
                        return "";
                      }
                  },
                  {"data": "medida",
                  render:
                      function(data,type,row){
                        if (data){
                          var esp = data.split("x");
                          return esp[1];                          
                        }
                        return "";
                      }
                  },
                  {"data": "Largo"},
                  {"data": "costura"},
                  {"data": "tratamiento"},
                  {"data": "acero"},
                  {"data": "norma"},
                  {"data": "descripcion"},
                  {"data": "razon"},
                  {"data": "precio_nuevo"},
                  {"data": "p"},
                  {"data": "tasa"},
                  {"data": "moneda"},
                  {"data": "f"},
                  {"data": "usuario"}
                ],
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
            else{
              tablevacia();
            }
            return;
          }
        }
      });

    });


    $('#limpiarbusqueda').on('click', function(){
      $('#proveedoridb').val("");
      $('#diametroexthastab').val("");
      $('#diametroextdesdeb').val("");
      $('#espesorhastab').val("");
      $('#espesordesdeb').val("");
      $('#largomaxb').val("");
      $('#largominb').val("");
      $('#tipoaceroidb').val("");
      $('#tipocosturaidb').val("");
      $('#normaidb').val("");
      $('#tratamientoidb').val("");
      table2.clear().draw();

    });

    function validar()
    {
      var estado  = $.isNumeric($("#percentage").val())? true: false;

      return estado;
    }

    $("#selectionAll").on("change", function(){
      var status = $(this).is(":checked");

      if(status)
        $(".js-selection").prop("checked", true);
      else
        $(".js-selection").prop("checked", false);
    });

    $("#percentage").on("change", function(){
       var percentage = $(this).val()
       $(".js-precioactualizado").each(function(i, obj){
          var precio = $(obj).data('precio');
          var actualizacion = 0;

          if($.isNumeric(precio) && $.isNumeric(percentage))
          {
            actualizacion = parseFloat(precio) * (1+(parseFloat(percentage)/100));
            actualizacion = Math.round(actualizacion*100)/100;
            $(obj).text(actualizacion);
          }

       })
    });

    $("#procesar").on("click", function(){
      var data = [];
      var percentage =  $("#percentage").val()

      $(".js-selection").each(function(i, obj){
        if($(obj).is(":checked"))
        {
          var proveedor   = $(obj).data("proveedor");
          var medida      = $(obj).data("medida");
          var precio      = $(obj).data("precio"); 
          var nuevoprecio;

          if($.isNumeric(precio) && $.isNumeric(percentage))
          {
            nuevoprecio   = parseFloat(precio) * (1+(parseFloat(percentage)/100));
            nuevoprecio   = Math.round(nuevoprecio*100)/100;
          }

          data.push({ proveedor: proveedor, medida: medida, nuevoprecio: nuevoprecio });
        }
      });

      if(validar())
      {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
            }
        });

        $.ajax({  
          type: "POST",
          url: "{{route('mpprecio')}}",
          data: {
            "items":JSON.stringify(data)
          },
          success: function(data){
            console.log(data);
            if(data=="true")
            {
              $.toast({ 
                text : "Precios Actualizados con Exito", 
                showHideTransition : 'slide',  
                bgColor : 'green',              
                textColor : '#eee',            
                allowToastClose : false,     
                hideAfter : 5000,              
                stack : 5,                    
                textAlign : 'left',            
                position : 'top-right'       
              });

              limpiarMaestro();
            }
          }
        });
      }
      
    });


  });
</script>

@endsection